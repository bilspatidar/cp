
 <!--<?php $this->load->view('include/userAction');  ?>-->
 <form id="crudFormEdit" action="<?php echo base_url(); ?>media/add_media/update" method="POST" class="row g-3">
                         
                         <div class="col-md-4">
                                <label for="" class="form-label">Name</label>
                             <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 

                                <input type="text" name="name" class="form-control"value="<?php echo $row[0]->name; ?>"> 
                          </div>

                          
                       <div class="col-md-4">
                             <label for="" class="form-label">Category</label>
                         <select class="form-control select2" name="sub_category_id[]" style="width:100%" multiple>
                         <option value="">Category</option>
     <?php 
                                        $categories = $this->Common->getCategory();
                                        foreach($categories as $category){ ?>
                                         <optgroup label="<?php echo $category->name; ?>">
                                         <?php 
                                           $subcategories = $this->Common->getSubCategory($category->id); 
                                          $sub_category_id_array = explode(',',$row[0]->sub_category_id);
                                         foreach($subcategories as $subcategory){ ?>
                                        <option value="<?php echo $subcategory->id; ?>"
                                        <?php if(in_array($subcategory->id,$sub_category_id_array)){ echo "selected";} ?> >
                                       <?php echo $subcategory->name; ?></option>
                                        <?php }?>
                                       </optgroup>
                                        <?php } ?>
    
   
  </select>
      	</div>                
          

                          <div class="col-md-4">
                              <label for="" class="form-label">Gener</label>
                                <select class="form-control select2" name="gener_id[]" style="width:100%" multiple>
                                    <option value="">select</option>
                                        <?php 
                                            $geners_id_array = explode(',',$row[0]->gener_id);
                                        $geners = $this->Common->getGeners();
                                        foreach($geners as $gener){ ?>
                                        <option value ="<?php echo $gener->id; ?>" 
                                        <?php if(in_array($gener->id,$geners_id_array)){ echo "selected";} ?>
                                        ><?php echo $gener->title; ?></option>
                                        <?php } ?>
                                        
                                     </select>
                              
                          </div>
                     

                   
                         
                          
                        
       <div class="col-md-4">
       
    <label for="" class="form-label">Video Type</label><br>
   <input type="radio" name="video_type" <?php if($row[0]->video_type=='Local'){ echo'checked';}?> 
   onclick="showlink(this.value)" value="Local"/>&nbsp;&nbsp; Local 
  <input type="radio" name="video_type" <?php if($row[0]->video_type=='Youtube_link'){ echo'checked';}?>
   onclick="showlink(this.value)"  value="Youtube_link" /> Youtube link
                          </div>

 <div class="col-md-4" id="showlinkfileEdit" style="display:<?php if($row[0]->video_type=='Local'){ echo'block';} else { echo'none'; } ?>">
                              <?php 
                             $File = $row[0]->localVideo;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/media/'.$File;
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
                              ?>
                                <label for="" class="form-label">Video &nbsp;&nbsp; <?= $fileData;?></label>
                                <input type="hidden" name="localVideo">
                                <input type="file" name="localVideo" class="form-control" > 
                          </div>
                          



                               <div class="col-md-4"id="showyoutubelinkEdit" style="display:<?php if($row[0]->video_type=='Youtube_link'){ echo'block';} else { echo'none'; } ?>">
                                <label for="" class="form-label" >Youtube Link</label>
                                <input type="text" name="video_link" class="form-control"
                                value="<?php echo $row[0]->video_link; ?>"> 
                          </div>

                          <div class="col-md-4">
                              <?php 
                             $File = $row[0]->banner;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/media/'.$File;
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
                              ?>
                                <label for="" class="form-label">Banner (422*700)&nbsp;&nbsp; <?= $fileData;?></label>
                                
                                <input type="file" name="banner" class="form-control" id="cover"> 
                                <input type="hidden" name="bannerhhhh">
                          </div>
                          


                         
                          <div class="col-md-4">
						    <label for="" class="form-label">Is Slider</label>
						   <br>
							<input type="checkbox" onclick="showbannerEdit(this.value)" value="1" <?php if($row[0]->isSlider=='1'){ echo'checked'; } ?> class="form-controls" name="isSlider"> Yes
            </div>
                          
                         
            <div class="col-md-4" id="Noedit" style="display:<?php if($row[0]->isSlider=='1'){ echo'block';} else { echo'none'; } ?>" >
                              <?php 
                             $File = $row[0]->sliderBanner;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/sliderBanner/'.$File;
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
                              ?>
                                <label for="" class="form-label">Slider Banner (422*700)&nbsp;&nbsp; <?= $fileData;?></label>
                              
                                <input type="file" name="sliderBanner" class="form-control" id="cover"> 
                                <input type="hidden" name="sliderBannerssss">
                          </div>
                          

                          <div class="col-md-4">
                                <label for="" class="form-label">Status</label>
                                
                                <select name="status" class="form-control input-sm">
                                    <option value="">Status</option>
                                    <option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option>
                                    <option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option>
                                    </select>
                                
                                
                          </div>

                          <div class="col-md-4">
						    <label for="" class="form-label">Use banner in default Yutube</label>
						   <br>
							<input type="checkbox"value="1" <?php if($row[0]->defaultBannerYutube=='1'){ echo'checked'; } ?> class="form-controls" name="defaultBannerYutube"> Yes
            </div>

            <div class="col-md-4">
						    <label for="" class="form-label">Is Trending</label>
						   <br>
							<input type="checkbox"value="1" <?php if($row[0]->isTrending=='1'){ echo'checked'; } ?> class="form-controls" name="isTrending"> Yes
            </div>

                           <div class="col-md-12">
                                <label for="" class="form-label">Description</label>
                                <textarea type="text" name="video_description" class="form-control"><?php echo $row[0]->video_description; ?> </textarea>
                          </div>
                           
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
</form>





<script>
function showlink(val){
  
if(val=='Youtube_link'){
$('#showyoutubelinkEdit').show();
$('#showlinkfileEdit').hide();

}else{
$('#showlinkfileEdit').show();
$('#showyoutubelinkEdit').hide();
}

}







</script>
<script>
   
    $('.select2').select2({
        dropdownParent: $('#ExtralargeEditModal')
    });
</script>


<script>
  

function showbannerEdit() {
  var x = document.getElementById("Noedit");
  if (x.style.display === "block") {
    
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>