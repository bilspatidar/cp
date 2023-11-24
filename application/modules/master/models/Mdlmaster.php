<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdlmaster extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
	
	 //////////###### Open Business Type #######//////////////
	 
	  public function get_business_type($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("business_type");
     $this->db->order_by('business_id','desc');
     
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
    <th>Name</th>
    <th>Status</th>
    <th>Option</th>
   
  </tr>
  </thead>
  <tbody>';
  $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
          $id          = $row->business_id;
          $del_url     = base_url().'master/delete_business_type/'.$id;
		   $edit_url    = base_url().'master/edit_form/business_type_edit/business_type/business_id/'.$id;
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
           
           
                 
           
    if($row->status=='Active'){
      $status = '<span class="badge bg-success">Active</span>';
    }else{
      $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }
	 
	//////////###### End Business Type #######//////////////
	 public function get_product_variation($isFilter,$limit,$start){
       
       
     $this->db->select("*");
     $this->db->from("product_variation");
     $this->db->order_by('id','desc');
     
    //  if(!empty($filder['isDelete'])){
     
    //  $this->db->where('isDelete',$filder['isDelete']);
        
    //  }
    //  else{
    //   $this->db->where('isDelete',0);   
    //  }
     
     
    //  if(!empty($filder['name'])){
    //  $this->db->like('name',$filder['name']);
    //  }
    //  if(!empty($filder['status'])){
    //  $this->db->where('status',$filder['status']);
    //  }
     
    
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
    <th>Attribute</th>
    <th>Variation</th>
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
          $del_url     = base_url().'master/delete_product_variation/'.$id;
		   $edit_url    = base_url().'master/edit_form/product_variation_edit/product_variation/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/product_variation/retrive/id/'.$id;
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/product_variation/delete/id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
           $attributeName = $this->Common->get_col_by_key('product_attribute','id',$row->attribute_id,'name');
                 
           
    if($row->status=='Active'){
      $status = '<span class="badge bg-success">Active</span>';
    }else{
      $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
    <td>'.$attributeName.'</td>
    <td>'.$row->variation_name.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }
 
    ///////////######### Product variation #########/////////////////
		//////////###### End Business Type #######//////////////
	 public function get_new_product_variation($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("variation");
     $this->db->order_by('id','desc');
    
	  if(!empty($filder['variation_name'])){
      $this->db->like('variation_name',$filder['variation_name']);
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
    <th>Attribute</th>
    <th>Variation</th>
    <th>Option</th>
   
  </tr>
  </thead>
  <tbody>';
  $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
          $id          = $row->id;
          $del_url     = base_url().'master/delete_new_product_variation/'.$id;
		   $edit_url    = base_url().'master/edit_form/new_product_variation_edit/variation/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/variation/retrive/id/'.$id;
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/variation/delete/id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
           $attributeName = $this->Common->get_col_by_key('attribute','id',$row->attribute_id,'name');
                 
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
    <td>'.$attributeName.'</td>
    <td>'.$row->variation_name.'</td>
    <td>'.$optionLink.'</td>
    
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }
 
    ///////////######### New Product variation #########/////////////////
    
    	//////////###### End Business Type #######//////////////
	 public function get_brand($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("brand");
     $this->db->order_by('name','asc');
     
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
    <th>Banner</th>
    <th>Name</th>
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
          $del_url     = base_url().'master/delete_brand/'.$id;
		   $edit_url    = base_url().'master/edit_form/brand_edit/brand/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/brand/retrive/id/'.$id;
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/brand/delete/id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
           
    if($row->status=='Active'){
      $status = '<span class="badge bg-success">Active</span>';
    }else{
      $status = '<span class="badge bg-danger">Deactive</span>';
    }
    
    $File = $row->brand_banner;

    		if(!empty($File))
    		{ 
    	        $load_url1 = 'uploads/brand/'.$File;
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
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
    <td>'.$fileData.'</td>
    <td>'.$row->name.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }
 
    ///////////######### Product variation #########/////////////////
    
        //////////###### Open Product Attribute #######//////////////
	
    public function get_product_attribute($isFilter,$limit,$start){
       
       
     $this->db->select("*");
     $this->db->from("product_attribute");
     $this->db->order_by('id','desc');
     
    //  if(!empty($filder['isDelete'])){
     
    //  $this->db->where('isDelete',$filder['isDelete']);
        
    //  }
    //  else{
    //   $this->db->where('isDelete',0);   
    //  }
     
     
    //  if(!empty($filder['name'])){
    //  $this->db->like('name',$filder['name']);
    //  }
    //  if(!empty($filder['product_variation_id'])){
    //  $this->db->where('product_variation_id',$filder['product_variation_id']);
    //  }
    //  if(!empty($filder['status'])){
    //  $this->db->where('status',$filder['status']);
    //  }
     
    
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
    <th>Name</th>
    <th>Type</th>
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
          $del_url     = base_url().'master/delete_product_attribute/'.$id;
		   $edit_url    = base_url().'master/edit_form/product_attribute_edit/product_attribute/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/product_attribute/delete/id/'.$id;
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/product_attribute/retrive/id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
        //   $variationName = $this->Common->get_col_by_key('product_variation','id',$row->product_variation_id,'name');
                 
           
    if($row->status=='Active'){
      $status = '<span class="badge bg-success">Active</span>';
    }else{
      $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    <td>'.$row->type.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }
 
    //////////######## End Product Attribute ###########//////
	
	//////////###### Open New Product Attribute #######//////////////
	
    public function get_new_product_attribute($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("attribute");
     $this->db->order_by('id','desc');
     
     
      if(!empty($filder['name'])){
      $this->db->where('name',$filder['name']);
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
    <th>Name</th>
    <th>Type</th>
    <th>Option</th>
   
  </tr>
  </thead>
  <tbody>';
  $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
          $id          = $row->id;
          $del_url     = base_url().'master/delete_new_product_attribute/'.$id;
		   $edit_url    = base_url().'master/edit_form/new_attribute_edit/attribute/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
                
				if($row->isDelete==1){
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/attribute/delete/id/'.$id;
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/attribute/retrive/id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
        //   $variationName = $this->Common->get_col_by_key('product_variation','id',$row->product_variation_id,'name');
 
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    <td>'.$row->type.'</td>
    <td>'.$optionLink.'</td>
    
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }
 
    //////////######## End New Product Attribute ###########//////
 
    /////////###### Open categories ##########/////////////////
    
    public function get_categories($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("product_category");
     $this->db->order_by('name','asc');
     
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
    <th>Name</th>
    <th>Short Name</th>
    <th>Status</th>
    <th>Option</th>
   
   </tr>
   </thead>
   <tbody>';
   $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
           $id          = $row->product_category_id;
           $del_url     = base_url().'master/delete_category/'.$id;
		   $edit_url    = base_url().'master/edit_form/category_edit/product_category/product_category_id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/product_category/delete/product_category_id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/product_category/retrive/product_category_id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
           
                 
           
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>';
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    <td>'.$row->shortName.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }
 
    //////////######## Open Tagging Category###########////// 
    
    	//////////###### End Business Type #######//////////////
	
    public function get_services_categories($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("services_categories");
     $this->db->order_by('name','asc');
     
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
    <th>Name</th>
    <th>Short Name</th>
    <th>Status</th>
    <th>Option</th>
   
   </tr>
   </thead>
   <tbody>';
   $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
           $id          = $row->services_categories_id;
           $del_url     = base_url().'master/delete_services_categories/'.$id;
		   $edit_url    = base_url().'master/edit_form/services_categories_edit/services_categories/services_categories_id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/services_categories/delete/services_categories_id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/services_categories/retrive/services_categories_id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
           
                 
           
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>';
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    <td>'.$row->shortName.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }
 
    //////////######## Open Tagging Category###########////// services_categories
    
    	//////////###### Open Currency #######//////////////
	
    public function get_currency($isFilter,$limit,$start,$filder){

     $this->db->select("*");
     $this->db->from("currency");
     $this->db->order_by('id','desc');
     
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['currency_name'])){
    $this->db->like('currency_name',$filder['currency_name']);
      $this->db->or_like('currency_code',$filder['currency_name']);
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
    <th>Currency Name</th>
    <th>Currency Code</th>
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
          $del_url     = base_url().'master/delete_currency/'.$id;
		   $edit_url    = base_url().'master/edit_form/currency_edit/currency/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/currency/delete/id/'.$id;
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/currency/retrive/id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
           
                 
           
    if($row->status=='Active'){
      $status = '<span class="badge bg-success">Active</span>';
    }else{
      $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->currency_name.'</td>
    <td>'.$row->currency_code.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }
 
    //////////######## End Currency ###########//////
    
    //////////###### Open Business Type #######//////////////
	
    public function get_level_two_category($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("level_two_category");
     $this->db->order_by('name','asc');
     
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['name'])){
     $this->db->like('name',$filder['name']);
     }
     if(!empty($filder['category_id'])){
     $this->db->where('category_id',$filder['category_id']);
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
    <th>Name</th>
    <th>Category</th>
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
          $del_url     = base_url().'master/delete_level_two_category/'.$id;
		   $edit_url    = base_url().'master/edit_form/level_two_category_edit/level_two_category/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/level_two_category/delete/id/'.$id;
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/level_two_category/retrive/id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
           $categoryName = $this->Common->get_col_by_key('product_category','product_category_id',$row->category_id,'name');
                 
           
    if($row->status=='Active'){
      $status = '<span class="badge bg-success">Active</span>';
    }else{
      $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    <td>'.$categoryName.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }
 
    //////////######## Open Business Category###########//////
    
        //////////###### Open Business Type #######//////////////
	
    public function get_level_three_category($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("level_three_category");
     $this->db->order_by('name','asc');
     
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['name'])){
     $this->db->like('name',$filder['name']);
     }
     if(!empty($filder['category_id'])){
     $this->db->where('category_id',$filder['category_id']);
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
    <th>Name</th>
    <th>Category</th>
    <th>Level Two Category</th>
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
          $del_url     = base_url().'master/delete_level_three_category/'.$id;
		   $edit_url    = base_url().'master/edit_form/level_three_category_edit/level_three_category/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/level_three_category/delete/id/'.$id;
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/level_three_category/retrive/id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
           $categoryName = $this->Common->get_col_by_key('product_category','product_category_id',$row->category_id,'name');
           $subCategoryName = $this->Common->get_col_by_key('level_two_category','id',$row->sub_category_id,'name');
                 
           
    if($row->status=='Active'){
      $status = '<span class="badge bg-success">Active</span>';
    }else{
      $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    <td>'.$categoryName.'</td>
    <td>'.$subCategoryName.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }
 
    //////////######## Open Business Category###########//////
    
            //////////###### Open Level Four Category #######//////////////
	
    public function get_level_four_category($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("level_four_category");
     $this->db->order_by('name','asc');
     
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['name'])){
     $this->db->like('name',$filder['name']);
     }
     if(!empty($filder['category_id'])){
     $this->db->where('category_id',$filder['category_id']);
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
    <th>Name</th>
    <th>Category</th>
    <th>Level Two Category</th>
    <th>Level Three Category</th>
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
          $del_url     = base_url().'master/delete_level_four_category/'.$id;
		   $edit_url    = base_url().'master/edit_form/level_four_category_edit/level_four_category/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/level_four_category/delete/id/'.$id;
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/level_four_category/retrive/id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
           $categoryName = $this->Common->get_col_by_key('product_category','product_category_id',$row->category_id,'name');
           $subCategoryName = $this->Common->get_col_by_key('level_two_category','id',$row->sub_category_id,'name');
           $levelCategoryName = $this->Common->get_col_by_key('level_three_category','id',$row->level_three_category_id,'name');
                 
           
    if($row->status=='Active'){
      $status = '<span class="badge bg-success">Active</span>';
    }else{
      $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    <td>'.$categoryName.'</td>
    <td>'.$subCategoryName.'</td>
    <td>'.$levelCategoryName.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }
 
    //////////######## Open Level Four Category###########//////
    
    //////////###### Open Business Type #######//////////////
	
    public function get_services_sub_category($isFilter,$limit,$start,$filder){
       
     $this->db->select("*");
     $this->db->from("services_sub_category");
     $this->db->order_by('name','asc');
     
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
     }
     else{
      $this->db->where('isDelete',0);   
     }

     if(!empty($filder['name'])){
     $this->db->like('name',$filder['name']);
     }
     if(!empty($filder['service_category_id'])){
     $this->db->where('service_category_id',$filder['service_category_id']);
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
    <th>Name</th>
    <th>Category</th>
    <th>Status</th>
    <th>Option</th>
   
  </tr>
  </thead>
  <tbody>';
  $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
          $id          = $row->services_sub_category_id;
          $del_url     = base_url().'master/delete_services_sub_category/'.$id;
		   $edit_url    = base_url().'master/edit_form/services_sub_category_edit/services_sub_category/services_sub_category_id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/services_sub_category/delete/services_sub_category_id/'.$id;
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/services_sub_category/retrive/services_sub_category_id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
           $ScategoryName = $this->Common->get_col_by_key('services_categories','services_categories_id',$row->service_category_id,'name');
                 
           
    if($row->status=='Active'){
      $status = '<span class="badge bg-success">Active</span>';
    }else{
      $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    <td>'.$ScategoryName.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }
 
    //////////######## Open Tagging Category###########//////
    
    ////////////######## Open Taging Category #############/////////////////
    
    public function get_tagging_categories($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("tagging_category");
     $this->db->order_by('id','desc');
     
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
    <th>Name</th>
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
           $del_url     = base_url().'master/delete_tagging_category/'.$id;
		   $edit_url    = base_url().'master/edit_form/tagging_categories_edit/tagging_category/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/tagging_category/delete/id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/tagging_category/retrive/id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
           
                 
           
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>';
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }
    
    //////////######## End Tagging Category###########/////////////////
	
	/////////#######STATES START#######/////////
	
		
    public function get_states($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("state");
     $this->db->order_by('state_name','asc');
     
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['state_name'])){
     $this->db->like('state_name',$filder['state_name']);
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
    <th>Name</th>
    <th>Status</th>
    <th>Option</th>
   
   </tr>
   </thead>
   <tbody>';
   $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
           $id          = $row->state_id;
           $del_url     = base_url().'master/delete_state/'.$id;
		   $edit_url    = base_url().'master/edit_form/state_edit/state/state_id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/state/delete/state_id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/state/retrive/state_id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
           
                 
           
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>';
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->state_name.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }
	
	////////////STATES END////////////
	
	//////////##########CITY START##########/////////
	
		
    public function get_cities($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("city");
     $this->db->order_by('city_name','asc');
     
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['city_name'])){
     $this->db->like('city_name',$filder['city_name']);
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
    <th>City Name</th>
    <th>Status</th>
    <th>Option</th>
   
   </tr>
   </thead>
   <tbody>';
   $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
           $id          = $row->city_id;
           $del_url     = base_url().'master/delete_city/'.$id;
		   $edit_url    = base_url().'master/edit_form/city_edit/city/city_id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/city/delete/city_id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/city/retrive/city_id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
           
         $stateName =   $this->Common->get_col_by_key('state','state_id',$row->state_id,'state_name');
           
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>';
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$stateName.'</td>
     <td>'.$row->city_name.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }
	
	/////////############ END CITY #######////////
	
	/////////############ Start Metal #######////////
	
	   public function get_metals($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("metal");
     $this->db->order_by('metal_id','desc');
     
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['metal_name'])){
     $this->db->like('metal_name',$filder['metal_name']);
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
    <th>Name</th>
    
    <th>Unit</th>
    <th>Total Sold</th>
    <th>Current stock</th>
    <th>Status</th>
    <th>Option</th>
   
   </tr>
   </thead>
   <tbody>';
   $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
           $id          = $row->metal_id;
           $del_url     = base_url().'master/delete_metal/'.$id;
		   $edit_url    = base_url().'master/edit_form/metal_edit/metal/metal_id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/metal/delete/metal_id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/metal/retrive/metal_id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link;   
           }
           
           
                 
           
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>';
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
     $totalSold   = $this->Common->getTotalMetalSold($id);
     $totalStock  = $this->Common->getTotalMetalStock($id);
     if(!empty($totalStock) && $totalStock>0){
          if($totalStock>999){
        $currentStock =  $totalStock-$totalSold;
        $currentStockKg = number_format($currentStock/1000,2).' Kg';
          }
          else{
            $currentStockKg   = $totalStock.' Gm';
          }
     }
    else{
        $currentStockKg = 0;
    }
		   
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->metal_name.'</td>    
   
    <td>'.$this->Common->get_col_by_key('metal_unit','unit_id',$row->metal_unit_id,'unit_name').'</td>
    <td>'.$totalSold.'</td>
    <td>'.$currentStockKg.'</td>
     <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }
	
	
	/////////############ END Metal #######////////
	
	////////////########## Open Pincode ############/////////////////
	
	public function get_app_pincode($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("app_pincode");
     $this->db->order_by('id','desc');
     
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['pincode'])){
     $this->db->like('pincode',$filder['pincode']);
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
    <th> Country Name</th>
    <th> State Name</th>
    <th> City Name</th>
    <th> Pincode</th>
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
           $del_url     = base_url().'master/delete_app_pincode/'.$id;
		   $edit_url    = base_url().'master/edit_form/app_pincode_edit/app_pincode/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/app_pincode/delete/id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/app_pincode/retrive/id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
     $countryname = $this->Common->get_col_by_key('countries','id',$row->country_id,'name');
     $state = $this->Common->get_col_by_key('states','id',$row->state_id,'name');
      $city = $this->Common->get_col_by_key('cities','id',$row->city_id,'name');

           
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>';
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
   <td>'.$countryname.'</td>
   <td>'.$state.'</td>
    <td>'.$city.'</td>
     <td>'.$row->pincode.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }
	
	///////////########### End Pincode #############/////////////////
	
	////////############ Start Document Type#######//////////////////
	
	 public function get_document_type($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("document_type");
     $this->db->order_by('id','desc');
     
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
    <th>Name</th>
   
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
           $del_url     = base_url().'master/delete_document_type/'.$id;
		   $edit_url    = base_url().'master/edit_form/document_type_edit/document_type/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/document_type/delete/id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/document_type/retrive/id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
           
                 
           
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>';
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }
	
	
	////////########### End Document Type ###########///////////////////////////
	
	/////////////###### Start Document Category ###########///////////////
	
	public function get_document_category($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("document_category");
     $this->db->order_by('id','desc');
     
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
    <th>Name</th>
    <th>Document Type</th>
    <th>Side</th>
    <th>Document Number Length</th>
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
           $del_url     = base_url().'master/delete_document_category/'.$id;
		   $edit_url    = base_url().'master/edit_form/document_category_edit/document_category/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/document_category/delete/id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/document_category/retrive/id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
           
                 $documentName =   $this->Common->get_col_by_key('document_type','id',$row->document_type_id,'name');
           
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>';
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    <td>'.$documentName.'</td>
    <td>'.$row->side.'</td>
    <td>'.$row->doc_num_length.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }
	
	
	///////////####### End Document Category #############///////////////
	
	/////////######## Start Late Fine #########////////////
	
	 public function get_late_fine($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("late_fine");
     $this->db->order_by('id','desc');
     
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['fromDay'])){
     $this->db->like('fromDay',$filder['fromDay']);
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
    <th>From Day</th>
    <th>To Day</th>
    <th>Fine Inr</th>
    <th>Fine Percentage</th>
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
           $del_url     = base_url().'master/delete_late_fine/'.$id;
		   $edit_url    = base_url().'master/edit_form/late_fine_edit/late_fine/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/late_fine/delete/id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/late_fine/retrive/id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
           
                 
           
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>';
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->fromDay.'</td>
    <td>'.$row->toDay.'</td>
    <td>'.$row->fine_inr.'</td>
    <td>'.$row->fine_percentage.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }
	
	///////######### End Late Fine ##########/////////////
	
	//////////###### Product Start ########//////////////////////
	
	public function get_products($isFilter,$limit,$start,$filder){
     
     $users_id = getUser('users_id');  
     $userType = getUser('user_type');
     
     $this->db->select("*");
     $this->db->from("product");
     $this->db->order_by('pname','asc');
     if($userType =='seller'){
         $this->db->where('vendor_id',$users_id);
     }
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['pname'])){
     $this->db->like('pname',$filder['pname']);
     }
     if(!empty($filder['status'])){
     $this->db->where('status',$filder['status']);
     }
    if(!empty($filder['category_id'])){
     $this->db->where('category_id',$filder['category_id']);
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
    <th>Level One Category</th>
    <th>Level Two Category</th>
    <th>Level Three Category</th>
    <th>Level Four Category</th>
    <th>Product ID</th>
    <th>Product Name</th>
    <th>Price</th>
    <th>Gallery</th>
    <th>Status</th>
    <th>Option</th>
   </tr>
   </thead>
   <tbody>';
   $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
           $id          = $row->product_id;
           $pKey          = $row->product_key;
           $del_url     = base_url().'master/delete_product/'.$id;
		   $edit_url    = base_url().'master/edit_form/products_edit/product/product_id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           $copy   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-file-copy-line'></i></a>";

           
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/product/delete/product_id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/product/retrive/product_id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link.' '.$copy;   
           }
           
            if($row->price_type=="Variation"){
                $priceHref =  base_url().'master/product_attribute/'.$id.'/'.$pKey;
    		    $price_chart = "<a href='$priceHref' target='_new()'>Prices</a>";
            }else{
                $price_chart = $row->product_price;
            }
           $categoryName = $this->Common->get_col_by_key('product_category','product_category_id',$row->category_id,'name');
           $subCategoryName = $this->Common->get_col_by_key('level_two_category','id',$row->sub_category_id,'name');
           $lFour = $this->Common->get_col_by_key('level_four_category','id',$row->level_four_category_id,'name');
           $lThree = $this->Common->get_col_by_key('level_three_category','id',$row->level_three_category_id,'name');

    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
		   $File = $row->pimg;

    		if(!empty($File))
    		{ 
    	        $load_url = 'uploads/product/'.$File;
    			if(file_exists($load_url))
    			{
    		   $url = base_url().$load_url;			
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
    		$fileData = "<a href='$url' target='_new'><img src='$url' , style='height:50px; width:auto'></a>";
    		 $videoUrl = $row->video;
   	          $video = "<a href='$videoUrl' target='_blank'>Link</a>";

		   
		   
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$categoryName.'</td>
    <td>'.$subCategoryName.'</td>
    <td>'.$lThree.'</td>
    <td>'.$lFour.'</td>
    <td>'.$row->product_id.'</td>
    <td>'.$row->pname.'</td>
    <td>'.$price_chart.'</td>
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
 
	/////////###### End Product########//////////////////////////////
		public function get_product_bulk_images($isFilter,$limit,$start,$filder){
     
     $users_id = getUser('users_id');  
     $userType = getUser('user_type');
     
     $this->db->select("*");
     $this->db->from("product");
     $this->db->order_by('pname','asc');
     if($userType =='seller'){
         $this->db->where('vendor_id',$users_id);
     }
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['pname'])){
     $this->db->like('pname',$filder['pname']);
     }
     if(!empty($filder['status'])){
     $this->db->where('status',$filder['status']);
     }
     if(!empty($filder['category_id'])){
     $this->db->where('category_id',$filder['category_id']);
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
    <th>Product Name</th>
    <th>Product Image1 </th>
    <th>Product Image 2</th>
    <th>Product Image 3</th>
    <th>Product Image 4</th>
    <th>Product Image 5</th>
    

   </tr>
   </thead>
   <tbody>';
   $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
           $id          = $row->product_id;
           $pKey          = $row->product_key;
           
           
            $priceHref =  base_url().'master/product_attribute/'.$id.'/'.$pKey;
         
		 $price_chart = "<a href='$priceHref' target='_new()'>Prices</a>";
           
           
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
$File= $row->pimg;
if(!empty($File))
	{ 
        $load_url = 'uploads/product/'.$File;
		if(file_exists($load_url))
		{
	   $url = base_url().$load_url;			
		}
		else
		{
		$url = base_url().'uploads/no_file.jpg';		
		}
		
        $fileData = "<a href='$url' target='_blank'>File</a>".' '.'<input type="file" name="pimg" id="cover" class="bulkImage" value="'.$id.'">';
	}
	else
	{

	$fileData = '<input type="file" name="pimg" id="cover" class="bulkImage" value="'.$id.'">';
	} 
	                   
$File1= $row->pimg1; 

if(!empty($File1))
	{ 
        $load_url1 = 'uploads/product/'.$File1;
		if(file_exists($load_url1))
		{
	   $url1 = base_url().$load_url1;			
		}
		else
		{
		$url1 = base_url().'uploads/no_file.jpg';		
		}
		
        $fileData1 = "<a href='$url1' target='_blank'>File</a>".' '.'<input type="file" name="pimg1" id="cover" class="bulkImage" value="'.$id.'">';			
	}
	else
	{

	$fileData1 = '<input type="file" name="pimg1" id="cover" class="bulkImage" value="'.$id.'">';
	} 
	                   
$File2= $row->pimg2; 

if(!empty($File2))
	{ 
        $load_url2 = 'uploads/product/'.$File2;
		if(file_exists($load_url2))
		{
	   $url2 = base_url().$load_url2;			
		}
		else
		{
		$url2 = base_url().'uploads/no_file.jpg';		
		}
		
        $fileData2 = "<a href='$url2' target='_blank'>File</a>".' '.'<input type="file" name="pimg2" id="cover" class="bulkImage" value="'.$id.'">';			
	}
	else
	{

	$fileData2 = '<input type="file" name="pimg2" id="cover" class="bulkImage" value="'.$id.'">';
	} 
	                   
$File3= $row->pimg3; 

if(!empty($File3))
	{ 
        $load_url3 = 'uploads/product/'.$File3;
		if(file_exists($load_url3))
		{
	   $url3 = base_url().$load_url3;			
		}
		else
		{
		$url3 = base_url().'uploads/no_file.jpg';		
		}
		
        $fileData3 = "<a href='$url3' target='_blank'>File</a>".' '.'<input type="file" name="pimg3" id="cover" class="bulkImage" value="'.$id.'">';			
	}
	else
	{

	$fileData3 = '<input type="file" name="pimg3" id="cover" class="bulkImage" value="'.$id.'">';
	} 
	                   

$File4= $row->pimg4; 

if(!empty($File3))
	{ 
        $load_url4 = 'uploads/product/'.$File4;
		if(file_exists($load_url4))
		{
	   $url4 = base_url().$load_url4;			
		}
		else
		{
		$url4 = base_url().'uploads/no_file.jpg';		
		}
		
        $fileData4 = "<a href='$url4' target='_blank'>File</a>".' '.'<input type="file" name="pimg4" id="cover" class="bulkImage" value="'.$id.'">';			
	}
	else
	{

	$fileData4 = '<input type="file" name="pimg4" id="cover" class="bulkImage" value="'.$id.'">';
	} 

   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->pname.'</td>
    <td>'.$fileData.'</td>
    <td>'.$fileData1.'</td>
    <td>'.$fileData2.'</td>
    <td>'.$fileData3.'</td>
    <td>'.$fileData4.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }

    ////////////////###### End Product Bulk ########/////////////////////
    ///////////////###### Open Product Stock ########////////////////////
    
	 public function get_product_stock($isFilter,$limit,$start,$filder){
     
     $users_id = getUser('users_id');  
     $userType = getUser('user_type');
     
     $this->db->select("*");
     $this->db->from("product");
     $this->db->order_by('pname','asc');
     if($userType =='seller'){
         $this->db->where('vendor_id',$users_id);
     }
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['pname'])){
     $this->db->like('pname',$filder['pname']);
     }
     if(!empty($filder['status'])){
     $this->db->where('status',$filder['status']);
     }
     if(!empty($filder['category_id'])){
     $this->db->where('category_id',$filder['category_id']);
     }
    
     
    
    if($isFilter=='yes'){
            $query = $this->db->get();
            return $query->num_rows();
       }
       else{
           $this->db->limit($limit,$start);
           $query = $this->db->get();
           $output   = '';
           $pStockAction = base_url().'master/add_product_stock';
        $output .='
    <form id="productStock" action="'.$pStockAction.'" method="POST" class="row g-3" enctype="multipart/form-data">
    <table class="table table-bordered datatable" id="datatable" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
    <th>Product Name</th>
 
   </tr>
   </thead>
   <tbody>';
   $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
    $id          = $row->product_id;
    $pKey          = $row->product_key;
    $qty          = $row->quantity;
    
    $priceHref =  base_url().'master/product_attribute/'.$id.'/'.$pKey;
    $price_chart = "<a href='$priceHref' target='_new()'>Prices</a>";
       
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
    //$Quantity = '<input type="number" name="pimg1" id="cover" class="bulkImage" value="'.$id.'">';

   $output .= '
       
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->pname.'<input type="hidden" name="product_id[]" value="'.$id.'">

 ';   if($row->price_type=='Fixed'){
 $output.=' 
   <table class="table table-bordered table-hover table_variation">
   <thead>
   <tr>
   <th>Qty</th> 
   <th>Current Stock</th>
   <th>Stock Type</th>
   <th>Remarks</th>
   </tr>
   </thead>
   <tbody>
   <tr>
    <td> <input type="number" name="quantity[]" ></td>
    <td> '.$this->Common->getCurrentProductStock($id,$qty).'</td>
    <td><select name="stock_type[]">
        <option value="">Stock Type</option>
        <option value="Add">Add</option>
        <option value="Remove">Remove</option>
    </select></td>
    <td> <input type="text" name="remarks[]"></td>
    </tr>
   </tbody>
   </table>
      ';        
    }else{
  $output .= '
<style>
    .table_variation td,.table_variation th{padding:5px;}
</style>
<table class="table table-bordered table-hover table_variation">
    <thead>
        <tr>
            <th>Sr. No.</th>
           
           ';
           
        $priceFlag =  $this->Common->get_col_by_key('product','product_id',$id,'priceFlag'); 
        if($priceFlag==0){ $display =''; } else{  $display = 'none';}
   
        $this->db->select('product_attribute.*,attribute.name');
        $this->db->from('product_attribute');
        $this->db->join('attribute','attribute.id=product_attribute.attribute_id');
        $this->db->where('product_attribute.product_id',$id);
        $product_attribute = $this->db->get(); 
        if($product_attribute->num_rows()>0){
            $product_attribute_res = $product_attribute->result();
            foreach($product_attribute_res as $pa){
                 $output .= '
               <th> '.$pa->name.'</th> 
               ';
            }
            }
           $output .= '
           <th style="display: '.$display.'">MRP</th> 
           <th style="display: '.$display.'">Selling Price</th> 
           <th>Qty</th> 
           <th>Current Stock</th>
           <th>Stock Type</th>
           <th>Remarks</th>
            
        </tr>
    </thead>
    
    <tbody>';
        $vsr = 1;
        $this->db->select('product_variation.*,variation.variation_name');
        $this->db->from('product_variation');
        $this->db->join('variation','variation.id=product_variation.variation_id');
        $this->db->where('product_variation.product_id',$id);
        $this->db->group_by('product_variation.common_key');
        $product_variation = $this->db->get(); 
        $totalCount =  $product_variation->num_rows(); 
        if($totalCount>0){
            $product_attribute_res = $product_variation->result();
            foreach($product_attribute_res as $pv){
                $variation_id = $pv->variation_id;
                $attribute_id = $pv->attribute_id;
                $vqty = $pv->qty;
                
                $output .= '
           <tr>
               <td> '.$vsr++.'</td>';
               
        $this->db->select('product_attribute.attribute_id');
        $this->db->from('product_attribute');
        //$this->db->join('attribute','attribute.id=product_attribute.attribute_id');
        $this->db->where('product_attribute.product_id',$id);
        $product_attributes = $this->db->get(); 
        if($product_attributes->num_rows()>0){
            $product_attribute_ress = $product_attributes->result();
            foreach($product_attribute_ress as $pas){
                 $attribute_id = $pas->attribute_id;
                 $common_key = $pv->common_key;
                
                $this->db->select('variation_id');
                $this->db->from('product_variation');
                $this->db->where('attribute_id',$attribute_id);
                $this->db->where('common_key',$common_key);
                $variData = $this->db->get();
                if($variData->num_rows()>0){
                    $variationResult = $variData->result();
                    $variation_id = $variationResult[0]->variation_id;
                }
               
        //  $variation_id = $this->db->get_where('product_variation',array('attribute_id'=>$attribute_id,'common_key'=>$common_key))->row()->variation_id; 
        
        $variation_name = $this->Common->get_col_by_key('variation','id',$variation_id,'variation_name');
        
        
                 $output .= '
               <td><span style="padding:2px;">'.$variation_name.'</span>
               </td> 
                ';
                }
            }
           // else{
             //   echo"<td>.</td>";
           // }
                $output .= '
             
               <td style="display: '.$display.'"> '.$pv->mrp.'</td>
               <td style="display: '.$display.'"> '.$pv->selling_price.'</td>
               
               <td><input type="number" name="quantity['.$id.'][]" > 
               <input type="hidden" name="variation_id['.$id.'][]" value="'.$common_key.'">
               </td>
               <td> '.$this->Common->getCurrentProductStock($id,$vqty,$common_key).'</td>
               <td> <select name="stock_type['.$id.'][]">
               <option value="">Stock Type</option><option value="Add">Add</option>
               <option value="Remove">Remove</option>
               </select></td>
               <td> <input type="text" name="remarks['.$id.'][]"></td>
           </tr>     
                ';
            }
            }
        
     $output .= '
    </tbody>

</table>
';
        
    }
    $output.='
    </td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>
   <button type="submit" class="btn btn-outline-primary btn-sm" >Submit</button> </form>
  <script>
 $("#productStock").on("submit",(function(e) {
$(".loading").show();
var post_link = $(this).attr("action");
e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(response){
      var json = $.parseJSON(response);
	  if(json.status==1)
            {
 
     $(".loading").hide();
     toastr.success(json.msg);
     var page_no = 1;  
     loadTableData(page_no);
    $("#productStock").find("input[type=text],input[type=number],textarea,input").val("");            
             }
            else
            {
              
            $(".loading").hide();
            toastr.error(json.msg);
           }
	  
	},
	error: function(){} 	        
});
}));
 
 </script>
  ';
  return $output;    
       }
   
 }

    ///////////////############ End Product Stock ##############///////////////
    
    ///////////////############ Open Model Product ##############///////////////
    
    
    
    	public function get_model_products($isFilter='',$limit='',$start='',$filder=''){
       $users_id = getUser('users_id');  
     $userType = getUser('user_type');
	 
     $this->db->select("*");
     $this->db->from("product");
     $this->db->order_by('product_id','desc');
     if($userType =='seller'){
         $this->db->where('vendor_id',$users_id);
     }
     if(!empty($filder['isDelete'])){
     $this->db->where('isDelete',$filder['isDelete']);
     }
     else{
      $this->db->where('isDelete',0);   
     }
     if(!empty($filder['pname'])){
     $this->db->like('pname',$filder['pname']);
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
          $action = base_url().'master/bulk_status_upload/update';
        $output .='
    <form id="statusFormEdit" action="'.$action.'" method="POST" class="row g-3" enctype="multipart/form-data">
    <table class="table table-bordered datatablel_model" id="datatable_model" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
    <th>Check</th>
    <th>Product Name</th>
    <th>Status</th>
   
   </tr>
   </thead>
   <tbody>
';
   $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
           $id          = $row->product_id;
           
           $pKey          = $row->product_key;
           $del_url     = base_url().'master/delete_product/'.$id;
		   $edit_url    = base_url().'master/edit_form/model_products/product/product_id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/product/delete/product_id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/product/retrive/product_id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
           if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>';
       $allStatus = 'checked';
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
       $allStatus = '';
    }
    
 
    $check = '<input type="checkbox" name="status['.$id.']" '.$allStatus.'>';
   $pid = '<input type="hidden" name="product_id[]" value='.$id.'>';
		   
   $output .= '
   <tr>
   
    <td>'.$sr++.' '.$pid.'</td>
    <td>'.$check.'</td>
    <td>'.$row->pname.'</td>
    <td>'.$status.'</td>
   </tr>
   ';
  }
  
  $output .=  '

 </tbody></table>
  <button type="submit" class="btn btn-outline-primary btn-sm" >Submit</button> </form>
  <script>
    $("#statusFormEdit").on("submit",(function(e) 
  {
$(".loading").show();
var post_link = $(this).attr("action");
e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(response){
      var json = $.parseJSON(response);
	  if(json.status==1)
            {
 
     $(".loading").hide();
     toastr.success(json.msg);
     var page_no = $("#pageNumber").html();  
     loadTableData(page_no);
     $("#ExtralargeEditModal").modal("hide");
            }
            else
            {
              
            $(".loading").hide();
            toastr.error(json.msg);
           }
	  
	},
	error: function(){} 	        
});
}));

 
 </script>
 ';


  return $output;    
       }
   
 }
    
    //////////////############# End Model Product ###############///////////////
    
    //////////////############ Open Promo Code ###############////////////////
	public function get_promo_code($isFilter,$limit,$start,$filder){
     
     $this->db->select("*");
     $this->db->from("promo_codes");
     $this->db->order_by('id','desc');

     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     if(!empty($filder['promo_code'])){
     $this->db->like('promo_code',$filder['promo_code']);
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
    <th>Promo Code</th>
    <th>Image</th>
    <th>Message</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Discount</th>
    <th>Discount type</th>
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
           $del_url     = base_url().'master/delete_promo_code/'.$id;
		   $edit_url    = base_url().'master/edit_form/promo_code_edit/promo_codes/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/promo_codes/delete/id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/promo_codes/retrive/id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }

    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
		   $File = $row->image;

    		if(!empty($File))
    		{ 
    	        $load_url = 'uploads/promo_code/'.$File;
    			if(file_exists($load_url))
    			{
    		   $url = base_url().$load_url;			
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
  
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->promo_code.'</td>
    <td>'.$fileData.'</td>
    <td>'.$row->message	.'</td>
    <td>'.getDateFormat($row->start_date).'</td>
    <td>'.getDateFormat($row->end_date).'</td>
    <td>'.$row->discount.'</td>
    <td>'.$row->discount_type.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }
    //////////////########### End Promo Code #################////////////////
    
    //////////////############ Open Service Promo Code ###############////////////////
	public function get_service_promo_code($isFilter,$limit,$start,$filder){
     
     $this->db->select("*");
     $this->db->from("service_promo_code");
     $this->db->order_by('id','desc');

     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     if(!empty($filder['promo_code'])){
     $this->db->like('promo_code',$filder['promo_code']);
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
    <th>Promo Code</th>
    <th>Image</th>
    <th>Message</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Discount</th>
    <th>Discount type</th>
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
           $del_url     = base_url().'master/delete_service_promo_code/'.$id;
		   $edit_url    = base_url().'master/edit_form/service_promo_code_edit/service_promo_code/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/service_promo_code/delete/id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/service_promo_code/retrive/id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }

    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
		   $File = $row->image;

    		if(!empty($File))
    		{ 
    	        $load_url = 'uploads/service_promo_code/'.$File;
    			if(file_exists($load_url))
    			{
    		   $url = base_url().$load_url;			
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
    		$fileData = "<a href='$url' target='_blank'><img src='$url' , style='height:50px; width:auto'></a>";
  
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->promo_code.'</td>
    <td>'.$fileData.'</td>
    <td>'.$row->message	.'</td>
    <td>'.getDateFormat($row->start_date).'</td>
    <td>'.getDateFormat($row->end_date).'</td>
    <td>'.$row->discount.'</td>
    <td>'.$row->discount_type.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }
    //////////////########### End Service Promo Code #################////////////////
    
	//////////////############ Open Slider Code ###############////////////////
    
	public function get_slider($isFilter,$limit,$start,$filder){
     
     $this->db->select("*");
     $this->db->from("slider");
     $this->db->order_by('id','desc');

     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     if(!empty($filder['title'])){
     $this->db->like('title',$filder['title']);
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
    <th>Title</th>
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
           $id          = $row->id;
           $del_url     = base_url().'master/delete_slider/'.$id;
		   $edit_url    = base_url().'master/edit_form/slider_edit/slider/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/slider/delete/id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/slider/retrive/id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }

    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   $File = $row->image;

    		if(!empty($File))
    		{ 
    	        $load_url = 'uploads/slider/'.$File;
    			if(file_exists($load_url))
    			{
    		   $url = base_url().$load_url;			
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
    		$fileData = "<a href='$url' target='_blank'><img src='$url' , style='height:50px; width:auto'></a>";
  
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->title.'</td>
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
 
    //////////////########### End Slider Code #################////////////////
    
    //////////////########### End Offers Code #################////////////////
    
    	public function get_offers($isFilter,$limit,$start,$filder){
     
    //  $users_id = getUser('users_id');  
    //  $userType = getUser('user_type');
     
     $this->db->select("*");
     $this->db->from("offers");
     $this->db->order_by('id','desc');
    //  if($userType =='Seller'){
    //      $this->db->where('vendor_id',$users_id);
    //  }
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     if(!empty($filder['type'])){
     $this->db->like('type',$filder['type']);
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
    <th>Type</th>
    <th>Level First</th>
    <th>Level Second</th>
    <th>Level Thre</th>
    <th>Level Four</th>
    <th>Image</th>
    <th>Added</th>
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
           $del_url     = base_url().'master/delete_offers/'.$id;
		   $edit_url    = base_url().'master/edit_form/offers_edit/offers/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/offers/delete/id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/offers/retrive/id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
        
        $level_one_cat_id = $this->Common->get_col_by_key('product_category','product_category_id',$row->level_one_cat_id,'name');
        $level_two_cat_id = $this->Common->get_col_by_key('level_two_category','id',$row->level_two_cat_id,'name');
        $level_three_cat_id = $this->Common->get_col_by_key('level_three_category','id',$row->level_three_cat_id,'name');
        $level_four_cat_id = $this->Common->get_col_by_key('level_four_category','id',$row->level_four_cat_id,'name');
        
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
		   $File = $row->image;

    		if(!empty($File))
    		{ 
    	        $load_url = 'uploads/offer/'.$File;
    			if(file_exists($load_url))
    			{
    		   $url = base_url().$load_url;			
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
  
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->type.'</td>
    <td>'.$level_one_cat_id.'</td>
    <td>'.$level_two_cat_id.'</td>
    <td>'.$level_three_cat_id.'</td>
    <td>'.$level_four_cat_id.'</td>
    <td>'.$fileData.'</td>
    <td>'.getDateTimeFormat($row->added).'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }

    //////////////########### End Offers Code #################////////////////
	
	    //////////////########### End Offers Code #################////////////////
    
    	public function get_banner($isFilter,$limit,$start,$filder){
     
    //  $users_id = getUser('users_id');  
    //  $userType = getUser('user_type');
     
     $this->db->select("*");
     $this->db->from("banner");
     $this->db->order_by('id','desc');
    //  if($userType =='Seller'){
    //      $this->db->where('vendor_id',$users_id);
    //  }
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     if(!empty($filder['type'])){
     $this->db->like('type',$filder['type']);
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
    <th>Link</th>
    <th>Image</th>
    <th>Added</th>
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
           $del_url     = base_url().'master/delete_banner/'.$id;
		   $edit_url    = base_url().'master/edit_form/banner_edit/banner/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/bannner/delete/id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/banner/retrive/id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }

        
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
		   $File = $row->image;

    		if(!empty($File))
    		{ 
    	        $load_url = 'uploads/banner/'.$File;
    			if(file_exists($load_url))
    			{
    		   $url = base_url().$load_url;			
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
  
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->link.'</td>
    <td>'.$fileData.'</td>
    <td>'.getDateTimeFormat($row->added).'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }

    //////////////########### End Banner #################////////////////
    
	////////////////############### Open Crystal ##################///////////////////

	public function get_crystal($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("crystal");
     $this->db->order_by('title','asc');
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['title'])){
     $this->db->like('title',$filder['title']);
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
    <th>Photo</th>
    <th>Title</th>
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
           $del_url     = base_url().'master/delete_crystal/'.$id;
		   $edit_url    = base_url().'master/edit_form/crystal_edit/crystal/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/crystal/delete/id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/crystal/retrive/id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
       
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
		   $File = $row->img;

    		if(!empty($File))
    		{ 
    	        $load_url = 'uploads/crystal/'.$File;
    			if(file_exists($load_url))
    			{
    		   $url = base_url().$load_url;			
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
		   
		   
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$fileData.'</td>
    <td>'.$row->title.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }


///////////////################ End Crystal ##################/////////////////////

////////////////############### Open Crystal ##################///////////////////

	public function get_product_unit($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("product_unit");
     $this->db->order_by('id','desc');
     
     if(!empty($filder['isDelete'])){
     
     $this->db->where('isDelete',$filder['isDelete']);
        
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     
     if(!empty($filder['unit_name'])){
     $this->db->like('unit_name',$filder['unit_name']);
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
    <th>Name</th>
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
           $del_url     = base_url().'master/delete_product_unit/'.$id;
		   $edit_url    = base_url().'master/edit_form/product_unit_edit/product_unit/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/product_unit/delete/id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/product_unit/retrive/id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
       
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }

		   
		   
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->unit_name.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
    
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }


///////////////################ End Crystal ##################/////////////////////

///////////########## Open Blog Category ############////////////

 public function get_blog_category($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("blog_category");
     $this->db->order_by('id','desc');
     
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
     <th>Blog Category Name</th>
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
          $id          = $row->id;
          $del_url     = base_url().'master/delete_blog_category/'.$id;
		   $edit_url    = base_url().'master/edit_form/blog_category_edit/blog_category/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/blog_category/delete/id/'.$id;
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/blog_category/retrive/id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
           

    
    $File = $row->image;

    		if(!empty($File))
    		{ 
    	        $load_url1 = 'uploads/blog_category/'.$File;
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
    
     if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
    
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
     <td>'.$row->name.'</td>
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

//////////########### End Blog Category ############////////////
/////////############ Open Blog ###########//////////////
    public function get_blog($isFilter,$limit,$start,$filder){
           
           
         $this->db->select("*");
         $this->db->from("blog");
         $this->db->order_by('id','desc');
         
         if(!empty($filder['isDelete'])){
         
         $this->db->where('isDelete',$filder['isDelete']);
            
         }
         else{
          $this->db->where('isDelete',0);   
         }
         
         
         if(!empty($filder['title'])){
         $this->db->like('title',$filder['title']);
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
         <th>Title</th>
         <th>Category</th>
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
              $id          = $row->id;
              $del_url     = base_url().'master/delete_blog/'.$id;
    		   $edit_url    = base_url().'master/edit_form/blog_edit/blog/id/'.$id;
    		   $getDeleteOption = getDeleteOption();
    		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
              $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
               
              if($row->isDelete==1){
              $isDeleteUrl      = base_url().'commoncontroller/trash_status/blog/delete/id/'.$id;
              $isRetriveUrl     = base_url().'commoncontroller/trash_status/blog/retrive/id/'.$id;
               
              $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
              $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
    
    		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
              }
              else{
                $optionLink  = $edit_link.' '.$delete_link;   
              }
               
               
    
        
        $File = $row->image;
    
        		if(!empty($File))
        		{ 
        	        $load_url2 = 'uploads/blog/'.$File;
        			if(file_exists($load_url2))
        			{
        		   $url = base_url().$load_url2;			
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
        
         if($row->status=='Active'){
          $status = '<span class="badge bg-success">Active</span>'; 
        }else{
          $status = '<span class="badge bg-danger">Deactive</span>';
        }
        
        $categoryname = $this->Common->get_col_by_key('blog_category','id',$row->category_id,'name');
    		   
      $output .= '
      <tr>
        <td>'.$sr++.'</td>
         <td>'.$row->title.'</td>
         <td>'.$categoryname.'</td>
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
////////############# End Blog ############//////////////

	//////////////////############# Open Services ##########/////////////////////

 public function get_services($isFilter,$limit,$start,$filder){
           
           
         $this->db->select("*");
         $this->db->from("services");
         $this->db->order_by('title','desc');
         
         if(!empty($filder['isDelete'])){
         
         $this->db->where('isDelete',$filder['isDelete']);
            
         }
         else{
          $this->db->where('isDelete',0);   
         }
         
         
         if(!empty($filder['title'])){
         $this->db->like('title',$filder['title']);
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
        <th>Image</th>
        <th>Title</th>
        <th>Category</th>
        <th>Sub Category</th>
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
              $del_url     = base_url().'master/delete_services/'.$id;
    		   $edit_url    = base_url().'master/edit_form/service_edit/services/id/'.$id;
    		   $getDeleteOption = getDeleteOption();
    		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
              $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
               
              if($row->isDelete==1){
              $isDeleteUrl      = base_url().'commoncontroller/trash_status/services/delete/id/'.$id;
              $isRetriveUrl     = base_url().'commoncontroller/trash_status/services/retrive/id/'.$id;
               
              $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
              $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
    
    		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
              }
              else{
                $optionLink  = $edit_link.' '.$delete_link;   
              }
               
           $SecategoryName = $this->Common->get_col_by_key('services_categories','services_categories_id',$row->service_category_id,'name');
           $SesubCategoryName = $this->Common->get_col_by_key('services_sub_category','services_sub_category_id',$row->service_sub_category_id,'name');

    
        
        $File = $row->image;
    
        		if(!empty($File))
        		{ 
        	        $load_url2 = 'uploads/services/'.$File;
        			if(file_exists($load_url2))
        			{
        		   $url = base_url().$load_url2;			
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
        
         if($row->status=='Active'){
          $status = '<span class="badge bg-success">Active</span>'; 
        }else{
          $status = '<span class="badge bg-danger">Deactive</span>';
        }
        
    		   
      $output .= '
      <tr>
        <td>'.$sr++.'</td>
        <td>'.$fileData.'</td>
        <td>'.$row->title.'</td>
        <td>'.$SecategoryName.'</td>
        <td>'.$SesubCategoryName.'</td>
        <td>'.$status.'</td>
        <td>'.$optionLink.'</td>
        
      </tr>
      ';
      }
      
      $output .= '</tbody></table>';
      return $output;    
          }
       
     }
	
	/////////////////############## End Services ##########//////////////////////
    public function get_faq($isFilter,$limit,$start,$filder){
           
           
         $this->db->select("*");
         $this->db->from("FAQ");
         $this->db->order_by('id','desc');
         
         if(!empty($filder['isDelete'])){
         
         $this->db->where('isDelete',$filder['isDelete']);
            
         }
         else{
          $this->db->where('isDelete',0);   
         }
         
         
         if(!empty($filder['title'])){
         $this->db->like('title',$filder['title']);
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
         <th>Question</th>
         <th>Answer</th>
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
              $del_url     = base_url().'master/delete_faq/'.$id;
    		   $edit_url    = base_url().'master/edit_form/faq_edit/FAQ/id/'.$id;
    		   $getDeleteOption = getDeleteOption();
    		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
              $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
               
              if($row->isDelete==1){
              $isDeleteUrl      = base_url().'commoncontroller/trash_status/FAQ/delete/id/'.$id;
              $isRetriveUrl     = base_url().'commoncontroller/trash_status/FAQ/retrive/id/'.$id;
               
              $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
              $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
    
    		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
              }
              else{
                $optionLink  = $edit_link.' '.$delete_link;   
              }
               
         if($row->status=='Active'){
          $status = '<span class="badge bg-success">Active</span>'; 
        }else{
          $status = '<span class="badge bg-danger">Deactive</span>';
        }
    		 
      $output .= '
      <tr>
        <td>'.$sr++.'</td>
         <td>'.$row->question.'</td>
         <td>'.$row->answer.'</td>
        <td>'.$status.'</td>
        <td>'.$optionLink.'</td>
        
      </tr>
      ';
      }
      
      $output .= '</tbody></table>';
      return $output;    
          }
       
     }
     ///////////payment_type//////////////////
     
      public function get_payment_type($isFilter,$limit,$start,$filder){
           
           
         $this->db->select("*");
         $this->db->from("payment_type");
         $this->db->order_by('id','desc');
         
         if(!empty($filder['isDelete'])){
         
         $this->db->where('isDelete',$filder['isDelete']);
            
         }
         else{
          $this->db->where('isDelete',0);   
         }
         
         
         if(!empty($filder['title'])){
         $this->db->like('title',$filder['title']);
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
         <th>Name</th>
         <th>Charges</th>
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
              $id          = $row->id;
              $del_url     = base_url().'master/delete_payment_type/'.$id;
    		   $edit_url    = base_url().'master/edit_form/payment_type_edit/payment_type/id/'.$id;
    		   
    		   $getDeleteOption = getDeleteOption();
    		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
               $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
              
              $plus_url    = base_url().'master/sub_payment_type/'.$row->id.'/'.$row->encrypt_key;
	            $plus_link   = "<a href='$plus_url' ><i class='ri-add-box-fill'></i></a>";
              
              
              if($row->isDelete==1){
              $isDeleteUrl      = base_url().'commoncontroller/trash_status/payment_type/delete/id/'.$id;
              $isRetriveUrl     = base_url().'commoncontroller/trash_status/payment_type/retrive/id/'.$id;
               
              $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
              $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
    
    		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
              }
              else{
                $optionLink  = $edit_link.' '.$delete_link.' '.$plus_link;   
              }
               
               
    
        
        $File = $row->image;
    
        		if(!empty($File))
        		{ 
        	        $load_url2 = 'uploads/payment_type/'.$File;
        			if(file_exists($load_url2))
        			{
        		   $url = base_url().$load_url2;			
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
        
         if($row->status=='Active'){
          $status = '<span class="badge bg-success">Active</span>'; 
        }else{
          $status = '<span class="badge bg-danger">Deactive</span>';
        }
        
      $output .= '
      <tr>
        <td>'.$sr++.'</td>
         <td>'.$row->name.'</td>
        <td>'.$row->charges.'</td> 
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
     
    ///////////////////////term and codition//////////////////
    
    ///////////////////////Open Payment Option//////////////////
    
    // public function get_payment_option($isFilter,$limit,$start,$filder){
           
           
    //      $this->db->select("*");
    //      $this->db->from("payment_option");
    //      $this->db->order_by('id','desc');
         
    //      if(!empty($filder['isDelete'])){
         
    //      $this->db->where('isDelete',$filder['isDelete']);
            
    //      }
    //      else{
    //       $this->db->where('isDelete',0);   
    //      }
         
         
    //      if(!empty($filder['title'])){
    //      $this->db->like('title',$filder['title']);
    //      }
    //      if(!empty($filder['status'])){
    //      $this->db->where('status',$filder['status']);
    //      }
         
        
    //     if($isFilter=='yes'){
    //             $query = $this->db->get();
    //             return $query->num_rows();
    //       }
    //       else{
    //           $this->db->limit($limit,$start);
    //           $query = $this->db->get();
    //           $output   = '';
    //         $output .='
    //     <table class="table table-bordered datatable" id="datatable" style="width:100%;overflow:auto;">
    //   <thead>
    //   <tr>
    //     <th>Sr. No.</th>
    //      <th>Name</th>
    //      <th>Charges</th>
    //     <th>Image</th>
    //     <th>Status</th>
    //     <th>Option</th>
       
    //   </tr>
    //   </thead>
    //   <tbody>';
    //   $sr = $start+1;
    //   $result = $query->result();
    //   foreach($result as $row)
    //   {
    //           $id          = $row->id;
    //           $del_url     = base_url().'master/delete_payment_option/'.$id;
    // 		   $edit_url    = base_url().'master/edit_form/payment_option_edit/payment_option/id/'.$id;
    // 		   $getDeleteOption = getDeleteOption();
    // 		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
    //           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
              
    //           if($row->isDelete==1){
    //           $isDeleteUrl      = base_url().'commoncontroller/trash_status/payment_option/delete/id/'.$id;
    //           $isRetriveUrl     = base_url().'commoncontroller/trash_status/payment_option/retrive/id/'.$id;
               
    //           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
    //           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
    
    // 		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
    //           }
    //           else{
    //             $optionLink  = $edit_link.' '.$delete_link;   
    //           }
               
               
    
        
    //     $File = $row->image;
    
    //     		if(!empty($File))
    //     		{ 
    //     	        $load_url3 = 'uploads/payment_option/'.$File;
    //     			if(file_exists($load_url2))
    //     			{
    //     		   $url = base_url().$load_url3;			
    //     			}
    //     			else
    //     			{
    //     			$url = base_url().'uploads/no_file.jpg';		
    //     			}
    //     		}
    //     		else
    //     		{
    //     		$url = base_url().'uploads/no_file.jpg';
    //     		}
    //     		$fileData = "<img src='$url' , style='height:50px; width:auto'>";
        
    //      if($row->status=='Active'){
    //       $status = '<span class="badge bg-success">Active</span>'; 
    //     }else{
    //       $status = '<span class="badge bg-danger">Deactive</span>';
    //     }
        
    //   $output .= '
    //   <tr>
    //     <td>'.$sr++.'</td>
    //      <td>'.$row->name.'</td>
    //     <td>'.$row->charges.'</td> 
    //     <td>'.$fileData.'</td>
    //     <td>'.$status.'</td>
    //     <td>'.$optionLink.'</td>
        
    //   </tr>
    //   ';
    //   }
      
    //   $output .= '</tbody></table>';
    //   return $output;    
    //       }
       
    //  }
    
    /////////////////////// End Payment Option //////////////////
    
    ///////////////////////Open Sub Payment Type//////////////////
    
    // public function get_sub_payment_type($isFilter,$limit,$start,$filder){
           
           
    //      $this->db->select("*");
    //      $this->db->from("sub_payment_type");
    //      $this->db->order_by('id','desc');
         
    //      if(!empty($filder['isDelete'])){
         
    //      $this->db->where('isDelete',$filder['isDelete']);
            
    //      }
         
    //       if(!empty($filder['payment_type_id'])){
         
    //      $this->db->where('payment_type_id',$filder['payment_type_id']);
            
    //      }
    //      else{
    //       $this->db->where('isDelete',0);   
    //      }
         
         
    //      if(!empty($filder['title'])){
    //      $this->db->like('title',$filder['title']);
    //      }
    //      if(!empty($filder['status'])){
    //      $this->db->where('status',$filder['status']);
    //      }
         
        
    //     if($isFilter=='yes'){
    //             $query = $this->db->get();
    //             return $query->num_rows();
    //       }
    //       else{
    //           $this->db->limit($limit,$start);
    //           $query = $this->db->get();
    //           $output   = '';
    //         $output .='
    //     <table class="table table-bordered datatable" id="datatable" style="width:100%;overflow:auto;">
    //   <thead>
    //   <tr>
    //     <th>Sr. No.</th>
    //     <th>Lable</th>
    //     <th>Type</th>
    //     <th>Name</th>
    //      <th>Id</th>
    //     <th>Status</th>
    //     <th>Option</th>
       
    //   </tr>
    //   </thead>
    //   <tbody>';
    //   $sr = $start+1;
    //   $result = $query->result();
    //   foreach($result as $row)
    //   {
    //           $id          = $row->id;
    //           $del_url     = base_url().'master/delete_sub_payment_type/'.$id;
    // 		   $edit_url    = base_url().'master/edit_form/sub_payment_type_edit/sub_payment_type/id/'.$id;
    // 		   $getDeleteOption = getDeleteOption();
    // 		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
    //           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";

    //           if($row->isDelete==1){
    //           $isDeleteUrl      = base_url().'commoncontroller/trash_status/sub_payment_type/delete/id/'.$id;
    //           $isRetriveUrl     = base_url().'commoncontroller/trash_status/sub_payment_type/retrive/id/'.$id;
               
    //           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
    //           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
    
    // 		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
    //           }
    //           else{
    //             $optionLink  = $edit_link.' '.$delete_link;   
    //           }
               
        
    //      if($row->status=='Active'){
    //       $status = '<span class="badge bg-success">Active</span>'; 
    //     }else{
    //       $status = '<span class="badge bg-danger">Deactive</span>';
    //     }
        
    //   $output .= '
    //   <tr>
    //     <td>'.$sr++.'</td>
    //     <td>'.$row->lable.'</td>
    //     <td>'.$row->type.'</td> 
    //     <td>'.$row->name.'</td>
    //     <td>'.$row->input_id.'</td>
    //     <td>'.$status.'</td>
    //     <td>'.$optionLink.'</td>
        
    //   </tr>
    //   ';
    //   }
      
    //   $output .= '</tbody></table>';
    //   return $output;    
    //       }
       
    //  }
    
     public function get_sub_payment_type($isFilter,$limit,$start,$filder){
        
        $this->db->select("*");
         $this->db->from("sub_payment_type");
         $this->db->order_by('id','desc');
         
         if(!empty($filder['isDelete'])){
         
         $this->db->where('isDelete',$filder['isDelete']);
            
         }
         else{
          $this->db->where('isDelete',0);   
         }
         
         
         if(!empty($filder['title'])){
         $this->db->like('title',$filder['title']);
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
        <th>Lable</th>
        <th>Type</th>
        <th>Name</th>
         <th>Id</th>
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
              $del_url     = base_url().'master/delete_sub_payment_type/'.$id;
    		   $edit_url    = base_url().'master/edit_form/sub_payment_type_edit/sub_payment_type/id/'.$id;
    		   $getDeleteOption = getDeleteOption();
    		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
              $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
              
              if($row->isDelete==1){
              $isDeleteUrl      = base_url().'commoncontroller/trash_status/sub_payment_type/delete/id/'.$id;
              $isRetriveUrl     = base_url().'commoncontroller/trash_status/sub_payment_type/retrive/id/'.$id;
               
              $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
              $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
    
    		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
              }
              else{
                $optionLink  = $edit_link.' '.$delete_link;   
              }
    
         if($row->status=='Active'){
          $status = '<span class="badge bg-success">Active</span>'; 
        }else{
          $status = '<span class="badge bg-danger">Deactive</span>';
        }
        
      $output .= '
      <tr>
        <td>'.$sr++.'</td>
        <td>'.$row->lable.'</td>
        <td>'.$row->type.'</td> 
        <td>'.$row->name.'</td>
        <td>'.$row->input_id.'</td>
        <td>'.$status.'</td>
        <td>'.$optionLink.'</td>
        
      </tr>
      ';
      }
      
      $output .= '</tbody></table>';
      return $output;    
          }
       
     }
    
    ////////////////Open Payment Gateway //////////////////
     
      public function get_payment_gateway($isFilter,$limit,$start,$filder){
           
           
         $this->db->select("*");
         $this->db->from("payment_gateway");
         $this->db->order_by('id','desc');
         
       
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
         <th>Name</th>
         <th>Daily Limit</th>
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
              $del_url     = base_url().'master/delete_payment_gateway/'.$id;
    		   $edit_url    = base_url().'master/edit_form/payment_gateway_edit/payment_gateway/id/'.$id;
    		   
    		   $getDeleteOption = getDeleteOption();
    		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
               $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
            
            
             {
                $optionLink  = $edit_link;   
              }
               
            
         if($row->status=='Active'){
          $status = '<span class="badge bg-success">Active</span>'; 
        }else{
          $status = '<span class="badge bg-danger">Deactive</span>';
        }
        
      $output .= '
      <tr>
        <td>'.$sr++.'</td>
         <td>'.$row->name.'</td>
        <td>'.$row->daily_limit.'</td> 
        <td>'.$status.'</td>
        <td>'.$optionLink.'</td>
        
      </tr>
      ';
      }
      
      $output .= '</tbody></table>';
      return $output;    
          }
       
     }
     
    ///////////////////////term and codition//////////////////
    
    /////////////////////// End Sub Payment Type //////////////////

    // public function get_terms_condition($isFilter,$limit,$start,$filder){
           
           
    //      $this->db->select("*");
    //      $this->db->from("pages");
    //      $this->db->order_by('id','desc');
         
    //      if(!empty($filder['isDelete'])){
         
    //      $this->db->where('isDelete',$filder['isDelete']);
            
    //      }
    //      else{
    //       $this->db->where('isDelete',0);   
    //      }
         
         
    //      if(!empty($filder['title'])){
    //      $this->db->like('title',$filder['title']);
    //      }
    //      if(!empty($filder['status'])){
    //      $this->db->where('status',$filder['status']);
    //      }
         
        
    //     if($isFilter=='yes'){
    //             $query = $this->db->get();
    //             return $query->num_rows();
    //       }
    //       else{
    //           $this->db->limit($limit,$start);
    //           $query = $this->db->get();
    //           $output   = '';
    //         $output .='
    //     <table class="table table-bordered datatable" id="datatable" style="width:100%;overflow:auto;">
    //   <thead>
    //   <tr>
    //     <th>Sr. No.</th>
    //      <th>Title</th>
    //     <th>Image</th>
    //     <th>Status</th>
    //     <th>Option</th>
       
    //   </tr>
    //   </thead>
    //   <tbody>';
    //   $sr = $start+1;
    //   $result = $query->result();
    //   foreach($result as $row)
    //   {
    //           $id          = $row->id;
    //           $del_url     = base_url().'master/delete_terms_condition/'.$id;
    // 		   $edit_url    = base_url().'master/edit_form/terms_condition_edit/pages/id/'.$id;
    // 		   $getDeleteOption = getDeleteOption();
    // 		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
    //           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
               
    //           if($row->isDelete==1){
    //           $isDeleteUrl      = base_url().'commoncontroller/trash_status/pages/delete/id/'.$id;
    //           $isRetriveUrl     = base_url().'commoncontroller/trash_status/pages/retrive/id/'.$id;
               
    //           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
    //           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
    
    // 		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
    //           }
    //           else{
    //             $optionLink  = $edit_link.' '.$delete_link;   
    //           }
               
               
    
        
    //     $File = $row->image;
    
    //     		if(!empty($File))
    //     		{ 
    //     	        $load_url2 = 'uploads/pages/'.$File;
    //     			if(file_exists($load_url2))
    //     			{
    //     		   $url = base_url().$load_url2;			
    //     			}
    //     			else
    //     			{
    //     			$url = base_url().'uploads/no_file.jpg';		
    //     			}
    //     		}
    //     		else
    //     		{
    //     		$url = base_url().'uploads/no_file.jpg';
    //     		}
    //     		$fileData = "<img src='$url' , style='height:50px; width:auto'>";
        
    //      if($row->status=='Active'){
    //       $status = '<span class="badge bg-success">Active</span>'; 
    //     }else{
    //       $status = '<span class="badge bg-danger">Deactive</span>';
    //     }
        

    //   $output .= '
    //   <tr>
    //     <td>'.$sr++.'</td>
    //      <td>'.$row->title.'</td>
    //      <td>'.$fileData.'</td>
    //     <td>'.$status.'</td>
    //     <td>'.$optionLink.'</td>
        
    //   </tr>
    //   ';
    //   }
      
    //   $output .= '</tbody></table>';
    //   return $output;    
    //       }
       
    //  }
   public function get_bank($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("bank");
     $this->db->order_by('id','desc');
     
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
     <th>Bank Name</th>
     <th>Div Id</th>
     <th>Bank Url</th>
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
          $id          = $row->id;
          $del_url     = base_url().'master/delete_bank/'.$id;
		   $edit_url    = base_url().'master/edit_form/bank_edit/bank/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/bank/delete/id/'.$id;
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/bank/retrive/id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
           

    
    $File = $row->image;

    		if(!empty($File))
    		{ 
    	        $load_url1 = 'uploads/bank/'.$File;
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
    
     if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
    	
	$link = "<a href='$row->bank_url' target='_new()'>click</a>";
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
     <td>'.$row->name.'</td>
      <td>'.$row->div_id.'</td>
       <td>'.$link.'</td>
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
  public function get_testimonials($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("testimonials");
     $this->db->order_by('id','desc');
     
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
     <th>Name</th>
     <th>Title</th>
     <th>Description</th>
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
          $id          = $row->id;
          $del_url     = base_url().'master/delete_testimonials/'.$id;
		   $edit_url    = base_url().'master/edit_form/testimonials_edit/testimonials/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'id='edit_$id'name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/testimonials/delete/id/'.$id;
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/testimonials/retrive/id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
           

    
    $File = $row->image;

    		if(!empty($File))
    		{ 
    	        $load_url1 = 'uploads/testimonials/'.$File;
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
    
     if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
    	

		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
     <td>'.$row->name.'</td>
      <td>'.$row->title.'</td>
        <td>'.$row->description.'</td>
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

    ////////////////////################ Open Refund Request ############///////////////////////
    
    public function get_refund_request($isFilter,$limit,$start,$filder){
           
           
         $this->db->select("*");
         $this->db->from("refund_request");
         $this->db->order_by('id','desc');
           if(!empty($filder['transaction_id'])){
     $this->db->where('transaction_id',$filder['transaction_id']);
     }
      if(!empty($filder['dateOne'])){
     $this->db->where('refund_request.transaction_date>=',$filder['dateOne']);
     }
     if(!empty($filder['dateTwo'])){
     $this->db->where('refund_request.transaction_date<=',$filder['dateTwo']);
     }
         if(!empty($filder['isDelete'])){
         $this->db->where('isDelete',$filder['isDelete']);
         }
         else{
          $this->db->where('isDelete',0);   
         }
            if(!empty($filder['transaction_date'])){
     $this->db->where('refund_request.transaction_date>=',$filder['transaction_date']);
     }
        //  if(!empty($filder['title'])){
        //  $this->db->like('title',$filder['title']);
        //  }
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
        <th>Transaction ID</th>
        <th>Transaction Date</th>
        <th>Amount </th>
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
               $del_url     = base_url().'master/delete_refund_request/'.$id;
    		   $edit_url    = base_url().'master/edit_form/refund_request_edit/refund_request/id/'.$id;
    		   $getDeleteOption = getDeleteOption();
    		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
               $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
               
               if($row->isDelete==1){
               $isDeleteUrl      = base_url().'commoncontroller/trash_status/refund_request/delete/id/'.$id;
               $isRetriveUrl     = base_url().'commoncontroller/trash_status/refund_request/retrive/id/'.$id;
               
               $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
               $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
    
    		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
               }
               else{
                $optionLink  = $edit_link.' '.$delete_link;   
               }
               
        if($row->status=='Pending'){
           $status = '<span class="badge bg-warning">Pending</span>';
        }
        elseif($row->status=='In Progress'){
        $status = '<span class="badge bg-primary">In Progress</span>';
        }elseif($row->status=='Completed'){
        $status = '<span class="badge bg-success">Completed</span>';
        }
        else{
           $status = '<span class="badge bg-danger">Cancelled</span>';
        }
    		   
       $output .= '
       <tr>
       <td>'.$sr++.'</td>
        <td>'.$row->transaction_id.'</td>
       <td>'.getDateFormat($row->transaction_date).'</td>
        <td>'.$row->amount.'</td>
        <td>'. $status.'</td>
        <td>'.$optionLink.'</td>
       </tr>
       ';
      }
      
      $output .= '</tbody></table>';
      return $output;    
           }
       
     }
    
    ///////////////////################# End Refund Request  ##############/////////////////////
    
    ////////////////////################ Open Refund Request ############///////////////////////

public function get_merchant_payment($isFilter,$limit,$start,$filder){
       
     $this->db->select("*");
     $this->db->from("merchant_payment");
     $this->db->order_by('id','desc');
     
     if(!empty($filder['isDelete'])){
     $this->db->where('isDelete',$filder['isDelete']);
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     if(!empty($filder['merchant_id'])){
     $this->db->like('merchant_id',$filder['merchant_id']);
     }
    //  if(!empty($filder['status'])){
    //  $this->db->where('status',$filder['status']);
    //  }
    if(!empty($filder['transaction_id'])){
     $this->db->where('transaction_id',$filder['transaction_id']);
     }
      if(!empty($filder['dateOne'])){
     $this->db->where('merchant_payment.transaction_date>=',$filder['dateOne']);
     }
     if(!empty($filder['dateTwo'])){
     $this->db->where('merchant_payment.transaction_date<=',$filder['dateTwo']);
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
    <th>Merchant</th>
    <th>Transaction ID</th>
    <th>Transaction Date</th>
    <th>Amount</th>
     <th>Currency</th>
     <th>Currency Rate</th>
    <th>Option</th>
   </tr>
   </thead>
   <tbody>';
   $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
           $id          = $row->id;
           $del_url     = base_url().'master/delete_merchant_payment/'.$id;
		   $edit_url    = base_url().'master/edit_form/merchant_paymentt_edit/merchant_payment/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/merchant_payment/delete/id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/merchant_payment/retrive/id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
 $merchantName = $this->Common->merchantName($row->merchant_id);           
    // if($row->status=='Pending'){
    //   $status = '<span class="badge bg-warning">Pending</span>';
    // }
    // elseif($row->status=='In Progress'){
    // $status = '<span class="badge bg-primary">In Progress</span>';
    // }elseif($row->status=='Completed'){
    // $status = '<span class="badge bg-success">Completed</span>';
    // }
    // else{
    //   $status = '<span class="badge bg-danger">Cancelled</span>';
    // }
		   
   $output .= '
   <tr>
   <td>'.$sr++.'</td>
    <td>'.$merchantName.'</td>
    <td>'.$row->transaction_id.'</td>
    <td>'.getDateFormat($row->transaction_date).'</td>
     <td>'.$row->amount.'</td>
     <td>'.$this->Common->get_col_by_key('currency','id',$row->currency_id,'currency_name').'</td>
     <td>'.$row->currency_rate.'</td>
    <td>'.$optionLink.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }

///////////////////################# End Refund Request  ##############/////////////////////
        
        ////////////////////################ Open Merchant Wallet ##############///////////////get_user_contact
        
        public function get_merchant_wallet($isFilter,$limit,$start,$filder){
       
     $this->db->select("*");
     $this->db->from("merchant_wallet");
     $this->db->order_by('id','desc');
     
     if(!empty($filder['isDelete'])){
     $this->db->where('isDelete',$filder['isDelete']);
     }
     else{
      $this->db->where('isDelete',0);   
     }
     
     if(!empty($filder['merchant_id'])){
     $this->db->like('merchant_id',$filder['merchant_id']);
     }
    //  if(!empty($filder['status'])){
    //  $this->db->where('status',$filder['status']);
    //  }
    // if(!empty($filder['transaction_id'])){
    //  $this->db->where('transaction_id',$filder['transaction_id']);
    //  }
      if(!empty($filder['dateOne'])){
     $this->db->where('merchant_wallet.date>=',$filder['dateOne']);
     }
     if(!empty($filder['dateTwo'])){
     $this->db->where('merchant_wallet.date<=',$filder['dateTwo']);
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
    <th>Merchant</th>
    <th>Date</th>
    <th>Amount</th>
    <th>Option</th>
  </tr>
  </thead>
  <tbody>';
  $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
          $id          = $row->id;
          $del_url     = base_url().'master/delete_merchant_wallet/'.$id;
		   $edit_url    = base_url().'master/edit_form/merchant_wallet_edit/merchant_wallet/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/merchant_wallet/delete/id/'.$id;
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/merchant_wallet/retrive/id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
 $merchantName = $this->Common->merchantName($row->merchant_id);           
    // if($row->status=='Pending'){
    //   $status = '<span class="badge bg-warning">Pending</span>';
    // }
    // elseif($row->status=='In Progress'){
    // $status = '<span class="badge bg-primary">In Progress</span>';
    // }elseif($row->status=='Completed'){
    // $status = '<span class="badge bg-success">Completed</span>';
    // }
    // else{
    //   $status = '<span class="badge bg-danger">Cancelled</span>';
    // }
		   
  $output .= '
  <tr>
  <td>'.$sr++.'</td>
    <td>'.$merchantName.'</td>
    <td>'.getDateFormat($row->date).'</td>
     <td>'.$row->amount.'</td>
    <td>'.$optionLink.'</td>
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }
        
        ///////////////////################# End Merchant Wallet ###############//////////////
	////////////########### Open Orders ############////////////////////
	
	public function get_orders($isFilter,$limit,$start,$filder){
	
	$user_type = getUser('user_type');  
     $user_id = getUser('users_id');
     
    $this->db->select('orders.payment_method,order_items.id,order_items.paid_amount,order_items.date_added,order_items.users_id,order_items.product_name,order_items.orderNo,order_items.quantity,order_items.price,order_items.finalAmount,order_items.seller_id,order_items.order_status');
    $this->db->from("order_items");
	$this->db->where('order_items.order_status',5);
	$this->db->where('order_items.dispatch_user_id',0);
	 $this->db->join('orders','order_items.order_id = orders.id');
     $this->db->order_by('id','desc');
     if($user_type == 'seller'){
        $this->db->where('seller_id',$user_id);
    }
    if(!empty($filder['users_id'])){
     $this->db->where('order_items.users_id',$filder['users_id']);
     }
	 if(!empty($filder['seller_id'])){
     $this->db->where('order_items.seller_id',$filder['seller_id']);
     }
	 if(!empty($filder['is_credited'])){
		 if($filder['is_credited']=='paid'){
			 $this->db->where('order_items.is_credited',1);
		 }else{
			 $this->db->where('order_items.is_credited',0);
		 }
     }
     if(!empty($filder['dateOne'])){
     $this->db->where('CAST(order_items.date_added AS DATE)>=',$filder['dateOne']);
     }
     if(!empty($filder['dateTwo'])){
     $this->db->where('CAST(order_items.date_added AS DATE)<=',$filder['dateTwo']);
     }
     if(!empty($filder['status'])){
     $this->db->where('order_items.order_status',$filder['status']);
     }
     if(!empty($filder['product_name'])){
     $this->db->like('order_items.product_name',$filder['product_name']);
     $this->db->or_like('order_items.orderNo',$filder['product_name']);
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
     <th>Customer</th>
	 <th>Seller</th>
     <th>Product Name</th>
     <th>Order No</th>
     <th>Quantity</th>
     <th>Price</th>
     <th>Sub Total</th>
	 <th>Paid Amount</th>
	 <th>Order Date</th>
	 <th>Payment Mode</th>
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
     $order_item_id   = $id;
     $del_url     = base_url().'master/delete_orders/'.$id;
	 $edit_url    = base_url().'master/edit_form/my_orders_edit/order_items/id/'.$id;
	 $getDeleteOption = getDeleteOption();
	 $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
     $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
    
    
    $status = $this->Common->fetchOrderStatus($id);
    
    $customerName = $this->Common->get_col_by_key('users','users_id',$row->users_id,'name');
	$sellerName = $this->Common->get_col_by_key('users','users_id',$row->seller_id,'name');
	$businessName = $this->Common->get_col_by_key('users','users_id',$row->seller_id,'businessName');
	if(!empty($businessName)){
		$sName = $businessName;
	}else{
		$sName = $sellerName;
	}
	
	$orderDetailsUrl = base_url().'transaction/order_details/'.$id.'/'.$row->orderNo;
	$orderDetails = '<a href="'.$orderDetailsUrl.'">'.$row->orderNo.'</a>';
	$subTotal= $row->quantity*$row->price;
     $output .= '
     <tr>
     <td>'.$sr++.'</td>
     <td>'.$customerName.'</td>
     <td>'.$sName.'</td>
     <td>'.$row->product_name.'</td>
     <td>'.$orderDetails.'</td>
     <td>'.$row->quantity.'</td>
     <td>'.$row->price.'</td>
     <td>'.$subTotal.'</td>
	 <td>'.$row->paid_amount.'</td>
	 <td>'.getDateTimeFormat($row->date_added).'</td>
	 <td>'.$row->payment_method.'</td>
     <td>'.$status.'</td>
     <td>'.$edit_link.'</td>
     </tr>
     ';
     }
  
     $output .= '</tbody></table>';
     return $output;    
     }
   

	}

	///////////########### End Orders #############////////////////////
	
	////////////########### Open Orders ############////////////////////
	
	public function get_my_orders($isFilter,$limit,$start,$filder){
	
	$user_type = getUser('user_type');  
     $user_id = getUser('users_id');
     
    $this->db->select('orders.payment_method,order_items.id,order_items.paid_amount,order_items.date_added,order_items.users_id,order_items.product_name,order_items.orderNo,order_items.quantity,order_items.price,order_items.finalAmount,order_items.seller_id,order_items.order_status');
    $this->db->from("order_items");
	$this->db->where('order_items.order_status>5');
	$this->db->where('order_items.dispatch_user_id',$user_id);
	 $this->db->join('orders','order_items.order_id = orders.id');
     $this->db->order_by('id','desc');
     if($user_type == 'seller'){
        $this->db->where('seller_id',$user_id);
    }
    if(!empty($filder['users_id'])){
     $this->db->where('order_items.users_id',$filder['users_id']);
     }
	 if(!empty($filder['seller_id'])){
     $this->db->where('order_items.seller_id',$filder['seller_id']);
     }
	 if(!empty($filder['is_credited'])){
		 if($filder['is_credited']=='paid'){
			 $this->db->where('order_items.is_credited',1);
		 }else{
			 $this->db->where('order_items.is_credited',0);
		 }
     }
     if(!empty($filder['dateOne'])){
     $this->db->where('CAST(order_items.date_added AS DATE)>=',$filder['dateOne']);
     }
     if(!empty($filder['dateTwo'])){
     $this->db->where('CAST(order_items.date_added AS DATE)<=',$filder['dateTwo']);
     }
     if(!empty($filder['status'])){
     $this->db->where('order_items.order_status',$filder['status']);
     }
     if(!empty($filder['product_name'])){
     $this->db->like('order_items.product_name',$filder['product_name']);
     $this->db->or_like('order_items.orderNo',$filder['product_name']);
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
     <th>Customer</th>
	 <th>Seller</th>
     <th>Product Name</th>
     <th>Order No</th>
     <th>Quantity</th>
     <th>Price</th>
     <th>Sub Total</th>
	 <th>Paid Amount</th>
	 <th>Order Date</th>
	 <th>Payment Mode</th>
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
     $order_item_id   = $id;
     $del_url     = base_url().'master/delete_orders/'.$id;
	 	 $edit_url    = base_url().'master/edit_form_status/my_orders_edit/order_status/order_item_id/'.$order_item_id;
	 $getDeleteOption = getDeleteOption();
	 $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
     $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
    
    
    $status = $this->Common->fetchOrderStatus($id);
    
    $customerName = $this->Common->get_col_by_key('users','users_id',$row->users_id,'name');
	$sellerName = $this->Common->get_col_by_key('users','users_id',$row->seller_id,'name');
	$businessName = $this->Common->get_col_by_key('users','users_id',$row->seller_id,'businessName');
	if(!empty($businessName)){
		$sName = $businessName;
	}else{
		$sName = $sellerName;
	}
	
	$orderDetailsUrl = base_url().'transaction/order_details/'.$id.'/'.$row->orderNo;
	$orderDetails = '<a href="'.$orderDetailsUrl.'">'.$row->orderNo.'</a>';
	$subTotal= $row->quantity*$row->price;
     $output .= '
     <tr>
     <td>'.$sr++.'</td>
     <td>'.$customerName.'</td>
     <td>'.$sName.'</td>
     <td>'.$row->product_name.'</td>
     <td>'.$orderDetails.'</td>
     <td>'.$row->quantity.'</td>
     <td>'.$row->price.'</td>
     <td>'.$subTotal.'</td>
	 <td>'.$row->paid_amount.'</td>
	 <td>'.getDateTimeFormat($row->date_added).'</td>
	 <td>'.$row->payment_method.'</td>
     <td>'.$status.'</td>
     <td>'.$edit_link.'</td>
     </tr>
     ';
     }
  
     $output .= '</tbody></table>';
     return $output;    
     }
   

	}

	///////////########### End Orders #############////////////////////
    
   ////////////////////################ Open Merchant Wallet ##############///////////////
        
    public function get_user_contact($isFilter,$limit,$start,$filder){
       
     $this->db->select("*");
     $this->db->from("contact");
     $this->db->order_by('id','desc');
     
     
     if(!empty($filder['name'])){
     $this->db->like('name',$filder['name']);
     }
     if(!empty($filder['phone'])){
     $this->db->where('phone',$filder['phone']);
     }
    if(!empty($filder['email'])){
     $this->db->where('email',$filder['email']);
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
    <th>Name</th>
    <th>Mobile</th>
    <th>Email</th>
    <th>Message</th>
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
          $del_url     = base_url().'master/delete_user_contact/'.$id;
		   $edit_url    = base_url().'master/edit_form/user_contact_edit/contact/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
          {
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
    if($row->status=='Pending'){
      $status = '<span class="badge bg-warning">Pending</span>';
    }
    elseif($row->status=='Completed'){
    $status = '<span class="badge bg-success">Completed</span>';
    }
    else{
      $status = '<span class="badge bg-danger">Cancelled</span>';
    }
		   
  $output .= '
  <tr>
  <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    <td>'.$row->phone.'</td>
    <td>'.$row->email.'</td>
    <td>'.$row->message.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }
        
        ///////////////////################# End Merchant Wallet ###############//////////////
    	//////////###### User Availability #######//////////////
	 public function get_user_availability($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("user_availability");

     
     
     if(!empty($filder['users_id'])){
     $this->db->like('users_id',$filder['users_id']);
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
    <th>Day</th>
    <th>From Time</th>
    <th>To Time</th>
    <th>Option</th>
  </tr>
  </thead>
  <tbody>';
  $sr = $start+1;
  $result = $query->result();
  foreach($result as $row)
  {
          $id          = $row->id;
          $del_url     = base_url().'master/delete_user_availability/'.$id;
		   $edit_url    = base_url().'master/edit_form/user_availability_edit/user_availability/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
        
            $optionLink  = $edit_link.' '.$delete_link;   
          
           
           $userName = $this->Common->get_col_by_key('users','users_id',$row->users_id,'name');

    
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
    <td>'.$userName.'</td>
    <td>'.$row->day.'</td>
    <td>'.date('h:i:s A', strtotime($row->from_time)).'</td>
    <td>'.date('h:i:m A', strtotime($row->to_time)).'</td>
    <td>'.$optionLink.'</td>
    
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
   
 }
 
    ///////////######### User Availability #########/////////////////
 public function get_leave_management($isFilter,$limit,$start,$filder){
       $userType = getUser('user_type');
     $this->db->select("*");
     $this->db->from("leave_management");
     
     if(!empty($filder['users_id'])){
     $this->db->like('users_id',$filder['users_id']);
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
    <th>Date</th>
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
    $del_url     = base_url().'master/delete_leave_management/'.$id;
    $edit_url    = base_url().'master/edit_form/leave_management_edit/leave_management/id/'.$id;
    $getDeleteOption = getDeleteOption();
    $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
    if($userType=='superadmin'){
        $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
    }else{
        $edit_link = '';
    }
    $optionLink  = $edit_link.' '.$delete_link;   
    $userName = $this->Common->get_col_by_key('users','users_id',$row->users_id,'name');
    
    if($row->status=='Pending'){
        $status = '<span class="badge bg-warning">Pending</span>';
    }elseif($row->status=='Approved'){
        $status = '<span class="badge bg-success">Approved</span>';
    }else{
        $status = '<span class="badge bg-danger">Rejected</span>';
    }
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
    <td>'.$userName.'</td>
    <td>'.getDateFormat($row->date).'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
  </tr>
  ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
      }
 }
 
 ///////////////############### Open Gallery Category ###########/////////////
    public function get_gallery_category($isFilter,$limit,$start,$filder){
     
     $this->db->select("*");
     $this->db->from("gallery_category");
     $this->db->order_by('id','desc');
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
    <th>Name</th>
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
           $del_url     = base_url().'master/delete_gallery_category/'.$id;
		   $edit_url    = base_url().'master/edit_form/gallery_category_edit/gallery_category/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/gallery_category/delete/id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/gallery_category/retrive/id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
           
                 
           
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>';
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
		   
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->name.'</td>
    <td>'.$status.'</td>
    <td>'.$optionLink.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;    
       }
   
 }
    ////////////////############### End Gallery Category ###########/////////////
    
    ///////////////############### Open Gallery Category ###########/////////////
    public function get_gallery($isFilter,$limit,$start,$filder){
     
     $this->db->select("*");
     $this->db->from("gallery");
     $this->db->order_by('id','desc');
     if(!empty($filder['isDelete'])){
     $this->db->where('isDelete',$filder['isDelete']);
     }
     else{
      $this->db->where('isDelete',0);   
     }
     if(!empty($filder['name'])){
     $this->db->where('category',$filder['name']);
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
    <th>Category</th>
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
           $id          = $row->id;
           $del_url     = base_url().'master/delete_gallery/'.$id;
		   $edit_url    = base_url().'master/edit_form/gallery_edit/gallery/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           if($row->isDelete==1){
           $isDeleteUrl      = base_url().'commoncontroller/trash_status/gallery/delete/id/'.$id;
           $isRetriveUrl     = base_url().'commoncontroller/trash_status/gallery/retrive/id/'.$id;
           
           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
           }
           else{
            $optionLink  = $edit_link.' '.$delete_link;   
           }
           
           
        $categoryName = $this->Common->get_col_by_key('gallery_category','id',$row->category,'name');         
           
    if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>';
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
	
	$File = $row->image;

	if(!empty($File))
	{ 
        $load_url = 'uploads/gallery/'.$File;
		if(file_exists($load_url))
		{
	   $url = base_url().$load_url;			
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
	$fileData = "<a href='$url' target='_blank'><img src='$url' , style='height:50px; width:auto'></a>";
	
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$categoryName.'</td>
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
    ////////////////############### End Gallery ###########/////////////
 
 
 public function get_course_category($isFilter,$limit,$start,$filder){
       
       
     $this->db->select("*");
     $this->db->from("course_category");
     $this->db->order_by('id','desc');
     
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
     <th>Course Category Name</th>
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
          $id          = $row->id;
          $del_url     = base_url().'master/delete_course_category/'.$id;
		   $edit_url    = base_url().'master/edit_form/course_category_edit/course_category/id/'.$id;
		   $getDeleteOption = getDeleteOption();
		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
          if($row->isDelete==1){
          $isDeleteUrl      = base_url().'commoncontroller/trash_status/course_category/delete/id/'.$id;
          $isRetriveUrl     = base_url().'commoncontroller/trash_status/course_category/retrive/id/'.$id;
           
          $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
          $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
          }
          else{
            $optionLink  = $edit_link.' '.$delete_link;   
          }
           
           

    
    $File = $row->image;

    		if(!empty($File))
    		{ 
    	        $load_url1 = 'uploads/course_category/'.$File;
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
    
     if($row->status=='Active'){
       $status = '<span class="badge bg-success">Active</span>'; 
    }else{
       $status = '<span class="badge bg-danger">Deactive</span>';
    }
    
		   
  $output .= '
  <tr>
    <td>'.$sr++.'</td>
     <td>'.$row->name.'</td>
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
 
 ///////////########## Study Material ###########//////////////
 
 public function get_study_material($isFilter,$limit,$start,$filder,$id){
           
           
         $this->db->select("*");
         $this->db->from("study_material");
         $this->db->order_by('id','desc');
         $this->db->where('course_id',$id);
           
           
         if(!empty($filder['isDelete'])){
         
         $this->db->where('isDelete',$filder['isDelete']);
            
         }
         else{
          $this->db->where('isDelete',0);   
         }
         
         if(!empty($filder['title'])){
         $this->db->like('title',$filder['title']);
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
        <th>Title</th>
        <th>Course</th>
        <th>Type</th>
        <th>File</th>
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
              $del_url     = base_url().'master/delete_study_material/'.$id;
    		   $edit_url    = base_url().'master/edit_form/study_material_edit/study_material/id/'.$id;
    		  // $session_url  = base_url().'master/edit_course_session/get_course_session/course/id/'.$id;
    		   $getDeleteOption = getDeleteOption();
    		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
              $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
            //  $session_link   = "<a href='javascript:void(0)' onclick='session_data(this.id);'  id='session_$id'  name='$session_url' class='session_edits'>View</a>";
              
              if($row->isDelete==1){
              $isDeleteUrl      = base_url().'commoncontroller/trash_status/study_material/delete/id/'.$id;
              $isRetriveUrl     = base_url().'commoncontroller/trash_status/study_material/retrive/id/'.$id;
               
              $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
              $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
    
    		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
              }
              else{
                $optionLink  = $edit_link.' '.$delete_link;   
              }
               
        $File = $row->image;
    
        		if(!empty($File))
        		{ 
        	        $load_url2 = 'uploads/study_material/'.$File;
        			if(file_exists($load_url2))
        			{
        		   $url = base_url().$load_url2;			
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
        		
        		//$fileData = "<img src='$url' , style='height:80px; width:100px;'>";
        		$fileData = "<a href='$url' target='_new'><img  style='height:50px; width:auto'>Click Here</a>";
    		// $videoUrl ='';// $row->video;
   	         //$video = "<a href='$videoUrl' target='_blank'>Link</a>";
        
         if($row->status=='Active'){
          $status = '<span class="badge bg-success">Active</span>'; 
        }else{
          $status = '<span class="badge bg-danger">Deactive</span>';
        }
         
        $sessionname = $this->Common->get_col_by_key('course_session','id',$row->course_id,'course_session');
    		   
      $output .= '
      <tr>
        <td>'.$sr++.'</td>
        <td>'.$row->title.'</td>
        <td>'.$sessionname.'</td>
        <td>'.$row->type.'</td>
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
 
 ///////////########## Study Material ###########//////////////
 
 
  public function get_course($isFilter,$limit,$start,$filder){
           
           
         $this->db->select("*");
         $this->db->from("course");
         $this->db->order_by('id','desc');
        //   $this->db->where('id',$id);
         if(!empty($filder['isDelete'])){
         
         $this->db->where('isDelete',$filder['isDelete']);
            
         }
         else{
          $this->db->where('isDelete',0);   
         }
         
         
         if(!empty($filder['title'])){
         $this->db->like('title',$filder['title']);
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
         <th>Title</th>
         <th>Category</th>
         <th>Course Fee Offline</th>
         <th>Course Fee Online</th>
         <th>Learn in Personalized Sessions</th>
         <th>Discount</th>
         <th>Duration (In Days)</th>
         <th>Number Of Session</th>
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
              $id          = $row->id;
              $del_url     = base_url().'master/delete_course/'.$id;
    		   $edit_url    = base_url().'master/edit_form/course_edit/course/id/'.$id;
    		  // $session_url  = base_url().'master/edit_course_session/get_course_session/course/id/'.$id;
    		   $getDeleteOption = getDeleteOption();
    		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
              $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
            //  $session_link   = "<a href='javascript:void(0)' onclick='session_data(this.id);'  id='session_$id'  name='$session_url' class='session_edits'>View</a>";
              
              
              if($row->isDelete==1){
              $isDeleteUrl      = base_url().'commoncontroller/trash_status/course/delete/id/'.$id;
              $isRetriveUrl     = base_url().'commoncontroller/trash_status/course/retrive/id/'.$id;
               
              $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
              $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
    
    		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
              }
              else{
                $optionLink  = $edit_link.' '.$delete_link;   
              }
               
               
    
        
        $File = $row->image;
    
        		if(!empty($File))
        		{ 
        	        $load_url2 = 'uploads/course/'.$File;
        			if(file_exists($load_url2))
        			{
        		   $url = base_url().$load_url2;			
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
        		$fileData = "<img src='$url' , style='height:80px; width:100px;'>";
        
         if($row->status=='Active'){
          $status = '<span class="badge bg-success">Active</span>'; 
        }else{
          $status = '<span class="badge bg-danger">Deactive</span>';
        }
         
   	$numberofsessionurl = base_url().'master/course_session/'.$id.'';
	$numberofsession = '<a href="'.$numberofsessionurl.'">'.$row->number_of_session.'</a>';

    
        $categoryname = $this->Common->get_col_by_key('course_category','id',$row->course_category_id,'name');
    		   
      $output .= '
      <tr>
        <td>'.$sr++.'</td>
        <td>'.$row->title.'</td>
        <td>'.$categoryname.'</td>
        <td>'.$row->course_fee.'</td>
        <td>'.$row->course_fee_online.'</td>
        <td>'.$row->personal_price.'</td>
        <td>'.$row->discount.'</td>
        <td>'.$row->duration.'</td>
        <td>'.$numberofsession.'</td>
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
 
 
 
 
//  public function get_model_course_session($isFilter='',$limit='',$start='',$filder=''){
//      $users_id = getUser('users_id');  
//      $userType = getUser('user_type');
//      $this->db->select("*");
//      $this->db->from("course_session");
//      $this->db->order_by('id','desc');

    
//      if(!empty($filder['course_id'])){
//      $this->db->where('course_id',$filder['course_id']);
//      }
      
//      if(!empty($filder['status'])){
//      $this->db->where('status',$filder['status']);
//      }
    

//     if($isFilter=='yes'){
//             $query = $this->db->get();
//             return $query->num_rows();
//       }
//       else{
//           $this->db->limit($limit,$start);
//           $query = $this->db->get();
//           $output   = '';
//           $action = base_url().'master/bulk_status_upload/update';
//         $output .='
//     <form id="statusFormEdit" action="'.$action.'" method="POST" class="row g-3" enctype="multipart/form-data">
//     <table class="table table-bordered datatablel_model" id="datatable_model" style="width:100%;overflow:auto;">
//   <thead>
//   <tr>
//     <th>Sr. No.</th>
//      <th>Course Name </th>
//     <th>Course Session </th>
//     <th>Session Duration</th>
//     <th>Status</th>
   
//   </tr>
//   </thead>
//   <tbody>
// ';
//   $sr = $start+1;
//   $result = $query->result();
//   foreach($result as $row)
//   {
//           $id          = $row->id;
           
//           $pKey          = $row->course_session_key;
//           $del_url     = base_url().'master/delete_course_session/'.$id;
// 		   $edit_url    = base_url().'master/edit_form/model_course_session/course_session/id/'.$id;
// 		   $getDeleteOption = getDeleteOption();
// 		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
//           $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
           
           
           
//           if($row->isDelete==1){
//           $isDeleteUrl      = base_url().'commoncontroller/trash_status/course_session/delete/id/'.$id;
//           $isRetriveUrl     = base_url().'commoncontroller/trash_status/course_session/retrive/id/'.$id;
           
//           $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
//           $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

// 		   $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
//           }
//           else{
//             $optionLink  = $edit_link.' '.$delete_link;   
//           }
           
          
//             $courseName = $this->Common->get_col_by_key('course','id',$row->id,'title');
                 
           
//           if($row->status=='Active'){
//       $status = '<span class="badge bg-success">Active</span>';
//       $allStatus = 'checked';
//     }else{
//       $status = '<span class="badge bg-danger">Deactive</span>';
//       $allStatus = '';
//     }
    
 
   
		   
//   $output .= '
//   <tr>
   
//     <td>'.$sr++.'</td>
//     <td>'.$courseName.'</td>
//      <td>'.getDateTimeFormat($row->course_session).'</td>

//      <td>'.$row->session_duration.'</td>
//     <td>'.$status.'</td>
//   </tr>
//   ';
//   }
  
//   $output .=  '

//  </tbody></table>
  
//   <script>
//     $("#statusFormEdit").on("submit",(function(e) 
//   {
// $(".loading").show();
// var post_link = $(this).attr("action");
// e.preventDefault();
// $.ajax({
// 	url: post_link,
// 	type: "POST",
// 	data:  new FormData(this),
// 	contentType: false,
// 	cache: false,
// 	processData:false,
// 	success: function(response){
//       var json = $.parseJSON(response);
// 	  if(json.status==1)
//             {
 
//      $(".loading").hide();
//      toastr.success(json.msg);
//      var page_no = $("#pageNumber").html();  
//      loadTableData(page_no);
//      $("#ExtralargeEditModal").modal("hide");
//             }
//             else
//             {
              
//             $(".loading").hide();
//             toastr.error(json.msg);
//           }
	  
// 	},
// 	error: function(){} 	        
// });
// }));

 
//  </script>
//  ';


//   return $output;    
//       }
   
//  }
 
 public function get_material($isFilter,$limit,$start,$filder){
       
       
       $this->db->select("*");
       $this->db->from("material");
       $this->db->order_by('title','asc');
       if(!empty($filder['isDelete'])){
       
       $this->db->where('isDelete',$filder['isDelete']);
          
       }
       else{
        $this->db->where('isDelete',0);   
       }
       
       
       if(!empty($filder['title'])){
       $this->db->like('title',$filder['title']);
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
      <th>Photo</th>
      <th>Title</th>
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
             $del_url     = base_url().'master/delete_material/'.$id;
             $edit_url    = base_url().'master/edit_form/material_edit/material/id/'.$id;
             $getDeleteOption = getDeleteOption();
             $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
             $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
             
             if($row->isDelete==1){
             $isDeleteUrl      = base_url().'commoncontroller/trash_status/material/delete/id/'.$id;
             $isRetriveUrl     = base_url().'commoncontroller/trash_status/material/retrive/id/'.$id;
             
             $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
             $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
  
             $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
             }
             else{
              $optionLink  = $edit_link.' '.$delete_link;   
             }
             
         
      if($row->status=='Active'){
         $status = '<span class="badge bg-success">Active</span>'; 
      }else{
         $status = '<span class="badge bg-danger">Deactive</span>';
      }
             
             $File = $row->img;
  
              if(!empty($File))
              { 
                  $load_url = 'uploads/material/'.$File;
                  if(file_exists($load_url))
                  {
                 $url = base_url().$load_url;			
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
             
             
     $output .= '
     <tr>
      <td>'.$sr++.'</td>
      <td>'.$fileData.'</td>
      <td>'.$row->title.'</td>
      <td>'.$status.'</td>
      <td>'.$optionLink.'</td>
      
     </tr>
     ';
    }
    
    $output .= '</tbody></table>';
    return $output;    
         }
     
   }
 
 
 public function get_tax($isFilter,$limit,$start,$filder){
       
       
       $this->db->select("*");
       $this->db->from("tax");
       $this->db->order_by('id','desc');
       
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
       <th>Tax Name</th>
      <th>Tax Value</th>
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
            $del_url     = base_url().'master/delete_tax/'.$id;
             $edit_url    = base_url().'master/edit_form/tax_edit/tax/id/'.$id;
             $getDeleteOption = getDeleteOption();
             $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
             
            if($row->isDelete==1){
            $isDeleteUrl      = base_url().'commoncontroller/trash_status/tax/delete/id/'.$id;
            $isRetriveUrl     = base_url().'commoncontroller/trash_status/tax/retrive/id/'.$id;
             
            $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
  
             $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
            }
            else{
              $optionLink  = $edit_link.' '.$delete_link;   
            }
             
             
  
      
     
       if($row->status=='Active'){
         $status = '<span class="badge bg-success">Active</span>'; 
      }else{
         $status = '<span class="badge bg-danger">Deactive</span>';
      }
      
             
    $output .= '
    <tr>
      <td>'.$sr++.'</td>
       <td>'.$row->name.'</td>
      <td>'.$row->tax.'</td>
      <td>'.$status.'</td>
      <td>'.$optionLink.'</td>
      
    </tr>
    ';
    }
    
    $output .= '</tbody></table>';
    return $output;    
        }
     
   }
   
   
   
   
   
 public function get_course_session($isFilter,$limit,$start,$filder,$id){
       
       
       $this->db->select("*");
       $this->db->from("course_session");
       $this->db->order_by('id','desc');
        
      $this->db->where('course_id',$id);
            
         
       if(!empty($filder['isDelete'])){
       
       $this->db->where('isDelete',$filder['isDelete']);
          
       }
       else{
        $this->db->where('isDelete',0);   
       }
       
       
       if(!empty($filder['course_session'])){
       $this->db->like('course_session',$filder['course_session']);
    //   $this->db->like('course_session',$filder['course_id']);
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
       <th>Course Name</th>
      <th> Session Title</th>
      <th>Session Duration (In Min.)</th>
      <th> Study Material</th>
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
            $del_url     = base_url().'master/delete_course_session/'.$id;
         $edit_url    = base_url().'master/edit_form/course_session_edit/course_session/id/'.$id;
         $getDeleteOption = getDeleteOption();
         $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
             
            if($row->isDelete==1){
            $isDeleteUrl      = base_url().'commoncontroller/trash_status/course_session/delete/id/'.$id;
            $isRetriveUrl     = base_url().'commoncontroller/trash_status/course_session/retrive/id/'.$id;
             
            $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
  
         $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
            }
            else{
              $optionLink  = $edit_link.' '.$delete_link;   
            }
             
	$study_materialurl = base_url().'master/study_material/'.$id.'';
	$study_material = '<a href="'.$study_materialurl.'">Click Here</a>';
	
   $coursenames = $this->Common->get_col_by_key('course','id',$row->course_id,'title');
      
     
       if($row->status=='Active'){
         $status = '<span class="badge bg-success">Active</span>'; 
      }else{
         $status = '<span class="badge bg-danger">Deactive</span>';
      }
      
         
    $output .= '
    <tr>
      <td>'.$sr++.'</td>
       <td>'.$coursenames.'</td>
       <td>'.$row->course_session.'</td>
       <td>'.$row->session_duration.'</td>
        <td>'.$study_material.'</td>
      <td>'.$status.'</td>
      <td>'.$optionLink.'</td>
      
    </tr>
    ';
    }
    
    $output .= '</tbody></table>';
    return $output;    
        }
     
   }  
   
 public function get_business_category($isFilter,$limit,$start,$filder){
       
       
       $this->db->select("*");
       $this->db->from("business_category");
       $this->db->order_by('id','desc');
       
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
       <th>Business Category Name</th>
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
            $id          = $row->id;
            $del_url     = base_url().'master/delete_business_category/'.$id;
         $edit_url    = base_url().'master/edit_form/business_category_edit/business_category/id/'.$id;
         $getDeleteOption = getDeleteOption();
         $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
             
            if($row->isDelete==1){
            $isDeleteUrl      = base_url().'commoncontroller/trash_status/business_category/delete/id/'.$id;
            $isRetriveUrl     = base_url().'commoncontroller/trash_status/business_category/retrive/id/'.$id;
             
            $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
  
         $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
            }
            else{
              $optionLink  = $edit_link.' '.$delete_link;   
            }
             
             
  
      
      $File = $row->image;
  
          if(!empty($File))
          { 
                $load_url1 = 'uploads/business_category/'.$File;
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
      
       if($row->status=='Active'){
         $status = '<span class="badge bg-success">Active</span>'; 
      }else{
         $status = '<span class="badge bg-danger">Deactive</span>';
      }
      
         
    $output .= '
    <tr>
      <td>'.$sr++.'</td>
       <td>'.$row->name.'</td>
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
   
   
   
   
   public function get_business_sub_category($isFilter,$limit,$start,$filder){
           
           
           $this->db->select("*");
           $this->db->from("business_sub_category");
           $this->db->order_by('sub_category_id','desc');
           
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
           <th>Name</th>
           <th>Business Category Name</th>
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
                $id          = $row->sub_category_id;
                $del_url     = base_url().'master/delete_business_sub_category/'.$id;
             $edit_url    = base_url().'master/edit_form/business_sub_category_edit/business_sub_category/sub_category_id/'.$id;
             $getDeleteOption = getDeleteOption();
             $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
                $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
                 
                if($row->isDelete==1){
                $isDeleteUrl      = base_url().'commoncontroller/trash_status/business_sub_category/delete/sub_category_id/'.$id;
                $isRetriveUrl     = base_url().'commoncontroller/trash_status/business_sub_category/retrive/sub_category_id/'.$id;
                 
                $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
                $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
      
             $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
                }
                else{
                  $optionLink  = $edit_link.' '.$delete_link;   
                }
                 
                 
      
          
          $File = $row->image;
      
              if(!empty($File))
              { 
                    $load_url2 = 'uploads/business_sub_category/'.$File;
                if(file_exists($load_url2))
                {
                 $url = base_url().$load_url2;			
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
          
           if($row->status=='Active'){
            $status = '<span class="badge bg-success">Active</span>'; 
          }else{
            $status = '<span class="badge bg-danger">Deactive</span>';
          }
          
           $businesscategoryname = $this->Common->get_col_by_key('business_category','id',$row->business_category_id,'name');
             
        $output .= '
        <tr>
          <td>'.$sr++.'</td>
           <td>'.$row->name.'</td>
           <td>'.$businesscategoryname.'</td>
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
   
   
   
  public function get_business_role($isFilter,$limit,$start,$filder){
       
       
       $this->db->select("*");
       $this->db->from("businessRole");
       $this->db->order_by('id','desc');
       
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
       <th>Name</th>
      <th>Commision</th>
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
            $del_url     = base_url().'master/delete_business_role/'.$id;
         $edit_url    = base_url().'master/edit_form/business_role_edit/businessRole/id/'.$id;
         $getDeleteOption = getDeleteOption();
         $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
             
            if($row->isDelete==1){
            $isDeleteUrl      = base_url().'commoncontroller/trash_status/businessRole/delete/id/'.$id;
            $isRetriveUrl     = base_url().'commoncontroller/trash_status/businessRole/retrive/id/'.$id;
             
            $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
  
         $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
            }
            else{
              $optionLink  = $edit_link.' '.$delete_link;   
            }
             
             
  
      
    
      
       if($row->status=='Active'){
         $status = '<span class="badge bg-success">Active</span>'; 
      }else{
         $status = '<span class="badge bg-danger">Deactive</span>';
      }
      
         
    $output .= '
    <tr>
      <td>'.$sr++.'</td>
       <td>'.$row->name.'</td>
      <td>'.$row->commision.'</td>
      <td>'.$status.'</td>
      <td>'.$optionLink.'</td>
      
    </tr>
    ';
    }
    
    $output .= '</tbody></table>';
    return $output;    
        }
     
   } 
   
 public function get_social_link($isFilter,$limit,$start,$filder){
       
       
       $this->db->select("*");
       $this->db->from("social_link");
       $this->db->order_by('id','desc');
       
       if(!empty($filder['isDelete'])){
       
       $this->db->where('isDelete',$filder['isDelete']);
          
       }
       else{
        $this->db->where('isDelete',0);   
       }
       
       
       if(!empty($filder['title'])){
       $this->db->like('title',$filder['title']);
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
       <th>Title</th>
       <th>Link</th>
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
            $id          = $row->id;
            $del_url     = base_url().'master/delete_social_link/'.$id;
         $edit_url    = base_url().'master/edit_form/social_link_edit/social_link/id/'.$id;
         $getDeleteOption = getDeleteOption();
         $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
             
            if($row->isDelete==1){
            $isDeleteUrl      = base_url().'commoncontroller/trash_status/social_link/delete/id/'.$id;
            $isRetriveUrl     = base_url().'commoncontroller/trash_status/social_link/retrive/id/'.$id;
             
            $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
  
         $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
            }
            else{
              $optionLink  = $edit_link.' '.$delete_link;   
            }
             
             
  
      
      $File = $row->image;
  
          if(!empty($File))
          { 
                $load_url1 = 'uploads/social_link/'.$File;
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
      
       if($row->status=='Active'){
         $status = '<span class="badge bg-success">Active</span>'; 
      }else{
         $status = '<span class="badge bg-danger">Deactive</span>';
      }
      
         
    $output .= '
    <tr>
      <td>'.$sr++.'</td>
       <td>'.$row->title.'</td>
       <td>'.$row->link.'</td>
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
 
 
 public function get_account_detail($isFilter,$limit,$start,$filder){
       
       
       $this->db->select("*");
       $this->db->from("account_details");
       $this->db->order_by('id','desc');
       
       if(!empty($filder['isDelete'])){
       
       $this->db->where('isDelete',$filder['isDelete']);
          
       }
       else{
        $this->db->where('isDelete',0);   
       }
       
       
       if(!empty($filder['bank_name'])){
       $this->db->like('bank_name',$filder['bank_name']);
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
       <th>Bank Name</th>
       <th>Account Number</th>
       <th>Branch Name</th>
       <th>IFSE CODE </th>
      <th>Bank Logo</th>
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
            $del_url     = base_url().'master/delete_account_detail/'.$id;
             $edit_url    = base_url().'master/edit_form/account_detail_edit/account_details/id/'.$id;
             $getDeleteOption = getDeleteOption();
             $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
             
            if($row->isDelete==1){
            $isDeleteUrl      = base_url().'commoncontroller/trash_status/account_details/delete/id/'.$id;
            $isRetriveUrl     = base_url().'commoncontroller/trash_status/account_details/retrive/id/'.$id;
             
            $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
            $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";
  
             $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
            }
            else{
              $optionLink  = $edit_link.' '.$delete_link;   
            }
             
             
  
      
      $File = $row->bank_logo;
  
              if(!empty($File))
              { 
                  $load_url1 = 'uploads/account_detail/'.$File;
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
      
       if($row->status=='Active'){
         $status = '<span class="badge bg-success">Active</span>'; 
      }else{
         $status = '<span class="badge bg-danger">Deactive</span>';
      }
      
             
    $output .= '
    <tr>
      <td>'.$sr++.'</td>
       <td>'.$row->bank_name.'</td>
       <td>'.$row->account_number.'</td>
       <td>'.$row->branch_name.'</td>
       <td>'.$row->ifsc.'</td>
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
   
   
   
   
 public function get_enquiry_plan($isFilter,$limit,$start,$filder){
       
       
    $this->db->select("*");
    $this->db->from("enquiry_plan");
    $this->db->order_by('id','desc');
    
    if(!empty($filder['isDelete'])){
    
    $this->db->where('isDelete',$filder['isDelete']);
       
    }
    else{
     $this->db->where('isDelete',0);   
    }
    
    
    if(!empty($filder['plan_name'])){
    $this->db->like('plan_name',$filder['plan_name']);
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
    <th>Plan Name</th>
   <th>Duration</th>
     <th>Amount</th>
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
         $del_url     = base_url().'master/delete_enquiry_plan/'.$id;
          $edit_url    = base_url().'master/edit_form/enquiry_plan_edit/enquiry_plan/id/'.$id;
          $getDeleteOption = getDeleteOption();
          $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
         $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
          
         if($row->isDelete==1){
         $isDeleteUrl      = base_url().'commoncontroller/trash_status/enquiry_plan/delete/id/'.$id;
         $isRetriveUrl     = base_url().'commoncontroller/trash_status/enquiry_plan/retrive/id/'.$id;
          
         $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
         $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

          $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
         }
         else{
           $optionLink  = $edit_link.' '.$delete_link;   
         }
          
          

   
   
   
    if($row->status=='Active'){
      $status = '<span class="badge bg-success">Active</span>'; 
   }else{
      $status = '<span class="badge bg-danger">Deactive</span>';
   }
   
          
 $output .= '
 <tr>
   <td>'.$sr++.'</td>
    <td>'.$row->plan_name.'</td>
     <td>'.$row->duration.'</td>
      <td>'.$row->amount.'</td>
   <td>'.$status.'</td>
   <td>'.$optionLink.'</td>
   
 </tr>
 ';
 }
 
 $output .= '</tbody></table>';
 return $output;    
     }
  
}
  
   
  public function get_payment_cycle_plan($isFilter,$limit,$start,$filder){
       
       
  $this->db->select("*");
  $this->db->from("payment_cycle_plan");
  $this->db->order_by('id','desc');
  
  if(!empty($filder['isDelete'])){
  
  $this->db->where('isDelete',$filder['isDelete']);
     
  }
  else{
   $this->db->where('isDelete',0);   
  }
  
  
  if(!empty($filder['plan_name'])){
  $this->db->like('plan_name',$filder['plan_name']);
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
  <th>Plan Name</th>
 <th>Duration</th>
   <th>Amount</th>
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
       $del_url     = base_url().'master/delete_payment_cycle_plan/'.$id;
        $edit_url    = base_url().'master/edit_form/payment_cycle_plan_edit/payment_cycle_plan/id/'.$id;
        $getDeleteOption = getDeleteOption();
        $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
       $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
        
       if($row->isDelete==1){
       $isDeleteUrl      = base_url().'commoncontroller/trash_status/payment_cycle_plan/delete/id/'.$id;
       $isRetriveUrl     = base_url().'commoncontroller/trash_status/payment_cycle_plan/retrive/id/'.$id;
        
       $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
       $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

        $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
       }
       else{
         $optionLink  = $edit_link.' '.$delete_link;   
       }
        
        

 
 
 
  if($row->status=='Active'){
    $status = '<span class="badge bg-success">Active</span>'; 
 }else{
    $status = '<span class="badge bg-danger">Deactive</span>';
 }
 
        
$output .= '
<tr>
 <td>'.$sr++.'</td>
  <td>'.$row->plan_name.'</td>
   <td>'.$row->duration.'</td>
    <td>'.$row->amount.'</td>
 <td>'.$status.'</td>
 <td>'.$optionLink.'</td>
 
</tr>
';
}

$output .= '</tbody></table>';
return $output;    
   }

}
 
   public function get_for_products_sell_plan($isFilter,$limit,$start,$filder){
       
       
  $this->db->select("*");
  $this->db->from("for_products_sell_plan");
  $this->db->order_by('id','desc');
  
  if(!empty($filder['isDelete'])){
  
  $this->db->where('isDelete',$filder['isDelete']);
     
  }
  else{
   $this->db->where('isDelete',0);   
  }
  
  
  if(!empty($filder['plan_name'])){
  $this->db->like('plan_name',$filder['plan_name']);
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
  <th>Plan Name</th>
 <th>Duration</th>
   <th>Amount</th>
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
       $del_url     = base_url().'master/delete_for_products_sell_plan/'.$id;
        $edit_url    = base_url().'master/edit_form/for_products_sell_plan_edit/for_products_sell_plan/id/'.$id;
        $getDeleteOption = getDeleteOption();
        $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
       $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";
        
       if($row->isDelete==1){
       $isDeleteUrl      = base_url().'commoncontroller/trash_status/for_products_sell_plan/delete/id/'.$id;
       $isRetriveUrl     = base_url().'commoncontroller/trash_status/for_products_sell_plan/retrive/id/'.$id;
        
       $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
       $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";

        $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 
       }
       else{
         $optionLink  = $edit_link.' '.$delete_link;   
       }
        
        

 
 
 
  if($row->status=='Active'){
    $status = '<span class="badge bg-success">Active</span>'; 
 }else{
    $status = '<span class="badge bg-danger">Deactive</span>';
 }
 
        
$output .= '
<tr>
 <td>'.$sr++.'</td>
  <td>'.$row->plan_name.'</td>
   <td>'.$row->duration.'</td>
    <td>'.$row->amount.'</td>
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