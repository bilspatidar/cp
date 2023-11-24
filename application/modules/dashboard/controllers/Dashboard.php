<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Dashboard extends CI_Controller {

  function __construct() {
	
    parent::__construct();
		$this->load->model('Mdlroll');
	 }

  /**
     * This function is used to load page view
     * @return Void
     */
  public function index($param1='',$param2=''){  
  ini_set('display_errors', 1);
  is_login();
  $user_type          = $this->session->userdata('user_details')[0]->user_type;
  $user_id            = $this->session->userdata('user_details')[0]->users_id;
  
	        $title['page_title'] = 'Dashboard';
			$this->load->view('include/header',$title);
            $this->load->view($user_type.'_dashboard');                
            $this->load->view('include/footer');            
 
  } 
  public function get_recent_orders($rowno=0){
      ini_set('display_errors', 1);
  
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    
    $allcount     =  $this->Mdlroll->get_recent_orders('yes',$rowperpage,$rowno);
    $users_record =  $this->Mdlroll->get_recent_orders('no',$rowperpage,$rowno);

    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'dashboard','index');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
    
	
}
?>