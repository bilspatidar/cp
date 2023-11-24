 <form id="crudFormEdit" action="<?php echo base_url(); ?>user/add_users_service_link/update" method="POST" class="row crudForm g-3">
                          <div class="col-md-4">
                                <label for="" class="form-label">User Name</label>
                                <input type="hidden" class="form-control" name="id" value="<?php echo $row[0]->id;?>">
                               <select class="form-control" name="users_id">
                                   <option value="">Select User</option>
                                 <?php 
                                        $users = $this->Common->getUserName();
                                        foreach($users as $user){ ?>
                                        <option value="<?php echo $user->users_id; ?>" <?php if($user->users_id==$row[0]->users_id){echo "selected";} ?>><?php echo $user->name; ?></option>
                                        <?php } ?>
                               </select>
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Service Name</label>
                               <select class="form-control select2" name="service_id[]" multiple>
                                   <option value="">Select Service</option>
                                 <?php 
                                 $serviceArr = explode(",",$row[0]->service_id);
                                $services = $this->Common->getServiceName();
                                foreach($services as $service){ ?>
                                <option value="<?php echo $service->id; ?>" <?php if(in_array($service->id,$serviceArr)){echo "selected";} ?>><?php echo $service->title; ?></option>
                                <?php } ?>
                               </select>
                          </div>
                           <div class="col-md-4">
                           <label for="" class="form-label">External Price</label>
                           <input type="number" name="external_price" class="form-control" value="<?php echo $row[0]->external_price;?>">
                          </div>
                        <div class="col-md-4">
                           <label for="" class="form-label">Status</label>
                       <select name="status" class="form-control" >
                           <option value="">Select Status</option>
                       <option value="Active" <?php if($row[0]->status=='Active'){echo 'selected';} ?>>Active</option>
                       <option value="Deactive" <?php if($row[0]->status=='Deactive'){echo 'selected';} ?>>Deactive</option>
                       </select>
                       </div>
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
                </form>
<script>
   
    $('.select2').select2({
        dropdownParent: $('#ExtralargeEditModal')
    });

</script>