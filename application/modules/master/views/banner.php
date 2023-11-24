	
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
                       <div class="col-md-3" style="z-index: 999;"><lable>Status</lable> <select id="filterTwo" class="form-control input-sm"><option value="">Status</option><option value="Active">Active</option><option value="Deactive">Deactive</option></select> </div>
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
                
                 <form id="crudForm" action="<?php echo base_url(); ?>master/add_banner/add" method="POST" class="row crudForm g-3" enctype="multipart/form-data">
		   
									<div class="col-md-4">
                           <label for="" class="form-label">Link</label>
						   <input type="text" name="link" class="form-control">
							</div>
						<div class="col-md-4">
                           <label for="" class="form-label">Area</label>
						   <select name="area" class="form-control" onchange="showDivVertical(this.value)">
                       <option value="">Select Area</option>
					   <option value="slider">Slider</option>
                       <option value="full_width">Full Width</option>
						</select>                         
						 </div>
		   
                <div class="col-md-4">
							<label for="" class="form-label">Image</label>
							<span class="text-danger sliderShow" style="display:none;">Image Size 1000*1080</span>
							<span class="text-danger full_widthShow" style="display:none;">Image Size 944*250</span>
							<input type="file" name="image" class="form-control" id="cover"> 
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

function showDivVertical(val){
   if(val=='slider'){
    $('.sliderShow').show();
    $('.full_widthShow').hide();
   } else{
       if(val=='full_width'){
       $('.full_widthShow').show();
        $('.sliderShow').hide();
       }else{
       $('.full_widthShow').hide();
       $('.sliderShow').hide();
       }
   }
}


</script>
