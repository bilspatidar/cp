<?php
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

     
class Currency extends REST_Controller {
    
	  /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
    public function __construct() {
	   $this->cors_header();
       parent::__construct();
       $this->load->model('currency_model');
	}

	
		//currency start
	public function currency_get($id=''){   ///list data
		$getTokenData = $this->is_authorized('superadmin');
		$final = array();
                $final['status'] = true;
				$final['data'] = 	$this->currency_model->get($id);
                $final['message'] = 'Currency fetched successfully.';
                $this->response($final, REST_Controller::HTTP_OK); 
	}	
	public function currency_post($params='') {
        
		if($params=='add'){
			$getTokenData = $this->is_authorized('superadmin');
			$usersData    = json_decode(json_encode($getTokenData), true);
			$session_id   =  $usersData['data']['users_id'];
			
		$_POST = json_decode($this->input->raw_input_stream, true);
			
		// set validation rules
		$this->form_validation->set_rules('currency_name','Currency Name','trim|required|alpha_numeric_spaces|is_unique[currency.currency_name]');
		$this->form_validation->set_rules('currency_code','Currency Code','trim|required|alpha_numeric');
		if ($this->form_validation->run() === false) {
       $array_error = array_map(function ($val) {
    return str_replace(array("\r", "\n"), '', strip_tags($val));
}, array_filter(explode(".", trim(strip_tags(validation_errors())))));
            $this->response([
                    'status' => FALSE,
                    'message' =>'Error in submit form',
					'errors' =>$array_error
              ], REST_Controller::HTTP_BAD_REQUEST,'','error');
			
		} else {
			
			// set variables from the form
			$currency_name = $this->input->post('currency_name');
			if(!empty($currency_name)){
				$data['currency_name'] = $currency_name;
			}
			$currency_code = $this->input->post('currency_code');
			if(!empty($currency_code)){
				$data['currency_code'] = $currency_code;
			}
			$symbol = $this->input->post('symbol');
			if(!empty($symbol)){
				$data['symbol'] = $symbol;
			}
			$data['status'] = 'Active';
			$data['added'] = date('Y-m-d H:i:s');
			$data['addedBy'] = $session_id;
			
			if ($res = $this->currency_model->create($data)) {
				
				// user creation ok
				
                $final = array();
                $final['status'] = true;
				$final['data'] = $this->currency_model->get($res);
                $final['message'] = 'Currency created successfully.';
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
			$usersData = json_decode(json_encode($getTokenData), true);
			$session_id =  $usersData['data']['users_id'];
			
		$_POST = json_decode($this->input->raw_input_stream, true);
		// set validation rules
		$this->form_validation->set_rules('currency_name', 'Currency Name', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('currency_code', 'currency_code', 'trim|required|alpha_numeric');
		if ($this->form_validation->run() === false) {
			
$array_error = array_map(function ($val) {
    return str_replace(array("\r", "\n"), '', strip_tags($val));
}, array_filter(explode(".", trim(strip_tags(validation_errors())))));
            $this->response([
                    'status' => FALSE,
                    'message' =>'Error in submit form',
					'errors' =>$array_error
              ], REST_Controller::HTTP_BAD_REQUEST,'','error');
			
		} else {
			
			// set variables from the form
			$currency_name = $this->input->post('currency_name');
			if(!empty($currency_name)){
				$data['currency_name'] = $currency_name;
			}
			$currency_code = $this->input->post('currency_code');
			if(!empty($currency_code)){
				$data['currency_code'] = $currency_code;
			}
		
			$status = $this->input->post('status');
			if(!empty($status)){
				$data['status'] = $status;
			}
			
			$data['updatedBy'] = $session_id;
			$data['updated'] = date('Y-m-d H:i:s');
			$id = $this->input->post('id');
			$res = $this->currency_model->update($data,$id);
			if ($res) {
				
				// user creation ok
                $final = array();
                $final['status'] = true;
				$final['data'] = $this->currency_model->get($id);
                $final['message'] = 'Currency updated successfully.';
                $this->response($final, REST_Controller::HTTP_OK); 

			} else {
								
				// user creation failed, this should never happen
                $this->response([ 'status' => FALSE,
                    'message' =>'There was a problem updating currency. Please try again',
					'errors' =>[$this->db->error()]], REST_Controller::HTTP_BAD_REQUEST,'','error');
			}
			
		}
		}
	}
	
	public function currency_delete($id)
    {
        $this->is_authorized('superadmin');
		
        $response = $this->currency_model->delete($id);
		if($response){
			$this->response(['status' => true, 'message' => 'Currency deleted successfully.'], REST_Controller::HTTP_OK);
		}else{
			$this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
		}
    }
	//currency end

}   
	   
?>