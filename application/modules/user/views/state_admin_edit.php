
 <!--<?php $this->load->view('include/userAction');  ?>-->
 

 
 <form id="crudFormEdit" action="<?php echo base_url(); ?>user/add_user/update" method="POST" class="row g-3">
                         
                       
                       
                             	<div class="col-md-4">
                                <label for="" class="form-label"> State Name</label>
                                <select class="form-control select2" name="state_id" style="width:100%">
                                   <option value="">select</option>
                                        <?php 
                                        $states = $this->Common->getState();
                                        foreach($states as $state){ ?>
                                        <option value="<?php echo $state->id; ?>" <?php if($state->id==$row[0]->state_id) {echo 'selected';} ?>>
                                            <?php echo $state->name; ?> </option>
                                       
                                        <?php } ?>
                                        
                                     </select>
                              
                          </div>
                         
                    
                          <div class="col-md-4">
                <label for="" class="form-label">Name</label>
               <input type="hidden" name="users_id" class="form-control" value="<?php echo $row[0]->users_id; ?>"> 

                <input type="text" name="name" class="form-control" value="<?php echo $row[0]->name; ?>"> 
          </div>
                    
                    <div class="col-md-4">
                <label for="" class="form-label">Email</label>
              
                <input type="email" name="email" class="form-control" value="<?php echo $row[0]->email; ?>"> 
          </div>
          
          
          <div class="col-md-4">
                <label for="" class="form-label">Mobile</label>
              
                <input type="number" name="mobile" class="form-control" value="<?php echo $row[0]->mobile; ?>"> 
          </div>
          
         <div class="col-md-4">
        <label for="" class="form-label">change Password <input type="checkbox" name="check" value="1"></label>
         <input type="password" name="password" class="form-control">
    </div>
          
                         <div class="col-md-4">
                                <label for="" class="form-label">Status</label>
                                
                                <select name="status" class="form-control input-sm"><option value="">Status</option><option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option><option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
                          </div>
                          
                            <div class="col-md-4">
                              <?php 
                             $File = $row[0]->id_card;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/users/'.$File;
                    			if(file_exists($load_url))
                    			{
                    		   $url = base_url().$load_url;			
                    			}
                    			else
                    			{
                    			$url = base_url().'uploads/no_file.jpg';		
                    			}
                    			
                                $id_card = "<a href='$url' target='_blank'>File</a>";			
                    		}
                    		else
                    		{
                    		$url = base_url().'uploads/no_file.jpg';
                    		$fileData = '';
                    		}
                              ?>
                                <label for="" class="form-label">ID Proof &nbsp;&nbsp; <?= $id_card;?></label>
                              <input type="hidden" name="id_card">
                                <input type="file" name="id_card" class="form-control"> 
                          </div>
                          
                          <div class="col-md-4">
                              <?php 
                             $File = $row[0]->profile_pic;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/users/'.$File;
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
                                <label for="" class="form-label">Photo &nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="profile_pic">
                                <input type="file" name="profile_pic" class="form-control"> 
                          </div>        
                
               <div class="col-md-12">
                                <label for="" class="form-label">Address</label>
			<textarea class="form-control " name="address"><?php echo$row[0]->address;?></textarea>
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

