<script>
$("#crudForm").on('submit',(function(e) {
$(".loading").show();
var post_link = $(this).attr('action');
e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(response){
      var json = $.parseJSON(response);
	  if(json.status==1)
            {
 
     $(".loading").hide();
     toastr.success(json.msg);
     var page_no = 1;  
     loadTableData(page_no);


    $('#crudForm').find("input[type=text],input[type=number],textarea,input").val("");            

             }
            else
            {
              
            $(".loading").hide();
            toastr.error(json.msg);
           }
	  
	},
	error: function(){} 	        
});
}));

$("#crudForm1").on('submit',(function(e) {
$(".loading").show();
var post_link = $(this).attr('action');
e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(response){
      var json = $.parseJSON(response);
	  if(json.status==1)
            {
 
     $(".loading").hide();
     toastr.success(json.msg);
     var page_no = 1;  
     loadTableData(page_no);


    $('#crudForm1').find("input[type=text],input[type=number],textarea,input").val("");            

             }
            else
            {
              
            $(".loading").hide();
            toastr.error(json.msg);
           }
	  
	},
	error: function(){} 	        
});
}));



$("#crudFormFix").on('submit',(function(e) {
$(".loading").show();
var post_link = $(this).attr('action');
e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(response){
      var json = $.parseJSON(response);
	  if(json.status==1)
            {
 
     $(".loading").hide();
     toastr.success(json.msg);
  
    //$('#crudForm').find("input[type=text],input[type=number],textarea,input").val("");            

             }
            else
            {
              
            $(".loading").hide();
            toastr.error(json.msg);
           }
	  
	},
	error: function(){} 	        
});
}));

$("#crudFormRedirect").on('submit',(function(e) {
$(".loading").show();
var post_link = $(this).attr('action');
var redirect_link = $("#redirectLink").val();
e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(response){
      var json = $.parseJSON(response);
	  if(json.status==1)
            {
 
     $(".loading").hide();
     toastr.success(json.msg);
     
  	 window.location.href =  redirect_link+json.res;

    //$('#crudForm').find("input[type=text],input[type=number],textarea,input").val("");            

             }
            else
            {
              
            $(".loading").hide();
            toastr.error(json.msg);
           }
	  
	},
	error: function(){} 	        
});
}));

$("#crudFormRedirectMember").on('submit',(function(e) {
$(".loading").show();
var post_link = $(this).attr('action');
var redirect_link = $("#redirectLink").val();
e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(response){
      var json = $.parseJSON(response);
	  if(json.status==1)
            {
 
     $(".loading").hide();
     toastr.success(json.msg);
     
  	 window.location.href =  redirect_link+json.res+'/edit_modal/';
  
    //$('#crudForm').find("input[type=text],input[type=number],textarea,input").val("");            

             }
            else
            {
              
            $(".loading").hide();
            toastr.error(json.msg);
           }
	  
	},
	error: function(){} 	        
});
}));


$(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  loadTableData(page);
 });
