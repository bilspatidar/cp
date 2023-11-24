 <!--<?php $this->load->view('include/userAction');  ?>-->
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_app_pincode/update" method="POST" class="row g-3">
                         
                          
                          <div class="col-md-4">
                              <label for="" class="form-label">Country/Region:*</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
                                <select class="form-control select2" name="country_id" onChange="getState(this.value)" style="width:100%">
                                        <?php
                                        $countries = $this->Common->getCountry();
                                        foreach($countries as $country){ ?>
                                        <option value="<?php echo $country->id; ?>" <?php if($country->id==$row[0]->country_id) {echo 'selected';}?>>
                                            <?php echo $country->name; ?></option>
                                       <?php } ?>
                                        
                                     </select>
                          </div>
                        <div class="col-md-4">
                              <label for="" class="form-label">State/Region:*</label>
                        <select class="form-control select2" id="states_html" name="state_id" onChange="getCity(this.value)" id="state_html" style="width:100%">
   <option value="<?php echo $row[0]->state_id; ?>" selected><?php echo $this->Common->get_col_by_key('states','id',$row[0]->state_id,'name'); ?></option>      
     
                     </select>
                          </div>
                        <div class="col-md-4">
                              <label for="" class="form-label">City:*</label>
                                <select class="form-control select2" name="city_id" id="cities_html" style="width:100%">
     <option value="<?php echo $row[0]->city_id; ?>" selected><?php echo $this->Common->get_col_by_key('cities','id',$row[0]->city_id,'name'); ?></option>      
                                     </select>
                          </div>
                        <div class="col-md-4">

                                <label for="" class="form-label">Pincode</label>
                                <input type="number" name="pincode" class="form-control" value="<?php echo $row[0]->pincode ;?>"  pattern="/^-?\d+\.?\d*$/" min='0' onkeydown="return event.keyCode !== 69" onKeyPress="if(this.value.length==6) return false;"> 
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



