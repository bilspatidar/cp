<!--<?php $this->load->view('include/userAction');  ?>-->
 

 
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_course_session/update" method="POST" class="row g-3">
                         
                
                <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
                <input type="hidden" name="course_id" class="form-control" value="<?php echo $row[0]->course_id; ?>"> 
          </div>
                       
                    
                           <div class="col-md-4">
                                <label for="" class="form-label">Session Title</label>
                                <input type="text" name="course_session"class="form-control"value="<?php echo $row[0]->course_session; ?>"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label">Session Duration (In Min.)</label>
                                <input type="number" name="session_duration" step="any" class="form-control"value="<?php echo $row[0]->session_duration; ?>"> 
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



<script>
$(document).ready(function() {
    $(".summernote").summernote({
        height: 200,
    });
});
</script>