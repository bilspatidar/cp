<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @extends CI_Model
 */
class V2_model extends CI_Model {

	protected $table      = 'tempRequest';
	protected $primaryKey = 'id';
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();		
	}
	
	public function create($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id(); 
	}
	public function check_auth_client(){
		$host =  $_SERVER['HTTP_HOST'];
		
		$api_key =  $this->input->get_request_header('api-key', TRUE);
        $this->db->select('users.users_id');
        $this->db->from('users');
		$this->db->join('merchant_keys','users.users_id = merchant_keys.merchant_id');
        $this->db->where('merchant_keys.api_key',$api_key);
        $this->db->where('users.isDelete',0);
        $this->db->where('users.status','Active');
		
        $getMerchat = $this->db->get();
        if($getMerchat->num_rows()==1){
            return $getMerchat->row()->users_id;
        } else {
			return 0;
		}
    }
	
	public function check_cc($cc, $extra_check = false){
		$cards = array(
			"visa" => "(4\d{12}(?:\d{3})?)",
			"amex" => "(3[47]\d{13})",
			"jcb" => "(35[2-8][89]\d\d\d{10})",
			"maestro" => "((?:5020|5038|6304|6579|6761)\d{12}(?:\d\d)?)",
			"solo" => "((?:6334|6767)\d{12}(?:\d\d)?\d?)",
			"mastercard" => "(5[1-5]\d{14})",
			"switch" => "(?:(?:(?:4903|4905|4911|4936|6333|6759)\d{12})|(?:(?:564182|633110)\d{10})(\d\d)?\d?)",
		);
		$names = array("Visa", "American Express", "JCB", "Maestro", "Solo", "Mastercard", "Switch");
		$matches = array();
		$pattern = "#^(?:".implode("|", $cards).")$#";
		$result = preg_match($pattern, str_replace(" ", "", $cc), $matches);
		if($extra_check && $result > 0){
			$result = (validatecard($cc))?1:0;
		}
		return ($result>0)?$names[sizeof($matches)-2]:false;
	}
	
	public function allCurrencyCode() {
		
		$this->db->select('currency_code');
		$this->db->from('currency');
		$this->db->where('status','Active');
		$result = $this->db->get()->result();
		foreach($result as $row){
			$currecny[] = $row->currency_code;
		}
		return $currecny;
	}
	
	public function merchantPaymentGateway($merchant_id,$amt,$currency,$cardType='',$country='',$mid=''){
		
		$this->db->select('payment_gateway.id,payment_gateway.encrypt_key,payment_gateway.methodName,payment_gateway.daily_limit');
		$this->db->from('payment_gateway');
		$this->db->join('merchant_payment_link','payment_gateway.id = merchant_payment_link.payment_id');
		$this->db->where('payment_gateway.status','Active');	
		$this->db->where('find_in_set("'.$currency.'", merchant_payment_link.currency) <> 0');
		if(!empty($country)){
			$this->db->where('find_in_set("'.$country.'", payment_gateway.blocked_country) <= 0');			
		}
		if(!empty($cardType)){
			$this->db->where('find_in_set("'.$cardType.'", merchant_payment_link.cards) <> 0');
		}
		if(!empty($mid)){
			$this->db->where('merchant_payment_link.mid',$mid);
		}
		$this->db->where('merchant_payment_link.merchant_id',$merchant_id);
		$data = $this->db->get();
		if($data->num_rows()>0){
			$result = $data->result();
			foreach($result as $row){
				$pid = $row->id;
				$daily_limit = $row->daily_limit;
				$totalTxnAmt = $this->getTotalTodaysTxn($pid);
				$total = $totalTxnAmt+$amt;
				if($daily_limit>=$total){
					return $data;
					exit();
				}
			}
			return 1;
		}else{
			return 0;
		}
	}
	
	public function getTotalTodaysTxn($pgId){
		
		$today = date('Y-m-d');
		$date = date( "Y-m-d" , strtotime($today) );
		$this->db->select('SUM(amount + merchant_fee) AS amt ');
        $this->db->from("orders");
        $this->db->where('payment_id',$pgId);
        $this->db->where('status','Success');
        $this->db->where('CAST(transaction_date AS DATE)=', $date);
        $data = $this->db->get();
        if($data->num_rows()>0){
            return $data->row()->amt;
        }else{
            return 0;
        }
	}
	
	public function getOrderData($transaction_id,$merchant_id='')
    {
		$this->db->select('id,transactionId,merchant_id,mtxnID,amount,status');
		$this->db->from('orders');
		$this->db->where('transactionId',$transaction_id);
		$this->db->or_where('mtxnID',$transaction_id);
		return $this->db->get();
    }
	
	public function random_key_string($length = 25) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	public function get_client_ip() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
	
	public function validateTempRequest($enckKey){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('encKey',$enckKey);
		return $this->db->get();
	}
	
}
