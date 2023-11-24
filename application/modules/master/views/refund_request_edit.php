 <?php $this->load->view('include/userAction');  ?>
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_refund_request/update" method="POST" class="row g-3">
    <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
  <div class="col-md-4">
        <label for="" class="form-label">Transaction ID </label>
        <input type="text" name="transaction_id" class="form-control" value="<?php echo $row[0]->transaction_id; ?>" readonly> 
  </div>
  <div class="col-md-4">
   <label for="" class="form-label">Transaction Date </label>
   <input type="date" name="transaction_date" class="form-control"  value="<?php echo $row[0]->transaction_date; ?>" readonly> 
   </div>
   <div class="col-md-4">
        <label for="" class="form-label">Amount</label>
        <input type="number" name="amount" class="form-control" value="<?php echo $row[0]->amount;?>" readonly>
  </div>
  
  <div class="col-md-12">
        <label for="" class="form-label">Remark </label>
        <textarea  name="remarks" class="form-control" readonly><?php echo $row[0]->remarks; ?> </textarea> 
  </div>
    <div class="col-md-4">
        <label for="" class="form-label">Status</label>
        <input type="hidden" id="status" class="form-control" value="<?php echo $row[0]->status;?>">
        <select name="status" id="test" class="form-control input-sm" onchange="showDiv(this.value)">
            <option value="">Status</option>
            <option value="Pending" <?php if($row[0]->status=='Pending'){ echo'selected'; } ?>>Pending</option>
            <option value="In Progress" <?php if($row[0]->status=='In Progress'){ echo'selected'; } ?>>In Progress</option>
            <option value="Completed" <?php if($row[0]->status=='Completed'){ echo'selected'; } ?>>Completed</option>
            <option value="Cancelled" <?php if($row[0]->status=='Cancelled'){ echo'selected'; } ?>>Cancelled</option>
        </select>
    </div>
   
    <div id="hidden_div" style="display:none;" class="col-md-4">
        <label for="" class="form-label">Remark </label>
         <input type="text" name="superadminremarks"class="form-control" placeholder="Remarks" value="<?php echo $row[0]->superadminremarks;?>">
    </div>
    <div id="hidden_div2" class="row" style="display:none"> 
        <div class="col-md-4">
                <label for="" class="form-label">Transaction ID </label>
                <input type="text" name="superadmintransaction_id" class="form-control" value="<?php echo $row[0]->superadmintransaction_id; ?>"> 
          </div>
          <div class="col-md-4">
           <label for="" class="form-label">Transaction Date </label>
           <input type="date" name="superadmintransaction_date" class="form-control"  value="<?php echo $row[0]->superadmintransaction_date; ?>"> 
           </div>
           <div class="col-md-4">
                <label for="" class="form-label">Amount</label>
                <input type="number" name="superadminamount" class="form-control" value="<?php echo $row[0]->superadminamount;?>">
          </div>
           <div class="col-md-4">
                <label for="" class="form-label">Refund Chargers</label>
                <input type="number" name="superadminrefundchagers" class="form-control" value="<?php echo $row[0]->superadminrefundchagers;?>">
          </div>
    </div>
  <div class="col-12">
        <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
  </div>
</form>


<script type="text/javascript">
$( document ).ready(function() {
    var status = $('#status').val();
   showDiv(status);
});
function showDiv(val){
   if(val=='Cancelled'){
    $('#hidden_div').show();
    $('#hidden_div2').hide();
   } else{
       if(val=='Completed'){
            $('#hidden_div2').show();
            $('#hidden_div').show();
       }else{
         $('#hidden_div').hide(); 
         $('#hidden_div2').hide();
       }
   }
} 
</script>






