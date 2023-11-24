    <?php 
	//require_once('./vendor/autoload.php');

require_once('application/libraries/S3.php');
require_once(APPPATH."libraries/aws/aws-autoloader.php");
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\S3\ObjectUploader;
use Aws\S3\MultipartUploader;
use Aws\Exception\MultipartUploadException;

	defined("BASEPATH") OR exit("No direct script access allowed");

class Media extends CI_Controller {

  function __construct() {

    parent::__construct();
    	 $this->load->model('Mdlmedia');
		 $this->load->library('S3_upload');
		 $this->load->library('S3');


	 }
    

   
public function live_streaming(){  

  is_login(array('superadmin'));
  
  $title['page_title'] = 'Live Streaming';
  $footer['tableData']   = 1;
    $footer['dataLink']   = base_url().'media/get_live_streaming/';
    $this->load->view('include/header',$title);
    $this->load->view('live_streaming');                
    $this->load->view('include/footer',$footer);         
  
  }
  
  public function add_live_streaming($param1=''){
  is_login(array('superadmin','admin'));
  if($param1=='add'){
    
  $this->form_validation->set_error_delimiters('', '');
  $this->form_validation->set_rules('rtmp1','RTMP1', 'required');
  $this->form_validation->set_rules('rtmp2','RTMP2 ', 'required');
  //$this->form_validation->set_rules('rtmp3','RTMP2 ', 'required');
  
  
  if ($this->form_validation->run() == FALSE) {
  
  
         $response['status'] = 0;
         $response['msg']  = validation_errors();
  } 
  else {
  
       $data['rtmp1'] = $this->input->post('rtmp1');
       $data['rtmp2'] = $this->input->post('rtmp2');
       //$data['rtmp3'] = $this->input->post('rtmp3');
  $data['status'] = $this->input->post('status');
       
       $data['added'] = get_dateTime();
       $data['addedBy'] = getUser('users_id');  
     
      
  $already = $this->db->get('live_streaming');
      
     if($already->num_rows()>0){
		 $id = $already->row()->id;
		 $this->db->where('id',$id);
		 $result = $this->db->update('live_streaming',$data);
	 }
	 else{
  $result = $this->db->insert('live_streaming',$data);
	 }
      
     if($result)
     {
         $response['status'] = 1;
         $response['msg']  = 'Data submited successfully';
     }
     else
     {
  
         $response['status'] = 0;
         $response['msg']  = 'Error try again';
     }
  
  
     
  }
  
  echo json_encode($response);
  }
  if($param1=='update'){
  $id = $this->input->post('id');  
  $this->form_validation->set_error_delimiters('', '');
  $this->form_validation->set_rules('rtmp1','RTMP1', 'required');
  $this->form_validation->set_rules('rtmp2','RTMP2 ', 'required');
  // $this->form_validation->set_rules('rtmp3','RTMP2 ', 'required');

  
  
  
  if ($this->form_validation->run() == FALSE) {
  
  
         $response['status'] = 0;
         $response['msg']  = validation_errors();
  } 
  else {
  
  
    $data['rtmp1'] = $this->input->post('rtmp1');
    $data['rtmp2'] = $this->input->post('rtmp2');
    // $data['rtmp3'] = $this->input->post('rtmp3');
       $data['status'] = $this->input->post('status');
       $data['edited'] = get_dateTime();
       $data['editedBy'] = getUser('users_id');    
  
      
  
   $this->db->where('id',$id);
  $result = $this->db->update('live_streaming',$data);
      
     if($result)
     {
         $response['status'] = 1;
         $response['msg']  = 'Data updated successfully';
     }
     else
     {
  
         $response['status'] = 0;
         $response['msg']  = 'Error try again';
     }
  
  
  }
  echo json_encode($response);
  }
  
  }
  
  
  
  public function get_live_streaming($rowno=0){
  is_login(array('superadmin','admin'));
  
  $filter['status']= $_POST['filterThree']; 
  $filter['isDelete'] = $_POST['filterFour']; 
  
  
  
  $rowperpage = getRowPerPage();
  if($rowno != 0){
  $rowno = ($rowno-1) * $rowperpage;
  }
  $allcount     =  $this->Mdlmedia->get_live_streaming('yes',$rowperpage,$rowno, $filter);
  $users_record =  $this->Mdlmedia->get_live_streaming('no',$rowperpage,$rowno, $filter);
  $pageNo = $this->uri->segment(2);
  $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'media','live_streaming');
  $data['loadTableData'] = $users_record;
  $data['pageNumber'] = $pageNo;
  
