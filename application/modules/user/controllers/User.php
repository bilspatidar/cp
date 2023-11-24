<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class User extends CI_Controller {

    function __construct() {
        parent::__construct(); 
		$this->load->model('User_model');
		
		
    }

    public function index() {
    	if(is_login()){
    		redirect( base_url().'dashboard', 'refresh');
    	} 
    }
    public function login(){
    	if(isset($_SESSION['user_details'])){
    		redirect( base_url().'dashboard', 'refresh');
    	}   
		 $this->load->view('login'); 
    }
    public function auth_login($page =''){ 
 
	
		$return = $this->User_model->auth_UserLogin();
 
		if(empty($return)) { 
		echo"Invalid login details."; 
        } else { 
			if($return == 'not_varified') {
				echo"Account is not Active.";
			} else {
			    $this->session->set_userdata('user_details',$return);
				echo'1';
			}
        }
    }
    public function logout(){
        is_login();
        $this->session->unset_userdata('user_details');               
        redirect( base_url().'user/login', 'refresh');
    }
     
    public function manage_password(){
        is_login();
		
	        $title['page_title'] = 'Manage Password';
		 	$this->load->view('include/header',$title);
            $this->load->view('manage_password');                
            $this->load->view('include/footer'); 
    }
    
    function update_password(){
      $users_id = getUser('users_id');

      $password1 = $this->input->post('password1'); 
      $password2 = $this->input->post('password2');
     $this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('password1','Old Password', 'required');




$rules = array(
                [
                    'field' => 'password2',
                    'label' => 'Password',
                    //'rules' => 'min_length[6]|callback_valid_password',
                    'rules' =>'required',
                ],
               
            );
            $this->form_validation->set_rules($rules);
            
            
$this->form_validation->set_rules('password3','Confirm Password','required|matches[password2]');
if ($this->form_validation->run() == FALSE) {
  
   
    
        $response['status'] = 0;
        $response['msg']  = validation_errors();
     
} 
else {
    
    if($password1==$password2)
    {

       
        $response['status'] = 0;
        $response['msg']  = 'Please choose different password';
    }
    else
    {
     $gets =   $this->db->get_where('users',array('users_id'=>$users_id))->row()->password;
     
     if(password_verify($password1, $gets))
      {
     $data['password'] =  password_hash($password2, PASSWORD_DEFAULT);
    
      $this->db->where('users_id',$users_id);
      $result =  $this->db->update('users',$data);

if($result)
           {
               $response['status'] = 1;
               $response['msg']  = 'Password changed successfully';
           }
           else
           {
      
              $response['status'] = 0;
              $response['msg']  = 'Error try again';
           }
           
           
      }
      else
      {
          
              $response['status'] = 0;
              $response['msg']  = 'Old Password Not Matched';
         
       }
    }
      	
}

    
echo json_encode($response);	
      
  }

public function manage_profile(){
        is_login();
		
	        $title['page_title'] = 'Manage Profile';
			
			$this->load->view('include/header',$title);
            $this->load->view('manage_profile');                
            $this->load->view('include/footer'); 
    }
    
    
      public function add_my_profile($param1=''){
      is_login();
     
      if($param1=='update'){
$id = $this->input->post('users_id');         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');


if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
              $data['name'] = $this->input->post('name');
             // $data['BRAND_NAME'] = $this->input->post('BRAND_NAME');
              $data['address'] = $this->input->post('address');
              $data['mobile'] = $this->input->post('mobile');
              $data['email'] = $this->input->post('email');
           
             //  image upload
		    $tmpImage = $this->input->post('profile_pic');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['profile_pic'] = $tmpImage;
	           $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('users',array('users_id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->profile_pic;
                 $load_url = 'uploads/users/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/users/".$img);		
    			}
              }
	        }
	        
	        // end image upload   
    
            $data['status'] = 'Active';
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		    $this->db->where('users_id',$id);
			$result = $this->db->update('users',$data);
           
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

/////////////###my profile ###//////////
    
    
public function my_profile(){
        is_login(array('superadmin','admin','instructor','super_admin','dispatch_packaging'));
		
	        $title['page_title'] = 'My Profile';
			$page_data['row'] = $this->db->get_where('users',array('users_id'=>getUser('users_id')))->result();
			$this->load->view('include/header',$title);
            $this->load->view('my_profile',$page_data);                
            $this->load->view('include/footer'); 
    }
/////////////###my profile  end ###/////////

public function forget_password()
	{
	   
	   $this->load->view('forget_password_view',@$data);	
   }

  public function sentPasssword(){
     
        
    $this->form_validation->set_error_delimiters('', '');
    $this->form_validation->set_rules('email','Email', 'required');
    if ($this->form_validation->run() == FALSE) {

        
        echo validation_errors();
    } 
    else {
            $email=$this->input->post('email');
        
        $this->db->where('email',$email);
        
		$results = $this->db->get('users');
		
		if($results->num_rows()>0){
	
		    $random = rand(00000,99999);
		    //$random='123456';
		    $npass = password_hash($random, PASSWORD_DEFAULT);
			$data['password'] = $npass;
			$this->db->where('email',$email);
		    $this->db->update('users',$data);
	    
	         echo "Your Password has been sent your email!";
	      
// 	        send mail open
$this->load->library('phpmailer_lib');
$mail = $this->phpmailer_lib->load();
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host     = SMTP_HOST;
$mail->SMTPAuth = true;
$mail->Username = SMTP_UNAME;
$mail->Password = SMTP_PWORD;
 $mail->SMTPSecure = 'SSL';
//$mail->SMTPSecure = false;
//$mail->SMTPAutoTLS = false;
$mail->Port     = SMTP_PORT;
$mail->setFrom(SET_FROM,SET_FROM_PARA); 
$mail->addReplyTo(SET_FROM,SET_FROM_PARA); 
$mail->addAddress($email);  
$mail->Subject = 'Password Reset'; 
$mail->isHTML(true); 
 $mail->Body = "Dear Sir/Madam \n\n <p><h3>Congratulations! Your Password Has Been Reset successfully,
Your New Password is $random</h3></p>\n\n\n\n\n\n\n\n\n\n\n

<p>Reecash</p>
<p><a href='<?php echo base_url();?>' target='_blank()'><?php echo base_url();?>Click to login</a></p>
"; 
    
 
 
if(!$mail->send()){ 
       echo "Error try again!";
// $msg= "not sent";
//   // echo $mail->ErrorInfo; 
 }else{ 
            echo "1";
//  $msg= "Your Password has been sent your email!";
 }
	       // mail close
		    
		} else {
		    echo "Email not found!";
		}
    } 
    		 echo "1";	
             echo "Invalid login details.";
             echo "Email not found!";
         
          
    }
	
        
    public function new_employee() {
    is_login(array('superadmin'));
            $title['page_title'] = 'New Employee Registration';
		    $this->load->view('include/header',$title);
		    $page_data['roles'] = $this->db->get_where('user_role',array('status'=>'Active','name !=' =>'Admin'))->result();
		  //   $page_data['branch'] = $this->db->get_where('branch',array('status'=>''))->result();
		    $page_data['fe'] = $this->db->get_where('users',array('user_type'=>'Dispatch & Packaging'))->result();
            $this->load->view('new_employee',$page_data);    
            $this->load->view('include/footer');  
}





//  public function state_admin() {
//     is_login(array('superadmin'));
//             $title['page_title'] = 'State Admin';
// 		    $this->load->view('include/header',$title);
		  
//             $this->load->view('state_admin');    
//             $this->load->view('include/footer');  
            
            //  $page_data['roles'] = $this->db->get_where('user_role',array('status'=>'Active','name !=' =>'Admin'))->result();
		  //   $page_data['branch'] = $this->db->get_where('branch',array('status'=>''))->result();
		  //  $page_data['fe'] = $this->db->get_where('users',array('user_type'=>'Dispatch & Packaging'))->result();
// }

 public function state_admin(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'State Admin';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'user/get_state_admin/';
			$this->load->view('include/header',$title);
            $this->load->view('state_admin');                
            $this->load->view('include/footer',$footer);    
}
 public function add_user($param1=''){
      is_login();
         if($param1=='add'){
             ini_set('display_errors', 1);
            
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('mobile','Mobile', 'required|is_unique[users.mobile]');
$this->form_validation->set_rules('email','Email','valid_email|is_unique[users.email]');
$this->form_validation->set_rules('name','Name','required');
$this->form_validation->set_rules('state_id','State Name','required');
 $this->form_validation->set_rules('address', 'Address', 'required');
$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('cPassword', 'Confirm password', 'required|matches[password]');
 //$this->form_validation->set_rules('id_card', 'Id Proof', 'required');
 //$this->form_validation->set_rules('profile_pic', 'Photo', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
           $pwd = $this->input->post('password');
			$data['password'] = password_hash($pwd, PASSWORD_DEFAULT);
// 		 $user_id = $this->input->post('user_id');
// 			if($user_id = 1000){
// 			    $data['user_id'] = $this->Common->GenerateMerchantId();
// 			}
		    
          
            $data['address'] = $this->input->post('address');
            $data['email'] = $this->input->post('email');
            $data['name'] = $this->input->post('name');
             $data['mobile'] = $this->input->post('mobile');
             $data['state_id'] = $this->input->post('state_id');
           
            //  $data['cpassword'] = $this->input->post('cpassword');
             $data['encrypt_key'] = $this->Common->random_key_string();
            $role_id = $this->input->post('role_id');
          
            $data['role_id']  = $role_id;

            $userType = $this->Common->getUserType($role_id);
            if($userType){
                $data['user_type'] = implode(',',$userType);
            }
             $data['user_type'] = $this->Common->get_col_by_key('user_role','id',$role_id,'slug');
            
            $data['status'] = 'Active';
            
            $tmpImage = $this->input->post('profile_pic');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['profile_pic'] = $tmpImage;
	            $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        
	         $tmpImage = $this->input->post('id_card');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['id_card'] = $tmpImage;
	            $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
              $data['encryptKey'] = $this->Common->generateEncKey();
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');      
            $result = $this->db->insert('users',$data);
           
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
$id = $this->input->post('users_id');         
$this->form_validation->set_error_delimiters('', '');
// $this->form_validation->set_rules('mobile','Mobile', 'required|is_unique[users.mobile]');
// $this->form_validation->set_rules('email','Email','valid_email|is_unique[users.email]');
$this->form_validation->set_rules('name','Name','required');
$this->form_validation->set_rules('state_id','State Name','required');
 $this->form_validation->set_rules('address', 'Address', 'required');
// $this->form_validation->set_rules('password', 'Password', 'required');
// $this->form_validation->set_rules('cPassword', 'Confirm password', 'required|matches[password]');
// $this->form_validation->set_rules('id_card', 'Id Proof', 'required');
// $this->form_validation->set_rules('profile_pic', 'Photo', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            // $role_id = $this->input->post('role_id');
            // $userRole = implode(',',$role_id);
            // $data['role_id'] = $userRole[0];
            // $data['role_ids'] = $userRole;
            // $data['user_type'] = $this->Common->get_col_by_key('user_role','id',$userRole[0],'slug');
            $pwd = $this->input->post('password');
            if(!empty($pwd)){
    	    $data['password'] = password_hash($pwd, PASSWORD_DEFAULT);
    	    $data['cPassword'] = $this->input->post('cPassword');
            }
            
            
            
            // $data['email'] = $this->input->post('email');
            $data['address'] = $this->input->post('address');
            $data['email'] = $this->input->post('email');
            $data['name'] = $this->input->post('name');
             $data['mobile'] = $this->input->post('mobile');
             $data['state_id'] = $this->input->post('state_id');
            
           
            $data['status'] = $this->input->post('status');
            
            
            
            
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		    
		     $tmpImage = $this->input->post('profile_pic');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['profile_pic'] = $tmpImage;
	           $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('users',array('users_id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->profile_pic;
                 $load_url = 'uploads/users/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/users/".$img);		
    			}
              }
	        }
		    
		     $tmpImage = $this->input->post('id_card');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['id_card'] = $tmpImage;
	           $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('users',array('users_id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->id_card;
                 $load_url = 'uploads/users/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/users/".$img);		
    			}
              }
	        }
		    $this->db->where('users_id',$id);
			$result = $this->db->update('users',$data);
           
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
   
        // redirect(base_url().'member/new_user','refresh');
    
  }
 public function get_state_admin($rowno=0){
  is_login(array('superadmin'));    
      $filter['name']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->User_model->get_state_admin('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->User_model->get_state_admin('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'user','state_admin');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
 public function delete_state_admin(){
         is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('users_id',$id);
          $res = $this->db->update('users',$data);
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
  
  
 
 public function sales_manager(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Sales Manager';
	        $footer['tableData']   = 1;
             $footer['dataLink']   = base_url().'user/get_sales_manager/';
			$this->load->view('include/header',$title);
            $this->load->view('sales_manager');                
            $this->load->view('include/footer',$footer);    
}
 public function add_sales_manager($param1=''){
      is_login();
         if($param1=='add'){
            
            
$this->form_validation->set_error_delimiters('', '');
 $this->form_validation->set_rules('parent_id','State Admin Name', 'required');

$this->form_validation->set_rules('mobile','Mobile', 'required|is_unique[users.mobile]');
$this->form_validation->set_rules('email','Email','valid_email|is_unique[users.email]');
$this->form_validation->set_rules('name','Name','required');
$this->form_validation->set_rules('state_id','State Name','required');
 $this->form_validation->set_rules('address', 'Address', 'required');
$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('cPassword', 'Confirm password', 'required|matches[password]');
 //$this->form_validation->set_rules('id_card', 'Id Proof', 'required');
 //$this->form_validation->set_rules('profile_pic', 'Photo', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
           $pwd = $this->input->post('password');
			$data['password'] = password_hash($pwd, PASSWORD_DEFAULT);
// 		 $user_id = $this->input->post('user_id');
// 			if($user_id = 1000){
// 			    $data['user_id'] = $this->Common->GenerateMerchantId();
// 			}
		    
            // $cPassword = $this->input->post('cPassword');
             $data['parent_id'] = $this->input->post('parent_id');
            $data['address'] = $this->input->post('address');
            $data['email'] = $this->input->post('email');
            $data['name'] = $this->input->post('name');
             $data['mobile'] = $this->input->post('mobile');
             $data['state_id'] = $this->input->post('state_id');
           
            //  $data['cpassword'] = $this->input->post('cpassword');
            $data['encrypt_key'] = $this->Common->random_key_string();
            $role_id = $this->input->post('role_id');
          
            $data['role_id']  = $role_id;

            $userType = $this->Common->getUserType($role_id);
            if($userType){
                $data['user_type'] = implode(',',$userType);
            }
             $data['user_type'] = $this->Common->get_col_by_key('user_role','id',$role_id,'slug');
            
            $data['status'] = 'Active';
            
            $tmpImage = $this->input->post('profile_pic');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['profile_pic'] = $tmpImage;
	            $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        
	         $tmpImage = $this->input->post('id_card');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['id_card'] = $tmpImage;
	            $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
            //  $data['encryptKey'] = $this->Common->generateEncKey();
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');      
            $result = $this->db->insert('users',$data);
           
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
$id = $this->input->post('users_id');         
$this->form_validation->set_error_delimiters('', '');
 $this->form_validation->set_rules('parent_id','State Admin Name', 'required');
// $this->form_validation->set_rules('email','Email','valid_email|is_unique[users.email]');
$this->form_validation->set_rules('name','Name','required');
$this->form_validation->set_rules('state_id','State Name','required');
 $this->form_validation->set_rules('address', 'Address', 'required');
// $this->form_validation->set_rules('password', 'Password', 'required');
// $this->form_validation->set_rules('cPassword', 'Confirm password', 'required|matches[password]');
// $this->form_validation->set_rules('id_card', 'Id Proof', 'required');
// $this->form_validation->set_rules('profile_pic', 'Photo', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            // $role_id = $this->input->post('role_id');
            // $userRole = implode(',',$role_id);
            // $data['role_id'] = $userRole[0];
            // $data['role_ids'] = $userRole;
            // $data['user_type'] = $this->Common->get_col_by_key('user_role','id',$userRole[0],'slug');
            $pwd = $this->input->post('password');
            if(!empty($pwd)){
    	    $data['password'] = password_hash($pwd, PASSWORD_DEFAULT);
    	    $data['cPassword'] = $this->input->post('cPassword');
            }
            
            
            
             $data['parent_id'] = $this->input->post('parent_id');
            $data['address'] = $this->input->post('address');
            $data['email'] = $this->input->post('email');
            $data['name'] = $this->input->post('name');
             $data['mobile'] = $this->input->post('mobile');
             $data['state_id'] = $this->input->post('state_id');
            
           
            $data['status'] = $this->input->post('status');
            
            
            
            
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		    
		     $tmpImage = $this->input->post('profile_pic');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['profile_pic'] = $tmpImage;
	           $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('users',array('users_id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->profile_pic;
                 $load_url = 'uploads/users/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/users/".$img);		
    			}
              }
	        }
		    
		     $tmpImage = $this->input->post('id_card');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['id_card'] = $tmpImage;
	           $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('users',array('users_id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->id_card;
                 $load_url = 'uploads/users/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/users/".$img);		
    			}
              }
	        }
		    $this->db->where('users_id',$id);
			$result = $this->db->update('users',$data);
           
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
   
        // redirect(base_url().'member/new_user','refresh');
    
  }
 public function get_sales_manager($rowno=0){
  is_login(array('superadmin'));    
      $filter['name']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->User_model->get_sales_manager('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->User_model->get_sales_manager('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'user','sales_manager');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
 public function delete_sales_manager(){
         is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('users_id',$id);
          $res = $this->db->update('users',$data);
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
   
  
 public function office_staff(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Office Staff';
	        $footer['tableData']   = 1;
             $footer['dataLink']   = base_url().'user/get_office_staff/';
			$this->load->view('include/header',$title);
            $this->load->view('office_staff');                
            $this->load->view('include/footer',$footer);    
}
 public function add_office_staff($param1=''){
      is_login();
         if($param1=='add'){
            
            
$this->form_validation->set_error_delimiters('', '');
 $this->form_validation->set_rules('parent_id','State Admin Name', 'required');

$this->form_validation->set_rules('mobile','Mobile', 'required|is_unique[users.mobile]');
$this->form_validation->set_rules('email','Email','valid_email|is_unique[users.email]');
$this->form_validation->set_rules('name','Name','required');
$this->form_validation->set_rules('state_id','State Name','required');
 $this->form_validation->set_rules('address', 'Address', 'required');
$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('cPassword', 'Confirm password', 'required|matches[password]');
 //$this->form_validation->set_rules('id_card', 'Id Proof', 'required');
 //$this->form_validation->set_rules('profile_pic', 'Photo', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
           $pwd = $this->input->post('password');
			$data['password'] = password_hash($pwd, PASSWORD_DEFAULT);
// 		 $user_id = $this->input->post('user_id');
// 			if($user_id = 1000){
// 			    $data['user_id'] = $this->Common->GenerateMerchantId();
// 			}
		    
            // $cPassword = $this->input->post('cPassword');
             $data['parent_id'] = $this->input->post('parent_id');
            $data['address'] = $this->input->post('address');
            $data['email'] = $this->input->post('email');
            $data['name'] = $this->input->post('name');
             $data['mobile'] = $this->input->post('mobile');
             $data['state_id'] = $this->input->post('state_id');
           
            //  $data['cpassword'] = $this->input->post('cpassword');
            $data['encrypt_key'] = $this->Common->random_key_string();
            $role_id = $this->input->post('role_id');
          
            $data['role_id']  = $role_id;

            $userType = $this->Common->getUserType($role_id);
            if($userType){
                $data['user_type'] = implode(',',$userType);
            }
             $data['user_type'] = $this->Common->get_col_by_key('user_role','id',$role_id,'slug');
            
            $data['status'] = 'Active';
            
            $tmpImage = $this->input->post('profile_pic');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['profile_pic'] = $tmpImage;
	            $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        
	         $tmpImage = $this->input->post('id_card');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['id_card'] = $tmpImage;
	            $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
            //  $data['encryptKey'] = $this->Common->generateEncKey();
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');      
            $result = $this->db->insert('users',$data);
           
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
$id = $this->input->post('users_id');         
$this->form_validation->set_error_delimiters('', '');
 $this->form_validation->set_rules('parent_id','State Admin Name', 'required');
// $this->form_validation->set_rules('email','Email','valid_email|is_unique[users.email]');
$this->form_validation->set_rules('name','Name','required');
$this->form_validation->set_rules('state_id','State Name','required');
 $this->form_validation->set_rules('address', 'Address', 'required');
// $this->form_validation->set_rules('password', 'Password', 'required');
// $this->form_validation->set_rules('cPassword', 'Confirm password', 'required|matches[password]');
// $this->form_validation->set_rules('id_card', 'Id Proof', 'required');
// $this->form_validation->set_rules('profile_pic', 'Photo', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            // $role_id = $this->input->post('role_id');
            // $userRole = implode(',',$role_id);
            // $data['role_id'] = $userRole[0];
            // $data['role_ids'] = $userRole;
            // $data['user_type'] = $this->Common->get_col_by_key('user_role','id',$userRole[0],'slug');
            $pwd = $this->input->post('password');
            if(!empty($pwd)){
    	    $data['password'] = password_hash($pwd, PASSWORD_DEFAULT);
    	    $data['cPassword'] = $this->input->post('cPassword');
            }
            
            
            
             $data['parent_id'] = $this->input->post('parent_id');
            $data['address'] = $this->input->post('address');
            $data['email'] = $this->input->post('email');
            $data['name'] = $this->input->post('name');
             $data['mobile'] = $this->input->post('mobile');
             $data['state_id'] = $this->input->post('state_id');
            
           
            $data['status'] = $this->input->post('status');
            
            
            
            
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		    
		     $tmpImage = $this->input->post('profile_pic');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['profile_pic'] = $tmpImage;
	           $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('users',array('users_id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->profile_pic;
                 $load_url = 'uploads/users/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/users/".$img);		
    			}
              }
	        }
		    
		     $tmpImage = $this->input->post('id_card');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['id_card'] = $tmpImage;
	           $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('users',array('users_id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->id_card;
                 $load_url = 'uploads/users/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/users/".$img);		
    			}
              }
	        }
		    $this->db->where('users_id',$id);
			$result = $this->db->update('users',$data);
           
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
   
        // redirect(base_url().'member/new_user','refresh');
    
  }
 public function get_office_staff($rowno=0){
  is_login(array('superadmin'));    
      $filter['name']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->User_model->get_office_staff('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->User_model->get_office_staff('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'user','office_staff');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
 public function delete_office_staff(){
         is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('users_id',$id);
          $res = $this->db->update('users',$data);
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
  
 public function manage_seller(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Manage Seller';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'user/get_manage_seller/';
			$this->load->view('include/header',$title);
            $this->load->view('manage_seller');                
            $this->load->view('include/footer',$footer);    
}
 public function add_manage_seller($param1=''){
      is_login();
         if($param1=='add'){
             ini_set('display_errors', 1);
            
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('mobile','Mobile', 'required|is_unique[users.mobile]');
$this->form_validation->set_rules('email','Email','valid_email|is_unique[users.email]');
$this->form_validation->set_rules('name','Name','required');
$this->form_validation->set_rules('city','City','required');
$this->form_validation->set_rules('pincode','Pincode','required');
// $this->form_validation->set_rules('category','Category','required');
$this->form_validation->set_rules('state_id','State Name','required');
 $this->form_validation->set_rules('address', 'Address', 'required');
$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('cPassword', 'Confirm password', 'required|matches[password]');
 //$this->form_validation->set_rules('id_card', 'Id Proof', 'required');
 //$this->form_validation->set_rules('profile_pic', 'Photo', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
           $pwd = $this->input->post('password');
			$data['password'] = password_hash($pwd, PASSWORD_DEFAULT);
// 		 $user_id = $this->input->post('user_id');
// 			if($user_id = 1000){
// 			    $data['user_id'] = $this->Common->GenerateMerchantId();
// 			}
		    
          
            $data['city'] = $this->input->post('city');
             $data['pincode'] = $this->input->post('pincode');
              $data['category'] = $this->input->post('category');
               $data['address'] = $this->input->post('address');
            $data['email'] = $this->input->post('email');
            $data['name'] = $this->input->post('name');
             $data['mobile'] = $this->input->post('mobile');
             $data['state_id'] = $this->input->post('state_id');
           
            //  $data['cpassword'] = $this->input->post('cpassword');
             $data['encrypt_key'] = $this->Common->random_key_string();
            $role_id = $this->input->post('role_id');
          
            $data['role_id']  = $role_id;

            $userType = $this->Common->getUserType($role_id);
            if($userType){
                $data['user_type'] = implode(',',$userType);
            }
             $data['user_type'] = $this->Common->get_col_by_key('user_role','id',$role_id,'slug');
            
            $data['status'] = 'Active';
            
            $tmpImage = $this->input->post('profile_pic');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['profile_pic'] = $tmpImage;
	            $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        
	         $tmpImage = $this->input->post('id_card');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['id_card'] = $tmpImage;
	            $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
              $data['encryptKey'] = $this->Common->generateEncKey();
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');      
            $result = $this->db->insert('users',$data);
           
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
$id = $this->input->post('users_id');         
$this->form_validation->set_error_delimiters('', '');
// $this->form_validation->set_rules('mobile','Mobile', 'required|is_unique[users.mobile]');
// $this->form_validation->set_rules('email','Email','valid_email|is_unique[users.email]');
$this->form_validation->set_rules('name','Name','required');
$this->form_validation->set_rules('state_id','State Name','required');
 $this->form_validation->set_rules('address', 'Address', 'required');
// $this->form_validation->set_rules('password', 'Password', 'required');
// $this->form_validation->set_rules('cPassword', 'Confirm password', 'required|matches[password]');
// $this->form_validation->set_rules('id_card', 'Id Proof', 'required');
// $this->form_validation->set_rules('profile_pic', 'Photo', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            // $role_id = $this->input->post('role_id');
            // $userRole = implode(',',$role_id);
            // $data['role_id'] = $userRole[0];
            // $data['role_ids'] = $userRole;
            // $data['user_type'] = $this->Common->get_col_by_key('user_role','id',$userRole[0],'slug');
            $pwd = $this->input->post('password');
            if(!empty($pwd)){
    	    $data['password'] = password_hash($pwd, PASSWORD_DEFAULT);
    	    $data['cPassword'] = $this->input->post('cPassword');
            }
            
            
            
            // $data['email'] = $this->input->post('email');
            $data['city'] = $this->input->post('city');
             $data['pincode'] = $this->input->post('pincode');
              $data['category'] = $this->input->post('category');
            $data['address'] = $this->input->post('address');
            $data['email'] = $this->input->post('email');
            $data['name'] = $this->input->post('name');
             $data['mobile'] = $this->input->post('mobile');
             $data['state_id'] = $this->input->post('state_id');
            
           
            $data['status'] = $this->input->post('status');
            
            
            
            
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		    
		     $tmpImage = $this->input->post('profile_pic');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['profile_pic'] = $tmpImage;
	           $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('users',array('users_id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->profile_pic;
                 $load_url = 'uploads/users/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/users/".$img);		
    			}
              }
	        }
		    
		     $tmpImage = $this->input->post('id_card');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['id_card'] = $tmpImage;
	           $upload_base_dir = "uploads/users/";
	           if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
             if (copy("uploads/temp_images/".$tmpImage,$upload_base_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('users',array('users_id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->id_card;
                 $load_url = 'uploads/users/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/users/".$img);		
    			}
              }
	        }
		    $this->db->where('users_id',$id);
			$result = $this->db->update('users',$data);
           
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
   
        // redirect(base_url().'member/new_user','refresh');
    
  }
 public function get_manage_seller($rowno=0){
  is_login(array('superadmin'));    
      $filter['name']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->User_model->get_manage_seller('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->User_model->get_manage_seller('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'user','manage_seller');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
 public function delete_manage_seller(){
         is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('users_id',$id);
          $res = $this->db->update('users',$data);
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
  
  
  
  
  
  
    public function employee_list($param='',$param2='',$param3=''){  
is_login(array('superadmin'));
             $data['id'] =  $param2;
            $data['edit_modal'] = $param3;
	        $title['page_title'] = 'All Users';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'user/get_employee_list/'.$param.'/';
			$this->load->view('include/header',$title);
            $this->load->view('employee_list',$data);                
            $this->load->view('include/footer',$footer);            
 
  }
   
  public function get_employee_list($param='',$rowno=0){
     is_login(array('superadmin'));
        $filter['name']  = $_POST['filterOne']; 
 
    
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    // $allcount = $this->db->get_where('users',array('roleId'=>$roleId))->num_rows();
    $allcount     =  $this->User_model->get_employee_list('yes',$rowperpage,$rowno,$filter,$param);
    $users_record =  $this->User_model->get_employee_list('no',$rowperpage,$rowno,$filter,$param);
    $pageNo = $this->uri->segment(4);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'user','employee_list');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
   
    public function delete_employee($id=''){
    is_login(array('superadmin'));
    $this -> db -> where('users_id', $id);
   $result = $this -> db -> delete('users');

        if($result)
        {
          $response['status'] = 1;
          $response['msg']  = 'Deleted successfully';
        }
        else
        {
          $response['status'] = 0;
          $response['msg']  = 'Error try again';
        }
        echo json_encode($response);
 }
 
 
 
     //////////###### Open User Service Link #######//////////////
    
  public function users_service_link(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Users Service Link';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'user/get_users_service_link/';
			$this->load->view('include/header',$title);
            $this->load->view('users_service_link');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_users_service_link($param1=''){
     is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('users_id','User Name', 'required');
$this->form_validation->set_rules('service_id[]','Service Name', 'required');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['users_id'] = $this->input->post('users_id');
            // $data['service_id'] = $this->input->post('service_id');
            $ser_id = $this->input->post('service_id');
            $services = implode(",",$ser_id);
            $data['service_id'] = $services;
            $data['external_price'] = $this->input->post('external_price');
            $data['status'] = 'Active';
                 
			$result = $this->db->insert('users_service_link',$data);
           
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
$this->form_validation->set_rules('users_id','User Name', 'required');
$this->form_validation->set_rules('service_id[]','Service Name', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
             $data['users_id'] = $this->input->post('users_id');
            // $data['service_id'] = $this->input->post('service_id');
            $ser_id = $this->input->post('service_id');
            $services = implode(",",$ser_id);
            $data['service_id'] = $services;
            $data['external_price'] = $this->input->post('external_price');
            $data['status'] = $this->input->post('status');        
		
		    $this->db->where('id',$id);
			$result = $this->db->update('users_service_link',$data);
           
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
  public function get_users_service_link($rowno=0){
      is_login(array('superadmin','admin'));
    //   ini_set('display_errors', 1);
      $filter['users_id']  = $_POST['filterOne']; 
      $filter['service_id']= $_POST['filterTwo']; 
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->User_model->get_users_service_link('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->User_model->get_users_service_link('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'user','users_service_link');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_users_service_link($id=''){
    is_login(array('superadmin','admin'));
    $this -> db -> where('id', $id);
   $result = $this -> db -> delete('users_service_link');

        if($result)
        {
          $response['status'] = 1;
          $response['msg']  = 'Deleted successfully';
        }
        else
        {
          $response['status'] = 0;
          $response['msg']  = 'Error try again';
        }
        echo json_encode($response);
 }
    
    //////////###### End User Service Link #######//////////////
 public function manage_user(){  
   is_login(array('superadmin'));
	        $title['page_title'] = 'Manage User';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'user/get_manage_user/';
			$this->load->view('include/header',$title);
            $this->load->view('manage_user');                
            $this->load->view('include/footer',$footer);            
  }
    public function add_manage_user($param1=''){
      is_login(array('superadmin'));
      if($param1=='update'){
$id = $this->input->post('users_id'); 

$this->form_validation->set_rules('name','Full Name', 'required');
$this->form_validation->set_rules('mobile','Mobile', 'required');
$this->form_validation->set_rules('email','Email Address');
if ($this->form_validation->run() == FALSE) {
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} else {
    
            $data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['mobile'] = $this->input->post('mobile');
			$data['username'] = $this->input->post('username');
			$password = $this->input->post('password');
			if(!empty($password)){
			$data['password'] = password_hash($password, PASSWORD_DEFAULT);
			}
            $data['status'] = $this->input->post('status');
		    $data['updated'] = date('Y-m-d H:i:s');
	        $data['updatedBy'] = getUser('users_id');         
		    
		    //  image upload
		    $tmpImage = $this->input->post('profile_pic');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['profile_pic'] = $tmpImage;
	           $uploads_dir = 'uploads/users/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('users',array('users_id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->profile_pic;
                 $load_url = 'uploads/users/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/users/".$img);		
    			}
               }
	        }
			    
		    $this->db->where('users_id',$id);
			$result = $this->db->update('users',$data);
           
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

  public function get_manage_user($rowno=0){
          ini_set('display_errors', 1);
      is_login(array('superadmin'));
       $filter['name']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree']; 
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->User_model->get_manage_user('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->User_model->get_manage_user('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'user','manage_user');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_manage_user(){
    is_login(array('superadmin'));
           $id = $this->input->post('id');
          $data['deleted'] = date('Y-m-d H:i:s');
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('users_id',$id);
          $result = $this->db->update('users',$data);
        if($result)
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
 
    //////////###### END Customer #######//////////////
   
   	 public function edit_form($page='',$table='',$key='',$value=''){
	  is_login(array('superadmin','admin','instructor','super_admin','dispatch_packaging'));
	  $page_data['row'] = $this->db->get_where($table,array($key=>$value))->result();
	  $this->load->view($page,$page_data);
	  $this->load->view('include/editModelJs');
  }  
    
}	            

?>




