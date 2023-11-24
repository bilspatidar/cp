 <?php 
 $today = date('Y-m-d');
 $yesterday = date('Y-m-d',strtotime("-1 days"));
 $thismonth = date('Y-m');
 $lastmonth = date('Y-m',strtotime("-1 month"));
 $merchant_id = getUser('users_id');
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
                      <h6><?php $todayAmount =  $this->Common->todaySale($today,$merchant_id);
                      if(count($todayAmount)>0){
                          echo $todayAmount;
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
                          <?php $yesterdayAmount =  $this->Common->todaySale($yesterday,$merchant_id);
                      if(count($yesterdayAmount)>0){
                          echo $yesterdayAmount;
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
                          <?php $monthAmount =  $this->Common->monthSale($thismonth,$merchant_id);
                      if(count($monthAmount)>0){
                          echo $monthAmount;
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
                  <h5 class="card-title">Sales <span>| Last Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                          <?php $lastmonthAmount =  $this->Common->monthSale($lastmonth,$merchant_id);
                      if(count($lastmonthAmount)>0){
                          echo $lastmonthAmount;
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
               $janAmount =  $this->Common->monthSale($jan,$merchant_id);
               $febAmount =  $this->Common->monthSale($feb,$merchant_id);
               $marchAmount =  $this->Common->monthSale($march,$merchant_id);
               $aprilAmount =  $this->Common->monthSale($april,$merchant_id);
               $mayAmount =  $this->Common->monthSale($may,$merchant_id);
               $juneAmount =  $this->Common->monthSale($june,$merchant_id);
               $julyAmount =  $this->Common->monthSale($july,$merchant_id);
               $auguestAmount =  $this->Common->monthSale($auguest,$merchant_id);
               $septemberAmount =  $this->Common->monthSale($september,$merchant_id);
               $octomberAmount =  $this->Common->monthSale($octomber,$merchant_id);
               $novemberAmount =  $this->Common->monthSale($november,$merchant_id);
               $decemberAmount =  $this->Common->monthSale($december,$merchant_id);
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
              $successData = $this->Common->orderStatus($success,$merchant_id);
              $failedData = $this->Common->orderStatus($failed,$merchant_id);
              $inprogessData = $this->Common->orderStatus($inprogess,$merchant_id);
              ?>
              <canvas id="pieChart" style="max-height:230px;"></canvas>
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
                <h5 class="card-title">Recent Transaction</h5>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col"> Date</th>
                            <th scope="col">Merchant</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $this->db->select("transaction_date,amount,status,merchant_id");
                        $this->db->from("orders");
                        $this->db->where('merchant_id',$merchant_id);
                        // $this->db->limit(6);
	                    $result = $this->db->get()->result();
	                    foreach($result as $row){ 
                        if($row->status=='Success'){
                        $status = '<span class="badge bg-success">Success</span>';
                        }
                        elseif($row->status=='In Progress'){
                        $status = '<span class="badge bg-warning">In Progress</span>';
                        }
                        else{
                        $status = '<span class="badge bg-danger">Failed</span>';
                        }
                        $merchantName = $this->Common->merchantName($row->merchant_id);
    
                    ?>
                    <tr>
                        <td><?php echo getDateTimeFormat($row->transaction_date);?></td>
                        <td><?php echo $merchantName;?></a></td>
                        <td><?php echo $row->amount;?></td>
                        <td><?php echo $status;?></td>
                    </tr>
                    <?php } ?>
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
