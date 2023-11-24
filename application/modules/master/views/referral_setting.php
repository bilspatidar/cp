

 <div class="card">
            <div class="card-body">
             
      
      <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                	<?php
                        $data = $this->db->get('reffer_setting');
                        
        	if($data->num_rows()>0){
        	    $row = $data->result();
        	    $id = $row[0]->id;
        	    $title = $row[0]->title;
        	     $image = $row[0]->image;
        	    $description = $row[0]->description; 
        	    $status = $row[0]->status;
        	   $amount = $row[0]->amount; 
        	    $used_limit = $row[0]->used_limit; 
        	    $onSignUp = $row[0]->onSignUp; 



        	    
        	}
        	else {
        $id  = '';	    
        $title = '';
        $image = '';
         $description ='';
         $status ='';
         $amount ='';
         $used_limit ='';
         $onSignUp ='';
        	}
                         ?>    
                      
               
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                 <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                                       
                                       
                </div>
                <div class="tab-pane fade show active session_adds" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
                <form id="crudForm" action="<?php echo base_url(); ?>master/add_referral_setting/update" method="POST" class="row g-3">
                       	 
                          
                          <div class="col-md-6">
                <label for="" class="form-label">Title</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>"> 
                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>"> 
          </div>
          <div class="col-md-6">
                <label for="" class="form-label">Reward Value</label>
                <input type="number" name="amount" step ="any" class="form-control" value="<?php echo $amount; ?>"> 
          </div>
           <div class="col-md-6">
                <label for="" class="form-label">Used Limit <span style="font-size:10px">Note : Per Transaction used Reward Value </span></label>
                <input type="number" step ="any" name="used_limit" class="form-control" value="<?php echo $used_limit; ?>"> 
          </div>
          <div class="col-md-6">
                <label for="" class="form-label">Reward Eligibility on Signup</label><br>
            <input type="radio"name="onSignUp"value="1" <?php if($onSignUp=='1'){ echo'checked'; } ?>> Yes
            <input type="radio"name="onSignUp"value="0" <?php if($onSignUp=='0'){ echo'checked'; } ?>> No
          </div>
                    
                         <div class="col-md-6">
                                <label for="" class="form-label">Status</label>
                                
                                <select name="status" class="form-control input-sm">
                                <option value="">Status</option>
                                <option value="Active" <?php if($status=='Active'){ echo'selected'; } ?>>Active</option>
                                <option value="Deactive" <?php if($status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
                          </div>
                          
                            <div class="col-md-6">
                              <?php 
                             $File = $image;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/reffer_setting/'.$File;
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



