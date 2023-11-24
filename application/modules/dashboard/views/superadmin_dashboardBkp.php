 <?php 
 $today = date('Y-m-d');
 $yesterday = date('Y-m-d',strtotime("-1 days"));
 $thismonth = date('Y-m');
 $lastmonth = date('Y-m',strtotime("-1 month"));
 ?>
 <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-3">
              <div class="card info-card sales-card" style ="box-shadow:1px 1px 2px 2px #173853;">
                <div class="card-body">
                  <h5 class="card-title">Sales <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php $todayAmount =  $this->Common->todaySale($today);
                      if(count($todayAmount)>0){
                          echo number_format($todayAmount,2);
                      }else{
                          echo 0;
                      }
                      ?>
                      </h6>
                      <!--<span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                    </div>
                  </div>
                </div>

              </div>
            </div>
             <div class="col-xxl-4 col-md-3">
              <div class="card info-card sales-card"style ="box-shadow:1px 1px 2px 2px #173853;">
                <div class="card-body">
                  <h5 class="card-title">Sales <span>| Yesterday</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                          <?php $yesterdayAmount =  $this->Common->todaySale($yesterday);
                      if(count($yesterdayAmount)>0){
                          echo number_format($yesterdayAmount,2);
                      }else{
                          echo 0;
                      }
                      ?>
                          
                      </h6>
                      <!--<span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                    </div>
                  </div>
                </div>

              </div>
            </div>
             <div class="col-xxl-4 col-md-3">
              <div class="card info-card sales-card"style ="box-shadow:1px 1px 2px 2px #173853;">

                <div class="card-body">
                  <h5 class="card-title">Sales <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                          <?php $monthAmount =  $this->Common->monthSale($thismonth);
                      if(count($monthAmount)>0){
                          echo number_format($monthAmount,2); 
                      }else{
                          echo 0;
                      }
                      ?>
                          
                      </h6>
                      <!--<span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                    </div>
                  </div>
                </div>

              </div>
            </div>
             <div class="col-xxl-4 col-md-3">
              <div class="card info-card sales-card"style ="box-shadow:1px 1px 2px 2px #173853;">

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

                <div class="card-body">
                  <h5 class="card-title">Sales <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                          <?php $lastmonthAmount =  $this->Common->todaySaleAll();
                      if(count($lastmonthAmount)>0){
                          echo number_format($lastmonthAmount,2); 
                      }else{
                          echo 0;
                      }
                      ?>
                      </h6>
                      <!--<span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Sales Card -->
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
               $janAmount =  $this->Common->monthSale($jan);
               $febAmount =  $this->Common->monthSale($feb);
               $marchAmount =  $this->Common->monthSale($march);
               $aprilAmount =  $this->Common->monthSale($april);
               $mayAmount =  $this->Common->monthSale($may);
               $juneAmount =  $this->Common->monthSale($june);
               $julyAmount =  $this->Common->monthSale($july);
               $auguestAmount =  $this->Common->monthSale($auguest);
               $septemberAmount =  $this->Common->monthSale($september);
               $octomberAmount =  $this->Common->monthSale($octomber);
               $novemberAmount =  $this->Common->monthSale($november);
               $decemberAmount =  $this->Common->monthSale($december);
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
						<div class="row">
							<?php $statusData = $this->Common->getOrderStatusData();
							foreach($statusData as $statusRes){
							?>
							<div class="col-md-4">
							<div class="card info-card sales-card" style ="box-shadow:1px 1px 2px 2px #173853;">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $statusRes->name;?></h5>

                  <div class="d-flex align-items-center">
                    
                    <div class="ps-3">
                      <h6><?php echo  $this->Common->orderStatus($statusRes->id);?>
                      </h6>
                      
                    </div>
                  </div>
                </div>

              </div></div>
							<?php } ?>
						</div>
					</div>
				</div>
          <div class="card" style="display:none;">
            <div class="card-body">
              <h5 class="card-title">Success Rate</h5>

               Pie Chart 
              <?php
              $success = 'Success';
              $failed = 'Failed';
              $inprogess = 'In Progress';
              $successData = $this->Common->orderStatus($success);
              $failedData = $this->Common->orderStatus($failed);
              $inprogessData = $this->Common->orderStatus($inprogess);
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
                <table class="table table-borderless datatable">
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
                        $this->db->select("order_items.id,order_items.order_status,order_items.users_id,order_items.orderNo,order_items.seller_id,order_items.product_id,order_items.product_name,order_items.sub_total,order_items.quantity,order_items.price,order_items.date_added");
                        $this->db->from("order_items");
                        $this->db->order_by('order_items.id','desc');
                        $this->db->limit(10);
                        $sr=1;
                        $sum=0;
	                    $result = $this->db->get()->result();
	                    foreach($result as $row){ 
						 $id          = $row->id;
						$status = $this->Common->fetchOrderStatus($id);
                    $merchantName = $this->Common->merchantName($row->users_id);
	                $netAmt = $row->sub_total;
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
