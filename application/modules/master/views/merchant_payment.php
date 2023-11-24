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
               
              </ul><br>
              <div class="tab-content pt-2" id="myTabContent">
                 <div class="tab-pane fade show active session_views" id="home" role="tabpanel" aria-labelledby="home-tab">
                   <form class="form-inline filterForm">
                       <div div class="row">
                           <div class="col-md-3"> <lable>Txn Id</lable> <input type="text" id="filterTwo" class="form-control input-sm"> </div>
                    <div class="col-md-3"> <lable>From Date</lable> <input type="date" id="filterFive" class="form-control input-sm"> </div>
                       <div class="col-md-3"> <lable>To Date</lable> <input type="date" id="filterFour" class="form-control input-sm"> </div>
                           <div class="col-md-3"> <lable>Merchant</lable><select class="form-control input-sm" id="filterOne">
                                     <option value="">Select Merchant</option>
                                        <?php 
                    			    $merchants = $this->Common->getMerchantName();
                    			    foreach($merchants as $merchantrow){
                    			    $name = $merchantrow->name;
                    			    $first_name = $merchantrow->first_name;
                    			    $last_name = $merchantrow->last_name;
                    			    if(!empty($name)){
                                          $mname = $name;
                                    }else{
                                    $mname = $first_name.' '.$last_name;
                                    }
                                    ?>
                    			    <option value="<?php echo $merchantrow->users_id; ?>"> <?php  echo $mname ;?></option>
                    			    <?php } ?>
                                     </select> </div>
                          
                        <!--<div class="col-md-3"> <lable>Name</lable> <input type="text" id="filterOne" class="form-control input-sm"> </div>-->
                       <!--<div class="col-md-3"> <lable>Status</lable> -->
                       <!--<select id="filterTwo" class="form-control input-sm"><option value="">Status</option>-->
                       <!--<option value="Pending">Pending</option><option value="In Progress">In Progress</option>-->
                       <!--<option value="Completed">Completed</option><option value="Cancelled">Cancelled</option>-->
                       <!--</select> </div>-->
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
                
                 <form id="crudForm" action="<?php echo base_url(); ?>master/add_merchant_payment/add" method="POST" class="row crudForm g-3">
                          
                           <div class="col-md-4">
                        <label for="" class="form-label">Merchant</label>
                        <select class="form-control" name="merchant_id">
                         <option value="">Select Merchant</option>
                            <?php 
                            
                                    $merchants = $this->Common->getMerchantName();
                    			    foreach($merchants as $merchantrow){
                    			    $merchantMobile = $merchantrow->mobile;
                    			    $name = $merchantrow->name;
                    			    $first_name = $merchantrow->first_name;
                    			    $last_name = $merchantrow->last_name;
                    			    if(!empty($name)){
                                          $mname = $name;
                                    }else{
                                    $mname = $first_name.' '.$last_name;
                                    }
                            
                            $amount = $this->Common->merchantWallet($merchantrow->users_id);
                            ?>
                            <option value="<?php echo $merchantrow->users_id; ?>" required><?php echo $mname; ?>-<?php echo $merchantMobile;?>-<?php echo '( Wallet '.$amount.')' ;?> </option>
                            <?php } ?>
                         </select>
                         </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Transaction ID </label>
                                <input type="text" name="transaction_id" class="form-control"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label">Transaction Date </label>
                                <input type="date" name="transaction_date" class="form-control"> 
                          </div>
                           <div class="col-md-4">
                                <label for="" class="form-label">Amount</label>
                                <input type="number" name="amount" class="form-control">
                          </div>
                           <div class="col-md-4">
                        <label for="" class="form-label">Currency</label>
                        <select class="form-control" name="currency_id">
                         <option value="">Select Currency</option>
                            <?php 
                            $Currencys = $this->Common->getCurrency();
                            foreach($Currencys as $Currency){ 
                            //$amount = $this->Common->merchantWallet($merchant->users_id);
                            ?>
                            <option value="<?php echo $Currency->id; ?>" required>
                                <?php echo $Currency->currency_name; ?>-<?php echo $Currency->currency_code ;?>
                                </option>
                            <?php } ?>
                         </select>
                         </div>
                          
                         <div class="col-md-4">
                                <label for="" class="form-label">Currency Rate</label>
                                <input type="number" name="currency_rate" class="form-control">
                          </div>
                        
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
                </form>
              
              
                </div>
               
              </div><!-- End Default Tabs -->

            </div>
          </div>


