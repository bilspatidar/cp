<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Crop extends CI_Controller {

  function __construct() {

    parent::__construct();
	 }

   //////////###### BRANCH #######//////////////
   
  public function image(){  
  is_login();
  
	        $title['page_title'] = 'Branch';
	       	$this->load->view('include/header',$title);
            $this->load->view('crop');                
            $this->load->view('include/footer');            
 
  }
   public function images(){  
  is_login();
  
	        $title['page_title'] = 'Branch';
	       	$this->load->view('include/header',$title);
           // $this->load->view('cropsImage'); 
            $this->load->view('crops'); 
           $this->load->view('include/footer');            
 
  }

  function apiCall(){
      $data['status'] = 'failed';
      $data['response'] = 'all is ok';
      
echo json_encode($data);
  }
  
  function processImage(){
     echo"okay";
  }
  public function upload_image_test(){

	if(isset($_POST["image"])){
	
	$image = $this->input->post("image");
	$name = $this->input->post("name");
	
	$data = base64_decode($image[1]);
    $preName =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,6);

	$imageName = $preName."_".time().'.png';
	
	$allowed = array('jpeg','jpg','gif','tiff','png','webp');
	$file_extension = pathinfo($name, PATHINFO_EXTENSION);
    $uploads_dir = 'uploads/temp_images';
    if(!file_exists($uploads_dir)) {
          mkdir($uploads_dir, 0777, true);  //create directory if not exist
          }
         $Imgname =  basename($imageName);
         
       
        if($this->uploadToS3("$uploads_dir/$imageName","",$data)){
   		echo $imageName;
		}
       
}
	}
public function upload_image(){
   
	if(isset($_POST["image"])){
	
	$image = $this->input->post("image");
	$name = $this->input->post("name");
	
	$data = base64_decode($image[1]);
    $preName =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,6);

	$imageName = $preName."_".time().'.png';
	
	$allowed = array('jpeg','jpg','gif','tiff','png','webp');
	$file_extension = pathinfo($name, PATHINFO_EXTENSION);
    $uploads_dir = 'uploads/temp_images';
    if(!file_exists($uploads_dir)) {
          mkdir($uploads_dir, 0777, true);  //create directory if not exist
          }
         $Imgname =  basename($imageName);
         
       
        if($this->uploadToS3("$uploads_dir/$imageName","",$data)){
   		echo $imageName;
		}
       
}
	}
  
  public function upload_image_bulk(){
  
   
	if(isset($_POST["image"])){
	
	$image = $_POST["image"];
	$name  = $_POST["name"];
	
	$data = base64_decode($image[1]);

  
  
    $preName =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,6);

	$imageName = $preName."_".time().'.jpg';
	
    $uploads_dir = 'uploads/temp_images';
    if(!file_exists($uploads_dir)) {
          mkdir($uploads_dir, 0777, true);  //create directory if not exist
    }
        $imageFullPath = $uploads_dir.'/'.$imageName;
       if(file_put_contents($imageFullPath,$data)){
 
        echo $imageName;
		}

}
	}
  
  public function upload_image_array(){
   
	if(isset($_POST["image"])){
	
	$image = $this->input->post("image");

	$name = $this->input->post("name");

	$data = base64_decode($image[1]);
    $preName =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,6);

	$imageName = $preName."_".time().'.png';
	
	$allowed = array('jpeg','jpg','gif','tiff','png','webp');
	$file_extension = pathinfo($name, PATHINFO_EXTENSION);
    $uploads_dir = 'uploads/temp_images';
    if(!file_exists($uploads_dir)) {
          mkdir($uploads_dir, 0777, true);  //create directory if not exist
          }
         $Imgname =  basename($imageName);
         
       
        if($this->uploadToS3("$uploads_dir/$imageName","",$data)){
   		echo $imageName;
		}
       
}
	}
  
  function uploadToS3($KeyFile,$fileTmp,$fileContent="",$private=''){
	global $config;
	global $dir;
	global $s3;
	global $enable_s3;
	global $s3_access_key;
	global $s3_access_sceret;
	global $s3_bucket;

	if($enable_s3 == 1 and (!empty($s3_access_key) and !empty($s3_access_sceret) and !empty($s3_bucket))) {

      if(strpos($KeyFile,'order_files') !== false){
			$ACL = "private";
		}else{
			$ACL = "public-read";
		}

	   $object = array(
	    'Bucket' => $config["bucket"],
	    'Key' =>  $KeyFile,
	    'StorageClass' => 'STANDARD',
	    'ACL' => $ACL
		);

		if (empty($fileContent)) {
		 $object["SourceFile"] = $fileTmp;
		} else {
		 $object["Body"] = $fileContent;
		}

		// echo $enable_s3;
		try{
		  $s3->putObject($object);
		  return true;
		}catch(S3Exception $error) {
		  return false;
		}catch(Exception $error) {
		  return false;
		}

	}else{
// 		if(strpos($KeyFile, 'proposal_files') !== false){
// 			$folder = "proposals";
// 		}else{
// 			$folder = "admin_area";
// 		}

// 		$KeyFile = str_replace("languages_images","languages/images", $KeyFile);
// 		$sub_folder = explode("/",$KeyFile,2);
// 		$folder = $this->getMainFolderName($sub_folder[0],"");
        $keyExpload = explode("/",$KeyFile);
		if(empty($fileContent)){
			move_uploaded_file($fileTmp,"$dir/$folder/$KeyFile");
		} else {
			file_put_contents("$KeyFile", $fileContent);
		}
		return true;

	}

}

function getMainFolderName($folder,$table){

	if($folder == "proposal_files"){ 
      $main_folder = "proposals"; 
   }elseif($folder == "request_files"){ 
      $main_folder = "requests"; 
   }elseif($folder == "conversations_files"){ 
      $main_folder = "conversations"; 
   }elseif($folder == "images" AND $table == "languages"){ 
      $main_folder = "languages";
   }elseif($folder == "article_images"){ 
      $main_folder = "article";
   }elseif($folder == "admin_images"){ 
      $main_folder = "admin";
   }else{
      $main_folder = "";
   }

   return $main_folder;

}

	
}
?>