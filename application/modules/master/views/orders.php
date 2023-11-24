<div class="card">
    <div class="card-body">
        <div class="tab-content pt-2" id="myTabContent">
            <div class="tab-pane fade show active session_views" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form class="form-inline filterForm">
                   <div div class="row">
                    <div class="col-md-3" style="z-index: 999;"><lable> Customer Name</lable>
                       <select class="form-control input-sm" id="filterOne">
                         <option value="">Select Customer </option>
                            <?php 
                            $getCustomers = $this->Common->getOrderCustomer();
                            foreach($getCustomers as $customer){ ?>
                            <option value="<?php echo $customer->users_id; ?>"><?php echo $customer->name; ?></option>
                            <?php } ?>
                            
                         </select>
                     </div>
					 <div class="col-md-3" style="z-index: 999;"><lable> Seller Name</lable>
                       <select class="form-control input-sm" id="filterSix">
                         <option value="">Select Seller </option>
                            <?php 
                            $getSeller = $this->Common->getSeller();
                            foreach($getSeller as $seller){
									$businessName= $seller->businessName;
									if(!empty($businessName)){
									$name = $businessName;
									}else{
										$name = $seller->name;
									}
								?>
                            <option value="<?php echo $seller->users_id; ?>"><?php echo $name; ?></option>
                            <?php } ?>
                            
                         </select>
                     </div>
                     <div class="col-md-3"> <lable>Product Name / Order No</lable> <input type="text" id="filterTwo" class="form-control input-sm"> </div>
                     <div class="col-md-3"> <lable>From Date</lable> <input type="date" id="filterFour" class="form-control input-sm"> </div>
                     <div class="col-md-3"> <lable>To Date</lable> <input type="date" id="filterFive" class="form-control input-sm"> </div>
                   <div class="col-md-3" style="z-index: 999;"> <lable>Status</lable> 
                   <select id="filterThree" class="form-control input-sm"><option value="">Status</option>
                   <?php $orderStatus = $this->Common->getOrderStatusData();
                   foreach($orderStatus as $status){
                   ?>
                   <option value="<?php echo $status->id;?>"><?php echo $status->name;?></option>
                   <?php } ?>
                   </select> </div>
				   <div class="col-md-3" style="z-index: 999;"><lable>Payment Status</lable>
                       <select class="form-control input-sm" id="filterSeven">
                         <option value="">Select</option>
						 <option value="paid">Paid</option>
						 <option value="unpaid">Unpaid</option>
                            
                         </select>
                     </div>
                   <div class="col-md-2"><lable><br></lable>
                   <button class="btn btn-outline-primary" type="button" onClick="loadTableData(1)">SEARCH</button>
                   </div></div>
                </form>
               
               
               <p>
                   <div id="pageNumber" style="display:none;"></div>
                   <div class="table-responsive" id="loadTableData">
                   <h3>Data is loading please wait..   <i class="fa fa-refresh fa-spin"></i> </h3>
                    </div>
                    <div align="right" id="paginationLink"></div>
                </p>
            </div>   
        </div>
    </div>
</div>
