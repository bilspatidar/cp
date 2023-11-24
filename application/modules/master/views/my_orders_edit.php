<?php 
$added = $this->Common->trackOrder($row[0]->order_item_id,'added');
$addedBy = $this->Common->trackOrder($row[0]->order_item_id,'addedBy');
$updated = $this->Common->trackOrder($row[0]->order_item_id,'updated');
$updatedBy = $this->Common->trackOrder($row[0]->order_item_id,'updatedBy');
?>
<div class="row userAction">
        <?php if($added!='0000-00-00 00:00:00'){ ?>
    <div class="col-md-3 col-xs-6">
Added <?php  echo getDateTimeFormat($added); ?>
    </div>
    
    <div class="col-md-3 col-xs-6">
        Added By <?php  echo getUserInfo('name',$addedBy); ?>
    </div>
    
    <?php } if($updated!='0000-00-00 00:00:00'){ ?>
    <div class="col-md-3 col-xs-6">
        Updated <?php echo getDateTimeFormat($updated); ?>
    </div>
    
        <div class="col-md-3 col-xs-6">
        Updated By <?php  echo  getUserInfo('name',$updatedBy); ?>
    </div>
    <?php } ?>
 </div>




 <?php echo $row[0]->order_status;
         $customerName = $this->Common->get_col_by_key('users','users_id',$row[0]->users_id,'name');
       ?>

 <form id="crudFormEdit" action="<?php echo base_url(); ?>transaction/add_orders/update" method="POST" class="row g-3">
    <input type="hidden" name="order_item_id" class="form-control" value="<?php echo $row[0]->order_item_id; ?>"> 
  <div class="col-md-4">
        <input type="hidden" name="users_id" class="form-control" value="<?php echo $row[0]->users_id; ?>"> 
  </div>
   <div class="col-md-4">
        <input type="hidden" name="order_id" class="form-control" value="<?php echo $row[0]->order_id;?>">
		
  </div>
  
  <div class="col-md-12">
        <label for="" class="form-label">Remark </label>
        <textarea name="remarks" class="form-control"><?php echo $row[0]->remarks ;?></textarea> 
  </div>
                    <div class="col-md-4"> <lable>Status</lable> 
                   <select class="form-control input-sm" name="status">
                       <option value="">Status</option>
                   <?php $orderStatus = $this->Common->getMyOrderStatusData();
                   foreach($orderStatus as $status){
                   ?>
    <option value="<?php echo $status->id;?>" <?php if($status->id==$row[0]->status){echo 'selected';} ?>><?php echo $status->name;?></option>
                   <?php } ?>
                   </select> </div> 
				   
        <div class="col-12">
        <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
  </div>
</form>
<script>
$(document).ready(function() {
  $('.summernote').summernote();
});
</script>