  echo json_encode($data);
  }
  public function delete_live_streaming(){
  
  
  is_login(array('superadmin'));
        $id = $this->input->post('id');
        $data['deleted'] = get_dateTime();
      $data['deletedBy'] = getUser('users_id');
      $data['isDelete'] = 1;
  
        $this->db->where('id',$id);
        $res = $this->db->update('live_streaming',$data);
      if($res)
      {
        $response['status'] = 1;
        $response['msg']  = 'Moved to trash';
      }
      else
      {
        $response['status'] = 0;
        $response['msg']  = 'Error try again';
      }
      echo json_encode($response);
  }
  
  


	 public function edit_form($page='',$table='',$key='',$value=''){
	  is_login(array('superadmin','admin','instructor','super_admin','dispatch_packaging'));
	  $page_data['row'] = $this->db->get_where($table,array($key=>$value))->result();
	  $this->load->view($page,$page_data);
	  $this->load->view('include/editModelJs');
  }    
  
  
   ///////////########## Product Variation ##########///////////
   function get_field_name(){
    $fields = $this->db->list_fields('sub_categories');
        foreach ($fields as $field){
           echo $field.'<br>';
        }
    }

     public function sub_categories(){  

      is_login(array('superadmin'));
  
      $title['page_title'] = 'Categories';
      $footer['tableData']   = 1;
          $footer['dataLink']   = base_url().'media/get_sub_categories/';
        $this->load->view('include/header',$title);
        $this->load->view('sub_categories');                
        $this->load->view('include/footer',$footer);         
 
  }
  
  public function add_sub_categories($param1=''){
    is_login(array('superadmin','admin'));
     if($param1=='add'){
        // ini_set('display_errors',1);
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('category_id','Category Name', 'required');

if ($this->form_validation->run() == FALSE) {
   
   
             $response['status'] = 0;
             $response['msg']  = validation_errors();
} 
else {
   
           $data['name'] = $this->input->post('name');
           $data['category_id'] = $this->input->post('category_id');
           $data['description'] = $this->input->post('description');
           $data['status'] = 'Active';
           $data['added'] = get_dateTime();
           $data['addedBy'] = getUser('users_id');  
         
          
   
          
           $tmpImage = $this->input->post('banner');
         if(!empty($tmpImage) && isset($tmpImage)){
             $data['banner'] = $tmpImage;
            $uploads_dir = 'uploads/sub_categories/';
               if(!file_exists($uploads_dir)) {
                     mkdir($uploads_dir, 0777, true);  //create directory if not exist
                     }
            if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
             unlink("uploads/temp_images/".$tmpImage);
             }
         }
     $result = $this->db->insert('sub_categories',$data);
          
         if($result)
         {
             $response['status'] = 1;
             $response['msg']  = 'Data submited successfully';
         }
         else
         {
     
             $response['status'] = 0;
             $response['msg']  = 'Error try again';
         }
   
   
     }

echo json_encode($response);
    }
     if($param1=='update'){
$id = $this->input->post('id');  
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('category_id','Category Name', 'required');



if ($this->form_validation->run() == FALSE) {
   
   
             $response['status'] = 0;
             $response['msg']  = validation_errors();
} 
else {


           $data['name'] = $this->input->post('name');
           $data['category_id'] = $this->input->post('category_id');
           $data['description'] = $this->input->post('description');
           $data['status'] = $this->input->post('status');
           $data['edited'] = get_dateTime();
           $data['editedBy'] = getUser('users_id');    
   
           
         

          if (isset($_FILES["banner"]) && !empty($_FILES["banner"]["name"])){
                 
            $upload_base_dir = 'uploads/sub_categories/';
             if(!file_exists($upload_base_dir)) {
             mkdir($upload_base_dir, 0777, true);  //create directory if not exist
             }
        
                   $config['upload_path'] = $upload_base_dir;  
                   $config['allowed_types'] = '*';  
                  $config['encrypt_name'] = TRUE;
   
                   $this->load->library('upload', $config); 
                   $this->upload->initialize($config);
   
                   if(!$this->upload->do_upload('banner'))  
                   {  
               $response['status'] = 0;
               $response['msg']  = $this->upload->display_errors();
               echo json_encode($response);
               exit();
                   }  
                   else  
                   {  
                        $Image_data = $this->upload->data();  
                        $config['image_library'] = 'gd2';  
                        $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                        $config['create_thumb'] = FALSE;  
                        $config['maintain_ratio'] = FALSE; 
                         
                        $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                        $this->load->library('image_lib', $config);  
                        
              $data['banner'] =  $Image_data["file_name"]; 
            
              if(file_exists($upload_base_dir) && !empty($Image_data))
        {
        unlink("uploads/sub_categories/".$Image_data);		
        }

                   }  
        
         } 

/*
         $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/sub_categories/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('sub_categories',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->banner;
                 $load_url = 'uploads/sub_categories/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/sub_categories/".$img);		
    			}
               }
	        }*/

       $this->db->where('id',$id);
     $result = $this->db->update('sub_categories',$data);
          
         if($result)
         {
             $response['status'] = 1;
             $response['msg']  = 'Data updated successfully';
         }
         else
         {
     
             $response['status'] = 0;
             $response['msg']  = 'Error try again';
         }
   
   
     }
   echo json_encode($response);
    }
     
 }

 public function deleteSubCategoriesData($id)
 {
     $imgData = $this->db->get_where('sub_categories',array('id'=>$id));
               if($imgData->num_rows()>0){
                  $img =  $imgData->row()->banner;
                  $load_url = 'uploads/sub_categories/'.$img;
           if(file_exists($load_url) && !empty($img))
           {
           unlink("uploads/sub_categories/".$img);		
           }
               }
     
     $this->db->where('id',$id);
     $this->db->delete('sub_categories');
 }

  public function get_sub_categories($rowno=0){ini_set('display_errors', 1);
  is_login(array('superadmin','admin'));
  $filter['name']  = $_POST['filterOne']; 
  $filter['status']= $_POST['filterThree']; 
  $filter['isDelete'] = $_POST['filterFour']; 
  $filter['category_id'] = $_POST['filterTwo']; 

 

$rowperpage = getRowPerPage();
if($rowno != 0){
  $rowno = ($rowno-1) * $rowperpage;
}
$allcount     =  $this->Mdlmedia->get_sub_categories('yes',$rowperpage,$rowno,$filter);
$users_record =  $this->Mdlmedia->get_sub_categories('no',$rowperpage,$rowno,$filter);
$pageNo = $this->uri->segment(3);
$data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'media','sub_categories');
$data['loadTableData'] = $users_record;
$data['pageNumber'] = $pageNo;

