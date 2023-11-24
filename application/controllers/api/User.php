<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* On your database, open a SQL terminal paste this and execute: */
// CREATE TABLE IF NOT EXISTS `users` (
//   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
//   `username` varchar(255) NOT NULL DEFAULT '',
//   `email` varchar(255) NOT NULL DEFAULT '',
//   `password` varchar(255) NOT NULL DEFAULT '',
//   `avatar` varchar(255) DEFAULT 'default.jpg',
//   `created_at` datetime NOT NULL,
//   `updated_at` datetime DEFAULT NULL,
//   `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
//   `is_confirmed` tinyint(1) unsigned NOT NULL DEFAULT '0',
//   `is_deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
//   PRIMARY KEY (`id`)
// );
// CREATE TABLE IF NOT EXISTS `ci_sessions` (
//   `id` varchar(40) NOT NULL,
//   `ip_address` varchar(45) NOT NULL,
//   `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
//   `data` blob NOT NULL,
//   PRIMARY KEY (id),
//   KEY `ci_sessions_timestamp` (`timestamp`)
// );

/**
 * User class.
 * 
 * @extends REST_Controller
 */
    require(APPPATH.'/libraries/REST_Controller.php');
    use Restserver\Libraries\REST_Controller;

class User extends REST_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
        $this->load->library('Authorization_Token');
		$this->load->model('user_model');
	}

	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	 


	public function register_post() {
         
		$_POST = json_decode($this->input->raw_input_stream, true);

			
		// set validation rules
		$this->form_validation->set_rules('name', 'Username', 'trim|required|alpha_numeric|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
            $this->response([
                    'status' => FALSE,
                    'message' =>strip_tags(str_replace(array("\r", "\n"), '', validation_errors()))
              ], REST_Controller::HTTP_OK,'','error');
			
		} else {
			
			// set variables from the form
			$data['name'] = $this->input->post('name');
			$data['email']    = $this->input->post('email');
			$data['mobile']    = $this->input->post('mobile');
			$data['password'] = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
			$data['added'] = date('Y-m-d H:i:s');
			$data['status'] = 'Active';
			$data['user_type'] = 'customer';
			
			if ($res = $this->user_model->create_user($data)) {
				
				// user creation ok
                $token_data['uid'] = $res; 
                $token_data['username'] = $username;
                $tokenData = $this->authorization_token->generateToken($token_data);
                $final = array();
                $final['access_token'] = $tokenData;
                $final['status'] = true;
                $final['users_id'] = $res;
                $final['message'] = 'Thank you for registering your new account!';
                //$final['note'] = 'You have successfully register. Please check your email inbox to confirm your email address.';

                $this->response($final, REST_Controller::HTTP_OK); 

			} else {
				
				// user creation failed, this should never happen
                $this->response(['There was a problem creating your new account. Please try again.'], REST_Controller::HTTP_OK);
			}
			
		}
		
	}
		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login_post() {
		$_POST = json_decode($this->input->raw_input_stream, true);
		// set validation rules
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
            $this->response([
                    'status' => FALSE,
                    'message' =>strip_tags(str_replace(array("\r", "\n"), '', validation_errors()))
              ], REST_Controller::HTTP_OK);

		} else {
			
			// set variables from the form
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->user_model->resolve_user_login($email,$password)) {
				
				$users_id = $this->user_model->get_user_id_from_username($email);
				$user    = $this->user_model->get_user($users_id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->users_id;
				$_SESSION['email']     = (string)$user->email;
				$_SESSION['name']     = (string)$user->name;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['status'] = (bool)$user->status;
				
				
				// user login ok
                $token_data['users_id'] = $user_id;
                $token_data['username'] = $user->email; 
                $tokenData = $this->authorization_token->generateToken($token_data);
                $final = array();
                $final['access_token'] = $tokenData;
                $final['status'] = true;
                $final['message'] = 'Login success!';
                $final['note'] = 'You are now logged in.';

                $this->response($final, REST_Controller::HTTP_OK); 
				
			} else {
				
				// login failed
                $this->response(
				[
                    'status' => FALSE,
                    'message' =>'Wrong email or password'
              ]
			  , REST_Controller::HTTP_OK);
				
			}
			
		}
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout_post() {

		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
            $this->response(['Logout success!'], REST_Controller::HTTP_OK);
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			// redirect('/');
            $this->response(['There was a problem. Please try again.'], REST_Controller::HTTP_OK);	
		}
		
	}
	
}
