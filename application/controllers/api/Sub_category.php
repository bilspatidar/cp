<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Sub_category extends REST_Controller {

    public function __construct() {
        $this->cors_header();
        parent::__construct();
        $this->load->model('sub_category_model');
    }

    // Sub_category start
    public function sub_category_get($id='') {
        $getTokenData = $this->is_authorized('superadmin');
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->sub_category_model->get($id);
        $final['message'] = 'Sub_category fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK);
    }

    public function sub_category_post($params='') {
        if($params=='add') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];

            $_POST = json_decode($this->input->raw_input_stream, true);

            // set validation rules
            $this->form_validation->set_rules('name', 'Sub_category Name', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('category_id', 'category_id', 'trim|required|numeric');

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

                $category_id = $this->input->post('category_id');
                if (!empty($category_id)) {
                    $data['category_id'] = $category_id;
                }

                $data['status'] = 'Active';
                $data['added'] = date('Y-m-d H:i:s');
                $data['addedBy'] = $session_id;

                if ($res = $this->sub_category_model->create($data)) {
                    // sub_category creation ok
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->sub_category_model->get($res);
                    $final['message'] = 'Sub_category created successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    // sub_category creation failed, this should never happen
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
            $this->form_validation->set_rules('name', 'Sub_category Name', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('category_id', 'Category ID', 'trim|required|numeric');
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
                $name = $this->input->post('Name');
                if (!empty($name)) {
                    $data['name'] = $name;
                }

                $category_id = $this->input->post('category_id');
                if (!empty($category_id)) {
                    $data['category_id'] = $category_id;
                }
        
                $status = $this->input->post('status');
                if (!empty($status)) {
                    $data['status'] = $status;
                }
        
                $data['updatedBy'] = $session_id;
                $data['updated'] = date('Y-m-d H:i:s');
                $id = $this->input->post('id');
                $res = $this->sub_category_model->update($data, $id);
        
                if ($res) {
                    // sub_category update ok
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->sub_category_model->get($id);
                    $final['message'] = 'sub_category updated successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    // sub_category update failed, this should never happen
                    $this->response([
                        'status' => FALSE,
                        'message' => 'There was a problem updating sub_category. Please try again',
                        'errors' => [$this->db->error()]
                    ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
                }
            }
        }
    

    }

    public function sub_category_delete($id) {
        $this->is_authorized('superadmin');
        $response = $this->sub_category_model->delete($id);

        if ($response) {
            $this->response(['status' => true, 'message' => 'Sub_category deleted successfully.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    // Sub_category end
}
