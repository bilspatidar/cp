
 <!--<?php $this->load->view('include/userAction');  ?>-->
 

 
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_sub_payment_type/update" method="POST" class="row g-3">
              <div class="col-md-4">
                <label for="" class="form-label">Name</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
                <input type="text" name="name" class="form-control" value="<?php echo $row[0]->name; ?>"> 
          </div>
                
                <div class="col-md-4">
                <label for="" class="form-label">Lable</label>
                <input type="text" name="lable" class="form-control" value="<?php echo $row[0]->lable; ?>"> 
          </div>         
                     
                       <div class="col-md-4">
                <label for="" class="form-label">Type</label>
                <select name="type" class="form-control input-sm">
                    <option value="">Type</option>
                    <option value="text" <?php if($row[0]->type=='text'){echo'selected';} ?>>Text</option>
                    <option value="number" <?php if($row[0]->type=='number'){echo'selected';} ?>>Number</option>
                </select>
               
          </div> 
          
          <div class="col-md-4">
                              <label for="" class="form-label">Input Id</label>
                              <input type="text" name="input_id" class="form-control" value="<?php echo $row[0]->input_id; ?>">
                              
                          </div>
                         
                         <div class="col-md-4">
                                <label for="" class="form-label">Status</label>
                                
                                <select name="status" class="form-control input-sm"><option value="">Status</option>
                                <option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option><option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
                          </div>
             
            
                               
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
</form>


