<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo BRAND_NAME; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url(); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
      .loading {
	display:none;
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('<?php echo base_url(); ?>uploads/loader2.gif') 50% 50% no-repeat rgb(249,249,249);
	background-size:400px;
    opacity: .8;
}
body {
	background-color:#8259a8 !important;
	 color:white  !important;
	  border-right:2px solid color:#8259a8;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}

.submitbtn{
    	background-color:#8259a8 !important;
	 color:white  !important;
	  border:2px solid #8259a8;
}

.m-t-n-lg {
  margin-top: -100px;
}

.user {
  color: black;
}
  </style>
</head>

<body>
<div class="loading"></div>
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4 ">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <!-- End Logo -->
  
              <div class="card mb-3">
                <div class="d-flex justify-content-center mt-1 py-1">
                <a href="javascript:void(0)" class=" d-flex align-items-center w-auto">
                 <img src="<?php echo base_url();?>webassets/img/If.png" alt=""style="width:130px;height:60px;">
                </a>
                           

              </div>
                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4"> <span id="loginMsg" style="color:red">&nbsp;</span></h5>      
                    
                    </div>

                  <form id="AdminLoginForm" action="<?php echo base_url(); ?>user/sentPasssword"  method="POST" class="row g-3 mb-15 m-t-n-lg">

                    <div class="col-12">
                      <label for="yourUseremail" class="form-label user">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="yourUseremail">
                        <div class="invalid-feedback">Please enter your useremail.</div>
                      </div>
                    </div>

                   

                    <div class="col-12">
                      <div class="form-check">
                        <!--<input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>-->
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100 submitbtn" type="submit">Submit</button>
                    </div>
                     <div class="col-8">
                      <a href="<?php echo base_url();?>/user/Login" class="text-primary" type="submit">Back to login</a>
                    </div>
                    <div class="col-12">
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="tel:7000165361">Sparkhub</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
 
  <script src="<?php echo base_url(); ?>assets/response/auth.js"></script>

  <!-- Template Main JS File -->
    
    

</body>

</html>