 
 

 <?php $this->load->view('include/userAction');  ?>
  <br>
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_category/update" method="POST" class="row g-3" enctype="multipart/form-data">
                         
                         <div class="col-md-4">
                             <label for="" class="form-label">Category Icon</label><br>
						<!-- Button tag -->
								<button class="btn btn-default" role="iconpicker"></button>
								<!-- Div tag -->
								<div role="iconpicker" name="icon_maker" value=""></div>
						</div>
						
						<div class="col-md-4">
                                <!--<label for="" class="form-label">Color</label>-->
                                <input type="hidden" name="color" class="form-control" value="<?php echo $row[0]->color;?>"> 
                          </div>
						  
						  <div class="col-md-4">
                                <!--<label for="" class="form-label">Bg Color</label>-->
                                <input type="hidden" name="bgColor" class="form-control" value="<?php echo $row[0]->bgColor;?>"> 
                          </div>
						
						 <div class="col-md-4">
                                <label for="" class="form-label">Category Name</label>
                                <input type="hidden" name="product_category_id" class="form-control" value="<?php echo $row[0]->product_category_id; ?>"> 
                                <input type="text" name="name" class="form-control" value="<?php echo $row[0]->name; ?>"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Short Name</label>
                                <input type="text" name="shortName" class="form-control" value="<?php echo $row[0]->shortName; ?>"> 
                          </div>
                          
						 
						  
						  
						  
                           <div class="col-md-4">
                              <?php 
                             $File = $row[0]->image;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/product_categories/'.$File;
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
                                <label for="" class="form-label">Image(400*400) &nbsp;&nbsp; <?= $fileData;?></label>
                              <input type="hidden" name="image">
                                <input type="file" name="image" class="form-control"> 
                          </div>
                          
                           <div class="col-md-4">
                              <?php 
                             $File = $row[0]->banner;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/product_categories/'.$File;
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
                                <label for="" class="form-label">Banner(1000*300) &nbsp;&nbsp; <?= $fileData;?></label>
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