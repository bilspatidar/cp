 <?php 
 $today = date('Y-m-d');
 $yesterday = date('Y-m-d',strtotime("-1 days"));
 $thismonth = date('Y-m');
 $lastmonth = date('Y-m',strtotime("-1 month"));
 $users_id = getUser('users_id');
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
.card-hover:hover{webkit-transform:translateY(-4px) scale(1.01);-moz-transform:translateY(-4px) scale(1.01);-ms-transform:translateY(-4px) scale(1.01);-o-transform:translateY(-4px) scale(1.01);-webkit-transform:translateY(-4px) scale(1.01);transform:translateY(-4px) scale(1.01);-webkit-box-shadow:0 14px 24px rgba(62, 57, 107, 0.1);box-shadow:0 14px 24px rgba(62, 57, 107, 0.1)}
 </style>
 <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
                    <!-- Column -->
                    <div class="col-md-3 col-lg-3 col-xlg-3">
						<div class="card card-hover	 bg-c-blue z-depth-1 color-block text-center">
						<h5 class="card-title text-white">Sales <span class="text-white">| Today</span></h5>
							<h1 class="font-light text-white"><i class="bi bi-cart"></i></h1>
							<h6 class="text-white">
							<?php 
							$todayAmount =  $this->Common->todaySale($today,$users_id);
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
                    <div class="col-md-3 col-lg-3 col-xlg-3">
						<div class="card card-hover bg-c-green text-center">
						<h5 class="card-title text-white">Sales <span class="text-white">| Yesterday</span></h5>
							<h1 class="font-light text-white"><i class="bi bi-cart"></i></i></h1>
							<h6 class="text-white">
							<?php 
							$yesterdayAmount =  $this->Common->todaySale($yesterday,$users_id);
							  if($yesterdayAmount>0){
								  $yesterdayAmt = number_format($yesterdayAmount,2);
							  }else{
								  $yesterdayAmt = 0;
							  }
							echo CURRENCY.' '.$yesterdayAmt; ?>
							</h6>
						</div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-3 col-lg-3 col-xlg-3">
						<div class="card card-hover bg-c-yellow text-center">
						<h5 class="card-title text-white">Sales <span class="text-white">| This Month</span></h5>
							<h1 class="font-light text-white"><i class="bi bi-cart"></i></i></h1>
							<h6 class="text-white">
							<?php 
							$monthAmount =  $this->Common->monthSale($thismonth,$users_id);
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
                    <div class="col-md-3 col-lg-3 col-xlg-3">
                        <div class="card card-hover bg-c-pink text-center">
							<h5 class="card-title text-white">Sales <span class="text-white">| Total</span></h5>
							<h1 class="font-light text-white"><i class="bi bi-cart"></i></i></h1>
							<h6 class="text-white">
							<?php 
							$totalSaleAll =  $this->Common->todaySaleAll($users_id);
							  if($totalSaleAll>0){
								  $totalSaleAmt = number_format($totalSaleAll,2);
							  }else{
								  $totalSaleAmt = 0;
							  }
							echo CURRENCY.' '.$totalSaleAmt; ?>
							</h6>
                        </div>
                    </div>
                    <!-- Column -->
					<?php $statusData = $this->Common->getOrderStatusData();
							foreach($statusData as $statusRes){
							?>
                    <div class="col-md-3">
						<div class="card bg-<?php echo $statusRes->color;?> text-center">
							<h5 class="font-light text-white pt-2"><?php echo $statusRes->name;?></h5>
							<h6 class="text-white"><?php echo  $this->Common->orderStatus($statusRes->id,$users_id);?></h6>
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
               $janAmount =  $this->Common->monthSale($jan,$users_id);
               $febAmount =  $this->Common->monthSale($feb,$users_id);
               $marchAmount =  $this->Common->monthSale($march,$users_id);
               $aprilAmount =  $this->Common->monthSale($april,$users_id);
               $mayAmount =  $this->Common->monthSale($may,$users_id);
               $juneAmount =  $this->Common->monthSale($june,$users_id);
               $julyAmount =  $this->Common->monthSale($july,$users_id);
               $auguestAmount =  $this->Common->monthSale($auguest,$users_id);
               $septemberAmount =  $this->Common->monthSale($september,$users_id);
               $octomberAmount =  $this->Common->monthSale($octomber,$users_id);
               $novemberAmount =  $this->Common->monthSale($november,$users_id);
               $decemberAmount =  $this->Common->monthSale($december,$users_id);
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
				<p>
                   <div id="pageNumber" style="display:none;"></div>
                   <div class="table-responsive" id="loadTableData">
                   <h3>Data is loading please wait..   <i class="fa fa-refresh fa-spin"></i> </h3>
                    </div>
                    <div align="right" id="paginationLink"></div>
                </p>
                </div>
              </div> 
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12" style="display:none">
              <div class="card top-selling overflow-auto">

                <!--<div class="filter">-->
                <!--  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>-->
                <!--  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">-->
                <!--    <li class="dropdown-header text-start">-->
                <!--      <h6>Filter</h6>-->
                <!--    </li>-->

                <!--    <li><a class="dropdown-item" href="#">Today</a></li>-->
                <!--    <li><a class="dropdown-item" href="#">This Month</a></li>-->
                <!--    <li><a class="dropdown-item" href="#">This Year</a></li>-->
                <!--  </ul>-->
                <!--</div>-->

                <div class="card-body pb-0" >
                  <h5 class="card-title">Top Selling <span>| Today</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                        <td>$64</td>
                        <td class="fw-bold">124</td>
                        <td>$5,828</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                        <td>$46</td>
                        <td class="fw-bold">98</td>
                        <td>$4,508</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                        <td>$59</td>
                        <td class="fw-bold">74</td>
                        <td>$4,366</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                        <td>$32</td>
                        <td class="fw-bold">63</td>
                        <td>$2,016</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                        <td>$79</td>
                        <td class="fw-bold">41</td>
                        <td>$3,239</td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div>
        <!-- End Left side columns -->
      </div>
    </section>
