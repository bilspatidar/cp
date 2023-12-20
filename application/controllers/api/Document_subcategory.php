<?php
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

class Document_subcategory extends REST_Controller {
    
    /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
    public function __construct() {
        $this->cors_header();
        parent::__construct();
         $this->load->model('document_subcategory_model');
    }

    //document_subcategory start
	public function document_subcategory_parent_get($id='') {
        $getTokenData = $this->is_authorized('superadmin');
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->document_subcategory_model->document_subcategory_parent($id);
        $final['message'] = 'Document Category parents document subcategory fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK); 
    }
    public function document_subcategory_get($id='') {
        $getTokenData = $this->is_authorized('superadmin');
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->document_subcategory_model->get($id);
        $final['message'] = 'Document subcategory fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK); 
    }

    public function document_subcategory_post($params='') {
        if($params=='add') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];

            $_POST = json_decode($this->input->raw_input_stream, true);

            // set validation rules
            $this->form_validation->set_rules('name', 'Document subcategory Name', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('document_category_id', 'Document category_id', 'trim|required|numeric');
            
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

                $document_category_id = $this->input->post('document_category_id');
                if (!empty($document_category_id)) {
                    $data['document_category_id'] = $document_category_id;
                }

                $data['status'] = 'Active';
                

                if ($res = $this->document_subcategory_model->create($data)) {
                    // document_subcategory creation ok
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->document_subcategory_model->get($res);
                    $final['message'] = 'Document subcategory created successfully.';
                    $this->response($final, REST_Controller::HTTP_OK); 
                } else {
                    // document_subcategory creation failed, this should never happen
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
            $this->form_validation->set_rules('name', 'Document subcategory Name', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('document_category_id', 'Document category_id', 'trim|required|numeric');
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

                $document_category_id = $this->input->post('document_category_id');
                if (!empty($document_category_id)) {
                    $data['document_category_id'] = $document_category_id;
                }
        
                $status = $this->input->post('status');
                if (!empty($status)) {
                    $data['status'] = $status;
                }
        
                $id = $this->input->post('id');
                $res = $this->document_subcategory_model->update($data, $id);
        
                if ($res) {
                    // document_subcategory update ok
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->document_subcategory_model->get($id);
                    $final['message'] = 'Document subcategory updated successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    // document_subcategory update failed, this should never happen
                    $this->response([
                        'status' => FALSE,
                        'message' => 'There was a problem updating document_subcategory. Please try again',
                        'errors' => [$this->db->error()]
                    ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
                }
            }
        }
        
    }

    public function document_subcategory_delete($id) {
        $this->is_authorized('superadmin');
        $response = $this->document_subcategory_model->delete($id);

        if ($response) {
            $this->response(['status' => true, 'message' => 'Document subcategory deleted successfully.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    // document_subcategory end
}
