<?php
class User_model extends CI_Model {       
	function __construct(){            
	  	parent::__construct();
	}

	/**
      * This function is used authenticate user at login
      */
  	function auth_UserLogin() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
       
        $this->db->group_start();
    	$this->db->where('email',$username);
		$this->db->or_where('mobile',$username);
        $this->db->group_end();
		$this->db->where('user_type !=','customer');
		$result = $this->db->get('users')->result();
		if(!empty($result)){ 
		    
			if (password_verify($password, $result[0]->password)) {       
				if($result[0]->status != 'Active') {
					return 'not_varified';
				}
				  
				return $result;                    
			}
			else {             
				return false;
			}
		} else {
			return false;
		}
  	}

public function get_employee_list($isFilter,$limit,$start,$filder,$role_id){
    
     $this->db->select("*");
     $this->db->from("users");
        //  $this->db->group_start();
        $this->db->where('find_in_set("'.$role_id.'", role_ids) <> 0');
        //   $this->db->group_end();

    //  $this->db->where_in('role_id',$role_id);
     
     if(!empty($filder['name'])){
        
     $this->db->like('name',$filder['name']);
      $this->db->or_like('username',$filder['name']);
      $this->db->or_like('mobile',$filder['name']);
      $this->db->or_like('email',$filder['name']);
      
      
     }
     
    
          $this->db->order_by('users_id','desc');

     if(!empty($filder['business_category_id'])){
     $this->db->where('business_category_id',$filder['business_category_id']);
     }
     if(!empty($filder['industry'])){
     $this->db->where('industry',$filder['industry']);
     }

     
    
    if($isFilter=='yes'){
            $query = $this->db->get();
            return $query->num_rows();
       }
       else{
           $this->db->limit($limit,$start);
           $query = $this->db->get();
        //   $roleU_id = $this->db->where('4',$role_id);
           $output   = '';
        $output .='
        
    <table class="table table-bordered datatable" id="datatable" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
    <th> Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Date</th>
    ';
   
    if($role_id ==4){
    $output .=' <th>Manage Services</th>
   '; } else{
       '';
   }
 $output .='
 
    <th>Status</th>
    <th>Option</th>
   </tr>
   </thead>
   <tbody>';
   $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
           $id          = $row->users_id;
           $del_url     = base_url().'user/delete_employee/'.$id;
		   $edit_url    = base_url().'user/edit_form/edit_users/users/users_id/'.$id;
		   
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
         
         	$tagging_url    = base_url().'member/member_tagging/'.$row->users_id.'/'.$row->encrypt_key;
	            $tagging_link   = "<a href='$tagging_url' ><i class='ri-messenger-fill'></i></a>";
          
    //       if($row->isDelete==1){
    //       $isDeleteUrl      = base_url().'commoncontroller/trash_status_member/users/delete/users_id/'.$id;
    //       $isRetriveUrl     = base_url().'commoncontroller/trash_status_member/users/retrive/users_id/'.$id;
           
    //       $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
    //       $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		  // $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
    //       }
    //       else
    {
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
           $countryName = $this->Common->get_col_by_key('countries','id',$row->country_id,'name');
           $stateName = $this->Common->get_col_by_key('states','id',$row->state_id,'name');
           $cityName = $this->Common->get_col_by_key('cities','id',$row->city_id,'name');  
           
           $kyc_url    = base_url().'member/member_profile/'.$row->users_id.'/'.$row->encrypt_key;
	            $row->first_name   = "<a href='$kyc_url' >$row->first_name</i></a>";
           
           $CurrencyName = $this->Common->get_col_by_key('currency','id',$row->processing_currency,'currency_name');
           $CategoryName = $this->Common->get_col_by_key('product_category','product_category_id',$row->business_category_id,'name');
           $subCategoryName = $this->Common->get_col_by_key('business_sub_category','sub_category_id',$row->business_subcategory_id,'name');
           $businessName = $this->Common->get_col_by_key('business_type','business_id',$row->business_type_id,'name');
           
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>';
 
    }else{
        $status = '<span class="badge bg-danger">Deactive</span>';
    }
    
           $serviceUrl = base_url().'user/user_services/'.$row->users_id;
           $ServicesLink = "<a href='$serviceUrl'> Click</a>";
    
   

  
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    <td>'.$row->email.'</td>
    <td>'.$row->mobile.'</td>
    <td>'.getDateTimeFormat($row->added).'</td>
   '; if($role_id ==4){
  $output.='  <td>'.$ServicesLink.'</td>
    '; }else{
        '';
     } 
     $output .='
    
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }

