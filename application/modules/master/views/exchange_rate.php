 <div class="card">
            <div class="card-body">
             
      


                
                 <form id="crudFormFix" action="<?php echo base_url(); ?>master/update_exchange_rate" method="POST" class="row crudFormFix g-3">
                          <div class="col-md-4">
                                <label for="" class="form-label">Our Shop Used Silver ( Ex 20% deduct)</label>
                                <!--<input type="text" name="ourShopUsedSilver" class="form-control"> -->
                                <input type="number" step="any" id="ourShopUsedSilver" name="ourShopUsedSilver" 
		 value="<?php echo (isset($user_data[0]->ourShopUsedSilver)?$user_data[0]->ourShopUsedSilver:'');?>" 
		 class="form-control">
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">PC Brand Silver</label>
                                <!--<input type="text" name="pcBrandSilver" class="form-control"> -->
                                  <input type="number" step="any" id="pcBrandSilver" name="pcBrandSilver" 
		 value="<?php echo (isset($user_data[0]->pcBrandSilver)?$user_data[0]->pcBrandSilver:'');?>" 
		 class="form-control">
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Other Brand Silver</label>
                                <!--<input type="text" name="otherBrandSilver" class="form-control"> -->
                                <input type="number" step="any" id="otherBrandSilver" name="otherBrandSilver" 
		 value="<?php echo (isset($user_data[0]->otherBrandSilver)?$user_data[0]->otherBrandSilver:'');?>" 
		 class="form-control">
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Our Shop Used Gold ( Ex 20% deduct)</label>
                                <!--<input type="text" name="ourShopUsedGold" class="form-control"> -->
                                  <input type="number" step="any" id="ourShopUsedGold" name="ourShopUsedGold" 
		 value="<?php echo (isset($user_data[0]->ourShopUsedGold)?$user_data[0]->ourShopUsedGold:'');?>" 
		 class="form-control">
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label">PC Brand Gold</label>
                                <!--<input type="text" name="pcBrandGold" class="form-control"> -->
                                <input type="number" step="any" id="pcBrandGold" name="pcBrandGold" 
		 value="<?php echo (isset($user_data[0]->pcBrandGold)?$user_data[0]->pcBrandGold:'');?>" 
		 class="form-control">
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label">Other Brand Gold</label>
                                <!--<input type="text" name="otherBrandGold" class="form-control"> -->
                                <input type="number" step="any" id="otherBrandGold" name="otherBrandGold" 
		 value="<?php echo (isset($user_data[0]->otherBrandGold)?$user_data[0]->otherBrandGold:'');?>" 
		 class="form-control">
                          </div>
                          
                          <!--PC Brand Gold-->
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
                </form>
              
              
                </div>
               
              </div><!-- End Default Tabs -->



