<?php 
$page_titles='Create Sale';
if($page_titles=='Create Sale'){
 ?>
<script>
$(document).ready(function(){
getCartCounter();
});
</script>
 <?php 
}

?>   

<?php 

if($page_title=='Cart'){
 ?>
<script>
$(document).ready(function(){
getCartLoader();
});
</script>
 <?php 
}

?>   



<script>

toastr.options.timeOut = 3000; 

function addToCart(cartUrl){

   $(".loading").show();
         $.ajax({
         type: "GET",     
         url: cartUrl,
    success: function(msg) {
     $(".loading").hide();
            if(msg=='1')
               {
        getCartCounter();
       toastr.success("Item Added!");
                }
            else
            {
            
               toastr.error(msg);
      
            }
        
        }               
    });  
    }
function removeCartItem(cartUrl){
    var x = confirm("Are you sure you want to remove ?");
		if(x)
		{
		  
   $(".loading").show();
         $.ajax({
         type: "GET",     
         url: cartUrl,
    success: function(msg) {
     $(".loading").hide();
       getCartLoader();
        
        }               
    });    
		}
		else{
		    return false;
		}
}
	

function getCartCounter(){

   $(".loading").show();
         $.ajax({
         type: "GET",     
         url: "<?php echo base_url(); ?>transactions/getCartCounter/",
    success: function(msg) {
     $(".loading").hide();
          $(".getCartCounter").html(msg);
        
        }               
    });  
    }
function getCartLoader(){

   $(".loading").show();
         $.ajax({
         type: "GET",     
         url: "<?php echo base_url(); ?>transactions/getCartLoader/",
    success: function(msg) {
     $(".loading").hide();
          $("#getCartLoader").html(msg);
        
        }               
    });  
    }    
    
function getAttributeType(attribute_id){
    $(".loading").show();
    $("#variation_name").attr("type",'text');
 $("#variation_name").val('');
    $.ajax({
         type: "GET",     
         url: "<?php echo base_url(); ?>master/getAttributeType/"+attribute_id,
        success: function(msg) {
         $("#variation_name").attr("type",msg);
               $(".loading").hide();

		}               
    }); 
}    
function getLevelTwoCategory(level_one_id){
          $(".loading").show();

    $.ajax({
         type: "GET",     
         url: "<?php echo base_url(); ?>master/get_level_two_category_html/"+level_one_id,
        success: function(msg) {
         $("#level_two_category_id_html").html(msg);
         getLevelFourProductHsn();
               $(".loading").hide();

		}               
    }); 
}
function getLevelFourProductHsn(){
          $(".loading").show();
var level_one_id = $("#level_one_category_id").val();          
var level_two_id = $("#level_two_category_id_html").val();          
var level_three_id = $("#level_three_category_id_html").val();          
var level_four_id = $("#level_four_category_id_html").val();
var level_url = "<?php echo base_url(); ?>master/get_product_hsn_code_level_four/"+level_one_id+'/'+level_two_id+'/'+level_three_id+'/'+level_four_id;
    $.ajax({
         type: "GET",     
         url: level_url,
        success: function(msg) {
         $("#hsnCode").html(msg);
               $(".loading").hide();

		}               
    }); 
}



