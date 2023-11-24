 



 <div class="card">
            <div class="card-body">
             
      
      <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">List</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Add New</button>
                </li>
               
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                 <div class="tab-pane fade show active session_views" id="home" role="tabpanel" aria-labelledby="home-tab">
                   <form class="form-inline filterForm">
                       <div div class="row">
                        <div class="col-md-3"> <lable>Name</lable> <input type="text" id="filterOne" class="form-control input-sm"> </div>
                       <div class="col-md-3" style="z-index: 999;"> <lable>Status</lable> <select id="filterTwo" class="form-control input-sm"><option value="">Status</option><option value="Active">Active</option><option value="Deactive">Deactive</option></select> </div>
                       <div class="col-md-3" style="z-index: 999;"> <lable>Show Deleted</lable> <select id="filterThree" class="form-control input-sm"><option value="0">No</option><option value="1">Yes</option></select> </div>  
                       <div class="col-md-2"><lable><br></lable><button class="btn btn-outline-primary" type="button" onClick="loadTableData(1)">SEARCH</button></div></div></form>
                   
                   
                   <p>
			<div id="pageNumber" style="display:none;"></div>
                          
                               <div class="table-responsive" id="loadTableData">
                                   
                                   <h3>Data is loading please wait..   <i class="fa fa-refresh fa-spin"></i> </h3>
                               </div>
                               <div align="right" id="paginationLink"></div>
                </p>
                  </div>
                <div class="tab-pane fade session_adds" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                
                 <form id="crudForm" action="<?php echo base_url(); ?>master/add_service/add" method="POST" class="row crudForm g-3" enctype="multipart/form-data">
                                         
                             <div class="col-md-4">
                                <label for="" class="form-label">Service Category</label>
                                <select class="form-control select2" name="service_category_id[]" style="width:100%" required multiple onChange="getSerSubCategory(this.value)" >
                                       <option value="">Select Category</option>
                                        <?php 
                                        $Srcategories = $this->Common->getServiceCategory();
                                        foreach($Srcategories as $Scategory){ ?>
                                        <option value="<?php echo $Scategory->services_categories_id; ?>"><?php echo $Scategory->name; ?></option>
                                        <?php } ?>
                                     </select>
                                     </div>
                                     
                                      <div class="col-md-4">
                                <label for="" class="form-label">Service Sub Category</label>
                                <select class="form-control" name="service_sub_category_id" id="sersubcategory_html" style="width:100%" required multiple>
                                     </select>
                                     </div>
                          
                           
                                <div class="col-md-4">
                                <label for="" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control"> 
                                </div>
                                
                                 <div class="col-md-4">
                                <label for="" class="form-label">Tax</label>
                                <select  class="form-control" name="tax">
							    <option value="">Select Tax</option>
							    
							       <?php 
                                        $taxes = $this->Common->getTax();
                                        foreach($taxes as $tax){ ?>
                                        <option value="<?php echo $tax->tax; ?>"><?php echo $tax->tax; ?> %</option>
                                        <?php } ?>
							   
							    </select>
					        
						</div>
                                
                                <div class="col-md-4">
                                <label for="" class="form-label">Price</label>
                                <input type="number" name="price" class="form-control"> 
                                </div>
                          
                            <div class="col-md-4">
                                <label for="" class="form-label">Time ( Minute )</label>
                                <input type="number" name="time" class="form-control"> 
                                </div>
                                
                                 <div class="col-md-4">
                                <label for="" class="form-label">Buffer Time ( Minute )</label>
                                <input type="number" name="buffer_time" class="form-control"> 
                                </div>
                                
                          <div class="col-md-12">
                                <label for="" class="form-label">Service Keyword(keyword one,keyword two,..........keyword n)</label>
                                <input type="text" name="service_keyword" class="form-control"> 
                          </div>
                          
                          <div class="col-md-12">
                                <label for="" class="form-label">Short Description</label>
                                <textarea type="text" name="short_description" class="form-control"></textarea>
                          </div>
                          
                          <div class="col-md-12">
                                <label for="" class="form-label">Long Description</label>
                                <textarea type="text" name="long_description" class="form-control summernote"></textarea>
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Service Image1</label>
                                <input type="hidden" name="image">
                                <input type="file" name="image" class="form-control"> 
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Service Image2</label>
                                <input type="hidden" name="image1">
                                <input type="file" name="image1" class="form-control">
                          </div>
                                
                                 <div class="col-md-4">
                                <label for="" class="form-label">Service Image3</label>
                                <input type="hidden" name="image2">
                                <input type="file" name="image2" class="form-control">
                          </div>
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
                </form>
              
              
                </div>
               
              </div><!-- End Default Tabs -->

            </div>
          </div>


    <script>
    var timepicker = new TimePicker('time', {
  lang: 'en',
  theme: 'dark'
});
timepicker.on('change', function(evt) {
  
  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

});
        $('#metal_id').on('change', function() {
  //  alert( this.value ); // or $(this).val()
  if(this.value == "1") {
    $('#change_carat').show();
    $('#change_silver').hide();
  } else if(this.value == "5") {
    $('#change_carat').hide();
    $('#change_silver').show();

  } 
  else{
    $('#change_carat').hide();
      $('#change_silver').hide();

  }
});
    </script>
    
    
    <script>

            function changeProductSet(sel) {
    var fullName = sel.options[sel.selectedIndex].text;
    var nArray = fullName.split(',');
      $("#pname").val(nArray[0]);
    $("#shortpname").val(nArray[1]);
        }
    </script>
 


