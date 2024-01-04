<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Test_transaction extends REST_Controller {

    public function __construct() {
        $this->cors_header();
        parent::__construct();
        $this->load->model('Test_transaction_model');
    }

    public function test_transaction_list_post($id = '') {
        $getTokenData = $this->is_authorized('superadmin');
        $filterData = json_decode($this->input->raw_input_stream, true);
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->Test_transaction_model->getTransaction($id,$filterData);  
        $final['message'] = 'Test Transactions fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK);
    }
    
    public function test_transaction_detail_get($id) {
        $getTokenData = $this->is_authorized('superadmin');
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->Test_transaction_model->getTransaction($id);
        
        if ($final['data']) {
            $final['message'] = 'Test Transaction details fetched successfully.';
            $this->response($final, REST_Controller::HTTP_OK);
        } else {
            $final['message'] = 'Test Transaction not found.';
            $this->response($final, REST_Controller::HTTP_NOT_FOUND);
        }
    }
}

