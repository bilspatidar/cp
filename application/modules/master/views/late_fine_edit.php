 <?php $this->load->view('include/userAction');  ?>
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_late_fine/update" method="POST" class="row g-3">
                          <div class="col-md-4">
                                <label for="" class="form-label">From Day</label>
                                <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
                                <input type="text" name="fromDay" class="form-control" value="<?php echo $row[0]->fromDay; ?>"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">To Day</label>
                                <input type="text" name="toDay" class="form-control" value="<?php echo $row[0]->toDay; ?>"> 
                          </div>
                          
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Fine Inr</label>
                                <input type="text" name="fine_inr" class="form-control" value="<?php echo $row[0]->fine_inr; ?>"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Fine Percentage</label>
                                <input type="text" name="fine_percentage" class="form-control" value="<?php echo $row[0]->fine_percentage; ?>"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Status</label>
                                
                                <select name="status" class="form-control input-sm"><option value="">Status</option><option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option><option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
                                
                                
                          </div>
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
</form>