function edit_me(id){

     $("#ExtralargeEditModal .modal-body").html('Loading');
     var get_link = document.getElementById(id).getAttribute('name');
     $.ajax({
         type: "POST",     
         url: get_link,
          success: function(msg) {
         $("#ExtralargeEditModal .modal-body").html(msg);
         
          //var state_id_model = $("#state_id_model").val();
//getCityModal(state_id_model);
//var country_id_model = $("#country_id_model").val();
//getStateModal(country_id_model);
        }               
    });  
     $("#ExtralargeEditModal").modal('show');
   
   
}
function session_data(id){

     $("#course_session .modal-body").html('Loading');
     var get_link = document.getElementById(id).getAttribute('name');
     $.ajax({
         type: "POST",     
         url: get_link,
          success: function(msg) {
            //   alert(msg);
         $("#course_session .modal-body").html(msg);
        
        }               
    });  
     $("#course_session").modal('show');
   
}
function tegging_history(id){

     $("#tagging_history .modal-body").html('Loading');
     var get_link = document.getElementById(id).getAttribute('name');
     $.ajax({
         type: "POST",     
         url: get_link,
          success: function(msg) {
         $("#tagging_history .modal-body").html(msg);
        
        }               
    });  
     $("#tagging_history").modal('show');
   
}
function edit_me_varification(id){

     $("#verificationModal .modal-body").html('Loading');
     var get_link = document.getElementById(id).getAttribute('name');
     $.ajax({
         type: "POST",     
         url: get_link,
          success: function(msg) {
         $("#verificationModal .modal-body").html(msg);
         
          var state_id_model = $("#state_id_model").val();
getCityModal(state_id_model);
 var country_id_model = $("#country_id_model").val();
getStateModal(country_id_model);
        }               
    });  
     $("#verificationModal").modal('show');
   
}
function trashStatus(id){
 var x = confirm("Are you sure?");
    if(x)
    {

  var dataId = document.getElementById(id).getAttribute('name');
   $(".loading").show();
         $.ajax({
         type: "POST",     
         url: id,
         data: {id:dataId},
    
        success: function(response) {
     $(".loading").hide();
        var json = $.parseJSON(response);
	  if(json.status==1){
          
        var page_no =$("#pageNumber").html();   
	    loadTableData(page_no); 
	     toastr.success(json.msg);
        }
           else{
            
               toastr.error(json.msg);
      
            }
        
        }               
    });  
    }
    else
    {
        return false;
    }
} 
function delete_me(id){
 var x = confirm("Are you sure you want to delete?");
    if(x)
    {

  var dataId = document.getElementById(id).getAttribute('name');
   $(".loading").show();
         $.ajax({
         type: "POST",     
         url: id,
         data: {id:dataId},
    
        success: function(response) {
     $(".loading").hide();
        var json = $.parseJSON(response);
	  if(json.status==1){
          
        var page_no =$("#pageNumber").html();   
	    loadTableData(page_no); 
	     toastr.success(json.msg);
        }
           else{
            
               toastr.error(json.msg);
      
            }
        
        }               
    });  
    }
    else
    {
        return false;
    }
} 
function addMemberGroup(id){
 
  
   $(".loading").show();
         $.ajax({
         type: "GET",     
         url: id,
    
        success: function(response) {
     $(".loading").hide();
        var json = $.parseJSON(response);
	  if(json.status==1){
          
        var page_no =1;   
	    loadTableData(page_no); 
	     toastr.success(json.msg);
        }
           else{
            
               toastr.error(json.msg);
      
            }
        
        }               
    });  
} 
function printReceipt(refs)
{
  var strWindowFeatures = "width=1000,height=500,scrollbars=yes,resizable=yes";
  window.open(refs, 'Print', strWindowFeatures);
}

function delete_me_password(id){
 $("#deleteModal input#delURL").val("");      
 $("#pp_result").html("");   
 $("#newpp").val(""); 
 $("#deleteModal input#delURL").val(id); 
 $("#deleteModal").modal('show');
  }
function validate_pp(){
       var newpp = $("#newpp").val(); 
       var oldpp = $("#oldpp").val();  

       if(newpp==oldpp)
       {
          var delURL = $("#delURL").val();
          $("#pp_result").html(""); 
          $("#deleteModal").modal('hide');
         delete_me(delURL); 
         
       }
       else
       {
         $("#pp_result").html("Invalid Password");     
       }
    }
</script>
	
<?php if(isset($tableData)){ if($tableData==1){ ?>
 <script>
$(document).ready(function(){
  loadTableData(1);
});

function loadTableData(page){
	
	$(".loading").show();
	var url = "<?php echo $dataLink; ?>"+page;

	var postData = '';
    //filter
    	var filterOne = $("#filterOne").val();
    	var filterTwo = $("#filterTwo").val();
    	var filterThree = $("#filterThree").val();
    	var filterFour = $("#filterFour").val();
    	var filterFive = $("#filterFive").val();
    	var filterSix = $("#filterSix").val();
    	var filterSeven = $("#filterSeven").val();
		
		var postData = {filterOne:filterOne,filterTwo:filterTwo,filterThree:filterThree,filterFour:filterFour,filterFive:filterFive,filterSix:filterSix,filterSeven:filterSeven};
		
		
    ///end filter
	
	$.ajax({
   url:url,	  
   method:"POST",
   data:postData,
   dataType:"json",
   success:function(data)
   {

	$('#loadTableData').html(data.loadTableData);
    $('#paginationLink').html(data.paginationLink);
    $("#pageNumber").html(data.pageNumber);
    $('#loadTableData1').html(data.loadTableData);
    $('#paginationLink1').html(data.paginationLink);
    $("#pageNumber1").html(data.pageNumber);
	data_table();
	$(".loading").hide();
    
    }
  });
 }

  function data_table()
  {
	  

    var table = $('#datatable').DataTable( {
       paging: false,
       searching: false,
       dom: 'Bfrtip',
        buttons: [ 'excel', 'print','pdf', 'colvis' ]
          
    } );
    

 
    // table.buttons().container()
      // .appendTo( '#example_wrapper .col-md-6:eq(0)' );

 

  }
  
 </script>
 
 
<?php } } ?>



