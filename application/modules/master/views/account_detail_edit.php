
 <!--<?php $this->load->view('include/userAction');  ?>-->
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_account_detail/update" method="POST" class="row g-3">
                          <div class="col-md-4">
                                <label for="" class="form-label">Bank Name</label>
                                <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
                                <input type="text" name="bank_name" class="form-control" value="<?php echo $row[0]->bank_name; ?>"> 
                          </div>
                          
                          
                           <div class="col-md-4">
                                <label for="" class="form-label">Account Number</label>
                                <input type="text" name="account_number" class="form-control" value="<?php echo $row[0]->account_number; ?>"> 
                          </div>
                          
                             <div class="col-md-4">
                                <label for="" class="form-label">IFSE CODE </label>
                                <input type="text" name="ifsc" class="form-control" value="<?php echo $row[0]->ifsc; ?>"> 
                          </div>
                          
                             <div class="col-md-4">
                                <label for="" class="form-label">Branch Name</label>
                                <input type="text" name="branch_name" class="form-control" value="<?php echo $row[0]->branch_name; ?>"> 
                          </div>
                          
                          
                          <div class="col-md-4">
                              <?php 
                             $File = $row[0]->bank_logo;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/account_detail/'.$File;
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
                                <label for="" class="form-label">Bank Logo &nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="bank_logo">
                                <input type="file" name="bank_logo" class="form-control"> 
                          </div>
                          
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Status</label>
                                
                                <select name="status" class="form-control input-sm">
                                    <option value="">Status</option>
                                    <option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option>
                                    <option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option>
                                    </select>
                                
                                
                          </div>
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
</form>



