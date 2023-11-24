	
		
	
 <!--<?php $this->load->view('include/userAction');  ?>-->
 

 
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_banner/update" method="POST" class="row g-3">
                     
                <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
         
		 <div class="col-md-4">
               <label for="" class="form-label">Link</label>
		 <input type="text" name="link" class="form-control" value="<?php echo $row[0]->link;?>">
		 </div>
           <div class="col-md-4">
			   <label for="" class="form-label">Area</label>
			   <select name="area" class="form-control" onchange="showDivVerticalModel(this.value)">
		   <option value="">Select Area</option>
		   <option value="slider" <?php if($row[0]->area=='slider'){echo 'selected';} ?>>Slider</option>
		   <option value="full_width" <?php if($row[0]->area=='full_width'){echo 'selected';} ?>>Full Width</option>
			</select>                         
			 </div>
			      <div class="col-md-4">
							<label for="" class="form-label">Image</label>
							<span class="text-danger sliderShowModel" style="display:none;">Image Size 1000*1080</span>
							<span class="text-danger full_widthShowModel" style="display:none;">Image Size 944*250</span>
							<input type="file" name="image" class="form-control" id="cover"> 
                </div>
				
				 <div class="col-md-4">
			   <label for="" class="form-label">Status</label>
			   <select name="status" class="form-control">
		   <option value="">Select Status</option>
		   <option value="Active" <?php if($row[0]->status=='Active'){echo 'selected';} ?>>Active</option>
		   <option value="Deactive" <?php if($row[0]->status=='Deactive'){echo 'selected';} ?>>Deactive</option>
			</select>                         
			 </div>
				
		  <div class="col-12">
				<button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
		  </div>
</form>

<script>

function showDivVerticalModel(val){
   if(val=='slider'){
    $('.sliderShowModel').show();
    $('.full_widthShowModel').hide();
   } else{
       if(val=='full_width'){
       $('.full_widthShowModel').show();
        $('.sliderShowModel').hide();
       }else{
       $('.full_widthShowModel').hide();
       $('.sliderShowModel').hide();
       }
   }
}


</script>

