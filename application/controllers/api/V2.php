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
		$this->form_validation->set_rules('transaction_id','Transaction Id','trim|required|alpha_dash|is_unique[tempRequest.transactionId]|xss_clean');
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
					$requestModeValue 	= '';
				}else{
					$cardholdername	= '';
					$cardnumber		= '';
					$expirymonth	= '';
					$expiryyear		= '';
					$cvv			= '';
					$cardType		= '';
					$requestModeValue 	= $this->security->xss_clean($this->input->post('upi_id'));	
				}
			}else{
				$cardholdername	= '';
				$cardnumber		= '';
				$expirymonth	= '';
				$expiryyear		= '';
				$cvv			= '';
				$cardType		= '';
				$requestModeValue 	= '';	
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
								$getOrderData = $this->v2_model->getOrderData($transaction_id);
								if($getOrderData->num_rows()<1){
									
									$savedata['merchant_id'] 	= $merchant_id;
									$savedata['firstname'] 		= $firstname;
									$savedata['lastname'] 		= $lastname;
									$savedata['email'] 			= $email;
									$savedata['phone'] 			= $phone;
									$savedata['amount'] 		= $amount;
									$savedata['currency'] 		= $currency;
									$savedata['transactionId'] 	= $transaction_id;
									$savedata['address'] 	    = $address;
									$savedata['city'] 	        = $city;
									$savedata['state'] 	        = $state;
									$savedata['country']        = $country;
									$savedata['callbackurl'] 	= $callbackurl;
									$savedata['encKey'] 		= $this->v2_model->random_key_string();
									$savedata['initiated'] 		= date('Y-m-d H:i:s');
									$savedata['status'] 		= 'In Progress';
									$savedata['cardNo'] 	    = $cardnumber;
									$savedata['expirymonth']    = $expirymonth;
									$savedata['expiryyear']     = $expiryyear;
									$savedata['cardholdername'] = $cardholdername;
									$savedata['cardCVC'] 	    = $cvv;
									$savedata['cardType'] 	    = $cardType;
									$savedata['requestMode'] 	= $requestMode;
									$savedata['requestModeValue']= $requestModeValue;
									$savedata['mid']            = $mid;
									$savedata['ptxnID'] 		= $this->v2_model->random_key_string();
									$savedata['web_url']        = $this->v2_model->get_client_ip();//$_SERVER['HTTP_HOST'];

									if ($res = $this->v2_model->create($savedata)) {
						
											$final = array();
											$final['status'] = true;
											$final['token'] = $savedata['encKey'];
											$final['message'] = 'Token generated.';
											$this->response($final, REST_Controller::HTTP_OK); 

									}else{
											$this->response([ 'status' => FALSE, 'message' =>'Your data not matches.','errors' =>['Your data not matches.']], REST_Controller::HTTP_NOT_ACCEPTABLE,'','error');
									}
								}
								else{
									$this->response([ 'status' => FALSE, 'message' =>'Duplicate transaction id.','errors' =>['Duplicate transaction id.']], REST_Controller::HTTP_NOT_ACCEPTABLE,'','error');
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

	public function validate_token_post(){
		$_POST = json_decode($this->input->raw_input_stream, true);
		$this->form_validation->set_rules('Token','Token','trim|required|alpha_dash|xss_clean');
		if ($this->form_validation->run() === false) {
			$array_error = array_map(function ($val) { return str_replace(array("\r", "\n"), '', strip_tags($val));}, array_filter(explode(".", trim(strip_tags(validation_errors())))));
            $this->response(['status' => FALSE,'message' =>'Bad request','errors' =>$array_error ], REST_Controller::HTTP_BAD_REQUEST,'','error');
			
		}else{
			$token = $this->security->xss_clean($this->input->post('Token'));
			$tempRequest = $this->v2_model->validateTempRequest($token);
			if($tempRequest->num_rows()>0){
				$merchant_id = $tempRequest->row()->merchant_id;
				$amount = $tempRequest->row()->amount;
				$currency = $tempRequest->row()->currency;
				$cardType = $tempRequest->row()->cardType;
				$country = $tempRequest->row()->country;
				$mid = $tempRequest->row()->mid;
				$check_auth_client = $this->v2_model->check_auth_client();
				if($check_auth_client>0){
					$payment = $this->v2_model->merchantPaymentGateway($merchant_id,$amount,$currency,$cardType,$country,$mid);
					if($payment=='1'){
						$this->response([ 'status' => FALSE, 'message' =>'Daily limit over.','errors' =>['Daily limit over.']], REST_Controller::HTTP_NOT_ACCEPTABLE,'','error');
					}elseif($payment>0){
						if($payment->num_rows()>0){
						$id 		= $payment->row()->id;
						$pencrypt_key = $payment->row()->encrypt_key;
						$methodName = $payment->row()->methodName;
						redirect('http://localhost/cp/'.$methodName.'/index/'.$id.'/'.$pencrypt_key.'/'.$token);
						//redirect(base_url().$methodName.'/index/'.$id.'/'.$pencrypt_key.'/'.$token);
						}else{
							$this->response([ 'status' => FALSE, 'message' =>'Resource not found.','errors' =>['Resource not found.']], REST_Controller::HTTP_NOT_FOUND,'','error');
						}
					}else{
						$this->response([ 'status' => FALSE, 'message' =>'Resource not found.','errors' =>['Resource not found.']], REST_Controller::HTTP_NOT_FOUND,'','error');
					}
				}
				else{
						$this->response([ 'status' => FALSE, 'message' =>'Unauthorized.'.$_SERVER['HTTP_HOST'],'errors' =>['Unauthorized.'.$_SERVER['HTTP_HOST'].'.']], REST_Controller::HTTP_UNAUTHORIZED,'','error');
					}
			}else{
				$this->response([ 'status' => FALSE, 'message' =>'Invalid Token.','errors' =>['Invalid Token.']], REST_Controller::HTTP_NOT_ACCEPTABLE,'','error');
			}
		}
	}
	

}   	   
?>