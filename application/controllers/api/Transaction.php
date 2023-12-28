<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Transaction extends REST_Controller {

    public function __construct() {
        $this->cors_header();
        parent::__construct();
        $this->load->model('Transaction_model');
    }

    public function transaction_list_post($id = '') {
        $getTokenData = $this->is_authorized('superadmin');
        $filterData = json_decode($this->input->raw_input_stream, true);
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->Transaction_model->getTransaction($filterData);  
        $final['message'] = 'Transactions fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK);
    }
    
    public function transaction_detail_post($id) {
        $getTokenData = $this->is_authorized('superadmin');
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->Transaction_model->getTransactionById($id);
        
        if ($final['data']) {
            $final['message'] = 'Transaction details fetched successfully.';
            $this->response($final, REST_Controller::HTTP_OK);
        } else {
            $final['message'] = 'Transaction not found.';
            $this->response($final, REST_Controller::HTTP_NOT_FOUND);
        }
    }
}

