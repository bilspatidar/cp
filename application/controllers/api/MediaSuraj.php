<?php



/* Table structure for table `products` */
// CREATE TABLE `products` (
//   `id` int(10) UNSIGNED NOT NULL,
//   `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
//   `price` double NOT NULL,
//   `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
//   `updated_at` datetime DEFAULT NULL
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
// ALTER TABLE `products` ADD PRIMARY KEY (`id`);
// ALTER TABLE `products` MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1; COMMIT;

/**
 * Product class.
 * 
 * @extends REST_Controller
 */
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

     
class Media extends REST_Controller {
    
	  /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library('Authorization_Token');	
       $this->load->model('Media_model');
	           header('Access-Control-Allow-Origin: *');


	
	
	
    }
       
    /**
     * SHOW | GET method.
     *
     * @return Response
    */



	public function series_get($id='')
	{
	
        
       
                // ------- Main Logic part -------
                if(!empty($id)){
                    $data = $this->Media_model->show($id,1);
                } else {
                    $data = $this->Media_model->show(0,1);
                }
                $this->response([
                    'status' => true,
                    'data' =>$data,
					'bannerUrl' => base_url().'uploads/sub_categories/'
              ], REST_Controller::HTTP_OK);
                // ------------- End -------------
            
       
	}
	
	
	public function topic_get($id='')
	{
	
        
       
                // ------- Main Logic part -------
                if(!empty($id)){
                    $data = $this->Media_model->show($id,2);
                } else {
                    $data = $this->Media_model->show(0,2);
                }
                $this->response([
                    'status' => true,
                    'data' =>$data,
					'bannerUrl' => base_url().'uploads/sub_categories/'
              ], REST_Controller::HTTP_OK);
                // ------------- End -------------
            
       
	}
	
	
      
	
	public function medias_get($id='',$keyword='')
	{
	
                 
                if(!empty(isset($_GET['id']))){
					$id = $_GET['id'];
				}
				else{
					$id = '';
				}
				
				if(!empty(isset($_GET['keyword']))){
					$keyword = $_GET['keyword'];
				}
				else{
					$keyword = '';
				}
				
				
            
                $data = $this->Media_model->get_media($id,$keyword);
                
                $this->response([
                    'status' => true,
                    'data' =>$data,
					'bannerUrl' => base_url().'uploads/media/'
              ], REST_Controller::HTTP_OK);
                // ------------- End -------------
            
       
	}  
	
	public function streaming_get($id='')
	{
	
                 
       
           
                $data = $this->Media_model->get_streaming();
              
                $this->response([
                    'status' => true,
                    'data' =>$data,
              ], REST_Controller::HTTP_OK);
                // ------------- End -------------
            
       
	}  
	
	public function suscribe_post() {
		$_POST = json_decode($this->input->raw_input_stream, true);
		// set validation rules
	$this->form_validation->set_rules('email', 'Email', 'required|is_unique[suscriber_list.email]');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
            $this->response([
                    'status' => FALSE,
                    'message' =>strip_tags(str_replace(array("\r", "\n"), '', validation_errors()))
              ], REST_Controller::HTTP_OK);

		} else {
			
			// set variables from the form
			$email = $this->input->post('email');
			
			if ($this->Media_model->save_suscriber($email)) {
				
                $final = array();
                $final['message'] = 'You have successfully subscribed to our newsletter!';
                $final['email'] = $email;

                $this->response($final, REST_Controller::HTTP_OK); 
				
			} else {
				
				// login failed
                $this->response(
				[
                    'status' => FALSE,
                    'message' =>'Something went wrong'
              ]
			  , REST_Controller::HTTP_OK);
				
			}
			
		}
		
	}
	
	
	
	public function home_get($id='')
	{
	
        
                if(isset($_GET['deviceType']) && !empty($_GET['deviceType'])){
					$deviceType = $_GET['deviceType'];
					$limits = 0;
					$getmedia = 0;
				}
				else{
					$limits = 10;
					$getmedia= 20;
				}
                // ------- Main Logic part -------
                $home_slider = $this->Media_model->get_home_slider();
				$home_sries = $this->Media_model->show(0,1,$limits);
				$home_topics =$this->Media_model->show(0,2,$limits);
				$home_top_videos = $this->Media_model->get_media('','',$getmedia,'1');
                $this->response([
                    'status' => true,
                    'slider' =>$home_slider,
					'series' =>$home_sries,
					'topics' =>$home_topics,
					'top'=>$home_top_videos,
					'series_topic_Url' => base_url().'uploads/sub_categories/',
					'top_Url' => base_url().'uploads/media/',
					'android_app_version' => 4,
					'android_is_force_update' => false,
					'ios_app_version' =>"1.0.2",
					'ios_is_force_update' => false
              ], REST_Controller::HTTP_OK);
                // ------------- End -------------
            
       
	}  
	
	
	

	public function index_get($id = 0)
	{
        $headers = $this->input->request_headers(); 
        if (isset($headers['Authorization'])) {
            $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
            if ($decodedToken['status'])
            {
                // ------- Main Logic part -------
                if(!empty($id)){
                    $data = $this->Product_model->show($id);
                } else {
                    $data = $this->Product_model->show();
                }
                $this->response($data, REST_Controller::HTTP_OK);
                // ------------- End -------------
            } 
            else {
                $this->response($decodedToken);
            }
        } else {
            $this->response(['Authentication failed'], REST_Controller::HTTP_OK);
        }
	}
      
    /**
     * INSERT | POST method.
     *
     * @return Response
    */
    public function index_post()
    {
        $headers = $this->input->request_headers(); 
		if (isset($headers['Authorization'])) {
			$decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
            if ($decodedToken['status'])
            {
                // ------- Main Logic part -------
                $input = $this->input->post();
                $data = $this->Product_model->insert($input);
        
                $this->response(['Product created successfully.'], REST_Controller::HTTP_OK);
                // ------------- End -------------
            }
            else {
                $this->response($decodedToken);
            }
		}
		else {
			$this->response(['Authentication failed'], REST_Controller::HTTP_OK);
		}
    } 
     
    /**
     * UPDATE | PUT method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $headers = $this->input->request_headers(); 
		if (isset($headers['Authorization'])) {
			$decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
            if ($decodedToken['status'])
            {
                // ------- Main Logic part -------
                // $input = $this->put();
                $headers = $this->input->request_headers(); 
                $data['name'] = $headers['name'];
                $data['price'] = $headers['price'];
                $response = $this->Product_model->update($data, $id);

                $response>0?$this->response(['Product updated successfully.'], REST_Controller::HTTP_OK):$this->response(['Not updated'], REST_Controller::HTTP_OK);
                // ------------- End -------------
            }
            else {
                $this->response($decodedToken);
            }
		}
		else {
			$this->response(['Authentication failed'], REST_Controller::HTTP_OK);
		}
    }
     
    /**
     * DELETE method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        
        $headers = $this->input->request_headers(); 
		if (isset($headers['Authorization'])) {
			$decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
            if ($decodedToken['status'])
            {
                // ------- Main Logic part -------
                $response = $this->Product_model->delete($id);

                $response>0?$this->response(['Product deleted successfully.'], REST_Controller::HTTP_OK):$this->response(['Not deleted'], REST_Controller::HTTP_OK);
                // ------------- End -------------
            }
            else {
                $this->response($decodedToken);
            }
		}
		else {
			$this->response(['Authentication failed'], REST_Controller::HTTP_OK);
		}
    }
    	
}