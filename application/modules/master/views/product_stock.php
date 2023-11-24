<div class="card">
            <div class="card-body">
             
      
      <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">List</button>
                </li>

             
             </ul>
        
         <div class="tab-content pt-2" id="myTabContent">
                 <div class="tab-pane fade show active session_views" id="home" role="tabpanel" aria-labelledby="home-tab">
                   <form class="form-inline filterForm">
                       <div div class="row" >
                        <div class="col-md-3"> <lable>Name</lable> <input type="text" id="filterOne" class="form-control input-sm"> </div>
                       <div class="col-md-3"> <lable>Status</lable> <select id="filterTwo" class="form-control input-sm"><option value="">Status</option><option value="Active">Active</option><option value="Deactive">Deactive</option></select> </div>
                       <div class="col-md-3"> <lable>Show Deleted</lable> <select id="filterThree" class="form-control input-sm"><option value="0">No</option><option value="1">Yes</option></select> </div>  
                      <div class="col-md-3"> <lable>Category</lable>  <select class="form-control input-sm" id="filterFour">
                                       <option value="">Select Category</option>
                                        <?php 
                                        $categories = $this->Common->getProductCategory();
                                        foreach($categories as $category){ ?>
                                        <option value="<?php echo $category->product_category_id; ?>"><?php echo $category->name; ?></option>
                                        <?php } ?>
                                     </select> </div>
                       <div class="col-md-2"><lable><br></lable><button class="btn btn-outline-primary" type="button" onClick="loadTableData(1)">SEARCH</button></div></div></form>

                      
