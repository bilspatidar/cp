<?php $latest = $this->Mdlfront->get_media_front('16'); ?>


<div class="container" style="background: #ffffff;padding-top: 30px;padding-bottom: 30PX;">
      <div class="mt-3">
         <section class="home-section section-hot-premier-show  pb-1 ">
		 
            <div class="align-items-center">
             <h6 class="headingtitle text-center">Latest Videos</h6>
			 <hr class="hr--logo">
            </div>
 
            <div class="tab-content">
               <div class="tab-pane fade show active" id="pills-one-code-features-example4" role="tabpanel" aria-labelledby="pills-one-code-features-example4-tab">
                  <div class="row mx-n2">
					<?php foreach($latest as $lr){
				$video_type = $lr->video_type; 
				if($video_type=="Youtube_link" && $lr->defaultBannerYutube==0){
					$url = $this->Common->getYoutubeImage($lr->video_link);
				}
				elseif($video_type=="Youtube_link" && $lr->defaultBannerYutube==1){
					
				$load_url = 'uploads/media/'.$lr->banner;
				
				
				
                    if(!empty($lr->banner) && file_exists($load_url))
                    {
                   $url = base_url().$load_url;			
                    }
                    else
                    {
                    $url = base_url().'uploads/no_video_thumb.png';		
                    }
				}
            
			elseif($video_type=="Local"){
               
					$load_url = 'uploads/media/'.$lr->banner;
				
				
				
                    if(!empty($lr->banner) && file_exists($load_url))
                    {
                   $url = base_url().$load_url;			
                    }
                    else
                    {
                    $url = base_url().'uploads/no_video_thumb.png';		
                    }
                }
				
                else
                {
                $url = base_url().'uploads/no_video_thumb.png';
                }
				
				$seriesDetails = base_url().'front/details/'.$lr->id.'/'.$lr->name;
				?>
                     <div class="col-md-6 col-lg-3 col-xs-6 px-2">
                        <div class="position-relative dark mb-4 text-center">
                            <a href="<?php echo $seriesDetails;?>">
                                 <img class="img-fluid seriesimg" src="<?php echo $url;?>" alt="Image-Description">
							</a>
 
                        </div>

						
                     </div>
                     <?php }?> 
 				 
                  </div>
               </div>
            </div>
         </section>
</div>

</div>


  