<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @extends CI_Model
 */
class V2_model extends CI_Model {

	protected $table      = 'transaction';
	protected $primaryKey = 'id';
	protected $token	  = 'token';
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
	public function createPaymentGateway($data) {
		$this->db->select('*');
		$this->db->from('transaction_payment_gateway');
		if(isset($data['transaction_id']) && !empty($data['transaction_id'])){
			$this->db->where('transaction_id',$data['transaction_id']);
		}
		if(isset($data['payment_id']) && !empty($data['payment_id'])){
			$this->db->where('payment_id',$data['payment_id']);
		}
		$check = $this->db->get();
		if($check->num_rows()>0){
			$id = $check->row()->id;
			$data['updated'] = date('Y-m-d H:i:s');
			$this->db->where('id',$id);
			$this->db->update('transaction_payment_gateway',$data);
			return $this->db->affected_rows();
		}else{
			$this->db->insert('transaction_payment_gateway', $data);
			return $this->db->insert_id(); 
		}
	}
	
	public function update($data, $token) {
        $response = $this->db->update($this->table, $data, array($this->token=>$token));
        return $this->db->affected_rows();
    }
	public function validateToken($token){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->token,$token);
		return $this->db->get();
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
	
	
	
	//get webhook url 
	public function getWebhookUrl($merchant_id,$mid=''){
		$this->db->select('id,webhook_url');
		$this->db->from('merchant_keys');
		$this->db->where('merchant_id',$merchant_id);
		if(!empty($mid)){
			$this->db->where('mid',$mid);
		}
		return $this->db->get();
	}
	//end
	public function setResponseString($responseData){
		$Response = [
			'transaction_id'=>$responseData['transaction_id'],
			'status'		=>$responseData['status'],
			'amount'		=>$responseData['amount'],
			'currency'		=>$responseData['currency'],
			'email'			=>$responseData['email'],
			'phone'			=>$responseData['phone'],
			'firstname'		=>$responseData['firstname'],
			'lastname'		=>$responseData['lastname'],
			'message'		=>$responseData['message']
			
		];
		return $Response;
	}
	
	public function getPaymentGateway($id,$encrypt_key=''){
		$this->db->select('id,encrypt_key,name,live_api,live_secret,test_api,test_secret,transaction_charge,live_url,test_url,methodName,daily_limit,amount_mt,base_url');
		$this->db->from('payment_gateway');
		$this->db->where('status','Active');
		$this->db->where('id',$id);
		if(!empty($encrypt_key)){
			$this->db->where('encrypt_key',$encrypt_key);
		}
		return $this->db->get();
	}
	
	public function sendWebhook($token){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('token',$token);
		$check = $this->db->get();
		if($check->num_rows()>0){
			$merchant_id = $check->row()->merchant_id;
			$mid = $check->row()->mid;
			$getWebhook = $this->getWebhookUrl($merchant_id,$mid);
			if($getWebhook->num_rows()>0){
					$webhook_url = $getWebhook->row()->webhook_url;
					if(!empty($webhook_url)){
					$webhookResponse = [
						'transaction_id'=>$check->row()->merchant_transaction_id,
						'status'		=>$check->row()->status,
						'amount'		=>$check->row()->amount,
						'currency'		=>$check->row()->currency,
						'email'			=>$check->row()->email,
						'phone'			=>$check->row()->phone,
						'firstname'	    =>$check->row()->firstname,
						'lastname'		=>$check->row()->lastname,
						'message'		=>$check->row()->message,
					];
					$merchantResponse = $this->setResponseString($webhookResponse);
					$url = $webhook_url;
					$post_data = json_encode($merchantResponse);
					$headers = [
					 'Content-Type: application/json',
					];
					$curl = curl_init($url);                                                                            
					curl_setopt($curl, CURLOPT_POST, true);                                                             
					curl_setopt($curl, CURLOPT_POSTFIELDS,$post_data);                                    
					curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
					curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
					$response = curl_exec($curl);  
					curl_close($curl);
					
					$merchantWebHook = [
						'webhook'			=>	$post_data,
						'webhook_datetime'	=>	date('Y-m-d H:i:s')
					];
					$this->v2_model->update($merchantWebHook,$token);
					return $merchantResponse;
					}
				}
		}
	}
	
	public function sendCallback($paymentCallback,$refrence,$status,$message){
		$transaction_id = $this->Common->get_col_by_key('transaction','token',$refrence,'id');
		$payment_id = $this->Common->get_col_by_key('transaction','token',$refrence,'payment_id');
		$merchant_transaction_id = $this->Common->get_col_by_key('transaction','token',$refrence,'merchant_transaction_id');
		$callbackurl = $this->Common->get_col_by_key('transaction','token',$refrence,'callbackurl');
		if(!empty($callbackurl)){
			$callbackResponse=$callbackurl.'?status='.$status.'&message='.$message.'&Transaction_id='.$merchant_transaction_id;
			$paymentData = [
				'transaction_id'	=>	$transaction_id,
				'payment_id'		=>	$payment_id,
				'callback'			=>	json_encode($paymentCallback),
				'callback_datetime'	=>	date('Y-m-d H:i:s')
			];
			$this->v2_model->createPaymentGateway($paymentData);
			$transactionData = [
				'status'			=>$status,
				'message'			=>$message,
				'callback'			=>$callbackResponse,
				'callback_datetime'	=>	date('Y-m-d H:i:s')
			];
			$this->v2_model->update($transactionData,$refrence);
			return $callbackResponse;
		}else{
			return false;
		}
	}

	public function updatePaymentGateway($jsonString,$token) {
		$transaction_id = $this->Common->get_col_by_key('transaction','token',$token,'id');
		$payment_id = $this->Common->get_col_by_key('transaction','token',$token,'payment_id');
		$paymentData = [
			'transaction_id'	=>	$transaction_id,
			'payment_id'		=>	$payment_id,
			'webhook'			=>	$jsonString,
			'webhook_datetime'	=>	date('Y-m-d H:i:s')
		];
		$response = $this->v2_model->createPaymentGateway($paymentData);
		if($response){
			return true;
		}else{
			return false;
		}
	}
	public function saveData($data,$token){
		$data['transaction_datetime'] = date('Y-m-d H:i:s');
		$response = $this->v2_model->update($data,$token);
		if($response){
			return true;
		}else{
			return false;
		}
	}
}
