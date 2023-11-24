<?php //$this->load->view('include/userAction');  ?>
<form id="crudFormEdit" action="<?php echo base_url(); ?>user/add_manage_user/update" method="POST" class="row g-3">

    <div class="col-md-4">
        <label for="" class="form-label">Full Name</label>
    <input type="hidden" name="users_id" class="form-control" value="<?php echo $row[0]->users_id; ?>">
        <input type="text" name="name" class="form-control" value="<?php echo $row[0]->name; ?>">
    </div>
    <div class="col-md-4">
        <label for="" class="form-label">Mobile No.</label>
        <input type="number" name="mobile" class="form-control phone" value="<?php echo $row[0]->mobile; ?>">
    </div>
    <div class="col-md-4">
        <label for="" class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" value="<?php echo $row[0]->email; ?>">
    </div>
    
    <div class="col-md-4">
        <label for="" class="form-label">Status</label>
        <select name="status" class="form-control input-sm"><option value="">Status</option><option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option><option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
    </div>
    <div class="col-md-4">
        <label for="" class="form-label">change Password <input type="checkbox" name="check" value="1"></label>
         <input type="password" name="password" class="form-control">
    </div>
    <div class="col-12">
        <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
    </div>
</form>
<script>
    $(".phone").keydown(function(event) {
  k = event.which;
 if(event.keyCode == 69){
     return false;
 }
    if ($(this).val().length == 10 ) {
      if (k == 8) {
        return true;
      } else {
        event.preventDefault();
        return false;
      }
    }
});
</script>