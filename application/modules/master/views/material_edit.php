





 <?php $this->load->view('include/userAction');  ?>
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_material/update" method="POST" class="row g-3" enctype="multipart/form-data">
          
                    <div class="col-md-6">
                                <label for="" class="form-label">Title</label>
                                <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id ;?>">
                                <input type="text" name="title" class="form-control" value="<?php echo $row[0]->title ;?>"> 
                                </div>
                          
                          <div class="col-md-6">
                                <label for="" class="form-label">Keyword(keyword one,keyword two,..........keyword n)</label>
                                <input type="text" name="material_keyword" class="form-control" value="<?php echo $row[0]->material_keyword ;?>"> 
                           </div>
                          
                          <div class="col-md-12">
                                <label for="" class="form-label">Description</label>
                                <textarea type="text"  name="description" class="form-control summernote"><?php echo $row[0]->description ;?> </textarea>
                                 </div>

                          <div class="col-md-12">
                                <label for="" class="form-label">Meta Description</label>
                                <textarea type="text" name="meta_description" class="form-control"><?php echo $row[0]->meta_description ;?></textarea>
                          </div>
                          
                           <div class="col-md-4">
                              <?php 
                             $File = $row[0]->img;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/material/'.$File;
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
                              <input type="hidden" name="img">
                                <input type="file" name="img" class="form-control"> 
                          </div>
                          
                           <div class="col-md-4">
                              <?php 
                             $File = $row[0]->img1;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/material/'.$File;
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
                              <input type="hidden" name="img1">
                                <input type="file" name="img1" class="form-control"> 
                          </div>
                          
                           <div class="col-md-4">
                              <?php 
                             $File = $row[0]->img2;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/material/'.$File;
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
                              <input type="hidden" name="img2">
                                <input type="file" name="img2" class="form-control"> 
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
    $(".summernote").summernote({
        height: 200,
    });
});
</script>



