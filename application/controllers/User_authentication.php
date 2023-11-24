<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User_Authentication extends CI_Controller { 
    function __construct() { 
        parent::__construct(); 
         
        // Load facebook oauth library 
        $this->load->library('facebook'); 
         
        // Load user model 
        $this->load->model('user'); 
    } 
     
    public function auth_facebook(){ 
        	ini_set('display_errors', 1);
        	$this->load->library('session');   
    $this->load->view('../third_party/Facebook/autoload.php');
        	$fb = new Facebook\Facebook([
          'app_id' => '2200291413507265',
          'app_secret' => 'a7e0518f4d96cfae64c7b605838e97ed',
          'default_graph_version' => 'v15.0',//v2.5
          'facebook_login_redirect_url' =>'https://tcc.sparkhub.in/user_authentication/auth_facebook/',
        'facebook_logout_redirect_url' =>'https://tcc.sparkhub.in/user_authentication/logout/',
        ]);

   $helper = $fb->getRedirectLoginHelper();

   $permissions = ['email']; 
// For more permissions like user location etc you need to send your application for review

   $loginUrl = $helper->getLoginUrl(base_url().'user_authentication/fbcallback', $permissions);

   header("location: ".$loginUrl);
   
        	var_dump($this->facebook->is_authenticated()) ;
        	print_r($this->facebook->is_authenticated());
        	exit();
        $userData = array(); 
         
        // Authenticate user with facebook 
        if($this->facebook->is_authenticated()){ 
            // Get user info from facebook 
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
 
            // Preparing data for database insertion 
            $userData['oauth_provider'] = 'facebook'; 
            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
            $userData['first_name']    = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
            $userData['last_name']    = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
            $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
            $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
            $userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
            $userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
             
            // Insert or update user data to the database 
            $userID = $this->user->checkUser(x); 
  			echo "<pre>";
			print_r($userData);
			print_r($userData['email']);
            // Check user data insert or update status 
            if(!empty($userID)){ 
                $data['userData'] = $userData; 
                 
                // Store the user profile info into session 
                $this->session->set_userdata('userData', $userData); 
            }else{ 
               $data['userData'] = array(); 
            } 
             
            // Facebook logout URL 
            $data['logoutURL'] = $this->facebook->logout_url(); 
        }else{ 
            // Facebook authentication url 
            $data['authURL'] =  $this->facebook->login_url(); 
            $this->load->view('user_authentication/index',$data); 
        } 
         
        // Load login/profile view 
        
    } 
 
    public function logout() { 
        // Remove local Facebook session 
        $this->facebook->destroy_session(); 
        // Remove user data from session 
        $this->session->unset_userdata('userData'); 
        // Redirect to login page 
        redirect('user_authentication'); 
    } 
    
    function fbcallback(){
        // print_r($_GET);
        $this->load->view('../third_party/Facebook/autoload.php');
        $fb = new Facebook\Facebook([
        'app_id' => '2200291413507265',
        'app_secret' => 'a7e0518f4d96cfae64c7b605838e97ed',
        'default_graph_version' => 'v15.0',//'v2.5',
        'facebook_login_redirect_url' =>'https://tcc.sparkhub.in/user_authentication/auth_facebook/',
        'facebook_logout_redirect_url' =>'https://tcc.sparkhub.in/user_authentication/logout/',
        ]);
        
        $helper = $fb->getRedirectLoginHelper();  
  
        try {  
            
            $accessToken = $helper->getAccessToken();  
            
        }catch(Facebook\Exceptions\FacebookResponseException $e) {  
          // When Graph returns an error  
          echo 'Graph returned an error: ' . $e->getMessage();  
          exit;  
        } catch(Facebook\Exceptions\FacebookSDKException $e) {  
          // When validation fails or other local issues  
          echo 'Facebook SDK returned an error: ' . $e->getMessage();  
          exit;  
        }  
 
 
        try {
          // Get the Facebook\GraphNodes\GraphUser object for the current user.
          // If you provided a 'default_access_token', the '{access-token}' is optional.
          $response = $fb->get('/me?fields=id,name,email,first_name,last_name,birthday,location,gender', $accessToken);
         // print_r($response);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          echo 'ERROR: Graph ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          echo 'ERROR: validation fails ' . $e->getMessage();
          exit;
        }
    
        // User Information Retrival begins................................................
        $me = $response->getGraphUser();
        
        $location = $me->getProperty('location');
        echo "Full Name: ".$me->getProperty('name')."<br>";
        echo "First Name: ".$me->getProperty('first_name')."<br>";
        echo "Last Name: ".$me->getProperty('last_name')."<br>";
        echo "Gender: ".$me->getProperty('gender')."<br>";
        echo "Email: ".$me->getProperty('email')."<br>";
        echo "location: ".$location['name']."<br>";
        echo "Birthday: ".$me->getProperty('birthday')->format('d/m/Y')."<br>";
        echo "Facebook ID: <a href='https://www.facebook.com/".$me->getProperty('id')."' target='_blank'>".$me->getProperty('id')."</a>"."<br>";
        $profileid = $me->getProperty('id');
        echo "</br><img src='//graph.facebook.com/$profileid/picture?type=large'> ";
        echo "</br></br>Access Token : </br>".$accessToken; 
        
       
    }
}