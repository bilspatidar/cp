    <?php defined("BASEPATH") OR exit("No direct script access allowed");

class Master extends CI_Controller {

  function __construct() {

    parent::__construct();
    	 $this->load->model('Mdlmaster');
	 }
	 public function edit_form($page='',$table='',$key='',$value=''){
	  is_login(array('superadmin','admin','instructor','super_admin','dispatch_packaging'));
	  $page_data['row'] = $this->db->get_where($table,array($key=>$value))->result();
	  $this->load->view($page,$page_data);
	  $this->load->view('include/editModelJs');
  }    
  public function edit_course_session($page='',$table='',$key='',$value=''){
	  is_login(array('superadmin','admin','instructor','super_admin','dispatch_packaging'));
	 
	  $page_data['row'] = $this->db->get_where($table,array($key=>$value))->result();
	  $this->load->view($page,$page_data);
  }    
    
	public function edit_form_status($page='',$table='',$key='',$value=''){
	  is_login(array('superadmin','admin','instructor','super_admin','dispatch_packaging'));
	  $this->db->order_by('updated','desc');
	  $this->db->limit(1);
	  $page_data['row'] = $this->db->get_where($table,array($key=>$value))->result();
	  $this->load->view($page,$page_data);
	  $this->load->view('include/editModelJs');
  }   
  
