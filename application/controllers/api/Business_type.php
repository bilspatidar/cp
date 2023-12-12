<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Business_type extends REST_Controller {

    public function __construct() {
        $this->cors_header();
        parent::__construct();
        $this->load->model('business_type_model');
    }

    // Business_type start
    public function business_type_get($id='') {
        $getTokenData = $this->is_authorized('superadmin');
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->business_type_model->get($id);
        $final['message'] = 'Business_type fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK);
    }

    public function business_type_post($params='') {
        if($params=='add') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];

            $_POST = json_decode($this->input->raw_input_stream, true);

            // set validation rules
            $this->form_validation->set_rules('name', 'Business_type Name', 'trim|required|alpha_numeric_spaces');

            // ... (any additional validation rules)

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
                $data['added'] = date('Y-m-d H:i:s');
                $data['addedBy'] = $session_id;

                if ($res = $this->business_type_model->create($data)) {
                    // business_type creation ok
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->business_type_model->get($res);
                    $final['message'] = 'Business_type created successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    // business_type creation failed, this should never happen
                    $this->response([ 'status' => FALSE,
                        'message' =>'Error in submit form',
                        'errors' =>[$this->db->error()]], REST_Controller::HTTP_BAD_REQUEST,'','error');
                }
            }
        }
        // method for updating business_type
        if ($params == 'update') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];
        
            $_POST = json_decode($this->input->raw_input_stream, true);
        
            // set validation rules
            $this->form_validation->set_rules('name', 'Business_type Name', 'trim|required|alpha_numeric_spaces');
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
        
                $data['updatedBy'] = $session_id;
                $data['updated'] = date('Y-m-d H:i:s');
                $id = $this->input->post('id');
                $res = $this->business_type_model->update($data, $id);
        
                if ($res) {
                    // Business_type update ok
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->business_type_model->get($id);
                    $final['message'] = 'Business_type updated successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    // sub_category update failed, this should never happen
                    $this->response([
                        'status' => FALSE,
                        'message' => 'There was a problem updating Business_type. Please try again',
                        'errors' => [$this->db->error()]
                    ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
                }
            }
        }
    }

    public function business_type_delete($id) {
        $this->is_authorized('superadmin');
        $response = $this->business_type_model->delete($id);

        if ($response) {
            $this->response(['status' => true, 'message' => 'Business_type deleted successfully.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    // Business_type end
}
