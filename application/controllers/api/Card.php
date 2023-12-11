<?php
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

     
class Card extends REST_Controller {
    
	  /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
    public function __construct() {
       $this->cors_header();
       parent::__construct();
       $this->load->model('card_model');
	}

	
		//currency start
	public function card_get($id=''){   ///list data
		$getTokenData = $this->is_authorized('superadmin');
		$final = array();
                $final['status'] = true;
				$final['data'] = $this->card_model->get($id);
                $final['message'] = 'Card fetched successfully.';
                $this->response($final, REST_Controller::HTTP_OK); 
	}	
	public function card_post($params='') {
        
		if($params=='add'){
			$getTokenData = $this->is_authorized('superadmin');
			$usersData    = json_decode(json_encode($getTokenData), true);
			$session_id   =  $usersData['data']['users_id'];
			
		$_POST = json_decode($this->input->raw_input_stream, true);
			
		// set validation rules
		$this->form_validation->set_rules('name','Name','trim|required|alpha|is_unique[cards.name]');
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
			$name = $this->input->post('name');
			if(!empty($name)){
				$data['name'] = $name;
			}
			
			$data['status'] = 'Active';
			$data['added'] = date('Y-m-d H:i:s');
			$data['addedBy'] = $session_id;
			
			if ($res = $this->card_model->create($data)) {
				
				// user creation ok
				
                $final = array();
                $final['status'] = true;
				$final['data'] = $this->card_model->get($res);
                $final['message'] = 'Card created successfully.';
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
		$this->form_validation->set_rules('name', 'Name', 'trim|required|alpha');
		$this->form_validation->set_rules('symbol', 'Symbol', 'trim');
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
			$name = $this->input->post('name');
			if(!empty($name)){
				$data['name'] = $name;
			}
			
			$status = $this->input->post('status');
			if(!empty($status)){
				$data['status'] = $status;
			}
			
			$data['updatedBy'] = $session_id;
			$data['updated'] = date('Y-m-d H:i:s');
			$id = $this->input->post('id');
			$res = $this->card_model->update($data,$id);
			if ($res) {
				
				// user creation ok
                $final = array();
                $final['status'] = true;
				$final['data'] = $this->card_model->get($id);
                $final['message'] = 'Card updated successfully.';
                $this->response($final, REST_Controller::HTTP_OK); 

			} else {
								
				// user creation failed, this should never happen
                $this->response([ 'status' => FALSE,
                    'message' =>'There was a problem updating card. Please try again',
					'errors' =>[$this->db->error()]], REST_Controller::HTTP_BAD_REQUEST,'','error');
			}
			
		}
		}
	}
	
	public function card_delete($id)
    {
        $this->is_authorized('superadmin');
		
        $response = $this->card_model->delete($id);
		if($response){
			$this->response(['status' => true, 'message' => 'Card deleted successfully.'], REST_Controller::HTTP_OK);
		}else{
			$this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
		}
    }
	//currency end

}   
	   
?>