
 <!--<?php $this->load->view('include/userAction');  ?>-->
 

 
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_course/update" method="POST" class="row g-3">
                          <div class="col-md-8">
                <label for="" class="form-label">Title</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
                <input type="text" name="title" class="form-control" value="<?php echo $row[0]->title; ?>"> 
          </div>
                       
                       
                       
                       
                             	<div class="col-md-4">
                                <label for="" class="form-label">Course Category Name</label>
                                <select class="form-control select2" name="course_category_id" style="width:100%">
                                   <option value="">select</option>
                                        <?php 
                                        $categories = $this->Common->getCourseCategory();
                                        foreach($categories as $category){ ?>
                                        <option value="<?php echo $category->id; ?>" <?php if($category->id==$row[0]->course_category_id) {echo 'selected';} ?>>
                                            <?php echo $category->name; ?> </option>
                                       
                                        <?php } ?>
                                        
                                     </select>
                              
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Tax</label>
                                <select  class="form-control" name="tax">
							    <option value="">Select Tax</option>
							    
							       <?php 
                                        $taxes = $this->Common->getTax();
                                        foreach($taxes as $tax){ ?>
                                        <option value="<?php echo $tax->tax; ?>" <?php if($tax->tax==$row[0]->tax) {echo 'selected';}  ?>><?php echo $tax->tax; ?> %</option>
                                        <?php } ?>
							    </select>
						</div>
                          
                          
                           <div class="col-md-4">
                                <label for="" class="form-label">Learn from Pre-recorded Sessions</label>
                                <input type="number" name="course_fee" step="any" class="form-control"value="<?php echo $row[0]->course_fee; ?>"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label">Learn in a Batch</label>
                                <input type="number" name="course_fee_online" step="any" class="form-control"value="<?php echo $row[0]->course_fee_online; ?>"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label">Learn in Personalized Sessions</label>
                                <input type="number" name="personal_price" step="any" class="form-control"value="<?php echo $row[0]->personal_price; ?>"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label">Course Discount (In Percentage)</label>
                                <input type="number" name="discount" step="any" class="form-control"value="<?php echo $row[0]->discount; ?>"> 
                          </div>
                          
                           <div class="col-md-4">
                                <label for="" class="form-label">Number Of Session</label>
                                <input type="number" name="number_of_session" class="form-control"value="<?php echo $row[0]->number_of_session; ?>"> 
                          </div>
                         
                  <div class="col-md-4">
                                <label for="" class="form-label">Duration(In Days)</label>
                                <input type="number" name="duration" class="form-control" value="<?php echo $row[0]->duration; ?>"> 
                          </div>
                         
                          <div class="col-md-4">
                                <label for="" class="form-label">Study Material Validity (In Days)</label>
                                <input type="number" name="study_material_validity" class="form-control" value="<?php echo $row[0]->study_material_validity; ?>"> 
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
                    	        $load_url = 'uploads/course/'.$File;
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
