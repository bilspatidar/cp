<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @extends CI_Model
 */
class Test_model extends CI_Model {

	protected $table      = 'test_transactions';
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
	public function update($data, $id) {
        $response = $this->db->update($this->table, $data, array($this->primaryKey=>$id));
        return $this->db->affected_rows();
    }
	public function create($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id(); 
	}
	public function check_auth_client(){
		$host =  $_SERVER['HTTP_HOST'];
		
		$api_key =  $this->input->get_request_header('api-key', TRUE);
		$mid = $this->input->get_request_header('mid', TRUE);
        $this->db->select('users.users_id');
        $this->db->from('users');
		$this->db->join('merchant_keys','users.users_id = merchant_keys.merchant_id');
        $this->db->where('merchant_keys.api_key',$api_key);
		if(!empty($mid)){
			$this->db->where('merchant_keys.title',$mid);
		}
        $this->db->where('users.isDelete',0);
        $this->db->where('users.status','Active');
		
        $getMerchat = $this->db->get();
        if($getMerchat->num_rows()==1){
            return $getMerchat->row()->users_id;
        } else {
			return 0;
		}
    }
	
	public function check_cardType($cc, $extra_check = false){
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

	public function random_key_string($length = 25) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	public function validateRequest($token){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('token',$token);
		return $this->db->get();
	}
	public function updateData($array){
		if(!empty($array['status'])){
			$data['status']        	= $array['status'];
		}
		if(!empty($array['payment_status'])){
			$data['payment_status']   = $array['payment_status'];
		}
		if(!empty($array['redirect_datetime'])){
			$data['redirect_datetime']        	= $array['redirect_datetime'];
		}
		if(!empty($array['callback_datetime'])){
			$data['callback_datetime']        	= $array['callback_datetime'];
		}
        $token 	= $array['token'];
		$this->db->where('token',$token);
		$result = $this->db->update($this->table,$data);
		if($result){
			return 1;
		}else{
			return 0;
		}
	}
	
	public function sendCallback($backUrl,$mtxn_id,$status,$message){
		
	return  $form .='<form id="backUrlForm" action="'.$backUrl.'" method="POST" onsubmit="event.preventDefault()">
			<input type="hidden" name="status" value="'.$status.'" >
			<input type="hidden" name="message" value="'.$message.'" >
			<input type="hidden" name="Transaction_id" value="'.$mtxn_id.'" >
			</form>
			<script>
			document.getElementById("backUrlForm").submit();
			</script>
			';
	}
	
	//get webhook url 
	public function getWebhookUrl($merchant_id,$mid=''){
		$this->db->select('id,webhook_url');
		$this->db->from('merchant_keys');
		$this->db->where('merchant_id',$merchant_id);
		if(!empty($mid)){
			$this->db->where('title',$mid);
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
						'status'		=>$check->row()->transaction_status,
						'amount'		=>$check->row()->amount,
						'currency'		=>$check->row()->currency,
						'email'			=>$check->row()->email,
						'phone'			=>$check->row()->phone,
						'firstname'	    =>$check->row()->firstname,
						'lastname'		=>$check->row()->lastname,
						'message'		=>$check->row()->message,
					];
					$merchantResponse = $this->test_model->setResponseString($webhookResponse);
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
					
					$merchantWebHook['name'] = $post_data;
					$merchantWebHook['date'] = date('Y-m-d H:i:s');
					$this->db->insert('merchantWebhook',$merchantWebHook);
					}
				}
		}
	}
	public function setResponseString($responseData){
		$Response = [
						'transaction_id'=>$responseData['transaction_id'],
						'status'		=>$responseData['status'],
						'message'		=>$responseData['message'],
						'amount'		=>$responseData['amount'],
						'currency'		=>$responseData['currency'],
						'email'			=>$responseData['email'],
						'phone'			=>$responseData['phone'],
						'firstname'		=>$responseData['firstname'],
						'lastname'		=>$responseData['lastname']
					];
		return $Response;
	}
	
}
