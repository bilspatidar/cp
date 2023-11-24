<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<style>
    .select2{
          width:100% !important;
      }
</style>

<style>


.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem
}

.card>hr {
    margin-right: 0;
    margin-left: 0
}
.nav {
	border-bottom: none;
	-webkit-box-pack: center;
	-ms-flex-pack: center;
	justify-content: center;
	position: relative;
	margin-bottom: 40px;
}
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.nav::before {
	position: absolute;
	left: 0;
	top: 13px;
	height: 1px;
	width: 335px;
	background: #e1e1e1;
	content: "";
}

.nav::after {
	position: absolute;
	right: 0;
	top: 13px;
	height: 1px;
	width: 335px;
	background: #e1e1e1;
	content: "";
}

.nav-item {
	margin-right: 46px;
}

.nav-item:last-child {
	margin-right: 0;
}

.nav-item .nav-link {
	font-size: 18px;
	color: #666666;
	font-weight: 600;
	border: none;
	border-top-left-radius: 0;
	border-top-right-radius: 0;
	padding: 0;
}

.nav-item .nav-link.active {
	color: #111111;
}

.tab-content .tab-pane h6 {
	color: #666666;
	font-weight: 600;
	margin-bottom: 24px;
}

.allBtn{
  background-image: linear-gradient(#634986, #6f5296);
  border: 0;
  border-radius: 4px;
  box-shadow: rgba(0, 0, 0, .3) 0 5px 15px;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  font-family: Montserrat,sans-serif;
  font-size: .9em;
  margin: 5px;
  padding: 10px 15px;
  text-align: center;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}
.allBtn:hover {
  color:#fff !important;
}
.allBtn00{
  /*width: auto;*/
  height: 60px;
  cursor: pointer;
  background: transparent;
  border: 1px solid #CA1515;
  outline: none;
  transition: 1s ease-in-out;
  color:#CA1515 !important;  
  text-align: center;
vertical-align: middle;
}

.allBtn00:hover {
  transition: 1s ease-in-out;
  background: #CA1515;
  color:#fff !important;
}
.sideBtn{
    height: 60px;
    cursor: pointer;
    background: transparent;
    border: 1px solid #CA1515;
    outline: none;
    transition: 1s ease-in-out;
    color:#CA1515 !important;  
    text-align: center;
    vertical-align: middle;
    padding: 15px 0px 0px 0px;
    font-weight:600;
    
}
.sideBtn:hover {
  transition: 1s ease-in-out;
  background: #CA1515;
  color:#fff !important;
}

/*    margin-top:20px;*/
/*    background:#f8f8f8*/
/*}*/
/*    body{*/

</style>

<br><br>

<body>


    <div class="container">
<div class="row flex-lg-nowrap">
  <div class="col-12 col-lg-auto mb-3" style="width: 300px;">
     <!--<div class="card mb-3">-->
     <!--     <div class="card-body">-->
            
     <!--     </div>-->
     <!--   </div>-->
      
  <?php include('profileSidebar.php');?>
  </div>

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" 
                    style="height: 140px; background-color: rgb(233, 236, 239);">
                      <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;"><?php
							if(!empty($row[0]->profile_pic) && file_exists('uploads/users/'.$row[0]->profile_pic)){ ?>
            				     <img src="<?=base_url().'uploads/users/'.$row[0]->profile_pic;?>" width="100">
							<?php } else{ ?>  
            				     <img src="<?=base_url().'uploads/no_file.jpg';?>" width="100">

							<?php }?></span>
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                   </br> <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $row[0]->name;?></h4>
                    <p class="mb-0"><?php echo $row[0]->email;?></p>

                  </div>
                  <!--<div class="text-center text-sm-right">-->
                  <!--  <span class="badge badge-secondary">administrator</span>-->
                  <!--  <div class="text-muted"><small>Joined 09 Dec 2017</small></div>-->
                  <!--</div>-->
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link text-danger">Profile Detail</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <!--<form action="<?php echo base_url();?>front/profile_setting" class="form" novalidate="">-->
                  <form id="crudFormFix"  action="<?php echo base_url();?>front/profile_update" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" class="form-control" name="users_id" value="<?php echo $row[0]->users_id;?>">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Full Name</label>
                              <input class="form-control" type="text" name="name" placeholder="Enter Name" value="<?php echo $row[0]->name;?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="email" name="email" placeholder="Enter Email" value="<?php echo $row[0]->email;?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Phone</label>
                              <input class="form-control" type="number" name="mobile" placeholder="Enter Mobile" value="<?php echo $row[0]->mobile;?>">
                            </div>
                          </div>
                        </div>
                        
                      
                        
                        
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Address</label>
                              <textarea class="form-control" name="address"><?php echo $row[0]->address;?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Profile Image</label>
            <input type="file" class="form-control" name="profile_pic" value="<?php echo $row[0]->profile_pic;?>">
                            </div>
                          </div>
                        </div>
                     
                     
                      </div>
                    </div>
                   
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn site-btn allBtn" type="submit">Save Changes</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--<div class="col-12 col-md-3 mb-3">-->
      <!--  <div class="card mb-3">-->
      <!--      <div class="e-navlist e-navlist--active-bg">-->
      <!--  <ul class="nav">-->
      <!--    <li class="nav-item"><a class="nav-link px-2 active" href="#"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>Overview</span></a></li>-->
      <!--    <li class="nav-item"><a class="nav-link px-2" href="https://www.bootdey.com/snippets/view/bs4-crud-users" target="__blank"><i class="fa fa-fw fa-th mr-1"></i><span>CRUD</span></a></li>-->
      <!--    <li class="nav-item"><a class="nav-link px-2" href="https://www.bootdey.com/snippets/view/bs4-edit-profile-page" target="__blank"><i class="fa fa-fw fa-cog mr-1"></i><span>Settings</span></a></li>-->
      <!--  </ul>-->
      <!--</div>-->
          <!--<div class="card-body">-->
          <!--  <div class="px-xl-3">-->
          <!--    <button class="btn btn-block btn-secondary">-->
          <!--      <i class="fa fa-sign-out"></i>-->
          <!--      <span>Logout</span>-->
          <!--    </button>-->
          <!--  </div>-->
          <!--</div>-->
      <!--  </div>-->
      <!--  <div class="card">-->
      <!--    <div class="card-body">-->
      <!--      <h6 class="card-title font-weight-bold">Support</h6>-->
      <!--      <p class="card-text">Get fast, free help from our friendly assistants.</p>-->
      <!--      <button type="button" class="btn btn-primary">Contact Us</button>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>-->
    </div>

  </div>
</div>
</div>
<script>

$(".select2").select2();
</script>