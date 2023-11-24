
 <!--<?php $this->load->view('include/userAction');  ?>-->
 

 
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_service/update" method="POST" class="row g-3">
                          <div class="col-md-4">
                <label for="" class="form-label">Title</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
                <input type="text" name="title" class="form-control" value="<?php echo $row[0]->title; ?>"> 
          </div>
          
           <div class="col-md-4">
                                <label for="" class="form-label">Tax</label>
                                <select  class="form-control" name="tax">
							    <option value="">Select Tax</option>
							    
							       <?php 
                                        $taxes = $this->Common->getTax();
                                        foreach($taxes as $tax){ ?>
                                        <option value="<?php echo $tax->tax; ?>" <?php if($tax->tax==$row[0]->tax) {echo 'selected';}  ?>><?php echo $tax->tax; ?> %</option>
                                        <?php } ?>
							    </select>
						</div>
           <div class="col-md-4">
                <label for="" class="form-label">Price</label>
                <input type="number" name="price" class="form-control" value="<?php echo $row[0]->price; ?>"> 
          </div>
          
           <div class="col-md-4">
                <label for="" class="form-label">Time ( Minute )</label>
                <input type="number" name="time" class="form-control" value="<?php echo $row[0]->time; ?>"> 
          </div>
          
           <div class="col-md-4">
                <label for="" class="form-label">Buffer Time ( Minute )</label>
                <input type="number" name="buffer_time" class="form-control" value="<?php echo $row[0]->buffer_time; ?>"> 
          </div>
          
          <div class="col-md-4">
                                <label for="" class="form-label">Service Category</label>
                                <select class="form-control select2" name="service_category_id" style="width:100%" required onChange="getSerSubCategory(this.value)" >
                                       <option value="">Select Category</option>
                                        <?php 
                                        $Serrcategories = $this->Common->getServiceCategory();
                                        foreach($Serrcategories as $Sercategory){ ?>
                                        <option value="<?php echo $Sercategory->services_categories_id; ?>" <?php if($Sercategory->services_categories_id==$row[0]->service_category_id){echo "selected";}?>><?php echo $Sercategory->name; ?></option>
                                        <?php } ?>
                                     </select>
                                     </div>
                                     
                                      <div class="col-md-4">
                                <label for="" class="form-label">Service Sub Category</label>
                                <select class="form-control" name="service_sub_category_id" id="sersubcategory_html" style="width:100%" required>
                                   <option value="">Select Subcategory</option>
                        <?php 
                        $subCat = $this->Common->getSerSubcategory();
                        foreach($subCat as $subCatEdit){ ?>
                        <option value="<?php echo $subCatEdit->services_sub_category_id; ?>" <?php if($subCatEdit->services_sub_category_id==$row[0]->service_sub_category_id){echo 'selected';} ?> ><?php echo $subCatEdit->name; ?></option>
                        <?php } ?>
                                     </select>
                                     </div>
                      
                         
                  
                         
                         <div class="col-md-4">
                                <label for="" class="form-label">Status</label>
                                <select name="status" class="form-control input-sm"><option value="">Status</option><option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option><option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
                          </div>
                
               <div class="col-md-12">
               <label for="" class="form-label">Service Keyword</label>
			   <input type="text" class="form-control" name="service_keyword" value="<?php echo $row[0]->service_keyword;?>">
			   </div>
               
               <div class="col-md-12">
               <label for="" class="form-label">Short Description</label>
			   <textarea class="form-control" name="short_description"><?php echo $row[0]->short_description;?></textarea>
			   </div>
               
               <div class="col-md-12">
               <label for="" class="form-label">Long Description</label>
			   <textarea class="form-control summernote" name="long_description"><?php echo $row[0]->long_description;?></textarea>
			   </div>
                                    
                            <div class="col-md-4">
                              <?php 
                             $File = $row[0]->image;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/services/'.$File;
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
                                <label for="" class="form-label">Image &nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="image">
                                <input type="file" name="image" class="form-control"> 
                          </div>
                          
                           <div class="col-md-4">
                              <?php 
                             $File = $row[0]->image1;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/services/'.$File;
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
                                <label for="" class="form-label">Image2 &nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="image1">
                                <input type="file" name="image1" class="form-control"> 
                          </div>
                          
                          <div class="col-md-4">
                              <?php 
                             $File = $row[0]->image2;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/services/'.$File;
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
                                <label for="" class="form-label">Image3 &nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="image2">
                                <input type="file" name="image2" class="form-control"> 
                          </div>
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
</form>

<script>
  $(document).ready(function() {
  $('.summernote').summernote({
       height: 200
  });
 
});

  </script>
