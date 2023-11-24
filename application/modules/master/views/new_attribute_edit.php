	
		
	<form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_new_product_attribute/update" method="POST" class="row g-3">
                 
				 <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
                 <div class="col-md-4">
                                <label for="" class="form-label">Attribute Name</label>
					<input type="text" name="name" class="form-control" value="<?php echo $row[0]->name; ?>"> 
                          </div>
						  
						  <div class="col-md-4">
                                <label for="" class="form-label">Type</label>
					 <select class="form-control" name="type">
							    <option value="">Select</option>
							    <option value="text" <?php if($row[0]->type=='text'){ echo 'selected'; } ?>>Text</option>
							    <option value="Number" <?php if($row[0]->type=='Number'){ echo 'selected'; } ?>>Number</option>
							    <option value="color" <?php if($row[0]->type=="color"){ echo 'selected'; } ?>>Color</option>

						</select>

                          </div>
                        
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
</form>