echo json_encode($data);
}
  public function delete_sub_categories(){
	  
   
      is_login(array('superadmin'));
            $id = $this->input->post('id');
            $data['deleted'] = get_dateTime();
          $data['deletedBy'] = getUser('users_id');
          $data['isDelete'] = 1;
      
            $this->db->where('id',$id);
            $res = $this->db->update('sub_categories',$data);
          if($res)
          {
            $response['status'] = 1;
            $response['msg']  = 'Moved to trash';
          }
          else
          {
            $response['status'] = 0;
            $response['msg']  = 'Error try again';
          }
          echo json_encode($response);
   }
   
  
  
   public function slider(){  
    is_login(array('superadmin'));
    
            $title['page_title'] = 'Slider';
            $footer['tableData']   = 1;
           $footer['dataLink']   = base_url().'media/get_slider/';
        $this->load->view('include/header',$title);
              $this->load->view('slider');                
              $this->load->view('include/footer',$footer);            
   
    }
  
    public function add_slider($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('text','Text', 'required');
// $this->form_validation->set_rules('video','Video', 'required');




if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['text'] = $this->input->post('text');
            

            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

            /* $tmpImage = $this->input->post('thumbnail');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['thumbnail'] = $tmpImage;
	           $uploads_dir = 'uploads/slider/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        } */

          if (isset($_FILES["thumbnail"]) && !empty($_FILES["thumbnail"]["name"])){
                 
            $upload_base_dir = 'uploads/slider/';
             if(!file_exists($upload_base_dir)) {
             mkdir($upload_base_dir, 0777, true);  //create directory if not exist
             }
                   $config['upload_path'] = $upload_base_dir;  
                   $config['allowed_types'] = '*';  
                  $config['encrypt_name'] = TRUE;
                   $this->load->library('upload', $config); 
                   $this->upload->initialize($config);
                   if(!$this->upload->do_upload('thumbnail'))  
                   {  
               $response['status'] = 0;
               $response['msg']  = $this->upload->display_errors();
               echo json_encode($response);
               exit();
                   }  
                   else  
                   {  
                        $Image_data = $this->upload->data();  
                        $config['image_library'] = 'gd2';  
                        $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                        $config['create_thumb'] = FALSE;  
                        $config['maintain_ratio'] = FALSE; 
                        $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                        $this->load->library('image_lib', $config);  
                        
              $data['thumbnail'] =  $Image_data["file_name"]; 
            
                   }  
        
         } 
        
          if (isset($_FILES["video"]) && !empty($_FILES["video"]["name"])){
                 
            $upload_base_dir = 'uploads/slider';
            if(!file_exists($upload_base_dir)) {
            mkdir($upload_base_dir, 0777, true);  //create directory if not exist
            }
        
       //START UPLOADING IMAGE
       
       
                  $config['upload_path'] = $upload_base_dir;  
                  $config['allowed_types'] = '*';  
                  
          $config['encrypt_name'] = TRUE;
  
                  $this->load->library('upload', $config);  
                   $this->upload->initialize($config);
  
                  if(!$this->upload->do_upload('video'))  
                  {  
                       echo $this->upload->display_errors();  
             exit();
                  }  
                  else  
                  {  
                       $Image_data = $this->upload->data();  
                       $config['image_library'] = 'gd2';  
                       $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                       $config['create_thumb'] = TRUE;  
                       $config['maintain_ratio'] = FALSE; 
                       $config['quality'] = '90%';  
                       $config['width'] = 500;  
                       $config['height'] = 400;  
                       $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                       $this->load->library('image_lib', $config);  
                       $this->image_lib->resize();  
                       
             $data['video'] =  $Image_data["file_name"]; 
           
                  }  
         }
      



         $rowId = $this->db->get('slider');
         if($rowId->num_rows()>0){
                   $this->db->where('id',$rowId->row()->id);
           $result = $this->db->update('slider',$data);
         }
         else{
           $result = $this->db->insert('slider',$data);
         }
           
          if($result)
          {
              $response['status'] = 1;
              $response['msg']  = 'Data submited successfully';
          }
          else
          {
      
              $response['status'] = 0;
              $response['msg']  = 'Error try again';
          }
    
    
			}
		echo json_encode($response);
     }
      if($param1=='update'){
    $id = $this->input->post('id');   
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('text','Text', 'required');
// $this->form_validation->set_rules('video','Video', 'required');


if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {    

    
            $data['text'] = $this->input->post('text');
           
            $data['status'] = $this->input->post('status');
		    $data['edited'] = get_dateTime();
	        $data['editedBy'] = getUser('users_id');         
		
		 $tmpImage = $this->input->post('thumbnail');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['thumbnail'] = $tmpImage;
	           $uploads_dir = 'uploads/slider/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('slider',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->thumbnail;
                 $load_url = 'uploads/slider/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/slider/".$img);		
    			}
               }
	        }



		
          if (isset($_FILES["video"]) && !empty($_FILES["video"]["name"])){
                 
            $upload_base_dir = 'uploads/slider';
            if(!file_exists($upload_base_dir)) {
            mkdir($upload_base_dir, 0777, true);  //create directory if not exist
            }
        
       //START UPLOADING IMAGE
       
       
                  $config['upload_path'] = $upload_base_dir;  
                  $config['allowed_types'] = '*';  
                  
          $config['encrypt_name'] = TRUE;
  
                  $this->load->library('upload', $config);  
                   $this->upload->initialize($config);
  
                  if(!$this->upload->do_upload('video'))  
                  {  
                       echo $this->upload->display_errors();  
             exit();
                  }  
                  else  
                  {  
                       $Image_data = $this->upload->data();  
                       $config['image_library'] = 'gd2';  
                       $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                       $config['create_thumb'] = TRUE;  
                       $config['maintain_ratio'] = FALSE; 
                       $config['quality'] = '90%';  
                       $config['width'] = 500;  
                       $config['height'] = 400;  
                       $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                       $this->load->library('image_lib', $config);  
                       $this->image_lib->resize();  
                       
             $data['video'] =  $Image_data["file_name"]; 
           
                  }  
         }
      

          
		    $this->db->where('id',$id);
			$result = $this->db->update('slider',$data);
           
          if($result)
          {
              $response['status'] = 1;
              $response['msg']  = 'Data updated successfully';
          }
          else
          {
      
              $response['status'] = 0;
              $response['msg']  = 'Error try again';
          }
    
    
			}
		echo json_encode($response);
     }
      
  }

  


  public function get_slider($rowno=0){ini_set('display_errors', 1);
  is_login(array('superadmin'));    
      $filter['text']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmedia->get_slider('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmedia->get_slider('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'media','slider');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_slider(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('slider',$data);
        if($res)
        {
          $response['status'] = 1;
          $response['msg']  = 'Moved to trash';
        }
        else
        {
          $response['status'] = 0;
          $response['msg']  = 'Error try again';
        }
        echo json_encode($response);
 }
 
 
  
 public function front_users(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'All Front Users';
	        $footer['tableData']   = 1;
             $footer['dataLink']   = base_url().'media/get_front_users/';
			$this->load->view('include/header',$title);
            $this->load->view('front_users');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function get_front_users($rowno=0){ ini_set('display_errors', 1);
    is_login(array('superadmin'));    
        $filter['name']  = $_POST['filterOne'];
      
       
   
    $rowperpage = getRowPerPage();
    if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
      }
      $allcount     =  $this->Mdlmedia->get_front_users('yes',$rowperpage,$rowno,$filter);
      $users_record =  $this->Mdlmedia->get_front_users('no',$rowperpage,$rowno,$filter);
      $pageNo = $this->uri->segment(3);
      $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'media','front_users');
      $data['loadTableData'] = $users_record;
      $data['pageNumber'] = $pageNo;
  
      echo json_encode($data);
    }
  
  public function geners(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Genres';
	        $footer['tableData']   = 1;
             $footer['dataLink']   = base_url().'media/get_gener/';
			$this->load->view('include/header',$title);
            $this->load->view('gener');                
            $this->load->view('include/footer',$footer);            
 
  }

  public function add_gener($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');
$this->form_validation->set_rules('description','Description', 'required');




if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

            $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/gener/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }


			$result = $this->db->insert('geners',$data);
           
          if($result)
          {
              $response['status'] = 1;
              $response['msg']  = 'Data submited successfully';
          }
          else
          {
      
              $response['status'] = 0;
              $response['msg']  = 'Error try again';
          }
    
    
			}
		echo json_encode($response);
     }
      if($param1=='update'){
// ini_set('display_errors',1);

$id = $this->input->post('id'); 
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');
$this->form_validation->set_rules('description','Description', 'required');


if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else { 

            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = $this->input->post('status');
		    $data['edited'] = get_dateTime();
	        $data['editedBy'] = getUser('users_id');         
		
          if (isset($_FILES["image"])){
                 
            $upload_base_dir = 'uploads/gener/';
             if(!file_exists($upload_base_dir)) {
             mkdir($upload_base_dir, 0777, true);  //create directory if not exist
             }
        
                   $config['upload_path'] = $upload_base_dir;  
                   $config['allowed_types'] = '*';  
                  // $config['encrypt_name'] = TRUE;
   
                   $this->load->library('upload', $config); 
                   $this->upload->initialize($config);
   
                   if(!$this->upload->do_upload('image'))  
                   {  
               $response['status'] = 0;
               $response['msg']  = $this->upload->display_errors();
               echo json_encode($response);
               exit();
                   }  
                   else  
                   {  
                        $Image_data = $this->upload->data();  
                        $config['image_library'] = 'gd2';  
                        $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                        $config['create_thumb'] = FALSE;  
                        $config['maintain_ratio'] = FALSE; 
                         
                        $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                        $this->load->library('image_lib', $config);  
                        
              $data['image'] =  $Image_data["file_name"]; 
            
              if(file_exists($upload_base_dir) && !empty($Image_data))
        {
        unlink("uploads/gener/".$Image_data);		
        }

                   }  
        
         } 

/*
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/gener/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('gener',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/gener/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/gener/".$img);		
    			}
               }
	        }
		*/
		    $this->db->where('id',$id);
			$result = $this->db->update('geners',$data);
           
          if($result)
          {
              $response['status'] = 1;
              $response['msg']  = 'Data updated successfully';
          }
          else
          {
      
              $response['status'] = 0;
              $response['msg']  = 'Error try again';
          }
    
    
			}
		echo json_encode($response);
     }
      
  }



  public function get_gener($rowno=0){
  is_login(array('superadmin'));    
      $filter['title']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmedia->get_gener('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmedia->get_gener('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'media','gener');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_gener(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('geners',$data);
        if($res)
        {
          $response['status'] = 1;
          $response['msg']  = 'Moved to trash';
        }
        else
        {
          $response['status'] = 0;
          $response['msg']  = 'Error try again';
        }
        echo json_encode($response);
 }
 
 
 public function media_js(){  

is_login(array('superadmin'));

$title['page_title'] = 'Media';
  $this->load->view('include/header',$title);
  $this->load->view('media_js');                
  $this->load->view('include/footer');         

}


public function medias(){  

is_login(array('superadmin'));

$title['page_title'] = 'Media';
$footer['tableData']   = 1;
  $footer['dataLink']   = base_url().'media/get_media/';
  $this->load->view('include/header',$title);
  $this->load->view('medias');                
  $this->load->view('include/footer',$footer);         

}

public function add_mediass(){
	ini_set('display_errors', 1);
	ini_set('max_execution_time', '0');
		    	if (isset($_FILES["localVideo"]) && !empty($_FILES["localVideo"]["name"])){
$bucket = 'can2023bucket';
	
	$dir = dirname($_FILES["localVideo"]["tmp_name"]);
	$destination = $dir . DIRECTORY_SEPARATOR . $_FILES["localVideo"]["name"];
	rename($_FILES["localVideo"]["tmp_name"], $destination);
	
		$file = pathinfo($destination);
		$s3_file = $file['filename'].'ddd-'.rand(00000000,99999999).'.'.$file['extension'];

$s3Client = new S3Client([
              'version' => 'latest',
              'region'  => 'us-east-1',// 'us-west-2',
              'credentials' => [
                  'key'    => 'AKIAXXXCGNNMK46QRRTA',
                  'secret' => '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'
              ]
          ]);

//start upload 
$key = basename($destination);
$source = fopen($destination, 'rb');

$uploader = new ObjectUploader(
    $s3Client,
    $bucket,
    $key,
    $source,
    'public-read',
);


do {
    try {
        $result = $uploader->upload();
        if ($result["@metadata"]["statusCode"] == '200') {
                print('<p>File successfully uploaded to ' . $result["ObjectURL"] . '.</p>');
        }
    } catch (MultipartUploadException $e) {
        rewind($source);
        $uploader = new MultipartUploader($s3Client, $source, [
            'state' => $e->getState(),
            'acl' => 'public-read',
        ]);
    }
} while (!isset($result));
 
fclose($source);


///end upload 
		 
	
	
	}
}
function mediaData(){
	print_r($this->db->list_fields('media'));
}

public function add_media($param1=''){
	ini_set('display_errors', 1);
is_login(array('superadmin','admin'));
if($param1=='add'){
 
   
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');

$this->form_validation->set_rules('video_link_js','Video', 'required');
$this->form_validation->set_rules('sub_category_id[]','Category Name', 'required');
$this->form_validation->set_rules('gener_id[]','Category Name', 'required');



if ($this->form_validation->run() == FALSE) {


       $response['status'] = 0;
       $response['msg']  = validation_errors();
} 
else {
	
	
	if (isset($_FILES["localVideop0000"]) && !empty($_FILES["localVideop0000"]["name"])){
	
	/////  for files 
	
	//// end files 
    $bucket = 'can2023bucket';
	
	$dir = dirname($_FILES["localVideo"]["tmp_name"]);
	$destination = $dir . DIRECTORY_SEPARATOR . $_FILES["localVideo"]["name"];
	rename($_FILES["localVideo"]["tmp_name"], $destination);
	
	$file = pathinfo($destination);
	$s3_file = $file['filename'].'-'.rand(0000000000,9999999999).'.'.$file['extension'];
		
		
$s3Client = new S3Client([
              'version' => 'latest',
              'region'  => 'us-east-1',// 'us-west-2',
              'credentials' => [
                  'key'    => 'AKIAXXXCGNNMK46QRRTA',
                  'secret' => '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'
              ]
          ]);

//start upload 
$key = 'media/'.$s3_file; //basename($destination);
$source = fopen($destination, 'a+');

$uploader = new ObjectUploader(
    $s3Client,
    $bucket,
    $key,
    $source,
    'public-read',
);
#echo"source <br>";
#echo $source;
#echo"<br><br><br><br>";
do {
    try {
        $result = $uploader->upload();
        if ($result["@metadata"]["statusCode"] == '200') {
                //print('<p>File successfully uploaded to ' . $result["ObjectURL"] . '.</p>');
				
				 $data['video_link'] =  $result['ObjectURL'];
				 //print_r($result); ////logs 
        }
    } catch (MultipartUploadException $e) {
		//print_r($e); //logss
        rewind($source);
        $uploader = new MultipartUploader($s3Client, $source, [
            'state' => $e->getState(),
            'acl' => 'public-read',
        ]);
    }
} while (!isset($result));
 
fclose($source);


///end upload 
		 
	
	
	}
	



	if($this->input->post('video_type') == 'Youtube_link'){
     $data['video_link'] = $this->input->post('video_link');
	 }else{
	if (isset($_FILES["localVideosss"]) && !empty($_FILES["localVideossss"]["name"])){
$bucket = 'can2023bucket';
	
	$dir = dirname($_FILES["localVideo"]["tmp_name"]);
	$destination = $dir . DIRECTORY_SEPARATOR . $_FILES["localVideo"]["name"];
	rename($_FILES["localVideo"]["tmp_name"], $destination);
	
		$file = pathinfo($destination);
		$s3_file = $file['filename'].'-'.rand(000000000,999999999).'.'.$file['extension'];

$s3Client = new S3Client([
              'version' => 'latest',
              'region'  => 'us-east-1',// 'us-west-2',
              'credentials' => [
                  'key'    => 'AKIAXXXCGNNMK46QRRTA',
                  'secret' => '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'
              ]
          ]);

		
		try {
              $result = $s3Client->putObject([
                  'Bucket' => $bucket,
                  'Key'    => 'media/'.$s3_file,
                  'Body'   => fopen($destination, 'r'),
                  'ACL'    => 'public-read', // make file 'public'
				  ]);
           //echo $result['ObjectURL'];
            $data['video_link'] =  $result['ObjectURL'];
           
          } catch (Aws\S3\Exception\S3Exception $e) {
              //$msg = 'File has been uploaded';
             // echo $e->getMessage();
			  $response['status'] = 0;
			$response['msg']  = $e->getMessage();
			echo json_encode($response);
			
			  
			
          }
		 
	
	
	}
	 }
	 
if (isset($_FILES["localVideo0000"]) && !empty($_FILES["localVideo000"]["name"])){
	
	/////  for files 
	
	//// end files 
    $bucket = 'can2023bucket';
	
	$dir = dirname($_FILES["localVideo"]["tmp_name"]);
	$destination = $dir . DIRECTORY_SEPARATOR . $_FILES["localVideo"]["name"];
	rename($_FILES["localVideo"]["tmp_name"], $destination);
	
	$file = pathinfo($destination);
	$s3_file = $file['filename'].'-'.rand(0000000000,9999999999).'.'.$file['extension'];
		
		
$s3Client = new S3Client([
              'version' => 'latest',
              'region'  => 'us-east-1',// 'us-west-2',
              'credentials' => [
                  'key'    => 'AKIAXXXCGNNMK46QRRTA',
                  'secret' => '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'
              ]
          ]);

//start upload 
$key = 'media/'.$s3_file; //basename($destination);
$source = fopen($destination, 'a+');

$uploader = new ObjectUploader(
    $s3Client,
    $bucket,
    $key,
    $source,
    'public-read',
);
#echo"source <br>";
#echo $source;
#echo"<br><br><br><br>";
do {
    try {
        $result = $uploader->upload();
        if ($result["@metadata"]["statusCode"] == '200') {
                //print('<p>File successfully uploaded to ' . $result["ObjectURL"] . '.</p>');
				
				 $data['video_link'] =  $result['ObjectURL'];
				 //print_r($result); ////logs 
        }
    } catch (MultipartUploadException $e) {
		//print_r($e); //logss
        rewind($source);
        $uploader = new MultipartUploader($s3Client, $source, [
            'state' => $e->getState(),
            'acl' => 'public-read',
        ]);
    }
} while (!isset($result));
 
fclose($source);


///end upload 
		 
	
	
	}
	
	
	if(isset($_FILES["localVideo000"]) && !empty($_FILES["localVideo000"]["name"])){
	
	    $bucket = 'can2023bucket';
	
	$dir = dirname($_FILES["localVideo"]["tmp_name"]);
	$destination = $dir . DIRECTORY_SEPARATOR . $_FILES["localVideo"]["name"];
	rename($_FILES["localVideo"]["tmp_name"], $destination);
	
	$file = pathinfo($destination);
    $s3_file = $file['filename'].'-'.rand(0000000000,9999999999).'.'.$file['extension'];
	
	
	$s3 = new S3Client([
            'version' => 'latest',
            'region' => 'us-east-1', // Update with your desired region
            'credentials' => [
                'key' => 'AKIAXXXCGNNMK46QRRTA',
                'secret' => 'tPN3q6yv6IH8vlvuv5nOr9fpZjXwbY/TXvxhk1/g',
            ],
        ]);
		$key = 'media/'.$s3_file;
	 // Prepare the upload
        $uploader = $s3->createMultipartUpload([
            'Bucket' => 'can2023bucket',
            'Key' => $key,
        ]);	
		
		
	   $uploadId = $uploader['UploadId'];
	    
	   $filePath = $destination;
       
	   $partSize = 5 * 1024 * 1024;

        // Open the file
        $file = fopen($filePath, 'r');

        // Initialize variables
        $partNumber = 1;
        $parts = [];
		
		 try {
            while (!feof($file)) {
                // Read a part of the file
                $body = fread($file, $partSize);

                // Upload the part
                $result = $s3->uploadPart([
                    'Bucket' => 'can2023bucket',
                    'Key' => $key,
                    'UploadId' => $uploadId,
                    'PartNumber' => $partNumber,
                    'Body' => $body,
					'public-read',
                ]);

                // Add the uploaded part to the parts array
                $parts[] = [
                    'PartNumber' => $partNumber,
                    'ETag' => $result['ETag'],
                ];

                // Increment the part number for the next part
                $partNumber++;
            }

            // Complete the multipart upload
            $s3->completeMultipartUpload([
                'Bucket' => 'can2023bucket',
                'Key' => $key,
                'UploadId' => $uploadId,
                'MultipartUpload' => [
                    'Parts' => $parts,
                ],
            ]);
			//print_r($result);
		
			 if ($result["@metadata"]["statusCode"] == '200') {
				  $nurl = strtok($result["@metadata"]['effectiveUri'], '?');

				  $data['video_link'] =  $nurl;
				   echo 'Multipart upload completed successfully.';
				}
				

           
        } catch (AwsException $e) {
            // Handle any errors that occurred during the upload
            $s3->abortMultipartUpload([
                'Bucket' => 'can2023bucket',
                'Key' => $key,
                'UploadId' => $uploadId,
            ]);

            echo 'Error: ' . $e->getMessage();
        } finally {
            // Close the file
            fclose($file);
        }
		
		
		//end try 
		
	}
	
     $data['name'] = $this->input->post('name');
    //  $data['sub_category_id'] = $this->input->post('sub_category_id');
    //  $data['video_type'] = $this->input->post('video_type');
     $data['video_description'] = $this->input->post('video_description');
	 
     $catt_id = $this->input->post('sub_category_id');
       
            $catt_id = implode(",",$catt_id);
            $data['sub_category_id'] = $catt_id;



              $generid = $this->input->post('gener_id');
            $generid = implode(",",$generid);
            $data['gener_id'] = $generid;


            $cheak = $this->input->post('isSlider');

            if (isset($cheak)) {
              $data['isSlider'] = $this->input->post('isSlider');

            }else {
              $data['isSlider'] = 0;
            }



            $cheakt = $this->input->post('isTrending');

            if (isset($cheakt)) {
              $data['isTrending'] = $this->input->post('isTrending');

            }else {
              $data['isTrending'] = 0;
            }

            
            $cheakts = $this->input->post('defaultBannerYutube');

            if (isset($cheakts)) {
              $data['defaultBannerYutube'] = $this->input->post('defaultBannerYutube');

            }else {
              $data['defaultBannerYutube'] = 0;
            }
            $data['video_type'] = 'Local';
     $data['status'] = 'Active';
     $data['added'] = get_dateTime();
     $data['addedBy'] = getUser('users_id');  
     $data['video_link'] =  $this->input->post('video_link_js');
    
     $tmpImage = $this->input->post('banner');
     if(!empty($tmpImage) && isset($tmpImage)){
       $data['banner'] = $tmpImage;
      $uploads_dir = 'uploads/media/';
         if(!file_exists($uploads_dir)) {
               mkdir($uploads_dir, 0777, true);  //create directory if not exist
               }
      if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
       unlink("uploads/temp_images/".$tmpImage);
       }
   }

   
   $tmpImage = $this->input->post('sliderBanner');
   if(!empty($tmpImage) && isset($tmpImage)){
       $data['sliderBanner'] = $tmpImage;
      $uploads_dir = 'uploads/sliderBanner/';
         if(!file_exists($uploads_dir)) {
               mkdir($uploads_dir, 0777, true);  //create directory if not exist
               }
      if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
       unlink("uploads/temp_images/".$tmpImage);
       }
   }

$result = $this->db->insert('media',$data);
    
   if($result)
   {
       $response['status'] = 1;
       $response['msg']  = 'Data submited successfully';
   }
   else
   {

       $response['status'] = 0;
       $response['msg']  = 'Error try again';
   }


}

echo json_encode($response);
}
if($param1=='update'){
$id = $this->input->post('id');
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('sub_category_id[]','Category Name', 'required');
$this->form_validation->set_rules('gener_id[]','Category Name', 'required');


if ($this->form_validation->run() == FALSE) {


       $response['status'] = 0;
       $response['msg']  = validation_errors();
} 
else { 

    $data['name'] = $this->input->post('name');
    //  $data['sub_category_id'] = $this->input->post('sub_category_id');
     $data['video_type'] = $this->input->post('video_type');
     $data['video_description'] = $this->input->post('video_description');
     $data['video_link'] = $this->input->post('video_link');
      $catt_id = $this->input->post('sub_category_id');
       
            $catt_id = implode(",",$catt_id);
            $data['sub_category_id'] = $catt_id;

              $generid = $this->input->post('gener_id');
       
            $generid = implode(",",$generid);
            $data['gener_id'] = $generid;

            $cheak = $this->input->post('isSlider');

            if (isset($cheak)) {
              $data['isSlider'] = $this->input->post('isSlider');

            }else {
              $data['isSlider'] = 0;
            }
            

            $cheakt = $this->input->post('isTrending');

            if (isset($cheakt)) {
              $data['isTrending'] = $this->input->post('isTrending');

            }else {
              $data['isTrending'] = 0;
            }


            $cheakts = $this->input->post('defaultBannerYutube');

            if (isset($cheakts)) {
              $data['defaultBannerYutube'] = $this->input->post('defaultBannerYutube');

            }else {
              $data['defaultBannerYutube'] = 0;
            }

     $data['status'] = $this->input->post('status');
     $data['edited'] = get_dateTime();
     $data['editedBy'] = getUser('users_id');    
 

    if (isset($_FILES["banner"]) && !empty($_FILES["banner"]["name"])){
      $upload_base_dir = 'uploads/media/';
       if(!file_exists($upload_base_dir)) {
       mkdir($upload_base_dir, 0777, true);  //create directory if not exist
       }
             $config['upload_path'] = $upload_base_dir;  
             $config['allowed_types'] = '*';  
            $config['encrypt_name'] = TRUE;

             $this->load->library('upload', $config); 
             $this->upload->initialize($config);

             if(!$this->upload->do_upload('banner'))  
             {  
         $response['status'] = 0;
         $response['msg']  = $this->upload->display_errors();
         echo json_encode($response);
         exit();
             }  
             else  
             {  
                  $Image_data = $this->upload->data();  
                  $config['image_library'] = 'gd2';  
                  $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                  $config['create_thumb'] = FALSE;  
                  $config['maintain_ratio'] = FALSE; 
                  $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                  $this->load->library('image_lib', $config);  
        $data['banner'] =  $Image_data["file_name"]; 
       } 
    } 

    if (isset($_FILES["sliderBanner"]) && !empty($_FILES["sliderBanner"]["name"])){
      $upload_base_dir = 'uploads/sliderBanner/';
       if(!file_exists($upload_base_dir)) {
       mkdir($upload_base_dir, 0777, true);  //create directory if not exist
       }
             $config['upload_path'] = $upload_base_dir;  
             $config['allowed_types'] = '*';  
            $config['encrypt_name'] = TRUE;

             $this->load->library('upload', $config); 
             $this->upload->initialize($config);

             if(!$this->upload->do_upload('sliderBanner'))  
             {  
         $response['status'] = 0;
         $response['msg']  = $this->upload->display_errors();
         echo json_encode($response);
         exit();
             }  
             else  
             {  
                  $Image_data = $this->upload->data();  
                  $config['image_library'] = 'gd2';  
                  $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                  $config['create_thumb'] = FALSE;  
                  $config['maintain_ratio'] = FALSE; 
                  $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                  $this->load->library('image_lib', $config);  
        $data['sliderBanner'] =  $Image_data["file_name"]; 

        if(file_exists($upload_base_dir) && !empty($Image_data))
        {
        unlink("uploads/media/".$Image_data);		
        }

       } 
    } 

    if (isset($_FILES["localVideo"]) && !empty($_FILES["localVideo"]["name"])){
      $bucket = 'can2023bucket';
        
        $dir = dirname($_FILES["localVideo"]["tmp_name"]);
        $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["localVideo"]["name"];
        rename($_FILES["localVideo"]["tmp_name"], $destination);
        
        $file = pathinfo($destination);
          $s3_file = $file['filename'].'-'.rand(0000000000,9999999999).'.'.$file['extension'];
          
          
      $s3Client = new S3Client([
                    'version' => 'latest',
                    'region'  => 'us-east-1',// 'us-west-2',
                    'credentials' => [
                    'key'    => 'AKIAXXXCGNNMK46QRRTA',
                    'secret' => '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'
                    ]
                ]);
      
      //start upload 
      $key = 'media/'.$s3_file; //basename($destination);
      $source = fopen($destination, 'rb');
      
      $uploader = new ObjectUploader(
          $s3Client,
          $bucket,
          $key,
          $source,
          'public-read',
      );
      
      
      do {
          try {
              $result = $uploader->upload();
              if ($result["@metadata"]["statusCode"] == '200') {
                      //print('<p>File successfully uploaded to ' . $result["ObjectURL"] . '.</p>');
              
               $data['video_link'] =  $result['ObjectURL'];
              }
          } catch (MultipartUploadException $e) {
              rewind($source);
              $uploader = new MultipartUploader($s3Client, $source, [
                  'state' => $e->getState(),
                  'acl' => 'public-read',
              ]);
          }
      } while (!isset($result));
       
      fclose($source);
      
      
      ///end upload 
           
        
        
        }

   /*
   $tmpImage = $this->input->post('banner');
   if(!empty($tmpImage) && isset($tmpImage)){
       $data['banner'] = $tmpImage;
      $uploads_dir = 'uploads/media/';
         if(!file_exists($uploads_dir)) {
               mkdir($uploads_dir, 0777, true);  //create directory if not exist
               }
      if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
       unlink("uploads/temp_images/".$tmpImage);
       }
       
       $imgData = $this->db->get_where('media',array('id'=>$id));
        if($imgData->num_rows()>0){
          $img =  $imgData->row()->banner;
          $load_url = 'uploads/media/'.$img;
   if(file_exists($load_url) && !empty($img))
   {
   unlink("uploads/media/".$img);		
   }
        }
   }

   
   $tmpImage = $this->input->post('sliderBanner');
   if(!empty($tmpImage) && isset($tmpImage)){
       $data['sliderBanner'] = $tmpImage;
      $uploads_dir = 'uploads/sliderBanner/';
         if(!file_exists($uploads_dir)) {
               mkdir($uploads_dir, 0777, true);  //create directory if not exist
               }
      if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
       unlink("uploads/temp_images/".$tmpImage);
       }
       
       $imgData = $this->db->get_where('media',array('id'=>$id));
        if($imgData->num_rows()>0){
          $img =  $imgData->row()->sliderBanner;
          $load_url = 'uploads/sliderBanner/'.$img;
   if(file_exists($load_url) && !empty($img))
   {
   unlink("uploads/sliderBanner/".$img);		
   }
        }
   }
*/

 $this->db->where('id',$id);
$result = $this->db->update('media',$data);
    
   if($result)
   {
       $response['status'] = 1;
       $response['msg']  = 'Data updated successfully';
   }
   else
   {

       $response['status'] = 0;
       $response['msg']  = 'Error try again';
   }


}
echo json_encode($response);
}

}

