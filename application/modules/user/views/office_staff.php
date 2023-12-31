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
                
                 <form id="crudForm" action="<?php echo base_url(); ?>user/add_office_staff/add" method="POST" class="row crudForm g-3">
                         <input type="hidden" name="role_id" value="4">
                         
                         
                         
                         <div class="col-md-4">
                              <label for="" class="form-label">State Name</label>
                                <select class="form-control select2" name="state_id" style="width:100%" onChange="getStateAdmin(this.value)">
                                    <option value="">select</option>
                                        <?php 
                                        $states = $this->Common->getState();
                                        foreach($states as $state){ ?>
                                        <option value ="<?php echo $state->id; ?>"><?php echo $state->name; ?></option>
                                        <?php } ?>
                                        
                                     </select>
                              
                          </div>
                          
                           <div class="col-md-4">
                              <label for="" class="form-label">State Admin Name</label>
                                <select class="form-control select2" name="parent_id" style="width:100%" id="states_admin_html">
                                    <option value="">Select</option>
                                        
                                        
                                     </select>
                              
                          </div>
                         
                         
                         
                         
                         
                                <div class="col-md-4">
                                <label for="" class="form-label"> Name</label>
                                <input type="text" name="name" class="form-control"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label"> Email</label>
                                <input type="email" name="email" class="form-control"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label"> Mobile</label>
                                <input type="number" name="mobile" class="form-control"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label"> Password</label>
                                <input type="text" name="password" class="form-control"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label"> Confirm Password</label>
                                <input type="password" name="cPassword" class="form-control"> 
                          </div>
                          
                           <div class="col-md-4">
                                <label for="" class="form-label">Photo</label>
                                <input type="hidden" name="profile_pic">
                                <input type="file" name="profile_pic" class="form-control"> 
                          </div>
                           <div class="col-md-4">
                                <label for="" class="form-label">ID Proof</label>
                                <input type="hidden" name="id_card">
                                <input type="file" name="id_card" class="form-control"> 
                          </div>
                          <div class="col-md-12">
                                <label for="" class="form-label"> Address</label>
                                <textarea type="text" name="address" class="form-control"> </textarea>
                          </div>
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
                </form>
              
              
                </div>
               
              </div><!-- End Default Tabs -->

            </div>
          </div>


