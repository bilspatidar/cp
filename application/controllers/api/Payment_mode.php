<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Payment_mode extends REST_Controller {

    public function __construct() {
        $this->cors_header();
        parent::__construct();
        $this->load->model('payment_mode_model');
    }


    public function payment_mode_list_post($id='') {
        $getTokenData = $this->is_authorized('superadmin');
        $filterData = json_decode($this->input->raw_input_stream, true);
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->payment_mode_model->get($id,$filterData);
        $final['message'] = 'Payment mode fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK);
    }

    public function payment_mode_post($params='') {
        if($params=='add') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];

            $_POST = json_decode($this->input->raw_input_stream, true);

            // set validation rules
            $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha_numeric_spaces');

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

                if ($res = $this->payment_mode_model->create($data)) {

                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->payment_mode_model->get($res);
                    $final['message'] = 'Payment mode created successfully.';
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
            $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha_numeric_spaces');
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
                $res = $this->payment_mode_model->update($data, $id);
        
                if ($res) {
                    
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->payment_mode_model->get($id);
                    $final['message'] = 'Payment mode updated successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                   
                    $this->response([
                        'status' => FALSE,
                        'message' => 'There was a problem updating Payment mode. Please try again',
                        'errors' => [$this->db->error()]
                    ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
                }
            }
        }
    }

    public function payment_mode_delete($id) {
        $this->is_authorized('superadmin');
        $response = $this->payment_mode_model->delete($id);

        if ($response) {
            $this->response(['status' => true, 'message' => 'Payment mode deleted successfully.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

}
