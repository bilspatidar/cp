<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Commoncontroller extends CI_Controller {

  function __construct() {

    parent::__construct();
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


if(empty($error)){
if (!empty($data['upload_data']['file_name'])) {
$import_xls_file = $data['upload_data']['file_name'];
} else {
$import_xls_file = 0;
}
$inputFileName = $path . $import_xls_file;
try {
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($inputFileName);
$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
$flag = true;
$i=0;
foreach ($allDataInSheet as $value) {
if($flag){
$flag =false;
continue;
}
$inserdata[$i]['pname'] = $value['A'];
$inserdata[$i]['product_sku'] = $value['B'];
$inserdata[$i]['tax'] = $value['C'];
$inserdata[$i]['product_country_origin'] = $value['D'];
$inserdata[$i]['search_keyword'] = $value['E'];
$inserdata[$i]['length'] = $value['F'];
$inserdata[$i]['height'] = $value['G'];
$inserdata[$i]['width'] = $value['H'];
$inserdata[$i]['packageWeight'] = $value['I'];
$inserdata[$i]['product_specification'] = $value['J'];
$inserdata[$i]['product_keyword'] = $value['K'];
$inserdata[$i]['long_description'] = $value['L'];
$inserdata[$i]['product_meta'] = $value['M'];
$inserdata[$i]['product_video'] = $value['N'];
$inserdata[$i]['price_type'] = $value['O'];
$inserdata[$i]['product_mrp'] = $value['P'];
$inserdata[$i]['product_price'] = $value['Q'];




$inserdata[$i]['status'] = 'Active';
$inserdata[$i]['added'] = date('Y-m-d H:i:s');
$inserdata[$i]['addedBy'] = getUser('users_id');


            $catt_id = $this->input->post('category_id');
            $catt_id = implode(",",$catt_id);
            $inserdata[$i]['category_id'] = $catt_id;
            
            if(isset($_POST['crystal_id'])){
            $crystal_id = $this->input->post('crystal_id');
            $crystal_id = implode(",",$crystal_id);
            $inserdata[$i]['crystal_id'] = $crystal_id;
            }
            
            $inserdata[$i]['level_three_category_id']    = $this->input->post('level_three_category_id');
			$inserdata[$i]['level_four_category_id']         = $this->input->post('level_four_category_id');
			$inserdata[$i]['brand_id']    = $this->input->post('brand_id');
			$inserdata[$i]['vendor_id']    = getUser('users_id');
			$inserdata[$i]['sub_category_id'] = $this->input->post('sub_category_id');
			$inserdata[$i]['priceFlag']         = 0;
		    
		    $inserdata[$i]['product_barcode']         =  $this->get_random_code();   
            $inserdata[$i]['product_key']      = $this->Common->random_key_string();
            
            
            
            

$i++;
}



$result = $this->db->insert_batch('product',$inserdata);   
if($result){
echo "Imported successfully";
}else{
echo "ERROR !";
}             
} catch (Exception $e) {
die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
. '": ' .$e->getMessage());
}
}else{
echo $error['error'];
}
}


		


   
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
  
  public function trash_status($table_name,$status,$colName,$id){
    is_login(array('superadmin','admin','instructor','super_admin','dispatch_packaging'));
          if($status=='delete'){
           $this->db->where($colName,$id);
           $result = $this->db->delete($table_name);
          }
          else{
              $this->db->where($colName,$id);
          $data['isDelete'] = 0;
          $result = $this->db->update($table_name,$data); 
          }
         
        if($result)
        {
          $response['status'] = 1;
          $response['msg']  = 'Success';
        }
        else
        {
           $response['status'] = 0;
           $response['msg']  = 'Error try again';
        }
        echo json_encode($response);
 }
 
 public function trash_status_group($table_name,$status,$colName,$id){
    is_login(array('superadmin'));
          if($status=='delete'){
            
            $imgData = $this->db->get_where($table_name,array($colName=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->livePhoto;
                 $load_url = 'uploads/groups/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/groups/".$img);		
    			}
               }  
              
           $this->db->where($colName,$id);
           $result = $this->db->delete($table_name);
          }
          else{
              $this->db->where($colName,$id);
          $data['isDelete'] = 0;
          $result = $this->db->update($table_name,$data); 
          }
         
        if($result)
        {
          $response['status'] = 1;
          $response['msg']  = 'Success';
        }
        else
        {
           $response['status'] = 0;
           $response['msg']  = 'Error try again';
        }
        echo json_encode($response);
 }
 
 public function trash_status_subgroups($table_name,$status,$colName,$id){
    is_login(array('superadmin'));
          if($status=='delete'){
            
            $imgData = $this->db->get_where($table_name,array($colName=>$id));
               if($imgData->num_rows()>0){
                 $img =  $imgData->row()->image;
                 $load_url = 'uploads/subgroups/'.$img;
    			if(file_exists($load_url) && !empty($img))
    			{
    		  unlink("uploads/subgroups/".$img);		
    			}
               }  
              
           $this->db->where($colName,$id);
           $result = $this->db->delete($table_name);
          }
          else{
              $this->db->where($colName,$id);
          $data['isDelete'] = 0;
          $result = $this->db->update($table_name,$data); 
          }
         
        if($result)
        {
          $response['status'] = 1;
          $response['msg']  = 'Success';
        }
        else
        {
           $response['status'] = 0;
           $response['msg']  = 'Error try again';
        }
        echo json_encode($response);
 }
 
 public function trash_status_member($table_name,$status,$colName,$id){
    is_login(array('superadmin'));
          if($status=='delete'){
            
            $imgData = $this->db->get_where($table_name,array($colName=>$id));
               if($imgData->num_rows()>0){
                 $form_no =  $imgData->row()->form_no;
                 $load_url = 'uploads/member/'.$form_no;
    			if(file_exists($load_url) && !empty($form_no))
    			{
    		  
    		  delete_files($load_url, true);
    		  rmdir($load_url);
    			}
               }  
              
           $this->db->where($colName,$id);
           $result = $this->db->delete($table_name);
          }
          else{
              $this->db->where($colName,$id);
          $data['isDelete'] = 0;
          $result = $this->db->update($table_name,$data); 
          }
         
        if($result)
        {
          $response['status'] = 1;
          $response['msg']  = 'Success';
        }
        else
        {
           $response['status'] = 0;
           $response['msg']  = 'Error try again';
        }
        echo json_encode($response);
 }
 

 public function mapLocation($lang='',$latt='') {
    is_login(array('superadmin'));
             if(!empty($lang) && !empty($latt)){
             $title['page_title'] = 'Show Map';
            $page_data['langittute'] = $lang;
            $page_data['lattitude'] = $latt;
       $this->load->view('showGroupMap',$page_data);  
             }
             else{
                 echo"Please Add Location";
             }
        }
 
 //////////////########### Open Pincode ###########//////////
 
  public function getPincodeHtml($cityId='',$pinId=''){
 $getPincode = $this->Common->getPincode($cityId);
 if(count($getPincode)>0)
 {
	 foreach($getPincode as $pincode){
	     ?>
	<option value='<?php echo $pincode->id; ?>' <?php if(!empty($pinId && $pinId==$pincode->id)){ echo'selected'; } ?>><?php echo $pincode->pincode; ?></option>	
	<?php 
	 }
 }
 else
 {
	 echo"<option value=''>no city found!</option>";
 }
  }
  
  ////////////////########### End Pincode ###########/////////////
  
  //////////////############ Open State ###########/////////////
  
  public function getStateCityHtml($StateId='',$cityId=''){
 $cities = $this->Common->getCity($StateId);
 if(count($cities)>0)
 {
	 foreach($cities as $city){
	     ?>
	<option value='<?php echo $city->id; ?>' <?php if(!empty($cityId && $cityId==$city->id)){ echo'selected'; } ?>><?php echo $city->name; ?></option>	
	<?php 
	 }
 }
 else
 {
	 echo"<option value=''>no city found!</option>";
 }
  }
  
  /////////////############ Sub Category ###############////////////
  
   public function getSubCategoryHtml($catId='',$subcatId=''){
 $subCat = $this->Common->getSubcategory($catId);
 if(count($subCat)>0)
 { ?>
  <option value=""> Select Level One First</option>
  <?php
	 foreach($subCat as $subCategory){
	     ?>
	<option value='<?php echo $subCategory->id; ?>' <?php if(!empty($subcatId && $subcatId==$subCategory->id)){ echo'selected'; } ?>><?php echo $subCategory->name; ?></option>	
	<?php 
	 }
 }
 else
 {
	 echo"<option value=''>No Sub Category Found!</option>";
 }
  }
  
  /////////////############ Sub Category ###############////////////
  

  
  
    /////////////############ Level Three Category ###############////////////
  
   public function getLevelTreeCategoryHtml($subCatId='',$lThreeId=''){
 $lThreeCat = $this->Common->getlThrecategory($subCatId);
 if(count($lThreeCat)>0)
 { ?>
     <option value="">Select Level Two First</option>
     <?php
	 foreach($lThreeCat as $lThree){
	     ?>
	<option value='<?php echo $lThree->id; ?>' <?php if(!empty($lThreeId && $lThreeId==$lThree->level_three_category_id)){ echo'selected'; } ?>><?php echo $lThree->name; ?></option>	
	<?php 
	 } 
 }
 else
 {
	 echo"<option value=''>No Level Three Category found!</option>";
 }
  }
  
  /////////////############ Level Three Category ###############////////////
  
      /////////////############ Level Three Category ###############////////////
  
   public function getLevelTreeCategoryModalHtml($subCatId='',$lThreeId=''){
 $lThreeCat = $this->Common->getlThrecategory($subCatId);
 if(count($lThreeCat)>0)
 { ?>
     <option value="">Select Level Two First</option>
     <?php
	 foreach($lThreeCat as $lThree){
	     ?>
	<option value='<?php echo $lThree->id; ?>' <?php if(!empty($lThreeId && $lThreeId==$lThree->id)){ echo'selected'; } ?>><?php echo $lThree->name; ?></option>	
	<?php 
	 } 
 }
 else
 {
	 echo"<option value=''>No Level Three Category found!</option>";
 }
  }
  
  /////////////############ Level Three Category ###############////////////
  
      /////////////############ Level Three Category ###############////////////
  
   public function getLevelFourCategoryHtml($subFCatId='',$lFourId=''){
 $lFourCat = $this->Common->getlFourcategory($subFCatId);
 if(count($lFourCat)>0)
 { ?>
     <option value="">Select Level Three First</option>
     <?php
	 foreach($lFourCat as $lFour){
	     ?>
	<option value='<?php echo $lFour->id; ?>' <?php if(!empty($lFourId && $lFourId==$lFour->level_four_category_id)){ echo'selected'; } ?>><?php echo $lFour->name; ?></option>	
	<?php 
	 } 
 }
 else
 {
	 echo"<option value=''>No Level Four Category found!</option>";
 }
  }
  
  /////////////############ Level Three Category ###############////////////
  
  
        /////////////############ Level Three Category ###############////////////
  
   public function getLevelFourCategoryModalHtml($subFCatId='',$lFourId=''){
 $lFourCat = $this->Common->getlFourcategory($subFCatId);
 if(count($lFourCat)>0)
 { ?>
     <option value="">Select Level Three First</option>
     <?php
	 foreach($lFourCat as $lFour){
	     ?>
	<option value='<?php echo $lFour->id; ?>' <?php if(!empty($lFourId && $lFourId==$lFour->id)){ echo'selected'; } ?>><?php echo $lFour->name; ?></option>	
	<?php 
	 } 
 }
 else
 {
	 echo"<option value=''>No Level Four Category found!</option>";
 }
  }
  
  /////////////############ Level Three Category ###############////////////
  
  /////////////########## Product Attribute ###########///////////////
  
  public function getgetproAttriHtml($variant='',$attriId=''){
 $AVariant = $this->Common->getProductVariationAttr($variant);
 if(count($AVariant)>0)
 { ?>
     <option value=""> Select Variant</option>
     <?php
	 foreach($AVariant as $attribute){
	     ?>
	<option value='<?php echo $attribute->id; ?>' <?php if(!empty($attriId && $attriId==$attribute->variant_name)){ echo'selected'; } ?>><?php echo $attribute->name; ?></option>	
	<?php 
	 } 
 }
 else
 {
	 echo"<option value=''>No Variant found!</option>";
 }
  }
  
  /////////////########## Product Attribute ###########///////////////
  
    /////////////############ Sub Category ###############////////////
  
   public function getSerSubCategoryHtml($scatId='',$ssubcatId=''){
 $SesubCat = $this->Common->getSerSubcategory($scatId);
 if(count($SesubCat)>0)
 {
	 foreach($SesubCat as $SersubCategory){
	     ?>
	<option value='<?php echo $SersubCategory->services_sub_category_id; ?>' <?php if(!empty($ssubcatId && $ssubcatId==$SersubCategory->sub_category_id)){ echo'selected'; } ?>><?php echo $SersubCategory->name; ?></option>	
	<?php 
	 }
 }
 else
 {
	 echo"<option value=''>no Sub Category found!</option>";
 }
  }
  
  /////////////############ Sub Category ###############////////////
  
  ////////######### State #########/////////////
  
  public function getStateHtml($countryId='',$StateId=''){
 $states = $this->Common->getState($countryId);
 if(count($states)>0)
 {
	 foreach($states as $state){
	     ?>
	<option value='<?php echo $state->id; ?>' <?php if(!empty($StateId && $StateId==$state->id)){ echo'selected'; } ?>>
	    <?php echo $state->name; ?></option>	
	<?php 
	 }
 }
 else
 {
	 echo"<option value=''>no state found!</option>";
 }
  }
  
  
   public function getBusinessSubCategoryHtml($Category='',$StateId=''){
 $Categorys = $this->Common->getSubcategory($Category);
 if(count($Categorys)>0)
 {?>
 <option value=''>Select Business Subcategory</option>
	<?php foreach($Categorys as $Business ){
	     ?>
	<option value='<?php echo $Business->id; ?>' <?php if(!empty($StateId && $StateId==$Business->id)){ echo'selected'; } ?>><?php echo $Business->name; ?></option>	
	<?php 
	 }
 }
 else
 {
	 echo"<option value=''>No Business Subcategory Found!</option>";
 }
  }
  
  ///////######### State #########/////////////
    
 public function getStateAdminHtml($state_id=''){
 $states = $this->Common->getStateAdmin($state_id);
 if(count($states)>0)
 { ?>
      <option value="">Select States</option>
      
       <?php
	 foreach($states as $state){
	     ?>
	<option value='<?php echo $state->users_id;?>'<?php if(!empty($parent_id && $parent_id==$state->users_id)){ echo'selected'; } ?>>
	    <?php echo $state->name; ?></option>	
	<?php 
	 }
 }
 else
 {
	 echo"<option value=''>no state found!</option>";
 }
  }
  
  
  
  
  
  

	
}
?>