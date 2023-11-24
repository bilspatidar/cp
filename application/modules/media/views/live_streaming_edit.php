

<form id="crudFormEdit" action="<?php echo base_url(); ?>media/add_live_streaming/update" method="POST" class="row g-3"
 enctype="multipart/form-data">
      
	
<div class="col-md-12">
                                <label for="" class="form-label">RTMP1</label>
                                <textarea type="text" name="rtmp1" class="form-control"><?php echo $row[0]->rtmp1; ?></textarea>
                                <input type="hidden" name="id" class="form-control"value="<?php echo $row[0]->id; ?>">
                          </div>

                          
                       
                          <div class="col-md-12">
                                <label for="" class="form-label">Message</label>
                                <textarea type="text" name="rtmp2" class="form-control"><?php echo $row[0]->rtmp2; ?></textarea>
                          </div>
                  
            
                  
                  <div class="col-md-4">
                        <label for="" class="form-label">Status</label>
                        <select name="status" class="form-control input-sm"><option value="">Status</option>
                        <option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option>
                        <option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
                  </div>
                  
                  
                  <div class="col-12">
                        <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                  </div>
</form>