   ///////////########## Product Variation ##########///////////
   public function get_product_variationP($product_id=''){  
   is_login(array('superadmin','admin'));
       $page_data['product_id'] = $product_id;
      $this->load->view('product_variation_list',$page_data);
   }
   public function add_product_qty_range($param1 = ''){
	 is_login(array('superadmin','admin'));
	   if($param1=='add'){
			  
$this->form_validation->set_error_delimiters('', '');
//$this->form_validation->set_rules('selling_price','Selling Price','required');
$this->form_validation->set_rules('product_id','Product Name','required');

if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	         $product_id = $this->input->post('product_id');
			 $min_qty  = $this->input->post('min_qty');
             $max_qty = $this->input->post('max_qty');
		     $price = $this->input->post('price');
		     $mrp = $this->input->post('mrp');
		     $data['product_id'] = $product_id;
		     $this->db->where('product_id',$product_id);
		     $this->db->delete('price_qty_range');
		      for($a=0;$a<count($price);$a++){
		         
		      $data['min_qty'] = $min_qty[$a];
		      $data['max_qty'] = $max_qty[$a];
		      $data['price']   = $price[$a];
		      $data['mrp']     = $mrp[$a];
 		      if(!empty($data['min_qty']) && !empty($data['max_qty']) && !empty($data['price'])){
		        $reponse = $this->db->insert('price_qty_range',$data);
		      }
		      }
      
      
			
			if($reponse)
			{
		   echo"1";
            }	
            else 
            {
		   echo $error = "Data not Saved!";
		    }	
			   
			   
			}
		
		}
} 
   public function get_qty_range_container_data($product_id){  
   is_login(array('superadmin','admin'));
    $page_data['product_id'] = $product_id;
    $this->load->view('qty_range_container_data',$page_data);

	
   }
   
   public function product_variation(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Product Variation ';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_product_variation/';
		    $page_data['product_id'] = $product_id;
			$this->load->view('include/header',$title);
            $this->load->view('product_variation',$page_data);                
            $this->load->view('include/footer',$footer);            
 
  }
   public function add_product_variation($param1=''){
      is_login(array('superadmin','admin'));
//       if($param1=='add'){
         
// $this->form_validation->set_error_delimiters('', '');
// $this->form_validation->set_rules('attribute_id','Attribute', 'required');
// $this->form_validation->set_rules('variation_name','Variation Name', 'required');

// if ($this->form_validation->run() == FALSE) {
    
    
//               $response['status'] = 0;
//               $response['msg']  = validation_errors();
// } 
// else {
            
//             $data['selling_price']  = $this->input->post('selling_price');
//              $data['mrp']  = $this->input->post('costing_price');
//              $data['product_id']  = $this->input->post('product_id');
//              $data['qty']  = $this->input->post('qty');
//              $data['common_key'] = $this->get_common_key();
//             // $data['attribute_id'] = $this->input->post('attribute_id');
//             // $data['variation_name'] = $this->input->post('variation_name');
//             // $data['description'] = $this->input->post('description');
//             $data['status'] = 'Active';
//             $data['added'] = get_dateTime();
// 	        $data['addedBy'] = getUser('users_id');   
// 	        $attribute_id = $this->input->post('attribute_id');
// 		     $variation_id = $this->input->post('variation_id');
// 		      for($a=0;$a<count($attribute_id);$a++){
// 		          $attId = $attribute_id[$a];
// 		      $data['attribute_id'] = $attId;
// 		      $data['variation_id'] = $variation_id[$attId];
// 		      if(!empty($data['variation_id'])){
// 		     /***     
// 		     $isExists =  $this->db->get_where('product_variation',array('attribute_id'=>$data['attribute_id'],'variation_id'=>$data['variation_id'],'product_id'=>$data['product_id']));
// 		     if($isExists->num_rows()>0){
// 		        $data2['selling_price']  = $data['selling_price'];
// 		        $data2['costing_price']  = $data['costing_price'];
// 		        $data2['qty']  = $data['qty'];
//              $id = $isExists->row()->id;
//              $this->db->where('id',$id);
// 		     $result = $this->db->update('product_variation',$data2);    
// 		     }
// 		     else{
// 		     $result = $this->db->insert('product_variation',$data);
// 		     } **/
// 			$result = $this->db->insert('product_variation',$data);
           
//           if($result)
//           {
//               $response['status'] = 1;
//               $response['msg']  = 'Data submited successfully';
//           }
//           else
//           {
      
//               $response['status'] = 0;
//               $response['msg']  = 'Error try again';
//           }
    
// 		      }
// 			}

// echo json_encode($response);
//      }
     
// }
    
    if($param1=='add'){
			  
$this->form_validation->set_error_delimiters('', '');
//$this->form_validation->set_rules('selling_price','Selling Price','required');
$this->form_validation->set_rules('qty','Qty','required');
$this->form_validation->set_rules('product_id','Product Name','required');

if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			 $data['selling_price']  = $this->input->post('selling_price');
             $data['mrp']  = $this->input->post('costing_price');
             $data['product_id']  = $this->input->post('product_id');
             $data['qty']  = $this->input->post('qty');
             $data['common_key'] = $this->Common->random_key_string();;
		     $attribute_id = $this->input->post('attribute_id');
		     $variation_id = $this->input->post('variation_id');
		      for($a=0;$a<count($attribute_id);$a++){
		          $attId = $attribute_id[$a];
		      $data['attribute_id'] = $attId;
		      $data['variation_id'] = $variation_id[$attId];
		      if(!empty($data['variation_id'])){
		     /***     
		     $isExists =  $this->db->get_where('product_variation',array('attribute_id'=>$data['attribute_id'],'variation_id'=>$data['variation_id'],'product_id'=>$data['product_id']));
		     if($isExists->num_rows()>0){
		        $data2['selling_price']  = $data['selling_price'];
		        $data2['costing_price']  = $data['costing_price'];
		        $data2['qty']  = $data['qty'];
             $id = $isExists->row()->id;
             $this->db->where('id',$id);
		     $result = $this->db->update('product_variation',$data2);    
		     }
		     else{
		     $result = $this->db->insert('product_variation',$data);
		     } **/
		     $result = $this->db->insert('product_variation',$data);
		      }
		      }
      
       if($result)
          {
            echo "1";
            //   $response['status'] = 1;
            //   $response['msg']  = 'Data Submited successfully';
          }
          else
          {
                echo $error = "Data not Saved!";
            //   $response['status'] = 0;
            //   $response['msg']  = 'Error try again';
          }	
			   
			   
			}
// 		echo json_encode($response);
		}
		
      if($param1=='update'){
$id = $this->input->post('id');         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('attribute_id','Attribute Name', 'required');
//$this->form_validation->set_rules('type','Type', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['attribute_id'] = $this->input->post('attribute_id');
            $data['variation_name'] = $this->input->post('variation_name');
            // $data['type'] = $this->input->post('type');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		    $this->db->where('id',$id);
			$result = $this->db->update('product_variation',$data);
           
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
   public function get_product_variation($rowno=0){
      
    //   $filter['name']  = $_POST['filterOne']; 
    //   $filter['status']= $_POST['filterTwo']; 
    //   $filter['isDelete'] = $_POST['filterThree']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_product_variation('yes',$rowperpage,$rowno);
    $users_record =  $this->Mdlmaster->get_product_variation('no',$rowperpage,$rowno);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','product_variation');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
   public function delete_product_variation(){
    is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
		$this->db->where('common_key',$id);
        //   $this->db->where('id',$id);
          $result = $this->db->update('product_variation',$data);
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

    
    public function delete_product_variationP($id=''){
	   is_login(array('superadmin','admin'));
	   
	   $this->db->where('common_key',$id);
	   $result = $this->db->delete('product_variation');
	  if($result)
        {
            // echo "1";
          $response['status'] = 1;
          $response['msg']  = 'Deleted Success';
        }
        else
        {
            // echo $error = "Data not Deleted!";
          $response['status'] = 0;
          $response['msg']  = 'Error try again';
        }
        echo json_encode($response);
   }

   ////////////########### Product Variantions #########///////////
   
    ////////////////######## Open New Product Variation ########////////////

   public function new_product_variation(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Product Variation ';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_new_product_variation/';
			$this->load->view('include/header',$title);
            $this->load->view('new_product_variation');                
            $this->load->view('include/footer',$footer);            
 
  }
   public function add_new_product_variation($param1=''){
     is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('variation_name','Variation Name','required');
$this->form_validation->set_rules('attribute_id','Atribute Name','required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['variation_name']  = $this->input->post('variation_name');
            $data['attribute_id']  = $this->input->post('attribute_id');
			$data['description']  = $this->input->post('description');
	        
			$result = $this->db->insert('variation',$data);
           
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
$this->form_validation->set_rules('variation_name','Variation Name', 'required');
$this->form_validation->set_rules('attribute_id','Attribute Name', 'required');


if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['variation_name']  = $this->input->post('variation_name');
            $data['attribute_id']  = $this->input->post('attribute_id');
			$data['description']  = $this->input->post('description');
         
	
		    $this->db->where('id',$id);
			$result = $this->db->update('variation',$data);
           
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
   public function get_new_product_variation($rowno=0){
      is_login(array('superadmin','admin'));
      $filter['name']  = $_POST['filterOne'];      
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_new_product_variation('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_new_product_variation('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','new_product_variation');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
   public function delete_new_product_variation($id=''){
    is_login(array('superadmin','admin'));
	$id = $this->input->post('id');
	
          $this->db->where('id',$id);
          $result = $this->db->delete('variation');

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
 

 ////////////////######## End New Product Variation #######/////////////
   
    //////////////########### Brand ##########/////////////
 
   public function brand(){  
    is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Brand ';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_brand/';
			$this->load->view('include/header',$title);
            $this->load->view('brand');                
            $this->load->view('include/footer',$footer);            
 
  }
   public function add_brand($param1=''){
     is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Brand Name','required|is_unique[brand.name]');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name']  = $this->input->post('name');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
	        
	         $tmpImage = $this->input->post('brand_banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['brand_banner'] = $tmpImage;
	           $uploads_dir = 'uploads/brand/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
			$result = $this->db->insert('brand',$data);
           
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
$this->form_validation->set_rules('name','Name', 'required');
//$this->form_validation->set_rules('type','Type', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		    
		    $tmpImage = $this->input->post('brand_banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['brand_banner'] = $tmpImage;
	           $uploads_dir = 'uploads/brand/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('brand',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->brand_banner;
                 $load_url = 'uploads/brand/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/brand/".$img);		
    			}
              }
	        }
		    
		    $this->db->where('id',$id);
			$result = $this->db->update('brand',$data);
           
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
   public function get_brand($rowno=0){
      is_login(array('superadmin','admin'));
      $filter['name']  = $_POST['filterOne']; 
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_brand('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_brand('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','brand');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
   public function delete_brand(){
    is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('brand',$data);
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
 
   /////////////############ Brand #########//////////////
 
 
           //////////###### Open product at #######//////////////
    
    public function get_product_attribute1($product_id=''){
     is_login(array('superadmin'));
      $page_data['product_id'] = $product_id;
      $this->load->view('product_variation',$page_data);

    
 }
 
 ////////////////######## Open New Product Atribute ########////////////
 
   public function new_product_attribute(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Product Atribute ';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_new_product_attribute/';
			$this->load->view('include/header',$title);
            $this->load->view('new_product_attribute');                
            $this->load->view('include/footer',$footer);            
 
  }
   public function add_new_product_attribute($param1=''){
     is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Atribute Name','required');
$this->form_validation->set_rules('type','type','required');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name']  = $this->input->post('name');
            $data['type']  = $this->input->post('type');
	        
			$result = $this->db->insert('attribute',$data);
           
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
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('type','Type', 'required');


if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['type'] = $this->input->post('type');
         
	
		    $this->db->where('id',$id);
			$result = $this->db->update('attribute',$data);
           
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
   public function get_new_product_attribute($rowno=0){
    is_login(array('superadmin','admin'));
      $filter['name']  = $_POST['filterOne']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_new_product_attribute('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_new_product_attribute('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','new_product_atribut');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
   public function delete_new_product_attribute($id=''){
    is_login(array('superadmin','admin'));
	$id = $this->input->post('id');

	      //$data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->delete('attribute');

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
 
 
 ////////////////######## End New Product Atribute #######/////////////
 
 
    
//   public function product_attribute($product_id='',$product_key='')
  public function product_attribute($product_id=''){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Product Attribute';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_product_attribute/';
            $page_data['attribute'] = $this->db->get_where('attribute')->result();
            $page_data['product_id'] = $product_id;
			$this->load->view('include/header',$title);
            $this->load->view('product_attribute',$page_data);                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_product_attribute($param1=''){
      is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('attribute_id','Attribute', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();

}else{
			
			$attribute_id = $this->input->post('attribute_id');
			$product_id = $this->input->post('product_id');
			$attribute = $this->db->get_where('product_attribute',array('attribute_id'=>$attribute_id , 'product_id'=>$product_id));
			//$attribute = $this->Mdlmaster->attributeallready($attribute_id);
			if($attribute->num_rows()>0){
			   echo "Attribute Already Added!";
			   exit();
			}else{
			$data['attribute_id']  = $attribute_id;
			$data['product_id']  = $product_id;
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');     
			
	         $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/product_attribute/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
			$result = $this->db->insert('product_attribute',$data);
		
         if($result)
          {
            echo "1";
            //   $response['status'] = 1;
            //   $response['msg']  = 'Data Submited successfully';
          }
          else
          {
                echo $error = "Data not Saved!";
            //   $response['status'] = 0;
            //   $response['msg']  = 'Error try again';
          }	
		}
	}

// echo json_encode($response);
     }
      if($param1=='update'){
$id = $this->input->post('id');         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('type','Type', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['type'] = $this->input->post('type');
            $data['status'] = $this->input->post('status');
		    $data['edited'] = get_dateTime();
	        $data['editedBy'] = getUser('users_id');         
		
			$tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/product_attribute/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('product_attribute',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/product_attribute/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/product_attribute/".$img);		
    			}
              }
	        }
		
		    $this->db->where('id',$id);
			$result = $this->db->update('product_attribute',$data);
           
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
  public function get_product_attribute($rowno=0){
     is_login(array('superadmin','admin')); 
    //   $filter['name']  = $_POST['filterOne']; 
    //   $filter['status']= $_POST['filterTwo']; 
    //   $filter['isDelete'] = $_POST['filterThree']; 
    //   $filter['product_variation_id'] = $_POST['filterFour']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_product_attribute('yes',$rowperpage,$rowno);
    $users_record =  $this->Mdlmaster->get_product_attribute('no',$rowperpage,$rowno);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','product_attribute');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }

  public function delete_product_attribute($id=''){
    is_login(array('superadmin','admin'));
	$this->db->where('id',$id);
	$result = $this->db->delete('product_attribute');
	if($result)
	{
		echo "Deleted  successfully";
	 //$response['status'] = 1;
	  //$response['msg']  = 'Deleted  successfully';
	}
	else
	{
		echo $error = "Data not Deleted!";
	  //$response['status'] = 0;
	  //$response['msg']  = 'Error try again';
	}
	echo json_encode($response);
 }
    
    //////////###### End Business Sub Category Type #######//////////////


    //////////###### Open Business Type #######//////////////
    
  public function business_type(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Business Types';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_business_type/';
			$this->load->view('include/header',$title);
            $this->load->view('business_type');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_business_type($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required|is_unique[business_type.name]');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');         
			$result = $this->db->insert('business_type',$data);
           
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
$id = $this->input->post('business_id');         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
		    $data['edited'] = get_dateTime();
	        $data['editedBy'] = getUser('users_id');         
		
		    $this->db->where('business_id',$id);
			$result = $this->db->update('business_type',$data);
           
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
  public function get_business_type($rowno=0){
      
      $filter['name']  = $_POST['filterOne']; 
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_business_type('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_business_type('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','business_type');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_business_type(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('business_id',$id);
          $result = $this->db->update('business_type',$data);
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
    
    //////////###### End Business Type #######//////////////
    
   //////////###### CATEGORIES #######//////////////
   
  public function categories(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Product Categories';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_categories/';
			$this->load->view('include/header',$title);
            $this->load->view('categories');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_category($param1=''){
     is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Category Name', 'required|is_unique[product_category.name]');
$this->form_validation->set_rules('icon_maker','icon_maker', 'required');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['shortName'] = $this->input->post('shortName');
			$data['icon_maker'] = $this->input->post('icon_maker');
            $data['bgColor'] = $this->input->post('bgColor');
			$data['color'] = $this->input->post('color');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');   
	      
	         $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/product_categories/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        
	          $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/product_categories/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
			$result = $this->db->insert('product_category',$data);
           
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
$id = $this->input->post('product_category_id');         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Category Name', 'required|edit_unique[product_category.name.product_category_id.'.$id.']');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['shortName'] = $this->input->post('shortName');
			$data['icon_maker'] = $this->input->post('icon_maker');
            $data['bgColor'] = $this->input->post('bgColor');
			$data['color'] = $this->input->post('color');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		$tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/product_categories/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('product_category',array('product_category_id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/product_categories/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/product_categories/".$img);		
    			}
               }
	        }
		
		
			$tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/product_categories/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('product_category',array('product_category_id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->banner;
                 $load_url = 'uploads/product_categories/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/product_categories/".$img);		
    			}
               }
	        }
	        
	        
		    $this->db->where('product_category_id',$id);
			$result = $this->db->update('product_category',$data);
           
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
  public function get_categories($rowno=0){
      is_login(array('superadmin','admin'));
       $filter['name']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree']; 
 
     
 
  $rowperpage = 18; //getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_categories('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_categories('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','categories');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_category(){
    is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('product_category_id',$id);
          $result = $this->db->update('product_category',$data);
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
 
    //////////###### END CATEGORIES #######//////////////
    
  //////////###### Open Business Sub Category Type #######//////////////
    
  public function level_two_category(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Product Sub Category';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_level_two_category/';
			$this->load->view('include/header',$title);
            $this->load->view('level_two_category');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_level_two_category($param1=''){
     is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required|is_unique[level_two_category.name]');
$this->form_validation->set_rules('category_id','Category Name', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['category_id'] = $this->input->post('category_id');
			$data['icon_maker'] = $this->input->post('icon_maker');
            $data['bgColor'] = $this->input->post('bgColor');
			$data['color'] = $this->input->post('color');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');     
	        
	         $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/sub_categories/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	          $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/sub_categories/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
			$result = $this->db->insert('level_two_category',$data);
           
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
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('category_id','Category Name', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['category_id'] = $this->input->post('category_id');
			$data['icon_maker'] = $this->input->post('icon_maker');
            $data['bgColor'] = $this->input->post('bgColor');
			$data['color'] = $this->input->post('color');
            $data['status'] = $this->input->post('status');
		    $data['edited'] = get_dateTime();
	        $data['editedBy'] = getUser('users_id');         
		
			$tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/sub_categories/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('level_two_category',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/sub_categories/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/sub_categories/".$img);		
    			}
               }
	        }
	        
	        
	        $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/sub_categories/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('level_two_category',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->banner;
                 $load_url = 'uploads/sub_categories/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/sub_categories/".$img);		
    			}
               }
	        }
		
		    $this->db->where('id',$id);
			$result = $this->db->update('level_two_category',$data);
           
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
  public function get_level_two_category($rowno=0){
      is_login(array('superadmin','admin'));
      $filter['name']  = $_POST['filterOne']; 
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree']; 
      $filter['category_id'] = $_POST['filterFour']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_level_two_category('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_level_two_category('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','level_two_category');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_level_two_category(){
    is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('level_two_category',$data);
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
    
    //////////###### End Business Sub Category Type #######//////////////
    
      //////////###### Open Level Three Category #######//////////////
    
  public function level_three_category(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Level Three Category';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_level_three_category/';
			$this->load->view('include/header',$title);
            $this->load->view('level_three_category');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_level_three_category($param1=''){
      is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required|is_unique[level_three_category.name]');
$this->form_validation->set_rules('category_id[]','Category Name', 'required');
$this->form_validation->set_rules('sub_category_id','Category Level Two', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            // $data['category_id'] = $this->input->post('category_id');
            $data['sub_category_id'] = $this->input->post('sub_category_id');
			$data['icon_maker'] = $this->input->post('icon_maker');
            $data['bgColor'] = $this->input->post('bgColor');
			$data['color'] = $this->input->post('color');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
	        $catt_id = $this->input->post('category_id');
       
            $catt_id = implode(",",$catt_id);
            $data['category_id'] = $catt_id;
	        
	         $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/level_three_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	             $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/level_three_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
			$result = $this->db->insert('level_three_category',$data);
           
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
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('category_id','Category Name', 'required');
$this->form_validation->set_rules('sub_category_id','Category Level Two', 'required');


if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['category_id'] = $this->input->post('category_id');
            $data['sub_category_id'] = $this->input->post('sub_category_id');
			$data['icon_maker'] = $this->input->post('icon_maker');
            $data['bgColor'] = $this->input->post('bgColor');
			$data['color'] = $this->input->post('color');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');        
		
			$tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/level_three_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('level_three_category',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/level_three_category/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/level_three_category/".$img);		
    			}
               }
	        }
	        
	        	$tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/level_three_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('level_three_category',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->banner;
                 $load_url = 'uploads/level_three_category/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/level_three_category/".$img);		
    			}
               }
	        }
		
		    $this->db->where('id',$id);
			$result = $this->db->update('level_three_category',$data);
           
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
  public function get_level_three_category($rowno=0){
       is_login(array('superadmin','admin'));
      $filter['name']  = $_POST['filterOne']; 
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree']; 
      $filter['category_id'] = $_POST['filterFour']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_level_three_category('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_level_three_category('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','level_three_category');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_level_three_category(){
    is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('level_three_category',$data);
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
    
    //////////###### End Level Three Category #######//////////////
    
          //////////###### Open Level Four Category #######//////////////
    
  public function level_four_category(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Level Four Category';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_level_four_category/';
			$this->load->view('include/header',$title);
            $this->load->view('level_four_category');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_level_four_category($param1=''){
      is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required|is_unique[level_four_category.name]');
$this->form_validation->set_rules('category_id[]','Category Name', 'required');
$this->form_validation->set_rules('sub_category_id','Category Level Two', 'required');
// $this->form_validation->set_rules('level_three_category_id','Category Level Three', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            // $data['category_id'] = $this->input->post('category_id');
            $data['sub_category_id'] = $this->input->post('sub_category_id');
            $data['level_three_category_id'] = $this->input->post('level_three_category_id');
			$data['icon_maker'] = $this->input->post('icon_maker');
            $data['bgColor'] = $this->input->post('bgColor');
			$data['color'] = $this->input->post('color');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
	        $catt_id = $this->input->post('category_id');
       
            $catt_id = implode(",",$catt_id);
            $data['category_id'] = $catt_id;
	        
	         $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/level_four_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	           $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/level_four_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
			$result = $this->db->insert('level_four_category',$data);
           
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
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('category_id','Category Name', 'required');
$this->form_validation->set_rules('sub_category_id','Category Level Two', 'required');
$this->form_validation->set_rules('level_three_category_id','Category Level Two', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['category_id'] = $this->input->post('category_id');
            $data['sub_category_id'] = $this->input->post('sub_category_id');
            $data['level_three_category_id'] = $this->input->post('level_three_category_id');
			$data['icon_maker'] = $this->input->post('icon_maker');
            $data['bgColor'] = $this->input->post('bgColor');
			$data['color'] = $this->input->post('color');
            $data['status'] = $this->input->post('status');
		     $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');        
		
			$tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/level_four_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('level_four_category',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/level_four_category/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/level_four_category/".$img);		
    			}
               }
	        }
	        
	        	$tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/level_four_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('level_four_category',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->banner;
                 $load_url = 'uploads/level_four_category/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/level_four_category/".$img);		
    			}
               }
	        }
		
		    $this->db->where('id',$id);
			$result = $this->db->update('level_four_category',$data);
           
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
  public function get_level_four_category($rowno=0){
   is_login(array('superadmin','admin'));
      $filter['name']  = $_POST['filterOne']; 
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree']; 
      $filter['category_id'] = $_POST['filterFour']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_level_four_category('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_level_four_category('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','level_four_category');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_level_four_category(){
    is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('level_four_category',$data);
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
    
    //////////###### End Level Three Category #######//////////////
    
  //////////###### Open Services CATEGORIES #######//////////////
   
  public function services_categories(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Services Categories';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_services_categories/';
			$this->load->view('include/header',$title);
            $this->load->view('services_categories');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_services_categories($param1=''){
      is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Service Name', 'required|is_unique[services_categories.name]');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['shortName'] = $this->input->post('shortName');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');   
	      
	         $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/service_categories/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
			$result = $this->db->insert('services_categories',$data);
           
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
$id = $this->input->post('services_categories_id');         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Services Name', 'required|edit_unique[services_categories.name.services_categories_id.'.$id.']');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['shortName'] = $this->input->post('shortName');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		$tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/service_categories/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('services_categories',array('services_categories_id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/service_categories/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/service_categories/".$img);		
    			}
               }
	        }
		
		    $this->db->where('services_categories_id',$id);
			$result = $this->db->update('services_categories',$data);
           
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
  public function get_services_categories($rowno=0){
      is_login(array('superadmin','admin'));
       $filter['name']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_services_categories('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_services_categories('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','services_categories');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_services_categories(){
    is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('services_categories_id',$id);
          $result = $this->db->update('services_categories',$data);
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
 
  //////////###### END Services CATEGORIES #######//////////////
  
    //////////###### Open Services Sub Category Type #######//////////////
    
  public function services_sub_category(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Services Sub Category';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_services_sub_category/';
			$this->load->view('include/header',$title);
            $this->load->view('services_sub_category');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_services_sub_category($param1=''){
     is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required|is_unique[business_sub_category.name]');
$this->form_validation->set_rules('service_category_id','Service Category Name', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['service_category_id'] = $this->input->post('service_category_id');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');     
	        
	         $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/services_sub_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
			$result = $this->db->insert('services_sub_category',$data);
           
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
$id = $this->input->post('services_sub_category_id');         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('service_category_id','Service Category Name', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['service_category_id'] = $this->input->post('service_category_id');
            $data['status'] = $this->input->post('status');
		    $data['edited'] = get_dateTime();
	        $data['editedBy'] = getUser('users_id');         
		
			$tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/services_sub_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('services_sub_category',array('services_sub_category_id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/services_sub_category/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/services_sub_category/".$img);		
    			}
               }
	        }
		
		    $this->db->where('services_sub_category_id',$id);
			$result = $this->db->update('services_sub_category',$data);
           
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
  public function get_services_sub_category($rowno=0){
      is_login(array('superadmin','admin'));
      $filter['name']  = $_POST['filterOne']; 
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree']; 
      $filter['service_category_id'] = $_POST['filterFour']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_services_sub_category('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_services_sub_category('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','services_sub_category');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_services_sub_category(){
    is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('services_sub_category_id',$id);
          $result = $this->db->update('services_sub_category',$data);
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
    
  //////////###### End Services Sub Category Type #######//////////////
 
    
       //////////###### STATES START #######//////////////
       
  public function states(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'States';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_states/';
			$this->load->view('include/header',$title);
            $this->load->view('states');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_state($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('state_name','State Name', 'required|is_unique[state.state_name]');


if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['state_name'] = $this->input->post('state_name');
            // $data['shortName'] = $this->input->post('shortName');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');         
			$result = $this->db->insert('state',$data);
           
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
$id = $this->input->post('state_id');         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('state_name','State Name', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['state_name'] = $this->input->post('state_name');
            // $data['shortName'] = $this->input->post('shortName');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		    $this->db->where('state_id',$id);
			$result = $this->db->update('state',$data);
           
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
  public function get_states($rowno=0){
      
       $filter['state_name']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_states('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_states('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','states');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_state(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('state_id',$id);
          $response = $this->db->update('state',$data);
        if($response)
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
 
    //////////###### END STATES #######//////////////
    
    ////////////####### START CITY ##########/////////////
    
  public function cities(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Cities';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_cities/';
			$this->load->view('include/header',$title);
            $this->load->view('cities');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_city($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('city_name','City Name', 'required');
$this->form_validation->set_rules('state_id','State Name', 'required');


if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['city_name'] = $this->input->post('city_name');
            $data['state_id'] = $this->input->post('state_id');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');         
			$result = $this->db->insert('city',$data);
           
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
$id = $this->input->post('city_id');         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('city_name','City Name', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['state_id'] = $this->input->post('state_id');
            $data['city_name'] = $this->input->post('city_name');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		    $this->db->where('city_id',$id);
			$result = $this->db->update('city',$data);
           
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
  public function get_cities($rowno=0){
      
       $filter['city_name']  = $_POST['filterOne'];
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_cities('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_cities('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','cities');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_city(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('city_id',$id);
          $res = $this->db->update('city',$data);
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
    
    ///////////######### END CITY ###########///////////
    
        ////////////####### START Pincode ##########/////////////
    
 public function app_pincode(){  
 is_login(array('superadmin'));
	        $title['page_title'] = 'Pincodes';
	         $footer['tableData']   = 1;
             $footer['dataLink']   = base_url().'master/get_app_pincode/';
			$this->load->view('include/header',$title);
            $this->load->view('app_pincode');                
            $this->load->view('include/footer',$footer);            
  }
 public function add_app_pincode($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('country_id','Country Name', 'required');
$this->form_validation->set_rules('state_id','State Name', 'required');
$this->form_validation->set_rules('city_id','City Name', 'required');
$this->form_validation->set_rules('pincode','Pincode','required|min_length[6]|max_length[6]|is_unique[app_pincode.pincode]');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            
            $data['country_id'] = $this->input->post('country_id');
            $data['state_id'] = $this->input->post('state_id');
            // $data['division_id'] = $this->input->post('division_id');
            $data['city_id'] = $this->input->post('city_id');
             $data['pincode'] = $this->input->post('pincode');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');         
			$result = $this->db->insert('app_pincode',$data);
           
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
$this->form_validation->set_rules('country_id','Country Name', 'required');
$this->form_validation->set_rules('state_id','State Name', 'required');
$this->form_validation->set_rules('city_id','City Name', 'required');
$this->form_validation->set_rules('pincode','Pincode','required|min_length[6]|max_length[6]|edit_unique[app_pincode.pincode.id.'.$id.']');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['country_id'] = $this->input->post('country_id');
            $data['state_id'] = $this->input->post('state_id');
            $data['city_id'] = $this->input->post('city_id');
            $data['pincode'] = $this->input->post('pincode');
            $data['status'] = $this->input->post('status');
	        $data['updated'] = get_dateTime();
            $data['updatedBy'] = getUser('users_id');         
		
		    $this->db->where('id',$id);
		 	$result = $this->db->update('app_pincode',$data);
           
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
 public function get_app_pincode($rowno=0){
      
       $filter['name']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_app_pincode('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_app_pincode('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','app_pincode');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
 public function delete_app_pincode(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('app_pincode',$data);
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
    
    ///////////######### END Pincode ###########///////////
    
    //////////####### START METAL ########///////////////
    
      public function metals(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Metals';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_metals/';
			$this->load->view('include/header',$title);
            $this->load->view('metals');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_metal($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('metal_name','Metal Name', 'required');
$this->form_validation->set_rules('metal_price','Metal Price', 'required');
$this->form_validation->set_rules('metal_unit_id','Metal Unit', 'required');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['metal_name'] = $this->input->post('metal_name');
            $data['metal_price'] = $this->input->post('metal_price');
            $data['metal_weight'] = $this->input->post('metal_weight');
            $data['metal_unit_id'] = $this->input->post('metal_unit_id');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');         
			$result = $this->db->insert('metal',$data);
           
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
$id = $this->input->post('metal_id');         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('metal_name','Metal Name', 'required');
$this->form_validation->set_rules('metal_unit_id','Metal Unit', 'required');


if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['metal_name'] = $this->input->post('metal_name');
            $data['metal_price'] = $this->input->post('metal_price');
            $data['metal_unit_id'] = $this->input->post('metal_unit_id');
            
            $data['G24_carot'] = $this->input->post('G24_carot');
            $data['G22_carot'] = $this->input->post('G22_carot');
            $data['G18_carot'] = $this->input->post('G18_carot');
            $data['G999'] = $this->input->post('G999');
                
            $data['SCB'] = $this->input->post('SCB');
            $data['S91'] = $this->input->post('S91');
            $data['SPC'] = $this->input->post('SPC');
            $data['SSSP'] = $this->input->post('SSSP');
            $data['S999'] = $this->input->post('S999');
            
            $data['Exchange_SCB'] = $this->input->post('Exchange_SCB');
            $data['Exchange_S91'] = $this->input->post('Exchange_S91');
            $data['Exchange_SPC'] = $this->input->post('Exchange_SPC');
            $data['Exchange_SSSP'] = $this->input->post('Exchange_SSSP');
            $data['Exchange_S999'] = $this->input->post('Exchange_S999');
                
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		    $this->db->where('metal_id',$id);
			$result = $this->db->update('metal',$data);
           
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
  public function get_metals($rowno=0){
      
       $filter['metal_name'] = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_metals('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_metals('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','categories');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_metal(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('metal_id',$id);
          $result = $this->db->update('metal',$data);
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
    
    /////////####### END METAL ########////////////
    
     //////////####### START DOCUMENT ########///////////////
    



  public function document_type(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Document Types';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_document_type/';
			$this->load->view('include/header',$title);
            $this->load->view('document_type');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_document_type($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Documnet Type', 'required');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');         
			$result = $this->db->insert('document_type',$data);
           
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
$this->form_validation->set_rules('name','Documnet Type', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		    $this->db->where('id',$id);
			$result = $this->db->update('document_type',$data);
           
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
  public function get_document_type($rowno=0){
      
      $filter['name']  = $_POST['filterOne']; 
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_document_type('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_document_type('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','document_type');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_document_type(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('document_type',$data);
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
  
  
  
  
  
    public function document_category(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Document Categories';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_document_category/';
			$this->load->view('include/header',$title);
            $this->load->view('document_category');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_document_category($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Document Name', 'required');
$this->form_validation->set_rules('document_type_id','Document Type ', 'required');
$this->form_validation->set_rules('doc_num_length','Document Number Length', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            $data['doc_num_length'] = $this->input->post('doc_num_length');
            $data['name'] = $this->input->post('name');
            $data['document_type_id'] = $this->input->post('document_type_id');
            $data['side'] = $this->input->post('side');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');         
			$result = $this->db->insert('document_category',$data);
           
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
$this->form_validation->set_rules('name','Document Name', 'required');
$this->form_validation->set_rules('document_type_id','Document Type ', 'required');
$this->form_validation->set_rules('doc_num_length','Document Number Length', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            $data['doc_num_length'] = $this->input->post('doc_num_length');
            $data['name'] = $this->input->post('name');
            $data['document_type_id'] = $this->input->post('document_type_id');
            $data['side'] = $this->input->post('side');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		    $this->db->where('id',$id);
			$result = $this->db->update('document_category',$data);
           
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
  public function get_document_category($rowno=0){
      
       $filter['name']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_document_category('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_document_category('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','document_category');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_document_category(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('document_category',$data);
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

 


  
  /////////////////######END DOCUMENT#######////////////////
    public function product_bulk_images(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Product Bulk Images';
	        $footer['tableData']   = 1;
             $footer['dataLink']   = base_url().'master/get_product_bulk_images/';
			$this->load->view('include/header',$title);
            $this->load->view('product_bulk_images');                
            $this->load->view('include/footer',$footer);            
			$this->load->view('include/bulkData');  
  }
    public function add_product_bulk_images(){

is_login(array('superadmin','admin'));
        $product_id = $this->input->post('product_id');
        $name = $this->input->post('name');
            
        $imageValue = $this->input->post('imageValue');
        if(!empty($imageValue) && isset($imageValue)){
            $data[$name] = $imageValue;
           $uploads_dir = 'uploads/product/';
            if(!file_exists($uploads_dir)) {
                  mkdir($uploads_dir, 0777, true);  //create directory if not exist
                  }
         if (copy("uploads/temp_images/".$imageValue,$uploads_dir.$imageValue)) {
          unlink("uploads/temp_images/".$imageValue);
          }
          
          $imgData = $this->db->get_where('product',array('product_id'=>$product_id));
           if($imgData->num_rows()>0){
             $img =  $imgData->row()->$name;
             $load_url = 'uploads/product/'.$img;
			if(file_exists($load_url) && !empty($img))
			{
		  unlink("uploads/product/".$img);		
			}
           }
        }
		
	    $this->db->where('product_id',$product_id);
		$result = $this->db->update('product',$data);
       
        if($result){
            $response['status'] = 1;
            $response['msg']  = 'Data updated successfully';
        }else{
            $response['status'] = 0;
            $response['msg']  = 'Error try again';
        }
	    echo json_encode($response);
     
  }

    public function get_product_bulk_images($rowno=0){
      is_login(array('superadmin','admin'));
       $filter['pname']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree']; 
       $filter['category_id']  = $_POST['filterFour'];
     
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_product_bulk_images('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_product_bulk_images('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','product_bulk_images');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  
  
  //////////########### Product Stock ##########////////////////////
  
    /////////////////######END DOCUMENT#######////////////////
    public function product_stock(){  
  is_login(array('superadmin','admin'));
            
            
	        $title['page_title'] = 'Product Stock';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_product_stock/';
			$this->load->view('include/header',$title);
            $this->load->view('product_stock');                
            $this->load->view('include/footer',$footer);            
			//$this->load->view('include/bulkData'); 
		
  }
    public function add_product_stock(){
      ini_set('display_errors', 1);
      is_login(array('superadmin','admin'));

      $this->form_validation->set_error_delimiters('', '');
      $this->form_validation->set_rules('product_id[]','Product', 'required');
      if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
      } 
      else {      
     //print_r($_POST);
            $variation_ids = $this->input->post('variation_id');
            
            $stock_type = $this->input->post('stock_type'); 
            $remarks = $this->input->post('remarks');
            $quantity = $this->input->post('quantity');
            $product_id = $this->input->post('product_id');
           
            for($i=0;$i<count($product_id);$i++){
                $pid = $product_id[$i];  
               
                 if(!empty($variation_ids[$pid])){
                     $variation = $variation_ids[$pid];
                    $vCount = count($variation);
                    for($j=0;$j<$vCount;$j++){
                        $variation =  $variation[$j];
                        if(!empty($stock_type[$pid][$j])){
                $data['stock_type'] = $stock_type[$pid][$j];
            }else{
                $data['stock_type'] = '';
            }
            $data['variation_id'] = $variation_ids[$pid][$j];
            $data['remarks'] = $remarks[$pid][$j];
		    $data['quantity'] = $quantity[$pid][$j];
            $data['product_id'] = $product_id[$i];
		    $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');         
			$result = $this->db->insert('product_stock',$data);
			if($result)
            {
                $response['status'] = 1;
                $response['msg']  = 'Data Submited successfully';
            }
            else
            {
                $response['status'] = 0;
                $response['msg']  = 'Error try again';
            }
                    }
                 }else{
                //$variation_id = implode(",",$variation_ids[$id][$i]);
            if(!empty($stock_type[$i])){
                $data['stock_type'] = $stock_type[$i];
            }else{
                $data['stock_type'] = '';
            }
            $data['variation_id'] = '';
            $data['remarks'] = $remarks[$i];
		    $data['quantity'] = $quantity[$i];
            $data['product_id'] = $product_id[$i];
		    $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');         
			$result = $this->db->insert('product_stock',$data);
			if($result)
            {
                $response['status'] = 1;
                $response['msg']  = 'Data Submited successfully';
            }
            else
            {
                $response['status'] = 0;
                $response['msg']  = 'Error try again';
            }
                 }
        }
            
	}
    echo json_encode($response);
}
    public function get_product_stock($rowno=0){
    is_login(array('superadmin','admin'));  
       $filter['pname']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree']; 
       $filter['category_id']  = $_POST['filterFour'];
     
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_product_stock('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_product_stock('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','product_stock');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  
  //////////########### Product Stock #########/////////////////////
  
  
  /////////////////###### Start Product ##############////////////////////////////
  
  public function products(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Products';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_products/';
			$this->load->view('include/header',$title);
            $this->load->view('products');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function get_random_code(){
		$un = rand(1000000000,9999999999);
		$exist = $this->db->get_where('product',array('product_barcode'=>$un));
		if($exist->num_rows()>0)
		{
			$results = $this->get_random_code();
		}
		else
		{
				$results = $un;
				return $results;
		}
	}
  public function get_pKey(){
		$un = sprintf('%08x%08x%04x', mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xff));
		$exist = $this->db->get_where('product',array('product_key'=>$un));
		if($exist->num_rows()>0)
		{
		$results = get_pKey();
		}
		else
		{
		$results = $un;
		return  $results;
		}
	}
  public function import_bulk_product($param1 = ''){
    
	 if ($param1 == 'bulk'){
	     $path = 'uploads/excel/';
require_once APPPATH . "/third_party/PHPExcel/PHPExcel.php";

$config['upload_path'] = $path;
$config['allowed_types'] = 'xlsx|xls|csv';
$config['remove_spaces'] = TRUE;
$this->load->library('upload', $config);
$this->upload->initialize($config);            
if (!$this->upload->do_upload('uploadFile')) {
$error = array('error' => $this->upload->display_errors());
} else {
$data = array('upload_data' => $this->upload->data());
}




	 }
		


   
  }
  public function import_bulk_product00($param1 = ''){
    
	 if ($param1 == 'bulk')
		{
		move_uploaded_file($_FILES['productFile']['tmp_name'], 'uploads/productFile.xlsx');
		
			// Importing excel sheet for bulk student uploads

			include 'Simplexlsx.class.php';
			
			$xlsx = new SimpleXLSX('uploads/productFile.xlsx');
			
			list($num_cols, $num_rows) = $xlsx->dimension();
			$f = 0;
			
		
			foreach($xlsx->rows() as $r ) 
			{
				// Ignore the inital name row of excel file
				if ($f == 0)
				{
					$f++;
					continue;
				}
				
			
				for( $i=0; $i < $num_cols; $i++ )
				{
					if ($i == 0)    	$data['pname']		    =	$r[$i];
					else if ($i == 1)	$data['product_sku']		    =	$r[$i];
					else if ($i == 2)	$data['tax']		    =	$r[$i];
					else if ($i == 3)	$data['product_country_origin']		    =	$r[$i];
					else if ($i == 4)	$data['product_keyword']			=	$r[$i];
					else if ($i == 5)	$data['length']		=	$r[$i];
					else if ($i == 6)	$data['height']	    =	$r[$i];
					else if ($i == 7)	$data['width']        =	$r[$i];
					else if ($i == 8)	$data['packageWeight']		=	$r[$i];
					else if ($i == 9)	$data['product_specification']		=	$r[$i];
					 else if ($i == 10)	$data['product_keyword']		=	$r[$i];
					else if ($i == 11)	$data['long_description']   =	$r[$i];
					else if ($i == 12)	$data['product_meta']			=	$r[$i];
					else if ($i == 13)	$data['product_video']		=	$r[$i];
				
	
	      }
		     
		    $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');
	        
            $catt_id = $this->input->post('category_id');
            $catt_id = implode(",",$catt_id);
            $data['category_id'] = $catt_id;
            
            $crystal_id = $this->input->post('crystal_id');
            $crystal_id = implode(",",$crystal_id);
            $data['crystal_id'] = $crystal_id;
            
            
            $data['level_three_category_id']    = $this->input->post('level_three_category_id');
			$data['level_four_category_id']         = $this->input->post('level_four_category_id');
			$data['brand_id']    = $this->input->post('brand_id');
			$data['vendor_id']    = getUser('users_id');
		    $data['product_barcode']         =  $this->get_random_code();   
		    $data['brand_id']    = $this->input->post('brand_id');
            $data['priceFlag']         = 0;
            $data['product_key']      = $this->Common->random_key_string();
            $data['sub_category_id'] = $this->input->post('sub_category_id');
          
            print_r($data);
            
            
            	$result = $this->db->insert('product',$data);
           
    
           
              
 
		    		
			}
			
		      $response['status'] = 1;
              $response['msg']  = 'Data submited successfully';
              echo json_encode($response);
		}


   
  }
  public function add_product($param1=''){
      is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('pname','Product Name', 'required|is_unique[product.pname]');
$this->form_validation->set_rules('category_id[]','Level One Category Name', 'required');
// $this->form_validation->set_rules('sub_category_id','Level Two Category Name', 'required');
// $this->form_validation->set_rules('brand_id','Brand Name', 'required');
$this->form_validation->set_rules('crystal_id[]','Crystal', 'required');
$this->form_validation->set_rules('material_id[]','Material', 'required');
$this->form_validation->set_rules('price_type','Price Type', 'required');
$price_type = $this->input->post('price_type');
if($price_type==1){
    $this->form_validation->set_rules('product_mrp','Product MRP', 'required');
    $this->form_validation->set_rules('product_price','Product Selling Price', 'required');
}
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            
            

            $data['product_video'] = $this->input->post('product_video');
			
			 $level_three_category_id = $this->input->post('level_three_category_id'); 
            if(!empty($level_three_category_id)){
               $data['level_three_category_id'] = $level_three_category_id;
            }
			$level_four_category_id = $this->input->post('level_four_category_id');
			if(!empty($level_four_category_id)){
				$data['level_four_category_id'] = $level_four_category_id;
			}
			
			$data['brand_id']    = $this->input->post('brand_id');
			$data['vendor_id']    = getUser('users_id');
			if(!empty($barCode)){
			     $data['product_barcode']         =  $barCode;
			}
			else{
			 $data['product_barcode']         =  $this->get_random_code();   
			}
			
			$data['product_specification']         = $this->input->post('product_specification');
			$data['newArrival']         = $this->input->post('newArrival');
			$data['trandingItem']         = $this->input->post('trandingItem');
// 			$data['hotItem']         = $this->input->post('hotItem');
// 			$data['hsnCode']         = $this->input->post('hsnCode');
		if($this->input->post('tax')=='other'){
		        $data['tax']         = $this->input->post('tax_other');   
		}
		   else{
		   $data['tax']         = $this->input->post('tax');
		   }
			
			$data['length']         = $this->input->post('length');
			$data['height']         = $this->input->post('height');
			$data['width']         = $this->input->post('width');
			$data['packageWeight']         = $this->input->post('packageWeight');
			$data['product_country_origin']         = $this->input->post('product_country_origin');
			$data['search_keyword']         = $this->input->post('search_keyword');
        	$data['priceFlag']         = 0; //$this->input->post('priceFlag');
			$data['product_key']      = $this->Common->random_key_string();
            $data['sub_category_id'] = $this->input->post('sub_category_id');
            // $data['video'] = $this->input->post('video');
            $data['price_type'] = $this->input->post('price_type');
             $product_mrp     = $this->input->post('product_mrp');
             if(!empty($product_mrp)){
                     $data['product_mrp'] = $product_mrp;
             }
             $product_price = $this->input->post('product_price');
             if(!empty($product_price)){
                $data['product_price'] = $product_price;
             }
             
             $quantity = $this->input->post('quantity');
             if(!empty($quantity)){
                 $data['quantity'] = $quantity;
             }
             
            $data['product_sku'] = $this->input->post('product_sku');
            // $data['barcode']   = $this->get_random_code();
            $data['product_unit'] = $this->input->post('product_unit');
            $data['product_keyword'] = $this->input->post('product_keyword');
            $data['product_meta'] = $this->input->post('product_meta');
            $data['long_description'] = $this->input->post('long_description');
            $data['pname'] = $this->input->post('pname');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');
	        
            $catt_id = $this->input->post('category_id');
       
            $catt_id = implode(",",$catt_id);
            $data['category_id'] = $catt_id;
            
            $crystal_id = $this->input->post('crystal_id');
       
            $crystal_id = implode(",",$crystal_id);
            $data['crystal_id'] = $crystal_id;
	        
	         $material_id = $this->input->post('material_id');
       
            $material_id = implode(",",$material_id);
            $data['material_id'] = $material_id;
	        
	        
	        $tmpImage = $this->input->post('pimg');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['pimg'] = $tmpImage;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        $tmpImage = $this->input->post('pimg1');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['pimg1'] = $tmpImage;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        $tmpImage = $this->input->post('pimg2');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['pimg2'] = $tmpImage;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        $tmpImage = $this->input->post('pimg3');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['pimg3'] = $tmpImage;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        $tmpImage = $this->input->post('pimg4');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['pimg4'] = $tmpImage;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        
	        ///////////////
	        
			$result = $this->db->insert('product',$data);
           
           if($result)  {
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
$id = $this->input->post('product_id');         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('pname','Product Name', 'required');
$this->form_validation->set_rules('price_type','Price Type', 'required');
$price_type = $this->input->post('price_type');
if($price_type=='Fixed'){
    $this->form_validation->set_rules('product_mrp','Product MRP', 'required');
    $this->form_validation->set_rules('product_price','Product Selling Price', 'required');
}


if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            $data['product_video'] = $this->input->post('product_video');
            $level_three_category_id = $this->input->post('level_three_category_id');
            if(!empty($level_three_category_id)){
                $data['level_three_category_id'] = $level_three_category_id;
            }
             $level_four_category_id = $this->input->post('level_four_category_id');
            if(!empty($level_four_category_id)){
                $data['level_four_category_id'] = $level_four_category_id;
            }
            
// 			$data['level_three_category_id']    = $this->input->post('level_three_category_id');
// 			$data['level_four_category_id']         = $this->input->post('level_four_category_id');
			$data['brand_id']    = $this->input->post('brand_id');
			
			$data['product_specification']         = $this->input->post('product_specification');
			$data['newArrival']         = $this->input->post('newArrival');
			$data['trandingItem']         = $this->input->post('trandingItem');
    		if($this->input->post('tax')=='other'){
    		        $data['tax']         = $this->input->post('tax_other');   
    		}
    		   else{
		   $data['tax']         = $this->input->post('tax');
		   }
			$data['price_type'] = $this->input->post('price_type');
			$product_mrp     = $this->input->post('product_mrp');
             if(!empty($product_mrp)){
                     $data['product_mrp'] = $product_mrp;
             }
             $product_price = $this->input->post('product_price');
             if(!empty($product_price)){
                $data['product_price'] = $product_price;
             }
             
             $quantity = $this->input->post('quantity');
             if(!empty($quantity)){
                 $data['quantity'] = $quantity;
             }
             
			$data['length']         = $this->input->post('length');
			$data['height']         = $this->input->post('height');
			$data['width']         = $this->input->post('width');
			$data['packageWeight']         = $this->input->post('packageWeight');
			$data['product_country_origin']         = $this->input->post('product_country_origin');
			$data['search_keyword']         = $this->input->post('search_keyword');
            $data['sub_category_id'] = $this->input->post('sub_category_id');
            $data['product_sku'] = $this->input->post('product_sku');
            $data['product_unit'] = $this->input->post('product_unit');
            $data['product_keyword'] = $this->input->post('product_keyword');
            $data['product_meta'] = $this->input->post('product_meta');
            $data['long_description'] = $this->input->post('long_description');
            $data['pname'] = $this->input->post('pname');
            $check = $this->input->post('duplicate');
            
           
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
            
             $catt_id = $this->input->post('category_id');
       
            $catt_id = implode(",",$catt_id);
            $data['category_id'] = $catt_id;
            
            $crystal_id = $this->input->post('crystal_id');
       
            $crystal_id = implode(",",$crystal_id);
            $data['crystal_id'] = $crystal_id;
            
            
            
            $material_id = $this->input->post('material_id');
       
            $material_id = implode(",",$material_id);
            $data['material_id'] = $material_id;
            
            
            
          
            
            $tmpImage = $this->input->post('pimg');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['pimg'] = $tmpImage;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('product',array('product_id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->pimg;
                 $load_url = 'uploads/product/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/product/".$img);		
    			}
               }
	        }
		
		$tmpImage2 = $this->input->post('pimg1');
	        if(!empty($tmpImage2) && isset($tmpImage2)){
	            $data['pimg1'] = $tmpImage2;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage2,$uploads_dir.$tmpImage2)) {
              unlink("uploads/temp_images/".$tmpImage2);
              }
              
              $imgData = $this->db->get_where('product',array('product_id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->pimg1;
                 $load_url = 'uploads/product/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/product/".$img);		
    			}
               }
	        }
	        
	        $tmpImage3 = $this->input->post('pimg2');
	        if(!empty($tmpImage3) && isset($tmpImage3)){
	            $data['pimg2'] = $tmpImage3;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage3,$uploads_dir.$tmpImage3)) {
              unlink("uploads/temp_images/".$tmpImage3);
              }
              
              $imgData = $this->db->get_where('product',array('product_id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->pimg2;
                 $load_url = 'uploads/product/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/product/".$img);		
    			}
               }
	        }
	        
	        	$tmpImage4 = $this->input->post('pimg3');
	        if(!empty($tmpImage4) && isset($tmpImage4)){
	            $data['pimg3'] = $tmpImage4;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage4,$uploads_dir.$tmpImage4)) {
              unlink("uploads/temp_images/".$tmpImage4);
              }
              
              $imgData = $this->db->get_where('product',array('product_id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->pimg3;
                 $load_url = 'uploads/product/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/product/".$img);		
    			}
               }
	        }
	        
	        $tmpImage5 = $this->input->post('pimg4');
	        if(!empty($tmpImage5) && isset($tmpImage5)){
	            $data['pimg4'] = $tmpImage5;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage5,$uploads_dir.$tmpImage5)) {
              unlink("uploads/temp_images/".$tmpImage5);
              }
              
              $imgData = $this->db->get_where('product',array('product_id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->pimg4;
                 $load_url = 'uploads/product/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/product/".$img);		
    			}
               }
	        }
	        
	        
		    if($check !='yes'){
		    $this->db->where('product_id',$id);
			$result = $this->db->update('product',$data);
		  
		    }else{
		     $data['duplicate'] = $check;
		      $result = $this->db->insert('product',$data);
		    }
		  
		    
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
 
 
 
 
 
  public function add_product000($param1=''){
      is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('pname','Product Name', 'required|is_unique[product.pname]');
$this->form_validation->set_rules('category_id[]','Level One Category Name', 'required');
// $this->form_validation->set_rules('sub_category_id','Level Two Category Name', 'required');
// $this->form_validation->set_rules('brand_id','Brand Name', 'required');
$this->form_validation->set_rules('crystal_id[]','Crystal', 'required');
$this->form_validation->set_rules('material_id[]','Material', 'required');
$this->form_validation->set_rules('price_type','Price Type', 'required');
$price_type = $this->input->post('price_type');
if($price_type==1){
    $this->form_validation->set_rules('product_mrp','Product MRP', 'required');
    $this->form_validation->set_rules('product_price','Product Selling Price', 'required');
}
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            
            

            $data['product_video'] = $this->input->post('product_video');
			
			 $level_three_category_id = $this->input->post('level_three_category_id'); 
            if(!empty($level_three_category_id)){
               $data['level_three_category_id'] = $level_three_category_id;
            }
			$level_four_category_id = $this->input->post('level_four_category_id');
			if(!empty($level_four_category_id)){
				$data['level_four_category_id'] = $level_four_category_id;
			}
			
			$data['brand_id']    = $this->input->post('brand_id');
			$data['vendor_id']    = getUser('users_id');
			if(!empty($barCode)){
			     $data['product_barcode']         =  $barCode;
			}
			else{
			 $data['product_barcode']         =  $this->get_random_code();   
			}
			
			$data['product_specification']         = $this->input->post('product_specification');
			$data['newArrival']         = $this->input->post('newArrival');
			$data['trandingItem']         = $this->input->post('trandingItem');
// 			$data['hotItem']         = $this->input->post('hotItem');
// 			$data['hsnCode']         = $this->input->post('hsnCode');
		if($this->input->post('tax')=='other'){
		        $data['tax']         = $this->input->post('tax_other');   
		}
		   else{
		   $data['tax']         = $this->input->post('tax');
		   }
			
			$data['length']         = $this->input->post('length');
			$data['height']         = $this->input->post('height');
			$data['width']         = $this->input->post('width');
			$data['packageWeight']         = $this->input->post('packageWeight');
			$data['product_country_origin']         = $this->input->post('product_country_origin');
			$data['search_keyword']         = $this->input->post('search_keyword');
        	$data['priceFlag']         = 0; //$this->input->post('priceFlag');
			$data['product_key']      = $this->Common->random_key_string();
            $data['sub_category_id'] = $this->input->post('sub_category_id');
            // $data['video'] = $this->input->post('video');
            $data['price_type'] = $this->input->post('price_type');
             $product_mrp     = $this->input->post('product_mrp');
             if(!empty($product_mrp)){
                     $data['product_mrp'] = $product_mrp;
             }
             $product_price = $this->input->post('product_price');
             if(!empty($product_price)){
                $data['product_price'] = $product_price;
             }
             
             $quantity = $this->input->post('quantity');
             if(!empty($quantity)){
                 $data['quantity'] = $quantity;
             }
             
            $data['product_sku'] = $this->input->post('product_sku');
            // $data['barcode']   = $this->get_random_code();
            $data['product_unit'] = $this->input->post('product_unit');
            $data['product_keyword'] = $this->input->post('product_keyword');
            $data['product_meta'] = $this->input->post('product_meta');
            $data['long_description'] = $this->input->post('long_description');
            $data['pname'] = $this->input->post('pname');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');
	        
            $catt_id = $this->input->post('category_id');
       
            $catt_id = implode(",",$catt_id);
            $data['category_id'] = $catt_id;
            
            $crystal_id = $this->input->post('crystal_id');
       
            $crystal_id = implode(",",$crystal_id);
            $data['crystal_id'] = $crystal_id;
	        
	         $material_id = $this->input->post('material_id');
       
            $material_id = implode(",",$material_id);
            $data['material_id'] = $material_id;
	        
	        
	        $tmpImage = $this->input->post('pimg');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['pimg'] = $tmpImage;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        $tmpImage = $this->input->post('pimg1');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['pimg1'] = $tmpImage;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        $tmpImage = $this->input->post('pimg2');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['pimg2'] = $tmpImage;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        $tmpImage = $this->input->post('pimg3');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['pimg3'] = $tmpImage;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        $tmpImage = $this->input->post('pimg4');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['pimg4'] = $tmpImage;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        
	        ///////////////
	        
			$result = $this->db->insert('product',$data);
           
           if($result)  {
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
$id = $this->input->post('product_id');         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('pname','Product Name', 'required');
$this->form_validation->set_rules('price_type','Price Type', 'required');
$price_type = $this->input->post('price_type');
if($price_type=='Fixed'){
    $this->form_validation->set_rules('product_mrp','Product MRP', 'required');
    $this->form_validation->set_rules('product_price','Product Selling Price', 'required');
}


if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
             $data['product_video'] = $this->input->post('product_video');
			$data['level_three_category_id']    = $this->input->post('level_three_category_id');
			$data['level_four_category_id']         = $this->input->post('level_four_category_id');
			$data['brand_id']    = $this->input->post('brand_id');
			
			$data['product_specification']         = $this->input->post('product_specification');
			$data['newArrival']         = $this->input->post('newArrival');
			$data['trandingItem']         = $this->input->post('trandingItem');
    		if($this->input->post('tax')=='other'){
    		        $data['tax']         = $this->input->post('tax_other');   
    		}
    		   else{
		   $data['tax']         = $this->input->post('tax');
		   }
			$data['price_type'] = $this->input->post('price_type');
			$product_mrp     = $this->input->post('product_mrp');
             if(!empty($product_mrp)){
                     $data['product_mrp'] = $product_mrp;
             }
             $product_price = $this->input->post('product_price');
             if(!empty($product_price)){
                $data['product_price'] = $product_price;
             }
             
             $quantity = $this->input->post('quantity');
             if(!empty($quantity)){
                 $data['quantity'] = $quantity;
             }
             
			$data['length']         = $this->input->post('length');
			$data['height']         = $this->input->post('height');
			$data['width']         = $this->input->post('width');
			$data['packageWeight']         = $this->input->post('packageWeight');
			$data['product_country_origin']         = $this->input->post('product_country_origin');
			$data['search_keyword']         = $this->input->post('search_keyword');
            $data['sub_category_id'] = $this->input->post('sub_category_id');
            $data['product_sku'] = $this->input->post('product_sku');
            $data['product_unit'] = $this->input->post('product_unit');
            $data['product_keyword'] = $this->input->post('product_keyword');
            $data['product_meta'] = $this->input->post('product_meta');
            $data['long_description'] = $this->input->post('long_description');
            $data['pname'] = $this->input->post('pname');
           
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
            
             $catt_id = $this->input->post('category_id');
       
            $catt_id = implode(",",$catt_id);
            $data['category_id'] = $catt_id;
            
            $crystal_id = $this->input->post('crystal_id');
       
            $crystal_id = implode(",",$crystal_id);
            $data['crystal_id'] = $crystal_id;
            
            
            
            $material_id = $this->input->post('material_id');
       
            $material_id = implode(",",$material_id);
            $data['material_id'] = $material_id;
            
            
            
          
            
            $tmpImage = $this->input->post('pimg');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['pimg'] = $tmpImage;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('product',array('product_id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->pimg;
                 $load_url = 'uploads/product/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/product/".$img);		
    			}
               }
	        }
		
		$tmpImage2 = $this->input->post('pimg1');
	        if(!empty($tmpImage2) && isset($tmpImage2)){
	            $data['pimg1'] = $tmpImage2;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage2,$uploads_dir.$tmpImage2)) {
              unlink("uploads/temp_images/".$tmpImage2);
              }
              
              $imgData = $this->db->get_where('product',array('product_id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->pimg1;
                 $load_url = 'uploads/product/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/product/".$img);		
    			}
               }
	        }
	        
	        $tmpImage3 = $this->input->post('pimg2');
	        if(!empty($tmpImage3) && isset($tmpImage3)){
	            $data['pimg2'] = $tmpImage3;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage3,$uploads_dir.$tmpImage3)) {
              unlink("uploads/temp_images/".$tmpImage3);
              }
              
              $imgData = $this->db->get_where('product',array('product_id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->pimg2;
                 $load_url = 'uploads/product/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/product/".$img);		
    			}
               }
	        }
	        
	        	$tmpImage4 = $this->input->post('pimg3');
	        if(!empty($tmpImage4) && isset($tmpImage4)){
	            $data['pimg3'] = $tmpImage4;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage4,$uploads_dir.$tmpImage4)) {
              unlink("uploads/temp_images/".$tmpImage4);
              }
              
              $imgData = $this->db->get_where('product',array('product_id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->pimg3;
                 $load_url = 'uploads/product/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/product/".$img);		
    			}
               }
	        }
	        
	        $tmpImage5 = $this->input->post('pimg4');
	        if(!empty($tmpImage5) && isset($tmpImage5)){
	            $data['pimg4'] = $tmpImage5;
	           $uploads_dir = 'uploads/product/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage5,$uploads_dir.$tmpImage5)) {
              unlink("uploads/temp_images/".$tmpImage5);
              }
              
              $imgData = $this->db->get_where('product',array('product_id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->pimg4;
                 $load_url = 'uploads/product/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/product/".$img);		
    			}
               }
	        }
		
		    $this->db->where('product_id',$id);
			$result = $this->db->update('product',$data);
           
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
  public function insertBulkProduct(){
      ini_set('display_errors', 1);
    $dataCheck = $this->db->get('temp_category');
    if($dataCheck->num_rows()>0){
        $result = $dataCheck->result();
        foreach($result as $row){
            $category = $row->collection;
            if(!empty($category)){
                $cateData['name'] = $category;
            }
            $checkCat = $this->db->get_where('product_category',array('name'=>$category));
            if($checkCat->num_rows()>0){
                $category_id = $checkCat->row()->product_category_id;
                $cateData['updated'] = get_dateTime();
    	        $cateData['updatedBy'] = getUser('users_id');
                $this->db->where('product_category_id',$category_id);
                $this->db->update('product_category',$cateData);
            }else{
                $cateData['status'] = 'Active';
                $cateData['added'] = get_dateTime();
    	        $cateData['addedBy'] = getUser('users_id');
                $this->db->insert('product_category',$cateData);
                $category_id = $this->db->insert_id();
            }
            
            $name = $row->name;
            $description = $row->description;
            $pimg = $row->productImageUrl;
            $sku = $row->sku;
            $ribbon = $row->ribbon;
            $price = $row->price;
            $visible = $row->visible;
            $discountValue = $row->discountValue;
            $mrp  = $discountValue+$price;
            $qty = $row->inventory;
            $weight = $row->weight;
            $unit = $row->productOptionName1;
            if(!empty($unit)){
            $unitData['unit_name'] = $unit;
            
            $checkUnit = $this->db->get_where('product_unit',array('unit_name'=>$unit));
            if($checkUnit->num_rows()>0){
                $product_unit = $checkUnit->row()->id;
                $unitData['updated'] = get_dateTime();
    	        $unitData['updatedBy'] = getUser('users_id');
                $this->db->where('id',$product_unit);
                $this->db->update('product_unit',$unitData);
            }else{
                $unitData['status'] = 'Active';
                $unitData['added'] = get_dateTime();
    	        $unitData['addedBy'] = getUser('users_id');
                $this->db->insert('product_unit',$unitData);
                $product_unit = $this->db->insert_id();
            }
            }
            $brand = $row->brand;
            
            $productOptionType1 = $row->productOptionType1;
            $productOptionDescription1 = $row->productOptionDescription1;
            
			$data['vendor_id']    = getUser('users_id');
			$data['product_barcode']         =  $this->get_random_code();
			$data['product_specification']         = $productOptionDescription1;
			$data['newArrival']         = 1;
			$data['trandingItem']         = 1;
			$data['width']         = $weight;
			$data['priceFlag']         = 0; 
			$data['product_key']      = $this->Common->random_key_string();
			$data['price_type'] = 'Fixed';
			$data['product_mrp'] = $mrp;
            $data['product_price'] = $price;
            $data['quantity'] = $qty;
            $data['product_sku'] = $sku;
            $data['long_description'] = $description;
            $data['pname'] = $name;
            if($visible=='TRUE'){
                $data['status'] = 'Active';
            }else{
                $data['status'] = 'Deactive';
            }
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');
	        
            $data['category_id'] = $category_id;
            if(!empty($product_unit)){
			$data['product_unit'] = $product_unit;
            }
			$data['ribbon'] = $ribbon;
			$data['productOptionType1'] = $productOptionType1;
			$data['productOptionDescription1'] = $productOptionDescription1;
			
			$result = $this->db->insert('product',$data);
           
           if($result)  {
             
             echo 'Data submited successfully';
          }
           else
           {
      
             echo  'Error try again';
           }
            
            
        }
    }
  }
  public function get_products($rowno=0){
    is_login(array('superadmin','admin'));   
       $filter['pname']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree']; 
       $filter['category_id']  = $_POST['filterFour'];
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_products('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_products('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','products');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_product(){
    is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('product_id',$id);
          $result = $this->db->update('product',$data);
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
  
    public function model_products(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Products';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_model_products/';
			$this->load->view('include/header',$title);
            $this->load->view('model_products');                
            $this->load->view('include/footer',$footer);            
 
  }
  
    public function bulk_status_upload($param1=''){
      is_login(array('superadmin','admin'));
      if($param1=='update'){

$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('product_id[]','Product', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {      
    // print_r($_POST);
    
            $status = $this->input->post('status'); 
            
             $product_id = $this->input->post('product_id'); 
            for($i=0;$i<count($product_id);$i++){
                 $id = $product_id[$i];  
            if(isset($_POST['status'][$id])){
            $data['status'] = 'Active';
            }else{
                $data['status'] = 'Deactive';
            }
                  

		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         

		    $this->db->where('product_id',$id);
			$result = $this->db->update('product',$data);
            }
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
  
  public function get_model_products($rowno=0){
      is_login(array('superadmin','admin')); 
       $filter['pname']  = $_POST['filterOne_model']; 
      $filter['status']= $_POST['filterTwo_model']; 
      $filter['isDelete'] = $_POST['filterThree_model']; 
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_model_products('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_model_products('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','model_products');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  
  ///////////////####### End Product#############/////////////////////////////
  
  //////////////######## Open Crystal ###########///////////////////////
  
  public function crystal(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Crystal';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_crystal/';
			$this->load->view('include/header',$title);
            $this->load->view('crystal');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_crystal($param1=''){
     is_login(array('superadmin','admin'));
      if($param1=='add'){
         
      $this->form_validation->set_error_delimiters('', '');
      $this->form_validation->set_rules('title','Title', 'required|is_unique[crystal.title]');
      // $this->form_validation->set_rules('barcode','', '|is_unique[product.barcode]');

      if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
      } 
      else {
         
      $data['title'] = $this->input->post('title');
      $data['description'] = $this->input->post('description');
      $data['crystal_keyword'] = $this->input->post('crystal_keyword');
      $data['meta_description'] = $this->input->post('meta_description');
      $data['status'] = 'Active';
      $data['added'] = get_dateTime();
      $data['addedBy'] = getUser('users_id');
        
      $tmpImage = $this->input->post('img');
      if(!empty($tmpImage) && isset($tmpImage)){
      $data['img'] = $tmpImage;
      $uploads_dir = 'uploads/crystal/';
      if(!file_exists($uploads_dir)) {
      mkdir($uploads_dir, 0777, true);  //create directory if not exist
      }
      if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
      unlink("uploads/temp_images/".$tmpImage);
      }
     }
	        $tmpImage = $this->input->post('img1');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['img1'] = $tmpImage;
	           $uploads_dir = 'uploads/crystal/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        $tmpImage = $this->input->post('img2');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['img2'] = $tmpImage;
	           $uploads_dir = 'uploads/crystal/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
			$result = $this->db->insert('crystal',$data);
           
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
$this->form_validation->set_rules('title','Title', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
      $response['status'] = 0;
      $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['crystal_keyword'] = $this->input->post('crystal_keyword');
            $data['meta_description'] = $this->input->post('meta_description');
           
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
            
            $tmpImage = $this->input->post('img');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['img'] = $tmpImage;
	           $uploads_dir = 'uploads/crystal/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('crystal',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->img;
                 $load_url = 'uploads/crystal/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/crystal/".$img);		
    			}
               }
	        }
		
		    $tmpImage = $this->input->post('img1');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['img1'] = $tmpImage;
	           $uploads_dir = 'uploads/crystal/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('crystal',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->img1;
                 $load_url = 'uploads/crystal/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/crystal/".$img);		
    			}
               }
	        }
	        
	        $tmpImage = $this->input->post('img2');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['img2'] = $tmpImage;
	           $uploads_dir = 'uploads/crystal/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('crystal',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->img2;
                 $load_url = 'uploads/crystal/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/crystal/".$img);		
    			}
               }
	        }
		
		    $this->db->where('id',$id);
			$result = $this->db->update('crystal',$data);
           
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
  public function get_crystal($rowno=0){
     is_login(array('superadmin','admin'));
       $filter['title']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree']; 
     
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_crystal('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_crystal('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','crystal');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_crystal(){
    is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('crystal',$data);
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
  
  /////////////######## End Crystal #############//////////////////////
  
  ///////////////######### Open Product Unit ############////////////////////
  
  public function product_unit(){  
 is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Product Unit';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_product_unit/';
			$this->load->view('include/header',$title);
            $this->load->view('product_unit');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_product_unit($param1=''){
     is_login(array('superadmin','admin'));
      if($param1=='add'){
         
      $this->form_validation->set_error_delimiters('', '');
      $this->form_validation->set_rules('unit_name','Unit Name', 'required|is_unique[product_unit.unit_name]');
      // $this->form_validation->set_rules('barcode','', '|is_unique[product.barcode]');

      if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
      } 
      else {
         
      $data['unit_name'] = $this->input->post('unit_name');

      $data['status'] = 'Active';
      $data['added'] = get_dateTime();
      $data['addedBy'] = getUser('users_id');
        
			$result = $this->db->insert('product_unit',$data);
           
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
$this->form_validation->set_rules('unit_name','Unit Name', 'required');

if ($this->form_validation->run() == FALSE) {

              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['unit_name'] = $this->input->post('unit_name');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
          
		    $this->db->where('id',$id);
			$result = $this->db->update('product_unit',$data);
           
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
  public function get_product_unit($rowno=0){
     is_login(array('superadmin','admin'));
      $filter['unit_name']  = $_POST['filterOne']; 
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree']; 
     
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_product_unit('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_product_unit('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','product_unit');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_product_unit(){
    is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('product_unit',$data);
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
  
  //////////////########## End Product Unit ############////////////////////

 ////////######### Open Blog Category ##########////////////////
 
  public function blog_category(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Blog Categories';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_blog_category/';
			$this->load->view('include/header',$title);
            $this->load->view('blog_category');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_blog_category($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Blog Category Name', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            // $data['state_id'] = $this->input->post('state_id');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/blog_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }


			$result = $this->db->insert('blog_category',$data);
           
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
$this->form_validation->set_rules('name','Blog Category Name', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            // $data['state_id'] = $this->input->post('state_id');
            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
		    $data['edited'] = get_dateTime();
	        $data['editedBy'] = getUser('users_id');         
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/blog_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('blog_category',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/blog_category/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/blog_category/".$img);		
    			}
               }
	        }
		
		    $this->db->where('id',$id);
			$result = $this->db->update('blog_category',$data);
           
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
  public function get_blog_category($rowno=0){
  is_login(array('superadmin'));    
      $filter['name']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_blog_category('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_blog_category('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','blog_category');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_blog_category(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('blog_category',$data);
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
 
 ///////######### End Blog Category ##########/////////////////
 
 ///////######### Open Blog ##########/////////////////
 
  public function blog(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Blogs';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_blog/';
			$this->load->view('include/header',$title);
            $this->load->view('blog');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_blog($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');
$this->form_validation->set_rules('category_id','Category Name', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['category_id'] = $this->input->post('category_id');
            $data['blog_keyword'] = $this->input->post('blog_keyword');
            $data['description'] = $this->input->post('description');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/blog/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }


			$result = $this->db->insert('blog',$data);
           
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
$this->form_validation->set_rules('title','Title', 'required');
$this->form_validation->set_rules('category_id','Category Name', 'required');




if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['category_id'] = $this->input->post('category_id');
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = $this->input->post('status');
		    $data['edited'] = get_dateTime();
	        $data['editedBy'] = getUser('users_id');         
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/blog/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('blog',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/blog/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/blog/".$img);		
    			}
              }
	        }
		
		    $this->db->where('id',$id);
			$result = $this->db->update('blog',$data);
           
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
  public function get_blog($rowno=0){
      is_login(array('superadmin'));
      $filter['title']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_blog('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_blog('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','blog');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_blog(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('blog',$data);
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
 
 ///////######### End Blog ##########/////////////////
    
    ///////////############# Open Services #############///////////////////

    public function services(){  
 is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Services';
	         $footer['tableData']   = 1;
             $footer['dataLink']   = base_url().'master/get_services/';
			$this->load->view('include/header',$title);
            $this->load->view('services');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_service($param1=''){
    is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title','required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
           
            $data['title'] = $this->input->post('title');
            $data['service_sub_category_id'] = $this->input->post('service_sub_category_id');
            $data['service_keyword'] = $this->input->post('service_keyword');
            $data['short_description'] = $this->input->post('short_description');
            $data['long_description'] = $this->input->post('long_description');
            $data['price'] = $this->input->post('price');
            $data['time'] = $this->input->post('time');
            	if($this->input->post('tax')=='other'){
    		        $data['tax']         = $this->input->post('tax_other');   
    		}
    		   else{
		   $data['tax']         = $this->input->post('tax');
		   }
            $data['buffer_time'] = $this->input->post('buffer_time');
            // $data['sname'] = $this->input->post('sname');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');      
	        
	        $scatt_id = $this->input->post('service_category_id');
	        
            $scatt_id = implode(",",$scatt_id);
            $data['service_category_id'] = $scatt_id;
	        
	        $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/services/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
            
            $tmpImage = $this->input->post('image1');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image1'] = $tmpImage;
	           $uploads_dir = 'uploads/services/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        $tmpImage = $this->input->post('image2');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image2'] = $tmpImage;
	           $uploads_dir = 'uploads/services/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
			$result = $this->db->insert('services',$data);
           
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
$this->form_validation->set_rules('title','Title','required');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['service_category_id'] = $this->input->post('service_category_id');
            $data['service_sub_category_id'] = $this->input->post('service_sub_category_id');
            $data['service_keyword'] = $this->input->post('service_keyword');
            $data['short_description'] = $this->input->post('short_description');
            $data['long_description'] = $this->input->post('long_description');
            $data['price'] = $this->input->post('price');
            $data['time'] = $this->input->post('time');
            	if($this->input->post('tax')=='other'){
    		        $data['tax']         = $this->input->post('tax_other');   
    		}
    		   else{
		   $data['tax']         = $this->input->post('tax');
		   }
            $data['buffer_time'] = $this->input->post('buffer_time');
            $data['sname'] = $this->input->post('sname');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		    
		  //  image upload
		    $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/services/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('services',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/services/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/services/".$img);		
    			}
              }
	        }
	        
	        $tmpImage = $this->input->post('image1');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image1'] = $tmpImage;
	           $uploads_dir = 'uploads/services/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('services',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image1;
                 $load_url = 'uploads/services/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/services/".$img);		
    			}
              }
	        }
	        
	        $tmpImage = $this->input->post('image2');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image2'] = $tmpImage;
	           $uploads_dir = 'uploads/services/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('services',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image2;
                 $load_url = 'uploads/services/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/services/".$img);		
    			}
              }
	        }
	        // end image upload

	        
		    $this->db->where('id',$id);
			$result = $this->db->update('services',$data);
           
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
  public function get_services($rowno=0){
    is_login(array('superadmin','admin'));
      $filter['title']  = $_POST['filterOne']; 
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_services('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_services('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','services');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
 public function delete_services(){
   is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('services',$data);
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

//////////############# End Service #############//////////////////////
  
 ///////######### FAQ START ##########/////////////////
 
  public function faq(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'FAQS';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_faq/';
			$this->load->view('include/header',$title);
            $this->load->view('faq');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_faq($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('question','Question', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['question'] = $this->input->post('question');
            $data['answer'] = $this->input->post('answer');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

			$result = $this->db->insert('FAQ',$data);
           
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
$this->form_validation->set_rules('question','Question', 'required');


if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
           $data['question'] = $this->input->post('question');
            $data['answer'] = $this->input->post('answer');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		    $this->db->where('id',$id);
			$result = $this->db->update('FAQ',$data);
           
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
  public function get_faq($rowno=0){
     is_login(array('superadmin')); 
      $filter['title']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_faq('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_faq('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','faq');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
 public function delete_faq(){
   is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('FAQ',$data);
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
 

 ///////######### FAQ END##########/////////////////	
 ////////########refer Earn ##########/////////////////
 
 
  ////////########refer Earn END##########/////////////////

 ///////######### Open Payment Gateway ##########/////////////////
 
  public function payment_gateway(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Payment Gateways';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_payment_gateway/';
			$this->load->view('include/header',$title);
            $this->load->view('payment_gateway');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_payment_gateway($param1=''){
    is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');

if ($this->form_validation->run() == FALSE) {

              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['message'] = $this->input->post('message');
            $data['live_api'] = $this->input->post('live_api');
            $data['live_secret'] = $this->input->post('live_secret');
            $data['test_api'] = $this->input->post('test_api');
            $data['test_secret'] = $this->input->post('test_secret');
            $data['daily_limit'] = $this->input->post('daily_limit');
            $data['live_url'] = $this->input->post('live_url');
            $data['test_url'] = $this->input->post('test_url');
            $data['encrypt_key'] = $this->Common->random_key_string();
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
	        $tmpImage = $this->input->post('logo');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['logo'] = $tmpImage;
	           $uploads_dir = 'uploads/payment_gateway/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
			$result = $this->db->insert('payment_gateway',$data);
           
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
$this->form_validation->set_rules('name','Name', 'required');




if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
          $data['name'] = $this->input->post('name');
            $data['message'] = $this->input->post('message');
            $data['live_api'] = $this->input->post('live_api');
            $data['live_secret'] = $this->input->post('live_secret');
            $data['test_api'] = $this->input->post('test_api');
            $data['test_secret'] = $this->input->post('test_secret');
            $data['daily_limit'] = $this->input->post('daily_limit');
            $data['live_url'] = $this->input->post('live_url');
            $data['test_url'] = $this->input->post('test_url');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		    $tmpImage = $this->input->post('logo');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['logo'] = $tmpImage;
	           $uploads_dir = 'uploads/payment_gateway/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('payment_gateway',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->logo;
                 $load_url = 'uploads/payment_gateway/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/payment_gateway/".$img);		
    			}
              }
	        }
		
		    $this->db->where('id',$id);
			$result = $this->db->update('payment_gateway',$data);
           
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
  public function get_payment_gateway($rowno=0){
      is_login(array('superadmin'));
      $filter['title']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_payment_gateway('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_payment_gateway('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','payment_gateway');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_payment_gateway(){
  is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('payment_gateway',$data);
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
 
 ///////######### End Payment Type ##########/////////////////
  public function testimonials(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Testimonials';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_testimonials/';
			$this->load->view('include/header',$title);
            $this->load->view('testimonials');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_testimonials($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name',' Name','required|is_unique[testimonials.name]');
$this->form_validation->set_rules('title','Title','required');
$this->form_validation->set_rules('description',' Description ','required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
             $data['title'] = $this->input->post('title');
              $data['description'] = $this->input->post('description');
               $data['encrypt_key'] = $this->Common->random_key_string();
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/testimonials/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }


			$result = $this->db->insert('testimonials',$data);
           
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
$this->form_validation->set_rules('name',' Name', 'required');
$this->form_validation->set_rules('title','Title', 'required');
$this->form_validation->set_rules('description',' Description ','required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
             $data['title'] = $this->input->post('title');
              $data['description'] = $this->input->post('description');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/testimonials/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('testimonials',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/ testimonials/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/testimonials/".$img);		
    			}
               }
	        }
		
		    $this->db->where('id',$id);
			$result = $this->db->update('testimonials',$data);
           
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
  public function get_testimonials($rowno=0){
      
      $filter['name']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_testimonials('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_testimonials('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','testimonials');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_testimonials(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('testimonials',$data);
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
 
 ////////////////terms and codition start/////////////////
public function terms_condition(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Terms Condition';
	        $footer['tableData']   = 1;
            //$footer['dataLink']   = base_url().'master/get_terms_condition/';
        	$data['row'] = $this->db->get_where('pages',array('id'=>'2'))->result();
			$this->load->view('include/header',$title);
            $this->load->view('terms_condition',$data);                
            $this->load->view('include/footer');            
 
  }
public function add_terms_condition($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }

        $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }


			$result = $this->db->insert('pages',$data);
           
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
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = $this->input->post('status');
		          
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }
              
             
	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/pages/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/pages/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              }
		   
		   
		    	 $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }

	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->banner;
                 $load_url = 'uploads/banner/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/banner/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              }
           
          if($result)
          {
              $response['status'] = 1;
              $response['msg']  = $msg;
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

////////////////terms and codition End/////////////////
////////////////privancy start/////////////////
public function privacy(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Privacy Policies';
	        $footer['tableData']   = 1;
            //$footer['dataLink']   = base_url().'master/get_terms_condition/';
        	$data['row'] = $this->db->get_where('pages',array('id'=>'3'))->result();
			$this->load->view('include/header',$title);
            $this->load->view('privacy',$data);                
            $this->load->view('include/footer');            
 
  }
public function add_privacy($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }


    $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }

			$result = $this->db->insert('pages',$data);
           
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
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = $this->input->post('status');
		          
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }
              
             
	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/pages/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/pages/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              }
		   
           
           	 $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }

	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->banner;
                 $load_url = 'uploads/banner/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/banner/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              } 
           
           
           
          if($result)
          {
              $response['status'] = 1;
              $response['msg']  = $msg;
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

////////////////privancy start End////////////////

public function shipping_policy(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Shipping Policy ';
	        $footer['tableData']   = 1;
            //$footer['dataLink']   = base_url().'master/get_terms_condition/';
        	$data['row'] = $this->db->get_where('pages',array('id'=>'7'))->result();
			$this->load->view('include/header',$title);
            $this->load->view('shipping_policy',$data);                
            $this->load->view('include/footer');            
 
  }
public function add_shipping_policy($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }

    $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
			$result = $this->db->insert('pages',$data);
           
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
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = $this->input->post('status');
		          
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }
              
             
	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/pages/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/pages/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              }
		   
           
             
           	 $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }

	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->banner;
                 $load_url = 'uploads/banner/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/banner/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              } 
           
           
          if($result)
          {
              $response['status'] = 1;
              $response['msg']  = $msg;
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



public function saller_agreement(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Saller Agreement  ';
	        $footer['tableData']   = 1;
            //$footer['dataLink']   = base_url().'master/get_terms_condition/';
        	$data['row'] = $this->db->get_where('pages',array('id'=>'9'))->result();
			$this->load->view('include/header',$title);
            $this->load->view('saller_agreement',$data);                
            $this->load->view('include/footer');            
 
  }
public function add_saller_agreement($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }

           $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        


			$result = $this->db->insert('pages',$data);
           
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
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = $this->input->post('status');
		          
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }
              
             
	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/pages/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/pages/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              }
		   
         $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }

	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->banner;
                 $load_url = 'uploads/banner/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/banner/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              } 
             
           
           
           
          if($result)
          {
              $response['status'] = 1;
              $response['msg']  = $msg;
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


public function payment_policy(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Payment Policy ';
	        $footer['tableData']   = 1;
            //$footer['dataLink']   = base_url().'master/get_terms_condition/';
        	$data['row'] = $this->db->get_where('pages',array('id'=>'8'))->result();
			$this->load->view('include/header',$title);
            $this->load->view('payment_policy',$data);                
            $this->load->view('include/footer');            
 
  }
public function add_payment_policy($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }



            $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
			$result = $this->db->insert('pages',$data);
           
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
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = $this->input->post('status');
		          
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }
              
             
	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/pages/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/pages/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              }
		   
           
           
            $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }

	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->banner;
                 $load_url = 'uploads/banner/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/banner/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              } 
           
           
           
           
           
          if($result)
          {
              $response['status'] = 1;
              $response['msg']  = $msg;
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
  
  
  public function Press_releases_delcemiration(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Press Releases /Delcemiration ';
	        $footer['tableData']   = 1;
            //$footer['dataLink']   = base_url().'master/get_terms_condition/';
        	$data['row'] = $this->db->get_where('pages',array('id'=>'10'))->result();
			$this->load->view('include/header',$title);
            $this->load->view('Press_releases_delcemiration',$data);                
            $this->load->view('include/footer');            
 
  }
public function add_Press_releases_delcemiration($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }



            $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }

			$result = $this->db->insert('pages',$data);
           
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
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = $this->input->post('status');
		          
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }
              
             
	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/pages/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/pages/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              }
		   
           
            $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }

	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->banner;
                 $load_url = 'uploads/banner/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/banner/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              } 
           
           
          if($result)
          {
              $response['status'] = 1;
              $response['msg']  = $msg;
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

////////////////Refund policy start/////////////////
public function refund(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Refund Policies';
	        $footer['tableData']   = 1;
            //$footer['dataLink']   = base_url().'master/get_terms_condition/';
        	$data['row'] = $this->db->get_where('pages',array('id'=>'4'))->result();
			$this->load->view('include/header',$title);
            $this->load->view('refund',$data);                
            $this->load->view('include/footer');            
 
  }
public function add_refund($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }


            $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        
	        
			$result = $this->db->insert('pages',$data);
           
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
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = $this->input->post('status');
		          
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }
              
             
	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/pages/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/pages/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              }
		   
           
             
            $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }

	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->banner;
                 $load_url = 'uploads/banner/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/banner/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              } 
           
           
          if($result)
          {
              $response['status'] = 1;
              $response['msg']  = $msg;
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
 ////////////////Refund policy End////////////////
////////////////Refund policy start/////////////////
public function cancellation(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Cancellations ';
	        $footer['tableData']   = 1;
            //$footer['dataLink']   = base_url().'master/get_terms_condition/';
        	$data['row'] = $this->db->get_where('pages',array('id'=>'5'))->result();
			$this->load->view('include/header',$title);
            $this->load->view('cancellation',$data);                
            $this->load->view('include/footer');            
 
  }
public function add_cancellation($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }


  $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
			$result = $this->db->insert('pages',$data);
           
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
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = $this->input->post('status');
		          
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }
              
             
	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/pages/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/pages/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              }
		   
             
            $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }

	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->banner;
                 $load_url = 'uploads/banner/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/banner/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              } 
           
          if($result)
          {
              $response['status'] = 1;
              $response['msg']  = $msg;
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
 ////////////////Refund policy End////////////////

public function logo(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Logo ';
	        $footer['tableData']   = 1;
        	$data['row'] = $this->db->get_where('pages',array('id'=>'11'))->result();
			$this->load->view('include/header',$title);
            $this->load->view('logo',$data);                
            $this->load->view('include/footer');            
 
  }
public function add_logo($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            // $data['description'] = $this->input->post('description');
            // $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('logo');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['logo'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }


			$result = $this->db->insert('pages',$data);
           
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
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            // $data['description'] = $this->input->post('description');
            $data['status'] = $this->input->post('status');
		          
		
		 $tmpImage = $this->input->post('logo');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['logo'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }
              
             
	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->logo;
                 $load_url = 'uploads/pages/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/pages/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              }
		   
           
          if($result)
          {
              $response['status'] = 1;
              $response['msg']  = $msg;
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

//////////////// About As  start/////////////////
 
public function about_us(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'About Us';
	        $footer['tableData']   = 1;
        	$data['row'] = $this->db->get_where('pages',array('id'=>'1'))->result();
			$this->load->view('include/header',$title);
            $this->load->view('about_us',$data);                
            $this->load->view('include/footer');            
 
  }
public function add_about_us($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }



             $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }

			$result = $this->db->insert('pages',$data);
           
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
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['status'] = $this->input->post('status');
		          
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }
              
             
	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/pages/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/pages/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              }
		   
		   
		   
		   	 $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }

	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->banner;
                 $load_url = 'uploads/banner/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/banner/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              }
		   
		   
		   
		   
           
          if($result)
          {
              $response['status'] = 1;
              $response['msg']  = $msg;
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
 
//////////////// About As End/////////////////
//////////////// refer earn /////////////////
public function referral_setting(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Referral Setting ';
	        $footer['tableData']   = 1;
	         
         	$data['row'] = $this->db->get('reffer_setting');
         
			$this->load->view('include/header',$title);
            $this->load->view('referral_setting',$data);                
            $this->load->view('include/footer');            
 
  }
public function add_referral_setting($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
             $data['amount'] = $this->input->post('amount');
            $data['onSignUp'] = $this->input->post('onSignUp');
             $data['used_limit'] = $this->input->post('used_limit');

             

            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/referral_setting/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }


			$result = $this->db->insert('reffer_setting',$data);
           
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
$this->form_validation->set_rules('title','Title', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['amount'] = $this->input->post('amount');
            $data['onSignUp'] = $this->input->post('onSignUp');
             $data['used_limit'] = $this->input->post('used_limit');

            $data['status'] = $this->input->post('status');
		          
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/reffer_setting/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }
              
             
	        }
		 $imgData = $this->db->get_where('reffer_setting',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/referral_setting/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/referral_setting/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('reffer_setting',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('reffer_setting',$data);
                  		$msg = 'Data submited successfully';
              }
		   
           
          if($result)
          {
              $response['status'] = 1;
              $response['msg']  = $msg;
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
//////////////// refer earn End/////////////////

  //////////###### Open Contact Us #######//////////////
   
public function contact_us(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Contact Us';
	        $footer['tableData']   = 1;
            //$footer['dataLink']   = base_url().'master/get_terms_condition/';
        	$data['row'] = $this->db->get_where('pages',array('id'=>'6'))->result();
			$this->load->view('include/header',$title);
            $this->load->view('contact_us',$data);                
            $this->load->view('include/footer');            
 
  }
public function add_contact_us($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('contact_no','Contact No', 'required|regex_match[/^[0-9]{10}$/]');
$this->form_validation->set_rules('alt_contact_no','Alt Contact No', 'required|regex_match[/^[0-9]{10}$/]');
$this->form_validation->set_rules('email','Email Address','valid_email');


if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['contact_no'] = $this->input->post('contact_no');
            $data['alt_contact_no'] = $this->input->post('alt_contact_no');
            $data['email'] = $this->input->post('email');
            $data['address1'] = $this->input->post('address1');
            $data['address2'] = $this->input->post('address2');
            $data['map_link'] = $this->input->post('map_link');
            $data['added'] = get_dateTime();
            
	        $data['addedBy'] = getUser('users_id');  
	        
        $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/pages/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }

			$result = $this->db->insert('pages',$data);
           
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
$this->form_validation->set_rules('contact_no','Contact No', 'required|regex_match[/^[0-9]{10}$/]');
$this->form_validation->set_rules('alt_contact_no','Alt Contact No', 'required|regex_match[/^[0-9]{10}$/]');
$this->form_validation->set_rules('email','Email Address','required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['contact_no'] = $this->input->post('contact_no');
            $data['alt_contact_no'] = $this->input->post('alt_contact_no');
            $data['email'] = $this->input->post('email');
            $data['address1'] = $this->input->post('address1');
            $data['address2'] = $this->input->post('address2');
            $data['map_link'] = $this->input->post('map_link');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		   	 $tmpImage = $this->input->post('banner');
	        if(!empty($tmpImage) && isset($tmpImage)){
    	            $data['banner'] = $tmpImage;
	           $uploads_dir = 'uploads/banner/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (file_exists("uploads/temp_images/".$tmpImage)) {
                 copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage);
              unlink("uploads/temp_images/".$tmpImage);
              }

	        }
		 $imgData = $this->db->get_where('pages',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->banner;
                 $load_url = 'uploads/banner/'.$img;
    			if(file_exists($load_url) && !empty($img) && $img!=$tmpImage)
    			{
    		  unlink("uploads/banner/".$img);		
    			}
    			 $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');  
    			 $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
			
			$msg = 'Data updated successfully';
              }else{
                   $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id'); 
                  	$result = $this->db->insert('pages',$data);
                  		$msg = 'Data submited successfully';
              }
		   
		   
		
		    $this->db->where('id',$id);
			$result = $this->db->update('pages',$data);
           
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
 
//     //////////###### END Contact Us #######//////////////
 
    //////////////############# Promo Code Open ###########/////////////
    
  public function promo_code(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Product Promo Codes';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_promo_code/';
			$this->load->view('include/header',$title);
            $this->load->view('promo_code');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_promo_code($param1=''){
     is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('promo_code','Promo Code', 'required|is_unique[promo_codes.promo_code]');
$this->form_validation->set_rules('type','Type', 'required');
$this->form_validation->set_rules('message','Message', 'required');
$type = $this->input->post('type');
$product_id = $this->input->post('product_id');
if($type=='product'){
	$this->form_validation->set_rules('product_id[]','Product Name', 'required');
}else{
$this->form_validation->set_rules('level_one_cat_id[]','Level One Category', 'required');
$this->form_validation->set_rules('level_two_cat_id[]','Level Two Category', 'required');	
}

$this->form_validation->set_rules('start_date','Start Date', 'required');
$this->form_validation->set_rules('end_date','End Date', 'required');
$this->form_validation->set_rules('minimum_order_amount','Minimum Order Amount', 'required');
$this->form_validation->set_rules('discount','Discount', 'required');
$this->form_validation->set_rules('discount_type','Discount Type', 'required');
$this->form_validation->set_rules('repeat_usage','Repeat Usagerepeat Usage', 'required');
$repeat = $this->input->post('repeat_usage');
if($repeat=='allowed'){
$this->form_validation->set_rules('no_of_repeat_usage','No of Repeat Usage', 'required');
}
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            
            $data['type'] = $type;
            $level_one_cat_id = $this->input->post('level_one_cat_id');
            if(!empty($level_one_cat_id)){
            $level_one_cat_id = implode(",",$level_one_cat_id);
            $data['level_one_cat_id'] = $level_one_cat_id;
            }
            $level_two_cat_id = $this->input->post('level_two_cat_id');
            if(!empty($level_two_cat_id)){
            $level_two_cat_id = implode(",",$level_two_cat_id);
            $data['level_two_cat_id'] = $level_two_cat_id;
            }
            $level_three_cat_id = $this->input->post('level_three_cat_id');
            if(!empty($level_three_cat_id)){
            $level_three_cat_id = implode(",",$level_three_cat_id);
            $data['level_three_cat_id'] = $level_three_cat_id;
            }
            $level_four_cat_id = $this->input->post('level_four_cat_id');
            if(!empty($level_four_cat_id)){
            $level_four_cat_id = implode(",",$level_four_cat_id);
            $data['level_four_cat_id'] = $level_four_cat_id;
            }
            
            if(!empty($product_id)){
            $product_id = implode(",",$product_id);
            $data['product_id'] = $product_id;
            }
            $data['promo_code'] = $this->input->post('promo_code');
            $data['message'] = $this->input->post('message');
            $data['start_date'] = $this->input->post('start_date');
            $data['end_date'] = $this->input->post('end_date');
            // $data['no_of_users'] = $this->input->post('no_of_users');
            $data['minimum_order_amount'] = $this->input->post('minimum_order_amount');
            $data['discount'] = $this->input->post('discount');
            $data['discount_type'] = $this->input->post('discount_type');
            $data['max_discount_amount'] = $this->input->post('max_discount_amount');
            $data['repeat_usage'] = $this->input->post('repeat_usage');
            $data['no_of_repeat_usage'] = $this->input->post('no_of_repeat_usage');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');   
	      
	       $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/promo_code/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	      
			$result = $this->db->insert('promo_codes',$data);
           
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
		$this->form_validation->set_rules('promo_code','Promo Code', 'required');

		$this->form_validation->set_rules('type','Type', 'required');
		$this->form_validation->set_rules('message','Message', 'required');
		$type = $this->input->post('type');
		$product_id = $this->input->post('product_id');
		if($type=='product'){
			$this->form_validation->set_rules('product_id[]','Product Name', 'required');
		}else{
		$this->form_validation->set_rules('level_one_cat_id[]','Level One Category', 'required');
		$this->form_validation->set_rules('level_two_cat_id[]','Level Two Category', 'required');	
		}

		$this->form_validation->set_rules('start_date','Start Date', 'required');
		$this->form_validation->set_rules('end_date','End Date', 'required');
		$this->form_validation->set_rules('minimum_order_amount','Minimum Order Amount', 'required');
		$this->form_validation->set_rules('discount','Discount', 'required');
		$this->form_validation->set_rules('discount_type','Discount Type', 'required');
		$this->form_validation->set_rules('repeat_usage','Repeat Usagerepeat Usage', 'required');
		$repeat = $this->input->post('repeat_usage');
		if($repeat=='allowed'){
		$this->form_validation->set_rules('no_of_repeat_usage','No of Repeat Usage', 'required');
		}

		if ($this->form_validation->run() == FALSE) {
			
			
					  $response['status'] = 0;
					  $response['msg']  = validation_errors();
		} 
		else {
			
                        $data['type'] = $type;
            $level_one_cat_id = $this->input->post('level_one_cat_id');
            if(!empty($level_one_cat_id)){
            $level_one_cat_id = implode(",",$level_one_cat_id);
            $data['level_one_cat_id'] = $level_one_cat_id;
            }
            $level_two_cat_id = $this->input->post('level_two_cat_id');
            if(!empty($level_two_cat_id)){
            $level_two_cat_id = implode(",",$level_two_cat_id);
            $data['level_two_cat_id'] = $level_two_cat_id;
            }
            $level_three_cat_id = $this->input->post('level_three_cat_id');
            if(!empty($level_three_cat_id)){
            $level_three_cat_id = implode(",",$level_three_cat_id);
            $data['level_three_cat_id'] = $level_three_cat_id;
            }
            $level_four_cat_id = $this->input->post('level_four_cat_id');
            if(!empty($level_four_cat_id)){
            $level_four_cat_id = implode(",",$level_four_cat_id);
            $data['level_four_cat_id'] = $level_four_cat_id;
            }
            
            if(!empty($product_id)){
            $product_id = implode(",",$product_id);
            $data['product_id'] = $product_id;
            }
			
			$data['promo_code'] = $this->input->post('promo_code');
            $data['message'] = $this->input->post('message');
            $data['start_date'] = $this->input->post('start_date');
            $data['end_date'] = $this->input->post('end_date');
            // $data['no_of_users'] = $this->input->post('no_of_users');
            $data['minimum_order_amount'] = $this->input->post('minimum_order_amount');
            $data['discount'] = $this->input->post('discount');
            $data['discount_type'] = $this->input->post('discount_type');
            $data['max_discount_amount'] = $this->input->post('max_discount_amount');
            $data['repeat_usage'] = $this->input->post('repeat_usage');
            $data['no_of_repeat_usage'] = $this->input->post('no_of_repeat_usage');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		    
		    $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/promo_code/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('promo_codes',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/promo_code/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/promo_code/".$img);		
    			}
               }
	        }
		    
		    $this->db->where('id',$id);
			$result = $this->db->update('promo_codes',$data);
           
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
  public function get_promo_code($rowno=0){
      is_login(array('superadmin','admin'));
       $filter['promo_code']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_promo_code('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_promo_code('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','promo_code');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_promo_code(){
    is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('promo_codes',$data);
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
    
    /////////////############# Promo Code End #############/////////////
   
   //////////////############# Service Promo Code Open ###########/////////////
  public function service_promo_code(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Service Promo Codes';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_service_promo_code/';
			$this->load->view('include/header',$title);
            $this->load->view('service_promo_code');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_service_promo_code($param1=''){
     is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('promo_code','Promo Code', 'required|is_unique[service_promo_code.promo_code]');
$this->form_validation->set_rules('type','Type', 'required');
$this->form_validation->set_rules('message','Message', 'required');
$type = $this->input->post('type');
$service_id = $this->input->post('service_id');
if($type=='services'){
	$this->form_validation->set_rules('service_id[]','Product Name', 'required');
}elseif($type=='categories'){
    $this->form_validation->set_rules('service_category_id[]','Service Category', 'required');
    // $this->form_validation->set_rules('service_sub_category_id[]','Service Sub Category', 'required');	
}elseif($type=='service_provider'){
    $this->form_validation->set_rules('service_provider','Service Provider', 'required');
}

$this->form_validation->set_rules('start_date','Start Date', 'required');
$this->form_validation->set_rules('end_date','End Date', 'required');
$this->form_validation->set_rules('minimum_order_amount','Minimum Order Amount', 'required');
$this->form_validation->set_rules('discount','Discount', 'required');
$this->form_validation->set_rules('discount_type','Discount Type', 'required');
$this->form_validation->set_rules('repeat_usage','Repeat Usage', 'required');
$repeat = $this->input->post('repeat_usage');
if($repeat=='allowed'){
$this->form_validation->set_rules('no_of_repeat_usage','No of Repeat Usage', 'required');
}
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            
            $data['type'] = $type;
            $service_category_id = $this->input->post('service_category_id');
            if(!empty($service_category_id)){
            $service_category_ids = implode(",",$service_category_id);
            $data['service_category_id'] = $service_category_ids;
            }
            $service_sub_category_id = $this->input->post('service_sub_category_id');
            if(!empty($service_sub_category_id)){
            $service_sub_category_ids = implode(",",$service_sub_category_id);
            $data['service_sub_category_id'] = $service_sub_category_ids;
            }
           
            $service_provider = $this->input->post('service_provider');
            if(!empty($service_provider)){
            $data['service_provider'] = $service_provider;
            }
            
            if(!empty($service_id)){
            $service_ids = implode(",",$service_id);
            $data['service_id'] = $service_ids;
            }
            $data['promo_code'] = $this->input->post('promo_code');
            $data['message'] = $this->input->post('message');
            $data['start_date'] = $this->input->post('start_date');
            $data['end_date'] = $this->input->post('end_date');
            $data['minimum_order_amount'] = $this->input->post('minimum_order_amount');
            $data['discount'] = $this->input->post('discount');
            $data['discount_type'] = $this->input->post('discount_type');
            $data['max_discount_amount'] = $this->input->post('max_discount_amount');
            $data['repeat_usage'] = $this->input->post('repeat_usage');
            $data['no_of_repeat_usage'] = $this->input->post('no_of_repeat_usage');
            $data['status'] = $this->input->post('status');
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');   
	      
	       $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/service_promo_code/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	      
			$result = $this->db->insert('service_promo_code',$data);
           
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
$this->form_validation->set_rules('promo_code','Promo Code', 'required');

$this->form_validation->set_rules('type','Type', 'required');
$this->form_validation->set_rules('message','Message', 'required');
$type = $this->input->post('type');
$service_id = $this->input->post('service_id');
if($type=='services'){
	$this->form_validation->set_rules('service_id[]','Product Name', 'required');
}elseif($type=='categories'){
    $this->form_validation->set_rules('service_category_id[]','Service Category', 'required');
    // $this->form_validation->set_rules('service_sub_category_id[]','Service Sub Category', 'required');	
}elseif($type=='service_provider'){
    $this->form_validation->set_rules('service_provider','Service Provider', 'required');
}

$this->form_validation->set_rules('start_date','Start Date', 'required');
$this->form_validation->set_rules('end_date','End Date', 'required');
$this->form_validation->set_rules('minimum_order_amount','Minimum Order Amount', 'required');
$this->form_validation->set_rules('discount','Discount', 'required');
$this->form_validation->set_rules('discount_type','Discount Type', 'required');
$this->form_validation->set_rules('repeat_usage','Repeat Usagerepeat Usage', 'required');
$repeat = $this->input->post('repeat_usage');
if($repeat=='allowed'){
$this->form_validation->set_rules('no_of_repeat_usage','No of Repeat Usage', 'required');
}

if ($this->form_validation->run() == FALSE) {
	
	
			  $response['status'] = 0;
			  $response['msg']  = validation_errors();
} 
else {
	
        $data['type'] = $type;
        $service_category_id = $this->input->post('service_category_id');
        if(!empty($service_category_id)){
            $service_category_ids = implode(",",$service_category_id);
            $data['service_category_id'] = $service_category_ids;
        }
        $service_sub_category_id = $this->input->post('service_sub_category_id');
        if(!empty($service_sub_category_id)){
            $service_sub_category_ids = implode(",",$service_sub_category_id);
            $data['service_sub_category_id'] = $service_sub_category_ids;
        }
           
        $service_provider = $this->input->post('service_provider');
        if(!empty($service_provider)){
            $data['service_provider'] = $service_provider;
        }
        
        if(!empty($service_id)){
            $service_ids = implode(",",$service_id);
            $data['service_id'] = $service_ids;
        }
	
    	$data['promo_code'] = $this->input->post('promo_code');
        $data['message'] = $this->input->post('message');
        $data['start_date'] = $this->input->post('start_date');
        $data['end_date'] = $this->input->post('end_date');
        $data['minimum_order_amount'] = $this->input->post('minimum_order_amount');
        $data['discount'] = $this->input->post('discount');
        $data['discount_type'] = $this->input->post('discount_type');
        $data['max_discount_amount'] = $this->input->post('max_discount_amount');
        $data['repeat_usage'] = $this->input->post('repeat_usage');
        $data['no_of_repeat_usage'] = $this->input->post('no_of_repeat_usage');
        $data['status'] = $this->input->post('status');
        $data['updated'] = get_dateTime();
        $data['updatedBy'] = getUser('users_id');         
    
    $tmpImage = $this->input->post('image');
    if(!empty($tmpImage) && isset($tmpImage)){
        $data['image'] = $tmpImage;
       $uploads_dir = 'uploads/service_promo_code/';
        if(!file_exists($uploads_dir)) {
              mkdir($uploads_dir, 0777, true);  //create directory if not exist
              }
     if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
      unlink("uploads/temp_images/".$tmpImage);
      }
      
      $imgData = $this->db->get_where('service_promo_code',array('id'=>$id));
       if($imgData->num_rows()>0){
         $img =  $imgData->row()->image;
         $load_url = 'uploads/service_promo_code/'.$img;
		if(file_exists($load_url) && !empty($img))
		{
	  unlink("uploads/service_promo_code/".$img);		
		}
       }
    }
    
    $this->db->where('id',$id);
	$result = $this->db->update('service_promo_code',$data);
   
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
  public function get_service_promo_code($rowno=0){
      is_login(array('superadmin','admin'));
       $filter['promo_code']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree'];
       
    $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_service_promo_code('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_service_promo_code('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','service_promo_code');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_service_promo_code(){
   is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('service_promo_code',$data);
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
    
    /////////////############# Services Promo Code End #############/////////////
    
	 //////////////############# Slider Code Open ###########/////////////
    
  public function slider(){  
 is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Slider';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_slider/';
			$this->load->view('include/header',$title);
            $this->load->view('slider');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_slider($param1=''){
      is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');
$this->form_validation->set_rules('description','Description', 'required');
$this->form_validation->set_rules('image','Image', 'required');
$this->form_validation->set_rules('link','Link', 'required');

if ($this->form_validation->run() == FALSE) {

              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
           
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['link'] = $this->input->post('link');
           
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');   
	      
	       $tmpImage = $this->input->post('image');
		   
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/slider/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	      
			$result = $this->db->insert('slider',$data);
           
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
$this->form_validation->set_rules('title','Title', 'required');
$this->form_validation->set_rules('description','Description', 'required');
$this->form_validation->set_rules('link','Link', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['link'] = $this->input->post('link');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		    
		  $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/slider/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('slider',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/slider/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/slider/".$img);		
    			}
               }
	        }
		    
		    $this->db->where('id',$id);
			$result = $this->db->update('slider',$data);
           
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
			 
			 
			 
			 
// 			  if($param1=='update'){
// 		$id = $this->input->post('id');         
// 		$this->form_validation->set_error_delimiters('', '');
// 		$this->form_validation->set_rules('promo_code','Promo Code', 'required');

// 		$this->form_validation->set_rules('type','Type', 'required');
// 		$this->form_validation->set_rules('message','Message', 'required');
// 		$type = $this->input->post('type');
// 		$product_id = $this->input->post('product_id');
// 		if($type=='product'){
// 			$this->form_validation->set_rules('product_id[]','Product Name', 'required');
// 		}else{
// 		$this->form_validation->set_rules('level_one_cat_id[]','Level One Category', 'required');
// 		$this->form_validation->set_rules('level_two_cat_id[]','Level Two Category', 'required');	
// 		}

// 		$this->form_validation->set_rules('start_date','Start Date', 'required');
// 		$this->form_validation->set_rules('end_date','End Date', 'required');
// 		$this->form_validation->set_rules('minimum_order_amount','Minimum Order Amount', 'required');
// 		$this->form_validation->set_rules('discount','Discount', 'required');
// 		$this->form_validation->set_rules('discount_type','Discount Type', 'required');
// 		$this->form_validation->set_rules('repeat_usage','Repeat Usagerepeat Usage', 'required');
// 		$repeat = $this->input->post('repeat_usage');
// 		if($repeat=='allowed'){
// 		$this->form_validation->set_rules('no_of_repeat_usage','No of Repeat Usage', 'required');
// 		}

// 		if ($this->form_validation->run() == FALSE) {
			
			
// 					  $response['status'] = 0;
// 					  $response['msg']  = validation_errors();
// 		} 
// 		else {
			
//                         $data['type'] = $type;
//             $level_one_cat_id = $this->input->post('level_one_cat_id');
//             if(!empty($level_one_cat_id)){
//             $level_one_cat_id = implode(",",$level_one_cat_id);
//             $data['level_one_cat_id'] = $level_one_cat_id;
//             }
//             $level_two_cat_id = $this->input->post('level_two_cat_id');
//             if(!empty($level_two_cat_id)){
//             $level_two_cat_id = implode(",",$level_two_cat_id);
//             $data['level_two_cat_id'] = $level_two_cat_id;
//             }
//             $level_three_cat_id = $this->input->post('level_three_cat_id');
//             if(!empty($level_three_cat_id)){
//             $level_three_cat_id = implode(",",$level_three_cat_id);
//             $data['level_three_cat_id'] = $level_three_cat_id;
//             }
//             $level_four_cat_id = $this->input->post('level_four_cat_id');
//             if(!empty($level_four_cat_id)){
//             $level_four_cat_id = implode(",",$level_four_cat_id);
//             $data['level_four_cat_id'] = $level_four_cat_id;
//             }
            
//             if(!empty($product_id)){
//             $product_id = implode(",",$product_id);
//             $data['product_id'] = $product_id;
//             }
			
// 			$data['promo_code'] = $this->input->post('promo_code');
//             $data['message'] = $this->input->post('message');
//             $data['start_date'] = $this->input->post('start_date');
//             $data['end_date'] = $this->input->post('end_date');
//             // $data['no_of_users'] = $this->input->post('no_of_users');
//             $data['minimum_order_amount'] = $this->input->post('minimum_order_amount');
//             $data['discount'] = $this->input->post('discount');
//             $data['discount_type'] = $this->input->post('discount_type');
//             $data['max_discount_amount'] = $this->input->post('max_discount_amount');
//             $data['repeat_usage'] = $this->input->post('repeat_usage');
//             $data['no_of_repeat_usage'] = $this->input->post('no_of_repeat_usage');
//             $data['status'] = $this->input->post('status');
// 		    $data['updated'] = get_dateTime();
// 	        $data['updatedBy'] = getUser('users_id');         
		    
// 		    $tmpImage = $this->input->post('image');
// 	        if(!empty($tmpImage) && isset($tmpImage)){
// 	            $data['image'] = $tmpImage;
// 	           $uploads_dir = 'uploads/promo_code/';
//                 if(!file_exists($uploads_dir)) {
//                       mkdir($uploads_dir, 0777, true);  //create directory if not exist
//                       }
//              if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
//               unlink("uploads/temp_images/".$tmpImage);
//               }
              
//               $imgData = $this->db->get_where('promo_codes',array('id'=>$id));
//               if($imgData->num_rows()>0){
//                  $img =  $imgData->row()->image;
//                  $load_url = 'uploads/promo_code/'.$img;
//     			if(file_exists($load_url) && !empty($img))
//     			{
//     		  unlink("uploads/promo_code/".$img);		
//     			}
//               }
// 	        }
		    
// 		    $this->db->where('id',$id);
// 			$result = $this->db->update('promo_codes',$data);
           
//           if($result)
//           {
//               $response['status'] = 1;
//               $response['msg']  = 'Data updated successfully';
//           }
//           else
//           {
      
//               $response['status'] = 0;
//               $response['msg']  = 'Error try again';
//           }
    
    
// 			}
// 		echo json_encode($response);
//      }
      
  }
 public function get_slider($rowno=0){
      is_login(array('superadmin','admin'));
       $filter['title']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_slider('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_slider('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','slider');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_slider(){
   is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('slider',$data);
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
    
    /////////////############# Slider Code End #############/////////////
    /////////////############# Offers Open #############/////////////
    
      public function offers(){  
	is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Offers';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_offers/';
			$this->load->view('include/header',$title);
            $this->load->view('offers');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_offers($param1=''){
   is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('type','Type', 'required');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['type'] = $this->input->post('type');
            $level_one_cat_id = $this->input->post('level_one_cat_id');
            if(!empty($level_one_cat_id)){
            $level_one_cat_id = implode(",",$level_one_cat_id);
            $data['level_one_cat_id'] = $level_one_cat_id;
            }
            $level_two_cat_id = $this->input->post('level_two_cat_id');
            if(!empty($level_two_cat_id)){
            $level_two_cat_id = implode(",",$level_two_cat_id);
            $data['level_two_cat_id'] = $level_two_cat_id;
            }
            $level_three_cat_id = $this->input->post('level_three_cat_id');
            if(!empty($level_three_cat_id)){
            $level_three_cat_id = implode(",",$level_three_cat_id);
            $data['level_three_cat_id'] = $level_three_cat_id;
            }
            $level_four_cat_id = $this->input->post('level_four_cat_id');
            if(!empty($level_four_cat_id)){
            $level_four_cat_id = implode(",",$level_four_cat_id);
            $data['level_four_cat_id'] = $level_four_cat_id;
            }
            $product_id = $this->input->post('product_id');
            if(!empty($product_id)){
            $product_id = implode(",",$product_id);
            $data['product_id'] = $product_id;
            }
			$data['position'] = $this->input->post('position');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');   
	      
	    
		  if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])){
                 
         $upload_base_dir = 'uploads/offer/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config); 
                $this->upload->initialize($config);

                if(!$this->upload->do_upload('image'))  
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
                     
					 $data['image'] =  $Image_data["file_name"]; 
				 
                }  
		 
      } 
	     
		  
		        $result = $this->db->insert('offers',$data);
		      
		      
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
$this->form_validation->set_rules('type','Type', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['type'] = $this->input->post('type');
            $data['type_id'] = $this->input->post('type_id');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		    
		    $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/offer/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('offers',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/offer/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/offer/".$img);		
    			}
               }
	        }
		    
		    $this->db->where('id',$id);
			$result = $this->db->update('offers',$data);
           
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
  public function get_offers($rowno=0){
     is_login(array('superadmin','admin'));
       $filter['type']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_offers('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_offers('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','offers');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_offers(){
   is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('offers',$data);
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
    
    /////////////############# Offers End #############/////////////
	
    /////////////############# Banner Open #############/////////////
    
  public function banner(){  
	  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Banner';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_banner/';
			$this->load->view('include/header',$title);
            $this->load->view('banner');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_banner($param1=''){
      is_login(array('superadmin','admin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('area','Area', 'required');
$this->form_validation->set_rules('link','Link', 'required');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['area'] = $this->input->post('area');
			$data['link'] = $this->input->post('link');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');   
	      
	    
		  if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])){
                 
         $upload_base_dir = 'uploads/banner/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = '*';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config); 
                $this->upload->initialize($config);

                if(!$this->upload->do_upload('image'))  
                {  
				  $response['status'] = 0;
				  $response['msg']  = $this->upload->display_errors();
				  echo json_encode($response);
				  exit();
                }  
                else  
                {  
                     $Image_data = $this->upload->data();  
                     $config['image_library'] = 'gd2';  
                     $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $config['create_thumb'] = FALSE;  
                     $config['maintain_ratio'] = FALSE; 
                     $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $this->load->library('image_lib', $config);  
                     $this->image_lib->resize();  
                     
					 $data['image'] =  $Image_data["file_name"]; 
				 
                }  
		 
      } 
	     
		  
		        $result = $this->db->insert('banner',$data);
		      
		      
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
$this->form_validation->set_rules('area','Area', 'required');
$this->form_validation->set_rules('link','Link', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['area'] = $this->input->post('area');
			$data['link'] = $this->input->post('link');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		    
			if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])){
                 
         $upload_base_dir = 'uploads/banner/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = '*';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config); 
                $this->upload->initialize($config);

                if(!$this->upload->do_upload('image'))  
                {  
						$response['status'] = 0;
						$response['msg']  = $this->upload->display_errors();
						echo json_encode($response);
						exit();
                }  
                else  
                {  
                     $Image_data = $this->upload->data();  
                     $config['image_library'] = 'gd2';  
                     $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $config['create_thumb'] = FALSE;  
                     $config['maintain_ratio'] = FALSE; 
                      
                     $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $this->load->library('image_lib', $config);  
                     
					 $data['image'] =  $Image_data["file_name"]; 
				 
                }  
		 
      } 
		    
		    $this->db->where('id',$id);
			$result = $this->db->update('banner',$data);
           
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
  public function get_banner($rowno=0){
      is_login(array('superadmin','admin'));
       $filter['type']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree']; 
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_banner('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_banner('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','banner');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_banner(){
   is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('banner',$data);
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
    
    /////////////############# Banner End #############/////////////

     ////////###### Open Merchant Wallet #######//////////////
   
  public function merchant_wallet(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] ='Merchant Wallet';
	        $footer['tableData'] = 1;
            $footer['dataLink']  = base_url().'master/get_merchant_wallet/';
			$this->load->view('include/header',$title);
            $this->load->view('merchant_wallet');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_merchant_wallet($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('','');
$this->form_validation->set_rules('merchant_id','Merchant', 'required');
$this->form_validation->set_rules('date','Date', 'required');
$merchant_id = $this->input->post('merchant_id');
$spotAmount = $this->Common->merchantSpotWallet($merchant_id);
$amount = $this->input->post('amount');
$this->form_validation->set_rules('amount','Amount', 'required|less_than_equal_to['.$spotAmount.']');

if ($this->form_validation->run() == FALSE) {

              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            
            $data['date'] = $this->input->post('date');
            $data['amount'] = $this->input->post('amount');
            $data['merchant_id'] = $this->input->post('merchant_id');
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');   
	        
			$result = $this->db->insert('merchant_wallet',$data);
           
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
$this->form_validation->set_rules('merchant_id','Merchant', 'required');
$this->form_validation->set_rules('date','Date', 'required');
$merchant_id = $this->input->post('merchant_id');
$spotAmount = $this->Common->merchantSpotWallet($merchant_id);
$amount = $this->input->post('amount');
$this->form_validation->set_rules('amount','Amount', 'required|less_than_equal_to['.$spotAmount.']');

if ($this->form_validation->run() == FALSE) {

              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['date'] = $this->input->post('date');
            $data['amount'] = $this->input->post('amount');
            $data['merchant_id'] = $this->input->post('merchant_id');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		    
		    
		    $this->db->where('id',$id);
			$result = $this->db->update('merchant_wallet',$data);

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
  public function get_merchant_wallet($rowno=0){
      is_login(array('superadmin'));
      $filter['merchant_id']     = $_POST['filterOne']; 
      //   $filter['status']    = $_POST['filterTwo']; 
      $filter['isDelete']  = $_POST['filterThree']; 
    //   $filter['transaction_id']  = $_POST['filterTwo']; 
      $filter['dateOne']  = $_POST['filterFive'];
      $filter['dateTwo']  = $_POST['filterFour'];
 
  $rowperpage =getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_merchant_wallet('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_merchant_wallet('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','merchant_wallet');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
 public function delete_merchant_wallet(){
   is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('merchant_wallet',$data);
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
 
 /////////////// End Merchant Wallet //////////////
 
 public function getProductAttributeHtml($VariaId='',$attributeId=''){
 $attributess = $this->Common->getProductVariationAttr($VariaId);
 if(count($attributess)>0)
 {
	 foreach($attributess as $attribute){
	     echo $attribute->type;  
	 }
 }
 else
 {
	 echo "";
 }
  }

    /////////////############ Attribute #########/////////////
    
       public function getAttributeType($attribute_id){
    
	 $type = $this->db->get_where('product_attribute',array('id'=>$attribute_id))->row()->type;
	  if(!empty($type)) { $type = $type;} else{ $type='text'; }
	  echo $type;
  }
  
  /////////////############ Attribute ###########////////////

///////////////////######### Opne User Contact  ###########///////////////
	
    public function user_contact(){  
        is_login(array('superadmin'));
  
	        $title['page_title'] = 'Contact Enquiry';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_user_contact/';
			$this->load->view('include/header',$title);
            $this->load->view('user_contact');                
            $this->load->view('include/footer',$footer);            
 
    }
    public function add_user_contact($param1=''){
    is_login(array('superadmin'));
      if($param1=='update'){
$id = $this->input->post('id');         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('status','Status', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
         
            $data['status'] = $this->input->post('status');
            $data['remarks'] = $this->input->post('remarks');
			$data['nextdate'] = get_dateTime();

			$this->db->where('id',$id);
			$result = $this->db->update('contact',$data);
			
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
    public function get_user_contact($rowno=0){
      is_login(array('superadmin'));
      $filter['name']  = $_POST['filterOne']; 
      $filter['phone']  = $_POST['filterTwo']; 
      $filter['email']  = $_POST['filterThree']; 
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_user_contact('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_user_contact('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','user_contact');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
    public function delete_user_contact($id=''){
    is_login(array('superadmin'));
          $this->db->where('id',$id);
          $result = $this->db->delete('contact');
        if($result)
        {
          $response['status'] = 1;
          $response['msg']  = 'Deleted Succesfully';
        }
        else
        {
          $response['status'] = 0;
          $response['msg']  = 'Error try again';
        }
        echo json_encode($response);
 }
	
	///////////////////######### End User Contact #############////////////////
	
    //////////////########### User Availability ##########/////////////
 
    public function user_availability(){  
  is_login(array('superadmin'));
  ini_set('display_errors', 1);
	        $title['page_title'] = 'User Availability';
	       // $footer['tableData']   = 1;
        //     $footer['dataLink']   = base_url().'master/get_user_availability/';
			$this->load->view('include/header',$title);
            $this->load->view('user_availability');                
            $this->load->view('include/footer');            
 
  }
   public function add_user_availability($param1=''){
      is_login(array('superadmin'));
if($param1=='add'){
    ini_set('display_errors', 1);
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('users_id','User','required');

if ($this->form_validation->run() == FALSE) {
    $response['status'] = 0;
    $response['msg']  = validation_errors();
}else{
        $users_id = $this->input->post('users_id');
        $day        = $this->input->post('day');
        $start_time = $this->input->post('start_time');
        $end_time   = $this->input->post('end_time');
        
    	
     	if(!empty($day)){
     	    $already = $this->db->get_where('user_availability',array('users_id'=>$users_id));
         	if($already->num_rows()>0){
         	    $this->db->where_in('day',$day);
         	    $this->db->where('users_id',$users_id);
         	    $this->db->delete('user_availability');
         	}
        for($i=0;$i<count($day);$i++){
            
            $data['users_id'] = $users_id;
            $data['day'] = $day[$i];
            $Days     = $day[$i];
            
            for($j=0;$j<count($start_time[$Days]);$j++){
                 
                $data['from_time'] = $start_time[$Days][$j];
                $data['to_time']   = $end_time[$Days][$j];
            	$result = $this->db->insert('user_availability',$data);
            }
        }
        if($result){
            $response['status'] = 1;
            $response['msg']  = 'Data submited successfully';
        }else{
            $response['status'] = 0;
            $response['msg']  = 'Error try again';
        }
    }else{
        $response['status'] = 0;
        $response['msg']  = 'Select days';
    }
           
        
    }

    echo json_encode($response);
 }
      if($param1=='update'){
$id = $this->input->post('id');         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('users_id','User Name', 'required');
//$this->form_validation->set_rules('type','Type', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['users_id']  = $this->input->post('users_id');
            $data['day']  = $this->input->post('day');
            $data['from_time']  = $this->input->post('from_time');
            $data['to_time']  = $this->input->post('to_time');
                 
		    
		    
		    $this->db->where('id',$id);
			$result = $this->db->update('user_availability',$data);
           
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
   public function get_user_availability($rowno=0){
       is_login(array('superadmin'));
      ini_set('display_errors', 1);
      $filter['users_id']  = $_POST['filterOne']; 
    
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_user_availability('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_user_availability('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','user_availability');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
   public function delete_user_availability(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $this->db->where('id',$id);
          $result = $this->db->delete('user_availability');
        if($result)
        {
          $response['status'] = 1;
          $response['msg']  = 'Deleted Succesfully';
        }
        else
        {
          $response['status'] = 0;
          $response['msg']  = 'Error try again';
        }
        echo json_encode($response);
 }
 
   /////////////############ User Availability #########//////////////  
  public function leave_management(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Leave Management';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_leave_management/';
			$this->load->view('include/header',$title);
            $this->load->view('leave_management');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_leave_management($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('users_id','User Name','required');
$from_date = $this->input->post('from_date');
$to_date = $this->input->post('to_date');
$this->form_validation->set_rules('from_date', 'From date', 'required');
$this->form_validation->set_rules('to_date', 'To date', 'trim|required|callback_check_greater_then['.$from_date.']');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
        $startTime = strtotime( $from_date );
        $endTime = strtotime( $to_date );
        
        // Loop between timestamps, 24 hours at a time
        for ( $i = $startTime; $i <= $endTime; $i = $i + 86400 ) {
            $thisDate = date( 'Y-m-d', $i ); // 2010-05-01, 2010-05-02, etc
            $data['date']  = $thisDate;
            $data['users_id']  = $this->input->post('users_id');
            $data['remarks']  = $this->input->post('remarks');
            $data['status']  = 'Pending';
    		$result = $this->db->insert('leave_management',$data);
        }
        
       
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
$this->form_validation->set_rules('status','Status', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['status']  = $this->input->post('status');
            $data['status_remarks']  = $this->input->post('status_remarks');
            
		    $this->db->where('id',$id);
			$result = $this->db->update('leave_management',$data);
           
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
   public function get_leave_management($rowno=0){
       is_login(array('superadmin'));
      ini_set('display_errors', 1);
      $filter['users_id']  = $_POST['filterOne']; 
    
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_leave_management('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_leave_management('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','leave_management');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
   public function delete_leave_management(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $this->db->where('id',$id);
          $result = $this->db->delete('leave_management');
        if($result)
        {
          $response['status'] = 1;
          $response['msg']  = 'Deleted Succesfully';
        }
        else
        {
          $response['status'] = 0;
          $response['msg']  = 'Error try again';
        }
        echo json_encode($response);
 }

public function check_equal_less($date){
    $today = strtotime(date("Y-m-d"));

    $first_date = strtotime($date);

    if ( ($date != "") && ($first_date > $today) )
    {
        $this->form_validation->set_message('check_equal_less', 'The First date can not be greater than today!');
        return false;       
    }
    else
    {
        return true;
    }
}

public function check_greater_then($second_date, $first_date){
    
    if ( ($first_date != "") && ($second_date != "") && (strtotime($first_date) > strtotime($second_date)) )
    {
        $this->form_validation->set_message('check_greater_then', 'To date field should be greater than From date field!');
        return false;       
    }
    else
    {
        return true;
    }
}


//////////###### CATEGORIES #######//////////////
   
  public function gallery_category(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Gallery Category';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_gallery_category/';
			$this->load->view('include/header',$title);
            $this->load->view('gallery_category');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_gallery_category($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Category Name', 'required|is_unique[gallery_category.name]');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');         
			$result = $this->db->insert('gallery_category',$data);
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
$this->form_validation->set_rules('name','Category Name', 'required|edit_unique[gallery_category.name.id.'.$id.']');

if ($this->form_validation->run() == FALSE) {
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		    $this->db->where('id',$id);
			$result = $this->db->update('gallery_category',$data);
           
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
  public function get_gallery_category($rowno=0){
    is_login(array('superadmin'));  
      $filter['name']  = $_POST['filterOne']; 
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree']; 
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_gallery_category('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_gallery_category('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','gallery_category');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_gallery_category(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('gallery_category',$data);
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
 
    //////////###### END CATEGORIES #######//////////////

//////////###### CATEGORIES #######//////////////
   
  public function gallery(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Gallery';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_gallery/';
			$this->load->view('include/header',$title);
            $this->load->view('gallery');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_gallery($param1=''){
     is_login(array('superadmin'));
if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('category','Category', 'required');
if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['category'] = $this->input->post('category');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');   
	        
	        $tmpImage = $this->input->post('image');
		   
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/gallery/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
			$result = $this->db->insert('gallery',$data);
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
$this->form_validation->set_rules('category','Category', 'required');

if ($this->form_validation->run() == FALSE) {
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['category'] = $this->input->post('category');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		    
		    $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/gallery/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('gallery',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/gallery/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/gallery/".$img);		
    			}
               }
	        }
		    
		    
		    $this->db->where('id',$id);
			$result = $this->db->update('gallery',$data);
           
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
  public function get_gallery($rowno=0){
    is_login(array('superadmin'));  
      $filter['name']  = $_POST['filterOne']; 
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree']; 
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_gallery('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_gallery('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','gallery');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_gallery(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('gallery',$data);
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
 
    //////////###### END gallery #######//////////////

 function get_common_key()
	{
		$un = rand(00000000000,99999999999);
		$exist = $this->db->get_where('product_variation',array('common_key'=>$un));
		if($exist->num_rows()>0)
		{
		$results = get_common_key();
		}
		else
		{
		$results = $un;
		return  $results;
		}
	}
	
///////////////////////##########START AVAILABILITY##########///////////////////////////////////////////
public function appointment_hours(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Appointment hours';
	        $this->load->view('include/header',$title);
            $this->load->view('appointment_hours');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function get_appointment_hours($default='',$usersId=''){  
  is_login(array('superadmin'));
    $page_data['users_id'] = $usersId;
    $page_data['changeAble'] = $default;
    $this->load->view('hrs_form',$page_data);                
  }
  
public function add_appointment_hours($param1=''){
      is_login(array('superadmin'));
    //   print_r($_POST);
    $day        = $this->input->post('day');
    $start_time = $this->input->post('start_time');
    $end_time   = $this->input->post('end_time');
    
 	if(!empty($day)){
 	    $already = $this->db->get('default_hours');
     	if($already->num_rows()>0){
     	    $this->db->where_in('day',$day);
     	    $this->db->delete('default_hours');
     	  //$this->db->empty_table('default_hours');
     	}
        for($i=0;$i<count($day);$i++){
            
            $data['day'] = $day[$i];
            $Days     = $day[$i];
            
            for($j=0;$j<count($start_time[$Days]);$j++){
                 
                $data['from_time'] = $start_time[$Days][$j];
                $data['to_time']   = $end_time[$Days][$j];
            	$result = $this->db->insert('default_hours',$data);
            }
        }
        if($result){
            $response['status'] = 1;
            $response['msg']  = 'Data submited successfully';
        }else{
            $response['status'] = 0;
            $response['msg']  = 'Error try again';
        }
    }else{
        $response['status'] = 0;
        $response['msg']  = 'Select days';
    }
    
    echo json_encode($response);
  }
  
  public function delete_defaultHour(){
	   is_login(array('superadmin'));
	   $id = $this->input->post('id');
	   $this->db->where('id',$id);
	   $result = $this->db->delete('default_hours');
	  if($result)
        {
            // echo "1";
          $response['status'] = 1;
          $response['msg']  = 'Deleted Succesfully';
        }
        else
        {
            // echo $error = "Data not Deleted!";
          $response['status'] = 0;
          $response['msg']  = 'Error try again';
        }
        echo json_encode($response);
   }
///////////////////////##########END AVAILABILITY ##########///////////////////////////////////////////

///COURSE CATEGORY///
 public function course_category(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Course Categories';
	        $footer['tableData']   = 1;
             $footer['dataLink']   = base_url().'master/get_course_category/';
			$this->load->view('include/header',$title);
            $this->load->view('course_category');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_course_category($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','course Category Name', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            // $data['state_id'] = $this->input->post('state_id');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/course_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }


			$result = $this->db->insert('course_category',$data);
           
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
$this->form_validation->set_rules('name','course Category Name', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            // $data['state_id'] = $this->input->post('state_id');
            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/course_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('course_category',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/course_category/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/course_category/".$img);		
    			}
               }
	        }
		
		    $this->db->where('id',$id);
			$result = $this->db->update('course_category',$data);
           
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
  public function get_course_category($rowno=0){
  is_login(array('superadmin'));    
      $filter['name']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_course_category('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_course_category('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','course_category');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_course_category(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('course_category',$data);
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
 
 
 
 public function course($id){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Courses';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_course/'.$id.'';
			$this->load->view('include/header',$title);
            $this->load->view('course');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_course($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');
$this->form_validation->set_rules('course_category_id','Category Name', 'required');
$this->form_validation->set_rules('course_fee','Course Fee Offline', 'required');
$this->form_validation->set_rules('number_of_session','Number Of Session', 'required');
$this->form_validation->set_rules('personal_price','Learn in Personalized Sessions', 'required');




if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
             $data['personal_price'] = $this->input->post('personal_price');
            $data['course_category_id'] = $this->input->post('course_category_id');
          $data['course_fee'] = $this->input->post('course_fee');
          $data['study_material_validity'] = $this->input->post('study_material_validity');
          $data['course_fee_online'] = $this->input->post('course_fee_online');
          $data['discount'] = $this->input->post('discount');
         $data['description'] = $this->input->post('description');
           	if($this->input->post('tax')=='other'){
    		        $data['tax']         = $this->input->post('tax_other');   
    		}
    		   else{
		   $data['tax']         = $this->input->post('tax');
		   }
          $data['number_of_session'] = $this->input->post('number_of_session');
            $data['duration'] = $this->input->post('duration');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/course/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('course',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/course/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/course/".$img);		
    			}
              }
	        }


			$result = $this->db->insert('course',$data);
			
			
			
			

			

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
$this->form_validation->set_rules('title','Title', 'required');
$this->form_validation->set_rules('course_category_id','Category Name', 'required');
$this->form_validation->set_rules('course_fee','Course Fee Offline', 'required');
$this->form_validation->set_rules('number_of_session','Number Of Session', 'required');
$this->form_validation->set_rules('personal_price','Learn in Personalized Sessions', 'required');





if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            $data['personal_price'] = $this->input->post('personal_price');
            $data['course_fee_online'] = $this->input->post('course_fee_online');
            $data['discount'] = $this->input->post('discount');
            $data['study_material_validity'] = $this->input->post('study_material_validity');
            $data['course_category_id'] = $this->input->post('course_category_id');
            $data['title'] = $this->input->post('title');
            $data['course_fee'] = $this->input->post('course_fee');
            $data['number_of_session'] = $this->input->post('number_of_session');
             $data['description'] = $this->input->post('description');
            $data['duration'] = $this->input->post('duration');
              	if($this->input->post('tax')=='other'){
    		        $data['tax']         = $this->input->post('tax_other');   
    		}
    		   else{
		   $data['tax']         = $this->input->post('tax');
		   }
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/course/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('course',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/course/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/course/".$img);		
    			}
              }
	        }
		
		    $this->db->where('id',$id);
			$result = $this->db->update('course',$data);
           
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
  public function get_course($id,$rowno=0){
      is_login(array('superadmin'));
      $filter['title']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_course('yes',$rowperpage,$rowno,$filter,$id);
    $users_record =  $this->Mdlmaster->get_course('no',$rowperpage,$rowno,$filter,$id);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','course');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_course(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('course',$data);
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
 
 //////////////###########  Study Material #########////////////
 
  public function study_material($id){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Study Material';
	        $footer['tableData']   = 1;
	        $page_data['id']  = $id;
            $footer['dataLink']   = base_url().'master/get_study_material/'.$id.'/';
			$this->load->view('include/header',$title);
            $this->load->view('study_material',$page_data);                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_study_material($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');
$this->form_validation->set_rules('course_id','Course Name', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
        $data['title'] = $this->input->post('title');
        $data['course_id'] = $this->input->post('course_id');
        $data['type'] = $this->input->post('type');
        $data['sr_number'] = $this->input->post('sr_number');
        $data['description'] = $this->input->post('description');
        $data['youtube_url'] = $this->input->post('youtube_url');
        $data['status'] = 'Active';
        $data['added'] = get_dateTime();
        $data['addedBy'] = getUser('users_id');  

         if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])){
          $upload_base_dir = 'uploads/study_material';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE

                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types']        = '*';
				$config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);  
                 $this->upload->initialize($config);
                if(!$this->upload->do_upload('image'))  
                {  
                     echo $this->upload->display_errors();  
					 exit();
                }  
                else  
                {  
                     $Image_data = $this->upload->data();  
                     $config['image_library'] = 'gd2';  
                     $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $config['create_thumb'] = TRUE;  
                     $config['maintain_ratio'] = FALSE; 
                     $config['quality'] = '90%';  
                     $config['width'] = 500;  
                     $config['height'] = 400;  
                     $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $this->load->library('image_lib', $config);  
                     $this->image_lib->resize();  
                     
					 $data['image'] =  $Image_data["file_name"]; 
				 
                }  
			 }

            $result = $this->db->insert('study_material',$data);
			
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
$this->form_validation->set_rules('title','Title', 'required');
$this->form_validation->set_rules('course_id','Course Name', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
            $data['title'] = $this->input->post('title');
            $data['course_id'] = $this->input->post('course_id');
            $data['sr_number'] = $this->input->post('sr_number');
            $data['type'] = $this->input->post('type');
            $data['description'] = $this->input->post('description');
            $data['youtube_url'] = $this->input->post('youtube_url');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
                     if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])){
          $upload_base_dir = 'uploads/study_material';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE

                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types']        = '*';
				$config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);  
                 $this->upload->initialize($config);
                if(!$this->upload->do_upload('image'))  
                {  
                     echo $this->upload->display_errors();  
					 exit();
                }  
                else  
                {  
                     $Image_data = $this->upload->data();  
                     $config['image_library'] = 'gd2';  
                     $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $config['create_thumb'] = TRUE;  
                     $config['maintain_ratio'] = FALSE; 
                     $config['quality'] = '90%';  
                     $config['width'] = 500;  
                     $config['height'] = 400;  
                     $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $this->load->library('image_lib', $config);  
                     $this->image_lib->resize();  
                     
					 $data['image'] =  $Image_data["file_name"]; 
				 
                }  
			 }

		

		    $this->db->where('id',$id);
			$result = $this->db->update('study_material',$data);
           
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
  public function get_study_material($id,$rowno=0){
      is_login(array('superadmin'));
      $filter['title']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_study_material('yes',$rowperpage,$rowno,$filter,$id);
    $users_record =  $this->Mdlmaster->get_study_material('no',$rowperpage,$rowno,$filter,$id);
    $pageNo = $this->uri->segment(4);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','study_material');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_study_material(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('study_material',$data);
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
 
 //////////////########### Stude Material ##########////////////
 
//  public function model_course_session($id){  
//   is_login(array('superadmin','admin'));
//             $page_data['row']  = $_POST;
// 	        $title['page_title'] = 'Course Session';
// 	        $footer['tableData']   = 1;
//             $footer['dataLink']   = base_url().'master/get_model_course_session/';
// 			$this->load->view('include/header',$title);
//             $this->load->view('model_course_session',$page_data);                
//             $this->load->view('include/footer',$footer);            
 
//   }
 
//  public function get_model_course_session($rowno=0,$id=""){
//       is_login(array('superadmin','admin')); 
//       $filter['course_id']  = $_POST['filterOne_model']; 
//       $filter['status']= $_POST['filterTwo_model']; 
//       $filter['isDelete'] = $_POST['filterThree_model']; 
 
//   $rowperpage = getRowPerPage();
//   if($rowno != 0){
//       $rowno = ($rowno-1) * $rowperpage;
//     }
//     $allcount     =  $this->Mdlmaster->get_model_course_session('yes',$rowperpage,$rowno,$filter,$id);
//     $users_record =  $this->Mdlmaster->get_model_course_session('no',$rowperpage,$rowno,$filter,$id);
//     $pageNo = $this->uri->segment(3);
//     $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','model_course_session');
//     $data['loadTableData'] = $users_record;
//     $data['pageNumber'] = $pageNo;

//     echo json_encode($data);
//   }
 
///END COURSE CATEGORY///

public function material(){  
  is_login(array('superadmin','admin'));
  
	        $title['page_title'] = 'Materials';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_material/';
			$this->load->view('include/header',$title);
            $this->load->view('material');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_material($param1=''){
     is_login(array('superadmin','admin'));
      if($param1=='add'){ini_set('display_errors', 1);
         
      $this->form_validation->set_error_delimiters('', '');
      $this->form_validation->set_rules('title','Title', 'required|is_unique[material.title]');
      // $this->form_validation->set_rules('barcode','', '|is_unique[product.barcode]');

      if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
      } 
      else {
         
      $data['title'] = $this->input->post('title');
      $data['description'] = $this->input->post('description');
      $data['material_keyword'] = $this->input->post('material_keyword');
      $data['meta_description'] = $this->input->post('meta_description');
      $data['status'] = 'Active';
      $data['added'] = get_dateTime();
      $data['addedBy'] = getUser('users_id');
        
      $tmpImage = $this->input->post('img');
      if(!empty($tmpImage) && isset($tmpImage)){
      $data['img'] = $tmpImage;
      $uploads_dir = 'uploads/material/';
      if(!file_exists($uploads_dir)) {
      mkdir($uploads_dir, 0777, true);  //create directory if not exist
      }
      if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
      unlink("uploads/temp_images/".$tmpImage);
      }
     }
	        $tmpImage = $this->input->post('img1');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['img1'] = $tmpImage;
	           $uploads_dir = 'uploads/material/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        $tmpImage = $this->input->post('img2');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['img2'] = $tmpImage;
	           $uploads_dir = 'uploads/material/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }
	        
	        
	       
			$result = $this->db->insert('material',$data);
           
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
$this->form_validation->set_rules('title','Title', 'required');

if ($this->form_validation->run() == FALSE) {
    
    
      $response['status'] = 0;
      $response['msg']  = validation_errors();
} 
else {
    
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['material_keyword'] = $this->input->post('material_keyword');
            $data['meta_description'] = $this->input->post('meta_description');
           
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
            
            $tmpImage = $this->input->post('img');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['img'] = $tmpImage;
	           $uploads_dir = 'uploads/material/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('material',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->img;
                 $load_url = 'uploads/material/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/material/".$img);		
    			}
               }
	        }
		
		    $tmpImage = $this->input->post('img1');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['img1'] = $tmpImage;
	           $uploads_dir = 'uploads/material/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('material',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->img1;
                 $load_url = 'uploads/material/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/material/".$img);		
    			}
               }
	        }
	        
	        $tmpImage = $this->input->post('img2');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['img2'] = $tmpImage;
	           $uploads_dir = 'uploads/material/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('material',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->img2;
                 $load_url = 'uploads/material/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/material/".$img);		
    			}
               }
	        }
		
		    $this->db->where('id',$id);
			$result = $this->db->update('material',$data);
           
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
  public function get_material($rowno=0){
     is_login(array('superadmin','admin'));
       $filter['title']  = $_POST['filterOne']; 
       $filter['status']= $_POST['filterTwo']; 
       $filter['isDelete'] = $_POST['filterThree']; 
     
 
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_material('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_material('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','material');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
   }
  public function delete_material(){
    is_login(array('superadmin','admin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $result = $this->db->update('material',$data);
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
  

public function tax(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Tax';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_tax/';
			$this->load->view('include/header',$title);
            $this->load->view('tax');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_tax($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Tax Name', 'required');
$this->form_validation->set_rules('tax','Tax Value', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
             $data['tax'] = $this->input->post('tax');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

            


			$result = $this->db->insert('tax',$data);
           
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
$this->form_validation->set_rules('name','Tax Name', 'required');
$this->form_validation->set_rules('tax','Tax Value', 'required');


if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
             $data['tax'] = $this->input->post('tax');
            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
		    $data['edited'] = get_dateTime();
	        $data['editedBy'] = getUser('users_id');         
		
		 
		    $this->db->where('id',$id);
			$result = $this->db->update('tax',$data);
           
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
  public function get_tax($rowno=0){
  is_login(array('superadmin'));    
      $filter['name']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_tax('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_tax('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','tax');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_tax(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('tax',$data);
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


public function course_session($id){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Course Session ';
	        $footer['tableData']   = 1;
	        $page_data['id']  = $id;
            $footer['dataLink']   = base_url().'master/get_course_session/'.$id.'/';
			$this->load->view('include/header',$title);
            $this->load->view('course_session',$page_data);                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_course_session($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('course_id','course_id ', 'required');
$this->form_validation->set_rules('course_session','Course Session ', 'required');
$this->form_validation->set_rules('session_duration','Session Duration ', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['course_id'] = $this->input->post('course_id');
            $data['course_session'] = $this->input->post('course_session');
             $data['session_duration'] = $this->input->post('session_duration');
            // $data['state_id'] = $this->input->post('state_id');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             

			$result = $this->db->insert('course_session',$data);
           
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
$this->form_validation->set_rules('course_id','course_id ', 'required');
$this->form_validation->set_rules('course_session','Course Session ', 'required');
$this->form_validation->set_rules('session_duration','Session Duration ', 'required');


if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            
            $data['course_id'] = $this->input->post('course_id');
            $data['course_session'] = $this->input->post('course_session');
             $data['session_duration'] = $this->input->post('session_duration');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		
		
		    $this->db->where('id',$id);
			$result = $this->db->update('course_session',$data);
           
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
  
  
  public function get_course_session($id,$rowno=0){
  is_login(array('superadmin'));    
      $filter['course_session']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_course_session('yes',$rowperpage,$rowno,$filter,$id);
    $users_record =  $this->Mdlmaster->get_course_session('no',$rowperpage,$rowno,$filter,$id);
    $pageNo = $this->uri->segment(4);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','course_session');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_course_session(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('course_session',$data);
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
 
 public function business_category(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Business Categories';
	        $footer['tableData']   = 1;
             $footer['dataLink']   = base_url().'master/get_business_category/';
			$this->load->view('include/header',$title);
            $this->load->view('business_category');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_business_category($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Business Category Name', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            // $data['state_id'] = $this->input->post('state_id');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/business_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }


			$result = $this->db->insert('business_category',$data);
           
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
$this->form_validation->set_rules('name','Business Category Name', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            // $data['state_id'] = $this->input->post('state_id');
            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
		    $data['edited'] = get_dateTime();
	        $data['editedBy'] = getUser('users_id');         
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/business_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('business_category',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/business_category/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/business_category/".$img);		
    			}
               }
	        }
		
		    $this->db->where('id',$id);
			$result = $this->db->update('business_category',$data);
           
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
  public function get_business_category($rowno=0){
  is_login(array('superadmin'));    
      $filter['name']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_business_category('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_business_category('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','business_category');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_business_category(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('business_category',$data);
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
 
 
 
 public function business_sub_category(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Business Sub Categories';
	        $footer['tableData']   = 1;
             $footer['dataLink']   = base_url().'master/get_business_sub_category/';
			$this->load->view('include/header',$title);
            $this->load->view('business_sub_category');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_business_sub_category($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('business_category_id','Business Category Name', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
            $data['business_category_id'] = $this->input->post('business_category_id');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/business_sub_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }


			$result = $this->db->insert('business_sub_category',$data);
           
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
$id = $this->input->post('sub_category_id');         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Nmae', 'required');
$this->form_validation->set_rules('business_category_id','Category Name', 'required');




if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
           
            $data['name'] = $this->input->post('name');
            $data['business_category_id'] = $this->input->post('business_category_id');
            $data['status'] = $this->input->post('status');
		    $data['edited'] = get_dateTime();
	        $data['editedBy'] = getUser('users_id');         
		
		 $tmpImage = $this->input->post('image');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['image'] = $tmpImage;
	           $uploads_dir = 'uploads/business_sub_category/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('business_sub_category',array('id'=>$id));
              if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/business_sub_category/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/business_sub_category/".$img);		
    			}
              }
	        }
		
		    $this->db->where('id',$id);
			$result = $this->db->update('business_sub_category',$data);
           
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
  public function get_business_sub_category($rowno=0){ini_set('display_errors', 1);
      is_login(array('superadmin'));
      $filter['name']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_business_sub_category('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_business_sub_category('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','business_sub_category');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_business_sub_category(){
    is_login(array('superadmin'));
          $id = $this->input->post('sub_category_id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('sub_category_id',$id);
          $res = $this->db->update('business_sub_category',$data);
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
 
 
 
 public function business_role(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Business Role ';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_business_role/';
			$this->load->view('include/header',$title);
            $this->load->view('business_role');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_business_role($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','business_role Category Name', 'required');
$this->form_validation->set_rules('commision','Commision ', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['name'] = $this->input->post('name');
             $data['commision'] = $this->input->post('commision');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

           


			$result = $this->db->insert('businessRole',$data);
           
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
$this->form_validation->set_rules('name','business_role Category Name', 'required');
$this->form_validation->set_rules('commision','Commision','required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
             $data['commision'] = $this->input->post('commision');
            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
		    $data['edited'] = get_dateTime();
	        $data['editedBy'] = getUser('users_id');         
		
	
		
		    $this->db->where('id',$id);
			$result = $this->db->update('businessRole',$data);
           
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
  public function get_business_role($rowno=0){ 
  is_login(array('superadmin'));    
      $filter['name']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_business_role('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_business_role('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','business_role');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_business_role(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('businessRole',$data);
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
 
 
 public function social_link(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Social Link ';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_social_link/';
			$this->load->view('include/header',$title);
            $this->load->view('social_link');                
            $this->load->view('include/footer',$footer);            
 
  }
 public function add_social_link($param1=''){
  is_login(array('superadmin'));
  if($param1=='add'){
     
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('title','Title', 'required');
$this->form_validation->set_rules('link','Link', 'required');
$this->form_validation->set_rules('icon_maker','icon_maker', 'required');




if ($this->form_validation->run() == FALSE) {


          $response['status'] = 0;
          $response['msg']  = validation_errors();
} 
else {

        $data['title'] = $this->input->post('title');
         $data['link'] = $this->input->post('link');
            $data['icon_maker'] = $this->input->post('icon_maker');
        $data['status'] = 'Active';
        $data['added'] = get_dateTime();
      $data['addedBy'] = getUser('users_id');  

         $tmpImage = $this->input->post('image');
      if(!empty($tmpImage) && isset($tmpImage)){
          $data['image'] = $tmpImage;
         $uploads_dir = 'uploads/social_link/';
            if(!file_exists($uploads_dir)) {
                  mkdir($uploads_dir, 0777, true);  //create directory if not exist
                  }
         if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
          unlink("uploads/temp_images/".$tmpImage);
          }
      }


  $result = $this->db->insert('social_link',$data);
       
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
$this->form_validation->set_rules('title','Title', 'required');
$this->form_validation->set_rules('link','Link', 'required');
$this->form_validation->set_rules('icon_maker','icon_maker', 'required');




if ($this->form_validation->run() == FALSE) {


          $response['status'] = 0;
          $response['msg']  = validation_errors();
} 
else {

         $data['title'] = $this->input->post('title');
        $data['link'] = $this->input->post('link');
         $data['icon_maker'] = $this->input->post('icon_maker');
        $data['status'] = $this->input->post('status');
    $data['edited'] = get_dateTime();
      $data['editedBy'] = getUser('users_id');         

 $tmpImage = $this->input->post('image');
      if(!empty($tmpImage) && isset($tmpImage)){
          $data['image'] = $tmpImage;
         $uploads_dir = 'uploads/social_link/';
            if(!file_exists($uploads_dir)) {
                  mkdir($uploads_dir, 0777, true);  //create directory if not exist
                  }
         if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
          unlink("uploads/temp_images/".$tmpImage);
          }
          
          $imgData = $this->db->get_where('social_link',array('id'=>$id));
           if($imgData->num_rows()>0){
             $img =  $imgData->row()->image;
             $load_url = 'uploads/social_link/'.$img;
      if(file_exists($load_url) && !empty($img))
      {
      unlink("uploads/social_link/".$img);		
      }
           }
      }

    $this->db->where('id',$id);
  $result = $this->db->update('social_link',$data);
       
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
public function get_social_link($rowno=0){
is_login(array('superadmin'));    
  $filter['title']  = $_POST['filterOne'];
  $filter['status']= $_POST['filterTwo']; 
  $filter['isDelete'] = $_POST['filterThree'];
 

$rowperpage = getRowPerPage();
if($rowno != 0){
  $rowno = ($rowno-1) * $rowperpage;
}
$allcount     =  $this->Mdlmaster->get_social_link('yes',$rowperpage,$rowno,$filter);
$users_record =  $this->Mdlmaster->get_social_link('no',$rowperpage,$rowno,$filter);
$pageNo = $this->uri->segment(3);
$data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','social_link');
$data['loadTableData'] = $users_record;
$data['pageNumber'] = $pageNo;

echo json_encode($data);
}
public function delete_social_link(){
is_login(array('superadmin'));
      $id = $this->input->post('id');
      $data['deleted'] = get_dateTime();
    $data['deletedBy'] = getUser('users_id');
    $data['isDelete'] = 1;

      $this->db->where('id',$id);
      $res = $this->db->update('social_link',$data);
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


public function account_detail(){  
  is_login(array('superadmin'));
  
	        $title['page_title'] = 'Account Details';
	        $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_account_detail/';
			$this->load->view('include/header',$title);
            $this->load->view('account_detail');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_account_detail($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('bank_name','Bank Name', 'required');
$this->form_validation->set_rules('account_number','Account Number', 'required');
$this->form_validation->set_rules('ifsc','IFSE CODE', 'required');
$this->form_validation->set_rules('branch_name','Branch Name', 'required');




if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['bank_name'] = $this->input->post('bank_name');
             $data['account_number'] = $this->input->post('account_number');
              $data['ifsc'] = $this->input->post('ifsc');
             $data['branch_name'] = $this->input->post('branch_name');
            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
	        $data['addedBy'] = getUser('users_id');  

             $tmpImage = $this->input->post('bank_logo');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['bank_logo'] = $tmpImage;
	           $uploads_dir = 'uploads/account_detail/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
	        }


			$result = $this->db->insert('account_details',$data);
           
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
$this->form_validation->set_rules('bank_name','Bank Name', 'required');
$this->form_validation->set_rules('account_number','Account Number', 'required');
$this->form_validation->set_rules('ifsc','IFSE CODE', 'required');
$this->form_validation->set_rules('branch_name','Branch Name', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
           
            $data['bank_name'] = $this->input->post('bank_name');
             $data['account_number'] = $this->input->post('account_number');
              $data['ifsc'] = $this->input->post('ifsc');
             $data['branch_name'] = $this->input->post('branch_name');
            $data['status'] = $this->input->post('status');
		    $data['updated'] = get_dateTime();
	        $data['updatedBy'] = getUser('users_id');         
		
		 $tmpImage = $this->input->post('bank_logo');
	        if(!empty($tmpImage) && isset($tmpImage)){
	            $data['bank_logo'] = $tmpImage;
	           $uploads_dir = 'uploads/account_detail/';
                if(!file_exists($uploads_dir)) {
                      mkdir($uploads_dir, 0777, true);  //create directory if not exist
                      }
             if (copy("uploads/temp_images/".$tmpImage,$uploads_dir.$tmpImage)) {
              unlink("uploads/temp_images/".$tmpImage);
              }
              
              $imgData = $this->db->get_where('account_details',array('id'=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->bank_logo;
                 $load_url = 'uploads/account_detail/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/account_detail/".$img);		
    			}
               }
	        }
		
		    $this->db->where('id',$id);
			$result = $this->db->update('account_details',$data);
           
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
  public function get_account_detail($rowno=0){
  is_login(array('superadmin'));    
      $filter['bank_name']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_account_detail('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_account_detail('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','account_detail');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_account_detail(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
	      $data['deletedBy'] = getUser('users_id');
	      $data['isDelete'] = 1;
		
          $this->db->where('id',$id);
          $res = $this->db->update('account_details',$data);
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


    public function enquiry_plan(){  
    is_login(array('superadmin'));
    
              $title['page_title'] = 'Enquiry Plan ';
              $footer['tableData']   = 1;
              $footer['dataLink']   = base_url().'master/get_enquiry_plan/';
              $this->load->view('include/header',$title);
              $this->load->view('enquiry_plan');                
              $this->load->view('include/footer',$footer);            
   
    }
    public function add_enquiry_plan($param1=''){
        is_login(array('superadmin'));
        if($param1=='add'){
           
    $this->form_validation->set_error_delimiters('', '');
    $this->form_validation->set_rules('plan_name','Plan Name', 'required');
    $this->form_validation->set_rules('duration','Duration ', 'required');
     $this->form_validation->set_rules('amount','Amount', 'required');

  
  
  if ($this->form_validation->run() == FALSE) {
      
      
                $response['status'] = 0;
                $response['msg']  = validation_errors();
  } 
  else {
      
              $data['plan_name'] = $this->input->post('plan_name');
              $data['description']  = $this->input->post('description');
               $data['duration'] = $this->input->post('duration');
             $data['amount'] = $this->input->post('amount');

              $data['status'] = 'Active';
              $data['added'] = get_dateTime();
              $data['addedBy'] = getUser('users_id');  
  
              
  
  
              $result = $this->db->insert('enquiry_plan',$data);
             
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
 $this->form_validation->set_rules('plan_name','Plan Name', 'required');
    $this->form_validation->set_rules('duration','Duration ', 'required');
      $this->form_validation->set_rules('amount','Amount', 'required');
  
  
  
  if ($this->form_validation->run() == FALSE) {
      
      
                $response['status'] = 0;
                $response['msg']  = validation_errors();
  } 
  else {
            $data['plan_name'] = $this->input->post('plan_name');
            $data['description']  = $this->input->post('description');
               $data['duration'] = $this->input->post('duration');
             $data['amount'] = $this->input->post('amount');
              $data['status'] = $this->input->post('status');
              $data['edited'] = get_dateTime();
              $data['editedBy'] = getUser('users_id');         
          
         
              $this->db->where('id',$id);
              $result = $this->db->update('enquiry_plan',$data);
             
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
    public function get_enquiry_plan($rowno=0){
    is_login(array('superadmin'));    
        $filter['plan_name']  = $_POST['filterOne'];
        $filter['status']= $_POST['filterTwo']; 
        $filter['isDelete'] = $_POST['filterThree'];
       
   
    $rowperpage = getRowPerPage();
    if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
      }
      $allcount     =  $this->Mdlmaster->get_enquiry_plan('yes',$rowperpage,$rowno,$filter);
      $users_record =  $this->Mdlmaster->get_enquiry_plan('no',$rowperpage,$rowno,$filter);
      $pageNo = $this->uri->segment(3);
      $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','enquiry_plan');
      $data['loadTableData'] = $users_record;
      $data['pageNumber'] = $pageNo;
  
      echo json_encode($data);
    }
    public function delete_enquiry_plan(){
      is_login(array('superadmin'));
            $id = $this->input->post('id');
            $data['deleted'] = get_dateTime();
            $data['deletedBy'] = getUser('users_id');
            $data['isDelete'] = 1;
          
            $this->db->where('id',$id);
            $res = $this->db->update('enquiry_plan',$data);
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
   
   
   
    public function for_products_sell_plan(){  
    is_login(array('superadmin'));
    
              $title['page_title'] = 'Products Sell Plan';
              $footer['tableData']   = 1;
              $footer['dataLink']   = base_url().'master/get_for_products_sell_plan/';
              $this->load->view('include/header',$title);
              $this->load->view('for_products_sell_plan');                
              $this->load->view('include/footer',$footer);            
   
    }
    public function add_for_products_sell_plan($param1=''){
        is_login(array('superadmin'));
        if($param1=='add'){
           
  $this->form_validation->set_error_delimiters('', '');
  $this->form_validation->set_rules('plan_name','Plan Name', 'required');
    $this->form_validation->set_rules('duration','Duration ', 'required');
      $this->form_validation->set_rules('amount','Amount', 'required');

  
  
  if ($this->form_validation->run() == FALSE) {
      
      
                $response['status'] = 0;
                $response['msg']  = validation_errors();
  } 
  else {
      
              $data['plan_name'] = $this->input->post('plan_name');
               $data['duration'] = $this->input->post('duration');
               $data['description']  = $this->input->post('description');
             $data['amount'] = $this->input->post('amount');

              $data['status'] = 'Active';
              $data['added'] = get_dateTime();
              $data['addedBy'] = getUser('users_id');  
  
              
  
  
              $result = $this->db->insert('for_products_sell_plan',$data);
             
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
 $this->form_validation->set_rules('plan_name','Plan Name', 'required');
    $this->form_validation->set_rules('duration','Duration ', 'required');
      $this->form_validation->set_rules('amount','Amount', 'required');
  
  
  
  if ($this->form_validation->run() == FALSE) {
      
      
                $response['status'] = 0;
                $response['msg']  = validation_errors();
  } 
  else {
            $data['plan_name'] = $this->input->post('plan_name');
            $data['description']  = $this->input->post('description');
               $data['duration'] = $this->input->post('duration');
             $data['amount'] = $this->input->post('amount');
              $data['status'] = $this->input->post('status');
              $data['edited'] = get_dateTime();
              $data['editedBy'] = getUser('users_id');         
          
         
              $this->db->where('id',$id);
              $result = $this->db->update('for_products_sell_plan',$data);
             
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
    public function get_for_products_sell_plan($rowno=0){
    is_login(array('superadmin'));    
        $filter['plan_name']  = $_POST['filterOne'];
        $filter['status']= $_POST['filterTwo']; 
        $filter['isDelete'] = $_POST['filterThree'];
       
   
    $rowperpage = getRowPerPage();
    if($rowno != 0){
        $rowno = ($rowno-1) * $rowperpage;
      }
      $allcount     =  $this->Mdlmaster->get_for_products_sell_plan('yes',$rowperpage,$rowno,$filter);
      $users_record =  $this->Mdlmaster->get_for_products_sell_plan('no',$rowperpage,$rowno,$filter);
      $pageNo = $this->uri->segment(3);
      $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','for_products_sell_plan');
      $data['loadTableData'] = $users_record;
      $data['pageNumber'] = $pageNo;
  
      echo json_encode($data);
    }
    public function delete_for_products_sell_plan(){
      is_login(array('superadmin'));
            $id = $this->input->post('id');
            $data['deleted'] = get_dateTime();
            $data['deletedBy'] = getUser('users_id');
            $data['isDelete'] = 1;
          
            $this->db->where('id',$id);
            $res = $this->db->update('for_products_sell_plan',$data);
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
   
   
  public function payment_cycle_plan(){  
  is_login(array('superadmin'));
  
            $title['page_title'] = 'Payment Cycle Plan';
            $footer['tableData']   = 1;
            $footer['dataLink']   = base_url().'master/get_payment_cycle_plan/';
            $this->load->view('include/header',$title);
            $this->load->view('payment_cycle_plan');                
            $this->load->view('include/footer',$footer);            
 
  }
  public function add_payment_cycle_plan($param1=''){
      is_login(array('superadmin'));
      if($param1=='add'){
         
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('plan_name','Plan Name', 'required');
  $this->form_validation->set_rules('duration','Duration ', 'required');
    $this->form_validation->set_rules('amount','Amount', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
    
            $data['plan_name'] = $this->input->post('plan_name');
             $data['duration'] = $this->input->post('duration');
            $data['description']  = $this->input->post('description');

           $data['amount'] = $this->input->post('amount');

            $data['status'] = 'Active';
            $data['added'] = get_dateTime();
            $data['addedBy'] = getUser('users_id');  

            


            $result = $this->db->insert('payment_cycle_plan',$data);
           
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
$this->form_validation->set_rules('plan_name','Plan Name', 'required');
  $this->form_validation->set_rules('duration','Duration ', 'required');
    $this->form_validation->set_rules('amount','Amount', 'required');



if ($this->form_validation->run() == FALSE) {
    
    
              $response['status'] = 0;
              $response['msg']  = validation_errors();
} 
else {
          $data['plan_name'] = $this->input->post('plan_name');
         	$data['description']  = $this->input->post('description');
             $data['duration'] = $this->input->post('duration');
           $data['amount'] = $this->input->post('amount');
            $data['status'] = $this->input->post('status');
            $data['edited'] = get_dateTime();
            $data['editedBy'] = getUser('users_id');         
        
       
            $this->db->where('id',$id);
            $result = $this->db->update('payment_cycle_plan',$data);
           
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
  public function get_payment_cycle_plan($rowno=0){
  is_login(array('superadmin'));    
      $filter['plan_name']  = $_POST['filterOne'];
      $filter['status']= $_POST['filterTwo']; 
      $filter['isDelete'] = $_POST['filterThree'];
     
 
  $rowperpage = getRowPerPage();
  if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    $allcount     =  $this->Mdlmaster->get_payment_cycle_plan('yes',$rowperpage,$rowno,$filter);
    $users_record =  $this->Mdlmaster->get_payment_cycle_plan('no',$rowperpage,$rowno,$filter);
    $pageNo = $this->uri->segment(3);
    $data['paginationLink'] = $this->Common->getPaginition($allcount,$rowperpage,'master','payment_cycle_plan');
    $data['loadTableData'] = $users_record;
    $data['pageNumber'] = $pageNo;

    echo json_encode($data);
  }
  public function delete_payment_cycle_plan(){
    is_login(array('superadmin'));
          $id = $this->input->post('id');
          $data['deleted'] = get_dateTime();
          $data['deletedBy'] = getUser('users_id');
          $data['isDelete'] = 1;
        
          $this->db->where('id',$id);
          $res = $this->db->update('payment_cycle_plan',$data);
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
   
   



?>
