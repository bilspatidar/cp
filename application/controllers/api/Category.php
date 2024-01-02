<?php
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

class Category extends REST_Controller {
    
    /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
	

    public function __construct() {
        $this->cors_header();
        parent::__construct();
        $this->load->model('category_model');
    }

    // Category start
    public function category_list_post($id='') {
        $getTokenData = $this->is_authorized('superadmin');
        $filterData = json_decode($this->input->raw_input_stream, true);
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->category_model->get($id,$filterData);
        $final['message'] = 'Category fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK); 
    }

    public function category_post($params='') {
        if($params=='add') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];

            $_POST = json_decode($this->input->raw_input_stream, true);

            // set validation rules
            $this->form_validation->set_rules('name', 'Category Name', 'trim|required|alpha_numeric_spaces|is_unique[category.name]');
            $this->form_validation->set_rules('shortName', 'ShortName', 'trim|required|alpha_numeric_spaces|is_unique[category.shortName]');
            $this->form_validation->set_rules('shortName', 'ShortName', 'trim|required|alpha_numeric_spaces');
            
           

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

                $shortName = $this->input->post('shortName');
                if (!empty($shortName)) {
                    $data['shortName'] = $shortName;
                }

                $data['status'] = 'Active';
                $data['added'] = date('Y-m-d H:i:s');
                $data['addedBy'] = $session_id;
				
				///image 
				if(!empty($_POST['image'])){
				$base64_image = $_POST['image'];
				$quality = 90;
                $radioConfig = [
                'resize' => [
                'width' => 500,
                'height' => 300
                ]
            // Add more configurations as needed
                 ];
				$uploadFolder = 'category'; // Change this to your desired folder name

				$data['image'] = $this->upload_media->upload_and_save($base64_image, $quality, $radioConfig, $uploadFolder);
			}
				////image  

                if ($res = $this->category_model->create($data)) {
                    // category creation ok
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->category_model->get($res);
                    $final['message'] = 'Category created successfully.';
                    $this->response($final, REST_Controller::HTTP_OK); 
                } else {
                    // category creation failed, this should never happen
					//$this->response($base64_image, REST_Controller::HTTP_OK);
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
            $this->form_validation->set_rules('name', 'Category Name', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('shortName', 'ShortName', 'trim|required|alpha_numeric_spaces');
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

                $shortName = $this->input->post('shortName');
                if (!empty($shortName)) {
                    $data['shortName'] = $shortName;
                }
        
                $status = $this->input->post('status');
                if (!empty($status)) {
                    $data['status'] = $status;
                }
        
                $data['updatedBy'] = $session_id;
                $data['updated'] = date('Y-m-d H:i:s');
                $id = $this->input->post('id');
                $res = $this->category_model->update($data, $id);
        
                if ($res) {
                    // category update ok
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->category_model->get($id);
                    $final['message'] = 'Category updated successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    // category update failed, this should never happen
                    $this->response([
                        'status' => FALSE,
                        'message' => 'There was a problem updating category. Please try again',
                        'errors' => [$this->db->error()]
                    ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
                }
            }
        }
        
    }

    public function category_delete($id) {
        $this->is_authorized('superadmin');
        $response = $this->category_model->delete($id);

        if ($response) {
            $this->response(['status' => true, 'message' => 'Category deleted successfully.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    // Category end
}
