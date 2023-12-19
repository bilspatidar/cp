<?php
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

class Pages extends REST_Controller {
    
    /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
    public function __construct() {
        $this->cors_header();
        parent::__construct();
        $this->load->model('pages_model');
		$this->load->helper("security");
    }

    public function pages_get($id='') {
        $getTokenData = $this->is_authorized('superadmin');
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->pages_model->get($id);
        $final['message'] = 'Data fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK); 
    }

    public function pages_post($params='') {
        if($params=='add') {	
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];

            $_POST = json_decode($this->input->raw_input_stream, true);

            // set validation rules
            $this->form_validation->set_rules('title', 'Title', 'trim|required|alpha_numeric_spaces');
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
					
					$uploads_dir = 'uploads/pages/';
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

                if ($res = $this->pages_model->create($data)) {
                   
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->pages_model->get($res);
                    $final['message'] = 'Data created successfully.';
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
			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('status', 'Status', 'trim|alpha');
            $this->form_validation->set_rules('contact_no', 'Contact no', 'trim|numeric');
            $this->form_validation->set_rules('alt_contact_no', 'Alternative Contact no', 'trim|numeric');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
        
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
                $contact_no = $this->input->post('contact_no');
                if (!empty($contact_no)) {
                    $data['contact_no'] = $contact_no;
                }
				$alt_contact_no = $this->input->post('alt_contact_no');
                if (!empty($alt_contact_no)) {
                    $data['alt_contact_no'] = $alt_contact_no;
                }
				$email = $this->input->post('email');
                if (!empty($email)) {
                    $data['email'] = $email;
                }
				$address1 = $this->input->post('address1');
                if (!empty($address1)) {
                    $data['address1'] = $address1;
                }
				$address2 = $this->input->post('address2');
                if (!empty($address2)) {
                    $data['address2'] = $address2;
                }
				$map_link = $this->input->post('map_link');
                if (!empty($map_link)) {
                    $data['map_link'] = $map_link;
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
					
					$uploads_dir = 'uploads/pages/';
					if(!file_exists($uploads_dir)) {
						mkdir($uploads_dir, 0777, true);  //create directory if not exist
					}
						$imageFullPath = $uploads_dir.$imageName;
					if(file_put_contents($imageFullPath,$image_data)){
						$data['image'] =  $imageName;
						$imgData = $this->db->get_where('pages',array('id'=>$id));
						if($imgData->num_rows()>0){
							$img =  $imgData->row()->image;
							$load_url = 'uploads/pages/'.$img;
							if(file_exists($load_url) && !empty($img))
							{
								unlink("uploads/pages/".$img);		
							}
						}
					}
				}
				
				
                $data['updatedBy'] = $session_id;
                $data['updated'] = date('Y-m-d H:i:s');
               
        
                if ($res = $this->pages_model->update($data, $id)) {
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->pages_model->get($id);
                    $final['message'] = 'Data updated successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
					$data['added'] = date('Y-m-d H:i:s');
					$data['addedBy'] = $session_id;
					if ($res = $this->pages_model->create($data)) {
						
						$final = array();
						$final['status'] = true;
						$final['data'] = $this->pages_model->get($res);
						$final['message'] = 'Data created successfully.';
						$this->response($final, REST_Controller::HTTP_OK); 
					} else {
						$this->response([ 'status' => FALSE,
							'message' =>'Error in submit form',
							'errors' =>[$this->db->error()]], REST_Controller::HTTP_BAD_REQUEST,'','error');
					}
                    
                }
            }
        }
        
    }

    public function pages_delete($id) {
        $this->is_authorized('superadmin');
        $response = $this->pages_model->delete($id);

        if ($response) {
            $this->response(['status' => true, 'message' => 'Data deleted successfully.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    // Blog end
}
