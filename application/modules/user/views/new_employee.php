<div class="card">
    <div class="card-body">
        <form id="crudForm" action="<?php echo base_url(); ?>user/add_user/add" method="POST" class="row crudForm g-3" enctype='multipart/form-data'>
            <h3>User Information</h3>
                          
            <div class="col-md-4">
                <label for="" class="form-label">Name * </label>
                <input type="text" name="name" class="form-control"> 
            </div>
                            
            <div class="col-md-4">
              <label for="" class="form-label">Role :*</label>
              
                <select class="form-control select2" name="role_id[]" style="width:100%" multiple>
                      <option value="">Select Role</option>
                        <?php
                        $role = $this->Common->getUserRole();
                        foreach($role as $roleAll){ ?>
                        <option value="<?php echo $roleAll->id; ?>"><?php echo $roleAll->name; ?></option>
                        <?php }?>
                     </select>
            </div>
                          
            <div class="col-md-4">
                <label for="" class="form-label">Email:* </label>
                <input type="email" name="email" class="form-control"> 
            </div>
          
            <div class="col-md-4">
                <label for="" class="form-label">Phone Number:* </label>
                <input type="number" name="mobile" class="form-control"> 
            </div>
          
            <div class="col-md-4">
                <label for="" class="form-label">Password:* </label>
                <input type="password" name="password" class="form-control"> 
            </div>
          
            <div class="col-md-4">
                <label for="" class="form-label">Confirm Password:* </label>
                <input type="number" name="cPassword" class="form-control"> 
            </div>
        
          
            <div class="col-md-4">
                <label for="" class="form-label">Image</label>
                <input type="hidden" name="profile_pic">
                <input type="file" name="profile_pic" class="form-control"> 
            </div>
                         
          <!--<div class="col-md-4">-->
          <!--      <label for="" class="form-label">Postal code:*</label>-->
          <!--      <input type="text" name="postal_code" class="form-control"> -->
          <!--</div>-->
          
          <!--<div class="col-md-4">-->
          <!--    <label for="" class="form-label">Country/Region:*</label>-->
          <!--      <select class="form-control select2" name="country_id" onChange="getState(this.value)" style="width:100%">-->
          <!--              / -->
          <!--              $countries = $this->Common->getCountry();-->
          <!--              foreach($countries as $country){ ?>-->
          <!--              <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>-->
          <!--              -->
                        
          <!--           </select>-->
          <!--</div>-->
       
          <!--<div class="col-md-4">-->
          <!--    <label for="" class="form-label">State/Region:*</label>-->
          <!--      <select class="form-control select2" id="states_html" name="state_id" onChange="getCity(this.value)" id="state_html" style="width:100%">-->
                      
                        
          <!--           </select>-->
          <!--</div>-->
          
          <!--  <div class="col-md-4">-->
          <!--    <label for="" class="form-label">City:*</label>-->
          <!--      <select class="form-control select2" name="city_id" id="cities_html" style="width:100%">-->
                     
                        
          <!--           </select>-->
          <!--</div>-->
        
             
          <!--<div class="col-md-6">-->
          <!--      <label for="" class="form-label">Street address:*</label>-->
          <!--      <textarea type="text" name="street_address" class="form-control"> </textarea>-->
          <!--</div>-->
          
          <!-- <div class="col-md-6">-->
          <!--      <label for="" class="form-label">Street address 2:*</label>-->
          <!--      <textarea type="text" name="street_address2" class="form-control"> </textarea>-->
          <!--</div>-->
                        

                         
            <div class="col-12">
                    <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
            </div>
        </form>
    </div>
</div>
<!--<div class="row">-->
<!--<div class="col-md-12">-->
<!--<div class="panel panel-success">-->
<!--<div class="panel-heading">&nbsp;</div>-->
<!--<div class="panel-body">-->
<!--      <form id="updateForm" class="form-label-left" method="POST" action="<?php echo base_url(); ?>user/add_employee/add" enctype="multipart/form-data">-->
<!--  <input type="hidden" id="post_link" value="<?php echo base_url(); ?>user/add_employee/add">-->
  
<!--<div id="horizontal-form">-->
<!--    <div class="row">-->
<!--        <div class="form-group col-md-6">-->
<!--                                    <label class="control-label">-->
<!--                                    Branch-->
<!--                                    </label>-->
                                
<!--                                    <select name="branch_id" class="form-control">-->
<!--                                    <option value="">Select</option>-->
<!--                                    <?php foreach($branch as $branch_data){ ?> -->
<!--                                    <option value="<?php echo$branch_data->branch_id; ?>"><?php echo$branch_data->branch_name; ?></option>-->
<!--                                    <?php } ?>-->
<!--                                    </select>-->
                                           	

<!--                                    </div>-->
<!--    </div>-->
<!--    <div class="row">    -->


<!--<div class="form-group col-md-6">-->
<!--                                    <label class="control-label">-->
<!--                                    Role-->
<!--                                    </label>-->
                                
<!--                                    <select name="roleId" class="form-control" onchange="showParent(this.value)">-->
<!--                                    <option value="">Select</option>-->
<!--                                    <?php foreach($roles as $role){ ?> -->
<!--                                    <option value="<?php echo$role->roleId; ?>"><?php echo$role->roleName; ?></option>-->
<!--                                    <?php } ?>-->
<!--                                    </select>-->
                                           	

<!--                                    </div>-->
<!--<div class="form-group col-md-6">-->
<!--                                    <label class="control-label">-->
<!--                                    Code-->
<!--                                    </label>-->
                                
<!--                                    <input name="code" class="form-control" readonly>-->
                                           	

<!--                                    </div>-->
<!--</div>-->


<!--<div class="row">    -->


<!--<div class="form-group col-md-6">-->
<!--                                    <label class="control-label">-->
<!--                                    Full Name-->
<!--                                    </label>-->
                                
<!--                                    <input name="name" class="form-control" >-->
                                           	

<!--                                    </div>-->
<!--<div class="form-group col-md-6">-->
<!--                                    <label class="control-label">-->
<!--                                    Username-->
<!--                                    </label>-->
                                
<!--                                    <input name="username" class="form-control" >-->
                                           	

<!--                                    </div>-->
<!--</div>-->

<!--<div class="row">    -->


<!--<div class="form-group col-md-6">-->
<!--                                    <label class="control-label">-->
<!--                         Date of birth-->
<!--                                    </label>-->
                                
<!--                                    <input type="date" name="dob" class="form-control" >-->
                                           	

<!--                                    </div>-->
<!--<div class="form-group col-md-6">-->
<!--                                    <label class="control-label">-->
<!--                                    Date of joining-->
<!--                                    </label>-->
                                
<!--                                     <input type="date" name="DOJ" class="form-control" value="<?php echo date('Y-m-d'); ?>">-->
                                           	

<!--                                    </div>-->
<!--</div>-->


<!--<div class="row">-->
<!--<div class="form-group col-md-6">-->
<!--                                    <label class="control-label">-->
<!--                                   E-mail-->
<!--                                    </label>-->
                                
<!--                                    <input name="email" class="form-control" style="text-transform:lowercase;">-->
                                           	

<!--                                    </div>-->
                                    
<!--                                    <div class="form-group col-md-6">-->
<!--                                    <label class="control-label">-->
<!--                                   Address-->
<!--                                    </label>-->
                                
<!--                                    <input name="address" class="form-control" >-->
                                           	

<!--                                    </div>-->
                                    

<!--   </div>-->
<!--<div class="row">       -->

<!--<div class="form-group col-md-6"><label class="control-label">-->
<!--                                   Mobile No.-->
<!--                                    </label>-->
                                
<!--                                    <input name="mobile" class="form-control" >-->
                                           	

<!--                                    </div>-->
                                    
<!--                                    <div class="form-group col-md-6"><label class="control-label">-->
<!--                                   Alt Mobile No.-->
<!--                                    </label>-->
                                
<!--                                    <input name="AltMobile" class="form-control" >-->
                                           	

<!--                                    </div>-->
<!--                                    </div>-->
                                    
                                    
<!--                                    <div class="row">       -->

 
<!--                                    <div class="form-group col-md-6"><label class="control-label">-->
<!--                                   IFSC Code-->
<!--                                    </label>-->
                                
<!--                                    <input name="ifsc" class="form-control autocomplete_bank" id="ifscSearch">-->
                                           	

<!--                                    </div>-->
                                    
<!--<div class="form-group col-md-6"><label class="control-label">-->
<!--                                   Bank Name-->
<!--                                    </label>-->
                                
<!--                                    <input name="bank" class="form-control"  id="bankSearch">-->
                                           	

<!--                                    </div>-->
                                   
<!--                                    </div>-->
                                    
                                    
                                    
                                     
<!--<div class="row"> -->
<!--  <div class="form-group col-md-6"><label class="control-label">-->
<!--                                   Account Number-->
<!--                                    </label>-->
                                
<!--                                    <input name="account" class="form-control" >-->
                                           	

<!--                                    </div>-->
                                    
                                    
<!--                                     <div class="form-group col-md-6"><label class="control-label">-->
<!--                                   Confirm Account Number-->
<!--                                    </label>-->
                                
<!--                                    <input name="account2" class="form-control" >-->
                                           	

<!--                                    </div>-->
<!--                                      </div>-->
<!--                                    <div class="row"> -->
                                    
<!--                                     <div class="form-group col-md-6 ParentClass" style="display:none"><label class="control-label">-->
<!--                                   Field Executive-->
<!--                                    </label>-->
                                
<!--                                    <select name="parentId" class="form-control">-->
<!--                                        <option value="">Select Field Executive</option>-->
<!--                                        <?php foreach($fe as $fres){ ?> <option value="<?php echo$fres->users_id; ?>"><?php echo$fres->name; ?> <?php echo$fres->code; ?></option> <?php } ?>-->
<!--                                    </select>-->

<!--                                    </div>-->
                                    
                                    
<!--<div class="form-group col-md-6">-->
<!--                                    <label class="control-label">-->
<!--                                   Image-->
<!--                                    </label><br>-->
<!--                                <div class="fileinput fileinput-new" data-provides="fileinput" style="border:1px solid #dcdcdc;padding:10px;">-->
<!--								<div class="fileinput-new thumbnail" style="width: 60px; height: 60px;" data-trigger="fileinput">-->
								
<!--									<img src="<?php echo base_url(); ?>uploads/no_file.jpg" alt="..." >-->
<!--								</div>-->
<!--								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px"></div>-->
<!--								<div>-->
<!--									<span class="btn btn-white btn-file">-->
<!--										<span class="fileinput-new">Select image</span>-->
<!--										<span class="fileinput-exists">Change</span>-->
<!--										<input type="file" name="profile_pic" accept="*">-->
<!--									</span>-->
<!--									<a href="#" class="btn btn-xs btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>-->
<!--								</div>-->
<!--				</div>-->

<!--                                    </div> -->
<!--</div>                                  -->
                                    
<!--<div class="form-group col-md-12">-->
<!--                                            <div class="col-sm-12" align="left">-->
<!--                                                <input type="submit" name="submit" value="Submit" id="MainContent_btnCreate" class="btn btn-success" />-->
                                                  
<!--                                            </div>-->
<!--                                        </div>-->
<!--</div>-->
<!--</form> -->
<!--</div> -->
<!--</div>                            -->
<!--</div>-->
<!--</div>-->




<!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
<!--<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>-->


<!--<script>-->
<!--    function showParent(uid){-->
<!--        if(uid==1){-->
<!--            $(".ParentClass").show();-->
<!--        }-->
<!--        else-->
<!--        {-->
<!--           $(".ParentClass").hide(); -->
<!--        }-->
<!--    }-->
<!--</script>-->