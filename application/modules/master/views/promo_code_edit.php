	
	    





 <?php $this->load->view('include/userAction');  ?>

		<form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_promo_code/update" method="POST" class="row g-3" enctype="multipart/form-data">
          
            <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>">
        	
                      
                          <div class="col-md-4">
                                <label for="" class="form-label">Promo Code *</label>
                                <input type="text" name="promo_code" class="form-control" value="<?php echo $row[0]->promo_code; ?>"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Message *</label>
                                <input type="text" name="message" class="form-control" value="<?php echo $row[0]->message; ?>"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Start Date *</label>
                                <input type="date" name="start_date" class="form-control" value="<?php echo $row[0]->start_date; ?>"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">End Date *</label>
                                <input type="date" name="end_date" class="form-control" value="<?php echo $row[0]->end_date; ?>"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Minimum Order Amount *</label>
                                <input type="number" name="minimum_order_amount" class="form-control" step="any" value="<?php echo $row[0]->minimum_order_amount; ?>"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Discount *</label>
                                <input type="number" name="discount" class="form-control" step="any" value="<?php echo $row[0]->discount; ?>"> 
                          </div>
                          
                          <div class="col-md-4">
                <label for="" class="form-label">Discount Type *</label>
                     <select class="form-control" name="discount_type">
                    <option value="">Select</option>
                    <option value="Percentage" <?php if($row[0]->discount_type=='Percentage'){echo  'selected';} ?>>Percentage</option>
                    <option value="Amount" <?php if($row[0]->discount_type=='Amount'){echo  'selected';} ?>>Amount</option>
                    </select>
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Max Discount Amount *</label>
                                <input type="number" name="max_discount_amount" class="form-control" step="any" value="<?php echo $row[0]->id; ?>"> 
                          </div>
                          
                          <div class="col-md-4">
                <label for="" class="form-label">Repeat Usage *</label>
    <select class="form-control" name="repeat_usage" style="width:100%" onchange="showDivModel(this.value)">
                    <option value="">Select</option>
                    <option value="allowed" <?php if($row[0]->repeat_usage=='allowed'){echo  'selected';} ?>>Allowed</option>
                    <option value="notallowed" <?php if($row[0]->repeat_usage=='notallowed'){echo  'selected';} ?>>Not Allowed</option>
                    </select>
                          </div>
                                    <div class="col-md-4">
                <label for="" class="form-label">Type *</label>
				<input type="hidden" id="typeModel" value="<?php echo $row[0]->type;?>">
                <select class="form-control" name="type" style="width:100%" onchange="showDivTypeModel(this.value)">
                    <option value="">Default</option>
                    <option value="categories" <?php if($row[0]->type=='categories'){echo  'selected';} ?>>Category</option>
                    <option value="product" <?php if($row[0]->type=='product'){echo  'selected';} ?>>Product</option>
                    </select>
                          </div>
                     
          <div class="hidden_divModel2" style="display:<?php if($row[0]->type=='categories'){ echo'block';} else { echo'none'; } ?>">   
		  
		      <div class="col-md-4">
                <label for="" class="form-label">Level One Category Name</label>
				<?php 
				 $categories = $this->Common->getProductCategory();
				 $category_id_array = explode(',',$row[0]->level_one_cat_id);
				?>
                <select class="form-control select2Modal" name="level_one_cat_id[]" style="width:100%" multiple onChange="getSubCategoryModal(this.value)" >
                       <option value="">Select Category</option>
                        <?php 
                        foreach($categories as $category){ ?>
                        <option value="<?php echo $category->product_category_id; ?>"<?php if(in_array($category->product_category_id,$category_id_array)){ echo "selected";} ?>>
						<?php echo $category->name; ?></option>
                        <?php } ?>
                     </select>
                     </div>
					 
                     <div class="col-md-4">

                <label for="" class="form-label">Level Two Category Name</label>
                <select class="form-control select2Modal" name="level_two_cat_id[]" id="subcategory_html_modal" multiple style="width:100%" onChange="getLevelTreeCategoryModal(this.value)">
                      <option value="" selected ><?php echo $this->Common->get_col_by_key('level_two_category','id',$row[0]->level_two_cat_id,'name');?> </option>
                     </select>
                     </div>
                    <div class="col-md-4">
                <label for="" class="form-label">Level Three Category Name</label>
                <select class="form-control select2Modal" name="level_three_cat_id[]" id="level_three_html_modal" multiple style="width:100%" onChange="getLevelFourCategoryModal(this.value)" >
                      <option value="" selected ><?php echo $this->Common->get_col_by_key('level_three_category','id',$row[0]->level_two_cat_id,'name');?> </option>
                     </select>
                     </div>
                    <div class="col-md-4">
                    <label for="" class="form-label">Level Four Category Name</label>
                    <select class="form-control select2Modal" name="level_four_cat_id[]" id="level_four_html_modal" multiple style="width:100%" >
                          <option value="" selected ><?php echo $this->Common->get_col_by_key('level_four_category','id',$row[0]->level_two_cat_id,'name');?> </option>
                         </select>
                         </div>
           </div>
           
			<div class="col-md-4 hidden_divModel1" style="display:<?php if($row[0]->type=='product'){ echo'block';} else { echo'none'; } ?>" >
					<?php 
				 $productsModel = $this->Common->getProduct();
				 $products_id_arrayModel = explode(',',$row[0]->product_id);
				?>
                <label for="" class="form-label">Products</label>
                <select class="form-control select2Modal" name="product_id[]" style="width:100%" multiple>
                       <option value="">Select Product</option>
                        <?php 
                        
                        foreach($productsModel as $productModel){ ?>
                        <option value="<?php echo $productModel->product_id; ?>" <?php if(in_array($productModel->product_id,$products_id_arrayModel)){ echo "selected";} ?>>
						<?php echo $productModel->pname; ?></option>
                        <?php } ?>
                     </select>
                     </div>
           </div>


          <div class="col-md-4 hidden_divModel" style="display:<?php if($row[0]->repeat_usage=='allowed'){ echo'block';} else { echo'none'; } ?>" >
                <label for="" class="form-label">No of repeat usage *</label>
                <input type="number" name="no_of_repeat_usage" class="form-control" value="<?php echo $row[0]->no_of_repeat_usage;?>"> 
           </div>              
 
                        <div class="col-md-4">
                              <?php 
                             $File = $row[0]->image;
		   
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
                                <label for="" class="form-label">Image &nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="image">
                                <input type="file" name="image" class="form-control"> 
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

<script>
   
    $('.select2Modal').select2({
        dropdownParent: $('#ExtralargeEditModal')
    });

</script>


<script>
$( document ).ready(function() {
    var repeat_usage = $('#repeat_usageModel').val();
   showDivModel(repeat_usage);
});

function showDivModel(val){
    if(lval=='allowed'){
       $(".hidden_divModel").css('display','block'); 
    }
    else{
          $(".hidden_divModel").css('display','none');  
    }
    }
</script>

<script>
$( document ).ready(function() {
    var type = $('#typeModel').val();
   showDivTypeModel(type);
});


function showDivTypeModel(val){
	
	 if(val=='categories'){
    $('.hidden_divModel2').show();
    $('.hidden_divModel1').hide();
   } else{
       if(val=='product'){
       $('.hidden_divModel1').show();
        $('.hidden_divModel2').hide();
       }else{
       $('.hidden_divModel1').hide();
       $('.hidden_divModel2').hide();
       }  
   }
   
}
  
</script>
