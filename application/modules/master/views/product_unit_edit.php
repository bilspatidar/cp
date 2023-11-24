





 <?php $this->load->view('include/userAction');  ?>
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_product_unit/update" method="POST" class="row g-3" enctype="multipart/form-data">
          

                          <div class="col-md-4">
                    <label for="" class="form-label">Category</label>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>">
                    <input type="text" name="unit_name" class="form-control" id="pname2" value="<?php echo $row[0]->unit_name; ?>"> 
                          </div>
            
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Status</label>
                                
                                <select name="status" class="form-control input-sm"><option value="">Status</option><option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option><option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
                                
                                
                          </div>
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
</form>


<script>
        $('#metal_id1').on('change', function() {
  //  alert( this.value ); // or $(this).val()
  if(this.value == "1") {
    $('#change_carat1').show();
    $('#change_silver1').hide();
  } else if(this.value == "5") {
    $('#change_carat1').hide();
    $('#change_silver1').show();

  } 
  else{
    $('#change_carat1').hide();
      $('#change_silver1').hide();

  }
});
    </script>


 <script>

            function changeProductSet2(sel) {
    var fullName = sel.options[sel.selectedIndex].text;
    var nArray = fullName.split(',');
      $("#pname2").val(nArray[0]);
    $("#shortpname2").val(nArray[1]);
        }
    </script>


