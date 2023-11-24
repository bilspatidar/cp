 <?php $this->load->view('include/userAction');  ?>
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_product/update" method="POST" class="row g-3" enctype="multipart/form-data">
          
          
            <input type="hidden" name="product_id" class="form-control" value="<?php echo $row[0]->product_id; ?>">
        			    
            <div class="col-md-4">
            <label for="" class="form-label">Category</label>
            <?php 
             $getProductCategory = $this->Common->getProductCategory();
             $product_category_id_array = explode(',',$row[0]->category_id);
         
            ?>
            <select class="form-control select2" name="category_id[]" multiple id="changeProductName2" required onChange="getSubCategoryModal(this.value)" style="width:100%">
            <option value="">Select Category</option>
             <?php 
            foreach($getProductCategory as $editCategory){ ?>
            <option value="<?php echo $editCategory->product_category_id; ?>" <?php if(in_array($editCategory->product_category_id,$product_category_id_array)){ echo "selected";} ?> ><?php echo $editCategory->name; ?></option>
            <?php } ?>
            </select>
            </div>
                      
                         <div class="col-md-4">
                    <label for="" class="form-label">Level Two Category</label>
                    <select class="form-control" name="sub_category_id" id="subcategory_html_modal" style="width:100%" onChange="getLevelTreeCategoryModal(this.value)" >
                    <?php 
                            $subCategories = $this->Common->getSubcategory();
                            foreach($subCategories as $subCategory){ ?>
                            <option value="<?php echo $subCategory->id; ?>"<?php if($subCategory->id==$row[0]->sub_category_id) {echo 'selected';} ?>>  
                                <?php echo $subCategory->name; ?></option>
                            <?php } ?>
                    
                         </select>
                         </div>
                          
                          <div class="col-md-4">
            <label for="" class="form-label">Level Three Category</label>
            <select class="form-control" name="level_three_category_id" id="level_three_html_modal" style="width:100%"  onChange="getLevelFourCategoryModal(this.value)">
            <?php 
                    $threeCategories = $this->Common->getlThrecategory();
                    foreach($threeCategories as $threeCategory){ ?>
                    <option value="<?php echo $threeCategory->id; ?>"<?php if($threeCategory->id==$row[0]->level_three_category_id) {echo 'selected';} ?>>  
                        <?php echo $threeCategory->name; ?></option>
                    <?php } ?>
                 </select>
                 </div>
                 
                   <div class="col-md-4">
            <label for="" class="form-label">Level Four Category</label>
            <select class="form-control" name="level_four_category_id" id="level_four_html_modal" style="width:100%" >
            <?php 
                    $fourCategories = $this->Common->getlFourcategory();
                    foreach($fourCategories as $fourCategory){ ?>
                    <option value="<?php echo $fourCategory->id; ?>"<?php if($fourCategory->id==$row[0]->level_four_category_id) {echo 'selected';} ?>>  
                        <?php echo $fourCategory->name; ?></option>
                    <?php } ?>
                 </select>
                 </div>
                          
           <div class="col-md-4">
                <label for="" class="form-label">Product Brand</label>
               <select class="form-control select2" name="brand_id" style="width:100%" >
                       <option value="">Select Brand</option>
                        <?php 
                        $proBrand = $this->Common->getbrand();
                        foreach($proBrand as $brand){ ?>
                        <option value="<?php echo $brand->id; ?>" <?php if($brand->id==$row[0]->brand_id) {echo 'selected';} ?> >
                            <?php echo $brand->name; ?></option>
                        <?php } ?>
                     </select>
                </div>
                                
                                 
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Product Name</label>
                                <input type="text" name="pname" class="form-control" id="pname2" value="<?php echo $row[0]->pname; ?>"> 
                          </div>
                         
                         <div class="col-md-4">
                                <label for="" class="form-label">Product SKU</label>
                                <input type="text" name="product_sku" class="form-control" value="<?php echo $row[0]->product_sku; ?>"> 
                          </div>
                          
                             <div class="col-md-4">
                                <label for="" class="form-label">Tax</label>
                                <select  class="form-control" name="tax">
							    <option value="">Select Tax</option>
							    
							       <?php 
                                        $taxes = $this->Common->getTax();
                                        foreach($taxes as $tax){ ?>
                                        <option value="<?php echo $tax->tax; ?>" <?php if($tax->tax==$row[0]->tax) {echo 'selected';}  ?>><?php echo $tax->tax; ?> %</option>
                                        <?php } ?>
							    </select>
						</div>
						
						 <div class="col-md-4">
                                <label for="" class="form-label">Product Unit</label>
                <select class="form-control select2" name="product_unit" style="width:100%">
                                       <option value="">Select Product Unit</option>
                                        <?php 
                                        $getProductUnits = $this->Common->getProductUnit();
                                        foreach($getProductUnits as $ProductUs){ ?>
                                        <option value="<?php echo $ProductUs->id; ?>"
                                        <?php if($ProductUs->id==$row[0]->product_unit){echo 'selected';} ?>>
                                            <?php echo $ProductUs->unit_name; ?></option>
                                        <?php } ?>
                                     </select>
                                <!--<input type="text" name="product_unit" class="form-control" value="<?php echo $row[0]->product_unit; ?>"> -->
                          </div>
                          
                           <br><br><br><br>
                          <div class="row">
                           <div class="col-md-4">
                                <label for="" class="form-label">Product Country Origin </label>
                          <input type="text" class="form-control" name="product_country_origin" value="<?php echo $row[0]->product_country_origin;?>">
						</div>
                          <br><br><br>
						    
						    <div class="col-md-4">
						    <label for="" class="form-label">New Arrival</label>
						   <br>
							<input type="radio" value="1" class="form-controls" name="newArrival" checked> Yes
							<input type="radio" value="0" class="form-controls" name="newArrival"> No
						</div>
						
							<div class="col-md-4">
						   <label for="" class="form-label">Tranding Item </label>
						   <br>
							<input type="radio" value="1" class="form-controls" name="trandingItem" checked> Yes
							<input type="radio" value="0" class="form-controls" name="trandingItem"> No
						</div>
						</div>
						<div class="col-md-4">
						    <label for="" class="form-label">Price Type</label>
						    <br>
							<input type="radio" value="Fixed" class="form-controls" onclick="checkPriceEdit(this.value)" name="price_type" <?php if($row[0]->price_type=='Fixed'){ echo 'checked';}?>> Fixed
							<input type="radio" value="Variation" class="form-controls" onclick="checkPriceEdit(this.value)" name="price_type" <?php if($row[0]->price_type=='Variation'){ echo 'checked';}?>> Variation
						    <input type="hidden" value="<?php echo $row[0]->price_type;?>" id="price_type">
						</div> 
						<div class="col-md-4 priceDivEdit">
						   <label for="" class="form-label">Product MRP</label>
						   <br>
							<input type="number" min="1" step="any" class="form-control" name="product_mrp" value="<?php if($row[0]->product_mrp>0){echo $row[0]->product_mrp;}?>">
						</div>
							<div class="col-md-4 priceDivEdit">
						   <label for="" class="form-label"> Quantity</label>
						   <br>
							<input type="number" min="1" step="any" class="form-control" name="quantity" value="<?php if($row[0]->quantity>0){echo $row[0]->quantity;}?>">
						</div>
                        <div class="col-md-4 priceDivEdit">
						   <label for="" class="form-label">Product Selling Price</label>
						   <br>
							<input type="number" min="1" step="any" class="form-control" name="product_price" value="<?php if($row[0]->product_price){ echo $row[0]->product_price;}?>">
						</div>
						
                          <div class="col-md-4">
                                <label for="" class="form-label">Product Keyword</label>
                                <input type="text" name="search_keyword" class="form-control" value="<?php echo $row[0]->search_keyword; ?>"> 
                          </div>
                          
                          
                          
                           <div class="col-md-4">
                        <label for="" class="form-label">Material ID</label>
                        <?php 
                         $materials = $this->Common->getMaterial();
                         $material_id_array = explode(',',$row[0]->material_id);
                        ?>
                        <select class="form-control select2" name="material_id[]" multiple style="width:100%" >
                        <option value="">Select Material</option>
                        <?php 

                        foreach($materials as $getMaterials){ ?>
                        <option value="<?php echo $getMaterials->id; ?>" 
                        <?php if(in_array($getMaterials->id,$material_id_array)){ echo "selected";} ?> >
                            <?php echo $getMaterials->title; ?></option>
                        <?php } ?>
                                     </select>
                                <!--<input type="text" name="material_id" class="form-control" value="<?php echo $row[0]->material_id; ?>"> -->
                          </div>
                          
                          
                        <div class="col-md-4">
                        <label for="" class="form-label">crystal ID</label>
                        <?php 
                         $Crystals = $this->Common->getCrystal();
                         $crystal_id_array = explode(',',$row[0]->crystal_id);
                        ?>
                        <select class="form-control select2" name="crystal_id[]" multiple style="width:100%" >
                        <option value="">Select Crystal</option>
                        <?php 

                        foreach($Crystals as $getCrystals){ ?>
                        <option value="<?php echo $getCrystals->id; ?>" 
                        <?php if(in_array($getCrystals->id,$crystal_id_array)){ echo "selected";} ?> >
                            <?php echo $getCrystals->title; ?></option>
                        <?php } ?>
                                     </select>
                                <!--<input type="text" name="crystal_id" class="form-control" value="<?php echo $row[0]->crystal_id; ?>"> -->
                          </div>
                          
                       
                          
                          
                          <div class="col-md-6">
						   <label for="" class="form-label">Product Length</label>
						   <br>
							<input type="text" class="form-control" name="length" value="<?php echo $row[0]->length; ?>">
						</div>
						
					 	<div class="col-md-6">
						   <label for="" class="form-label">Product Height</label>
						   <br>
							<input type="text" class="form-control" name="height" value="<?php echo $row[0]->height; ?>">
						</div>
						
						<div class="col-md-6">
						   <label for="" class="form-label"> Product Width</label>
						   <br>
							<input type="text" class="form-control" name="width" value="<?php echo $row[0]->width; ?>">
						</div>
						
					 	<div class="col-md-6">
						   <label for="" class="form-label">Package Weight</label>
						   <br>
							<input type="text" class="form-control" name="packageWeight" value="<?php echo $row[0]->packageWeight; ?>">
						</div>
						
						 <div class="col-md-12">
                                <label for="" class="form-label">Product Specification</label>
                                <textarea type="text" name="product_specification" class="form-control summernote"><?php echo $row[0]->product_specification; ?></textarea>
                          </div>
                          
                           <div class="col-md-12">
                                <label for="" class="form-label">Product Key Feature</label>
                                <textarea type="text" name="product_keyword" class="form-control summernote"><?php echo $row[0]->product_keyword; ?></textarea>
                          </div>
                          
                           <div class="col-md-12">
                                <label for="" class="form-label">Long Description</label>
                                <textarea type="text" name="long_description" class="form-control summernote"><?php echo $row[0]->long_description;?></textarea>
                          </div>
                          
                           <div class="col-md-4">
                                <label for="" class="form-label">Product Meta</label>
                                <input type="text" name="product_meta" class="form-control" value="<?php echo $row[0]->product_meta; ?>"> 
                          </div>
                         
                         <div class="col-md-12">
						   <label for="" class="form-label">Video Link</label>
						   <br>
							 <input type="text" name="product_video" class="form-control" value="<?php echo $row[0]->product_video; ?>">
						</div>
                          
                           <div class="col-md-4">
                              <?php 
                             $File = $row[0]->pimg;
                    		 if(!empty($File))
                    		 { 
                    	        $load_url = 'uploads/product/'.$File;
                    			if(file_exists($load_url))
                    			{
                    		   $url = base_url().$load_url;			
                    			}
                    			else
                    			{
                    			$url = base_url().'uploads/no_file.jpg';		
                    			}
                    			
                                $fileData = "<a href='$url' target='_blank'>File</a>";			
                    		}
                    		else
                    		{
                    		$url = base_url().'uploads/no_file.jpg';
                    		$fileData = '';
                    		}
                              ?>
                                <label for="" class="form-label">Image (300*225)&nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="pimg">
                                <input type="file" name="pimg" class="form-control"> 
                          </div>
                          
                        <div class="col-md-4">
                              <?php 
                             $File = $row[0]->pimg1;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/product/'.$File;
                    			if(file_exists($load_url))
                    			{
                    		   $url = base_url().$load_url;			
                    			}
                    			else
                    			{
                    			$url = base_url().'uploads/no_file.jpg';		
                    			}
                    			
                                $fileData = "<a href='$url' target='_blank'>File</a>";			
                    		}
                    		else
                    		{
                    		$url = base_url().'uploads/no_file.jpg';
                    		$fileData = '';
                    		}
                              ?>
                                <label for="" class="form-label">Image2 (300*225)&nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="pimg1">
                                <input type="file" name="pimg1" class="form-control"> 
                          </div>
                        
                         <div class="col-md-4">
                              <?php 
                             $File = $row[0]->pimg2;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/product/'.$File;
                    			if(file_exists($load_url))
                    			{
                    		   $url = base_url().$load_url;			
                    			}
                    			else
                    			{
                    			$url = base_url().'uploads/no_file.jpg';		
                    			}
                    			
                                $fileData = "<a href='$url' target='_blank'>File</a>";			
                    		}
                    		else
                    		{
                    		$url = base_url().'uploads/no_file.jpg';
                    		$fileData = '';
                    		}
                              ?>
                                <label for="" class="form-label">Image3 (300*225)&nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="pimg2">
                                <input type="file" name="pimg2" class="form-control"> 
                          </div>
                          
                          <div class="col-md-4">
                              <?php 
                             $File = $row[0]->pimg3;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/product/'.$File;
                    			if(file_exists($load_url))
                    			{
                    		   $url = base_url().$load_url;			
                    			}
                    			else
                    			{
                    			$url = base_url().'uploads/no_file.jpg';		
                    			}
                    			
                                $fileData = "<a href='$url' target='_blank'>File</a>";			
                    		}
                    		else
                    		{
                    		$url = base_url().'uploads/no_file.jpg';
                    		$fileData = '';
                    		}
                              ?>
                                <label for="" class="form-label">Image4 (300*225)&nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="pimg3">
                                <input type="file" name="pimg3" class="form-control"> 
                          </div>
                        
                         <div class="col-md-4">
                              <?php 
                             $File = $row[0]->pimg4;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/product/'.$File;
                    			if(file_exists($load_url))
                    			{
                    		   $url = base_url().$load_url;			
                    			}
                    			else
                    			{
                    			$url = base_url().'uploads/no_file.jpg';		
                    			}
                    			
                                $fileData = "<a href='$url' target='_blank'>File</a>";			
                    		}
                    		else
                    		{
                    		$url = base_url().'uploads/no_file.jpg';
                    		$fileData = '';
                    		}
                              ?>
                                <label for="" class="form-label">Image5 (300*225)&nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="pimg4">
                                <input type="file" name="pimg4" class="form-control"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Status</label>
                                <select name="status" class="form-control input-sm"><option value="">Status</option><option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option><option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
                          </div>

                          
                        <div class="col-md-3">
                          <input type="checkbox" name="duplicate" value="yes">
						   <label  class="form-label">Duplicate ?</label>
						</div>  
                          
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
</form>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js" integrity="sha512-6rE6Bx6fCBpRXG/FWpQmvguMWDLWMQjPycXMr35Zx/HRD9nwySZswkkLksgyQcvrpYMx0FELLJVBvWFtubZhDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$(document).ready(function() {
    $(".summernote").summernote({
        height: 200,
    });
});
        $('#metal_id1').on('change', function() {
  //  alert( this.value ); // or $(this).val()
  if(this.value == "1") {
    $('#change_carat1').show();
    $('#change_silver1').hide();
  } else if(this.value == "5") {
    $('#change_carat1').hide();
    $('#change_silver1').show();

  } 
  else{
    $('#change_carat1').hide();
      $('#change_silver1').hide();

  }
});
    </script>


 <script>

            function changeProductSet2(sel) {
    var fullName = sel.options[sel.selectedIndex].text;
    var nArray = fullName.split(',');
      $("#pname2").val(nArray[0]);
    $("#shortpname2").val(nArray[1]);
        }
        
$( document ).ready(function() {
    var priceType = $('#price_type').val();
    checkPriceEdit(priceType);
});       
        function checkPriceEdit(val){
        if(val=='Fixed'){
            $('.priceDivEdit').show();
        }else{
            $('.priceDivEdit').hide();
        }
    }
    </script>
<script>
   
    $('.select2').select2({
        dropdownParent: $('#ExtralargeEditModal')
    });

</script>

