 <div class="card">
            <div class="card-body">
             
      
      <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">List</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Add New</button>
                </li>
               
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                 <div class="tab-pane fade show active session_views" id="home" role="tabpanel" aria-labelledby="home-tab">
                   <form class="form-inline filterForm">
                       <div div class="row">
                        <div class="col-md-3"> <lable>Promo Code</lable> <input type="text" id="filterOne" class="form-control input-sm"> </div>
                       <div class="col-md-3" style="z-index: 999;"><lable>Status</lable> <select id="filterTwo" class="form-control input-sm"><option value="">Status</option><option value="Active">Active</option><option value="Deactive">Deactive</option></select> </div>
                       <div class="col-md-3" style="z-index: 999;"> <lable>Show Deleted</lable> <select id="filterThree" class="form-control input-sm"><option value="0">No</option><option value="1">Yes</option></select> </div>  
                       <div class="col-md-2"><lable><br></lable><button class="btn btn-outline-primary" type="button" onClick="loadTableData(1)">SEARCH</button></div></div></form>
                   
                   <p>
			<div id="pageNumber" style="display:none;"></div>
                          
                               <div class="table-responsive" id="loadTableData">
                                   
                                   <h3>Data is loading please wait..   <i class="fa fa-refresh fa-spin"></i> </h3>
                               </div>
                               <div align="right" id="paginationLink"></div>
                                           
                                       </p>
                        </div>
                <div class="tab-pane fade session_adds" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                
                 <form id="crudForm" action="<?php echo base_url(); ?>master/add_promo_code/add" method="POST" class="row crudForm g-3" enctype="multipart/form-data">
                          <div class="col-md-4">
                                <label for="" class="form-label">Promo Code *</label>
                                <input type="text" name="promo_code" class="form-control"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Message *</label>
                                <input type="text" name="message" class="form-control"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Start Date *</label>
                                <input type="date" name="start_date" class="form-control"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">End Date *</label>
                                <input type="date" name="end_date" class="form-control"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Minimum Order Amount *</label>
                                <input type="number" name="minimum_order_amount" class="form-control" step="any"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Discount *</label>
                                <input type="number" name="discount" class="form-control" step="any"> 
                          </div>
                          
                          <div class="col-md-4">
                <label for="" class="form-label">Discount Type *</label>
                     <select class="form-control" name="discount_type">
                    <option value="">Select</option>
                    <option value="percentage">Percentage</option>
                    <option value="amount">Amount</option>
                    </select>
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Max Discount Amount *</label>
                                <input type="number" name="max_discount_amount" class="form-control" step="any"> 
                          </div>
                          
                          <div class="col-md-4">
                <label for="" class="form-label">Repeat Usage *</label>
    <select class="form-control" name="repeat_usage" style="width:100%" onchange="showDiv(this.value)">
                    <option value="">Select</option>
                    <option value="allowed">Allowed</option>
                    <option value="notallowed">Not Allowed</option>
                    </select>
                          </div>
                                    <div class="col-md-4">
                <label for="" class="form-label">Type *</label>
                <select class="form-control" name="type" style="width:100%" onchange="showDivType(this.value)">
                    <option value="">Default</option>
                    <option value="categories">Category</option>
                    <option value="product">Product</option>
                    </select>
                          </div>
                     
          <div class="hidden_div2" style="display:none;">     
                    <div class="col-md-4">
                <label for="" class="form-label">Level One Category Name</label>
                <select class="form-control select2" name="level_one_cat_id[]" style="width:100%" multiple onChange="getSubCategory(this.value)" >
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
                <select class="form-control select2" name="level_two_cat_id[]" id="subcategory_html" multiple style="width:100%" onChange="getLevelTreeCategory(this.value)">
                      
                     </select>
                     </div>
                    <div class="col-md-4">
                <label for="" class="form-label">Level Three Category Name</label>
                <select class="form-control select2" name="level_three_cat_id[]" id="level_threeh_html" style="width:100%" onChange="getLevelFourCategory(this.value)" multiple>
                      
                     </select>
                     </div>
                    <div class="col-md-4">
                    <label for="" class="form-label">Level Four Category Name</label>
                    <select class="form-control" name="level_four_cat_id[]" id="level_four_html" style="width:100%" multiple>
                          
                         </select>
                         </div>
           </div>
           
           <div class="hidden_div1" style="display:none;">     
                    <div class="col-md-4">
                <label for="" class="form-label">Products</label>
                <select class="form-control select2" name="product_id[]" style="width:100%" multiple onChange="getSubCategory(this.value)" >
                       <option value="">Select Product</option>
                        <?php 
                        $products = $this->Common->getProduct();
                        foreach($products as $product){ ?>
                        <option value="<?php echo $product->product_id; ?>"><?php echo $product->pname; ?></option>
                        <?php } ?>
                     </select>
                     </div>
           </div>
                <div class="col-md-4">
                <label for="" class="form-label">Status *</label>
                     <select class="form-control" name="status">
                    <option value="">Status</option>
                    <option value="Active">Active</option>
                    <option value="Deactive">Deactive</option>
                    </select>
                          </div>
                
                 <div class="col-md-4">
                                <label for="" class="form-label">Image</label>
                                <input type="hidden" name="image">
                                <input type="file" name="image" class="form-control"> 
                          </div>
                     
                     <div class="col-md-4 hidden_div" style="display:none;">     
                <label for="" class="form-label">No of repeat usage *</label>
                <input type="number" name="no_of_repeat_usage" class="form-control"> 
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
$( document ).ready(function() {
    var repeat_usage = $('#repeat_usage').val();
   showDiv(repeat_usage);
});

function showDiv(val){
   if(val=='allowed'){
    $('.hidden_div').show();
   } else{
    $('.hidden_div').hide();
       }
}


</script>
<script>
$( document ).ready(function() {
    var type = $('#type').val();
   showDivType(type);
});

function showDivType(val){
   if(val=='categories'){
    $('.hidden_div2').show();
    $('.hidden_div1').hide();
   } else{
       if(val=='product'){
       $('.hidden_div1').show();
        $('.hidden_div2').hide();
       }else{
       $('.hidden_div1').hide();
       $('.hidden_div2').hide();
       }
   }
}


</script>

