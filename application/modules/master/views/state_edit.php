 <?php $this->load->view('include/userAction');  ?>
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_state/update" method="POST" class="row g-3">
                          <div class="col-md-4">
                                <label for="" class="form-label">State Name</label>
                                <input type="hidden" name="state_id" class="form-control" value="<?php echo $row[0]->state_id; ?>"> 
                                <input type="text" name="state_name" class="form-control" value="<?php echo $row[0]->state_name; ?>"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Status</label>
                                
                                <select name="status" class="form-control input-sm"><option value="">Status</option><option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option><option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
                                
                                
                          </div>
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
</form>



