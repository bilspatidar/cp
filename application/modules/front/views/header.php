 

<!DOCTYPE html>
<html lang="en">


<head>

<title><?php echo BRAND_NAME; ?></title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="shortcut icon" href="https://consciousawakeningnetwork.org/wp-content/uploads/2023/06/747dd9_b5f5e509b7f5493096c92ac858aed343mv2.webp">
 
<link href="<?php echo base_url();?>frontassets/fonts.googleapis.com/css2660d.css?family=Montserrat:wght@300;400;500;600;700;800&amp;family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?php echo base_url();?>frontassets/vendor/dzsparallaxer/dzsparallaxer.css">
<link rel="stylesheet" href="<?php echo base_url();?>frontassets/vendor/cubeportfolio/css/cubeportfolio.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>frontassets/vendor/aos/dist/aos.css">
<link rel="stylesheet" href="<?php echo base_url();?>frontassets/vendor/slick-carousel/slick/slick.css">
<link rel="stylesheet" href="<?php echo base_url();?>frontassets/vendor/fancybox/dist/jquery.fancybox.css">

<link rel="stylesheet" href="<?php echo base_url();?>frontassets/css/theme.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="<?php echo base_url(); ?>assets/toastr/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="path/to/plyr.css" />
<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

<style>


nav{
    max-width: 1200px!important;
    margin: auto;
}


.header-section {
    position: relative;
    z-index: 1;
    background-color: #fff;
    border-style: solid;
    border-width: 3px 0px 0px 0px;
    border-color: #A0138E;
}


.navbar-expand-xl .navbar-nav .nav-link {
    padding-right: 0.475rem!important;
}


html, body {
  margin: 0;
	font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
	scroll-behavior: smooth;
	-webkit-font-smoothing: antialiased;
	
}
.video-sec-wrap {
	width: 100%;
	min-height: 100vh;
}
.video-sec {
	width: 100%;
	margin: 3em auto;
	border-bottom: 2px solid #353535;
	text-align: left;
}
.video-sec-middle {
	grid-template-columns: repeat(5,1fr);
	display: grid;
	justify-content: center;
	align-content: center;
	grid-template-rows: auto;
	grid-row-gap: 15px;
	grid-column-gap: 10px;
	padding: 20px 0;
}
.thumb-wrap {
	display: inline;
	cursor: pointer;
}
.thumb {
	display: block;
	margin: .4em;
	width: 100%;
	box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
	opacity: 1;
	transition: all .2s ease-in-out;
}
.thumb:hover {
	opacity: .8;
	box-shadow: 0 5px 10px 0 rgba(0, 0, 0, .5);
}
.thumb-info {
	display: inline-block;
	height: 100%;
	width: 100%;
	padding: .4em;
}
.thumb-title {
	color: #222;
	margin: 0;
	font-size: 1.2em;
}
.thumb-user {
	color: #222;
	display: block;
	margin: 0;
	font-size: .9em;
}
.thumb-text {
	color: #222;
	display: inline-block;
	margin: 0;
	font-size: .8em;
}

.fa:hover {
    background: #3b5998;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    line-height: 10px;
}

.video-sec-title {
	font-weight: bolder;
	font-size: 1.4em;
	color: #222;
	margin: 5px 0 10px 10px;
}
.video-showmore {
	font-weight: bold;
	font-variant: all-petite-caps;
	display: block;
	color: #7e7e7e;
	padding: 10px;
	font-size: 1.2em;
}
@media only screen and (max-width: 1456px) {
	.video-sec-middle {
		grid-template-columns: repeat(4,1fr);
	}
 
}
@media only screen and (max-width: 1024px) {
	.video-sec-middle {
	  grid-template-columns: repeat(3,1fr);
	}
	
}
@media only screen and (max-width: 756px) {
  .video-sec-middle {
   grid-template-columns: repeat(2,1fr);
  }
  nav{
    max-width: 1200px!important;
    margin: auto;
}
}
@media only screen and (max-width: 496px) {
  .video-sec-middle {
   grid-template-columns: repeat(1,1fr);
  }
  nav{
    max-width: 1200px!important;
    margin: auto;
}
}
.dropdown-toggle::after{
	display:none;
}

@media (min-width: 1200px)
.navbar-expand-xl .navbar-nav .nav-link {
    padding-right: 0.475rem!important;
}
</style>

<style>
@media only screen and (max-width: 600px) {
  .footericon {
    display: none;
  }
}
</style>
</head>
<body>

<header id="header" class="header left-aligned-navbar" data-hs-header-options='{
            "fixMoment": 1000,
            "fixEffect": "slide"
        }'>
<div class="header-section shadow-soft">
<div id="logoAndNav" class="container-fluid px-md-5">
 
