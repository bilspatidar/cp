<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<section>

  <!--Grid row-->

<div class="container">
    <div class="row">
         <form  action="<?php echo base_url(); ?>v1/add_test/pay_now" method="POST" class="row crudForm g-3">
                <input type="hidden" name="api_key" value="live_$2y$10$J09e24hL3lXlFmB5fnel0eKtPUmVUIn7WDRbIxbMGnplZ0n0J31UW" class="form-control"> 
                <input type="hidden" name="api_secret" value="live_$2y$10$VCkKRD.SBONWUGWefTbfle7pTOhd1z7M4tOgoGo7Vyzhn3Gh/TSmu"  class="form-control"> 
                <input type="hidden" value="Live" name="Environment" class="form-control"> 
      
                <div class="col-md-12">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" class="form-control"> 
                </div>
              <div class="col-md-12">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" class="form-control"> 
          </div>
              <div class="col-md-12">
                <label for="" class="form-label">Phone</label>
                <input type="number" name="phone" class="form-control"> 
          </div>
           <div class="col-md-12">
                <label for="" class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" min="1" step="any"> 
          </div>
           <div class="col-md-12">
                <label for="" class="form-label">Currency</label>
                <select name="currency" class="form-control">
                    <option value="">Select Currency</option>
					<option value="INR">INR</option>
					<option value="USD">USD</option>
                </select>
          </div><br><br><br><br>
          <div class="col-md-12">
                <label for="" class="form-label">Transaction ID</label>
                <input type="text" name="transaction_id" class="form-control"> 
          </div>
          <div class="col-md-12">
                <label for="" class="form-label">Order Number</label>
                <input type="text" name="order_number" class="form-control"> 
          </div>
          <div class="col-md-12">
                <label for="" class="form-label">Back URL</label>
                <input type="text" name="back_url" class="form-control"> 
          </div>
          <div class="col-12">
                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
          </div>
</form>
  
    </div>
</div>
 
</section>
<!--Section: Block Content-->


<?php if($proceed_payment==1){
//update orderKey
$cart_data['order_id'] = $razorpay_order_id;


?> 
<form name='razorpayform' action="<?php echo base_url().'v1/verify_paymentTest';?>" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
   
</form>



<script>
// Checkout details as a json
var options = <?php echo json_encode($razor_data);?>;
/**
 * The entire list of Checkout fields is available at
 * https://docs.razorpay.com/docs/checkout-form#checkout-fields
 */
options.handler = function (response){
    // alert(response);
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};
// Boolean whether to show image inside a white frame. (default: true)
options.theme.image_padding = false;
options.modal = {
    ondismiss: function() {
        console.log("This code runs when the popup is closed");
    },
    // Boolean indicating whether pressing escape key 
    // should close the checkout form. (default: true)
    escape: true,
    // Boolean indicating whether clicking translucent blank
    // space outside checkout form should close the form. (default: false)
    backdropclose: false
};
var rzp = new Razorpay(options);
$(document).ready(function(){
   
  $("#rzp-button1").click();
  rzp.open();
  e.preventDefault();
});
</script>

<?php } ?>

 <script>




$('#region_id1').change(function(){
	  var c_id	=	$(this).val();
	  var url1 = '<?php echo base_url(); ?>master/get_cities';
	  if(c_id){
$('#loading').show(); 
		  $.ajax({
			url: url1,
			type:'POST',
			data:{state_id:c_id},
			success:function(result){
				$('#loading').hide(); 
				$("#city_id1").html('');
				$("#city_id1").html(result);
				
			 }
		  });
	  }  
	});


function setPaymentMethod(paymentMode){
    if(paymentMode==1){
        $("li#mileStonePercentage_html").show();
    }
    else{
        $("li#mileStonePercentage_html").hide();
         var order_amount = $("#order_amount").val();
          $("#paidAmountHtml").html(order_amount);
    $("#paidAmount").val(order_amount);
}
}

function setPaidAmount(percentage){
    var order_amount = $("#order_amount").val();
    var PaidAmt = order_amount*percentage/100;
    $("#paidAmountHtml").html(PaidAmt);
    $("#paidAmount").val(PaidAmt);
    
}

$(document).ready(function(){
   $("#mileStonePercentage").on('input',function(){
       var percentage = $(this).val();
        var order_amount = $("#order_amount").val();
    var PaidAmt = order_amount*percentage/100;
    $("#paidAmountHtml").html(PaidAmt);
    $("#paidAmount").val(PaidAmt);
   }); 
});
</script>
