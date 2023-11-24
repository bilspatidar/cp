	
	<form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_new_product_variation/update" method="POST" class="row g-3">
                 
                  <div class="col-md-4">
                        <label for="" class="form-label">Attribute Name</label>
                        <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
        	<select class="form-control" name="attribute_id">
				    <option value="">Select Level One</option>
				        <?php
					$attributes = $this->Common->getAttribute();
					foreach($attributes as $attribute){ ?>
					<option value="<?php echo $attribute->id; ?>" <?php if($attribute->id==$row[0]->attribute_id){ echo'selected'; }?>>
					<?php echo $attribute->name; ?></option>
					<?php } ?>
				    
				</select>
                    
                  </div>
                         
                            <div class="col-md-4">
                                <label for="" class="form-label">Variation Name</label>
					<input type="text" name="variation_name" class="form-control" value="<?php echo $row[0]->variation_name; ?>"> 
                          </div>
						  
						  <div class="col-md-4">
                                <label for="" class="form-label">Description</label>
					<textarea type="text" name="description" class="form-control"><?php echo $row[0]->description; ?></textarea> 
                          </div>
                        
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
</form>
