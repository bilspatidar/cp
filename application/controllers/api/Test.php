<?php

   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

     
class Test extends REST_Controller {
    
	  /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
	   header('Access-Control-Allow-Origin: *');
	   $this->load->helper('security');
       $this->load->model('test_model');
	   $this->load->library('encrypt');
	}
	
	//generate_token
	public function generate_token_post() {
        
		$_POST = json_decode($this->input->raw_input_stream, true);
			
		// set validation rules
		$this->form_validation->set_rules('transaction_id','Transaction Id','trim|required|alpha_dash|is_unique[test_transactions.merchant_transaction_id]|xss_clean');
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
					$cardType 		= $this->test_model->check_cardType($cardnumber);
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
			$allCurrencyCode = $this->test_model->allCurrencyCode();
				
			if(in_array(strtoupper($currency), $allCurrencyCode)){
				if ($amount>0) {
					$merchant_id = $this->test_model->check_auth_client();
					if($merchant_id>0){
									
									$savedata['merchant_id'] 	= $merchant_id;
									$savedata['firstname'] 		= $firstname;
									$savedata['lastname'] 		= $lastname;
									$savedata['email'] 			= $email;
									$savedata['phone'] 			= $phone;
									$savedata['amount'] 		= $amount;
									$savedata['currency'] 		= $currency;
									$savedata['address'] 	    = $address;
									$savedata['city'] 	        = $city;
									$savedata['state'] 	        = $state;
									$savedata['country']        = $country;
									$savedata['callbackurl'] 	= $callbackurl;
									$savedata['cardnumber'] 	= $cardnumber;
									$savedata['expirymonth']    = $expirymonth;
									$savedata['expiryyear']     = $expiryyear;
									$savedata['cardholdername'] = $cardholdername;
									$savedata['cardcvv'] 	    = $cvv;
									$savedata['cardType'] 	    = $cardType;
									$savedata['requestMode'] 	= $requestMode;
									$savedata['mid']            = $mid;
									$savedata['token'] 			= $this->test_model->random_key_string();
									$savedata['status'] 		= 'Initiated';
									$savedata['merchant_transaction_id'] 	= $transaction_id;
									$savedata['initiated_datetime'] 		= date('Y-m-d H:i:s');
									if ($res = $this->test_model->create($savedata)) {
						
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
		
		$validateRequest = $this->test_model->validateRequest($token);
		if($validateRequest->num_rows()>0){
				$updateData = [
					'redirect_datetime'	=>date('Y-m-d H:i:s'),
					'status'	=>'Redirected',
					'token'		=>$token,
				];
				$this->test_model->updateData($updateData);
				
				redirect('http://localhost/cp/api/test/test_transactions/'.$token);
			
		}else{
			$this->response([ 'status' => FALSE, 'message' =>'Invalid Token.','errors' =>['Invalid Token.']], REST_Controller::HTTP_NOT_ACCEPTABLE,'','error');
		}
		
	}
	public function test_transactions_get($token=''){
		$validateRequest = $this->test_model->validateRequest($token);
		if($validateRequest->num_rows()>0){
			
			$page_data['row'] = $validateRequest->result();
			$this->load->view('test_transactions',$page_data);
		}else{
			$this->response([ 'status' => FALSE, 'message' =>'Invalid Token.','errors' =>['Invalid Token.']], REST_Controller::HTTP_NOT_ACCEPTABLE,'','error');
		}
	}
	
	public function pay_transaction_post($params='') {
			
            // set validation rules
            $this->form_validation->set_rules('cardnumber', 'Card Number', 'trim|required|numeric');
            $this->form_validation->set_rules('cardholdername', 'Cardholder Name', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('cardcvv', 'Cvv', 'trim|required|numeric');
        
            if ($this->form_validation->run() === false) {
                $array_error = array_map(function ($val) {
                    return str_replace(array("\r", "\n"), '', strip_tags($val));
                }, array_filter(explode(".", trim(strip_tags(validation_errors())))));
        
                $this->response([
                    'status' => FALSE,
                    'message' => 'Error in submit form',
                    'errors' => $array_error
                ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
            } else {
                // set variables from the form
				$id = $this->input->post('id');
                $cardnumber = $this->input->post('cardnumber');
                $data['cardnumber'] = $this->encrypt->encode($cardnumber);
                $cardcvv = $this->input->post('cardcvv');
                $data['cardcvv'] = $this->encrypt->encode($cardcvv);
                $data['cardholdername'] = $this->input->post('cardholdername');
				$expiry = $this->input->post('expiry');
				$expiry = explode('/',$expiry);
				$expirymonth = $expiry[0];
				$expiryyear = $expiry[1];
				$transaction_status = $this->input->post('transaction_status');
				$token = $this->input->post('token');
				if($transaction_status =='Success'){
					$message = 'Transaction Completed Successfully.';
				}else{
					$message = 'Transaction Failed.';
				}
				$data['message'] = $message;
				$data['transaction_status'] = $transaction_status;
				$data['payment_transaction_id'] = $this->test_model->random_key_string();
				
                $res = $this->test_model->update($data, $id);
        
                if ($res) {
					$updateData = [
							'callback_datetime'	=>date('Y-m-d H:i:s'),
							'status'	=>'Callback',
							'token'		=>$token,
					];
					$this->test_model->updateData($updateData);
					$this->test_model->sendWebhook($token);
					$callbackurl = $this->input->post('callbackurl');
					$merchant_transaction_id = $this->input->post('merchant_transaction_id');
					if(!empty($callbackurl)){
						$url=$callbackurl.'?status='.$transaction_status.'&message='.$message.'&Transaction_id='.$merchant_transaction_id;
						redirect($url);
					}
					
                    $final = array();
                    $final['status'] = true;
                    $final['message'] = 'Transaction successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'There was a problem. Please try again',
                        'errors' => [$this->db->error()]
                    ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
                }
            }
        
        
    }

	public function callback_get(){
		print_r($_GET);
	}
	public function webhook_post(){
		$jsonString = file_get_contents("php://input");
			$object = json_decode($jsonString);
			$array = json_decode(json_encode($object), true);
			$webhook['pg'] = 'merchant webhook';
			$webhook['name'] = $jsonString;
			$webhook['date'] = date('Y-m-d H:i:s');
			$this->db->insert('merchantWebhook',$webhook);
	}
	
}   	   
?>