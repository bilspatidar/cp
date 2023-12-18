<?php
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

class City extends REST_Controller {
    
    /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
    public function __construct() {
        $this->cors_header();
        parent::__construct();
        $this->load->model('city_model');
    }

    // City start
    public function parent_city_get($id='') {
        $getTokenData = $this->is_authorized('superadmin');
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->city_model->parent_city($id);
        $final['message'] = 'State parents city fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK); 
    }
	public function city_get($id='') {
        $getTokenData = $this->is_authorized('superadmin');
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->city_model->get($id);
        $final['message'] = 'Cities fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK); 
    }

    public function city_post($params='') {
        if($params=='add') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];

            $_POST = json_decode($this->input->raw_input_stream, true);

            // set validation rules
            $this->form_validation->set_rules('name', 'City Name', 'trim|required|alpha_numeric_spaces|is_unique[cities.name]');
            $this->form_validation->set_rules('state_id', 'State', 'trim|required|numeric');

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

                $state_id = $this->input->post('state_id');
                if (!empty($state_id)) {
                    $data['state_id'] = $state_id;
                }

                $data['status'] = 'Active';
                $data['added'] = date('Y-m-d H:i:s');
                $data['addedBy'] = $session_id;

                if ($res = $this->city_model->create($data)) {
                    // city creation ok
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->city_model->get($res);
                    $final['message'] = 'City created successfully.';
                    $this->response($final, REST_Controller::HTTP_OK); 
                } else {
                    // City creation failed, this should never happen
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
            $this->form_validation->set_rules('name', 'City Name', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('state_id', 'State', 'trim|required|numeric');
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
                $name = $this->input->post('name');
                if (!empty($name)) {
                    $data['name'] = $name;
                }

                $state_id = $this->input->post('state_id');
                if (!empty($state_id)) {
                    $data['state_id'] = $state_id;
                }
        
                $status = $this->input->post('status');
                if (!empty($status)) {
                    $data['status'] = $status;
                }
        
                $data['updatedBy'] = $session_id;
                $data['updated'] = date('Y-m-d H:i:s');
                $id = $this->input->post('id');
                $res = $this->city_model->update($data, $id);
        
                if ($res) {
                    // city update ok
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->city_model->get($id);
                    $final['message'] = 'City updated successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    // City update failed, this should never happen
                    $this->response([
                        'status' => FALSE,
                        'message' => 'There was a problem updating city. Please try again',
                        'errors' => [$this->db->error()]
                    ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
                }
            }
        }
        
    }

    public function city_delete($id) {
        $this->is_authorized('superadmin');
        $response = $this->city_model->delete($id);

        if ($response) {
            $this->response(['status' => true, 'message' => 'City deleted successfully.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    // City end
}
