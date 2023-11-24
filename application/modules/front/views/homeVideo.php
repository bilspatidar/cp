<style>
:root {
    --control-background: #444;
    --control-buttons: #55ff63;
    --control-track: #95989a;
}

body {
    margin: 0;
}

.video-element {
 
    height:100vh;
    position: relative;
    background: black;
   
}

.video-element .video-logo{
    position: absolute;
    width: 15%;
    margin: 20px;
    opacity: 0.5;
    filter: drop-shadow(0 0 5px #444)
}

.video-element .video-cover {
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    color: #55ff63;
    justify-content: center;
    align-items: center;
    font-size: 8rem;
    background: #44444480;
    z-index: 10;
    transition: 0.2s;
}

.video-element video {
    width: 100%;
    height: 100%;
}

.video-element .control-box {
    position: absolute;
    bottom: 0;
    left: 0;
    background: var(--control-background);
    width: 100%;
    height: 10%;
    display: flex;
    align-items: center;
    transition: 0.2s;
    transform: translateY(100%);
    opacity: 0;
}

.video-element .control-box .play-pause {
    height: 100%;
    position: relative;
    top: 0;
    left: 0;
    background: no-repeat;
    border: none;
    box-sizing: border-box;
    padding: 10px;
    color: var(--control-buttons);
    outline: none;
    transition: 0.2s;
    margin: 0 10px 0 0;
    width: 30px;
    cursor: pointer;
}



.video-element .control-box .progress-slider {
    width: 80%;
    cursor: pointer;
}

.video-element .control-box .completed-track {
    height: 3px;
    width: 0;
    background: var(--control-buttons);
    position: absolute;
    left: 40px;
}

.video-element .control-box .completed-track {
    height: 3px;
    width: 0;
    background: var(--control-buttons);
    position: absolute;
    left: 40px;
}

.time-duration {
    height: 100%;
    display: flex;
    align-items: center;
    margin: 0 0 0 5px;
    font-family: monospace;
    color: var(--control-buttons);
}


.video-element .control-box .full-screen,
.video-element .control-box .mute-button {
    height: 100%;
    background: no-repeat;
    border: none;
    box-sizing: border-box;
    padding: 10px;
    color: var(--control-buttons);
    outline: none;
    transition: 0.2s;
    margin: 0 0 0 10px;
    width: 30px;
    cursor: pointer;
}

.video-element .control-box .mute-button {
    margin: 0 10px 0 0;
}

.video-element .control-box .play-pause:hover,
.video-element .control-box .mute-button:hover,
.video-element .control-box .full-screen:hover {
    background: var(--control-buttons);
    color: white;
}


.video-element .control-box .volume-button {
    width: 8%;
    position: relative;
    right: 10px;
    cursor: pointer;
}


.video-element .control-box .present-volume {
    height: 3px;
    width: 0;
    background: var(--control-buttons);
    position: absolute;
    right: 30px;
    transform-origin: left;
}

video::-moz-focus-outer {
    border: 0;
}

input::-moz-focus-outer {
    border: 0;
}

button::-moz-focus-outer {
    border: 0;
}




/*Range styling*/

input[type=range] {
    -webkit-appearance: none;
    background: transparent;
}


input[type=range]::-webkit-slider-thumb {
    -webkit-appearance: none;
}

input[type=range]:focus {
    outline: none;
}

input[type=range]::-ms-track {
    width: 100%;
    cursor: pointer;
    background: transparent;
    border-color: transparent;
    color: transparent;
}

input[type=range]::-webkit-slider-thumb {
    width: 20px;
    height: 20px;
    background: var(--control-buttons);
    border-radius: 50%;
    margin-top: -8.5px;
}


input[type=range]::-moz-range-thumb {
    width: 20px;
    height: 20px;
    background: var(--control-buttons);
    border-radius: 50%;
    border: none;
}


input[type=range]::-ms-thumb {
    width: 20px;
    height: 20px;
    background: var(--control-buttons);
    border-radius: 50%;
}

input[type=range]::-webkit-slider-runnable-track {
    width: 100%;
    height: 3px;
    background: var(--control-track)
}

input[type=range]::-mo-range-track {
    width: 100%;
    height: 3px;
    background: var(--control-track)
}

input[type=range]::-ms-track {
    width: 100%;
    height: 3px;
    background: var(--control-track)
}


input[type=range]::-ms-fill-lower {
    background: var(--control-buttons)
}

input[type=range]::-ms-fill-upper {
    background: var(--control-track)
}

@-webkit-keyframes rotating /* Safari and Chrome */ {
  from {
    -webkit-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes rotating {
  from {
    -ms-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  to {
    -ms-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -webkit-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
.rotating {
  -webkit-animation: rotating 2s linear infinite;
  -moz-animation: rotating 2s linear infinite;
  -ms-animation: rotating 2s linear infinite;
  -o-animation: rotating 2s linear infinite;
  animation: rotating 2s linear infinite;
}
</style>

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
    $File = $result->thumbnail;
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
<div class="row">

<div class="col-md-6">
<div class="video-element">

    <div class="video-cover"><i class="fas fa-play"></i></div>
    <video class="my-video" posterss="https://preview.ibb.co/cw1LNd/Screenshot_from_2018_06_02_16_07_50.png" style="width:100%">
        <source src="<?php echo $vurl; ?>" style="width:100%">
    </video>
    <div class="control-box">
        <button class="play-pause"><i class="fas fa-play"></i></button>
        <div class="completed-track"></div>
        <input type="range" min="0" max="100" step="0.001" class="progress-slider" value="0">
        <div class="time-duration">00:00/00:00</div>
        <button class="full-screen"><i class="fas fa-expand"></i></button>
        <button class="mute-button"><i class="fas fa-volume-up"></i></button>
        <input type="range" min="0" max="1" step="0.1" class="volume-button" value="1" />
        <div class="present-volume"></div>
    </div>
</div>
</div>
<div class="col-md-6">


</div>

</div>


<script>
let play_state = 0;
let vol_state = 1;
let last_vol = 1;
let a;

var width = document.querySelector(".volume-button").getBoundingClientRect().width;
document.querySelector(".present-volume").style.width = '${(width-18)*last_vol}px';
document.onload = function() {
    let m = document.querySelector(".my-video")
    var minutes = Math.floor(m.duration / 60);
    minutes = (minutes > 9) ? minutes : '0${minutes}'
    var seconds = Math.floor(((m.duration / 60) - minutes) * 60);
    seconds = (seconds > 9) ? seconds : '0${seconds}'
    document.querySelector(".time-duration").innerHTML = '00:00/${minutes}:${seconds}';
}


document.querySelector(".play-pause").onclick = function() {
    document.querySelector('.video-cover').innerHTML = '<i class="fas fa-play"></i>';
    if (play_state == 0 || play_state == 2) {
        play_state = 1;
        document.querySelector(".my-video").play()
        this.innerHTML = '<i class="fas fa-pause"></i>';
        document.querySelector(".video-cover").style.opacity = "0";
    } else {
        play_state = 0;
        document.querySelector(".my-video").pause()
        this.innerHTML = '<i class="fas fa-play"></i>';
        document.querySelector(".video-cover").style.opacity = "1";

    }
}

document.querySelector(".my-video").onclick = function() {
    e = document.querySelector(".play-pause")
    document.querySelector('.video-cover').innerHTML = '<i class="fas fa-play"></i>';
    if (play_state == 0) {
        play_state = 1;
        document.querySelector(".my-video").play()
        e.innerHTML = '<i class="fas fa-pause"></i>';
        document.querySelector(".video-cover").style.opacity = "0";

    } else {
        play_state = 0;
        document.querySelector(".my-video").pause()
        e.innerHTML = '<i class="fas fa-play"></i>';
        document.querySelector(".video-cover").style.opacity = "1";
    }
}


document.querySelector(".video-cover").onclick = function() {
    e = document.querySelector(".play-pause")
    document.querySelector('.video-cover').innerHTML = '<i class="fas fa-play"></i>';

    if (play_state == 0 || play_state == 2) {
        play_state = 1;
        document.querySelector(".my-video").play()
        e.innerHTML = '<i class="fas fa-pause"></i>';
        document.querySelector(".video-cover").style.opacity = "0";

    } else {
        play_state = 0;
        document.querySelector(".my-video").pause()
        e.innerHTML = '<i class="fas fa-play"></i>';
        document.querySelector(".video-cover").style.opacity = "1";
    }
}

var $video=$('.my-video');
//fullscreen button clicked
$('.full-screen').on('click', function() {
$(this).toggleClass('enterFullscreenBtn');
    if($.isFunction($video.get(0).webkitEnterFullscreen)) {
              if($(this).hasClass("enterFullscreenBtn")){
                  document.querySelector('.video-element').webkitRequestFullScreen();
                  document.querySelector('.control-box').style.height = '7%';
              }   
              else{ 
                document.webkitCancelFullScreen();  
                document.querySelector('.control-box').style.height = '10%';
              }
    }  
    else if ($.isFunction($video.get(0).mozRequestFullScreen)) {
              if($(this).hasClass("enterFullscreenBtn")){
                  document.querySelector('.video-element').mozRequestFullScreen(); 
                  document.querySelector('.control-box').style.height = '7%';
              }
               else{
                  document.mozCancelFullScreen();  
                  document.querySelector('.control-box').style.height = '10%';
               }
    }
    else { 
           alert('Your browsers doesn\'t support fullscreen');
    }
});

document.querySelector(".volume-button").oninput = function() {
    document.querySelector(".my-video").volume = this.value
    last_vol = this.value
    console.log(last_vol)
    var width = document.querySelector(".volume-button").getBoundingClientRect().width;
    document.querySelector(".present-volume").style.transform = 'scaleX(${last_vol})'
    if (this.value == 0) {
        vol_state = 0;
        document.querySelector(".mute-button").innerHTML = '<i class="fas fa-volume-off"></i>'
    } else {
        vol_state = 1;
        document.querySelector(".mute-button").innerHTML = '<i class="fas fa-volume-up"></i>'
    }
}

document.querySelector(".mute-button").onclick = function() {
    var width = document.querySelector(".volume-button").getBoundingClientRect().width;
    if (vol_state == 1) {
        document.querySelector(".my-video").volume = 0;
        vol_state = 0;
        this.innerHTML = '<i class="fas fa-volume-off"></i>';
        document.querySelector(".volume-button").value = 0;
        document.querySelector(".present-volume").style.transform = 'scaleX(0)'
    } else {
        document.querySelector(".my-video").volume = last_vol;
        document.querySelector(".volume-button").value = last_vol;
        vol_state = 1;
        this.innerHTML = '<i class="fas fa-volume-up"></i>';
        document.querySelector(".present-volume").style.transform = 'scaleX(${last_vol})'
    }
}

document.querySelector(".my-video").ontimeupdate = function() {
    var percentage = Math.floor((100 / this.duration) *
        this.currentTime);
    document.querySelector(".progress-slider").value = percentage;
    var width = document.querySelector(".progress-slider").getBoundingClientRect().width;
    document.querySelector(".completed-track").style.width = '${width*percentage/100}px'

    var minutes = Math.floor(this.duration / 60);
    minutes = (minutes > 9) ? minutes : '0${minutes}'
    var seconds = Math.floor(((this.duration / 60) - minutes) * 60);
    seconds = (seconds > 9) ? seconds : '0${seconds}'

    var c_minutes = Math.floor(this.currentTime / 60);
    c_minutes = (c_minutes > 9) ? c_minutes : '0${c_minutes}'

    var c_seconds = Math.floor(((this.currentTime / 60) - c_minutes) * 60);
    c_seconds = (c_seconds > 9) ? c_seconds : '0${c_seconds}'
    document.querySelector(".time-duration").innerHTML = '${c_minutes}:${c_seconds}/${minutes}:${seconds}'

    if (this.duration == this.currentTime) {
        document.querySelector(".progress-slider").value = 0;
        var width = document.querySelector(".progress-slider").getBoundingClientRect().width;
        document.querySelector(".completed-track").style.width = '${0}px'
        document.querySelector(".play-pause").innerHTML = '<i class="fas fa-redo-alt"></i>';
        document.querySelector('.video-cover').innerHTML = '<i class="fas fa-redo-alt"></i>';
        play_state = 2;
        document.querySelector(".video-cover").style.opacity = "1";
    }
}

document.querySelector(".progress-slider").oninput = function() {
    e = document.querySelector(".my-video");
    var percentage = this.value;
    var ctime = Math.floor((e.duration * this.value) / 100)
    e.currentTime = ctime;
    var width = document.querySelector(".progress-slider").getBoundingClientRect().width;
    document.querySelector(".completed-track").style.width = '${width*percentage/100}px'
}

document.querySelector(".video-element").onmousemove = function() {
    clearTimeout(a);
    document.querySelector(".video-element .control-box").style.transform = "none";
    document.querySelector(".video-element .control-box").style.opacity = "1";
    document.querySelector(".video-cover").style.height = "90%";
    a = setTimeout(function() {
        document.querySelector(".video-element .control-box").style.transform = "translateY(100%)";
        document.querySelector(".video-element .control-box").style.opacity = "0";
        document.querySelector(".video-cover").style.height = "100%";
    }, 3000)

}


document.querySelector('.my-video').onwaiting = function() {
  document.querySelector('.video-cover').innerHTML = '<i class="fas fa-spinner rotating"></i>'
  document.querySelector('.video-cover').style.opacity = '1'
}

document.querySelector('.my-video').oncanplay = function() {
  if (play_state != 0 && play_state != 2) {
    document.querySelector('.video-cover').style.opacity = '0';
  }
  document.querySelector('.video-cover').innerHTML = '<i class="fas fa-play"></i>';
}
</script>