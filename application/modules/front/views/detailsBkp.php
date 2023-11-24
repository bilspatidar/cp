<style>

.max-w-35rem {
    max-width: 25rem;
}
</style> 


<main id="content">
<div class="bg-gray-1100 pb-5 pb-lg-10">
<div class="container px-md-6 mb-2">
<nav aria-label="breadcrumb">
<ol class="breadcrumb dark font-size-1">
<li class="breadcrumb-item"><a href="<?php echo base_url();?>front/index" class="text-gray-1300">Home</a></li>
<li class="breadcrumb-item"><a href="<?php echo base_url();?>front/series" class="text-gray-1300">Media</a></li>
 <li class="breadcrumb-item text-white active" aria-current="page"> Details</li>
 </ol>
</nav>

<?php
         $catName = $this->Common->get_col_by_key('sub_categories','id',$result[0]->id,'name');
		 $genersName = $this->Common->get_col_by_key('geners','id',$result[0]->gener_id,'title');

        $File = $result[0]->banner;
		if(!empty($File))
		 { 
	        $load_url = 'uploads/media/'.$File;
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
		
		 

		$videodescription = $result[0]->video_description;
          $added = getDateTimeFormat($result[0]->added);
          $addedBy_id = $result[0]->addedBy;
		   $videolink = $result[0]->video_link;

        $addedBy = $this->Common->get_col_by_key('users','users_id',$addedBy_id,'name');
  ?>
  
  <?php
// replace:
  $nu =  str_replace("/watch?v=", "/embed/", $videolink);
?>
<!-- <style>
.video-container {
    overflow: hidden;
    position: relative;
    width:100%;
}

.video-container::after {
    padding-top: 56.25%;
    display: block;
    content: '';
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style> -->
<!-- 
<div style="height:400px; width:400px; overflow: hidden;">
<iframe width="400px"    src="<?php echo $nu; ?>
?theme=dark&autoplay=1&autohide=0&cc_load_policy=1&modestbranding=1&fs=0&showinfo=0&rel=0&iv_load_policy=3&mute=0&loop=1"   style="height:400px;  background:#000000; bottom: 60px; position: relative;"  
sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation">

</iframe>
</div>


<div class="video-container">
<iframe class="position-absolute w-100 h-lg-down-100 position-xl-relative top-0 bottom-0 border-0" 
height="620" src="<?php echo $nu; ?>?theme=dark&autoplay=1&autohide=0&cc_load_policy=1&modestbranding=1&fs=0&showinfo=0&rel=0&iv_load_policy=3&mute=0&loop=1" 
  
sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation" allowfullscreen></iframe>
</div>

<br><br> -->
<div class="row">
<div class="col-lg mb-5 mb-lg-0">
<div id="fancyboxGallery">
<div>
<div>

   
<div class="position-relative min-h-270rem mb-2d mr-xl-3">


<div class="plyr__video-embed" id="player">
  <iframe controls crossorigin playsinline
    src="<?php echo $nu; ?>?theme=dark&autoplay=1&autohide=1&cc_load_policy=1&modestbranding=1&fs=0&showinfo=0&rel=0&iv_load_policy=3&mute=0&loop=1" 
  
  sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation" 
    allowfullscreen
   
	
    allow="autoplay"
  ></iframe>
</div>

</div>

<div class="mb-7 pb-1">
<div class="d-md-flex align-items-center justify-content-between mb-1">
<div>
<h6 class="font-size-24 text-white font-weight-semi-bold font-secondary mb-3 mb-md-1"><?php echo $result[0]->name;?></h6>
<ul class="list-unstyled nav nav-meta font-secondary mb-3 overflow-auto overflow-md-hidden flex-nowrap flex-md-wrap">
<li class="text-white flex-shrink-0 flex-shrink-md-1"><?php echo $addedBy;?></li>
<li class="text-white flex-shrink-0 flex-shrink-md-1"><?php echo $added;?></li>
<li class="text-white flex-shrink-0 flex-shrink-md-1">
<a href="#"><?php echo $genersName;?></a>
<span>,</span>
<a href="#"><?php echo $catName;?></a>
</li>
</ul>
</div>
</div>
<p class="text-gray-1300 font-size-1 mb-md-0"></p>
</div>
<div class="mb-7">
<div class="tab-nav__v10 mb-6">
<ul class="nav overflow-auto overflow-md-hidden flex-nowrap flex-md-nowrap justify-content-md-center border-bottom border-gray-5300" 
role="tablist">
<li class="nav-item">
<a class="nav-link active" id="pills-one-code-features-example2-tab" 
data-toggle="pill" href="#pills-one-code-features-example2" role="tab" aria-controls="pills-two-code-features-example2" 
aria-selected="true">Description</a>
</li>

</ul>
</div>
<div class="text-light" style="color:white !important">
<?php echo $videodescription;?>

</div>
</div>



<section>

<div class="movies-tvshow-cards-main-container">
        <div class="movies-tvshow-cards-container">
		<article class="">
			<div class="video-sec">
				<p class="video-sec-title text-light">Related Videos</p>
				<ul class="video-sec-middle" id="vid-grid">	


<?php echo $this->Mdlfront->get_related_series($result[0]->id,$result[0]->sub_category_id);?>



				
				
				
				</ul>
				
			</div>
		</article>

</div>
</div>
</section>




</div>
</div>
</div>
</div>


<div class="col-lg-auto">
<div class="pl-2 max-w-35rem">
<div class="mb-5">
	<?php
	$video_type = $result[0]->video_type; 
	if($video_type=="Youtube_link" && $result[0]->defaultBannerYutube==0){
    $url = $this->Common->getYoutubeImage($result[0]->video_link);
  }
      elseif($video_type=="Youtube_link" && $result[0]->defaultBannerYutube==1){
    $load_url = 'uploads/media/'.$result[0]->banner;
  
  
  
              if(!empty($result[0]->banner) && file_exists($load_url))
              {
             $url2 = base_url().$load_url;			
              }
              else
              {
              $url2 = base_url().'uploads/no_video_thumb.png';		
              }
  }
      
elseif($video_type=="Local"){
         
    $load_url = 'uploads/media/'.$result[0]->banner;
  
  
  
              if(!empty($result[0]->banner) && file_exists($load_url))
              {
             $url2 = base_url().$load_url;			
              }
              else
              {
              $url2 = base_url().'uploads/no_video_thumb.png';		
              }
          }
  
          else
          {
          $url2 = base_url().'uploads/no_video_thumb.png';
          }
?>
<img class="img-fluid" src="<?php echo $url2;?>" alt="Image-Description">
</div>


<div class="bg-gray-3100 pt-5 pb-1 px-3">
<div class="mx-1">

<div class="border-bottom d-xl-flex pb-2d mb-2 align-items-center border-gray-3200">
<h3 class="font-size-22 text-white mb-xl-0 font-weight-medium">
Top 5 List
</h3>
 </div>
 
<div>
<ol class="list-counter v1 list-unstyled">

<?php
$medias = $this->Mdlfront->get_media_front('5');
                                    foreach($medias as $media){
                                        $mediaName = $media->name;
                                        $mediaId = $media->id; 
										 $id = $media->id;
										$genername = $media->gener_id; 
										$added = getDateTimeFormat($media->added);
										$subCategoryId = $media->sub_category_id; 


                                        $mediaDatils = base_url().'front/details/'.$id.'/'.$mediaName;

										$genersnames = $this->Common->get_col_by_key('geners','id',$genername,'title');
										$subCategory = $this->Common->get_col_by_key('sub_categories','id',$subCategoryId,'name');


                                    ?>

<li class="d-flex border-gray-3200 pl-5 border-bottom py-2d align-items-center">

<div class="ml-3">
<span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1"><?php echo $added;?></span>
<h6 class="mb-0 font-size-14 product-title"><a href="<?php echo $mediaDatils;?>" class="text-white"><?php echo $mediaName;?></a></h6>
<a href="<?php echo $mediaDatils;?>" class="font-size-12"><?php echo $genersnames;?></a>
<span class="text-white">,</span>
<a href="<?php echo $mediaDatils;?>" class="font-size-12"><?php echo $subCategory;?></a>
</div>
</li>

<?php } ?>


</ol>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>

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