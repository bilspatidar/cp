<?php
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

class Faq extends REST_Controller {
    
    /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
    public function __construct() {
        $this->cors_header();
        parent::__construct();
        $this->load->model('faq_model');
		$this->load->helper("security");
    }

    public function faq_get($id='') {
        $getTokenData = $this->is_authorized('superadmin');
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->faq_model->get($id);
        $final['message'] = 'FAQ fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK); 
    }

    public function faq_post($params='') {
        if($params=='add') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];

            $_POST = json_decode($this->input->raw_input_stream, true);

            // set validation rules
            $this->form_validation->set_rules('question', 'Question', 'trim|required|xss_clean');
            $this->form_validation->set_rules('answer', 'Answer', 'trim|required|xss_clean');
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
               
				$question = $this->input->post('question');
                if (!empty($question)) {
                    $data['question'] = $question;
                }
				$answer = $this->input->post('answer');
                if (!empty($answer)) {
                    $data['answer'] = $answer;
                }
				
					
				$data['status'] = 'Active';
                $data['added'] = date('Y-m-d H:i:s');
                $data['addedBy'] = $session_id;

                if ($res = $this->faq_model->create($data)) {
                   
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->faq_model->get($res);
                    $final['message'] = 'FAQ created successfully.';
                    $this->response($final, REST_Controller::HTTP_OK); 
                } else {
                    $this->response([ 'status' => FALSE,
                        'message' =>'Error in submit form',
                        'errors' =>[$this->db->error()]], REST_Controller::HTTP_BAD_REQUEST,'','error');
                }
            }
        }

        if ($params == 'update') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];
        
            $_POST = json_decode($this->input->raw_input_stream, true);
        
            // set validation rules
			$this->form_validation->set_rules('question', 'Question', 'trim|required|xss_clean');
			$this->form_validation->set_rules('answer', 'Answer', 'trim|required|xss_clean');
            $this->form_validation->set_rules('status', 'Status', 'trim|alpha');
        
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
           
				$question = $this->input->post('question');
                if (!empty($question)) {
                    $data['question'] = $question;
                }
				$answer = $this->input->post('answer');
                if (!empty($answer)) {
                    $data['answer'] = $answer;
                }
				$status = $this->input->post('status');
                if (!empty($status)) {
                    $data['status'] = $status;
                }
				
				
                $data['updatedBy'] = $session_id;
                $data['updated'] = date('Y-m-d H:i:s');
                
                $res = $this->faq_model->update($data, $id);
        
                if ($res) {
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->faq_model->get($id);
                    $final['message'] = 'FAQ updated successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'There was a problem updating faq. Please try again',
                        'errors' => [$this->db->error()]
                    ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
                }
            }
        }
        
    }

    public function faq_delete($id) {
        $this->is_authorized('superadmin');
        $response = $this->faq_model->delete($id);

        if ($response) {
            $this->response(['status' => true, 'message' => 'FAQ deleted successfully.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
