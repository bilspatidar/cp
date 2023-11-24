 <section class="section profile">
     
     
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
   <?php 
                             $File = $row[0]->profile_pic;
		   
                    		if(!empty($File))
                    		{ 
                    	        $load_url = 'uploads/users/'.$File;
                    			if(file_exists($load_url))
                    			{
                    		   $url = base_url().$load_url;			
                    			}
                    			else
                    			{
                    			$url = base_url().'uploads/no_file.jpg';		
                    			}
                    			
                                $fileData = "<a href='$url' target='_blank'>File</a>";			
                    		}
                    		else
                    		{
                    		$url = base_url().'uploads/no_file.jpg';
                    		$fileData = '';
                    		}
                              ?>
              <img src="<?= $url;?>" alt="Profile" class="rounded-circle"  style="height:85px;width:85px;border-radius:50%;">
             
              <h2 class="m-1" ><?php echo $row[0]->name;?></h2>
              
               <?php
             $roleName = $this->Common->get_col_by_key('user_role','id',$row[0]->role_id,'name');
             
                  ?>
              <h3><?php echo $roleName;?></h3>
             
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                 
                  <h5 class="card-title">Profile Details</h5>
            <form id="crudForm" action="<?php echo base_url(); ?>user/add_my_profile/update" method="POST" class="row g-3">
          <input type="hidden" name="users_id" class=" col-md-6 form-control"value="<?php echo $row[0]->users_id;?>">
         
          
          
                  <div class="input-group input-group-sm mb-3">
                    <div class="col-lg-3 col-md-4 label input-group-text ">Full Name</div>
                   <input type="text" name="name" class=" col-md-6 form-control" value="<?php echo $row[0]->name;?>">
                  </div>
                  
               <!--<div class="input-group input-group-sm mb-3">-->
               <!--     <div class="col-lg-3 col-md-4 label input-group-text ">Company</div>-->
               <!--    <input type="text"  class=" col-md-6 form-control" value="<?php echo BRAND_NAME;?>">-->
               <!--   </div>-->
                  
                   <div class="input-group input-group-sm mb-3">
                    <div class="col-lg-3 col-md-4 label input-group-text ">Address</div>
                   <input type="text" name="address" class=" col-md-6 form-control"value="<?php echo $row[0]->address;?>">
                  </div>
                 
                 <div class="input-group input-group-sm mb-3">
                    <div class="col-lg-3 col-md-4 label input-group-text ">Mobile</div>
                   <input type="text" name="mobile" class=" col-md-6 form-control"value="<?php echo $row[0]->mobile;?>">
                  </div>
                    
                    
                 <div class="input-group input-group-sm mb-3">
                    <div class="col-lg-3 col-md-4 label input-group-text ">Email</div>
                   <input type="text" name="email" class=" col-md-6 form-control"value="<?php echo $row[0]->email;?>">
                  </div>

                                 <div class="input-group input-group-sm mb-3">
                       
                    <div class="col-lg-3 col-md-4 label input-group-text ">Image</div>
                   <input type="file" name="profile_pic" class=" col-md-6 form-control">
                                     <input type="hidden" name="profile_pic">

                  </div>
                  

                    <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
                          </form>

                </div>

             <!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      <?php ?>
      </div>
    
    </section>