public function add_media_mp(){
	if (isset($_FILES["localVideo"]) && !empty($_FILES["localVideo"]["name"])){
	
	    $bucket = 'can2023bucket';
	
	$dir = dirname($_FILES["localVideo"]["tmp_name"]);
	$destination = $dir . DIRECTORY_SEPARATOR . $_FILES["localVideo"]["name"];
	rename($_FILES["localVideo"]["tmp_name"], $destination);
	
	$file = pathinfo($destination);
    $s3_file = $file['filename'].'-'.rand(0000000000,9999999999).'.'.$file['extension'];
	
	
	$s3 = new S3Client([
            'version' => 'latest',
            'region' => 'us-east-1', // Update with your desired region
            'credentials' => [
                'key' => 'AKIAXXXCGNNMK46QRRTA',
                'secret' => 'tPN3q6yv6IH8vlvuv5nOr9fpZjXwbY/TXvxhk1/g',
            ],
        ]);
		$key = 'media/'.$s3_file;
	 // Prepare the upload
        $uploader = $s3->createMultipartUpload([
            'Bucket' => 'can2023bucket',
            'Key' => $key,
        ]);	
		
		
	   $uploadId = $uploader['UploadId'];
	    
	   $filePath = $destination;
       
	   $partSize = 5 * 1024 * 1024;

        // Open the file
        $file = fopen($filePath, 'r');

        // Initialize variables
        $partNumber = 1;
        $parts = [];
		
		 try {
            while (!feof($file)) {
                // Read a part of the file
                $body = fread($file, $partSize);

                // Upload the part
                $result = $s3->uploadPart([
                    'Bucket' => 'can2023bucket',
                    'Key' => $key,
                    'UploadId' => $uploadId,
                    'PartNumber' => $partNumber,
                    'Body' => $body,
                ]);

                // Add the uploaded part to the parts array
                $parts[] = [
                    'PartNumber' => $partNumber,
                    'ETag' => $result['ETag'],
                ];

                // Increment the part number for the next part
                $partNumber++;
            }

            // Complete the multipart upload
            $s3->completeMultipartUpload([
                'Bucket' => 'can2023bucket',
                'Key' => $key,
                'UploadId' => $uploadId,
                'MultipartUpload' => [
                    'Parts' => $parts,
                ],
            ]);
			
			 if ($result["@metadata"]["statusCode"] == '200') {
				echo  $data['video_link'] =  $result['ObjectURL'];
				}
				

            echo 'Multipart upload completed successfully.';
        } catch (AwsException $e) {
            // Handle any errors that occurred during the upload
            $s3->abortMultipartUpload([
                'Bucket' => 'can2023bucket',
                'Key' => $key,
                'UploadId' => $uploadId,
            ]);

            echo 'Error: ' . $e->getMessage();
        } finally {
            // Close the file
            fclose($file);
        }
		
		
		//end try 
		
	}
}

