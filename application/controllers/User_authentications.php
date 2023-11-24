<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User_Authentications extends CI_Controller { 
     
    function __construct(){ 
        parent::__construct(); 
         
        // Load google oauth library 
        // $this->load->library('google'); 
     require_once APPPATH.'third_party/src/Google_Client.php';
	require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
         
        // Load user model 
        $this->load->model('users'); 
    } 
     
    public function index(){
                 $this->load->view('profile');

    } 
     
     function auth_google(){
         
	
		$clientId = '684384852038-h064prglin8mnlknkr5jck9q95h3mdnc.apps.googleusercontent.com'; //Google client ID
		$clientSecret = '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'; //Google client secret
		$redirectURL = base_url() .'user_authentications/auth_google';
		
		//https://curl.haxx.se/docs/caextract.html

		//Call Google API
		$gClient = new Google_Client();
		$gClient->setApplicationName('Login');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectURL);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		
		if(isset($_GET['code']))
		{
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token'])) 
		{
			$gClient->setAccessToken($_SESSION['token']);
		}
		
		if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
// 			echo "<pre>";
// 			print_r($userProfile);
// 			print_r($userProfile['email']);
			
		    $this->db->select('*');
			$this->db->where('email',$userProfile['email']);
			$this->db->from('users');
			$rowdata=$this->db->get();
		
			if($rowdata->num_rows()>0)
			{
			    $userData=$rowdata->result();
			    $insertdata=$this->session->set_userdata('web_user', $userData);
			    if($this->session->userdata('web_user'))
			    {
			        
			          redirect(base_url().'');
			    }
              
			}
			else
			{
			    $data['email'] = $userProfile['email'];
			    $data['name'] = $userProfile['name'];
			    $data['status'] = 'active';
			    $data['user_type'] = 'customer';
			    $data['using_google'] = 1;
			    $ins=$this->db->insert('users',$data);
			    $last_id=$this->db->insert_id();
			    
			    if($ins)
			    {
			       
			        $this->db->select('*');
			        $this->db->where('users_id',$last_id);
		            $rowdata=$this->db->get('users')->result();
		            $insertdata=$this->session->set_userdata('web_user',$rowdata);
        			     if($this->session->userdata('web_user'))
        			    {
        			          redirect(base_url().'');
        			    }
			    }
			}
        } 
		else 
		{
            $url = $gClient->createAuthUrl();
		    header("Location: $url");
            exit;
        }
       
     }
    public function profile(){ 
        // Redirect to login page if the user not logged in 
        if(!$this->session->userdata('loggedIn')){ 
            redirect('/user_authentications/'); 
        } 
         
        // Get user info from session 
        $data['userData'] = $this->session->userdata('userData'); 
         
        // Load user profile view 
        $this->load->view('user_authentications/profile',$data); 
    } 
     
    public function logout(){ 
        // Reset OAuth access token 
        $this->google->revokeToken(); 
         
        // Remove token and user data from the session 
        $this->session->unset_userdata('loggedIn'); 
        $this->session->unset_userdata('userData'); 
         
        // Destroy entire session data 
        $this->session->sess_destroy(); 
         
        // Redirect to login page 
        redirect('/user_authentications/'); 
    } 
     
}