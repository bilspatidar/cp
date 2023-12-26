<?php
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

     
class V2 extends REST_Controller {
    
	  /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
	   header('Access-Control-Allow-Origin: *');
	   $this->load->helper('security');
       $this->load->model('v2_model');
	   $this->load->library('encrypt');
	}
	
	//generate_token
	public function generate_token_post() {
        
		$_POST = json_decode($this->input->raw_input_stream, true);
			
		// set validation rules
		$this->form_validation->set_rules('transaction_id','Transaction Id','trim|required|alpha_dash|is_unique[transaction.merchant_transaction_id]|xss_clean');
		$this->form_validation->set_rules('firstname','First Name','trim|required|alpha|min_length[3]|xss_clean');
		$this->form_validation->set_rules('lastname','Last Name','trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('phone','Phone no.','trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('amount','Amount','trim|required|integer|xss_clean');
		$this->form_validation->set_rules('currency','Currency','trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('address','Address','trim|required|alpha_numeric_spaces|xss_clean');
		$this->form_validation->set_rules('city','City','trim|required|alpha_numeric_spaces|xss_clean');
		$this->form_validation->set_rules('state','State','trim|required|alpha_numeric_spaces|xss_clean');
		$this->form_validation->set_rules('country','Country','trim|required|alpha_numeric_spaces|xss_clean');
		$this->form_validation->set_rules('callbackurl','Callback Url','trim|valid_url|xss_clean');
		
		$this->form_validation->set_rules('requestMode','Request Mode','trim|alpha|xss_clean');
		
		$requestMode = $this->security->xss_clean($this->input->post('requestMode'));
		if(isset($requestMode) && !empty($requestMode) && $requestMode='Card'){
				$this->form_validation->set_rules('cardholdername','Card Holdername','trim|required|alpha_numeric_spaces|xss_clean');
				$this->form_validation->set_rules('cardnumber','Card Number','trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('expirymonth','Expiry Month','trim|required|numeric|xss_clean|min_length[2]|regex_match[/^[0-9]{2}$/]');
				$this->form_validation->set_rules('expiryyear','Expiry Year','trim|required|numeric|xss_clean|min_length[4]|regex_match[/^[0-9]{4}$/]');
				$this->form_validation->set_rules('cvv','Card CVV','trim|required|numeric|xss_clean|min_length[3]');
		}

		if ($this->form_validation->run() === false) {
			$array_error = array_map(function ($val) { return str_replace(array("\r", "\n"), '', strip_tags($val));}, array_filter(explode(".", trim(strip_tags(validation_errors())))));
            $this->response(['status' => FALSE,'message' =>'Bad request','errors' =>$array_error ], REST_Controller::HTTP_BAD_REQUEST,'','error');
			
		}else{
			$transaction_id = $this->security->xss_clean($this->input->post('transaction_id'));
			$firstname 		= $this->security->xss_clean($this->input->post('firstname'));
			$lastname 		= $this->security->xss_clean($this->input->post('lastname'));
			$phone 			= $this->security->xss_clean($this->input->post('phone'));
			$email 			= $this->security->xss_clean($this->input->post('email'));
			$amount 		= $this->security->xss_clean($this->input->post('amount'));
			$currency 		= $this->security->xss_clean($this->input->post('currency'));
			$address 		= $this->security->xss_clean($this->input->post('address'));
			$city 			= $this->security->xss_clean($this->input->post('city'));
			$state 			= $this->security->xss_clean($this->input->post('state'));
			$country 		= $this->security->xss_clean($this->input->post('country'));
			$callbackurl 	= $this->security->xss_clean($this->input->post('callbackurl'));
			if(isset($requestMode) && !empty($requestMode)){
				if($requestMode='Card'){
					$cardholdername = $this->security->xss_clean($this->input->post('cardholdername'));
					$cardnumber 	= $this->security->xss_clean($this->input->post('cardnumber'));
					$expirymonth 	= $this->security->xss_clean($this->input->post('expirymonth'));
					$expiryyear 	= $this->security->xss_clean($this->input->post('expiryyear'));
					$cvv 			= $this->security->xss_clean($this->input->post('cvv'));
					$cardType 		= $this->v2_model->check_cc($cardnumber);
					$cardnumber 	= $this->encrypt->encode($cardnumber);
					$cvv 			= $this->encrypt->encode($cvv);
				}else{
					$cardholdername	= '';
					$cardnumber		= '';
					$expirymonth	= '';
					$expiryyear		= '';
					$cvv			= '';
					$cardType		= '';
				}
			}else{
				$cardholdername	= '';
				$cardnumber		= '';
				$expirymonth	= '';
				$expiryyear		= '';
				$cvv			= '';
				$cardType		= '';	
			}
			if($this->input->get_request_header('mid')){
				$mid = $this->input->get_request_header('mid', TRUE);
				if(isset($mid) && !empty($mid)){
					$mid = $mid;
				}else{
					$mid = '';
				}
			}else {
				$mid = '';
			}
			$allCurrencyCode = $this->v2_model->allCurrencyCode();
				
			if(in_array(strtoupper($currency), $allCurrencyCode)){
				if ($amount>0) {
					$merchant_id = $this->v2_model->check_auth_client();
					if($merchant_id>0){
							$payment = $this->v2_model->merchantPaymentGateway($merchant_id,$amount,$currency,$cardType,$country,$mid);
						if($payment=='1'){
							$this->response([ 'status' => FALSE, 'message' =>'Daily limit over.','errors' =>['Daily limit over.']], REST_Controller::HTTP_NOT_ACCEPTABLE,'','error');
						}elseif($payment>0){
							if($payment->num_rows()>0){
									$_POST['cardnumber'] = $cardnumber;
									$_POST['cvv'] = $cvv;
									$request = json_encode($_POST,JSON_UNESCAPED_SLASHES);
									
									$savedata['merchant_id'] 	= $merchant_id;
									$savedata['firstname'] 		= $firstname;
									$savedata['lastname'] 		= $lastname;
									$savedata['email'] 			= $email;
									$savedata['phone'] 			= $phone;
									$savedata['amount'] 		= $amount;
									$savedata['currency'] 		= $currency;
									$savedata['merchant_transaction_id'] 	= $transaction_id;
									$savedata['address'] 	    = $address;
									$savedata['city'] 	        = $city;
									$savedata['state'] 	        = $state;
									$savedata['country']        = $country;
									$savedata['callbackurl'] 	= $callbackurl;
									$savedata['token'] 			= $this->v2_model->random_key_string();
									$savedata['initiated_datetime'] = date('Y-m-d H:i:s');
									$savedata['status'] 		= 'Pending';
									$savedata['cardnumber'] 	= $cardnumber;
									$savedata['expirymonth']    = $expirymonth;
									$savedata['expiryyear']     = $expiryyear;
									$savedata['cardholdername'] = $cardholdername;
									$savedata['cardcvv'] 	    = $cvv;
									$savedata['cardType'] 	    = $cardType;
									$savedata['requestMode'] 	= $requestMode;
									$savedata['mid']            = $mid;
									$savedata['request']            = $request;
									if ($res = $this->v2_model->create($savedata)) {
						
											$final = array();
											$final['status'] = true;
											$final['token'] = $savedata['token'];
											$final['message'] = 'Token generated successfully.';
											$this->response($final, REST_Controller::HTTP_OK); 

									}else{
											$this->response([ 'status' => FALSE, 'message' =>'Your data not matches.','errors' =>['Your data not matches.']], REST_Controller::HTTP_NOT_ACCEPTABLE,'','error');
									}
								
							}
							else{
								$this->response([ 'status' => FALSE, 'message' =>'Resource not found.','errors' =>['Resource not found.']], REST_Controller::HTTP_NOT_FOUND,'','error');
							}
						}
						else{
							$this->response([ 'status' => FALSE, 'message' =>'Resource not found.','errors' =>['Resource not found.']], REST_Controller::HTTP_NOT_FOUND,'','error');
						}
					}
					else{
						$this->response([ 'status' => FALSE, 'message' =>'Unauthorized.'.$_SERVER['HTTP_HOST'],'errors' =>['Unauthorized.'.$_SERVER['HTTP_HOST'].'.']], REST_Controller::HTTP_UNAUTHORIZED,'','error');
					}
				}
				else{
					$this->response([ 'status' => FALSE, 'message' =>'Amount should be integer.','errors' =>['Amount should be integer.']], REST_Controller::HTTP_NOT_ACCEPTABLE,'','error');
				}
			}else{
				$this->response([ 'status' => FALSE, 'message' =>'Invalid Currency Code.','errors' =>['Invalid Currency Code.']], REST_Controller::HTTP_NOT_ACCEPTABLE,'','error');
			}
		}
	}
	//generate_token end
	public function validate_token_get($token=''){
		
		$validateToken = $this->v2_model->validateToken($token);
		if($validateToken->num_rows()>0){
				$updateData = [
					'redirect_datetime'	=>	date('Y-m-d H:i:s')
				];
				$this->v2_model->update($updateData,$token);
				$transaction_id= $validateToken->row()->id;
				$merchant_id= $validateToken->row()->merchant_id;
				$amount 	= $validateToken->row()->amount;
				$currency 	= $validateToken->row()->currency;
				$cardType 	= $validateToken->row()->cardType;
				$country 	= $validateToken->row()->country;
				$mid 		= $validateToken->row()->mid;
				$request 	= $validateToken->row()->request;
				
				$payment = $this->v2_model->merchantPaymentGateway($merchant_id,$amount,$currency,$cardType,$country,$mid);
					if($payment=='1'){
						$this->response([ 'status' => FALSE, 'message' =>'Daily limit over.','errors' =>['Daily limit over.']], REST_Controller::HTTP_NOT_ACCEPTABLE,'','error');
					}elseif($payment>0){
						if($payment->num_rows()>0){
							$id 		= $payment->row()->id;
							$pencrypt_key = $payment->row()->encrypt_key;
							$methodName = $payment->row()->methodName;
							$this->v2_model->update(array('payment_id'=>$id),$token);
							$paymentData = [
								'transaction_id'	=>	$transaction_id,
								'payment_id'		=>	$id,
								'request'			=>	$request,
								'added'				=>	date('Y-m-d H:i:s')
							];
							$this->v2_model->createPaymentGateway($paymentData);
							$this->load->library($methodName);
							$result = $this->$methodName->payment($id,$pencrypt_key,$token);
							
							if($pencrypt_key=='IudkjaA0hMdD1OmJpCtral9jY'){ //centpays
								
								$responseData = json_decode($result, TRUE);
								if(isset($responseData['status']) && $responseData['status'] == 'Success') {
									$redirectUrl =  "https://centpays.com/v2/ini_payment/".$responseData['token'];
									echo $redirectUrl;exit();
									redirect($redirectUrl);
								}else{
									$response =$this->v2_model->sendCallback($responseData,$token,'Failed',$responseData['message']);
									if(!empty($response)){
										$this->v2_model->sendWebhook($token);
										redirect($response);
									}
								}
							}
						}else{
							$this->response([ 'status' => FALSE, 'message' =>'Resource not found.','errors' =>['Resource not found.']], REST_Controller::HTTP_NOT_FOUND,'','error');
						}
					}else{
						$this->response([ 'status' => FALSE, 'message' =>'Resource not found.','errors' =>['Resource not found.']], REST_Controller::HTTP_NOT_FOUND,'','error');
					}
		}else{
			$this->response([ 'status' => FALSE, 'message' =>'Invalid Token.','errors' =>['Invalid Token.']], REST_Controller::HTTP_NOT_ACCEPTABLE,'','error');
		}
		
	}
	
	public function merchant_callback_post($params =''){
		if($params=='IudkjaA0hMdD1OmJpCtral9jY'){ //centpays
			//print_r($_POST);
			$transaction_status = $_POST['status'];
			$message = $_POST['message'];
		
			if($transaction_status == 'Success'){
				$status = 'Success';
			}elseif($transaction_status == 'Failed'){
				$status = 'Failed';
			}else{
				$status = 'Pending';
			}
			$response =$this->v2_model->sendCallback($_POST,$_POST['Transaction_id'],$status,$message);
			if(!empty($response)){
				redirect($response);
			}
		}
	}
	public function webhook_post($params =''){
		if($params=='IudkjaA0hMdD1OmJpCtral9jY'){ //centpays
			
			$jsonString = file_get_contents("php://input");
			$object = json_decode($jsonString);
			$array = json_decode(json_encode($object), true);
			$webhook['payment_key'] = $params;
			$webhook['webhook'] = $jsonString;
			$webhook['added'] = date('Y-m-d H:i:s');
			$this->db->insert('paymentWebhook',$webhook);
			
			$amount 	= $array['amount'];
			$transactionId 	= $array['transaction_id'];
			$message 	= $array['message'];
			$transaction_status = $array['status'];
			$merchant_reference	 = $array['transaction_id'];
			
			if(!empty($merchant_reference)){
				$this->v2_model->updatePaymentGateway($jsonString,$merchant_reference);
				
				if($transaction_status == 'Success'){
					$status = 'Success';
				}elseif($transaction_status == 'Failed'){
					$status = 'Failed';
				}else{
					$status = 'Pending';
				}
				$transactionData = [
					'payment_transaction_id'=>$transactionId,
					'status'	=>	$status,
					'message'	=>	$message,
					'amount'	=>	$amount
				];
				$this->v2_model->saveData($transactionData,$merchant_reference);
				$this->v2_model->sendWebhook($merchant_reference);
			}
		}
	}
	public function callback_get(){
		print_r($_GET);
	}
}   	   
?>