public function add_media0000($param1=''){
is_login(array('superadmin','admin'));
if($param1=='add'){
 
   
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('sub_category_id[]','Category Name', 'required');
$this->form_validation->set_rules('gener_id[]','Category Name', 'required');


if ($this->form_validation->run() == FALSE) {


       $response['status'] = 0;
       $response['msg']  = validation_errors();
} 
else {
	if($this->input->post('video_type') == 'Youtube_link'){
     $data['video_link'] = $this->input->post('video_link');
	 }else{
	if (isset($_FILES["localVideo"]) && !empty($_FILES["localVideo"]["name"])){
$bucket = 'can2023bucket';
	
	$dir = dirname($_FILES["localVideo"]["tmp_name"]);
	$destination = $dir . DIRECTORY_SEPARATOR . $_FILES["localVideo"]["name"];
	rename($_FILES["localVideo"]["tmp_name"], $destination);
	
		$file = pathinfo($destination);
		$s3_file = $file['filename'].'-'.rand(1000,1).'.'.$file['extension'];

$s3Client = new S3Client([
              'version' => 'latest',
              'region'  => 'us-east-1',// 'us-west-2',
              'credentials' => [
                  'key'    => 'AKIAXXXCGNNMK46QRRTA',
                  'secret' => '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'
              ]
          ]);

		
		try {
              $result = $s3Client->putObject([
                  'Bucket' => $bucket,
                  'Key'    => 'media/'.$s3_file,
                  'Body'   => fopen($destination, 'r'),
                  'ACL'    => 'public-read', // make file 'public'
              ]);
           //echo $result['ObjectURL'];
            $data['video_link'] =  $result['ObjectURL'];
           
          } catch (Aws\S3\Exception\S3Exception $e) {
              //$msg = 'File has been uploaded';
             // echo $e->getMessage();
			  $response['status'] = 0;
			$response['msg']  = $e->getMessage();
			echo json_encode($response);
			
			  
			
          }
		 
	
	
	}
	 }
     $data['name'] = $this->input->post('name');
    //  $data['sub_category_id'] = $this->input->post('sub_category_id');
     $data['video_type'] = $this->input->post('video_type');
     $data['video_description'] = $this->input->post('video_description');
	 
     $catt_id = $this->input->post('sub_category_id');
       
            $catt_id = implode(",",$catt_id);
            $data['sub_category_id'] = $catt_id;



              $generid = $this->input->post('gener_id');
            $generid = implode(",",$generid);
            $data['gener_id'] = $generid;


            $cheak = $this->input->post('isSlider');

            if (isset($cheak)) {
              $data['isSlider'] = $this->input->post('isSlider');

            }else {
              $data['isSlider'] = 0;
            }



            $cheakt = $this->input->post('isTrending');

            if (isset($cheakt)) {
              $data['isTrending'] = $this->input->post('isTrending');

            }else {
              $data['isTrending'] = 0;
            }

            
            $cheakts = $this->input->post('defaultBannerYutube');

            if (isset($cheakts)) {
              $data['defaultBannerYutube'] = $this->input->post('defaultBannerYutube');

            }else {
              $data['defaultBannerYutube'] = 0;
            }

     $data['status'] = 'Active';
     $data['added'] = get_dateTime();
     $data['addedBy'] = getUser('users_id');  
   
    
     $tmpImage = $this->input->post('banner');
     if(!empty($tmpImage) && isset($tmpImage)){
       $data['banner'] = $tmpImage;
      $uploads_dir = 'uploads/media/';
         if(!file_exists($uploads_dir)) {
               mkdir($uploads_dir, 0777, true);  //create directory if not exist
               }
      if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
       unlink("uploads/temp_images/".$tmpImage);
       }
   }

   
   $tmpImage = $this->input->post('sliderBanner');
   if(!empty($tmpImage) && isset($tmpImage)){
       $data['sliderBanner'] = $tmpImage;
      $uploads_dir = 'uploads/sliderBanner/';
         if(!file_exists($uploads_dir)) {
               mkdir($uploads_dir, 0777, true);  //create directory if not exist
               }
      if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
       unlink("uploads/temp_images/".$tmpImage);
       }
   }

$result = $this->db->insert('media',$data);
    
   if($result)
   {
       $response['status'] = 1;
       $response['msg']  = 'Data submited successfully';
   }
   else
   {

       $response['status'] = 0;
       $response['msg']  = 'Error try again';
   }


}

