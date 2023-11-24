
 
 
 
 
 
 
  <style>
.GuestForm div.row{border:1px solid #dcdcdc;padding:10px;}
#insertFormVariation{font-size:12px;}
#insertFormVariation input,#insertFormVariation select{font-size:12px;}
table#hsnCodeTable td,table#hsnCodeTable th{padding:2px;}
table#hsnCodeTable input{font-size:12px;}
</style>  

			
		  <?php $priceFlag =  $this->Common->get_col_by_key('product','product_id',$product_id,'priceFlag');
		  if($priceFlag==0){ $isVar = 1; $isReq = '*'; $display=""; } else{ $isVar = 0; $isReq = 'not require'; $display="none"; } ?>
             <div class="col-md-12">
                 <h5>Add New Variation</h5>
                 
                 	
			  <?php 
        $this->db->select('product_attribute.*,attribute.name');
        $this->db->from('product_attribute');
        $this->db->join('attribute','attribute.id=product_attribute.attribute_id');
        $this->db->where('product_attribute.product_id',$product_id);
        $product_attribute = $this->db->get(); 
        $a_num_rows =  $product_attribute->num_rows();
        if($a_num_rows>0){
            $product_attribute_res = $product_attribute->result();
            ?>
           
     <form id="insertFormVariation" action="<?php echo base_url(); ?>master/add_product_variation/add" method="POST">
     <input type="hidden" value="<?php echo base_url(); ?>master/add_product_variation/add" id="post_var_link">
	 <input type="hidden" value="<?php echo $product_id; ?>" name="product_id">
			             
	 <table><tr>    <?php $atr = 0; foreach($product_attribute_res as $product_attribute_row){ ?>
                 
                  <td> 
                    <lable style="text-transform:uppercase"><?php echo $product_attribute_row->name; ?> 
        <?php $del_url = base_url().'master/delete_product_attribute/'.$product_attribute_row->id; ?>
        <input type="hidden" name="attribute_id[]" value="<?php echo $product_attribute_row->attribute_id; ?>">
        <a href="javascript:void(0)" onclick="delete_attribute(this.id)" id="<?php echo $del_url;?>" style="font-size:9px;">.</a>
                    </lable><br>
                    <?php $variations = $this->db->get_where('variation',array('attribute_id'=>$product_attribute_row->attribute_id))->result(); ?>
                <select class="form-control" name="variation_id[<?php echo $product_attribute_row->attribute_id; ?>]" required>
                    <option value="">Select Variation</option>
                    <?php foreach($variations as $vrow){ ?>
                    <option value="<?php echo $vrow->id; ?>" style="color:<?php echo $vrow->variation_name; ?>;background:<?php echo $vrow->variation_name; ?>"><?php echo $vrow->variation_name; ?></option>
                    <?php } ?>
                </select>
                </td>
                <?php $atr++; }
                if($atr>4){ echo"</tr><tr>"; }
                ?>
                
                <td style="display:<?php echo $display; ?>">
                    <lable>MRP ( <?php echo $isReq;  ?> )</lable><br>
                    <input type="number" step="any" class="form-control" name="costing_price" <?php echo $isReq;  ?>>
                </td>
                <td style="display:<?php echo $display; ?>">
                    <lable>Selling Price ( <?php echo $isReq;  ?> )</lable><br>
                    <input type="number" step="any" class="form-control" name="selling_price" <?php echo $isReq;  ?>>
             </td>
                <td>
                    <lable>Quantity</lable><br>
                    <input type="number" step="any" class="form-control" name="qty">
               </td>
               
            
                
        
            </tr>
            <tr>
                <td colspan="5"><br>
                <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                </td>
            </tr>
            </table>
                </form>
            <?php 
        }
        
        ?>
        <hr>
        <br>
			                          <h5>Available Variation</h5>

                               <div class="table-responsive" id="variation_data">
                                   
                                   <h3>Data is loading please wait..   <i class="fa fa-refresh fa-spin"></i> </h3>
                               </div>
                                       </div>
                                       
                                       
                                       <div class="col-md-4">
                   
				
			  <?php 
			  if($priceFlag==1){
        $this->db->select('product_attribute.*,attribute.name');
        $this->db->from('product_attribute');
        $this->db->join('attribute','attribute.id=product_attribute.attribute_id');
        $this->db->where('product_attribute.product_id',$product_id);
        $product_attribute = $this->db->get(); 
        if($product_attribute->num_rows()>0){
            $product_attribute_res = $product_attribute->result();
            ?>
            <h5>Manage Price Qty Range</h5>
            <form id="insertFormQtyRange" action="<?php echo base_url(); ?>master/add_product_qty_range/add" method="POST">
 <input type="hidden" value="<?php echo base_url(); ?>master/add_product_qty_range/add" id="post_qty_link">
					<input type="hidden" value="<?php echo $product_id; ?>" name="product_id">
			               
                <div class="form-group">
                    	
						<div class="table-responsive">
      <table class="table table-bordered" id="hsnCodeTable">
        <thead>
          <tr>
            <th class="text-center">Min Qty</th>
            <th class="text-center">Max Qty</th>
            <th class="text-center">Price</th>
            <th class="text-center">MRP</th>
            <th class="text-center">Remove</th>
          </tr>
        </thead>
        <tbody id="qty_range_container">
            </tbody>
        <tbody id="tbody">
               
          <tr>
            <td class="text-center"><input type="text" class="form-control" name="min_qty[]"></td>
            <td class="text-center"><input type="text" class="form-control" name="max_qty[]"></td>
            <td class="text-center"><input type="text" class="form-control" name="price[]"></td>
            <td class="text-center"><input type="text" class="form-control" name="mrp[]"></td>
            <td class="text-center"></td>
          </tr>
        </tbody>
      </table>
    </div>
    <a href="javascript:void(0)" id="addBtn">
        Add New
    </a>
    
    
    
                </div>
                <div class="form-group"><br>
                <button class="btn btn-Hotel btn-sm" type="submit">Submit</button>
                    </div>
            </form>
            
            <?php 
        }
			  }
        ?>
        <br>
        </br>
        
       
                                       
        </div> 
			





<script>

$("#insertFormQtyRange").on('submit',(function(e) {

      $(".loading").show();
var post_link = $("#post_qty_link").val();
	 
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
load_qty_range_container_data(product_id);
        
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

$("#insertFormVariation").on('submit',(function(e) {

      $(".loading").show();
var post_link = $("#post_var_link").val();
	 
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


function delete_qty_range(id)
{
	 var x = confirm("Are you sure you want to delete?");
		if(x)
		{

  
   $(".loading").show();

         $.ajax({
         type: "GET",     
         url: id,
    
        success: function(msg) {
		
     $(".loading").hide();
            if(msg=='1')
               {
        var product_id = "<?php echo $product_id;  ?>";
        load_qty_range_container_data(product_id);
       toastr.success("success!");
                }
            else
            {
            
               toastr.error(msg);
      
            }
        
        }               
    });  
    }
    else
    {
        return false;
    }
}


function delete_attribute(id)
{

	 var x = confirm("Are you sure you want to delete?");
		if(x)
		{

  
   $(".loading").show();
         $.ajax({
         type: "GET",     
         url: id,
    
        success: function(msg) {
     $(".loading").hide();

            if(msg=='1')
               {
        var product_id = "<?php echo $product_id;  ?>";
        load_attribute_data(product_id);
       toastr.success("success!");
                }
            else
            {
            
               toastr.error(msg);
      
            }
        
        }               
    });  
    }
    else
    {
        return false;
    }
}


function delete_variation(id)
{
	 var x = confirm("Are you sure you want to delete?");
		if(x)
		{

  
  $(".loading").show();
         $.ajax({
         type: "GET",     
         url: id,
    
        success: function(msg) {
     $(".loading").hide();
            if(msg=='1')
              {
        var product_id = "<?php echo $product_id;  ?>";
        load_variation_data(product_id);
      toastr.success("success!");
                }
            else
            {
            
              toastr.error(msg);
      
            }
        
        }               
    });  
    }
    else
    {
        return false;
    }
}
$(document).ready(function(){
    var product_id = "<?php echo $product_id;  ?>";
 load_variation_data(product_id);
 load_qty_range_container_data(product_id);
 
 
 
});
function load_variation_data(product_id){
	$(".loading").show();
	var data_link = "<?php echo base_url(); ?>master/get_product_variationP/"+product_id;
	var url = data_link;

	$.ajax({
  url:url,	  
  method:"GET",
  success:function(data)
  {
	$('#variation_data').html(data);
	$(".loading").hide();
    
    }
  });
  
  
 }
function load_qty_range_container_data(product_id){
	$(".loading").show();
	var data_link = "<?php echo base_url(); ?>master/get_qty_range_container_data/"+product_id;
	var url = data_link;

	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#qty_range_container').html(data);
	$(".loading").hide();
    
    }
  });
  
  
 }
</script>


<script>
 
    $(document).ready(function () {
  
      // Denotes total number of rows
      var rowIdx = 0;
  
      // jQuery button click event to add a row
      $('#addBtn').on('click', function () {

        // Adding a row inside the tbody.
        $('#tbody').append(`<tr id="R${++rowIdx}">
             <td class="row-index text-center">
<input type="text" class="form-control" name="min_qty[]">             </td>
<td class="row-index text-center">
<input type="text" class="form-control" name="max_qty[]">             </td>
<td class="row-index text-center">
<input type="text" class="form-control" name="price[]">             </td>
<td class="row-index text-center">
<input type="text" class="form-control" name="mrp[]">             </td>
              <td class="text-center">
                <a href="javascript:void(0)" class="remove" ><i class="fa fa-trash"></i></a>
                </td>
              </tr>`);
      });
  
      // jQuery button click event to remove a row.
      $('#tbody').on('click', '.remove', function () {
  
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
        rowIdx--;
      });
    });

</script>
