
 <div class="card">
            <div class="card-body">
             
      
      <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
           
               
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                 <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                                       
                                       
                </div>
                <div class="tab-pane fade show active session_adds" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <form id="crudForm" action="<?php echo base_url(); ?>master/add_contact_us/update" method="POST" class="row g-3">
                     <?php
                        $pages = $this->db->get_where('pages',array('id'=>'6'));
                        
        	if($pages->num_rows()>0){
        	    $row = $pages->result();
        	    $id = $row[0]->id;
        	    $contact_no = $row[0]->contact_no;
        	     $alt_contact_no = $row[0]->alt_contact_no;
        	    $email = $row[0]->email; 
        	     $address1 = $row[0]->address1; 
        	      $address2 = $row[0]->address2; 
        	       $map_link = $row[0]->map_link; 
        	        $banner = $row[0]->banner;
        	}
        	else {
        $id  = '';	    
        $contact_no = '';
        $alt_contact_no = '';
         $email ='';
        $address1 ='';
         $address2 ='';
          $map_link ='';
            $banner = '';
          
        	}
                         ?>      
                         
                         
                          <div class="col-md-4">
                <label for="" class="form-label">Contact No</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>"> 
                <input type="number" name="contact_no" class="form-control" value="<?php echo $contact_no; ?>"> 
          </div>
                
                   <div class="col-md-4">
                <label for="" class="form-label">Alt Contact No</label>
                <input type="nuber" name="alt_contact_no" class="form-control" value="<?php echo $alt_contact_no; ?>"> 
          </div>     
              
                       <div class="col-md-4">
                <label for="" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>"> 
          </div>
                
                   <div class="col-md-4">
                <label for="" class="form-label">Address 1</label>
                <input type="text" name="address1" class="form-control" value="<?php echo $address1; ?>"> 
          </div> 
          
            <div class="col-md-4">
                <label for="" class="form-label">Address 2</label>
                <input type="text" name="address2" class="form-control" value="<?php echo $address2; ?>"> 
          </div>
           <div class="col-md-4">
                              <?php 
                             $File = $banner;
		   
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
                                <label for="" class="form-label">Banner &nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="banner" >
                                <input type="file" name="banner" class="form-control"> 
                          </div>
                
          
           <div class="col-md-12">
                <label for="" class="form-label">Map Link</label>
        <textarea class="form-control" name="map_link"><?php echo $map_link; ?></textarea>
          </div>
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
</form>


                </div>
               
              </div><!-- End Default Tabs -->

            </div>
          </div>