<nav class="js-mega-menu navbar navbar-expand-xl py-0 position-static justify-content-start">

<button type="button" class="navbar-toggler btn btn-icon btn-sm rounded-circle mr-2" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
<span class="navbar-toggler-default">
<svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
<path fill="currentColor" d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z" />
</svg>
</span>
<span class="navbar-toggler-toggled">
<svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
<path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
</svg>
</span>
</button>





<a class="navbar-brand w-auto mr-xl-5 mr-wd-8" href="<?php echo base_url(); ?>front/index" aria-label="<?php echo BRAND_NAME; ?>">

<img src="<?php echo base_url(); ?>webassets/img/If.png" style="width: 169px;max-width: 92px;
"> 
</a>


<div id="navBar" class="collapse navbar-collapse order-1 order-xl-0">
<div class="navbar-body header-abs-top-inner">
<ul class="navbar-nav">

<li class=" navbar-nav-item">
<a id="homeMegaMenu" class="hs-mega-menu-invoker nav-link  font-secondary" href="https://consciousawakeningnetwork.org/" 
aria-haspopup="true" aria-expanded="false">Home</a>
</li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Streaming Media <i class="fa fa-angle-down" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="https://consciousawakeningnetwork.org/host">Hosts</a>
          <a class="dropdown-item" href="<?php echo base_url();?>front/series">Channels</a>
          <a class="dropdown-item" href="<?php echo base_url();?>front/topics">Topics</a>
		  <a class="dropdown-item" href="https://consciousawakeningnetwork.org/streamingmedia/front/watch_live">Live TV</a>
		  <a class="dropdown-item" href="https://consciousawakeningnetwork.podbean.com/">Podcast</a>
		   <a class="dropdown-item" href="https://consciousawakeningne.webradiosite.com/">CAN Radio</a>
		    <a class="dropdown-item" href="https://consciousawakeningnetwork.org/music-content/">Music</a>
        </div>
      </li> 
 
<li class="navbar-nav-item">
<a id="" class="hs-mega-menu-invoker nav-link  font-secondary"
 href="https://consciousawakeningnetwork.org/event/" aria-haspopup="true" aria-expanded="false">Events & Programing</a>
</li>
 

<li class="navbar-nav-item">
<a id="" class="hs-mega-menu-invoker nav-link  font-secondary"
 href="https://consciousawakeningnetwork.org/marketplace/" aria-haspopup="true" aria-expanded="false">MarketPlace</a>

</li>


<li class="navbar-nav-item">
<a id="" class="hs-mega-menu-invoker nav-link  font-secondary"
 href="https://consciousawakeningnetwork.org/can-learn/" aria-haspopup="true" aria-expanded="false">CAN Learn</a>
</li>

<li class="navbar-nav-item">
<a id="" class="hs-mega-menu-invoker nav-link  font-secondary"
 href="https://consciousawakeningnetwork.org/user/" aria-haspopup="true" aria-expanded="false">SpaceBook</a>
</li>
<li class="navbar-nav-item">
<a id="" class="hs-mega-menu-invoker nav-link  font-secondary"
 href="https://consciousawakeningnetwork.org/business-services/" aria-haspopup="true" aria-expanded="false">Business Services
</a>
</li>

</ul>

</div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="d-flex align-items-center ml-auto">
 
<div class="d-inline-flex ml-md-5">
<ul class="d-flex list-unstyled mb-0 align-items-center">
<li class="footericon">
<a href="https://www.facebook.com/ConsciousAwakeningNetwork" aria-haspopup="true" aria-expanded="false" target="_blank"><i class="fa fa-facebook" aria-hidden="true" style="color: #969595;padding: 10px;"></i></a>
</li>
<li class="footericon">
<a href="https://www.instagram.com/conscious.awakening.network/" aria-haspopup="true" aria-expanded="false" target="_blank"><i class="fa fa-instagram" aria-hidden="true" style="color: #969595;padding: 10px;"></i></a>
</li>
<li class="footericon">
<a href="https://www.linkedin.com/company/conscious-awakening-network" aria-haspopup="true" aria-expanded="false" target="_blank"><i class="fa fa-linkedin" aria-hidden="true" style="color: #969595;padding: 10px;"></i></a>
</li>
<li class="footericon">
<a href="https://consciousawakeningnetwork.podbean.com/" aria-haspopup="true" aria-expanded="false" target="_blank"><i class="fa fa-podcast" aria-hidden="true" style="color: #969595;padding: 10px;"></i></a>
</li>

<li class="col pr-xl-0 px-2 px-sm-3">
 
<a class="btn btn-primary" href="<?php echo base_url();?>front/watch_live" >Watch Live</a>
</li>
</ul>
</div>
</div>
</nav>

</div>
</div>
</header>