function getLevelThreeCategory(level_two_id){
          $(".loading").show();

    $.ajax({
         type: "GET",     
         url: "<?php echo base_url(); ?>master/get_level_three_category_html/"+level_two_id,
        success: function(msg) {
         $("#level_three_category_id_html").html(msg);
         getLevelFourProductHsn();
               $(".loading").hide();

		}               
    }); 
}
function getLevelFourCategory(level_three_id){
          $(".loading").show();

    $.ajax({
         type: "GET",     
         url: "<?php echo base_url(); ?>master/get_level_four_category_html/"+level_three_id,
        success: function(msg) {
         $("#level_four_category_id_html").html(msg);
         getLevelFourProductHsn();
               $(".loading").hide();

		}               
    }); 
}
$("#insertForm").on('submit',(function(e) {

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
    var page_no = 1;  
     load_country_data(page_no);
        
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
$("#insertFormCloseModal").on('submit',(function(e) {

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
     var page_no = 1; 
load_country_data(page_no); 
$("#closeFormModal").modal('hide');        
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

$("#insertFormOnly").on('submit',(function(e) {

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
    $('#insertFormOnly').find("input,input[type=text],input[type=number],textarea,select").val("");

     $(".loading").hide();
      toastr.success('Success!');
        
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
$("#insertFormFix").on('submit',(function(e) {

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
    //var objs = JSON.parse(msg);
	
	  if(msg==1)
            {
 

   
      $(".loading").hide();
      toastr.success('Success!');
   
        
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
$("#insertModalForm").on('submit',(function(e) {

      $(".loading").show();
var post_link = $("#modal_post_link").val();
	 
e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(msg){
   
   var obj = JSON.parse(msg);
				
               
				
				
	  if(obj.status==0)
            {
				
			
		   $(".loading").hide();
           toastr.error(obj.error);
         }
            else
            {
       $("#GuestNameSearch").val(obj.cname);
	   $("#GuestIdSearch").val(obj.cid);
	   $(".cstdetails").html(obj.clink);
	   
      $(".loading").hide();
      toastr.success('Success!');
	  }
	  
	},
	error: function(){} 	        
});


}));
$("#insertGetForm").on('submit',(function(e) {

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
   $('#insertGetForm').find("input[type=text],input[type=number],textarea").val("");
   $(".myselect").select2("val", "0");
     $(".loading").hide();
     toastr.success('Success!');
	 load_country_data(1); 
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
$("#insertRedirectForm").on('submit',(function(e) {

      ///$(".loading").show();
var post_link = $("#post_link").val();
var redirect_link = $("#redirect_link").val();

e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(msg){
     
	  if(msg==0)
            {
 
       $(".loading").hide();
           toastr.error('Failed');
           
        
             }
            else
            {
              
           
$(".loading").hide();
     toastr.success('Success!');
	 window.location.href =  redirect_link+msg;
     		   
                
                
            }
	  
	},
	error: function(){} 	        
});
}));
$("#updateForm").on('submit',(function(e) {

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
    $('#updateForm').find("input[type=text],input[type=number],textarea,input").val("");            
     
     $(".loading").hide();
      toastr.success('Success!');
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
</script>



	
	
<?php if(isset($table_data)){ if($table_data==1){ ?>
 <script>
 
$(document).ready(function(){
 load_country_data(1);
});

 </script>
 
 
<?php } } ?>



<?php if(isset($table_data_shop)){ if($table_data_shop==1){ ?>
 <script>
 
$(document).ready(function(){
 load_country_data_shop(1);
  //$("#sidebarToggleTop").trigger("click");
});

 </script>
 
 
<?php } } ?>	


 

 
 
 <script>


 
 


 
  function load_country_data(page)
 {
	
	$(".loading").show();
	var data_link = "<?php echo $data_link; ?>"+page;
	var url = data_link;
	
	var pt = "<?php echo $page_title; ?>";
	var postData = '';
	if(pt=='Vendor Management'){
		var KeyWord = $("#KeyWord").val();
		var Category = $("#Category").val();
		var Status = $("#Status").val();
		var postData = {KeyWord:KeyWord,Category:Category,Status:Status};
	}
	if(pt=='All Orders'){
		var KeyWord = $("#KeyWord").val();
		var FromDate = $("#FromDate").val();
		var ToDate = $("#ToDate").val();
		var postData = {KeyWord:KeyWord,FromDate:FromDate,ToDate:ToDate};
	}
	if(pt=='Dashboard')
	{
		var city_id = $("#city_id").val();
		var CategoryId = $("#CategoryId").val();
		var region_id = $("#region_id").val();
		var shopname = $("#shopname").val();
		var postData = {city_id:city_id,CategoryId:CategoryId,region_id:region_id,shopname:shopname};
	}
	
	
	if(pt=='Customer Management')
	{
		var KeyWord = $("#KeyWord").val();
		var Status = $("#Status").val();
		var postData = {KeyWord:KeyWord,Status:Status};
	}
	
		if(pt=='Product Catalogue')
	{
		var minPrice = $("#minPrice_f").val();
		var maxPrice = $("#maxPrice_f").val();
		var category = $("#category_f").val();
		var postData = {minPrice:minPrice,maxPrice:maxPrice,category:category};
	
	    
	}
	  
	
		if(pt=='Lead Report')
	{
		var Ctype = $("#Ctype").val();
		var FromDate = $("#FromDate").val();
		var ToDate = $("#ToDate").val();
		var postData = {Ctype:Ctype,FromDate:FromDate,ToDate:ToDate};
	}
	
	
		if(pt=='Lead Management' || pt=='Todays Reminder')
	{
		var KeyWord = $("#KeyWord").val();
		var Status = $("#Status").val();
		var Ctype = $("#Ctype").val();
		var postData = {KeyWord:KeyWord,Status:Status,Ctype:Ctype};
	}
	
		if(pt=='Sent Mail')
	{
		var KeyWord = $("#KeyWord").val();
		var Status = $("#Status").val();
		var Ctype = $("#Ctype").val();
		var Etemplate = $("#Etemplate").val();
		var postData = {KeyWord:KeyWord,Status:Status,Ctype:Ctype,Etemplate:Etemplate};
	}
	
		if(pt=='Play History' || pt=='History' || pt=='Recharge History' || pt=='Referal History')
        	{
        		var from_date = $("#Ffrom_date").val();
        		var to_date = $("#Fto_date").val();
        		var postData = {from_date:from_date,to_date:to_date};
        	
        	}
	
	if(pt=='Customer')
        	{
        		var region_id = $("#region_id").val();
        		var postData = {region_id:region_id};
        	
        	}

	$.ajax({
   url:url,	  
   method:"POST",
   data:postData,
   dataType:"json",
   success:function(data)
   {
	  
	$('#country_table').html(data.country_table);
    $('#pagination_link').html(data.pagination_link);
    $("#page_number").html(data.page_number);
	data_table();
	$(".loading").hide();
    
    }
  });
 }
 


 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  load_country_data(page);
 });
 
 
 
 function load_country_data_shop(page)
 {
	
	 $(".loading").show();
	 var data_link = "<?php echo $data_link; ?>"+page;
	var url = data_link;
	var pt = "<?php echo $page_title; ?>";
	var postData = '';
	 
	 var CityIdSearch = $("#CityIdSearch").val();
     var CategoryId   = $("#CategoryId").val();
	 var region_id   = $("#region_id").val();
  
	var data_link = "<?php echo $data_link; ?>/"+CategoryId+'/'+CityIdSearch+'/'+region_id+'/'+page;

	var url = data_link;
	
	
  $.ajax({
   url:url,	  
   method:"GET",
   dataType:"json",
   success:function(data)
   {
	  
	$('#country_table').html(data.country_table);
    $('#pagination_link').html(data.pagination_link);
    $("#page_number").html(data.page_number);
	data_table();
	$(".loading").hide();
    
    }
  });
 }
 
 
 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  load_country_data(page);
 });
 
 
 
 
 </script>
 <script>
 function delete_me(id)
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
            if(msg==1)
               {
       var page_no =$("#page_number").html();   
	
       load_country_data(page_no); 
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



 
  function delete_me_modal(id)
{
 var x = confirm("Are you sure you want to delete?");
 var RowId = document.getElementById(id).getAttribute('cat_id');
 
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
       $("tr.del_row_"+RowId+" #Amount").val('');
       toastr.success("success!");
                }
            else
            {
            
               toastr.success(error);
      
            }
        
        }               
    });  
    }
    else
    {
        return false;
    }
}

function convert_me(id)
{
	 var x = confirm("Are you sure you want to Convert as a customer?");
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
       var page_no =$("#page_number").html();   
	
       load_country_data(page_no); 
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




 </script>
 
 
 
 
 <script>
     
function change_status_global(id)
{
  
 var x = confirm("Do you want to change status?");
    if(x)
    {
        
      
   $(".loading").show();
         $.ajax({
         type: "GET",     
         url: id,
       
        success: function(msg) {
  
            if(msg==1)
            {
               
      var page_no = $("#page_number").html(); 
     load_country_data(page_no); 
    
            $(".loading").hide();
            
            }
            else
            {
            $(".loading").hide();
            }
        
        }               
    });  
    }
    else
    {
        return false;
    }
}

 </script>
 
 
 


<script>


function edit_me(id)
{  
 
     $("#editModal .modal-body").html('Loading');
  
     var get_link = document.getElementById(id).getAttribute('name');

 $.ajax({
         type: "POST",     
         url: get_link,
        success: function(msg) {
           
         $("#editModal .modal-body").html(msg);
		 //$(".myselect").select2();
		 print_r(msg);
       
        }               
    });  
    
  $("#editModal").modal('show');
   
}






function edit_me_lg(id)
{
	 
     $("#editModalLg .modal-body").html('Loading');
  
     var get_link = document.getElementById(id).getAttribute('name');

 $.ajax({
         type: "POST",     
         url: get_link,
        success: function(msg) {
           
         $("#editModalLg .modal-body").html(msg);
		 
       
        }               
    });  
    
  $("#editModalLg").modal('show');
   
}


function edit_bil(id)
{
	  var get_link = document.getElementById(id).getAttribute('name');
	  var strWindowFeatures = "width=1000,height=600,scrollbars=yes,resizable=yes";
    window.open(get_link, 'Print', strWindowFeatures);
}
function checkout_me(id)
{
	
 var x = confirm("Want to Checkout?");
    if(x)
    {
$(".loading").show();
 
$("#editModal .modal-body").html('Loading');

 $.ajax({
         type: "POST",     
         url: id,
        success: function(msg) {
           $(".loading").hide();
         $("#editModal .modal-body").html(msg);
		}               
    });  
    
  $("#editModal").modal('show');

  
    }
    else
    {
        return false;
    }
}



function payment_modal(id)
{
	
     $("#paymentModal .modal-body").html('Loading');
  
     var get_link = document.getElementById(id).getAttribute('name');
	
 $.ajax({
         type: "POST",     
         url: get_link,
        success: function(msg) {
        $("#paymentModal .modal-body").html(msg);
		}               
    });  
    
  $("#paymentModal").modal('show');
  
}

</script>


<div class="modal fade" id="changeShopVendorModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
         <p>
             <span id="vendorFormMsg"></span>
             <form id="getVendorNameForm">
                 <div class="form-group">
                     <label>Enter Shop Code or Business Name</label>
                     <input type="text" class="form-control" name="shopCode" laceholder="Enter Shop Code or Business Name">
                 </div>
                 <div class="form-group">
                 <button class="btn btn-Hotel" type="submit">Submit</button>
                 </div>
             </form>
         </p>
        </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
  
</div>

<script>

 function changeShopVendor(){
        $("#changeShopVendorModal").modal('show');
    }
    $("#getVendorNameForm").on('submit',(function(e) {

      $(".loading").show();
var post_link = "<?php echo base_url(); ?>master/checkVendorSession/";
	 
e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(msg){
	    if(msg==0){
	  $("#vendorFormMsg").html("<span style='color:red'>Invalid Shop code or Business Name</span>");
	    }
	    else{
	        $("#vendorFormMsg").html(msg);
            $("#shopNameContainer").html(msg);
            $("#changeShopVendorModal").modal('hide');
            
            var page_no =$("#page_number").html();   
	
       load_country_data(page_no);
	    }
	    $(".loading").hide();
	  
	},
	error: function(){} 	        
});


}));

</script>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
         <h2>Data loading pls wait....</h2>
        </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
  
</div>

 
 
<div class="modal fade" id="editModalLg" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
         <h2>Data loading pls wait....</h2>
        </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
  
</div>



 <script>
  function data_table()
  {
	  

    var table = $('#example').DataTable( {
       paging: false,
       searching: true,
      dom: 'Bfrtip',
        buttons: [ 'copy', 'excel', 'print','pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );

 

  }
  </script>
  
  
  