<div class="modal fade" id="deleteModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

 <h4>Enter Profile Password</h4>
         <h5 id="pp_result" style="color:red"></h5>
         <p>
          
        <div class="form-group">         
        <input type="text" class="form-control" id="newpp" placeholder="Profile Password">  
        
        <?php $pp = $this->db->get_where('settings',array('name'=>'pp'))->row()->value; ?>
        <input type="hidden" value="<?php echo$pp; ?>" id="oldpp">
        <input type="hidden" value="" id="delURL">
        
         </div>
        <div class="form-group">
        <button class="btn btn-sm btn-primary" onclick="validate_pp()">Submit</button>
        </div>
             
         </p>                    </div>
                    
                  </div>
                </div>
              </div><!-- End Basic Modal-->
<div class="modal fade" id="ExtralargeEditModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    </div>
                    
                    <div class="modal-footer">
                        
                          
     <script>
 var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
 
  tinymce.init({
    selector: 'textarea.tinymce-editor',
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    link_list: [{
        title: 'My page 1',
        value: 'https://www.tiny.cloud'
      },
      {
        title: 'My page 2',
        value: 'http://www.moxiecode.com'
      }
    ],
    image_list: [{
        title: 'My page 1',
        value: 'https://www.tiny.cloud'
      },
      {
        title: 'My page 2',
        value: 'http://www.moxiecode.com'
      }
    ],
    image_class_list: [{
        title: 'None',
        value: ''
      },
      {
        title: 'Some class',
        value: 'class-name'
      }
    ],
    importcss_append: true,
    file_picker_callback: function(callback, value, meta) {
      /* Provide file and text for the link dialog */
      if (meta.filetype === 'file') {
        callback('https://www.google.com/logos/google.jpg', {
          text: 'My text'
        });
      }

      /* Provide image and alt text for the image dialog */
      if (meta.filetype === 'image') {
        callback('https://www.google.com/logos/google.jpg', {
          alt: 'My alt text'
        });
      }

      /* Provide alternative source and posted for the media dialog */
      if (meta.filetype === 'media') {
        callback('movie.mp4', {
          source2: 'alt.ogg',
          poster: 'https://www.google.com/logos/google.jpg'
        });
      }
    },
    templates: [{
        title: 'New Table',
        description: 'creates a new table',
        content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
      },
      {
        title: 'Starting my story',
        description: 'A cure for writers block',
        content: 'Once upon a time...'
      },
      {
        title: 'New list with dates',
        description: 'New List with dates',
        content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
      }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 600,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image imagetools table',
    skin: useDarkMode ? 'oxide-dark' : 'oxide',
    content_css: useDarkMode ? 'dark' : 'default',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
  });
</script>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
               </div>
</div><!-- End Extra Large Modal-->
<!-- End verification modal-->
<div class="modal fade" id="verificationModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Verification</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
               </div>
</div><!-- End verification modal-->
<!-- End Tagging history modal-->
<div class="modal fade" id="tagging_history" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tagging History</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
               </div>
</div><!-- End tagging history modal-->
<div class="modal fade" id="course_session" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Course Session</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
               </div>
</div><!-- End tagging history modal-->
<div class="modal" id="uploadimageModalff">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                          <div class="row">
       <div class="col-md-8 text-center">
        <div id="image_demo" style="width:350px; margin-top:30px"></div>
       </div>
       <div class="col-md-4" style="padding-top:30px;">
        <br />
        <br />
        <br/>
        <button class="btn btn-success crop_image">Crop & Upload Image</button>
     </div>
                    </div>
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
               </div>
</div>
<script>

   
 function getCurrentLocationModel() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPositionModal);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
 function showPositionModal(position) {
 $("#lattModal").val(position.coords.latitude);
 $("#langModal").val(position.coords.longitude);
}
 function updateButtonOnModal() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheckModal");
  // Get the output text


  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
   $("#updateBtnModal").attr('disabled',false);
  } else {
    $("#updateBtnModal").attr('disabled',true);
  }
}


 function getCurrentLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
