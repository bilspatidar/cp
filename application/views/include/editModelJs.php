<script>
    $("#crudFormEdit").on('submit',(function(e) {
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
     var page_no = $("#pageNumber").html();  
     loadTableData(page_no);
     $("#ExtralargeEditModal").modal('hide');
            }
            else
            {
              
            $(".loading").hide();
            toastr.error(json.msg);
           }
	  $(".loading").hide();
	},
	error: function(){} 	        
});
}));
$("#taggingHistory").on('submit',(function(e) {
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
    loadTableData(1);
    // $('#taggingHistory')[0].reset();
    $('#tagging_history').modal('hide');
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
</script>