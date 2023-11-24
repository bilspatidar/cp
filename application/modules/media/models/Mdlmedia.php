<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Mdlmedia extends CI_Model {



    function __construct() {

        parent::__construct();

    }



    public function clear_cache() {

        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');

        $this->output->set_header('Pragma: no-cache');

    }

	

	 //////////###### Open Business Type #######//////////////

	

   

  public function get_gener($isFilter,$limit,$start,$filder){

       

       

     $this->db->select("*");

     $this->db->from("geners");

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

          $del_url     = base_url().'media/delete_gener/'.$id;

		   $edit_url    = base_url().'media/edit_form/gener_edit/geners/id/'.$id;

		   $getDeleteOption = getDeleteOption();

		   $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";

          $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";

           

          if($row->isDelete==1){

          $isDeleteUrl      = base_url().'commoncontroller/trash_status/geners/delete/id/'.$id;

          $isRetriveUrl     = base_url().'commoncontroller/trash_status/geners/retrive/id/'.$id;

           

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

    	        $load_url1 = 'uploads/gener/'.$File;

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

    		$fileData = "<a href='$url' target='_new'><img src='$url' , style='height:50px; width:50px'></a>";

    

     if($row->status=='Active'){

       $status = '<span class="badge bg-success">Active</span>'; 

    }else{

       $status = '<span class="badge bg-danger">Deactive</span>';

    }

    

		   

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


 public function get_front_users($isFilter,$limit,$start,$filder){

       

       

  $this->db->select("*");

  $this->db->from("users");

  $this->db->order_by('users_id','desc');
$this->db->where('user_type','users');
  


  

  

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

 <th>Mobile</th>
 <th>Email</th>

 <th>Status</th>





</tr>

</thead>

<tbody>';

$sr = $start+1;

$result = $query->result();

foreach($result as $row)

{

       $id          = $row->users_id;

      //  $del_url     = base_url().'media/delete_gener/'.$id;

    // $edit_url    = base_url().'media/edit_form/gener_edit/geners/id/'.$id;

    // $getDeleteOption = getDeleteOption();

    // $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";

      //  $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";

        

      //  if($row->isDelete==1){

      //  $isDeleteUrl      = base_url().'commoncontroller/trash_status/geners/delete/id/'.$id;

      //  $isRetriveUrl     = base_url().'commoncontroller/trash_status/geners/retrive/id/'.$id;

        

      //  $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";

      //  $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";



    // $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 

      //  }

      //  else{

        //  $optionLink  = $edit_link.' '.$delete_link;   

      //  }

        

        



 


  if($row->status=='Active'){

    $status = '<span class="badge bg-success">Active</span>'; 

 }else{

    $status = '<span class="badge bg-danger">Deactive</span>';

 }

 

    

$output .= '

<tr>

 <td>'.$sr++.'</td>

  <td>'.$row->name.'</td>

  <td>'.$row->mobile.'</td>
  <td>'.$row->email.'</td>

 <td>'.$status.'</td>

 

 

</tr>

';

}



$output .= '</tbody></table>';

return $output;    

   }



}


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

  

  

  if(!empty($filder['text'])){

  $this->db->like('text',$filder['text']);

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

  <th>Text</th>
 <th>Video</th>
<th>Thumbnail</th>

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

       $del_url     = base_url().'media/delete_slider/'.$id;

    $edit_url    = base_url().'media/edit_form/slider_edit/slider/id/'.$id;

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

        
       $File = $row->video;
		   
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
         
               $fileData = "<a href='$url' target='_blank'>File</a>";			
       }
       else
       {
       $url = base_url().'uploads/no_file.jpg';
       $fileData = '';
       }
 

 $File = $row->thumbnail;


     if(!empty($File))

     { 

           $load_url1 = 'uploads/slider/'.$File;

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

     $fileDatathumbnail = "<a href='$url' target='_new'><img src='$url' , style='height:50px; width:50px'></a>";

 


  if($row->status=='Active'){

    $status = '<span class="badge bg-success">Active</span>'; 

 }else{

    $status = '<span class="badge bg-danger">Deactive</span>';

 }

 

    

$output .= '

<tr>

 <td>'.$sr++.'</td>

  <td>'.$row->text.'</td>
 
  <td>'.$fileData.'</td>
  <td>'.$fileDatathumbnail.'</td>
 <td>'.$status.'</td>

 <td>'.$optionLink.'</td>

 

</tr>

';

}



$output .= '</tbody></table>';

return $output;    

   }



}


 

 public function get_sub_categories($isFilter,$limit,$start,$filder){

  $this->db->select("*");

  $this->db->from("sub_categories");

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
 <th>Category name</th>
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

       $del_url     = base_url().'media/delete_sub_categories/'.$id;

    $edit_url    = base_url().'media/edit_form/sub_categories_edit/sub_categories/id/'.$id;

    $getDeleteOption = getDeleteOption();

    $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";

       $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";

        

       if($row->isDelete==1){

       $isDeleteUrl      = base_url().'commoncontroller/trash_status/sub_categories/delete/id/'.$id;

       $isRetriveUrl     = base_url().'commoncontroller/trash_status/sub_categories/retrive/id/'.$id;

        

       $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";

       $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";



    $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 

       }

       else{

         $optionLink  = $edit_link.' '.$delete_link;   

       }

        

        



 

 $File = $row->banner;



     if(!empty($File))

     { 

           $load_url1 = 'uploads/sub_categories/'.$File;

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

     $fileData = "<a href='$url' target='_new'><img src='$url' , style='height:50px; width:50px'></a>";

 

  if($row->status=='Active'){

    $status = '<span class="badge bg-success">Active</span>'; 

 }else{

    $status = '<span class="badge bg-danger">Deactive</span>';

 }

 $categoryName = $this->Common->get_col_by_key('categories','id',$row->category_id,'name');


    

$output .= '

<tr>

 <td>'.$sr++.'</td>

  <td>'.$row->name.'</td>

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



public function get_live_streaming($isFilter,$limit,$start,){

  $this->db->select("*");

  $this->db->from("live_streaming");

  $this->db->order_by('id','desc');

  

  if(!empty($filder['isDelete'])){

  $this->db->where('isDelete',$filder['isDelete']);
	}

  else{

   $this->db->where('isDelete',0);   

  }

  // if(!empty($filder['name'])){
  //   $this->db->like('name',$filder['name']);
  //   }
	
  //   if(!empty($filder['category_id'])){
  //   $this->db->where('category_id',$filder['category_id']);
  //   }
	
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

 <th>URL</th>
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

       $del_url     = base_url().'media/delete_live_streaming/'.$id;

    $edit_url    = base_url().'media/edit_form/live_streaming_edit/live_streaming/id/'.$id;

    $getDeleteOption = getDeleteOption();

    $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";

       $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' class='session_edits'><i class='ri-edit-box-fill'></i></a>";

        

       if($row->isDelete==1){

       $isDeleteUrl      = base_url().'commoncontroller/trash_status/live_streaming/delete/id/'.$id;

       $isRetriveUrl     = base_url().'commoncontroller/trash_status/live_streaming/retrive/id/'.$id;

        

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



    

$output .= '

<tr>

 <td>'.$sr++.'</td>

  <td>'.$row->rtmp1.'</td>
  <td>'.$status.'</td>

 <td>'.$optionLink.'</td>

 

</tr>

';

}



$output .= '</tbody></table>';

return $output;    

   }



}


 
public function get_media($isFilter,$limit,$start,$filder){

       

       

    $this->db->select("*");

    $this->db->from("media");

    $this->db->order_by('id','desc');

    

    if(!empty($filder['isDelete'])){

    

    $this->db->where('isDelete',$filder['isDelete']);

       

    }

    else{

     $this->db->where('isDelete',0);   

    }

    
    if(!empty($filder['isTrending'])){

    

      $this->db->where('isTrending',$filder['isTrending']);
  
         
  
      }
  
    

    

    if(!empty($filder['name'])){

    $this->db->like('name',$filder['name']);

    }
    
    if(!empty($filder['sub_category_id'])){

    $this->db->like('sub_category_id',$filder['sub_category_id']);

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
    <th>Category Name</th>
    <th>Gener Name</th>
    <th>Video Link</th>
   <th>Banner</th>
   <th>Slider Banner</th>
  <th>Is Trending</th>

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

         $del_url     = base_url().'media/delete_media/'.$id;

          $edit_url    = base_url().'media/edit_form/medias_edit/media/id/'.$id;

          $getDeleteOption = getDeleteOption();

          $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";

         $edit_link   = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' 
         class='session_edits'><i class='ri-edit-box-fill'></i></a>";

          

         if($row->isDelete==1){

         $isDeleteUrl      = base_url().'commoncontroller/trash_status/media/delete/id/'.$id;

         $isRetriveUrl     = base_url().'commoncontroller/trash_status/media/retrive/id/'.$id;

          

         $isDeleteUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isDeleteUrl' name='$id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";

         $isRetriveUrlLink = "<a href='javascript:void(0)' onclick='return trashStatus(this.id);' id='$isRetriveUrl' name='$id' class='session_deletes'><i class='ri-arrow-go-back-fill'></i></a>";



          $optionLink  = $isDeleteUrlLink.' '.$isRetriveUrlLink; 

         }

         else{

           $optionLink  = $edit_link.' '.$delete_link;   

         }

          

           $subcategoryName = $this->Common->get_col_by_key('sub_categories','id',$row->sub_category_id,'name');

           $generName = $this->Common->get_col_by_key('geners','id',$row->gener_id,'title');



   

   $File = $row->banner;
           if(!empty($File))

           { 

               $load_url1 = 'uploads/media/'.$File;

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

           $fileData = "<a href='$url' target='_new'><img src='$url' , style='height:50px; width:50px'></a>";

           $File2 = $row->localVideo;
           if(!empty($File))

           { 

               $load_url12 = 'uploads/media/'.$File2;

               if(file_exists($load_url12))

               {

              $url2 = base_url().$load_url12;			

               }

               else

               {

               $url2 = base_url().'uploads/no_file.jpg';		

               }

           }

           else

           {

           $url2 = base_url().'uploads/no_file.jpg';

           }

           $fileDataLocal = "<a href='$url2' target='_new'><img src='$url2' , style='height:50px; width:50px'></a>";
           
   

    if($row->status=='Active'){

      $status = '<span class="badge bg-success">Active</span>'; 

   }else{

      $status = '<span class="badge bg-danger">Deactive</span>';

   }

   if($row->isSlider=='1'){

    $isSlider = '<span class="badge bg-primary">yes</span>'; 

 }else{

    $isSlider = '<span class="badge bg-warning">no</span>';

 }

if($row->isTrending=='1'){

    $isTrending = '<span class="badge bg-success">yes</span>'; 

 }else{

    $isTrending = '<span class="badge bg-danger">no</span>';

 }

          

 $output .= '

 <tr>

   <td>'.$sr++.'</td>

    <td>'.$row->name.'</td>
    <td>'.$subcategoryName.'</td>
    <td>'.$generName.'</td>
    <td>'.$row->video_link.'</td>
    <td>'.$fileData.'</td>
    <td>'.$isSlider.'</td>
    <td>'.$isTrending.'</td>

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
