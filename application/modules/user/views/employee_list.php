 <div class="card">
            <div class="card-body">
             
      
      <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
               
                <!--<li class="nav-item" role="presentation">-->
                <!--  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Add New</button>-->
                <!--</li>-->
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                 <div class="tab-pane fade show active session_views" id="home" role="tabpanel" aria-labelledby="home-tab">
                   <form class="form-inline filterForm">
                       <div div class="row">
                        <!--<div class="col-md-3"> <lable>Category</lable><select type="hidden" class="form-control input-sm" id="filterOne">-->
                        <!--             <option value="">Select Category</option>-->
                        <!--                php -->
                        <!--                $categories = $this->Common->getProductCategory();-->
                        <!--                foreach($categories as $category){ ?>-->
                        <!--                <option value="<?php echo $category->product_category_id; ?>" required><?php echo $category->name; ?></option>-->
                        <!--                php } ?>-->
                        <!--             </select> </div>-->
                       
                       <!--<div class="col-md-2"><lable><br></lable><button class="btn btn-outline-primary" type="button" onClick="loadTableData(1)">SEARCH</button></div></div></form>-->
                   
                   
                   <p>
			<div id="pageNumber" style="display:none;"></div>
                          
                               <div class="table-responsive" id="loadTableData">
                                   
                                   <h3>Data is loading please wait..   <i class="fa fa-refresh fa-spin"></i> </h3>
                               </div>
                               <div align="right" id="paginationLink"></div>
                                          
						       
                      
                                           
                                       </p>
                                       
                                       
                                       
                </div>
                
               
              </div><!-- End Default Tabs -->

            </div>
          </div>

<?php if(isset($edit_modal) && !empty($edit_modal)){ 
$edit_url    = base_url().'user/edit_form/edit_users/users/users_id/'.$id;

?>

<script>
    $(document).ready(function() {
        var id = <?php echo $id?>;
        var edit_url = '<?php echo $edit_url;?>';
      
        edit_modal(id);
      function edit_modal(id){

     $("#ExtralargeEditModal .modal-body").html('Loading');
     var get_link = edit_url;
     $.ajax({
         type: "POST",     
         url: get_link,
          success: function(msg) {
         $("#ExtralargeEditModal .modal-body").html(msg);
         
          var state_id_model = $("#state_id_model").val();
getCityModal(state_id_model);
        }               
    });  
     $("#ExtralargeEditModal").modal('show');
   
}
});
</script>
<?php } ?>