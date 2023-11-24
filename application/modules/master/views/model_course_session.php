
<!-- Button trigger modal -->
 <div class="tab-content pt-2" id="myTabContent">
                 <div class="tab-pane fade show active session_views" id="home" role="tabpanel" aria-labelledby="home-tab">
                   <form class="form-inline filterForm">
                       <div div class="row" >
                        <div class="col-md-3"> <lable>Name</lable> <input type="text" id="filterOne_model" class="form-control input-sm"> </div>
                       <div class="col-md-3" style="z-index: 999;"> <lable>Status</lable> <select id="filterTwo_model" class="form-control input-sm"><option value="">Status</option><option value="Active">Active</option><option value="Deactive">Deactive</option></select> </div>
                       <div class="col-md-3" style="z-index: 999;"> <lable>Show Deleted</lable> <select id="filterThree_model" class="form-control input-sm"><option value="0">No</option><option value="1">Yes</option></select> </div>  
                       <div class="col-md-2"><lable><br></lable><button class="btn btn-outline-primary" type="button" onClick="loadTableData_model(1)">SEARCH</button></div></div></form>

                     

   <a href='<?php echo base_url();?>master/course' >
     Course</a>
           
      
      
       
<!-- Modal -->
                   
                                       
                                       
                                       
                </div>
                <div class="tab-pane fade session_adds" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                
               </div>
             
              </div><!-- End Default Tabs -->

 <!--<form id="crudForm" action="<?php echo base_url(); ?>master/add_model_course_session/update" method="POST" class="row g-3">-->
    
         <!--echo $allcourse_session = $this->Mdlmaster->get_model_course_session();-->

 <p>
			<div id="pageNumber_model" style="display:none;"></div>
                          
                               <div class="table-responsive" id="loadTableData_model">
                                   
                                   <h3>Data is loading please wait..   <i class="fa fa-refresh fa-spin"></i> </h3>
                               </div>
                               <div align="right" id="paginationLink_model"></div>
                                          
						       
                      
                                           
                                       </p>




<script>
    $("#crudFormEditM1").on('submit',(function(e) {
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
	  
	},
	error: function(){} 	        
});
}));

</script>

 <script>
$(document).ready(function(){
  loadTableData_model(1);
});

function loadTableData_model(page){
	

	var url = "<?php base_url(); ?>master/get_model_course_session/"+page;
	var postData = '';
    //filter
   
    	var filterOne_model = $("#filterOne_model").val();
    	var filterTwo_model = $("#filterTwo_model").val();
    	var filterThree_model = $("#filterThree_model").val();
    	var filterFour_model = $("#filterFour_model").val();
    	var filterFive_model = $("#filterFive_model").val();
    	
    	
    	
		var postData = {filterOne_model:filterOne_model,filterTwo_model:filterTwo_model,filterThree_model:filterThree_model,filterFour_model:filterFour_model,filterFive_model:filterFive_model};
		
	
    ///end filter
	
	$.ajax({
   url:url,	  
   method:"POST",
   data:postData,
   dataType:"json",
   success:function(data)
   {
	$('#loadTableData_model').html(data.loadTableData);
    $('#paginationLink_model').html(data.paginationLink);
    $("#pageNumber_model").html(data.pageNumber);
	data_table_model();

    
    }
  });
 }

  function data_table_model()
  {
      
    var table = $('#datatable_model').DataTable_model( {
       paging: false,
       searching: false,
       dom: 'Bfrtip',
        buttons: [ 'excel', 'print','pdf', 'colvis' ]
          
    } );
    

 
    // table.buttons().container()
      // .appendTo( '#example_wrapper .col-md-6:eq(0)' );

 

  }
  
 </script>
 