///////////////############### Users Service Link ################/////////////////

 public function get_users_service_link($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("users_service_link");
     $this->db->order_by('id','desc');
    
     if(!empty($filder['users_id'])){
     $this->db->where('users_id',$filder['users_id']);
     }
     if(!empty($filder['service_id'])){
     $this->db->like('service_id',$filder['service_id']);
     }
     
    
    if($isFilter=='yes'){
            $query = $this->db->get();
            return $query->num_rows();
      }
      else{
          $this->db->limit($limit,$start);
          $query = $this->db->get();
          $output   = '';
        $output .='
    <table class="table table-bordered datatable" id="datatable" style="width:100%;overflow:auto;">
  <thead>
  <tr>
    <th>Sr. No.</th>
    <th>User</th>
    <th>Service</th>
    <th>Extra Charge</th>
    <th>Status</th>
    <th>Option</th>
   
  </tr>
  </thead>
  <tbody>';
  $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
          $id          = $row->id;
          $del_url     = base_url().'user/delete_users_service_link/'.$id;
		   $edit_url    = base_url().'user/edit_form/users_service_link_edit/users_service_link/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/business_type/retrive/business_id/'.$id;
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/business_type/delete/business_id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
           $username = $this->Common->get_col_by_key('users','users_id',$row->users_id,'name');
           
          $servicename = $this->Common->get_col_by_key('services','id',$row->service_id,'title');
                 
           
    if($row->status=='Active'){
      $status = '<span class="badge bg-success">Active</span>';
    }else{
      $status = '<span class="badge bg-danger">Deactive</span>';
    }
		  $serviceArr =explode(",",$row->service_id);  
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
    <td>'.$username.'</td>
    <td>';
    for($j=0;$j<count($serviceArr);$j++){
      $service_id = $serviceArr[$j];
      $servicename = $this->Common->get_col_by_key('services','id',$service_id,'title');
    $output .= '<span>'.$servicename.'</span>,';
    }
     $output .= '
    </td>
    <td>'.$row->external_price.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }

//////////////############### Users Service Link ####################////////////////

public function get_manage_user($isFilter,$limit,$start,$filder){
     $this->db->select("*");
     $this->db->from("users");
     $this->db->where('user_type','customer');
     $this->db->order_by('users_id','desc');
     if(!empty($filder['isDelete'])){
     $this->db->where('isDelete',$filder['isDelete']);
     }
     else{
     $this->db->where('isDelete',0);   
     }
     if(!empty($filder['name'])){
     $this->db->group_start();
     $this->db->like('name',$filder['name']);
     $this->db->or_like('mobile',$filder['name']);
     $this->db->or_like('email',$filder['name']);
     $this->db->group_end();  
     }
	
     if(!empty($filder['status'])){
     $this->db->where('status',$filder['status']);
     }
     if($isFilter=='yes'){
     $query = $this->db->get();
     return $query->num_rows();
     }else{
     $this->db->limit($limit,$start);
     $query = $this->db->get();
     $output   = '';
     $output .='
     <table class="table table-bordered datatable" id="datatable" style="width:100%;overflow:auto;">
     <thead>
     <tr>
     <th>Sr. No.</th>
     <th>Name</th>
     <th>Mobile No</th>
     <th>Email</th>
     <th>Image</th>
     <th>Status</th>
	 <th>Option</th>
     </tr>
     </thead>
     <tbody>';
     $sr = $start+1;
     $result = $query->result();
	 foreach($result as $row)
	 {
	 $id          = $row->users_id;
     $del_url     = base_url().'user/delete_manage_user/'.$id;
     $edit_url    = base_url().'user/edit_form/manage_user_edit/users/users_id/'.$id;
     $getDeleteOption = getDeleteOption();
     $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
     $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
     if($row->isDelete==1){
     $isDeleteUrl      = base_url().'commoncontroller/trash_status/users/delete/users_id/'.$id;
     $isRetriveUrl     = base_url().'commoncontroller/trash_status/users/retrive/users_id/'.$id;
     $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
     $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
     $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
     }else{
	 $optionLink  = $edit_link.' '.$delete_link; 
	 }
	 $File = $row->profile_pic;
	 if(!empty($File))
	 { 
	 $load_url = 'uploads/users/'.$File;
	 if(file_exists($load_url))
	 {
	 $url = base_url().$load_url;			
	 }else{
	 $url = base_url().'uploads/no_file.jpg';		
	 }
	 }else{
	 $url = base_url().'uploads/no_file.jpg';
	 }
	 $fileData = "<a href='$url' target='_blank'>File</a>";   
     if($row->status=='Active'){
     $status = '<span class="badge bg-success">Active</span>';
     }else{
     $status = '<span class="badge bg-danger">Deactive</span>';
     }
//      $refferBy = $row->refferBy;
//      if($refferBy>0){
// 	 $UserCode = '(Referral '.$this->Common->get_col_by_key('users','users_id',$refferBy,'name').')';
// 	 }
   $output .= '
 <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    <td>'.$row->mobile.'</td>
    <td>'.$row->email.'</td>
    <td>'.$fileData.'</td>
    <td>'.$status.'</td>
	<td>'.$optionLink.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }
	////////////Customer END////////////
	
	
public function get_state_admin($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("users");
     $this->db->where('user_type','state_admin');
     $this->db->order_by('users_id','desc');
     
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['name'])){
     $this->db->like('name',$filder['name']);
     }
     if(!empty($filder['status'])){
     $this->db->where('status',$filder['status']);
     }
     
    
    if($isFilter=='yes'){
            $query = $this->db->get();
            return $query->num_rows();
      }
      else{
          $this->db->limit($limit,$start);
          $query = $this->db->get();
          $output   = '';
        $output .='
    <table class="table table-bordered datatable" id="datatable" style="width:100%;overflow:auto;">
  <thead>
  <tr>
     <th>Sr. No.</th>
     <th>State Name</th>
      <th>Name</th>
     <th>Mobile</th>
     <th>Email</th>
    <th>Adress</th>
    <th>ID Proof</th>
    <th>Status</th>
    <th>Photo</th>
    <th>Option</th>
   
  </tr>
  </thead>
  <tbody>';
  $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
          $id          = $row->users_id;
          $del_url     = base_url().'user/delete_state_admin/'.$id;
		   $edit_url    = base_url().'user/edit_form/state_admin_edit/users/users_id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/users/delete/users_id/'.$id;
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/users/retrive/users_id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
         $StateName = $this->Common->get_col_by_key('states','id',$row->state_id,'name');


    
    $File = $row->profile_pic;

    		if(!empty($File))
    		{ 
    	        $load_url1 = 'uploads/users/'.$File;
    			if(file_exists($load_url1))
    			{
    		   $url = base_url().$load_url1;			
    			}
    			else
    			{
    			$url = base_url().'uploads/no_file.jpg';		
    			}
    		}
    		else
    		{
    		$url = base_url().'uploads/no_file.jpg';
    		}
    		$fileData = "<img src='$url' , style='height:50px; width:auto'>";
    		
    		
    		 $File = $row->id_card;

    		if(!empty($File))
    		{ 
    	        $load_url1 = 'uploads/users/'.$File;
    			if(file_exists($load_url1))
    			{
    		   $url = base_url().$load_url1;			
    			}
    			else
    			{
    			$url = base_url().'uploads/no_file.jpg';		
    			}
    		}
    		else
    		{
    		$url = base_url().'uploads/no_file.jpg';
    		}
    		$IDCard = "<img src='$url' , style='height:50px; width:auto'>";
    
     if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
    
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
     <td>'.$StateName.'</td>
      <td>'.$row->name.'</td>
      <td>'.$row->mobile.'</td>
      <td>'.$row->email.'</td>
       <td>'.$row->address.'</td>
        <td>'.$IDCard.'</td>
     <td>'.$fileData.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }	
	
public function get_sales_manager($isFilter,$limit,$start,$filder){
       
       
       $this->db->select("*");
       $this->db->from("users");
       $this->db->where('user_type','sales_manager');
       $this->db->order_by('users_id','desc');
       
       if(!empty($filder['isDelete'])){
       
       $this->db->where('isDelete',$filder['isDelete']);
          
       }
       else{
        $this->db->where('isDelete',0);   
       }
       
       
       if(!empty($filder['name'])){
       $this->db->like('name',$filder['name']);
       }
       if(!empty($filder['status'])){
       $this->db->where('status',$filder['status']);
       }
       
      
      if($isFilter=='yes'){
              $query = $this->db->get();
              return $query->num_rows();
        }
        else{
            $this->db->limit($limit,$start);
            $query = $this->db->get();
            $output   = '';
          $output .='
      <table class="table table-bordered datatable" id="datatable" style="width:100%;overflow:auto;">
    <thead>
    <tr>
       <th>Sr. No.</th>
        <th>State Name</th>
       <th>State Admin Name</th>
        <th>Name</th>
       <th>Mobile</th>
       <th>Email</th>
      <th>Adress</th>
      <th>ID Proof</th>
      <th>Status</th>
      <th>Photo</th>
      <th>Option</th>
     
    </tr>
    </thead>
    <tbody>';
    $sr = $start+1;
    $result = $query->result();
    foreach($result as $row)
    {
            $id          = $row->users_id;
            $del_url     = base_url().'user/delete_sales_manager/'.$id;
         $edit_url    = base_url().'user/edit_form/sales_manager_edit/users/users_id/'.$id;
         $getDeleteOption = getDeleteOption();
         $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
             
            if($row->isDelete==1){
            $isDeleteUrl      = base_url().'commoncontroller/trash_status/users/delete/users_id/'.$id;
            $isRetriveUrl     = base_url().'commoncontroller/trash_status/users/retrive/users_id/'.$id;
             
            $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
  
         $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
            }
            else{
              $optionLink  = $edit_link.' '.$delete_link;   
            }
             
           $StateName = $this->Common->get_col_by_key('states','id',$row->state_id,'name');
           $StateAdminName = $this->Common->get_col_by_key('users','users_id',$row->parent_id,'name');
  
  
      
      $File = $row->profile_pic;
  
          if(!empty($File))
          { 
                $load_url1 = 'uploads/users/'.$File;
            if(file_exists($load_url1))
            {
             $url = base_url().$load_url1;			
            }
            else
            {
            $url = base_url().'uploads/no_file.jpg';		
            }
          }
          else
          {
          $url = base_url().'uploads/no_file.jpg';
          }
          $fileData = "<img src='$url' , style='height:50px; width:auto'>";
          
          
           $File = $row->id_card;
  
          if(!empty($File))
          { 
                $load_url1 = 'uploads/users/'.$File;
            if(file_exists($load_url1))
            {
             $url = base_url().$load_url1;			
            }
            else
            {
            $url = base_url().'uploads/no_file.jpg';		
            }
          }
          else
          {
          $url = base_url().'uploads/no_file.jpg';
          }
          $IDCard = "<img src='$url' , style='height:50px; width:auto'>";
      
       if($row->status=='Active'){
         $status = '<span class="badge bg-success">Active</span>'; 
      }else{
         $status = '<span class="badge bg-danger">Deactive</span>';
      }
      
         
    $output .= '
    <tr>
      <td>'.$sr++.'</td>
        <td>'.$StateName.'</td>
        <td>'.$StateAdminName.'</td>
        <td>'.$row->name.'</td>
        <td>'.$row->mobile.'</td>
        <td>'.$row->email.'</td>
         <td>'.$row->address.'</td>
          <td>'.$IDCard.'</td>
       <td>'.$fileData.'</td>
      <td>'.$status.'</td>
      <td>'.$optionLink.'</td>
      
    </tr>
    ';
    }
    
    $output .= '</tbody></table>';
    return $output;    
        }
     
   }	
	
	
public function get_office_staff($isFilter,$limit,$start,$filder){
       
       
       $this->db->select("*");
       $this->db->from("users");
       $this->db->where('user_type','office_staff ');
       $this->db->order_by('users_id','desc');
       
       if(!empty($filder['isDelete'])){
       
       $this->db->where('isDelete',$filder['isDelete']);
          
       }
       else{
        $this->db->where('isDelete',0);   
       }
       
       
       if(!empty($filder['name'])){
       $this->db->like('name',$filder['name']);
       }
       if(!empty($filder['status'])){
       $this->db->where('status',$filder['status']);
       }
       
      
      if($isFilter=='yes'){
              $query = $this->db->get();
              return $query->num_rows();
        }
        else{
            $this->db->limit($limit,$start);
            $query = $this->db->get();
            $output   = '';
          $output .='
      <table class="table table-bordered datatable" id="datatable" style="width:100%;overflow:auto;">
    <thead>
    <tr>
       <th>Sr. No.</th>
       <th>State Name</th>
       <th>State Admin Name</th>
       
        <th>Name</th>
       <th>Mobile</th>
       <th>Email</th>
      <th>Adress</th>
      <th>ID Proof</th>
      <th>Status</th>
      <th>Photo</th>
      <th>Option</th>
     
    </tr>
    </thead>
    <tbody>';
    $sr = $start+1;
    $result = $query->result();
    foreach($result as $row)
    {
            $id          = $row->users_id;
            $del_url     = base_url().'user/delete_office_staff/'.$id;
         $edit_url    = base_url().'user/edit_form/office_staff_edit/users/users_id/'.$id;
         $getDeleteOption = getDeleteOption();
         $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
             
            if($row->isDelete==1){
            $isDeleteUrl      = base_url().'commoncontroller/trash_status/users/delete/users_id/'.$id;
            $isRetriveUrl     = base_url().'commoncontroller/trash_status/users/retrive/users_id/'.$id;
             
            $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
  
         $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
            }
            else{
              $optionLink  = $edit_link.' '.$delete_link;   
            }
             
           $StateName = $this->Common->get_col_by_key('states','id',$row->state_id,'name');
           $StateAdminName = $this->Common->get_col_by_key('users','users_id',$row->parent_id,'name');
  
  
      
      $File = $row->profile_pic;
  
          if(!empty($File))
          { 
                $load_url1 = 'uploads/users/'.$File;
            if(file_exists($load_url1))
            {
             $url = base_url().$load_url1;			
            }
            else
            {
            $url = base_url().'uploads/no_file.jpg';		
            }
          }
          else
          {
          $url = base_url().'uploads/no_file.jpg';
          }
          $fileData = "<img src='$url' , style='height:50px; width:auto'>";
          
          
           $File = $row->id_card;
  
          if(!empty($File))
          { 
                $load_url1 = 'uploads/users/'.$File;
            if(file_exists($load_url1))
            {
             $url = base_url().$load_url1;			
            }
            else
            {
            $url = base_url().'uploads/no_file.jpg';		
            }
          }
          else
          {
          $url = base_url().'uploads/no_file.jpg';
          }
          $IDCard = "<img src='$url' , style='height:50px; width:auto'>";
      
       if($row->status=='Active'){
         $status = '<span class="badge bg-success">Active</span>'; 
      }else{
         $status = '<span class="badge bg-danger">Deactive</span>';
      }
      
         
    $output .= '
    <tr>
      <td>'.$sr++.'</td>
      
       <td>'.$StateName.'</td>
        <td>'.$StateAdminName.'</td>
        <td>'.$row->name.'</td>
        <td>'.$row->mobile.'</td>
        <td>'.$row->email.'</td>
         <td>'.$row->address.'</td>
          <td>'.$IDCard.'</td>
       <td>'.$fileData.'</td>
      <td>'.$status.'</td>
      <td>'.$optionLink.'</td>
      
    </tr>
    ';
    }
    
    $output .= '</tbody></table>';
    return $output;    
        }
     
   }		

public function get_manage_seller($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("users");
     $this->db->where('user_type','manage_seller');
     $this->db->order_by('users_id','desc');
     
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['name'])){
     $this->db->like('name',$filder['name']);
     }
     if(!empty($filder['status'])){
     $this->db->where('status',$filder['status']);
     }
     
    
    if($isFilter=='yes'){
            $query = $this->db->get();
            return $query->num_rows();
      }
      else{
          $this->db->limit($limit,$start);
          $query = $this->db->get();
          $output   = '';
        $output .='
    <table class="table table-bordered datatable" id="datatable" style="width:100%;overflow:auto;">
  <thead>
  <tr>
     <th>Sr. No.</th>
     <th>State Name</th>
      <th>Name</th>
     <th>Mobile</th>
     <th>Email</th>
    <th>Adress</th>
    <th>ID Proof</th>
    <th>Status</th>
    <th>Photo</th>
    <th>Option</th>
   
  </tr>
  </thead>
  <tbody>';
  $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
          $id          = $row->users_id;
          $del_url     = base_url().'user/delete_manage_seller/'.$id;
		   $edit_url    = base_url().'user/edit_form/manage_seller_edit/users/users_id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/users/delete/users_id/'.$id;
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/users/retrive/users_id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
         $StateName = $this->Common->get_col_by_key('states','id',$row->state_id,'name');


    
    $File = $row->profile_pic;

    		if(!empty($File))
    		{ 
    	        $load_url1 = 'uploads/users/'.$File;
    			if(file_exists($load_url1))
    			{
    		   $url = base_url().$load_url1;			
    			}
    			else
    			{
    			$url = base_url().'uploads/no_file.jpg';		
    			}
    		}
    		else
    		{
    		$url = base_url().'uploads/no_file.jpg';
    		}
    		$fileData = "<img src='$url' , style='height:50px; width:auto'>";
    		
    		
    		 $File = $row->id_card;

    		if(!empty($File))
    		{ 
    	        $load_url1 = 'uploads/users/'.$File;
    			if(file_exists($load_url1))
    			{
    		   $url = base_url().$load_url1;			
    			}
    			else
    			{
    			$url = base_url().'uploads/no_file.jpg';		
    			}
    		}
    		else
    		{
    		$url = base_url().'uploads/no_file.jpg';
    		}
    		$IDCard = "<img src='$url' , style='height:50px; width:auto'>";
    
     if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
    
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
     <td>'.$StateName.'</td>
      <td>'.$row->name.'</td>
      <td>'.$row->mobile.'</td>
      <td>'.$row->email.'</td>
       <td>'.$row->address.'</td>
        <td>'.$IDCard.'</td>
     <td>'.$fileData.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }	  
  
  	
}