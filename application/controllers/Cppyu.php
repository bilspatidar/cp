<?php
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

     
class Cppyu extends REST_Controller {
    
	  /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
	   header('Access-Control-Allow-Origin: *');
	   $this->load->helper('security');
       $this->load->model('v2_model');
	   $this->load->library('encrypt');
	}
	
	public function index_get($paymentGatewayId,$payment_encrypt_key,$temp_encrypt_key){
		echo $paymentGatewayId;
	}
}   	   
?>