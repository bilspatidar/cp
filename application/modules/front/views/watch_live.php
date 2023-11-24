


<div class="container bg-gray-1100 pb-5 pb-lg-10">
<div class="row" style="padding:30px;">
 <div class="col-md-2"></div>
 <div class="col-md-8">
 

<!-- CSS  -->
<link href="https://vjs.zencdn.net/7.2.3/video-js.css" rel="stylesheet">


<!-- HTML -->


<?php $ls = $this->db->get('live_streaming'); 
if($ls->num_rows()>0){
	$ls_res = $ls->result();
    $status = $ls_res[0]->status;
	$link = $ls_res[0]->rtmp1;
	$message = $ls_res[0]->rtmp2;
	if($status=='Active' && !empty($link)){
?>
<video id='hls-example'  class="video-js vjs-default-skin" width="840" height="600" controls>
<source type="application/x-mpegURL" src="<?php echo $link; ?>">
</video>
<br>

<h4 style="color:white !important">
Live streaming depends on your internet connection. To have a smooth live streaming experience, 
you need to have a high-speed internet connection.
<h4>
<?php } else { echo '<div style="position: relative; background-color: black; color: white; text-align: center;height:400px; 

background-size: cover; background-position: center;">
          <h4 style="position: relative; z-index: 1; color: white; line-height: 22.4;">' . $message . '</h4>
        </div>';  } } ?>

<!-- JS code -->
<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.js"></script>
<script src="https://vjs.zencdn.net/7.2.3/video.js"></script>
<script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>

<script>
var player = videojs('hls-example');
player.play();
</script>



   
 </div>
</div>
</div>