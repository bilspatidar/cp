<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<form action="<?php echo $action; ?>" method="post" name="payuForm" id="payuForm" style="display: block">
  <input type="hidden" name="key" value="<?php echo MERCHANT_KEY ?>" />
  <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
  <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
  <input type="hidden" name="amount" value="<?php echo $totalCost; ?>" />
  <input type="hidden" name="firstname" id="firstname" value="<?php echo $firstName; ?>" />
  <input type="hidden" name="email" id="email" value="<?php echo $email; ?>" />
  <input type="hidden" name="phone" value="<?php echo $mobile; ?>" />
  <!--<textarea name="productinfo"></textarea>-->
  <input type="hidden" name="productinfo" value="<?php echo "productinfo"; ?>">
  <input type="hidden" name="surl" value="<?php echo SUCCESS_URL; ?>" />
  <input type="hidden" name="furl" value="<?php echo  FAIL_URL?>"/>
  <input type="hidden" name="service_provider" value="payu_paisa"/>
  <input type="hidden" name="lastname" id="lastname" value="<?php echo $lastName ?>" />
</form>
<script type="text/javascript">
  var payuForm = document.forms.payuForm;
  payuForm.submit();
</script>