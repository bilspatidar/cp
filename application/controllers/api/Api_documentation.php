<?php
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

class Api_documentation extends REST_Controller {
    
    /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
    public function __construct() {
        $this->cors_header();
        parent::__construct();
        $this->load->model('api_documentation_model');
    }

    // Api documentation start
    public function api_documentation_list_post($id='') {
        $getTokenData = $this->is_authorized('superadmin');
		$filterData = json_decode($this->input->raw_input_stream, true);
		
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->api_documentation_model->get($id,$filterData);
        $final['message'] = 'Api documentation fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK); 
    }

    public function api_documentation_post($params='') {
        if($params=='add') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];

            $_POST = json_decode($this->input->raw_input_stream, true);

            // set validation rules
            $this->form_validation->set_rules('method', 'Method Name', 'trim|alpha_numeric_spaces');
            $this->form_validation->set_rules('menu_name', 'Menu Name', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('url', 'Url', 'trim|valid_url');
            $this->form_validation->set_rules('header', 'Header', 'trim');
            $this->form_validation->set_rules('request', 'Request', 'trim');
            $this->form_validation->set_rules('response', 'Response', 'trim');
            $this->form_validation->set_rules('description', 'Description', 'trim');
            $this->form_validation->set_rules('details', 'Details', 'trim');
            $this->form_validation->set_rules('example', 'Example', 'trim');
            $this->form_validation->set_rules('arrange', 'Arrange', 'trim|numeric');

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
                $method = $this->input->post('method');
                if (!empty($method)) {
                    $data['method'] = $method;
                }

                $menu_name = $this->input->post('menu_name');
                if (!empty($menu_name)) {
                    $data['menu_name'] = $menu_name;
                }
				$title = $this->input->post('title');
                if (!empty($title)) {
                    $data['title'] = $title;
                }
				$url = $this->input->post('url');
                if (!empty($url)) {
                    $data['url'] = $url;
                }
				$header = $this->input->post('header');
                if (!empty($header)) {
                    $data['header'] = $header;
                }
				$request = $this->input->post('request');
                if (!empty($request)) {
                    $data['request'] = $request;
                }
				$response = $this->input->post('response');
                if (!empty($response)) {
                    $data['response'] = $response;
                }
				$description = $this->input->post('description');
                if (!empty($description)) {
                    $data['description'] = $description;
                }
				$details = $this->input->post('details');
                if (!empty($details)) {
                    $data['details'] = $details;
                }
				$example = $this->input->post('example');
                if (!empty($example)) {
                    $data['example'] = $example;
                }
				$arrange = $this->input->post('arrange');
                if (!empty($arrange)) {
                    $data['arrange'] = $arrange;
                }

                $data['status'] = 'Active';
                $data['added'] = date('Y-m-d H:i:s');
                $data['addedBy'] = $session_id;

                if ($res = $this->api_documentation_model->create($data)) {
                    // Api documentation creation ok
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->api_documentation_model->get($res);
                    $final['message'] = 'Api documentation created successfully.';
                    $this->response($final, REST_Controller::HTTP_OK); 
                } else {
                    // Api documentation creation failed, this should never happen
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
            $this->form_validation->set_rules('method', 'Method Name', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('menu_name', 'Menu Name', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('url', 'Url', 'trim|required|valid_url');
            $this->form_validation->set_rules('header', 'Header', 'trim');
            $this->form_validation->set_rules('request', 'Request', 'trim');
            $this->form_validation->set_rules('response', 'Response', 'trim');
            $this->form_validation->set_rules('description', 'Description', 'trim');
            $this->form_validation->set_rules('details', 'Details', 'trim');
            $this->form_validation->set_rules('example', 'Example', 'trim');
            $this->form_validation->set_rules('arrange', 'Arrange', 'trim|numeric');
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
                $method = $this->input->post('method');
                if (!empty($method)) {
                    $data['method'] = $method;
                }

                $menu_name = $this->input->post('menu_name');
                if (!empty($menu_name)) {
                    $data['menu_name'] = $menu_name;
                }
				$title = $this->input->post('title');
                if (!empty($title)) {
                    $data['title'] = $title;
                }
				$url = $this->input->post('url');
                if (!empty($url)) {
                    $data['url'] = $url;
                }
				$header = $this->input->post('header');
                if (!empty($header)) {
                    $data['header'] = $header;
                }
				$request = $this->input->post('request');
                if (!empty($request)) {
                    $data['request'] = $request;
                }
				$response = $this->input->post('response');
                if (!empty($response)) {
                    $data['response'] = $response;
                }
				$description = $this->input->post('description');
                if (!empty($description)) {
                    $data['description'] = $description;
                }
				$details = $this->input->post('details');
                if (!empty($details)) {
                    $data['details'] = $details;
                }
				$example = $this->input->post('example');
                if (!empty($example)) {
                    $data['example'] = $example;
                }
				$arrange = $this->input->post('arrange');
                if (!empty($arrange)) {
                    $data['arrange'] = $arrange;
                }
        
                $status = $this->input->post('status');
                if (!empty($status)) {
                    $data['status'] = $status;
                }
        
                $data['updatedBy'] = $session_id;
                $data['updated'] = date('Y-m-d H:i:s');
                $id = $this->input->post('id');
                $res = $this->api_documentation_model->update($data, $id);
        
                if ($res) {
                    // Api documentation update ok
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->api_documentation_model->get($id);
                    $final['message'] = 'Api documentation updated successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    // Api documentation update failed, this should never happen
                    $this->response([
                        'status' => FALSE,
                        'message' => 'There was a problem updating Api documentation. Please try again',
                        'errors' => [$this->db->error()]
                    ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
                }
            }
        }
        
    }

    public function api_documentation_delete($id) {
        $this->is_authorized('superadmin');
        $response = $this->api_documentation_model->delete($id);

        if ($response) {
            $this->response(['status' => true, 'message' => 'Api documentation deleted successfully.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    // Api documentation end
}