echo json_encode($response);
}
if($param1=='update'){
$id = $this->input->post('id');
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('sub_category_id[]','Category Name', 'required');
$this->form_validation->set_rules('gener_id[]','Category Name', 'required');


if ($this->form_validation->run() == FALSE) {


       $response['status'] = 0;
       $response['msg']  = validation_errors();
} 
else { 

    $data['name'] = $this->input->post('name');
    //  $data['sub_category_id'] = $this->input->post('sub_category_id');
     $data['video_type'] = $this->input->post('video_type');
     $data['video_description'] = $this->input->post('video_description');
     $data['video_link'] = $this->input->post('video_link');
      $catt_id = $this->input->post('sub_category_id');
       
            $catt_id = implode(",",$catt_id);
            $data['sub_category_id'] = $catt_id;

              $generid = $this->input->post('gener_id');
       
            $generid = implode(",",$generid);
            $data['gener_id'] = $generid;

            $cheak = $this->input->post('isSlider');

            if (isset($cheak)) {
              $data['isSlider'] = $this->input->post('isSlider');

            }else {
              $data['isSlider'] = 0;
            }
            

            $cheakt = $this->input->post('isTrending');

            if (isset($cheakt)) {
              $data['isTrending'] = $this->input->post('isTrending');

            }else {
              $data['isTrending'] = 0;
            }


            $cheakts = $this->input->post('defaultBannerYutube');

            if (isset($cheakts)) {
              $data['defaultBannerYutube'] = $this->input->post('defaultBannerYutube');

            }else {
              $data['defaultBannerYutube'] = 0;
            }

     $data['status'] = $this->input->post('status');
     $data['edited'] = get_dateTime();
     $data['editedBy'] = getUser('users_id');    
 

    if (isset($_FILES["banner"]) && !empty($_FILES["banner"]["name"])){
      $upload_base_dir = 'uploads/media/';
       if(!file_exists($upload_base_dir)) {
       mkdir($upload_base_dir, 0777, true);  //create directory if not exist
       }
             $config['upload_path'] = $upload_base_dir;  
             $config['allowed_types'] = '*';  
            $config['encrypt_name'] = TRUE;

             $this->load->library('upload', $config); 
             $this->upload->initialize($config);

             if(!$this->upload->do_upload('banner'))  
             {  
         $response['status'] = 0;
         $response['msg']  = $this->upload->display_errors();
         echo json_encode($response);
         exit();
             }  
             else  
             {  
                  $Image_data = $this->upload->data();  
                  $config['image_library'] = 'gd2';  
                  $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                  $config['create_thumb'] = FALSE;  
                  $config['maintain_ratio'] = FALSE; 
                  $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                  $this->load->library('image_lib', $config);  
        $data['banner'] =  $Image_data["file_name"]; 
       } 
    } 

    if (isset($_FILES["sliderBanner"]) && !empty($_FILES["sliderBanner"]["name"])){
      $upload_base_dir = 'uploads/sliderBanner/';
       if(!file_exists($upload_base_dir)) {
       mkdir($upload_base_dir, 0777, true);  //create directory if not exist
       }
             $config['upload_path'] = $upload_base_dir;  
             $config['allowed_types'] = '*';  
            $config['encrypt_name'] = TRUE;

             $this->load->library('upload', $config); 
             $this->upload->initialize($config);

             if(!$this->upload->do_upload('sliderBanner'))  
             {  
         $response['status'] = 0;
         $response['msg']  = $this->upload->display_errors();
         echo json_encode($response);
         exit();
             }  
             else  
             {  
                  $Image_data = $this->upload->data();  
                  $config['image_library'] = 'gd2';  
                  $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                  $config['create_thumb'] = FALSE;  
                  $config['maintain_ratio'] = FALSE; 
                  $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                  $this->load->library('image_lib', $config);  
        $data['sliderBanner'] =  $Image_data["file_name"]; 

        if(file_exists($upload_base_dir) && !empty($Image_data))
        {
        unlink("uploads/media/".$Image_data);		
        }

       } 
    } 

   /*
   $tmpImage = $this->input->post('banner');
   if(!empty($tmpImage) && isset($tmpImage)){
       $data['banner'] = $tmpImage;
      $uploads_dir = 'uploads/media/';
         if(!file_exists($uploads_dir)) {
               mkdir($uploads_dir, 0777, true);  //create directory if not exist
               }
      if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
       unlink("uploads/temp_images/".$tmpImage);
       }
       
       $imgData = $this->db->get_where('media',array('id'=>$id));
        if($imgData->num_rows()>0){
          $img =  $imgData->row()->banner;
          $load_url = 'uploads/media/'.$img;
   if(file_exists($load_url) && !empty($img))
   {
   unlink("uploads/media/".$img);		
   }
        }
   }

   
   $tmpImage = $this->input->post('sliderBanner');
   if(!empty($tmpImage) && isset($tmpImage)){
       $data['sliderBanner'] = $tmpImage;
      $uploads_dir = 'uploads/sliderBanner/';
         if(!file_exists($uploads_dir)) {
               mkdir($uploads_dir, 0777, true);  //create directory if not exist
               }
      if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
       unlink("uploads/temp_images/".$tmpImage);
       }
       
       $imgData = $this->db->get_where('media',array('id'=>$id));
        if($imgData->num_rows()>0){
          $img =  $imgData->row()->sliderBanner;
          $load_url = 'uploads/sliderBanner/'.$img;
   if(file_exists($load_url) && !empty($img))
   {
   unlink("uploads/sliderBanner/".$img);		
   }
        }
   }
*/

 $this->db->where('id',$id);
$result = $this->db->update('media',$data);
    
   if($result)
   {
       $response['status'] = 1;
       $response['msg']  = 'Data updated successfully';
   }
   else
   {

       $response['status'] = 0;
       $response['msg']  = 'Error try again';
   }


}
echo json_encode($response);
}

}

