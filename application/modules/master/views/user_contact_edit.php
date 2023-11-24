
 <!--<?php $this->load->view('include/userAction');  ?>-->
 

 
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_user_contact/update" method="POST" class="row g-3">
             
            <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
                          
                 <div class="col-md-4">
                        <label for="" class="form-label">Status</label>
                        
                        <select name="status" class="form-control input-sm">
                        <option value="">Status</option>
                        <option value="Progress" <?php if($row[0]->status=='Progress'){ echo'selected'; } ?>>Progress</option>
                        <option value="Completed" <?php if($row[0]->status=='Completed'){ echo'selected'; } ?>>Completed</option>
                        <option value="Cancelled" <?php if($row[0]->status=='Cancelled'){ echo'selected'; } ?>>Cancelled</option>
                        </select>
                  </div>
                          
                <div class="col-md-4">
                <label for="" class="form-label">Remarks</label>
                <input type="text" name="remarks" class="form-control" value="<?php echo $row[0]->remarks; ?>"> 
                </div>
                
                <!--<div class="col-md-4">-->
                <!--<label for="" class="form-label">Next date</label>-->
                <!--<input type="date" name="nextdate" class="form-control" value="<?php echo $row[0]->nextdate; ?>"> -->
                <!--</div>-->
                         
              <div class="col-12">
                    <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
              </div>
</form>


