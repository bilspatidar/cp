
 <!--<?php $this->load->view('include/userAction');  ?>-->
 

 
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_study_material/update" method="POST" class="row g-3">
                         
                          <input type="hidden" name="course_id" class="form-control" value="<?php echo $row[0]->course_id; ?>">  
                          <div class="col-md-8">
                            <label for="" class="form-label">Title</label>
                            <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
                            <input type="text" name="title" class="form-control" value="<?php echo $row[0]->title; ?>"> 
                              
 </div>
                      
                
                 <div class="col-md-4">
                                <label for="" class="form-label">Type</label>
                                
                                <select name="type" class="form-control input-sm"><option value="">Type</option><option value="file" <?php if($row[0]->type=='file'){ echo'selected'; } ?>>File</option><option value="video" <?php if($row[0]->type=='video'){ echo'selected'; } ?>>Video</option><option value="mp3" <?php if($row[0]->type=='mp3'){ echo'selected'; } ?>>MP3</option></select>
                          </div>
                
                  <div class="col-md-4">
                                <label for="" class="form-label">Sr. No</label>
                                <input type="number" name="sr_number" class="form-control" value="<?php echo $row[0]->sr_number ;?>"> 
                          </div>
                          <div class="col-md-12">
                        <label for="" class="form-label">YouTube Url</label>
                            <input type="text"  name="youtube_url" class="form-control" value="<?php echo $row[0]->youtube_url ;?>"> 
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
                    	        $load_url = 'uploads/study_material/'.$File;
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
                                <input type="file" name="image" class="form-control" id="cover"> 
                          </div>
                        
                                
                <div class="col-md-12">
                <label for="" class="form-label">Description</label>
                <textarea type="text"  name="description" class="form-control summernote"><?php echo $row[0]->description ;?> </textarea>
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
