<?php
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

class Document_category extends REST_Controller {
    
    /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
    public function __construct() {
        $this->cors_header();
        parent::__construct();
        $this->load->model('document_category_model');
    }

    //document_category start
    public function document_category_list_post($id='') {
        $getTokenData = $this->is_authorized('superadmin');
		$filterData = json_decode($this->input->raw_input_stream, true);
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->document_category_model->get($id,$filterData);
        $final['message'] = 'Document_category fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK); 
    }

    public function document_category_post($params='') {
        if($params=='add') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];

            $_POST = json_decode($this->input->raw_input_stream, true);

            // set validation rules
            $this->form_validation->set_rules('name', 'document_category Name', 'trim|required|alpha_numeric_spaces');
           
            
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
                if (!empty($name)) {
                    $data['name'] = $name;
                }


                $data['status'] = 'Active';
                

                if ($res = $this->document_category_model->create($data)) {
                    // document_category creation ok
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->document_category_model->get($res);
                    $final['message'] = 'Document_category created successfully.';
                    $this->response($final, REST_Controller::HTTP_OK); 
                } else {
                    // document_category creation failed, this should never happen
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
            $this->form_validation->set_rules('name', 'Document_category Name', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('status', 'Status', 'trim');
        
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
                $name = $this->input->post('name');
                if (!empty($name)) {
                    $data['name'] = $name;
                }

        
                $status = $this->input->post('status');
                if (!empty($status)) {
                    $data['status'] = $status;
                }
        
                $id = $this->input->post('id');
                $res = $this->document_category_model->update($data, $id);
        
                if ($res) {
                    // document_category update ok
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->document_category_model->get($id);
                    $final['message'] = 'Document_category updated successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    // document_category update failed, this should never happen
                    $this->response([
                        'status' => FALSE,
                        'message' => 'There was a problem updating document_category. Please try again',
                        'errors' => [$this->db->error()]
                    ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
                }
            }
        }
        
    }

    public function document_category_delete($id) {
        $this->is_authorized('superadmin');
        $response = $this->document_category_model->delete($id);

        if ($response) {
            $this->response(['status' => true, 'message' => 'Document_category deleted successfully.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    // document_category end
}
