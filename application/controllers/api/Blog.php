<?php
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

class Blog extends REST_Controller {
    
    /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
    public function __construct() {
        $this->cors_header();
        parent::__construct();
        $this->load->model('blog_model');
    }

    // blog start
    public function blog_get($id='') {
        $getTokenData = $this->is_authorized('superadmin');
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->blog_model->get($id);
        $final['message'] = 'Blogs fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK); 
    }

    public function blog_post($params='') {
        if($params=='add') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];

            $_POST = json_decode($this->input->raw_input_stream, true);

            // set validation rules
            $this->form_validation->set_rules('title', 'Title', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('category_id', 'Category', 'trim|required|numeric');
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
                $category_id = $this->input->post('category_id');
                if (!empty($category_id)) {
                    $data['category_id'] = $category_id;
                }
				$title = $this->input->post('title');
                if (!empty($title)) {
                    $data['title'] = $title;
                }
				$description = $this->input->post('description');
                if (!empty($description)) {
                    $data['description'] = $description;
                }
				if (!empty($_POST['image'])) {
					$base64_image = $_POST['image'];
					$image_data = str_replace('data:image/jpeg;base64,', '', $base64_image);
					$image_data = base64_decode($image_data);
					$preName =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,6);
					$imageName = $preName."_".time().'.png';
					
					$uploads_dir = 'uploads/blog/';
					if(!file_exists($uploads_dir)) {
						mkdir($uploads_dir, 0777, true);  //create directory if not exist
					}
						$imageFullPath = $uploads_dir.$imageName;
					if(file_put_contents($imageFullPath,$image_data)){
						$data['image'] =  $imageName;
					}
				}
					
				$data['status'] = 'Active';
                $data['added'] = date('Y-m-d H:i:s');
                $data['addedBy'] = $session_id;

                if ($res = $this->blog_model->create($data)) {
                   
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->blog_model->get($res);
                    $final['message'] = 'Blog created successfully.';
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
			$this->form_validation->set_rules('title', 'Title', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('category_id', 'Category', 'trim|required|numeric');
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
				$id = $this->input->post('id');
                $category_id = $this->input->post('category_id');
                if (!empty($category_id)) {
                    $data['category_id'] = $category_id;
                }
				$title = $this->input->post('title');
                if (!empty($title)) {
                    $data['title'] = $title;
                }
				$description = $this->input->post('description');
                if (!empty($description)) {
                    $data['description'] = $description;
                }
				$status = $this->input->post('status');
                if (!empty($status)) {
                    $data['status'] = $status;
                }
				if (!empty($_POST['image'])) {
					$base64_image = $_POST['image'];
					$image_data = str_replace('data:image/jpeg;base64,', '', $base64_image);
					$image_data = base64_decode($image_data);
					$preName =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,6);
					$imageName = $preName."_".time().'.png';
					
					$uploads_dir = 'uploads/blog/';
					if(!file_exists($uploads_dir)) {
						mkdir($uploads_dir, 0777, true);  //create directory if not exist
					}
						$imageFullPath = $uploads_dir.$imageName;
					if(file_put_contents($imageFullPath,$image_data)){
						$data['image'] =  $imageName;
						$imgData = $this->db->get_where('blog',array('id'=>$id));
						if($imgData->num_rows()>0){
							$img =  $imgData->row()->image;
							$load_url = 'uploads/blog/'.$img;
							if(file_exists($load_url) && !empty($img))
							{
								unlink("uploads/blog/".$img);		
							}
						}
					}
				}
				
                $data['updatedBy'] = $session_id;
                $data['updated'] = date('Y-m-d H:i:s');
                
                $res = $this->blog_model->update($data, $id);
        
                if ($res) {
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->blog_model->get($id);
                    $final['message'] = 'Blog updated successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'There was a problem updating blog. Please try again',
                        'errors' => [$this->db->error()]
                    ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
                }
            }
        }
        
    }

    public function blog_delete($id) {
        $this->is_authorized('superadmin');
        $response = $this->blog_model->delete($id);

        if ($response) {
            $this->response(['status' => true, 'message' => 'Blog deleted successfully.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    // Blog end
}