<!-- Modal -->
                   
                   <p>
			<div id="pageNumber" style="display:none;"></div>
                          
                               <div class="table-responsive" id="loadTableData">
                                   
                                   <h3>Data is loading please wait..   <i class="fa fa-refresh fa-spin"></i> </h3>
                               </div>
                               <div align="right" id="paginationLink"></div>
                                          
						       
                      
                                           
                                       </p>
                                       
                                       
                                       
                </div>
                <div class="tab-pane fade session_adds" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                
                 <form id="crudForm" action="<?php echo base_url(); ?>master/add_product/add" method="POST" class="row crudForm g-3" enctype="multipart/form-data">
                                         
                             <div class="col-md-4">
                                <label for="" class="form-label">Level One Category Name</label>
                                <select class="form-control select2" name="category_id[]" style="width:100%" multiple onChange="getSubCategory(this.value)" >
                                       <option value="">Select Category</option>
                                        <?php 
                                        $categories = $this->Common->getProductCategory();
                                        foreach($categories as $category){ ?>
                                        <option value="<?php echo $category->product_category_id; ?>"><?php echo $category->name; ?></option>
                                        <?php } ?>
                                     </select>
                                     </div>
                                     
                                     <div class="col-md-4">
                                <label for="" class="form-label">Level Two Category Name</label>
                                <select class="form-control select2" name="sub_category_id" id="subcategory_html" style="width:100%" onChange="getLevelTreeCategory(this.value)">
                                      
                                     </select>
                                     </div>
                                     
                                    <div class="col-md-4">
                                <label for="" class="form-label">Level Three Category Name</label>
                                <select class="form-control select2" name="level_three_category_id" id="level_threeh_html" style="width:100%" onChange="getLevelFourCategory(this.value)" multiple>
                                      
                                     </select>
                                     </div>
                                     
                                     <div class="col-md-4">
                                <label for="" class="form-label">Level Four Category Name</label>
                                <select class="form-control" name="level_four_category_id" id="level_four_html" style="width:100%" multiple>
                                      
                                     </select>
                                     </div>
                          
                                
                                 <div class="col-md-4">
                                <label for="" class="form-label">Product Brand</label>
                               <select class="form-control select2" name="brand_id" style="width:100%" >
                                       <option value="">Select Brand</option>
                                        <?php 
                                        $proBrand = $this->Common->getbrand();
                                        foreach($proBrand as $brand){ ?>
                                        <option value="<?php echo $brand->id; ?>"><?php echo $brand->name; ?></option>
                                        <?php } ?>
                                     </select>
                                </div>
                                
                        <!--        <div class="col-md-4">-->
                        <!--<label for="" class="form-label"> Attribute Name</label>-->
                        <!--    <select class="form-control" name="attribute_id" onchange="getAttributeType(this.value)">-->
                        <!--     <option value="">select Attribute </option>-->
                        <!--       php -->
                        <!--        $attributes = $this->Common->getProductAttribute();-->
                        <!--        foreach($attributes as $attribute){ ?>-->
                        <!--        <option value="<?php echo $attribute->id; ?>"><?php echo $attribute->name; ?></option>-->
                        <!--        php } ?>-->
                        <!--     </select>-->
                        <!--    </div>-->
                            
                          <!--  <div class="col-md-4">-->
                          <!--      <label for="" class="form-label">Variation Name</label>-->
                          <!--<select class="form-control" id="variant_html" name="variation_name">-->
                          <!--  </select>-->
                          <!--</div>-->
                           
                           <!-- <div class="col-md-6">-->
                           <!--     <label for="" class="form-label">Variant</label>-->
                           <!--       <select class="form-control select2" name="variant_id" style="width:100%" onChange="getLevelFourCategory(this.value)">-->
                           <!--            <option value="">Select Variant</option>-->
                           <!--          </select>-->
                           <!--</div>-->
                                
       <!--                          <div class="col-md-4">-->
       <!--                         <label for="" class="form-label">Vendor</label>-->
       <!--                         <select class="form-control" name="vendor_id">-->
							<!--    php if($singleVerndor==0){ ?>-->
					  <!--      <option value="">Select Vendor</option>-->
					  <!--      php } ?>-->
					  <!--      php foreach($vendors as $vendor){ ?>-->
					  <!--      <option value="<?php echo $vendor->users_id; ?>"><?php echo $vendor->businessName; ?></option>-->
					  <!--      php } ?>-->
							<!--</select>-->
       <!--                         </div>-->
                                
                                
                            <div class="col-md-4">
                                <label for="" class="form-label">Product Name</label>
                                <input type="text" name="pname" class="form-control"> 
                                </div>
                                
           <!--                     <div class="col-md-4">-->
           <!--                     <label for="" class="form-label">Product HSN</label>-->
           <!--                     <select class="form-control" name="hsnCode" id="hsnCode">-->
							    <!--<option value="">Select HSN Code</option>-->
					      <!--  </select>-->
           <!--                     </div>-->
                                
                                <div class="col-md-4">
                                <label for="" class="form-label">Product SKU</label>
                                	<input type="text" class="form-control" name="product_sku">
                                </div>
                                
                                <div class="col-md-4">
                                <label for="" class="form-label">Tax</label>
                                <select  class="form-control" name="tax">
							    <option value="">Select Tax</option>
							    
							       <?php 
                                        $taxes = $this->Common->getTax();
                                        foreach($taxes as $tax){ ?>
                                        <option value="<?php echo $tax->tax; ?>"><?php echo $tax->tax; ?> %</option>
                                        <?php } ?>
							   
							    </select>
					        
						</div>
                                
                              
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Product Unit </label>
                                
                                <select  class="form-control" name="product_unit">
							    <option value="">Select Unit</option>
							    
							       <?php 
                                        $units = $this->Common->getProductUnit();
                                        foreach($units as $unit){ ?>
                                        <option value="<?php echo $unit->id; ?>"><?php echo $unit->unit_name; ?></option>
                                        <?php } ?>
							   
							    </select>
							    </div>
                          <!--<input type="text" class="form-control" name="tax_other" id="tax_other" readonly>-->
                          <!--</div>-->
                          <br><br><br><br>
                          <div class="row">
                           <div class="col-md-4">
                                <label for="" class="form-label">Product Country Origin </label>
                          <input type="text" class="form-control" name="product_country_origin">
						</div>
						
						<!--<div class="col-md-6">-->
      <!--                          <label for="" class="form-label">Product Barcode (leave blank if you want auto generated) </label>-->
						<!--<input type="text" class="form-control" name="product_barcode">-->
						<!--</div>-->
						
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
						
						<!--	<div class="col-md-4">-->
						<!--   <label for="" class="form-label">Hot Item</label>-->
						<!--   <br>-->
						<!--	<input type="radio" value="1" class="form-controls" name="hotItem" checked> Yes-->
						<!--	<input type="radio" value="0" class="form-controls" name="hotItem"> No-->
						<!--</div>-->
                        
                        <div class="col-md-4">
						    <label for="" class="form-label">Price Type</label>
						    <br>
							<input type="radio" value="Fixed" class="form-controls" onclick="checkPrice(this.value)" name="price_type" checked> Fixed
							<input type="radio" value="Variation" class="form-controls" onclick="checkPrice(this.value)" name="price_type"> Variation
						</div>
                        
					 	<div class="col-md-4 priceDiv">
						   <label for="" class="form-label">Product MRP</label>
						   <br>
							<input type="number" min="1" step="any" class="form-control" name="product_mrp">
						</div>
						<div class="col-md-4 priceDiv">
						   <label for="" class="form-label">Product Selling Price</label>
						   <br>
							<input type="number" min="1" step="any" class="form-control" name="product_price">
						</div>
						 <div class="col-md-4">
                                <label for="" class="form-label">Product Keyword (Keyword 1...)</label>
                                <input type="text" name="search_keyword" class="form-control"> 
                          </div>
                          
                           <div class="col-md-4">
                                <label for="" class="form-label">Crystal</label>
                                  <select class="form-control select2" name="crystal_id[]" style="width:100%" multiple>
                                       <option value="">Select Crystal</option>
                                        <?php 
                                        $Crystal = $this->Common->getCrystal();
                                        foreach($Crystal as $getCrystal){ ?>
                                        <option value="<?php echo $getCrystal->id; ?>"><?php echo $getCrystal->title; ?></option>
                                        <?php } ?>
                                     </select>
                           </div>
                          
                          <br><br><br><br>
                        <div class="row">
					 	<div class="col-md-6">
					 	<h4>Product Dimention Details</h4>
					 	 </div>
					  </div>
					   
					   <div class="col-md-6">
						   <label for="" class="form-label">Product Length</label>
						   <br>
							<input type="text" class="form-control" name="length">
						</div>
						
					 	<div class="col-md-6">
						   <label for="" class="form-label">Product Height</label>
						   <br>
							<input type="text" class="form-control" name="height">
						</div>
						
						<div class="col-md-6">
						   <label for="" class="form-label"> Product Width</label>
						   <br>
							<input type="text" class="form-control" name="width">
						</div>
						
					 	<div class="col-md-6">
						   <label for="" class="form-label">Package Weight</label>
						   <br>
							<input type="text" class="form-control" name="packageWeight">
						</div>
                         
                        
                          <div class="col-md-12">
                                <label for="" class="form-label">Product Specification</label>
                                <textarea type="text" name="product_specification" class="form-control summernote"></textarea>
                          </div>
                          
                          <div class="col-md-12">
                                <label for="" class="form-label">Product Key Feature</label>
                                <textarea type="text" name="product_keyword" class="form-control summernote"></textarea>
                          </div>
                          
                           
                          
                          <div class="col-md-12">
                                <label for="" class="form-label">Long Description</label>
                                <textarea type="text" name="long_description" class="form-control summernote"></textarea>
                          </div>
                          <div class="col-md-12">
                                <label for="" class="form-label">Meta Description</label>
                                <textarea type="text" name="product_meta" class="form-control"></textarea>
                          </div>
                           <div class="col-md-12">
						   <label for="" class="form-label">Video Link</label>
						   <br>
							 <input type="text" name="product_video" class="form-control">
						</div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Product Image1</label>
                                <input type="hidden" name="pimg">
                                <input type="file" name="pimg" class="form-control"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Product Image2</label>
                                <input type="hidden" name="pimg1">
                                <input type="file" name="pimg1" class="form-control">
                          </div>
                                
                                 <div class="col-md-4">
                                <label for="" class="form-label">Product Image3</label>
                                <input type="hidden" name="pimg2">
                                <input type="file" name="pimg2" class="form-control">
                          </div>
                          
                           <div class="col-md-4">
                                <label for="" class="form-label">Product Image4</label>
                                <input type="hidden" name="pimg3">
                                <input type="file" name="pimg3" class="form-control">
                          </div>
                                
                                 <div class="col-md-4">
                                <label for="" class="form-label">Product Image5</label>
                                <input type="hidden" name="pimg4">
                                <input type="file" name="pimg4" class="form-control">
                          </div>
                          <!--  <div class="col-md-6">-->
                          <!--      <label for="" class="form-label">Video</label>-->
                          <!--      <input type="text" name="video" class="form-control"> -->
                          <!--</div>-->
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
                
              
              
                
               </form>
               </div>
               <div class="tab-pane fade show session_views" id="bulk" role="tabpanel" aria-labelledby="bulk-tab">
                    <h3>Upload Bulk Product here</h3>
                   
                    <form id="crudFormkkkk" action="<?php echo base_url(); ?>commoncontroller/import_bulk_product/bulk" method="POST" class="row crudForm g-3" enctype="multipart/form-data">
                        <div class="col-md-4">
                            <label for="" class="form-label">Level One Category Name</label>
                            <select class="form-control select2" name="category_id[]" style="width:100%" multiple onChange="getSubCategoryBulk(this.value)" >
                                <option value="">Select Category</option>
                                <?php 
                                $categories1 = $this->Common->getProductCategory();
                                foreach($categories1 as $category1){ ?>
                                <option value="<?php echo $category1->product_category_id; ?>"><?php echo $category1->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Level Two Category Name</label>
                            <select class="form-control select2" name="sub_category_id" id="subcategory_html1" style="width:100%" onChange="getLevelTreeCategoryBulk(this.value)">
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Level Three Category Name</label>
                            <select class="form-control select2" name="level_three_category_id" id="level_threeh_html1" style="width:100%" onChange="getLevelFourCategoryBulk(this.value)">
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Level Four Category Name</label>
                            <select class="form-control" name="level_four_category_id" id="level_four_html1" style="width:100%" multiple>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Product Brand</label>
                            <select class="form-control select2" name="brand_id" style="width:100%" >
                                <option value="">Select Brand</option>
                                <?php 
                                $proBrand1 = $this->Common->getbrand();
                                foreach($proBrand1 as $brand1){ ?>
                                <option value="<?php echo $brand1->id; ?>"><?php echo $brand1->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Upload File</label>
                            <input type="file" class="form-control" id="cover" name="uploadFile">
                            <br>
                            <a href="<?php echo base_url(); ?>uploads/productFile.xlsx">Download Sample File</a>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                        </div>
                    </form>
                </div>
              </div><!-- End Default Tabs -->
                
            </div>
          </div>



    
    
    
<script>
    function setOtherTax(tax){
        if(tax=='other'){
            $("#tax_other").attr('readonly',false)
        }
        else{
             $("#tax_other").val('');
             $("#tax_other").attr('readonly',true)
        }
    }
    
    function checkPrice(val){
        if(val=='Variation'){
            $('.priceDiv').hide();
        }else{
            $('.priceDiv').show();
        }
    }
</script>

