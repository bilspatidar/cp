<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div id="bulk_images_modal" class="modal" role="dialog" style="z-index:999999">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
     Crop & Insert Image <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <div id="bulk_images"></div>
    </div>
    <div class="modal-footer">
      <input type="hidden" name="img_type" value="">
      <input type="hidden" name="product_id" value="">
      <button class="btn btn-success bulk_crop_images">Submit</button>
      <button type="button" class="btn btn-default" data-bs-dismiss="modal">close</button>
    </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){

  $image_crop = $('#bulk_images').croppie({
      enableExif: true,
      viewport: {
        width:200,
        height:200,
        type:'square' //circle square
      },
      boundary:{
        width:300,
        height:300
      },
      showZoomer: false,
    enableResize: true,
      enableOrientation: true,
    mouseWheelZoom: 'ctrl',
    
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
     
      $('#bulk_images_modal').modal('show');
      $('input[type=hidden][name=img_type]').val($(data).attr('name'));
      $('input[type=hidden][name=product_id]').val($(data).attr('value'));
     
    }
    $(document).on('change','.bulkImage', function(){
        
    var size = $(this)[0].files[0].size; 
    var ext = $(this).val().split('.').pop().toLowerCase();
  
    if($.inArray(ext,['jpeg','jpg','gif','png','xlsx']) == -1){
    alert('Your File Extension Is Not Allowed.');
    $(this).val('');
    }else{
    crop(this);
    }
    });
    $('.bulk_crop_images').click(function(event){

    var name = $('input[type=hidden][name=img_type]').val();
    
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(response){
        
        var urls = "<?php echo base_url(); ?>crop/upload_image_bulk";
          
        var res = response;
        var  myArray = res.split(";");
        var respon = myArray[1].split(",");
         
        $.ajax({
          url:urls,
          type: "POST",
        
           data:{image: respon, name: name },
          
          success:function(data){
            //alert(data);
            var imageValue = data;
            var product_id = $('input[type=hidden][name=product_id]').val();
            var bulkImageUrl = "<?php echo base_url(); ?>master/add_product_bulk_images";
            $.ajax({
          url:bulkImageUrl,
          type: "POST",
        
           data:{name: name,imageValue:imageValue, product_id: product_id },
          
          success:function(response){
			  
              var json = $.parseJSON(response);
              if(json.status==1){
          
                var page_no =$("#pageNumber").html();   
        	    loadTableData(page_no); 
        	     toastr.success(json.msg);
                }
                else{
                    toastr.error(json.msg);
                }
            
            $('#bulk_images_modal').modal('hide');
          }
        });
           
           
          }
        });
      });
      });

  });
  
</script>