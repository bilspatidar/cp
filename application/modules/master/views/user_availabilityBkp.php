




 
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
                        <div class="col-md-3">
                            <label for="" class="form-label">User</label>
                               <select class="form-control input-sm" name="users_id" id="filterOne">
                                   <option value="">Select User</option>
                                 <?php 
                                        $users = $this->Common->getUserName(4);
                                        foreach($users as $user){ ?>
                                        <option value="<?php echo $user->users_id; ?>"><?php echo $user->name; ?></option>
                                        <?php } ?>
                               </select>
                              </div>
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
                
<form id="crudForm" action="<?php echo base_url(); ?>master/add_user_availability/add" method="POST" class="row crudForm g-3">
                          
                           <div class="col-md-4">
                                <label for="" class="form-label">User</label>
                               <select class="form-control" name="users_id">
                                   <option value="">Select User</option>
                                 <?php 
                                        $users = $this->Common->getUserName(4);
                                        foreach($users as $user){ ?>
                                        <option value="<?php echo $user->users_id; ?>"><?php echo $user->name; ?></option>
                                        <?php } ?>
                               </select>
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Day</label>
                               <select class="form-control" name="day">
                                   <option value="">Select Day</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                               </select>
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">From Time</label>
                               <input type="time" class="form-control" name="from_time">
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label">To Time</label>
                               <input type="time" class="form-control" name="to_time">
                          </div>
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
                </form>
              
              
                </div>
               
              </div><!-- End Default Tabs -->

            </div>
          </div>





 