public function get_media($rowno=0){
is_login(array('superadmin','admin'));
$filter['name']  = $_POST['filterOne']; 
$filter['status']= $_POST['filterTwo']; 
$filter['isDelete'] = $_POST['filterThree']; 
$filter['sub_category_id'] = $_POST['filterFour']; 
$filter['isTrending'] = $_POST['filterFive']; 




$rowperpage = getRowPerPage();
if($rowno != 0){
$rowno = ($rowno-1) * $rowperpage;
}
$allcount     =  $this->Mdlmedia->get_media('yes',$rowperpage,$rowno,$filter);
$users_record =  $this->Mdlmedia->get_media('no',$rowperpage,$rowno,$filter);
$pageNo = $this->uri->segment(3);
$data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'media','medias');
$data['loadTableData'] = $users_record;
$data['pageNumber'] = $pageNo;

echo json_encode($data);
}






public function delete_media(){


is_login(array('superadmin'));
      $id = $this->input->post('id');
      $data['deleted'] = get_dateTime();
    $data['deletedBy'] = getUser('users_id');
    $data['isDelete'] = 1;

      $this->db->where('id',$id);
      $res = $this->db->update('media',$data);
    if($res)
    {
      $response['status'] = 1;
      $response['msg']  = 'Moved to trash';
    }
    else
    {
      $response['status'] = 0;
      $response['msg']  = 'Error try again';
    }
    echo json_encode($response);
}

////////////############MUX##########////////////////////////////



function directuploadvideo(){
	                    /** $post_data = json_encode($postData,JSON_NUMERIC_CHECK);
						$headers = [
							'Content-Type: application/json',
						];
                        $url = "https://api.mux.com/video/v1/uploads";
						$curl = curl_init($url);                                                                            
						curl_setopt($curl, CURLOPT_POST, true);                                                             
						curl_setopt($curl, CURLOPT_POSTFIELDS,$post_data);                                    
						curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
						$response = curl_exec($curl);  
						curl_close($curl);  	     
						$rdata = json_decode($response, TRUE);
						$status = $rdata['status'];
						if($status=='accepted'){
							$redirect_url = $rdata['data']['payment_url'];
							header('Location:'.$redirect_url);
						}else{
							json_output(406,array('code' => 406,'status' => 'Error','message' => 'Transaction failed.')); //Not Acceptable
						}  **/
						$this->load->view('upload');
						
						
}


}
?>