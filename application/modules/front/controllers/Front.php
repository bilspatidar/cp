    <?php defined("BASEPATH") OR exit("No direct script access allowed");


class Front extends CI_Controller {

  function __construct() {

    parent::__construct();
    	 $this->load->model('Mdlfront');
	 }

public function add_sign_up($param1=''){
 
     
       if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','name', 'required');
$this->form_validation->set_rules('mobile','Mobile', 'required|is_unique[users.mobile]');
$this->form_validation->set_rules('email','Email Address','valid_email|is_unique[users.email]');
$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[password]');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            $refferBy = $this->input->post('refferBy');
            $check = $this->db->get_where('users',array('users_id'=>$refferBy));
            if($check->num_rows()>0){
                
                $this->db->select('amount,onSignUp');
                $this->db->from('reffer_setting');
                $this->db->where('id',1);
                $refferData = $this->db->get();
                if($refferData->num_rows()>0){
                    $refferResult = $refferData->result();
                    $reffer_amount = $refferResult[0]->amount;
                    $reffer_type = $refferResult[0]->onSignUp;
                    if($reffer_type==1){
                        $reffer_status = 1;
                    }else{
                        $reffer_status = 0;
                    }
                }else{
                    
                }
                $data['refferBy'] = $refferBy;
                $data['reffer_price'] = $reffer_amount; 
                $data['reffer_type'] = $reffer_type; 
                $data['reffer_status'] = $reffer_status; 
            }else{
                $data['refferBy'] = 0;
                $data['reffer_price'] = 0; 
                $data['reffer_type'] = 0; 
                $data['reffer_status'] = 0; 
            }
            $pwd = $this->input->post('password');
			$data['password'] = password_hash($pwd, PASSWORD_DEFAULT);
            $data['mobile'] = $this->input->post('mobile');
            $data['email'] = $this->input->post('email');
            $data['name'] = $this->input->post('name');
            
            
            $data['user_type'] = 'users';
            $data['status'] = 'Active';
           
            $result = $this->db->insert('users',$data);
           
          if($result)
          {
              $last_id = $this->db->insert_id();
              $return = $this->db->get_where('users',array('users_id'=>$last_id))->result();
              $this->session->set_userdata('front_user',$return);
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
      
  }  

public function add_sellers($param1=''){
      
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('mobile','Mobile', 'required|is_unique[users.mobile]');
$this->form_validation->set_rules('email','Email Address','valid_email|is_unique[users.email]');
$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[password]');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $password = $this->input->post('password');
            $data['email'] = $this->input->post('email');
            $data['mobile'] = $this->input->post('mobile');
            $data['user_type'] = 'seller';
            $data['password'] =  password_hash($password, PASSWORD_DEFAULT);
            $data['cPassword'] = $this->input->post('confirm_password');
            $data['mart_id'] = 1;
            $data['shop_code'] = $this->Common->get_shop_code();
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        
	        
			$result = $this->db->insert('users',$data);
           
           if($result)
           {
			   $last_id = $this->db->insert_id();
              $return = $this->db->get_where('users',array('users_id'=>$last_id))->result();
			   $this->session->set_userdata('user_details',$return);
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
      
  }

public function login(){

      if(isset($_SESSION['front_user'])){
      		redirect( base_url(),'front/index', 'refresh');
      }	

    		 $title['page_title'] = 'Login';
	        $footer['tableData']   = 1;
			$this->load->view('header',$title);
            $this->load->view('login');                
          $this->load->view('footer');
    }

public function auth_logins($page =''){ 

		$return = $this->Mdlfront->auth_logins();
   
		if(empty($return)) { 
		echo" Invalid login details."; 
        } else { 
			if($return == 'not_varified') {
				echo"Account is not Active.";
			} else {
			    $this->session->set_userdata('front_user',$return);
				echo'1';
				
			}
        }
    }

    
public function logout(){
   
        $this->session->unset_userdata('front_user');               
        redirect( base_url(),'login', 'refresh');
    }
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

<p>THE CONSCIOUS AWAKENING NETWORK</p>
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

public function index(){  
          
	        
	     	$this->load->view('header');
            $this->load->view('index');                
            $this->load->view('footer');            
  }

public function watch_live(){  
          
	        
	     	$this->load->view('header',$title);
            $this->load->view('watch_live');                
            $this->load->view('footer',$footer);            
}

public function watch_live2(){  
          
	        
	     	$this->load->view('header');
            $this->load->view('watch_live');                
            $this->load->view('footer');            
}
  
//   public function contact(){  
          
	        
// 	     	$this->load->view('header',$title);
//             $this->load->view('index');                
//             $this->load->view('footer',$footer);            
//   }
  
  public function details($id,$name){  
    $page_data['result'] = $this->db->get_where('media',array('id'=>$id))->result();
    $title['page_title'] = 'Series Details';
    $this->load->view('header',$title);
    $this->load->view('details',$page_data);                
    $this->load->view('footer');            

}


public function media($id='',$name=''){  
	//  if(empty($seriesCatId)){
    //             $seriesCatId = 0;
    //         }
	$title['page_title'] = 'Media';
	$footer['loadData']   = 1;
    $page_data['sub_category_id']= $id;
	$footer['dataLink']   = base_url().'front/get_media/'.$id.'/';
	$this->load->view('header',$title);
	$this->load->view('media',$page_data);                
	$this->load->view('footer',$footer);         

}

public function get_media($id='',$rowno=0,){ 

    $filter['gener_id'] = $_POST['filterOne'];

    $rowperpage = 200;
    if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount =  $this->Mdlfront->get_media('yes',$rowperpage,$rowno,$id,$filter);
    $users_record =  $this->Mdlfront->get_media('no',$rowperpage,$rowno,$id,$filter);
    $pageNo = $this->uri->segment(6);
    $data['paginationLink'] = $this->Mdlfront->getPaginition($allcount,$rowperpage,'front','media');
    $data['load_data'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
}


public function series(){  
	//  if(empty($seriesCatId)){
    //             $seriesCatId = 0;
    //         }
	$title['page_title'] = 'Series';
	$footer['loadData']   = 1;
	$footer['dataLink']   = base_url().'front/get_series/';
	$this->load->view('header',$title);
	$this->load->view('series');                
	$this->load->view('footer',$footer);            
}


public function get_series($rowno=0){ 
  
    $rowperpage = 12;
    if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount =  $this->Mdlfront->get_series('yes',$rowperpage,$rowno);
    $users_record =  $this->Mdlfront->get_series('no',$rowperpage,$rowno);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Mdlfront->getPaginition($allcount,$rowperpage,'front','series');
    $data['load_data'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
}



public function topics(){  
	
	$title['page_title'] = 'Topics';
	$footer['loadData']   = 1;
	$footer['dataLink']   = base_url().'front/get_topics/';
	$this->load->view('header',$title);
	$this->load->view('topics');                
	$this->load->view('footer',$footer);            
}


public function get_topics($rowno=0){ 
   
    $rowperpage = 200;
    if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount =  $this->Mdlfront->get_topics('yes',$rowperpage,$rowno,);
    $users_record =  $this->Mdlfront->get_topics('no',$rowperpage,$rowno,);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Mdlfront->getPaginition($allcount,$rowperpage,'front','topics');
    $data['load_data'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
}



public function blog($blogCatId='',$blogCatName=''){  
            if(empty($blogCatId)){
                $blogCatId = 0;
            }
	        $title['page_title'] = 'Blog';
	        $footer['loadData']   = 1;
	        $footer['dataLink']   = base_url().'front/get_blog/'.$blogCatId.'/';
	     	$this->load->view('header',$title);
            $this->load->view('blog');                
            $this->load->view('footer',$footer);            
  }
 
public function get_blog($blogCatId='',$rowno=0){
    
    $filter['category'] = $blogCatId;
    $rowperpage = 10;
    if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount =  $this->Mdlfront->get_blog('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlfront->get_blog('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Mdlfront->getPaginition($allcount,$rowperpage,'web','blog');
    $data['load_data'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
}
public function blog_details($id,$name){  
            
            $page_data['row'] = $this->db->get_where('blog',array('id'=>$id))->result();
	        $title['page_title'] = ' Blog Details';
	     	$this->load->view('header',$title);
            $this->load->view('blog_details',$page_data);                
            $this->load->view('footer');            
 
  }


public function faq(){  
 
	        $title['page_title'] = ' FAQ';
	     	$this->load->view('header',$title);
            $this->load->view('faq');                
            $this->load->view('footer');            
 
  }


public function contact_us(){  
 
	        $title['page_title'] = 'Contact';
	     	$this->load->view('header',$title);
            $this->load->view('contact');                
            $this->load->view('footer');            
 
  }
  
public function add_contact($param1=''){
      
      if($param1=='add'){

$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('email','Email', 'required');
$this->form_validation->set_rules('phone','Mobile', 'required');
$this->form_validation->set_rules('message', 'Message', 'required');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['phone'] = $this->input->post('phone');
            $data['message'] = $this->input->post('message');
            $data['status'] = 'Pending';
	        $data['date'] = get_date();
	        
			$result = $this->db->insert('contact',$data);
           
           if($result)
           {
               
               // 	client mail		
// $contact_id= $this->db->insert_id();
// 	$Cemail = ADMIN_EMAIL;
//     $email_subject = CONTACT_SUBJECT;
//     $emailData= array('id' => $contact_id );
    // send mail open
// $this->load->library('phpmailer_lib');
// $mail = $this->phpmailer_lib->load();
// $mail->isSMTP();
// $mail->SMTPDebug = 0;
// $mail->Host     = SMTP_HOST;
// $mail->SMTPAuth = true;
// $mail->Username = SMTP_UNAME;
// $mail->Password = SMTP_PWORD;
//  $mail->SMTPSecure = 'SSL';
// //$mail->SMTPSecure = false;
// //$mail->SMTPAutoTLS = false;
// $this->email->set_newline("\r\n");
// $mail->Port     = SMTP_PORT;
// $mail->setFrom(SET_FROM,SET_FROM_PARA); 
// $mail->addReplyTo(SET_FROM,SET_FROM_PARA); 
// $mail->addAddress($Cemail);  
// $mail->Subject = $email_subject; 
// $mail->isHTML(true); 
//  $mail->Body = $this->load->view('web/contact_mail',$emailData,true); 
// if(!$mail->send()){ 
//       //echo "Error try again!";
//       //echo $mail->ErrorInfo; 
//  }else{ 
//         // echo  "1";
//  }
// //  client email end

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
//redirect(base_url().'web/contact','refresh');
     }
      
  }


public function about_us(){  
 
	        $title['page_title'] = 'About';
	     	$this->load->view('header',$title);
            $this->load->view('about');                
            $this->load->view('footer');            
 
  }
  
public function add_about($param1=''){
      
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('phone','Mobile', 'required');
$this->form_validation->set_rules('message', 'Message', 'required');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['phone'] = $this->input->post('phone');
            $data['message'] = $this->input->post('message');
            $data['status'] = 'Pending';
	        
			$result = $this->db->insert('contact',$data);
           
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
//redirect(base_url().'web/contact','refresh');
     }
      
  }
  
public function payment_policy(){  
 
	        $title['page_title'] = ' Payment Policy';
	        $footer['loadData']   = 1;
            // $footer['dataLink']   = base_url().'web/get_product/';
	     	$this->load->view('header',$title);
            $this->load->view('payment_policy');                
            $this->load->view('footer');            
 
  }
public function shipping_policy(){  
 
	        $title['page_title'] = ' Shipping Policy';
	        $footer['loadData']   = 1;
            // $footer['dataLink']   = base_url().'web/get_product/';
	     	$this->load->view('header',$title);
            $this->load->view('shipping_policy');                
            $this->load->view('footer');            
 
  } 
  
public function refund_policy(){  
 
	        $title['page_title'] = ' Refund Policy';
	        $footer['loadData']   = 1;
            // $footer['dataLink']   = base_url().'web/get_product/';
	     	$this->load->view('header',$title);
            $this->load->view('refund_policy');                
            $this->load->view('footer');            
 
  }
public function cancellation_policy(){  
 
	        $title['page_title'] = ' Cancellation Policy';
	        $footer['loadData']   = 1;
            // $footer['dataLink']   = base_url().'web/get_product/';
	     	$this->load->view('header',$title);
            $this->load->view('cancellation_policy');                
            $this->load->view('footer');            
 
  }
public function term_condition(){  
 
	        $title['page_title'] = ' Term Condition';
	        $footer['loadData']   = 1;
            // $footer['dataLink']   = base_url().'web/get_product/';
	     	$this->load->view('header',$title);
            $this->load->view('term_condition');                
            $this->load->view('footer');            
 
  }
public function privancy_policy(){  
 
	        $title['page_title'] = ' Privancy Policy';
	        $footer['loadData']   = 1;
            $footer['dataLink']   = base_url().'web/get_product/';
	     	$this->load->view('header',$title);
            $this->load->view('privancy_policy');                
            $this->load->view('footer',$footer);            
 
  }

  public function profile_setting(){
    
$data['title']  = 'Profile Setting';
$title['page_title'] = 'Profile Setting';
   $pincode = $this->session->userdata('front_user');
    $id = $pincode[0]->users_id;
    
    $data['row']  = $this->db->get_where('users',array('users_id'=>$id))->result(); 
    $this->load->view('header',$title);
    $this->load->view('profile_setting',$data);
    $this->load->view('footer');

}
public function profile_update(){

    $this->form_validation->set_error_delimiters('', '');
    $this->form_validation->set_rules('name',' Name', 'required');
    $this->form_validation->set_rules('mobile','Mobile', 'required');
    // $this->form_validation->set_rules('state_id', 'State', 'required');
    // $this->form_validation->set_rules('city_id', 'City', 'required');
    // $this->form_validation->set_rules('postal_code',' Postal Code', 'required');
    $this->form_validation->set_rules('address','Address', 'required');
    
    if ($this->form_validation->run() == FALSE) {
                  $response['status'] = 0;
                  $response['msg']  = validation_errors();
    } 
    else {
            
            $data['name']=$this->input->post('name');
            $data['email']=$this->input->post('email');
            $data['mobile']=$this->input->post('mobile');
            $data['address']=$this->input->post('address');
            // $data['city_id']=$this->input->post('city_id');
            // $data['state_id']=$this->input->post('state_id');
            // $data['postal_code']=$this->input->post('postal_code');
            
          if (isset($_FILES["profile_pic"]) && !empty($_FILES["profile_pic"]["name"])){
                     
                 $upload_base_dir ='uploads/users/';     
             
             //START UPLOADING IMAGE
    
                    $config['upload_path'] = $upload_base_dir;  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                    $config['encrypt_name'] = TRUE;
                    $this->upload->initialize($config);
    
                    $this->load->library('upload', $config);  
                    if(!$this->upload->do_upload('profile_pic'))  
                    {  
                         echo $this->upload->display_errors();  
                         exit();
                    }  
                    else  
                    {  
                         $Image_data = $this->upload->data();  
                         $config['image_library'] = 'gd2';  
                         $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                         $config['create_thumb'] = FALSE;  
                         $config['maintain_ratio'] = FALSE; 
                         $config['quality'] = '60%';  
                         $config['width'] = 200;  
                         $config['height'] = 200;  
                         $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                         $this->load->library('image_lib', $config);  
                         $this->image_lib->resize();  
                         
                         $data['profile_pic'] =  $Image_data["file_name"]; 
                     
                    }  
             
             //END UPLOADING IMAGE 
             
                    
          }
         
                    $id=$this->input->post('users_id');
            
                    $this->db->where('users_id',$id);
                    $result= $this->db->update('users',$data);
                    if($result)
                    {
                        $response['status'] = 1;
                        $response['msg']  = 'Profile Updated Successfully';
                           
                    }
                    else
                    {
                        $response['status'] = 0;
                        $response['msg']  = 'Error try again'; 
                    }
                    
                    
                }
            echo json_encode($response);
            
        }
    

/////////////######## change Password ############//////////////
public function change_password(){
        $page_title['title']  = 'Change Password';
        $title['page_title'] = 'Change Password';
        $this->load->view('header',$title);
        $this->load->view('change_password',$page_title);
        $this->load->view('footer');
    }
public function edit_password(){
        $password1 = $this->input->post('password'); 
        $password2 = $this->input->post('new_password');
        
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[new_password]');
        
        if($this->form_validation->run() == false) {
            $response['status'] = 0;
            $response['msg']  = validation_errors();
        }
        else {

             $userdata=$this->session->userdata('front_user');
             $users_id = $userdata[0]->users_id;
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
              $data['user_type'] = 'users';

             
              $result =  $this->db->update('users',$data);
    
            if($result)
                   {
                       $response['status'] = 1;
                       $response['msg']  = 'Password changed successfully';
                       redirect( base_url(),'login', 'refresh');
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
                      $response['msg']  = 'Current Password Not Matched';
                 
               }
            }
        }
        echo json_encode($response);	
    
    }
/////////////######## change Password End ############//////////////





}
?>