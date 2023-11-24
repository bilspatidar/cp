


 
 
 
 
                 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_brand/update" method="POST" class="row g-3">
              <div class="col-md-4">
                    <label for="" class="form-label">Name</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id;?>"> 
                    <input type="text" name="name" class="form-control" value="<?php echo $row[0]->name;?>"> 
              </div>
            
                     
                          <div class="col-md-4">
                              <?php 
                             $File = $row[0]->brand_banner;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/brand/'.$File;
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
                              <input type="hidden" name="brand_banner">
                                <input type="file" name="brand_banner" class="form-control"> 
                          </div>
                           <div class="col-md-4">
                                <label for="" class="form-label">Status</label>
                                <select name="status" class="form-control input-sm"><option value="">Status</option><option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option><option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
                          </div> 
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
                </form>
