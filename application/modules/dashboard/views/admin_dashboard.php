 <?php 
 $today = date('Y-m-d');
 $yesterday = date('Y-m-d',strtotime("-1 days"));
 $thismonth = date('Y-m');
 $lastmonth = date('Y-m',strtotime("-1 month"));
 $users_id = getUser('users_id');
 $sellerUsers = $this->Common->getAdminSeller($users_id);
 ?>

 <style>
 
.bg-c-blue{
	background-color: #0078d0;
  border: 0;	
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: system-ui,-apple-system,system-ui,"Segoe UI",Roboto,Ubuntu,"Helvetica Neue",sans-serif;
  font-size: 18px;
  font-weight: 600;
  outline: 0;
  padding: 16px 21px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: all .3s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width:100%
}
 .bg-c-blue:before {
	 background-color: initial;
  background-image: linear-gradient(#fff 0, rgba(255, 255, 255, 0) 100%);
  content: "";
  height: 50%;
  left: 0%;
  opacity: .5;
  position: absolute;
  top: 0;
  transition: all .3s;
  width: 100%;
}

.bg-c-green {
   /* background: linear-gradient(45deg,#2ed8b6,#59e0c5); */
   background-image: linear-gradient(rgba(179, 132, 201, .84), rgba(57, 31, 91, .84) 50%);
   /*background-image: linear-gradient(#37ADB2, #329CA0);*/
	border: 0;	
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: system-ui,-apple-system,system-ui,"Segoe UI",Roboto,Ubuntu,"Helvetica Neue",sans-serif;
  font-size: 18px;
  font-weight: 600;
  outline: 0;
  padding: 16px 21px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: all .3s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width:100%
}
.bg-c-green:before {
	 background-color: initial;
  background-image: linear-gradient(#fff 0, rgba(255, 255, 255, 0) 100%);
  content: "";
  height: 50%;
  left: 0%;
  opacity: .5;
  position: absolute;
  top: 0;
  transition: all .3s;
  width: 100%;
}
.bg-c-yellow {
    /* background: linear-gradient(45deg,#FFB64D,#ffcb80); */
	background-image: linear-gradient(135deg, #f34079 40%, #fc894d);
	border: 0;	
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: system-ui,-apple-system,system-ui,"Segoe UI",Roboto,Ubuntu,"Helvetica Neue",sans-serif;
  font-size: 18px;
  font-weight: 600;
  outline: 0;
  padding: 16px 21px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: all .3s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width:100%
}
.bg-c-yellow:before {
	 background-color: initial;
  background-image: linear-gradient(#fff 0, rgba(255, 255, 255, 0) 100%);
  content: "";
  height: 50%;
  left: 0%;
  opacity: .5;
  position: absolute;
  top: 0;
  transition: all .3s;
  width: 100%;
}
.bg-c-pink {
	/* background: linear-gradient(45deg,#FF5370,#ff869a); */
	background-image: radial-gradient(100% 100% at 100% 0, #5adaff 0, #5468ff 100%);
	border: 0;	
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: system-ui,-apple-system,system-ui,"Segoe UI",Roboto,Ubuntu,"Helvetica Neue",sans-serif;
  font-size: 18px;
  font-weight: 600;
  outline: 0;
  padding: 16px 21px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: all .3s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width:100%
}

.bg-c-pink:before {
	 background-color: initial;
  background-image: linear-gradient(#fff 0, rgba(255, 255, 255, 0) 100%);
  content: "";
  height: 50%;
  left: 0%;
  opacity: .5;
  position: absolute;
  top: 0;
  transition: all .3s;
  width: 100%;
}
.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
.bg-c-success{
	background:#28a745;
	border: 0;	
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: system-ui,-apple-system,system-ui,"Segoe UI",Roboto,Ubuntu,"Helvetica Neue",sans-serif;
  font-size: 18px;
  font-weight: 600;
  outline: 0;
  padding: 16px 21px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: all .3s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width:100%
}
.bg-c-success:before {
	 background-color: initial;
  background-image: linear-gradient(#fff 0, rgba(255, 255, 255, 0) 100%);
  content: "";
  height: 50%;
  left: 0%;
  opacity: .5;
  position: absolute;
  top: 0;
  transition: all .3s;
  width: 100%;
}
.bg-c-danger{
 background:#dc3545;
	border: 0;	
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: system-ui,-apple-system,system-ui,"Segoe UI",Roboto,Ubuntu,"Helvetica Neue",sans-serif;
  font-size: 17px;
  font-weight: 600;
  outline: 0;
  padding: 9px 28px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: all .3s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width:100%
}
.bg-c-danger:before {
	 background-color: initial;
  background-image: linear-gradient(#fff 0, rgba(255, 255, 255, 0) 100%);
  content: "";
  height: 50%;
  left: 0%;
  opacity: .5;
  position: absolute;
  top: 0;
  transition: all .3s;
  width: 100%;
}
.card-hover:hover{webkit-transform:translateY(-4px) scale(1.01);-moz-transform:translateY(-4px) scale(1.01);-ms-transform:translateY(-4px) scale(1.01);-o-transform:translateY(-4px) scale(1.01);-webkit-transform:translateY(-4px) scale(1.01);transform:translateY(-4px) scale(1.01);-webkit-box-shadow:0 14px 24px rgba(62, 57, 107, 0.1);box-shadow:0 14px 24px rgba(62, 57, 107, 0.1)}
 </style>
 <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
                    <!-- Column -->
                    <div class="col-md-2">
						<div class="card card-hover	 bg-c-blue z-depth-1 color-block text-center">
						<h5 class="card-title text-white">Sales <span class="text-white">| Today</span></h5>
							<h1 class="font-light text-white"><i class="bi bi-cart"></i></h1>
							<h6 class="text-white">
							<?php 
							$todayAmount =  $this->Common->todaySale($today,$sellerUsers);
							  if($todayAmount>0){
								  $todayAmt = number_format($todayAmount,2);
							  }else{
								  $todayAmt = 0;
							  }
							echo CURRENCY.' '.$todayAmt; ?>
							</h6>
						</div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-2">
						<div class="card card-hover bg-c-yellow text-center">
						<h5 class="card-title text-white">Sales <span class="text-white">| Month</span></h5>
							<h1 class="font-light text-white"><i class="bi bi-cart"></i></i></h1>
							<h6 class="text-white">
							<?php 
							$monthAmount =  $this->Common->monthSale($thismonth,$sellerUsers);
							  if($monthAmount>0){
								  $monthAmt = number_format($monthAmount,2);
							  }else{
								  $monthAmt = 0;
							  }
							echo CURRENCY.' '.$monthAmt; ?>
							</h6>
						</div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-2">
					
                        <div class="card card-hover bg-c-pink text-center">
							<h5 class="card-title text-white">Sales <span class="text-white">| Total</span></h5>
							<h1 class="font-light text-white"><i class="bi bi-cart"></i></i></h1>
							<h6 class="text-white">
							<?php 
							$totalSaleAll =  $this->Common->todaySaleAll($sellerUsers);
							  if($totalSaleAll>0){
								  $totalSaleAmt = number_format($totalSaleAll,2);
							  }else{
								  $totalSaleAmt = 0;
							  }
							echo CURRENCY.' '.$totalSaleAmt; ?>
							</h6>
                        </div>
						
                    </div>
					<div class="col-md-2">
					<a href="<?php echo base_url();?>seller/sellers">
						<div class="card card-hover bg-c-green text-center">
						<h5 class="card-title text-white">Seller <span class="text-white">| Total</span></h5>
							<h1 class="font-light text-white"><i class="bi bi-people"></i></i></h1>
							<h6 class="text-white">
							<?php 
								$this->db->select('users_id');
								$this->db->from('users');
								$this->db->where('user_type','seller');
								$this->db->where('addedBy',$users_id);
								echo $this->db->get()->num_rows();
							 ?>
							</h6>
						</div>
						</a>
                    </div>
					<div class="col-md-2">
					<a href="<?php echo base_url();?>seller/sellers">
						<div class="card card-hover bg-c-success text-center">
						<h5 class="card-title text-white">Seller <span class="text-white">| Active</span></h5>
							<h1 class="font-light text-white"><i class="bi bi-people"></i></i></h1>
							<h6 class="text-white">
							<?php 
								$this->db->select('users_id');
								$this->db->from('users');
								$this->db->where('user_type','seller');
								$this->db->where('status','Active');
								$this->db->where('addedBy',$users_id);
								echo $this->db->get()->num_rows();
							 ?>
							</h6>
						</div>
						</a>
                    </div>
					<div class="col-md-2">
					<a href="<?php echo base_url();?>seller/sellers">
						<div class="card card-hover bg-c-danger text-center">
						<h5 class="card-title text-white">Seller <span class="text-white">| Inactive</span></h5>
							<h1 class="font-light text-white"><i class="bi bi-people"></i></i></h1>
							<h6 class="text-white">
							<?php 
								$this->db->select('users_id');
								$this->db->from('users');
								$this->db->where('user_type','seller');
								 $this->db->where('status','Deactive');
								$this->db->where('addedBy',$users_id);
								echo $this->db->get()->num_rows();
							 ?>
							</h6>
						</div>
						</a>
                    </div>
                     <!-- Column -->
                    <!-- Column -->
					<?php $statusData = $this->Common->getOrderStatusData();
							foreach($statusData as $statusRes){
							?>
                    <div class="col-md-3">
						<div class="card bg-<?php echo $statusRes->color;?> text-center">
							<h5 class="font-light text-white pt-2"><?php echo $statusRes->name;?></h5>
							<h6 class="text-white"><?php echo  $this->Common->orderStatus($statusRes->id,$sellerUsers);?></h6>
						</div>
                    </div>
							<?php } ?>
                    <!-- Column -->
                    
                </div>
           </div>
           <!--chart-->
           <div class="col-lg-12">
               <div class="row">
               <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sales</h5>
               Bar Chart 
               <?php   
               $jan = date('Y-01');
               $feb = date('Y-02');
               $march = date('Y-03');
               $april = date('Y-04');
               $may = date('Y-05');
               $june = date('Y-06');
               $july = date('Y-07');
               $auguest = date('Y-08');
               $september = date('Y-09');
               $octomber = date('Y-10');
               $november = date('Y-11');
               $december = date('Y-12');
               $janAmount =  $this->Common->monthSale($jan,$sellerUsers);
               $febAmount =  $this->Common->monthSale($feb,$sellerUsers);
               $marchAmount =  $this->Common->monthSale($march,$sellerUsers);
               $aprilAmount =  $this->Common->monthSale($april,$sellerUsers);
               $mayAmount =  $this->Common->monthSale($may,$sellerUsers);
               $juneAmount =  $this->Common->monthSale($june,$sellerUsers);
               $julyAmount =  $this->Common->monthSale($july,$sellerUsers);
               $auguestAmount =  $this->Common->monthSale($auguest,$sellerUsers);
               $septemberAmount =  $this->Common->monthSale($september,$sellerUsers);
               $octomberAmount =  $this->Common->monthSale($octomber,$sellerUsers);
               $novemberAmount =  $this->Common->monthSale($november,$sellerUsers);
               $decemberAmount =  $this->Common->monthSale($december,$sellerUsers);
               ?>
              <canvas id="barChart" style="max-height:230px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#barChart'), {
                    type: 'bar',
                    data: {
                      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July',
                      'August', 'September', 'October', 'November', 'December'
                      ],
                      datasets: [{
                        label: 'Bar Chart',
                        data: [
                            <?=$janAmount;?>,
                            <?=$febAmount;?>,
                            <?=$marchAmount;?>,
                            <?=$aprilAmount;?>,
                            <?=$mayAmount;?>,
                            <?=$juneAmount;?>,
                            <?=$julyAmount;?>,
                            <?=$auguestAmount;?>,
                            <?=$septemberAmount;?>,
                            <?=$octomberAmount;?>,
                            <?=$novemberAmount;?>,
                            <?=$decemberAmount;?>
                            ],
                        backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(255, 159, 64, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                          'rgb(255, 99, 132)',
                          'rgb(255, 159, 64)',
                          'rgb(255, 205, 86)',
                          'rgb(75, 192, 192)',
                          'rgb(54, 162, 235)',
                          'rgb(153, 102, 255)',
                          'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
               End Bar CHart 

            </div>
          </div>
        </div>
                <div class="col-lg-6">
				
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Success Rate</h5>

               Pie Chart 
              <?php
              $success = 'Success';
              $failed = 'Failed';
              $inprogess = 'In Progress';
              $successData = 20;//$this->Common->orderStatus($success);
              $failedData = 20;//$this->Common->orderStatus($failed);
              $inprogessData =60; //$this->Common->orderStatus($inprogess);
              ?>
              <canvas id="pieChart" style="max-height:235px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#pieChart'), {
                    type: 'pie',
                    data: {
                      labels: [
                        'Failed',
                        'Success',
                        'In Progress'
                      ],
                      datasets: [{
                        label: 'My First Dataset',
                        data: [<?=$failedData;?>, <?=$successData;?>, <?=$inprogessData;?>],
                        backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
               End Pie CHart 

            </div>
          </div>
        </div>
         </div>
        </div>
           <!--chart end-->
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
               
                <div class="card-body">
                <h5 class="card-title">Recent Transaction</h5>
				
				<table class="table table-borderless datatable" >
                    <thead>
                        <tr>
                            <th scop='col'>Sr. No.</th>
                            <th scope="col"> Date</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Order No.</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $this->db->select("order_items.id,order_items.order_status,order_items.users_id,order_items.orderNo,order_items.seller_id,order_items.product_id,order_items.product_name,order_items.finalAmount,order_items.quantity,order_items.price,order_items.date_added");
                        $this->db->from("order_items");
						$this->db->where_in('order_items.seller_id',$sellerUsers);
                        $this->db->order_by('order_items.id','desc');
                        $this->db->limit(10);
                        $sr=1;
                        $sum=0;
	                    $result = $this->db->get()->result();
	                    foreach($result as $row){ 
						 $id          = $row->id;
						$status = $this->Common->fetchOrderStatus($id);
                    $merchantName = $this->Common->merchantName($row->users_id);
	                $netAmt = $row->quantity*$row->price;//$row->finalAmount;
		            $sum+=$netAmt;
					$orderDetailsUrl = base_url().'transaction/order_details/'.$id.'/'.$row->orderNo;
					$orderDetails = '<a href="'.$orderDetailsUrl.'">'.$row->orderNo.'</a>';
                    ?>
                    <tr>
                        <td><?php echo $sr++;?></td>
                        <td><?php echo getDateTimeFormat($row->date_added);?></td>
                        <td><?php echo $merchantName;?></a></td>
                        <td><?php echo $orderDetails;?></td>
                        <td><?php echo number_format($netAmt,2);?></td>
                        <td><?php echo $status;?></td>
                    </tr>
                    <?php } ?>
                    <tfoot>
                        <td colspan="4"><b>Total Amount</b></td>
                        <td colspan="2"><?php echo number_format($sum,2);?></td>
                    </tfoot>
                    </tbody>
                  </table>
                </div>
              </div> 
            </div><!-- End Recent Sales -->

            
          </div>
        </div>
        <!-- End Left side columns -->
      </div>
    </section>
