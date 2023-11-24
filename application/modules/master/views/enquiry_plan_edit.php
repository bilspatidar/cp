
 <!--<?php $this->load->view('include/userAction');  ?>-->
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_enquiry_plan/update" method="POST" class="row g-3">
                          
                          
                           <div class="col-md-4">
                                <label for="" class="form-label">Plan Name</label>
                              <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
                                <input type="text" name="plan_name" class="form-control"value="<?php echo $row[0]->plan_name; ?>"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Duration</label>
                                <input type="number" name="duration" class="form-control"value="<?php echo $row[0]->duration; ?>"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label">Amount</label>
                                <input type="number" name="amount" class="form-control"value="<?php echo $row[0]->amount; ?>"> 
                          </div>
                           <div class="col-md-12">
                                <label for="" class="form-label">Description</label>
                                <textarea type="text" name="description" class="form-control"><?php echo $row[0]->description; ?> </textarea>
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



