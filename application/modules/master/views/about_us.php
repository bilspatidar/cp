

 <div class="card">
            <div class="card-body">
             
      
      <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
               
               
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                 <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                                       
                                       
                </div>
                <div class="tab-pane fade show active session_adds" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
                <form id="crudForm" action="<?php echo base_url(); ?>master/add_about_us/update" method="POST" class="row g-3">
                       	<?php
                        $pages = $this->db->get_where('pages',array('id'=>'1'));
                        
        	if($pages->num_rows()>0){
        	    $row = $pages->result();
        	    $id = $row[0]->id;
        	    $title = $row[0]->title;
        	     $image = $row[0]->image;
        	    $description = $row[0]->description; 
        	     $banner = $row[0]->banner;
        	    $status = $row[0]->status;
        	    
        	}
        	else {
        $id  = '';	    
        $title = '';
        $image = '';
          $banner = '';
         $description ='';
         $status ='';
        	}
                         ?>    
                          
                          <div class="col-md-4">
                <label for="" class="form-label">Title</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>"> 
                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>"> 
          </div>
                    
                         <div class="col-md-4">
                                <label for="" class="form-label">Status</label>
                                
                                <select name="status" class="form-control input-sm"><option value="">Status</option><option value="Active" <?php if($status=='Active'){ echo'selected'; } ?>>Active</option>
                                <option value="Deactive" <?php if($status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
                          </div>
                          
                            <div class="col-md-4">
                              <?php 
                             $File = $image;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/pages/'.$File;
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
                              <input type="hidden" name="image" >
                                <input type="file" name="image" class="form-control"> 
                          </div>
                          
                                <div class="col-md-4">
                              <?php 
                             $File = $banner;
		   
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
                    			
                                $fileData = "<a href='$url' target='_blank'>File</a>";			
                    		}
                    		else
                    		{
                    		$url = base_url().'uploads/no_file.jpg';
                    		$fileData = '';
                    		}
                              ?>
                                <label for="" class="form-label">Banner &nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="banner" >
                                <input type="file" name="banner" class="form-control"> 
                          </div>
                
               <div class="col-md-12">
                                <label for="" class="form-label">Description</label>
			<textarea class="form-control summernote " name="description"><?php echo $description;?></textarea>
			</div>
          
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
                          
</form>


                </div>
               
              </div><!-- End Default Tabs -->

            </div>
          </div>



