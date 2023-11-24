
 <div class="card">
            <div class="card-body">
             

                 <form id="crudForm" action="<?php echo base_url(); ?>member/add_member/add" method="POST" class="row crudForm g-3">
                       
                     <h3>Company Information</h3>
                           <div class="col-md-4">
                                <label for="" class="form-label">Company Name:*</label>
                                <input type="text" name="company_name" class="form-control"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Username </label>
                                <input type="text" name="username" class="form-control"> 
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
                                <label for="" class="form-label">Postal code:*</label>
                                <input type="number" name="postal_code" class="form-control"> 
                          </div>
                          
                          <div class="col-md-4">
                              <label for="" class="form-label">Country/Region:*</label>
                                <select class="form-control select2" name="country_id" onChange="getState(this.value)" style="width:100%">
                                        <?php 
                                        $countries = $this->Common->getCountry();
                                        foreach($countries as $country){ ?>
                                        <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                        <?php } ?>
                                        
                                     </select>
                          </div>
                       
                          <div class="col-md-4">
                              <label for="" class="form-label">State/Region:*</label>
                                <select class="form-control select2" id="states_html" name="state_id" onChange="getCity(this.value)" id="state_html" style="width:100%">
                                      
                                        
                                     </select>
                          </div>
                          
                            <div class="col-md-4">
                              <label for="" class="form-label">City:*</label>
                                <select class="form-control select2" name="city_id" id="cities_html" style="width:100%">
                                     
                                        
                                     </select>
                          </div>  
                        
                             
                          <div class="col-md-6">
                                <label for="" class="form-label">Street address:*</label>
                                <textarea type="text" name="street_address" class="form-control"> </textarea>
                          </div>
                          
                           <div class="col-md-6">
                                <label for="" class="form-label">Street address 2:*</label>
                                <textarea type="text" name="street_address2" class="form-control"> </textarea>
                          </div>
                        
                       
                          <h3>Director Information</h3>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">First Name:*</label>
                                <input type="text" name="first_name" class="form-control"> 
                          </div>
                          
                           <div class="col-md-4">
                                <label for="" class="form-label">Last Name:*</label>
                                <input type="text" name="last_name" class="form-control"> 
                          </div>
                          
                          <div class="col-md-4">
                        <label for="" class="form-label">Skype ID:*</label>
                                <input type="text" name="skypeID" class="form-control"> 
                          </div>
                         
                          <h3>Business Information</h3>
                           <div class="col-md-4">
                                <label for="" class="form-label">Website URL:*</label>
                                <input type="text" name="websiteURL" class="form-control"> 
                          </div>

                          <div class="form-group col-md-4">
                              <p class="text-left"><label for="name">Business Type*</label></p>
                                <select class="form-control" name="business_type_id"  required>
                                     <option value="">Select Business Type </option>
                                        <?php 
                                        $categories = $this->Common->getBussnessType();
                                        foreach($categories as $category){ ?>
                                        <option value="<?php echo $category->business_id; ?>" required><?php echo $category->name; ?></option>
                                        <?php } ?>
                                     </select>
                          </div>
                         
                          
                          
                            <div class="form-group col-md-4">
                              <p class="text-left"><label for="name">Business Category*</label></p>
                                <select class="form-control" name="business_category_id"  onChange="getBusinessSubCategories(this.value)" required>
                                     <option value="">Select Business Category</option>
                                        <?php 
                                        $categories = $this->Common->getProductCategory();
                                        foreach($categories as $category){ ?>
                                        <option value="<?php echo $category->product_category_id; ?>" required><?php echo $category->name; ?></option>
                                        <?php } ?>
                                        
                                        
                                     </select>
                          </div>
                          
                            <div class="form-group col-md-4">
                              <p class="text-left"><label for="name">Business Subcategory*</label></p>
                                <select class="form-control" name="business_subcategory_id"  id="business_sub_category_html" required>
                                     <option value="">Select Business Category First</option>
                                     
                                        
                                     </select>
                          </div>
                           
                          <div class="col-md-4">
                                <label for="" class="form-label">Business registered on:* </label>
                                <input type="date" name="business_registered" class="form-control"> 
                          </div>
                          
                          
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Maximum ticket size:*</label>
                                <input type="number" name="ticket_size" class="form-control"> 
                          </div>
                         
                          <div class="col-md-4">
                                <label for="" class="form-label"> Merchant Pay in :*</label>
                                <input type="number" name="transaction_charge" class="form-control"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label"> Merchant Pay out :*</label>
                                <input type="number" name="transaction_charge_out" class="form-control"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label"> Settelment Charge :*</label>
                                <input type="number" name="settelment_charge" class="form-control"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label"> Turnover :*</label>
                                <input type="number" name="turnover" class="form-control"> 
                          </div>
                          
                          <div class="col-md-4">
                        <label for="" class="form-label">Expected Chargeback percentage ?:*</label>
                                <input type="number" name="chargeback_percentage" class="form-control"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Processing Currency:*</label>
                                <select class="form-control" name="processing_currency">
                                    <option>Select Processing Currency</option>
                                    <?php 
                                    $processingCurrency = $this->Common->getCurrency();
                                    foreach($processingCurrency as $Currency){?>
                                    
                                    
                                    <option value="<?php echo $Currency->id; ?>" ><?php echo $Currency->currency_name; ?></option>
                               <?php }?>
                                </select>
                                
                          </div>
                       <div class="col-md-12">
                                <label for="" class="form-label">Description:*</label>
                                <textarea type="text" name="description" class="form-control summernote"> </textarea>
                          </div>
                         
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
                </form>
              
              
               
            </div>
          </div>


<script>
    function husbandBox(val){
      if(val=='marriage'){
          $('#husband').prop('disabled',false);
      }else{
          $('#husband').val('');
           $('#husband').prop('disabled',true);
      }
        
    }
</script>
