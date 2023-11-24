


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
                       <div class="col-md-3"> <lable>Status</lable> <select id="filterTwo" class="form-control input-sm"><option value="">Status</option><option value="Active">Active</option><option value="Deactive">Deactive</option></select> </div>
                       <div class="col-md-3"> <lable>Show Deleted</lable> <select id="filterThree" class="form-control input-sm"><option value="0">No</option><option value="1">Yes</option></select> </div>  
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
                
<form id="crudForm" action="<?php echo base_url(); ?>master/add_course/add" method="POST" class="row crudForm g-3">
                          
                          <div class="col-md-4">
                              <label for="" class="form-label">Category Name</label>
                                <select class="form-control select2" name="course_category_id" style="width:100%">
                                    <option value="">select</option>
                                        <?php 
                                        $categories = $this->Common->getCourseCategory();
                                        foreach($categories as $category){ ?>
                                        <option value ="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                        <?php } ?>
                                        
                                     </select>
                              
                          </div>
                            <div class="col-md-8">
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
                                <label for="" class="form-label">Learn from Pre-recorded Sessions</label>
                                <input type="number" name="course_fee" step="any" class="form-control"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label">Learn in a Batch</label>
                                <input type="number" name="course_fee_online" step="any" class="form-control"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label">Learn in Personalized Sessions</label>
                                <input type="number" name="personal_price" step="any" class="form-control"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label">Course Discount (In Percentage)</label>
                                <input type="number" name="discount" step="any" class="form-control"> 
                          </div>
                           <div class="col-md-4">
                                <label for="" class="form-label">Number Of Session</label>
                                <input type="number" name="number_of_session" class="form-control"> 
                          </div>
                          
                            <div class="col-md-4">
                                <label for="" class="form-label">Duration (In Days)</label>
                                <input type="number" name="duration" class="form-control"> 
                          </div>
                          
                        <div class="col-md-4">
                                <label for="" class="form-label">Study Material Validity (In Days)</label>
                                <input type="number" name="study_material_validity" class="form-control"> 
                          </div>
              
                         
                          <div class="col-md-4">
                                <label for="" class="form-label">Image</label>
                                <input type="hidden" name="image">
                                <input type="file" name="image" class="form-control"> 
                          </div>
    
                            <div class="col-md-12">
                                <label for="" class="form-label">Description</label>
                                <textarea type="text"  name="description" class="form-control summernote"> </textarea>
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
      $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 5',
        tabsize: 2,
        height: 100
      });
    </script>






