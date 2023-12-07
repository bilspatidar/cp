<?php
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

     
class Paymentgateway extends REST_Controller {
    
	  /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->model('Payment_gateway_model');
	   header('Access-Control-Allow-Origin: *');
	}
	
	//payment gateways start
	public function payment_gateway_get($id=''){   ///list data
		$getTokenData = $this->is_authorized('superadmin');
		$final = array();
		$final['status'] = true;
		$final['data'] = $this->Payment_gateway_model->get($id);
		$final['message'] = 'Payment gateway fetched successfully.';
		$this->response($final, REST_Controller::HTTP_OK); 
	}	
	public function payment_gateway_post($params='') {
        
		if($params=='add'){
			$getTokenData = $this->is_authorized('superadmin');
			$usersData    = json_decode(json_encode($getTokenData), true);
			$session_id   =  $usersData['data']['users_id'];
			
		$_POST = json_decode($this->input->raw_input_stream, true);
			
		// set validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('short_name', 'Short Name', 'trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('live_api', 'Live Api', 'trim');
		$this->form_validation->set_rules('live_secret', 'Live Secret', 'trim');
		$this->form_validation->set_rules('test_api', 'Test Api', 'trim');
		$this->form_validation->set_rules('test_secret', 'Test Secret', 'trim');
		$this->form_validation->set_rules('test_url', 'Test Url', 'valid_url');
		$this->form_validation->set_rules('live_url', 'Live Url', 'valid_url');
		$this->form_validation->set_rules('daily_limit', 'Daily Limit', 'numeric');
		$this->form_validation->set_rules('minLimit', 'Minimum Limit', 'numeric');
		$this->form_validation->set_rules('maxLimit', 'Maximum Limit', 'numeric');
		$this->form_validation->set_rules('range', 'Range', 'numeric');
		$this->form_validation->set_rules('methodName', 'Method Name','trim|is_unique[payment_gateway.methodName]');
		$this->form_validation->set_rules('currency[]','Currency', 'required');
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
            $array_error = array_map(function ($val) {
				return str_replace(array("\r", "\n"), '', strip_tags($val));
			}, array_filter(explode(".", trim(strip_tags(validation_errors())))));
            $this->response([
                    'status' => FALSE,
					'errors' =>$array_error,
                    'message' =>'Error in submit form'
              ], REST_Controller::HTTP_BAD_REQUEST,'','error');
			
		} else {
			
			// set variables from the form
			$currency = $this->input->post('currency');
			if(!empty($currency)){
			$currencyCode = implode(',',$currency);
			$data['currency']	= $currencyCode;
			}
			$cards = $this->input->post('cards');
			if(!empty($cards)){
			$cardsCode = implode(',',$cards);
			$data['cards']	= $cardsCode;
			}
			$name = $this->input->post('name');
			if(!empty($name)){
				$data['name'] = $name;
			}
			$short_name = $this->input->post('short_name');
			if(!empty($short_name)){
				$data['short_name'] = $short_name;
			}
			$live_api = $this->input->post('live_api');
			if(!empty($live_api)){
				$data['live_api'] = $live_api;
			}
			$live_secret = $this->input->post('live_secret');
			if(!empty($live_secret)){
				$data['live_secret'] = $live_secret;
			}
			$test_api = $this->input->post('test_api');
			if(!empty($test_api)){
				$data['test_api'] = $test_api;
			}
			$test_secret = $this->input->post('test_secret');
			if(!empty($test_secret)){
				$data['test_secret'] = $test_secret;
			}
			$test_url = $this->input->post('test_url');
			if(!empty($test_url)){
				$data['test_url'] = $test_url;
			}
			$live_url = $this->input->post('live_url');
			if(!empty($live_url)){
				$data['live_url'] = $live_url;
			}
			$daily_limit = $this->input->post('daily_limit');
			if(!empty($daily_limit)){
				$data['daily_limit'] = $daily_limit;
			}
			$minLimit = $this->input->post('minLimit');
			if(!empty($minLimit)){
				$data['minLimit'] = $minLimit;
			}
			$maxLimit = $this->input->post('maxLimit');
			if(!empty($maxLimit)){
				$data['maxLimit'] = $maxLimit;
			}
			$range = $this->input->post('range');
			if(!empty($range)){
				$data['range'] = $range;
			}
			$blocked_country = $this->input->post('blocked_country');
			if(!empty($blocked_country)){
				$data['blocked_country'] = $blocked_country;
			}
			$methodName = $this->input->post('methodName');
			if(!empty($methodName)){
				$data['methodName'] = $methodName;
			}
			$data['encrypt_key'] = $this->Common->random_key_string();
			$data['status'] = 'Active';
			$data['added'] = date('Y-m-d H:i:s');
			$data['addedBy'] = $session_id;
			
			if ($res = $this->Payment_gateway_model->create($data)) {
				
				// user creation ok
				
                $final = array();
                $final['status'] = true;
				$final['data'] = $this->Payment_gateway_model->get($res);
                $final['message'] = 'Payment Gateway created successfully.';
                $this->response($final, REST_Controller::HTTP_OK); 

			} else {
				
				// user creation failed, this should never happen
				$this->response([ 'status' => FALSE,
                    'message' =>'Error in submit form',
					'errors' =>[$this->db->error()]], REST_Controller::HTTP_BAD_REQUEST,'','error');
			}
			
		}
		}
		if($params=='update'){
			
			$getTokenData = $this->is_authorized('superadmin');
			$usersData    = json_decode(json_encode($getTokenData), true);
			$session_id   =  $usersData['data']['users_id'];
			
		$_POST = json_decode($this->input->raw_input_stream, true);
		// set validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('short_name', 'Short Name', 'trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('live_api', 'Live Api', 'trim');
		$this->form_validation->set_rules('live_secret', 'Live Secret', 'trim');
		$this->form_validation->set_rules('test_api', 'Test Api', 'trim');
		$this->form_validation->set_rules('test_secret', 'Test Secret', 'trim');
		$this->form_validation->set_rules('test_url', 'Test Url', 'valid_url');
		$this->form_validation->set_rules('live_url', 'Live Url', 'valid_url');
		$this->form_validation->set_rules('daily_limit', 'Daily Limit', 'numeric');
		$this->form_validation->set_rules('minLimit', 'Minimum Limit', 'numeric');
		$this->form_validation->set_rules('maxLimit', 'Maximum Limit', 'numeric');
		$this->form_validation->set_rules('range', 'Range', 'numeric');
		$this->form_validation->set_rules('methodName', 'Method Name','trim');
		$this->form_validation->set_rules('currency[]','Currency', 'required');
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
            $array_error = array_map(function ($val) {
				return str_replace(array("\r", "\n"), '', strip_tags($val));
			}, array_filter(explode(".", trim(strip_tags(validation_errors())))));
            $this->response([
                    'status' => FALSE,
					'errors' =>$array_error,
                    'message' =>'Error in submit form'
              ], REST_Controller::HTTP_BAD_REQUEST,'','error');
			
		} else {
			
			// set variables from the form
			$currency = $this->input->post('currency');
			if(!empty($currency)){
			$currencyCode = implode(',',$currency);
			$data['currency']	= $currencyCode;
			}
			$cards = $this->input->post('cards');
			if(!empty($cards)){
			$cardsCode = implode(',',$cards);
			$data['cards']	= $cardsCode;
			}
			$name = $this->input->post('name');
			if(!empty($name)){
				$data['name'] = $name;
			}
			$short_name = $this->input->post('short_name');
			if(!empty($short_name)){
				$data['short_name'] = $short_name;
			}
			$live_api = $this->input->post('live_api');
			if(!empty($live_api)){
				$data['live_api'] = $live_api;
			}
			$live_secret = $this->input->post('live_secret');
			if(!empty($live_secret)){
				$data['live_secret'] = $live_secret;
			}
			$test_api = $this->input->post('test_api');
			if(!empty($test_api)){
				$data['test_api'] = $test_api;
			}
			$test_secret = $this->input->post('test_secret');
			if(!empty($test_secret)){
				$data['test_secret'] = $test_secret;
			}
			$test_url = $this->input->post('test_url');
			if(!empty($test_url)){
				$data['test_url'] = $test_url;
			}
			$live_url = $this->input->post('live_url');
			if(!empty($live_url)){
				$data['live_url'] = $live_url;
			}
			$daily_limit = $this->input->post('daily_limit');
			if(!empty($daily_limit)){
				$data['daily_limit'] = $daily_limit;
			}
			$minLimit = $this->input->post('minLimit');
			if(!empty($minLimit)){
				$data['minLimit'] = $minLimit;
			}
			$maxLimit = $this->input->post('maxLimit');
			if(!empty($maxLimit)){
				$data['maxLimit'] = $maxLimit;
			}
			$range = $this->input->post('range');
			if(!empty($range)){
				$data['range'] = $range;
			}
			$blocked_country = $this->input->post('blocked_country');
			if(!empty($blocked_country)){
				$data['blocked_country'] = $blocked_country;
			}
			$methodName = $this->input->post('methodName');
			if(!empty($methodName)){
				$data['methodName'] = $methodName;
			}
			$status = $this->input->post('status');
			if(!empty($status)){
				$data['status'] = $status;
			}
			
			$data['updatedBy'] = $session_id;
			$data['updated'] = date('Y-m-d H:i:s');
			$id = $this->input->post('id');
			$res = $this->Payment_gateway_model->update($data,$id);
			if ($res) {
				
				// user creation ok
                $final = array();
                $final['status'] = true;
				$final['data'] = $this->Payment_gateway_model->get($id);
                $final['message'] = 'Payment Gateway updated successfully.';
                $this->response($final, REST_Controller::HTTP_OK); 

			} else {
				
				// user creation failed, this should never happen
				$this->response([ 'status' => FALSE,
                    'message' =>'There was a problem updating payment gateway. Please try again',
					'errors' =>[$this->db->error()]], REST_Controller::HTTP_BAD_REQUEST,'','error');
			}
			
		}
		}
	}
	
	public function payment_gateway_delete($id)
    {
        $this->is_authorized('superadmin');
		
        $response = $this->Payment_gateway_model->delete($id);
		if($response){
			$this->response(['status' => true, 'message' => 'Payment Gateway deleted successfully.'], REST_Controller::HTTP_OK);
		}else{
			$this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
		}
    }
	//payment gateways end
	
	
}
       
	   
?>