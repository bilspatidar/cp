<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Product_stock extends REST_Controller {

    public function __construct() {
        $this->cors_header();
        parent::__construct();
        $this->load->model('product_stock_model');
    }

    public function product_stock_list_post($id='') {
        $getTokenData = $this->is_authorized('superadmin');
        $filterData = json_decode($this->input->raw_input_stream, true);
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->product_stock_model->get($id,$filterData);
        $final['message'] = 'Product stock fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK);
    }

    public function product_stock_post($params='') {
        if($params=='add') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];

            $_POST = json_decode($this->input->raw_input_stream, true);

            // set validation rules
			$this->form_validation->set_rules('product_id', 'Product', 'trim|required|numeric');
			$this->form_validation->set_rules('qty', 'Quantity', 'trim|required');
			$this->form_validation->set_rules('type', 'Type', 'trim|required|alpha');
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
				
                $product_id = $this->input->post('product_id');
                if (!empty($product_id)) {
                    $data['product_id'] = $product_id;
                }
				$qty = $this->input->post('qty');
                if (!empty($qty)) {
                    $data['qty'] = $qty;
                }
				$type = $this->input->post('type');
                if (!empty($type)) {
                    $data['type'] = $type;
                }

                $data['added'] = date('Y-m-d H:i:s');
                $data['addedBy'] = $session_id;

                if ($res = $this->product_stock_model->create($data)) {
            
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->product_stock_model->get($res);
                    $final['message'] = 'Product stock created successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    $this->response([ 'status' => FALSE,
                        'message' =>'Error in submit form',
                        'errors' =>[$this->db->error()]], REST_Controller::HTTP_BAD_REQUEST,'','error');
                }
            }
        }
        // method for updating Product_stock
        if ($params == 'update') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];
        
            $_POST = json_decode($this->input->raw_input_stream, true);
        
            // set validation rules
            $this->form_validation->set_rules('product_id', 'Product', 'trim|required|numeric');
			$this->form_validation->set_rules('qty', 'Quantity', 'trim|required');
			$this->form_validation->set_rules('type', 'Type', 'trim|required|alpha');
        
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
				
                $product_id = $this->input->post('product_id');
                if (!empty($product_id)) {
                    $data['product_id'] = $product_id;
                }
				$qty = $this->input->post('qty');
                if (!empty($qty)) {
                    $data['qty'] = $qty;
                }
				$type = $this->input->post('type');
                if (!empty($type)) {
                    $data['type'] = $type;
                }
                
                $data['updatedBy'] = $session_id;
                $data['updated'] = date('Y-m-d H:i:s');
                $id = $this->input->post('id');
                $res = $this->product_stock_model->update($data, $id);
        
                if ($res) {
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->product_stock_model->get($id);
                    $final['message'] = 'Product stock updated successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'There was a problem updating Product stock. Please try again',
                        'errors' => [$this->db->error()]
                    ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
                }
            }
        }
    }

    public function product_stock_delete($id) {
        $this->is_authorized('superadmin');
        $response = $this->product_stock_model->delete($id);

        if ($response) {
            $this->response(['status' => true, 'message' => 'Product stock deleted successfully.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
