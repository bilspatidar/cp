<?php 
 		     $states= $this->db->get('states')->result();
			//$categories = $this->db->get('itemcategory')->result();

?>
<div class="row">
      <div class="col-md-12">
    <?php 			$level_one_categories = $this->db->get_where('categories',array('status'=>"Active"))->result(); ?>
     <h4>Edit Level Two Category Details</h4>
          	    <form id="updateGetForm" class="GuestForm" action="<?php echo base_url(); ?>master/add_categories/update/" method="POST" enctype="multipart/form-data">
               
                <input type="hidden" name="level_two_category_id" value="<?php echo$row[0]->level_two_category_id; ?>">
					<div class="form-group">
					  <div class="row">
					      	<div class="col-md-6">
						   <label><b><?php echo get_phrase('Level One Category Name') ?></b></label>
						   <br>
							<select class="form-control" name="level_one_category_id">
							    <option value="">Select Level One</option>
							    <?php foreach($level_one_categories as $cat_row){ ?>
							    <option value="<?php echo $cat_row->level_one_category_id; ?>" <?php if($cat_row->level_one_category_id==$row[0]->level_one_category_id){ echo'selected'; }?>><?php echo $cat_row->level_one_category_name; ?></option>
							    <?php } ?>
							</select>
						</div>
					
					
					  	<div class="col-md-6">
						    <label><b><?php echo get_phrase('Level Two Category Name') ?></b></label>
						    <br>
						
								<input name="level_two_category_name" class="form-control" value="<?php echo$row[0]->level_two_category_name; ?>">
						</div>
					
				
							
					  </div>		
                    </div>
                    <div class="form-group">
                         <div class="row">
					 
						<div class="col-md-8">
						   <label><b><?php echo get_phrase('Hsn Code') ?></b></label>
						   <br>
						
						<?php $hsn_code  = $this->db->get_where('hsn_code',array('level_two_category_id'=>$row[0]->level_two_category_id)); ?>
						<div class="table-responsive">
      <table class="table table-bordered" id="hsnCodeTable_modal">
        <thead>
          <tr>
            <th class="text-center">Code</th>
            <th class="text-center">Remove</th>
          </tr>
        </thead>
        <tbody id="tbody_modal">
            <?php if($hsn_code->num_rows()>0){
            $hsn_code_result = $hsn_code->result(); 
            foreach($hsn_code_result as $hsn_code_row){
                ?>
           <tr>
            <td class="text-center"><input type="text" class="form-control" name="code[]" value="<?php echo $hsn_code_row->code; ?>"></td>
            <td class="text-center"><a href="javascript:void(0)" class="remove_modal" >Remove</a></td>
          </tr>
                <?php 
            }
            }?>
            
        </tbody>
      </table>
    </div>
    <a href="javascript:void(0)" id="addBtn_modal">
        Add New
    </a>
    
    
    
						</div>
						
						
						
							
					  </div>
					</div>
					
					
                    
                    		<div class="form-group">
					  <div class="row">
					      	
						<div class="col-md-6">
						    <label><b><?php echo get_phrase('Status') ?></b></label>
						    <br>
							<select class="form-control" name="level_two_category_status">
							    <option value="1" <?php if($row[0]->level_two_category_status==1){ echo'selected'; }?>>Active</option>
							     <option value="0" <?php if($row[0]->level_two_category_status==0){ echo'selected'; }?>>Deactive</option>
							</select>
						</div>
						
					  	<div class="col-md-6">
						    <label><b><?php echo get_phrase('Banner') ?></b></label>
						    <br>
						
						
						<?php 
				   $image = $row[0]->level_two_category_banner;
				   $exist = 'uploads/categoryTwoFiles/'.$image;
				   if($image!='' && file_exists($exist))
				   {
				  $url =	base_url().$exist;   
				   }
				  else
				   {
				   $url = base_url().'uploads/no_file.jpg';
				   }
				   
			   		   
								?>
						<div class="fileinput fileinput-new" data-provides="fileinput" style="border:1px solid #dcdcdc;">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								
									<img src="<?php echo$url; ?>" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail img-thumbnail" style="max-width: 100%; max-height: 150px;border:1px solid #dcdcdc;"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="level_two_category_banner" accept="image/*">
									</span>
									<a href="#" class="btn btn-xs btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
				</div>

						</div>	
						
						
						  </div>		
                    </div>
						
						 

				<div class="form-group">
					  <div class="row">
						<div class="col-md-2">
					<div class="box-footer">
							<button class="btn btn-md btn-Hotel">Save</button>
					</div>
					</div>	
						
                    </div>
					</div> 
					</form>
     	

		
   
      
      </div>
    </div>
  
  
<!--Footer-part-->

<script>
$("#updateGetForm").on('submit',(function(e) {
      $(".loading").show();
e.preventDefault();
$.ajax({
	url: '<?php echo base_url(); ?>master/add_level_two_category/edit/',
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(msg){
	 
	 
	     $(".loading").hide();

	  if(msg=='1')
            {
     var page_no = $("#page_number").val();  
     load_country_data(page_no); 
    
           toastr.success("success!");
            }
            else
            {
                toastr.error(msg);
            }
	},
	error: function(){} 	        
});
}));
</script>



<script>
 
    $(document).ready(function () {
  
      // Denotes total number of rows
      var rowIdx_modal = 0;
  
      // jQuery button click event to add a row
      $('#addBtn_modal').on('click', function () {

        // Adding a row inside the tbody.
        $('#tbody_modal').append(`<tr id="R${++rowIdx_modal}">
             <td class="row-index text-center">
<input type="text" class="form-control" name="code[]">             </td>
              <td class="text-center">
                <a href="javascript:void(0)" class="remove_modal" >Remove</a>
                </td>
              </tr>`);
      });
  
      // jQuery button click event to remove a row.
      $('#tbody_modal').on('click', '.remove_modal', function () {
  
        // Getting all the rows next to the row
        // containing the clicked button
        var child = $(this).closest('tr').nextAll();
  
        // Iterating across all the rows 
        // obtained to change the index
        child.each(function () {
  
          // Getting <tr> id.
          var id = $(this).attr('id');
  
          // Getting the <p> inside the .row-index class.
          var idx = $(this).children('.row-index').children('p');
  
          // Gets the row number from <tr> id.
          var dig = parseInt(id.substring(1));
  
          // Modifying row index.
          idx.html(`Row ${dig - 1}`);
  
          // Modifying row id.
          $(this).attr('id', `R${dig - 1}`);
        });
  
        // Removing the current row.
        $(this).closest('tr').remove();
  
        // Decreasing total number of rows by 1.
        rowIdx_modal--;
      });
    });

</script>