
 <!--<?php $this->load->view('include/userAction');  ?>-->
 

 
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_business_sub_category/update" method="POST" class="row g-3">
                          <div class="col-md-4">
                <label for="" class="form-label">Name</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
                <input type="text" name="name" class="form-control" value="<?php echo $row[0]->name; ?>"> 
          </div>
                       
                             	<div class="col-md-4">
                                <label for="" class="form-label">Business Category Name</label>
                                <select class="form-control select2" name="business_category_id" style="width:100%">
                                   <option value="">select</option>
                                        <?php 
                                        $categories = $this->Common->getBusinessCategory();
                                        foreach($categories as $category){ ?>
                                        <option value="<?php echo $category->id; ?>" <?php if($category->id==$row[0]->business_category_id) {echo 'selected';} ?>>
                                            <?php echo $category->name; ?> </option>
                                       
                                        <?php } ?>
                                        
                                     </select>
                              
                          </div>
                         
                  
                         
                         <div class="col-md-4">
                                <label for="" class="form-label">Status</label>
                                
                                <select name="status" class="form-control input-sm"><option value="">Status</option><option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option><option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
                          </div>
                          
                            <div class="col-md-4">
                              <?php 
                             $File = $row[0]->image;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/business_sub_category/'.$File;
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
                          
                                
                
              
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
</form>
<!--<script>-->
<!--  $(document).ready(function() {-->
<!--  $('.summernote').summernote({-->
<!--       height: 200-->
<!--  });-->
 
<!--});-->

<!--  </script>-->

