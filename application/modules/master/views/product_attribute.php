
 
 
 

	<div class="row">	<div class="col-md-12">
Manage Price Variation of <b><?php echo $this->Common->get_col_by_key('product','product_id',$product_id,'pname'); 
 $priceFlag =  $this->Common->get_col_by_key('product','product_id',$product_id,'priceFlag');
?>
</b>
  <style>
.GuestForm div.row{border:1px solid #dcdcdc;padding:10px;}

</style> 
<p align="right">
<button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#productAttributeModal">
  Add Product Attribute
</button> </p>

<h6>Note : This Product's Price is On <u><?php if($priceFlag==0){ echo'Variation'; $isVar = 1; $isReq = 'required';   } else { echo"Quantity"; $isVar = 0; $isReq =''; }?></u> Based.</h6>

<div class="modal" id="productAttributeModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Product Attribute</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       	<form  class="GuestForm" id="insertFormSingle" method="POST" action="<?php echo base_url(); ?>master/add_product_attribute/add">
                <input type="hidden" value="<?php echo base_url(); ?>master/add_product_attribute/add" id="post_link">
					<input type="hidden" value="<?php echo $product_id; ?>" name="product_id">
					
					<div class="form-group">
					  <div class="row">
					      
					      <div class="col-md-12">
						   <label><b>Attribute Name</b></label>
						   <br>
							<select class="form-control" name="attribute_id" required>
							    <option value="">Select Attribute</option>
							   <?php 
                                $attributes = $this->Common->getProductAttribute();
                                foreach($attributes as $attribute){ ?>
                                <option value="<?php echo $attribute->id; ?>"><?php echo $attribute->name; ?></option>
                                <?php } ?>
							</select>
						</div>
						</div>
					      
					  <div class="row">
					<div class="col-md-4">
				<label><b>&nbsp;</b></label>
						   <br>
							<button class="btn btn-md btn-primary">Save</button>
					
					</div>	
							</div>
					      </div>
						 
					
					</form>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
 	           	</div>
 	           	</div>
 	      <hr>
			<div class="row" id="attribute_data">
			    
			</div>
		
	






<script>

$("#insertFormSingle").on('submit',(function(e) {

      $(".loading").show();
var post_link = $("#post_link").val();
	 
e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(msg){
 
	  if(msg==1)
            {
 
     $(".loading").hide();
      toastr.success('Success!');
     var product_id = "<?php echo $product_id;  ?>";
load_attribute_data(product_id); 
        
             }
            else
            {
              
            $(".loading").hide();
           toastr.error(msg);
                
                
                
            }
	  
	},
	error: function(){} 	        
});


}));



$(document).ready(function(){
    var product_id = "<?php echo $product_id;  ?>";
 load_attribute_data(product_id);
});
function load_attribute_data(product_id){
	
	$(".loading").show();
	var data_link = "<?php echo base_url(); ?>master/get_product_attribute1/"+product_id;
	var url = data_link;
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#attribute_data').html(data);
   
	$(".loading").hide();
    
    }
  });
 }
</script>

