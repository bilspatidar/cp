 <div class="card">
            <div class="card-body">
             
      
      <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Appointment hours
</button>
                </li>
                
               
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                 <div class="tab-pane fade show active session_views" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="<?php echo base_url(); ?>master/add_appointment_hours" method="POST" id="crudFormFixx">                      
                
                 <div id="hrs_form">
                  </div> 
                  <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
 </form>
                                       
                </div>

              </div><!-- End Default Tabs -->

            </div>
</div>


<script>
    $(document).ready(function(){
        getAppointmentHrs();
    })
    

</script>
<script>
    $("#crudFormFixx").on('submit',(function(e) {
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