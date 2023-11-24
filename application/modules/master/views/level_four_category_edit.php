


 
 
 
 
                 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_level_four_category/update" method="POST" class="row g-3">
              
			  <!-- Button tag -->
								<button class="btn btn-default" role="iconpicker"></button>
								<!-- Div tag -->
								<div role="iconpicker" name="icon_maker" value=""></div>
						
						<div class="col-md-4">
                                <!--<label for="" class="form-label">Color</label>-->
                                <input type="hidden" name="color" class="form-control" value="<?php echo $row[0]->color;?>"> 
                          </div>
						  
						  <div class="col-md-4">
                                <!--<label for="" class="form-label">Bg Color</label>-->
                                <input type="hidden" name="bgColor" class="form-control" value="<?php echo $row[0]->bgColor;?>"> 
                          </div>
			  
			  <div class="col-md-4">
                    <label for="" class="form-label">Name</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id;?>"> 
                    <input type="text" name="name" class="form-control" value="<?php echo $row[0]->name;?>"> 
              </div>
            <div class="col-md-4">
                    <label for="" class="form-label">Level One Category</label>
              
               
               
                    <select class="form-control select2" name="category_id" style="width:100%" required onChange="getSubCategoryModal(this.value)" >                                                       
                           <option value="">Select Category</option>
                            <?php 
                            $categories = $this->Common->getProductCategory();
                            foreach($categories as $category){ ?>
                            <option value="<?php echo $category->product_category_id; ?>"<?php if($category->product_category_id==$row[0]->category_id) {echo 'selected';} ?>>  
                                <?php echo $category->name; ?></option>
                            <?php } ?>
                         </select>
                         </div>
                   <div class="col-md-4">
                    <label for="" class="form-label">Level Two Category</label>
                    <select class="form-control" name="sub_category_id" id="subcategory_html_modal" style="width:100%" required onChange="getLevelTreeCategoryModal(this.value)" >
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
            <select class="form-control" name="level_three_category_id" id="level_three_html_modal" style="width:100%" required>
            <?php 
                    $threeCategories = $this->Common->getlThrecategory();
                    foreach($threeCategories as $threeCategory){ ?>
                    <option value="<?php echo $threeCategory->id; ?>"
                    <?php if($threeCategory->id==$row[0]->id) {echo 'selected';} ?>>  
                        <?php echo $threeCategory->name; ?></option>
                    <?php } ?>
            
                 </select>
                 </div>
                     
                          
                            <div class="col-md-4">
                              <?php 
                             $File = $row[0]->image;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/level_four_category/'.$File;
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
                                <label for="" class="form-label">Image (400*400)&nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="image">
                                <input type="file" name="image" class="form-control"> 
                          </div>
                          
                           <div class="col-md-4">
                              <?php 
                             $File = $row[0]->banner;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/level_four_category/'.$File;
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
                                <label for="" class="form-label">Banner (1000*300)&nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="banner">
                                <input type="file" name="banner" class="form-control"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label">Status</label>
                                <select name="status" class="form-control input-sm"><option value="">Status</option><option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option><option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
                          </div>
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
                </form>
				
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker-iconset-all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.min.js"></script>

<script>


// Custom options
$('.icon_maker').iconpicker({
    align: 'center', // Only in div tag
    arrowClass: 'btn-danger',
    arrowPrevIconClass: 'fas fa-angle-left',
    arrowNextIconClass: 'fas fa-angle-right',
    cols: 10,
    footer: true,
    header: true,
    icon: 'fas fa-bomb',
    iconset: 'fontawesome5',
    labelHeader: '{0} of {1} pages',
    labelFooter: '{0} - {1} of {2} icons',
    placement: 'bottom', // Only in button tag
    rows: 5,
    search: true,
    searchText: 'Search',
    selectedClass: 'btn-success',
    unselectedClass: ''
});
</script>