 </main><!-- End #main -->

<!--Image Crop-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div id="insertimageModal" class="modal" role="dialog" style="z-index:999999">
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


<!--env-->
<!--<script>-->
<!--    $('#togBtn').change(function(){-->
<!--      if(this.checked) {    -->
<!--         var val = 'on';-->
         
<!--        }else{-->
<!--       var val = 'off';-->
<!--        }-->
       
<!--    })-->
<!--</script>-->
<!--env---->

<script>
  $(document).ready(function(){
  $image_crop = $('#image_demo').croppie({
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
     
      $('#insertimageModal').modal('show');
      $('input[type=hidden][name=img_type]').val($(data).attr('name'));
    }
    $(document).on('change','input[type=file]:not(#cover)', function(){
      // alert('aa');
    // var size = $(this)[0].files[0].size; 
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
       var imageSize = {
            width: 900,
            height: 900,
            type: 'square'
    };
      $image_crop.croppie('result', {
        type: "base64",
        size: imageSize,
        quality:0.6,
        format: 'jpeg',
        circle: false
      }).then(function(response){
        
          var page_title = "<?php echo $page_title;  ?>";
         
      if(page_title=='Member Profile' || page_title=='Exchange Product'){
           var urls = "<?php echo base_url(); ?>crop/upload_image_array";
           var names = name;
       
        }else{ 
          var urls = "<?php echo base_url(); ?>crop/upload_image";
          var names = $('input[type=file][name='+ name +']').val().replace(/C:\\fakepath\\/i, '');
         }
        
          var  res = response;
          var  myArray = res.split(";");
          var  respon = myArray[1].split(",");
          
        $.ajax({
          url:urls,
          type: "POST",
        
           data:{image: respon, name: names },
          
          success:function(data){
     
     // var name1 = name+1;
    //   alert(data);
      var newdata = data.replace(/\s/g, "");
    //   alert(newdata);
            // $('#wait').removeClass("loader");
            $('#insertimageModal').modal('hide');
            if(page_title=='Member Profile' || page_title=='Exchange Product'){
              
                // $("input[type='text'][name='"+ names +"']").val(data);
                
                $("input[type='hidden'][name='"+ names +"']").val(newdata);

            }else{
            $('input[type=hidden][name='+name+']').val(newdata);
            }
            // $("#tmpImage").val(data);
          }
        });
      });
      });

  });
  $(".select2").select2();
  $(document).ready(function() {
    $('select').select2();
});
</script> 


  
  
<!--summernotes-->

<!--Image Crop-->
  <!-- ======= Footer ======= -->
  <footer id="footer0" class="footer"> 
    <div class="copyright">
      &copy; Copyright <strong><span><?php echo BRAND_NAME; ?></span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://boots1trapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      <!--Designed by <a href="tel:7000165361">Sparkhub</a>-->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style ="background-color:#173853;"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/toastr/toastr.min.js"></script>

  <!-- Template Main JS File -->

  <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/tinymce/tinymce.min.js"></script>

  <!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/auto.js"></script>-->
  <!--<script src="<?php echo base_url(); ?>assets/ressponse/crud.js"></script>-->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js" integrity="sha512-6rE6Bx6fCBpRXG/FWpQmvguMWDLWMQjPycXMr35Zx/HRD9nwySZswkkLksgyQcvrpYMx0FELLJVBvWFtubZhDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  
  <?php include('crud.php'); 
       // include('bulkData.php');
  ?>

<!--summernotes-->

<!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->

<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
 
 <script>
$(document).ready(function() {
    $(".summernote").summernote({
        height: 200,
    });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker-iconset-all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.min.js"></script>

<script>


// Custom options
$('.icon_maker').iconpicker({
    align: 'center', // Only in div tag
    arrowClass: 'btn-danger',
    arrowPrevIconClass: 'fas fa-angle-left',
    arrowNextIconClass: 'fas fa-angle-right',
    cols: 10,
    footer: true,
    header: true,
    icon: 'fas fa-bomb',
    iconset: 'fontawesome5',
    labelHeader: '{0} of {1} pages',
    labelFooter: '{0} - {1} of {2} icons',
    placement: 'bottom', // Only in button tag
    rows: 5,
    search: true,
    searchText: 'Search',
    selectedClass: 'btn-success',
    unselectedClass: ''
});
</script>


   
</body>

</html>