// function getCurrentLocation(){
//     navigator.geolocation.getCurrentPosition(
//     function (position) {
//         document.getElementById("latt").value = position.coords.latitude;
//         document.getElementById("lang").value = position.coords.longitude;
//     },
//     function (error) {
//         alert(error.code + ": " + error.message);
//     },
//     {
//         enableHighAccuracy: true,
//         maximumAge: 10000,
//         timeout: 5000
//     }
// );
// }

 function showPosition(position) {
 $("#latt").val(position.coords.latitude);
 $("#lang").val(position.coords.longitude);
}
 function updateButtonOn() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text


  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
   $("#updateBtn").attr('disabled',false);
  } else {
    $("#updateBtn").attr('disabled',true);
  }
}
 
 function getPincode(pinid){
    $(".loading").show();

	url = "<?php echo base_url(); ?>commoncontroller/getPincodeHtml/"+pinid;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#pincode_html').html(data);
   
	 $(".loading").hide();
    
    }
  });
}
 function getpincodeModal(pinid){
    $(".loading").show();
    var pincode_html_modal_default = $("#pincode_html_modal_default").val();
	url = "<?php echo base_url(); ?>commoncontroller/getPincodeHtml/"+pinid+'/'+pincode_html_modal_default;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#pincode_html_modal').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}

 function getCity(sid){
    $(".loading").show();

	url = "<?php echo base_url(); ?>commoncontroller/getStateCityHtml/"+sid;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#cities_html').html(data);
   
	 $(".loading").hide();
    
    }
  });
}
function getCityModal(sid){
    $(".loading").show();
    var cities_html_modal_default = $("#cities_html_modal_default").val();
	url = "<?php echo base_url(); ?>commoncontroller/getStateCityHtml/"+sid+'/'+cities_html_modal_default;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#cities_html_modal').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}



function getState(cid){
    $(".loading").show();
	url = "<?php echo base_url(); ?>commoncontroller/getStateHtml/"+cid;
	
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#states_html').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}

 function getStateModal(cid){
    $(".loading").show();
    var states_html_modal_default = $("#states_html_modal_default").val();
	url = "<?php echo base_url(); ?>commoncontroller/getStateHtml/"+cid+'/'+states_html_modal_default;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#states_html_modal').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}

function getBusinessSubCategories(bid){
    $(".loading").show();
	url = "<?php echo base_url(); ?>commoncontroller/getBusinessSubCategoryHtml/"+bid;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#business_sub_category_html').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}
 function getCategoryTypeModal(bid){
    $(".loading").show();
    var category_html_modal_default = $("#category_html_modal_default").val();
	url = "<?php echo base_url(); ?>commoncontroller/getCategoryHtml/"+bid+'/'+category_html_modal_default;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#Category_html_modal').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}
function getSubCategoryBulk(level_one_id){
    $(".loading").show();
    
	url = "<?php echo base_url(); ?>commoncontroller/getSubCategoryHtml/"+level_one_id;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#subcategory_html1').html(data);
   
	 $(".loading").hide();
    }
  });
	
}
function getLevelTreeCategoryBulk(level_two_id){
    $(".loading").show();
	url = "<?php echo base_url(); ?>commoncontroller/getLevelTreeCategoryHtml/"+level_two_id;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#level_threeh_html1').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}
function getLevelFourCategoryBulk(level_three_id){
    $(".loading").show();
	url = "<?php echo base_url(); ?>commoncontroller/getLevelFourCategoryHtml/"+level_three_id;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#level_four_html1').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}

function getSubCategory(level_one_id){
    $(".loading").show();
    
	url = "<?php echo base_url(); ?>commoncontroller/getSubCategoryHtml/"+level_one_id;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#subcategory_html').html(data);
	 $(".loading").hide();
    }
  });
	
}

 function getSubCategoryModal(caid){
    $(".loading").show();
    var subcategory_html_modal_default = $("#subcategory_html_modal_default").val();
	url = "<?php echo base_url(); ?>commoncontroller/getSubCategoryHtml/"+caid+'/'+subcategory_html_modal_default;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#subcategory_html_modal').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}

 function getLevelTreeCategory(level_two_id){
    $(".loading").show();
	url = "<?php echo base_url(); ?>commoncontroller/getLevelTreeCategoryHtml/"+level_two_id;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#level_threeh_html').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}

 function getLevelTreeCategoryModal(level_three_html){
    $(".loading").show();
    var level_html_modal_default = $("#level_html_modal_default").val();
	url = "<?php echo base_url(); ?>commoncontroller/getLevelTreeCategoryModalHtml/"+level_three_html+'/'+level_html_modal_default;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#level_three_html_modal').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}

 function getLevelFourCategory(level_three_id){
    $(".loading").show();
	url = "<?php echo base_url(); ?>commoncontroller/getLevelFourCategoryHtml/"+level_three_id;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#level_four_html').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}

 function getLevelFourCategoryModal(lftid){
    $(".loading").show();
    var level_four_html_modal_default = $("#level_four_html_modal_default").val();
	url = "<?php echo base_url(); ?>commoncontroller/getLevelFourCategoryModalHtml/"+lftid+'/'+level_four_html_modal_default;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#level_four_html_modal').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}

function getSerSubCategory(scaid){
    $(".loading").show();
	url = "<?php echo base_url(); ?>commoncontroller/getSerSubCategoryHtml/"+scaid;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#sersubcategory_html').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}

 function getSerSubCategoryModal(scaid){
    $(".loading").show();
    var sersubcategory_html_modal_default = $("#sersubcategory_html_modal_default").val();
	url = "<?php echo base_url(); ?>commoncontroller/getSerSubCategoryHtml/"+scaid+'/'+sersubcategory_html_modal_default;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#sersubcategory_html_modal').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}

</script>
    <script>
        
//     function getAttributeType(attribute_id){
//     $(".loading").show();
//     $("#variation_name").attr("type",'text');
//  $("#variation_name").val('');
//     $.ajax({
//          type: "GET",     
//          url: "<?php echo base_url(); ?>master/getAttributeType/"+attribute_id,
//         success: function(msg) {
//          $("#variation_name").attr("type",msg);
//               $(".loading").hide();

// 		}               
//     }); 
// }
        
//         function getProductAttributea(paid){
//     $(".loading").show();
    
// 	url = "<?php echo base_url(); ?>master/getProductAttributeHtml/"+paid;
	
// 	$(".loading").show();
// 	$.ajax({
//   url:url,	  
//   method:"GET",
//   success:function(data)
//   {
       
//     //   $('#productAttr_html'). val(type , data);
//     //   $('#productAttr_html').val(data); 
    
//       alert(data);
//       $('#productAttr_html').prop('type', data);
//     // //   document.getElementById('productAttr_html').type = 'data';
//         // $('#productAttr_html'),('type' , data);

// 	 $(".loading").hide();
    
//     }
//   });
// }
//  function getProductAttributeModal(paid){
//     $(".loading").show();
//     var productAttri_html_modal_default = $("#productAttri_html_modal_default").val();
// 	url = "<?php echo base_url(); ?>master/getProductAttributeHtml/"+paid+'/'+productAttri_html_modal_default;
// 	$(".loading").show();
// 	$.ajax({
//   url:url,	  
//   method:"GET",
//   success:function(data)
//   {
// 	$('#pAttribute_html_modal').html(data);
   
// 	 $(".loading").hide();
    
//     }
//   });
	
// }

        function getAttributeType(apid){
    $(".loading").show();
	url = "<?php echo base_url(); ?>commoncontroller/getgetproAttriHtml/"+apid;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#variant_html').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}

 function getproAttriModal(lftid){
    $(".loading").show();
    var attri_html_modal_default = $("#attri_html_modal_default").val();
	url = "<?php echo base_url(); ?>commoncontroller/getLevelFourCategoryModalHtml/"+lftid+'/'+attri_html_modal_default;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#variant_html_model').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}

function getLevelFourProductHsn(){
          $(".loading").show();
var level_one_id = $("#level_one_category_id").val();          
var level_two_id = $("#subcategory_html").val();          
var level_three_id = $("#level_threeh_html").val();          
var level_four_id = $("#level_four_html").val();
var level_url = "<?php echo base_url(); ?>master/get_product_hsn_code_level_four/"+level_one_id+'/'+level_two_id+'/'+level_three_id+'/'+level_four_id;
    $.ajax({
         type: "GET",     
         url: level_url,
        success: function(msg) {
         $("#hsnCode").html(msg);
               $(".loading").hide();

		}               
    }); 
}



 function getAppointmentHrs(usersId=''){
     var check = $('#default:checked').val();
     var usersId = $('#users_id').val();
    $(".loading").show();
	url = "<?php echo base_url(); ?>master/get_appointment_hours/"+check+'/'+usersId;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#hrs_form').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}




        
    </script>
 <script>
 
    var i = "1";
    $(document).on('click','.add',function(e) {
        var name = $(this).attr("name");
        // alert(name);
       $('tbody#'+name).append('<tr class="delRow1_'+name+i+'" ><td></td><td><select class="form-control select2 myselet input-sm"  name="start_time['+name+'][]"><?php $starttime3 = '00:00'; $endtime3 = '23:30';  $duration3 = '30'; $array_of_time3 = array (); $start_time3 = strtotime ($starttime3); $end_time3=strtotime ($endtime3); $add_mins3  = $duration3 * 60; while ($start_time3 <= $end_time3) { $time3 = date ("h:i A", $start_time3); $timeValue3 = date ("H:i:s", $start_time3); ?> <option value="<?php  echo  $timeValue3; ?>"><?php  echo  $time3; ?></option><?php  $start_time3 += $add_mins3; } ?></select></td><td><select class="form-control select2 myselet input-sm"  name="end_time['+name+'][]"><?php $starttime4 = '00:00'; $endtime4 = '23:30';  $duration4 = '30'; $array_of_time4 = array (); $start_time4 = strtotime ($starttime4); $end_time4=strtotime ($endtime4); $add_mins4  = $duration4 * 60; while ($start_time4 <= $end_time4) { $time4 = date ("h:i A", $start_time4); $timeValue4 = date ("H:i:s", $start_time4); ?> <option value="<?php  echo  $timeValue4; ?>"><?php  echo  $time4; ?></option><?php  $start_time4 += $add_mins4; } ?></select></td></td><td><a href="javascript:void(0)" class="remove delete-record" name='+name+i+'><i class="fa fa-minus-circle" style="color:red"></i></a></td></tr>');
 i++;

});

 jQuery(document).delegate('a.delete-record', 'click', function(e) {
     e.preventDefault();    
     var names = $(this).attr('name');
     var didConfirm = confirm("Are you sure You want to delete");
     if (didConfirm == true) {
		  
	
		   $("tr.delRow1_"+names).remove();
     
		  
    return true;
  } else {
    return false;
  }
});

 jQuery(document).delegate('a.delete-tableRecord', 'click', function(e) {
     e.preventDefault();    
     var names = $(this).attr('name');
     alert(names);
     var didConfirm = confirm("Are you sure You want to delete");
     if (didConfirm == true) {
		  
	
		   $("tr.delRow1_"+names).remove();
     
		  
    return true;
  } else {
    return false;
  }
});
function delete_defaultHour(id){
    
    var x = confirm("Are you sure you want to delete?");
    if(x){
        var dataId = document.getElementById(id).getAttribute('name');
        
        $(".loading").show();
        $.ajax({
            type: "POST",     
            url: id,
            data: {id:dataId},
            success: function(response) {
            $(".loading").hide();
            var json = $.parseJSON(response);
    	    if(json.status==1){
                toastr.success(json.msg);
                getAppointmentHrs();
            }else{
                toastr.error(json.msg);
            }
            }               
        });  
    }else{
        return false;
    }
} 


function getStateAdmin(sid){
    $(".loading").show();
	url = "<?php echo base_url(); ?>commoncontroller/getStateAdminHtml/"+sid;
	
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#states_admin_html').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}
function getStateAdminModal(sid){
    $(".loading").show();
    var states_admin_html_modal_default = $("#states_admin_html_modal_default").val();
	url = "<?php echo base_url(); ?>commoncontroller/getStateAdminHtml/"+sid+'/'+states_admin_html_modal_default;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#states_admin_html_modal').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}
</script>

