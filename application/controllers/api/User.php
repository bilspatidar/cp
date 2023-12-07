<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
		$this->load->model('user_model');
		$this->load->model('merchant_keys_model');
		$this->load->model('currency_model');
		$this->load->model('payment_gateway_model');
		header('Access-Control-Allow-Origin: *');
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
			$data['status'] = 'Deactive';
			$data['user_type'] = $this->input->post('user_type');
			
			if ($res = $this->user_model->create_user($data)) {
				
				// user creation ok
                $token_data['users_id'] = $res; 
                $token_data['username'] = $data['email'];
				
				$token_data['user_id']      = (int)$res;
				$token_data['user_type']      = (string)$data['user_type'];
				$token_data['email']     = (string)$data['email'];
				$token_data['name']     = (string)$data['name'];
				$token_data['logged_in']    = (bool)true;
				$token_data['status'] = (bool)$data['status'];
				
				
				// user login ok

				
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
	
	//merchant start
	public function merchant_post($params='') {
        
		if($params=='add'){
			is_authorized();
			$getTokenData = $this->authorization_token->validateToken();
			$usersData = json_decode(json_encode($getTokenData), true);
			$session_id =  $usersData['data']['users_id'];
			
		$_POST = json_decode($this->input->raw_input_stream, true);
			
		// set validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required|alpha_numeric_spaces|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|callback_valid_password');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[8]|matches[password]');
		$this->form_validation->set_rules('company_name','Company Name','alpha_numeric_spaces');
		$this->form_validation->set_rules('websiteURL','Website URL','valid_url');
		$this->form_validation->set_rules('business_registered', 'Business Registered', 'callback_date_valid'); 
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
            $this->response([
                    'status' => FALSE,
                    'message' =>strip_tags(str_replace(array("\r", "\n"), '', validation_errors()))
              ], REST_Controller::HTTP_OK,'','error');
			
		} else {
			
			// set variables from the form
			$password = $this->input->post('password');
			if(!empty($password)){
				$data['password'] = password_hash($password,PASSWORD_DEFAULT);
			}
			$name = $this->input->post('name');
			if(!empty($name)){
				$data['name'] = $name;
			}
			$email = $this->input->post('email');
			if(!empty($name)){
				$data['email'] = $email;
			}
			$mobile = $this->input->post('mobile');
			if(!empty($mobile)){
				$data['mobile'] = $mobile;
			}
			$company_name = $this->input->post('company_name');
			if(!empty($company_name)){
				$data['company_name'] = $company_name;
			}
			
			$postal_code = $this->input->post('postal_code');
			if(!empty($postal_code)){
				$data['postal_code'] = $postal_code;
			}
			$country_id = $this->input->post('country_id');
			if(!empty($country_id)){
				$data['country_id'] = $country_id;
			}
			$state_id = $this->input->post('state_id');
			if(!empty($state_id)){
				$data['state_id'] = $state_id;
			}
			$city_id = $this->input->post('city_id');
			if(!empty($city_id)){
				$data['city_id'] = $city_id;
			}
			$street_address = $this->input->post('street_address');
			if(!empty($street_address)){
				$data['street_address'] = $street_address;
			}
			$street_address2 = $this->input->post('street_address2');
			if(!empty($street_address2)){
				$data['street_address2'] = $street_address2;
			}
			$business_type_id = $this->input->post('business_type_id');
			if(!empty($business_type_id)){
				$data['business_type_id'] = $business_type_id;
			}
			$business_category_id = $this->input->post('business_category_id');
			if(!empty($business_category_id)){
				$data['business_category_id'] = $business_category_id;
			}
			$business_subcategory_id = $this->input->post('business_subcategory_id');
			if(!empty($business_subcategory_id)){
				$data['business_subcategory_id'] = $business_subcategory_id;
			}
			$skypeID = $this->input->post('skypeID');
			if(!empty($skypeID)){
				$data['skypeID'] = $skypeID;
			}
			$websiteURL = $this->input->post('websiteURL');
			if(!empty($websiteURL)){
				$data['websiteURL'] = $websiteURL;
			}
			$business_registered = $this->input->post('business_registered');
			if(!empty($business_registered)){
				$data['business_registered'] = date('Y-m-d',strtotime($business_registered));
			}
			$data['encrypt_key'] = $this->Common->random_key_string();
			$data['added'] = date('Y-m-d H:i:s');
			$data['status'] = 'Active';
			$data['user_type'] = 'merchant';
			$data['addedBy'] = $session_id;
			
			if ($res = $this->user_model->create_user($data)) {
				
				// user creation ok
				$data2['merchant_id'] = $res;
				$data2['title'] = 'Api-keys';
				$data2['api_key'] = $this->Common->GenerateLiveAPI();
				$data2['added'] = date('Y-m-d H:i:s');
				$data2['added_by'] = $session_id;
				$this->merchant_keys_model->create($data2);

                $final = array();
                $final['status'] = true;
				$final['users_id'] = $res;
                $final['message'] = 'Thank you for registering your new account!';
                $this->response($final, REST_Controller::HTTP_OK); 

			} else {
				
				// user creation failed, this should never happen
                $this->response(['There was a problem creating your new account. Please try again.'], REST_Controller::HTTP_OK);
			}
			
		}
		}
		if($params=='update'){
			is_authorized();
			$getTokenData = $this->authorization_token->validateToken();
			$usersData = json_decode(json_encode($getTokenData), true);
			$session_id =  $usersData['data']['users_id'];
			
		$_POST = json_decode($this->input->raw_input_stream, true);
		$check = $this->input->post('check');
		// set validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required|alpha_numeric_spaces|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|min_length[10]');
		if(isset($check)){
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|callback_valid_password');
		}
		$this->form_validation->set_rules('company_name','Company Name','alpha_numeric_spaces');
		$this->form_validation->set_rules('websiteURL','Website URL','valid_url');
		$this->form_validation->set_rules('business_registered', 'Business Registered', 'callback_date_valid'); 
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
            $this->response([
                    'status' => FALSE,
                    'message' =>strip_tags(str_replace(array("\r", "\n"), '', validation_errors()))
              ], REST_Controller::HTTP_OK,'','error');
			
		} else {
			
			// set variables from the form
			
			$password = $this->input->post('password');
			if(!empty($password)){
				$data['password'] = password_hash($password,PASSWORD_DEFAULT);
			}
			$name = $this->input->post('name');
			if(!empty($name)){
				$data['name'] = $name;
			}
			$email = $this->input->post('email');
			if(!empty($name)){
				$data['email'] = $email;
			}
			$mobile = $this->input->post('mobile');
			if(!empty($mobile)){
				$data['mobile'] = $mobile;
			}
			$company_name = $this->input->post('company_name');
			if(!empty($company_name)){
				$data['company_name'] = $company_name;
			}
			
			$postal_code = $this->input->post('postal_code');
			if(!empty($postal_code)){
				$data['postal_code'] = $postal_code;
			}
			$country_id = $this->input->post('country_id');
			if(!empty($country_id)){
				$data['country_id'] = $country_id;
			}
			$state_id = $this->input->post('state_id');
			if(!empty($state_id)){
				$data['state_id'] = $state_id;
			}
			$city_id = $this->input->post('city_id');
			if(!empty($city_id)){
				$data['city_id'] = $city_id;
			}
			$street_address = $this->input->post('street_address');
			if(!empty($street_address)){
				$data['street_address'] = $street_address;
			}
			$street_address2 = $this->input->post('street_address2');
			if(!empty($street_address2)){
				$data['street_address2'] = $street_address2;
			}
			$business_type_id = $this->input->post('business_type_id');
			if(!empty($business_type_id)){
				$data['business_type_id'] = $business_type_id;
			}
			$business_category_id = $this->input->post('business_category_id');
			if(!empty($business_category_id)){
				$data['business_category_id'] = $business_category_id;
			}
			$business_subcategory_id = $this->input->post('business_subcategory_id');
			if(!empty($business_subcategory_id)){
				$data['business_subcategory_id'] = $business_subcategory_id;
			}
			$skypeID = $this->input->post('skypeID');
			if(!empty($skypeID)){
				$data['skypeID'] = $skypeID;
			}
			$websiteURL = $this->input->post('websiteURL');
			if(!empty($websiteURL)){
				$data['websiteURL'] = $websiteURL;
			}
			$business_registered = $this->input->post('business_registered');
			if(!empty($business_registered)){
				$data['business_registered'] = date('Y-m-d',strtotime($business_registered));
			}
			
			if(!empty($this->input->post('status'))){
			$data['status'] = $this->input->post('status');
			}
			$data['updatedBy'] = $session_id;
			$data['updated'] = date('Y-m-d H:i:s');
			$users_id = $this->input->post('users_id');
			$res = $this->user_model->update($data,$users_id);
			if ($res) {
				
				// user creation ok
                $final = array();
                $final['status'] = true;
                $final['message'] = 'Merchant updated successfully.';
                $this->response($final, REST_Controller::HTTP_OK); 

			} else {
				
				// user creation failed, this should never happen
                $this->response(['There was a problem updating merchant. Please try again.'], REST_Controller::HTTP_OK);
			}
			
		}
		}
	}
	
	public function merchant_delete($id)
    {
        is_authorized();
		
        $response = $this->user_model->delete_merchant($id);
		if($response){
			$this->response(['Merchant deleted successfully.'], REST_Controller::HTTP_OK);
		}else{
			$this->response(['Not deleted'], REST_Controller::HTTP_OK);
		}
    }
	
	public function merchant_keys_post($params='') {
        
		if($params=='add'){
			is_authorized();
			$getTokenData = $this->authorization_token->validateToken();
			$usersData = json_decode(json_encode($getTokenData), true);
			$session_id =  $usersData['data']['users_id'];
			
		$_POST = json_decode($this->input->raw_input_stream, true);
			
		// set validation rules
		$this->form_validation->set_rules('title', 'Title', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('merchant_id', 'Merchant Id', 'required|numeric');
		$this->form_validation->set_rules('webhook_url','Webhook URL','valid_url');
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
            $this->response([
                    'status' => FALSE,
                    'message' =>strip_tags(str_replace(array("\r", "\n"), '', validation_errors()))
              ], REST_Controller::HTTP_OK,'','error');
			
		} else {
			
			// set variables from the form
			$title = $this->input->post('title');
			if(!empty($title)){
				$data['title'] = $title;
			}
			$webhook_url = $this->input->post('webhook_url');
			if(!empty($webhook_url)){
				$data['webhook_url'] = $webhook_url;
			}
			$merchant_id = $this->input->post('merchant_id');
			if(!empty($merchant_id)){
				$data['merchant_id'] = $merchant_id;
			}
			$data['api_key'] = $this->Common->GenerateLiveAPI();
			$data['added'] = date('Y-m-d H:i:s');
			$data['added_by'] = $session_id;
			
			if ($res = $this->merchant_keys_model->create($data)) {
				
				// user creation ok
				
                $final = array();
                $final['status'] = true;
				$final['id'] = $res;
                $final['message'] = 'Merchant keys created successfully.';
                $this->response($final, REST_Controller::HTTP_OK); 

			} else {
				
				// user creation failed, this should never happen
                $this->response(['There was a problem creating merchant keys. Please try again.'], REST_Controller::HTTP_OK);
			}
			
		}
		}
		if($params=='update'){
			is_authorized();
			$getTokenData = $this->authorization_token->validateToken();
			$usersData = json_decode(json_encode($getTokenData), true);
			$session_id =  $usersData['data']['users_id'];
			
		$_POST = json_decode($this->input->raw_input_stream, true);
		// set validation rules
		$this->form_validation->set_rules('title', 'Title', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('merchant_id', 'Merchant Id', 'required|numeric');
		$this->form_validation->set_rules('webhook_url','Webhook URL','valid_url');
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
            $this->response([
                    'status' => FALSE,
                    'message' =>strip_tags(str_replace(array("\r", "\n"), '', validation_errors()))
              ], REST_Controller::HTTP_OK,'','error');
			
		} else {
			
			// set variables from the form
			$merchant_id = $this->input->post('merchant_id');
			if(!empty($merchant_id)){
				$data['merchant_id'] = $merchant_id;
			}
			$title = $this->input->post('title');
			if(!empty($title)){
				$data['title'] = $title;
			}
			$webhook_url = $this->input->post('webhook_url');
			if(!empty($webhook_url)){
				$data['webhook_url'] = $webhook_url;
			}
			
			$data['updated_by'] = $session_id;
			$data['updated'] = date('Y-m-d H:i:s');
			$id = $this->input->post('id');
			$res = $this->merchant_keys_model->update($data,$id);
			if ($res) {
				
				// user creation ok
                $final = array();
                $final['status'] = true;
                $final['message'] = 'Merchant keys updated successfully.';
                $this->response($final, REST_Controller::HTTP_OK); 

			} else {
				
				// user creation failed, this should never happen
                $this->response(['There was a problem updating merchant keys. Please try again.'], REST_Controller::HTTP_OK);
			}
			
		}
		}
	}
	
	public function merchant_keys_delete($id)
    {
        is_authorized();
		
        $response = $this->merchant_keys_model->delete($id);
		if($response){
			$this->response(['Merchant keys deleted successfully.'], REST_Controller::HTTP_OK);
		}else{
			$this->response(['Not deleted'], REST_Controller::HTTP_OK);
		}
    }
	//merchant end
	
	public function valid_password($password = '')
    {
        $password = trim($password);
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
        if (empty($password))
        {
            $this->form_validation->set_message('valid_password', 'The {field} field is required.');
            return FALSE;
        }
        if (preg_match_all($regex_lowercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_uppercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_number, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
            return FALSE;
        }
        if (preg_match_all($regex_special, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
            return FALSE;
        }
        if (strlen($password) < 5)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');
            return FALSE;
        }
        if (strlen($password) > 32)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');
            return FALSE;
        }
        return TRUE;
    }
	 public function date_valid($date)
  {
    $parts = explode("/", $date);
    if (count($parts) == 3) {      
      if (checkdate($parts[0], $parts[1], $parts[2]))
      {
        return TRUE;
      }
    }
    $this->form_validation->set_message('date_valid', 'The {field} field must be mm/dd/yyyy format.');
    return false;
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
				
				if($user->status=='Deactive'){
					// login failed
                $this->response(
				[
                    'status' => FALSE,
                    'message' =>'Account is not active please contact to admin'
                ]
			  , REST_Controller::HTTP_UNAUTHORIZED);
				}
				// set session user datas
				$token_data['user_id']      = (int)$user->users_id;
				$token_data['user_type']      = (string)$user->user_type;
				$token_data['email']     = (string)$user->email;
				$token_data['name']     = (string)$user->name;
				$token_data['logged_in']    = (bool)true;
				$token_data['status'] = (bool)$user->status;
				
				
				// user login ok
                $token_data['users_id'] = $token_data['user_id'];
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
			  , REST_Controller::HTTP_UNAUTHORIZED);
				
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

?>