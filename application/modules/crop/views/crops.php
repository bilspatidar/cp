<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<input type="file" accept="image/*" name="image" id="profile_photo" class="form-control">

<div id="insertimageModal" class="modal" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
     Crop & Insert Image <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <div id="image_demo"></div>
    </div>
    <div class="modal-footer">
      <input type="hidden" name="img_type" value="">
      <button class="btn btn-success crop_image">Crop Image</button>
      <button type="button" class="btn btn-default" data-bs-dismiss="modal">close</button>
    </div>
    </div>
  </div>
</div>
<div id="wait"></div>

<script>
  $(document).ready(function(){
  $image_crop = $('#image_demo').croppie({
      enableExif: true,
      viewport: {
        width:250,
        height:200,
        type:'square' //circle
      },
      boundary:{
        width:250,
        height:250
      }    
      });
    function crop(data){
      var reader = new FileReader();
      reader.onload = function (event) {
        $image_crop.croppie('bind',{
        url: event.target.result
        }).then(function(){
        console.log('jQuery bind complete');
        });
      }
      reader.readAsDataURL(data.files[0]);
     
      $('#insertimageModal').modal('show');
      $('input[type=hidden][name=img_type]').val($(data).attr('name'));
    }
    $(document).on('change','input[type=file]:not(#cover)', function(){
    var size = $(this)[0].files[0].size; 
    var ext = $(this).val().split('.').pop().toLowerCase();
    if($.inArray(ext,['jpeg','jpg','gif','png']) == -1){
    alert('Your File Extension Is Not Allowed.');
    $(this).val('');
    }else{
    crop(this);
    }
    });
    $('.crop_image').click(function(event){
    //$('#wait').addClass("loader");
    var name = $('input[type=hidden][name=img_type]').val();
   
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(response){
          var urls = "<?php echo base_url(); ?>crop/upload_image";
          var res = response;
           var  myArray = res.split(";");
          var respon = myArray[1].split(",");
          
        $.ajax({
          url:urls,
          type: "POST",
        
           data:{image: respon, name: $('input[type=file][name='+ name +']').val().replace(/C:\\fakepath\\/i, '') },
          
          success:function(data){
              alert(data);
            // $('#wait').removeClass("loader");
            $('#insertimageModal').modal('hide');
            $('input[type=hidden][name='+ name +']').val(data);
          }
        });
      });
      });

  });
</script> 