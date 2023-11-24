
 <!--<?php $this->load->view('include/userAction');  ?>-->
				<form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_slider/update" method="POST" class="row crudForm g-3" enctype="multipart/form-data">
					<div class="col-md-4">
						<label for="" class="form-label">Title *</label>
						<input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id;?> "> 

						<input type="text" name="title" class="form-control" value="<?php echo $row[0]->title;?> "> 
					</div>
					<div class="col-md-4">
						<label for="" class="form-label">Link *</label>
						<input type="text" name="link" class="form-control"value="<?php echo $row[0]->link;?>" > 
					</div>
				<div class="col-md-4">
                              <?php 
                             $File = $row[0]->image;
		   
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
                              ?>
                                <label for="" class="form-label">Image &nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="image">
                                <input type="file" name="image" class="form-control"> 
                          </div>
                             <div class="col-md-4">
                                <label for="" class="form-label">Status</label>
                                
                                <select name="status" class="form-control input-sm">
                                    <option value="">Status</option>
                                    <option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option>
                                    <option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option>
                                    </select>
                                
                                
                          </div>
                          
                          
					<div class="col-md-12">
						<label for="" class="form-label">Description</label>
						<textarea class="form-control" name="description"><?php echo $row[0]->description;?></textarea>
					</div>	
					<div class="col-12">
						<button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
					</div>
				</form>



