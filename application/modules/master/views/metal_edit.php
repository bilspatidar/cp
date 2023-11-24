

           
            <?php $this->load->view('include/userAction');  ?>
             <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_metal/update" method="POST" class="row g-3">
                          <div class="col-md-4">
                               <label for="" class="form-label">Metal Name</label>
                                <input type="hidden" name="metal_id" class="form-control" value="<?php echo $row[0]->metal_id; ?>"> 
                                <input type="text" name="metal_name" class="form-control" value="<?php echo $row[0]->metal_name; ?>" readonly> 
                          </div>
                        
                           <div class="col-md-4">
                                <label for="" class="form-label">Unit Name</label>
                                    <select class="form-control select2" name="metal_unit_id" style="width:100%">
                                        <?php 
                                        $units = $this->Common->getMetalUnit();
                                        foreach($units as $pk){ ?>
                                       <option value="<?php echo $pk->unit_id; ?>" <?php if($pk->unit_id==$row[0]->metal_unit_id){ echo'selected'; }?>>
                                           <?php echo $pk->unit_name; ?></option>
                                       
                                        <?php } ?>
                                     </select>
                          </div>
                    
                          <?php if($row[0]->metal_name=='Silver'){
		    	?>	
		    	       
                          <div class="col-md-4">
                           <label for="" class="form-label">Metal Price</label>
                                <input type="text" name="metal_price" class="form-control" value="<?php echo $row[0]->metal_price; ?>">
                                </div>
                               
                            <div class="col-md-6">
                           <label for="" class="form-label">Silver CB</label>
                                <input type="text" name="SCB" class="form-control" value="<?php echo $row[0]->SCB; ?>">
                                </div>
                                 <div class="col-md-6">
                               <label for="" class="form-label">Exchange CB</label>
                                <input type="text" name="Exchange_SCB" class="form-control" value="<?php echo $row[0]->Exchange_SCB; ?>"> 
                          </div>
                        
                         <div class="col-md-6">
                           <label for="" class="form-label">Silver 91.2</label>
                                <input type="text" name="S91" class="form-control" value="<?php echo $row[0]->S91; ?>">
                          </div>
                            <div class="col-md-6">
                               <label for="" class="form-label">Exchange 91.2 </label>
                                <input type="text" name="Exchange_S91" class="form-control" value="<?php echo $row[0]->Exchange_S91; ?>"> 
                          </div>
                      
                          <div class="col-md-6">
                           <label for="" class="form-label">Silver PC</label>
                                <input type="text" name="SPC" class="form-control" value="<?php echo $row[0]->SPC; ?>">
                          </div>
                             <div class="col-md-6">
                               <label for="" class="form-label">Exchange PC </label>
                                <input type="text" name="Exchange_SPC" class="form-control" value="<?php echo $row[0]->Exchange_SPC; ?>"> 
                          </div>
                     
                          <div class="col-md-6">
                           <label for="" class="form-label">Silver SSP</label>
                                <input type="text" name="SSSP" class="form-control" value="<?php echo $row[0]->SSSP; ?>">
                          </div>
                           <div class="col-md-6">
                               <label for="" class="form-label">Exchange SSP </label>
                                <input type="text" name="Exchange_SSSP" class="form-control" value="<?php echo $row[0]->Exchange_SSSP; ?>"> 
                          </div>
                        
                          <div class="col-md-6">
                           <label for="" class="form-label">Silver S999</label>
                                <input type="text" name="S999" class="form-control" value="<?php echo $row[0]->S999; ?>">
                          </div>
                           <div class="col-md-6">
                               <label for="" class="form-label">Exchange S999 </label>
                                <input type="text" name="Exchange_S999" class="form-control" value="<?php echo $row[0]->Exchange_S999; ?>"> 
                          </div>
                         
                          
                          
                           <?php }
                                        else
                                          {?>
                                            <div class="col-md-4">
                           <label for="" class="form-label">Gold Price (24 carat)</label>
                                <input type="text" name="G24_carot" class="form-control" value="<?php echo $row[0]->G24_carot; ?>"> 
                          </div>
                          
                                     <div class="col-md-4">
                           <label for="" class="form-label">Gold Price (22 carat)</label>
                                <input type="text" name="G22_carot" class="form-control" value="<?php echo $row[0]->G22_carot; ?>"> 
                          </div>
                          
                          <div class="col-md-4">
                           <label for="" class="form-label">Gold Price (18 carat)</label>
                                <input type="text" name="G18_carot" class="form-control" value="<?php echo $row[0]->G18_carot; ?>"> 
                          </div>
                          
                          <div class="col-md-4">
                           <label for="" class="form-label">Gold 999</label>
                                <input type="text" name="G999" class="form-control" value="<?php echo $row[0]->G999; ?>"> 
                         
                          
                            <?php }?> 
                            
                            </div>
                          
                         
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
</form>
