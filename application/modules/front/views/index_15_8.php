<link rel="stylesheet" href="/frontassets/css/style.css">
<?php 
   $this->db->select("*");
   $this->db->from("slider");
   // $this->db->where('type','Video');
   $this->db->where('status','Active');
   $this->db->where('isDelete',0);
   $this->db->order_by('id','desc');
      $this->db->limit(1);
   $data = $this->db->get();
   if($data->num_rows()>0){
   $result=$data->result();
   
       $File = $result[0]->video; $load_url = 'uploads/slider/'.$File;
                  if(!empty($File) && file_exists($load_url))
                   { 
               $vurl = base_url().$load_url;
                   }
   }
      $File = $result[0]->thumbnail;
      if(!empty($File))
       { 
          $load_url = 'uploads/slider/'.$File;
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
<br>
<style>
body {
  overflow-x: hidden;
}
.h-700rem {
height: 20.75rem;
}
.btn-play {
font-size: 62px;
border: 2px solid #fff;
border-radius: 50%;
margin-top: 20px;
width: 100px;
height: 98px;
opacity: .5;
}
.slider-movie::after {
background: linear-gradient(to bottom,rgba(240,47,23,0) 0,rgba(0,0,0,0.7) %);
height: 200px;
content: " ";
position: absolute;
bottom: 0;
right: 0;
left: 0;
}
.slider-movie{
margin: 7px;
}	

.btn-outline-white {
color: #fff;
border: 2px solid #fff;
background: #44576b;
font-size: 13px;
width: -webkit-fit-content;
width: -moz-fit-content;
width: fit-content;
padding: 0 4px;
line-height: 16px;
border-radius: 2px;
letter-spacing: .02em;
color: #fff;
text-align: center;
margin-bottom: 6px;
}
 img.img-fluid.seriesimg {
    height: auto!important;
    width: 100%;
}

a.btn.btn-dark.btn-sm {
margin-top: 10px!important;
} 
.slider-movie::after {
    background: none;
    height: 200px;
    content: " ";
    position: absolute;
    bottom: 0;
    right: 0;
    left: 0;
}
.home-newsletter {
    padding: 40px 0;
    background: #7c52a4;
 
}

.home-newsletter .single {
max-width: 750px;
margin: 0 auto;
text-align: center;
position: relative;
z-index: 2; }
.home-newsletter .single h2 {
font-size: 22px;
color: white;
text-transform: uppercase;
margin-bottom: 40px; }
.home-newsletter .single .form-control {
height: 50px;
background: rgba(255, 255, 255, 0.6);
border-color: transparent;
border-radius: 20px 0 0 20px; }
.home-newsletter .single .form-control:focus {
box-shadow: none;
border-color: #243c4f; }
.home-newsletter .single .btn {
min-height: 50px; 
border-radius: 0 20px 20px 0;
background: #243c4f;
color: #fff;
}
.watchbutton {
    background-color: #515151;
    border-color: #515151;
    font-family: Avenir-Black,sans-serif;
    transition-property: all;
    transition-duration: .3s;
    transition-timing-function: ease-in-out;
    transition-delay: 0s;
    text-transform: capitalize;
    margin: 5px 15px 15px 11px;
    font-size: 17px;
    display: inline-block;
    vertical-align: middle;
    text-decoration: none;
    padding: 4px 17px 4px 17px;
    text-align: center;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    border-width: 0;
    color: #fff;
  
}
.watchbutton:hover{
	color:#fff;
	background-color: #000000;
    border-color: #000000;
}

p{
font-family: Georgia;	
font-size: 16px;
}
p.home-heading {
    font-family: Georgia;
	font-size: 16px;
}
h2.heading-htitle {
    color: #515151;
    font-family: Georgia;
}

.headingtitle{
	color: #515151;
    font-family: Georgia;
    font-size: 28px;
    text-transform: uppercase;
}
hr.hr--logo {
  border-top: solid #000 1px;
  margin: 25px 0;
}
hr.hr--logo:after {
  content: url( 'https://sheilas33.sg-host.com/assets/dd.png' );
  /* Controls the position of the logo */
  left: 50%;
  position: absolute;
  transform: translateY(-50%) translateX(-50%);
  /* Controls the whitespace around the symbol */
  padding: 10px;
 
}
.youtubeimg{
	
	width: 100%!important;
	height: 168px!important;
	
}
@media (min-width: 1486px){
.container, .container-fluid, .container-sm, .container-md, .container-lg, .container-xl, .container-wd {
    max-width: 100%!important;
}
.h-700rem {
    height: 29.75rem!important;
}
.youtubeimg{
	
	width: 100%!important;
	height: 330px!important;
	
}

p.home-heading {

    font-size: 31px!important;
}



p {
    font-family: Georgia;
    font-size: 26px;
}
}
</style>
<div class="container" style="width: 100%;">
   <div class="row">
      <div class="col-md-12 fullscreen-bg">
         <!-- <video width="100%" height="100%" controls>
            <source src="<?php echo $vurl;?>" type="video/mp4">
            Your browser does not support the video tag.
         </video> -->



        
<video id="player" playsinline controls data-poster="/path/to/poster.jpg">
  <source src="<?php echo $vurl;?>" type="video/mp4" />
  <source src="<?php echo $vurl;?>" type="video/webm" />

  <!-- Captions are optional -->
  <track kind="captions" label="English captions" src="<?php echo $vurl;?>" srclang="en" default />
</video>
      </div>
     <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
<script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
<script src="path/to/plyr.js"></script>
<script>
  const player = new Plyr('#player');

  document.addEventListener('DOMContentLoaded', () => { 
  // This is the bare minimum JavaScript. You can opt to pass no arguments to setup.
  const player = new Plyr('#player');
  
  // Expose
  window.player = player;

  // Bind event listener
  function on(selector, type, callback) {
    document.querySelector(selector).addEventListener(type, callback, false);
  }

  // Play
  on('.js-play', 'click', () => { 
    player.play();
  });

  // Pause
  on('.js-pause', 'click', () => { 
    player.pause();
  });

  // Stop
  on('.js-stop', 'click', () => { 
    player.stop();
  });

  // Rewind
  on('.js-rewind', 'click', () => { 
    player.rewind();
  });

  // Forward
  on('.js-forward', 'click', () => { 
    player.forward();
  });
});
</script>
      <!-- <div class="col-md-6" style="padding: 0;">
         <div class="vc_column-inner">
            <div class="wpb_wrapper  ml-3">
               <div id="kapee-header-31767"
                  class="kapee-element kapee-heading text-left kapee-width-100 separator-none separator-between-heading">
                  <div class="heading-wrap">
                     <span class="separator-left"></span>
                     <h2 class="heading-htitle">
                        <?php echo $result[0]->text;?>
                     </h2>
                     <span class="separator-right"></span>
                  </div>
               </div>
               <div class="wpb_text_column wpb_content_element ">
                  <div class="wpb_wrapper">
                     <p class="home-heading">The Conscious Awakening Network (CAN) is a progressive media platform that provides inspirational programs on humanity’s evolutionary path. We offer 100’s of hours of videos to help expand your awareness, evolve your consciousness, and transform your body/mind/spirit. Our “out-of-the-box” interviews and educational programming includes topics such as ancient origins angelics, walk-ins, hybrids, starseed, extraterrestrials, ascension, deep space, contact, spiritual awakenings, channeling, health & healing, light language, the paranormal and more.</p>
                     <p>Our forward-thinking videos help to normalize conservations around topics traditionally considered “taboo”
                        .
                     </p>
                  </div>
                  <style>
                     .btn svg {
                     margin-bottom: -3px !important;
                     }
                  </style>
                  <button type="button" class="btn btn-dark btn-sm">
                     <svg xmlns="https://consciousawakeningnetwork.in/about" width="16" height="16" fill="currentColor" 
                        class="bi bi-play" viewBox="0 0 16 16">
                        <path class="mt-1 bg-light" d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4
                           11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"></path>
                     </svg>
                     <a class="text-light"href="https://consciousawakeningnetwork.in/about" >Explore</a>
                  </button>
               </div>
            </div>
         </div>
      </div> -->
 
</div>
   </div>


   
   <div class="container">
            <div class="align-items-center mt-3">
             <h6 class="headingtitle text-center">Top Trending videos</h6>
			 <hr class="hr--logo">
            </div>
            
   <div class="home-slider position-relative mb-7">
      <div class="row no-gutters">
         <!-- <div class="col-lg-1">
            </div> -->
         <?php 
            $Media = $this->Mdlfront->get_media_front('6','1');
            
            foreach($Media as $Medias){
                $MediasName = $Medias->name;
                $MediasCatId = $Medias->id; 
                $sub_category_id= $Medias->sub_category_id;
                $gener_id= $Medias->gener_id;
            
                $subcategoryName = $this->Common->get_col_by_key('sub_categories','id',$sub_category_id,'name');
            
                $generName = $this->Common->get_col_by_key('geners','id',$gener_id,'title');
            
            
                $File = $Medias->sliderBanner;
                if(!empty($File))
                 { 
                    $load_url = 'uploads/sliderBanner/'.$File;
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
            
                // $galleryDatils = base_url().'web/gallery/'.$galleryCatId.'/'.$galleryCatName;
                $File = $Medias->video_link;
                if(!empty($File))
                 { 
                    $load_url = 'uploads/media/'.$File;
                    if(file_exists($load_url))
                    {
                   $url1 = base_url().$load_url;			
                    }
                    else
                    {
                    $url1 = base_url().'uploads/no_file.jpg';		
                    }
                }
                else
                {
                $url1 = base_url().'uploads/no_file.jpg';
                }
            
            
            ?>
 
         <div class="col-lg-2">
            <div class="slider-movie bg-img-hero d-flex flex-column justify-content-end overflow-hidden h-700rem mb-5 mb-lg-0"
               style="background-image: url(<?php echo $url;?>">
               <div class="slider-movie__hover d-flex flex-column z-index-2 px-4 pb-6 pb-lg-4 transition-1">
                  <div class="mx-1">

                     <div class="slider-movie__hover-watch-now d-flex justify-content-center d-xl-none mb-7">
                        <a class="js-fancybox btn btn-play d-flex align-items-center justify-content-center rounded-circle"
                           href="javascript:;" data-hs-fancybox-options='{
                           "src": "<?php echo $Medias->video_link;?>",
                           "speed": 700
                           }'>
                        <i class="fas fa-play text-primary "></i>
                        </a>
                     </div>
   
                  </div>
               </div>
            </div>
         </div>
		 
         <?php }?> 
 
      </div>
   </div>
 </div>  

<div class="container" style="background: #efefef;padding-top: 30px;padding-bottom: 30PX;">
      <div class="mt-3">
         <section class="home-section section-hot-premier-show  pb-1 ">
		 
            <div class="align-items-center">
             <h6 class="headingtitle text-center">Channels</h6>
			 <hr class="hr--logo">
            </div>
 
            <div class="tab-content">
               <div class="tab-pane fade show active" id="pills-one-code-features-example4" role="tabpanel" aria-labelledby="pills-one-code-features-example4-tab">
                  <div class="row mx-n2">
                     <?php 
                        $series = $this->Mdlfront->get_series_categories('8');
                        
                        foreach($series as $seriess){
                            
                            $title = $seriess->name;
                            $banner = $seriess->banner;
                            $id= $seriess->id;
                        
                        
                            $File = $seriess->banner;
                            if(!empty($File))
                             { 
                                $load_url = 'uploads/sub_categories/'.$File;
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
                        
                             $mediapage = base_url().'front/media/'.$id.'/'.$title;
                        ?>
                     <div class="col-md-6 col-lg-3 col-xs-6 px-2">
                        <div class="position-relative dark mb-4 mb-lg-0 text-center">
                            <a href="<?php echo $mediapage;?>">
                                 <img class="img-fluid seriesimg" src="<?php echo $url;?>" alt="Image-Description">
							</a>
                             <a class="watchbutton" href="<?php echo $mediapage;?>">Watch Now</a>
                        </div>

						
                     </div>
                     <?php }?> 
					 
					 <div class="col-lg-12 text-center">		 
						 <a class="watchbutton" href="<?php echo base_url();?>front/series">VIEW ALL</a>
					 </div>					 
                  </div>
               </div>
            </div>
         </section>
</div>

</div>
<div class="container" style="background: #ffffff;padding-top: 30px;padding-bottom: 30PX;">
      <div class="mt-3">
         <section class="home-section section-hot-premier-show  pb-1 ">
		 
            <div class="align-items-center">
             <h6 class="headingtitle text-center">Topic</h6>
			 <hr class="hr--logo">
            </div>
 
            <div class="tab-content">
               <div class="tab-pane fade show active" id="pills-one-code-features-example4" role="tabpanel" aria-labelledby="pills-one-code-features-example4-tab">
                  <div class="row mx-n2">
                     <?php 
                        $topic = $this->Mdlfront->get_topics0('8');
                        
                        foreach($topic as $seriess){
                            
                            $title = $seriess->name;
                            $banner = $seriess->banner;
                            $id= $seriess->id;
                        
                        
                            $File = $seriess->banner;
                            if(!empty($File))
                             { 
                                $load_url = 'uploads/sub_categories/'.$File;
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
                        
                             $mediapage = base_url().'front/media/'.$id.'/'.$title;
                        ?>
                     <div class="col-md-6 col-lg-3 col-xs-6 px-2">
                        <div class="position-relative dark mb-4 mb-lg-0 text-center">
                            <a href="<?php echo $mediapage;?>">
                                 <img class="img-fluid seriesimg" src="<?php echo $url;?>" alt="Image-Description">
							</a>
                             <a class="watchbutton" href="<?php echo $mediapage;?>">Watch Now</a>
                        </div>

						
                     </div>
                     <?php }?> 
					 
					 <div class="col-lg-12 text-center">		 
						 <a class="watchbutton" href="<?php echo base_url();?>front/topics">VIEW ALL</a>
					 </div>					 
                  </div>
               </div>
            </div>
         </section>
</div>
</div>
      
<?php include("net.php"); ?>
 			
 
<div class="home-newsletter">
<div class="row">
<div class="col-sm-12">
	<div class="single">
		<h2>Subscribe to Conscious Awakening Network News Letter</h2>
	<div class="input-group">
         <input type="email" class="form-control" placeholder="Enter your email">
         <span class="input-group-btn">
         <button class="btn btn-theme" type="submit">Subscribe</button>
         </span>
          </div>
	</div>
</div>
</div>
</div>
 	
 
         <!---- end latest ---->
      </div>
   </div>
</main>

