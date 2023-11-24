
 <!--<?php $this->load->view('include/userAction');  ?>-->
 

 
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_payment_gateway/update" method="POST" class="row g-3">
              
              <div class="col-md-6">
                <label for="" class="form-label">Name</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
                <input type="text" name="name" class="form-control" value="<?php echo $row[0]->name; ?>"> 
          </div>
                   <div class="col-md-6">
                                <label for="" class="form-label">Message</label>
                                <input type="text" name="message" class="form-control" value ="<?php echo $row[0]->message;?>"> 
                          </div>
                     
                     <div class="col-md-6">
                                <label for="" class="form-label">Live Api</label>
                                <input type="text" name="live_api" class="form-control" value ="<?php echo $row[0]->live_api;?>"> 
                          </div>
                          
                          <div class="col-md-6">
                                <label for="" class="form-label">Live Secret</label>
                                <input type="text" name="live_secret" class="form-control" value="<?php echo $row[0]->live_secret;?>"> 
                          </div>
                          
                          <div class="col-md-6">
                                <label for="" class="form-label">Test Api</label>
                                <input type="text" name="test_api" class="form-control" value="<?php echo $row[0]->test_api;?>"> 
                          </div>
                          
                          <div class="col-md-6">
                                <label for="" class="form-label">Test Secret</label>
                                <input type="text" name="test_secret" class="form-control" value="<?php echo $row[0]->test_secret;?>"> 
                          </div>
                          <div class="col-md-6">
                                <label for="" class="form-label">Test Url</label>
                                <input type="text" name="test_url" class="form-control" value="<?php echo $row[0]->test_url;?>"> 
                          </div>
                          <div class="col-md-6">
                                <label for="" class="form-label">Live Url</label>
                                <input type="text" name="live_url" class="form-control" value="<?php echo $row[0]->live_url;?>"> 
                          </div>
                           <div class="col-md-6">
                                <label for="" class="form-label">Daily Limit</label>
                                <input type="number" name="daily_limit" class="form-control" value="<?php echo $row[0]->daily_limit;?>"> 
                          </div>
                         <div class="col-md-4">
                              <?php 
                             $File = $row[0]->logo;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/payment_gateway/'.$File;
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
                                <label for="" class="form-label">Logo &nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="logo">
                                <input type="file" name="logo" class="form-control"> 
                          </div>
         <div class="col-md-4">
                <label for="" class="form-label">Status</label>
                
                <select name="status" class="form-control input-sm"><option value="">Status</option><option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option><option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
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
