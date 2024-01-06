<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Brand extends REST_Controller {

    public function __construct() {
        $this->cors_header();
        parent::__construct();
        $this->load->model('brand_model');
    }

    // Brand start
    public function brand_list_post($id='') {
        $getTokenData = $this->is_authorized('superadmin');
        $filterData = json_decode($this->input->raw_input_stream, true);
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->brand_model->get($id,$filterData);
        $final['message'] = 'Brand fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK);
    }

    public function brand_post($params='') {
        if($params=='add') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];

            $_POST = json_decode($this->input->raw_input_stream, true);

            // set validation rules
            $this->form_validation->set_rules('name', 'Brand Name', 'trim|required|alpha_numeric_spaces');

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
				
                $name = $this->input->post('name');
                if (!empty($name)) {
                    $data['name'] = $name;
                }
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
				$uploadFolder = 'brand'; // Change this to your desired folder name

				$data['image'] = $this->upload_media->upload_and_save($base64_image, $quality, $radioConfig, $uploadFolder);
			}
				////image  
                $data['status'] = 'Active';
                $data['added'] = date('Y-m-d H:i:s');
                $data['addedBy'] = $session_id;

                if ($res = $this->brand_model->create($data)) {
            
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->brand_model->get($res);
                    $final['message'] = 'Brand created successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    $this->response([ 'status' => FALSE,
                        'message' =>'Error in submit form',
                        'errors' =>[$this->db->error()]], REST_Controller::HTTP_BAD_REQUEST,'','error');
                }
            }
        }
        // method for updating Brand
        if ($params == 'update') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];
        
            $_POST = json_decode($this->input->raw_input_stream, true);
        
            // set validation rules
            $this->form_validation->set_rules('name', 'Brand Name', 'trim|required|alpha_numeric_spaces');
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
				$uploadFolder = 'brand'; // Change this to your desired folder name

				$data['image'] = $this->upload_media->upload_and_save($base64_image, $quality, $radioConfig, $uploadFolder);
				
				$imgData = $this->db->get_where('brand',array('id'=>$id));
				if($imgData->num_rows()>0){
					$img =  $imgData->row()->image;
					if(file_exists($img) && !empty($img))
					{
						unlink($img);		
					}
				}
			}
				////image  
                $res = $this->brand_model->update($data, $id);
        
                if ($res) {
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->brand_model->get($id);
                    $final['message'] = 'Brand updated successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'There was a problem updating Brand. Please try again',
                        'errors' => [$this->db->error()]
                    ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
                }
            }
        }
    }

    public function brand_delete($id) {
        $this->is_authorized('superadmin');
        $response = $this->brand_model->delete($id);

        if ($response) {
            $this->response(['status' => true, 'message' => 'Brand deleted successfully.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
