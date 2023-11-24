


<?php 
$user_type          = $this->session->userdata('user_details')[0]->user_type;
$user_id            = $this->session->userdata('user_details')[0]->users_id;

if($user_type=='seller'){
$sellerFe = $this->Common->get_vendor_fees($user_id);
       if($sellerFe == 1){
           
       }else{ 
          if($page_title!='Pay Now'){
       redirect(base_url().'seller/pay_now','refresh');
          }
       }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $page_title; ?> - <?php echo BRAND_NAME; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
    
  
  <link href="<?php echo base_url(); ?>assets/img/If.jpg" rel="icon" style="width:60px;height:60px;">
  <link href="<?php echo base_url(); ?>assets/img/If.jpg" rel="apple-touch-icon" style="width:60px;height:60px;">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>assets/toastr/toastr.min.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
<link rel="preconnect" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="preconnect" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100&display=swap" rel="stylesheet">


  <link href="<?php echo base_url(); ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/brands.min.css" integrity="sha512-+oRH6u1nDGSm3hH8poU85YFIVTdSnS2f+texdPGrURaJh8hzmhMiZrQth6l56P4ZQmxeZzd2DqVEMqQoJ8J89A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
  <style>
      .html{
          background-color:#8259a8; !important;
           color:white  !important;
        
      }
      .changeBackgound{
          background-color:#883464 !important;
          background-image: url(../assets/img/sidebar-1.jpg); 
         color:white  !important;
      }
     .font{
         font-size:13px;
         font-weight: 400;
     }
  </style>
<style>
    .switch {
    position: relative;
    display: inline-block;
    width: 40px;
    height: 20px;
    /*top: 75px;*/
    left: 4px;
  }
  
  .switch input {
    display: none;
  }
  
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: green;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  .slider:before {
    position: absolute;
    content: "";
    height: 14px;
    width: 14px;
    left: 2px;
    bottom: 3px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  input:checked + .slider {
    background-color: blue;
  }
  
  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }
  
  input:checked + .slider:before {
    -webkit-transform: translateX(22px);
    -ms-transform: translateX(22px);
    transform: translateX(22px);
  }
  
  .off {
    display: none;
  }
  
  .on,
  .off {
    color: green;
    position: absolute;
    transform: translate(-50%, -50%);
    top: 10px;
    left: 55px;
    font-size: 14px;    
  }
  
  .off{
      color:blue;
  }
  /*.off {
    top: 8px;
  }
  
  .on {
    left: auto;
    right: -5px;
    top: 8px;
  }*/
  
  input:checked+ .slider .off {
    display: block;
  }
  
  input:checked + .slider .on {
    display: none;
  }  
  
  .slider.round {
    border-radius: 17px;
  }
  
  .slider.round:before {
    border-radius: 50%;
  }

  .toggleoff{
    background-color: blue;
  }
  .toggleon{
    background-color:green;
  }
  .toggledisabled{
    background: #D3D3D3 !important;    
 }
 .buttons-print{
       background-color:#8259a8;
        border-radius: 4px;
          border-radius: none;
        
          margin:5px;
           border-color:#8259a8;
            border:1px solid #8259a8;
               word-wrap: break-word;
               font-size: 12px;
               padding:5px;
               padding-left:15px;
                padding-right:13px;
                color:#FFFF;
 }
.buttons-print:hover{
    color:#fff;
    background-color:#8259a8;
    border-color:#8259a8;
    border-radius: 4px;
    border-color:#007bff
    border:1px solid #007bff;
   word-wrap: break-word;
   font-size: 12px;
}
 .buttons-excel{
       background-color:#8259a8;
        border-radius: 4px;
          border-radius: none;
        
          margin:5px;
           border-color:#8259a8;
            border:1px solid #8259a8;
               font-size: 12px;
               padding:5px;
               padding-left:15px;
                padding-right:13px;
                 color:#FFFF;
 }
.buttons-excel:hover{
  color:#fff;
    background-color:#8259a8;
    border-color:#8259a8;
    border-radius: 4px;
    border-color:#8259a8
    border:1px solid #883464;
   font-size: 12px;
}

</style>
  <style>
      .select2{
          width:100% !important;
          
      }
       .modal-open .select2-container { z-index: 9999; }
       .modal { z-index: 9999; }
  </style>
  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
<?php 
    
  $page_session = $this->db->get_where('usersession',array('user_type'=>$user_type,'page_name'=>$page_title));
  if($page_session->num_rows()>0){
  
      $session_views = $page_session->row()->views;
      $session_adds = $page_session->row()->adds;
      $session_edits = $page_session->row()->edits;
      $session_deletes = $page_session->row()->deletes;
      if($session_views==0){ $session_views_display = 'none !important'; } else { $session_views_display= ''; }
      if($session_adds==0){ $session_adds_display = 'none !important'; } else { $session_adds_display= ''; }
      if($session_edits==0){ $session_edits_display = 'none !important'; } else { $session_edits_display= ''; }
      if($session_deletes==0){ $session_deletes_display = 'none !important'; } else { $session_deletes_display= ''; }
      
  }
  else{
     $session_views_display= '';$session_adds_display= '';$session_edits_display= '';$session_deletes_display= '';
  }
  
  ?>
         <style>
         .session_views{display:<?php echo$session_views_display;  ?>;} 
         .session_adds{display:<?php echo$session_adds_display;  ?>;} 
         .session_edits{display:<?php echo$session_edits_display;  ?>;} 
         .session_deletes{display:<?php echo$session_deletes_display;  ?>;} 
      </style>
      
    
		
		
</head>
 <style>
      .sidebar {
	background-color:#8259a8 !important;
	 color:white  !important;
	  border-right:2px solid color:#8259a8;
	  font-family:Courier;
}

	.sidebar .nav-content{background:#8259a8; font-family:Courier;}
.darkmode {
	background-color:#FFFF !important;
    
    border-bottom:2px solid color:#883464;

}

aside a.nav-link,aside a.html{background:transparent !important}
.btn-outline-primary{
     background-color:#8259a8 !important;
     color:#FFFF;
     border:1px solid #8259a8;
}
.btn-outline-primary:hover{
    color:#FFFF;
    background-color:#8259a8 !important;
     border:1px solid #8259a8;
}

.ri-edit-box-fill{
    color:#8259a8;
}


  </style> 
<body>
<div class="loading"></div>
  <!-- ======= Header ======= -->
  <header id="header" class="header darkmode fixed-top d-flex align-items-center" style="border-bottom:1px solid #173853">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?php echo base_url(); ?>dashboard" class=" d-flex align-items-center">
       <img src="<?php echo base_url();?>webassets/img/If.png" alt=""style="width:150px;height:40px;">
       
      </a>
      <i class="bi bi-list toggle-sidebar-btn "></i>
    </div><!-- End Logo -->

    <!--<div class="search-bar">-->
    <!--  <form class="search-form d-flex align-items-center" method="POST" action="#">-->
    <!--    <input type="text" name="query" placeholder="Search" title="Enter search keyword">-->
    <!--    <button type="submit" title="Search"><i class="bi bi-search"></i></button>-->
    <!--  </form>-->
    <!--</div><!-- End Search Bar -->

    <nav class="header-nav ms-auto" >
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
          
      
        <!--<li class="nav-item dropdown">-->

        <!--  <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">-->
        <!--    <i class="bi bi-bell"></i>-->
        <!--    <span class="badge bg-dark badge-number">4</span>-->
        <!--  </a>-->

        <!--  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">-->
        <!--    <li class="dropdown-header">-->
        <!--      You have 4 new notifications-->
        <!--      <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>-->
        <!--    </li>-->
        <!--    <li>-->
        <!--      <hr class="dropdown-divider">-->
        <!--    </li>-->

        <!--    <li class="notification-item">-->
        <!--      <i class="bi bi-exclamation-circle text-warning"></i>-->
        <!--      <div>-->
        <!--        <h4>Lorem Ipsum</h4>-->
        <!--        <p>Quae dolorem earum veritatis oditseno</p>-->
        <!--        <p>30 min. ago</p>-->
        <!--      </div>-->
        <!--    </li>-->

        <!--    <li>-->
        <!--      <hr class="dropdown-divider">-->
        <!--    </li>-->

        <!--    <li class="notification-item">-->
        <!--      <i class="bi bi-x-circle text-danger"></i>-->
        <!--      <div>-->
        <!--        <h4>Atque rerum nesciunt</h4>-->
        <!--        <p>Quae dolorem earum veritatis oditseno</p>-->
        <!--        <p>1 hr. ago</p>-->
        <!--      </div>-->
        <!--    </li>-->

        <!--    <li>-->
        <!--      <hr class="dropdown-divider">-->
        <!--    </li>-->

        <!--    <li class="notification-item">-->
        <!--      <i class="bi bi-check-circle text-success"></i>-->
        <!--      <div>-->
        <!--        <h4>Sit rerum fuga</h4>-->
        <!--        <p>Quae dolorem earum veritatis oditseno</p>-->
        <!--        <p>2 hrs. ago</p>-->
        <!--      </div>-->
        <!--    </li>-->

        <!--    <li>-->
        <!--      <hr class="dropdown-divider">-->
        <!--    </li>-->

        <!--    <li class="notification-item">-->
        <!--      <i class="bi bi-info-circle text-primary"></i>-->
        <!--      <div>-->
        <!--        <h4>Dicta reprehenderit</h4>-->
        <!--        <p>Quae dolorem earum veritatis oditseno</p>-->
        <!--        <p>4 hrs. ago</p>-->
        <!--      </div>-->
        <!--    </li>-->

        <!--    <li>-->
        <!--      <hr class="dropdown-divider">-->
        <!--    </li>-->
        <!--    <li class="dropdown-footer">-->
        <!--      <a href="#">Show all notifications</a>-->
        <!--    </li>-->

        <!--  </ul>-->

        <!--</li>-->
        <!-- End Notification Nav -->

        <!--<li class="nav-item dropdown">-->

        <!--  <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">-->
        <!--    <i class="bi bi-chat-left-text"></i>-->
        <!--    <span class="badge bg-success badge-number">3</span>-->
        <!--  </a><!-- End Messages Icon -->

        <!--  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">-->
        <!--    <li class="dropdown-header">-->
        <!--      You have 3 new messages-->
        <!--      <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>-->
        <!--    </li>-->
        <!--    <li>-->
        <!--      <hr class="dropdown-divider">-->
        <!--    </li>-->

        <!--    <li class="message-item">-->
        <!--      <a href="#">-->
        <!--        <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">-->
        <!--        <div>-->
        <!--          <h4>Maria Hudson</h4>-->
        <!--          <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>-->
        <!--          <p>4 hrs. ago</p>-->
        <!--        </div>-->
        <!--      </a>-->
        <!--    </li>-->
        <!--    <li>-->
        <!--      <hr class="dropdown-divider">-->
        <!--    </li>-->

        <!--    <li class="message-item">-->
        <!--      <a href="#">-->
        <!--        <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">-->
        <!--        <div>-->
        <!--          <h4>Anna Nelson</h4>-->
        <!--          <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>-->
        <!--          <p>6 hrs. ago</p>-->
        <!--        </div>-->
        <!--      </a>-->
        <!--    </li>-->
        <!--    <li>-->
        <!--      <hr class="dropdown-divider">-->
        <!--    </li>-->

        <!--    <li class="message-item">-->
        <!--      <a href="#">-->
        <!--        <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">-->
        <!--        <div>-->
        <!--          <h4>David Muldon</h4>-->
        <!--          <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>-->
        <!--          <p>8 hrs. ago</p>-->
        <!--        </div>-->
        <!--      </a>-->
        <!--    </li>-->
        <!--    <li>-->
        <!--      <hr class="dropdown-divider">-->
        <!--    </li>-->

        <!--    <li class="dropdown-footer">-->
        <!--      <a href="#">Show all messages</a>-->
        <!--    </li>-->

        <!--  </ul><!-- End Messages Dropdown Items -->

        <!--</li><!-- End Messages Nav -->
        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0 " href="#" data-bs-toggle="dropdown">
                 <?php 
                       $File = getUser('profile_pic'); 
                          
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
                    			
                               	
                    		}
                    		else
                    		{
                    		$url = base_url().'uploads/no_file.jpg';
                    	
                    		}
                              ?>
                              
            <img class="img img-responsive img-circle" src="<?php echo $url;?>" alt="Profile" style="height:35px;width:35px;border-radius:50%;">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-dark "><?php echo getUser('name');  ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo getUser('name');  ?></h6>
              <!--<span>Web Designer</span>-->
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>user/my_profile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>user/manage_password">
                <i class="bi bi-gear"></i>
                <span>Password Settings</span>
              </a>
            </li>
            
             <li>
              <hr class="dropdown-divider">
            </li>

        
            <!--<li>-->
            <!--  <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>complaint/index">-->
            <!--    <i class="bi bi-gear"></i>-->
            <!--    <span>Complaint Box</span>-->
            <!--  </a>-->
            <!--</li>-->



            <li>
              <hr class="dropdown-divider">
            </li>

        
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>user/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
        

      </ul>
     

    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
<?php include($user_type.'_menu.php');  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo $page_title ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $page_title ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
   
    
