 <?php $this->load->view('include/userAction');  ?>
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_merchant_wallet/update" method="POST" class="row g-3">
    <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
 
         <div class="col-md-4">
                        <label for="" class="form-label">Merchant</label>
                        <select class="form-control" name="merchant_id">
                         <option value="">Select Merchant</option>
                            <?php 
                    $merchants = $this->Common->getMerchantName();
    			    foreach($merchants as $merchantrow){
    			    $merchantMobile = $merchantrow->mobile;
    			    $name = $merchantrow->name;
    			    $first_name = $merchantrow->first_name;
    			    $last_name = $merchantrow->last_name;
    			    if(!empty($name)){
                          $mname = $name;
                    }else{
                    $mname = $first_name.' '.$last_name;
                    }
                 
                             $amount = $this->Common->merchantSpotWallet($merchantrow->users_id);
                            ?>
                            <option value="<?php echo $merchantrow->users_id; ?>" <?php if($merchantrow->users_id==$row[0]->merchant_id) {echo 'selected';} ?>><?php echo $mname; ?>-<?php echo $merchantMobile;?>-<?php echo '(Spot '.$amount.')';?> </option>
                            <?php } ?>
                         </select>
                         </div>
 
 
  <div class="col-md-4">
   <label for="" class="form-label">Date </label>
   <input type="date" name="date" class="form-control"  value="<?php echo $row[0]->date; ?>"> 
   </div>
   <div class="col-md-4">
        <label for="" class="form-label">Amount</label>
        <input type="number" name="amount" class="form-control" value="<?php echo $row[0]->amount;?>">
  </div>
  
 
  <!--<div class="col-md-12">-->
  <!--      <label for="" class="form-label">Remark </label>-->
  <!--      <textarea  name="remarks" class="form-control" readonly><?php echo $row[0]->remarks; ?> </textarea> -->
  <!--</div>-->
    <!--<div class="col-md-4">-->
    <!--    <label for="" class="form-label">Status</label>-->
    <!--    <select name="status" id="select_id" class="form-control input-sm">-->
    <!--        <option value="">Status</option>-->
    <!--        <option value="Pending" <?php if($row[0]->status=='Pending'){ echo'selected'; } ?>>Pending</option>-->
    <!--        <option value="In Progress" <?php if($row[0]->status=='In Progress'){ echo'selected'; } ?>>In Progress</option>-->
    <!--        <option value="Completed" <?php if($row[0]->status=='Completed'){ echo'selected'; } ?>>Completed</option>-->
    <!--        <option value="Cancelled" <?php if($row[0]->status=='Cancelled'){ echo'selected'; } ?>>Cancelled</option>-->
    <!--    </select>-->
    <!--</div>-->
  <div class="col-12">
        <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
  </div>
</form>

<script>

$('#select_id').on('change', function()
{
    alert(this.value); //or alert($(this).val());
});

</script>







