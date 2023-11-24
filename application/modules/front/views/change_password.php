
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<style>
    body{
    margin-top:20px;
    background:#f8f8f8
}

.allBtn{
  background-image: linear-gradient(#634986, #6f5296);
  border: 0;
  border-radius: 4px;
  box-shadow: rgba(0, 0, 0, .3) 0 5px 15px;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  font-family: Montserrat,sans-serif;
  font-size: .9em;
  margin: 5px;
  padding: 10px 15px;
  text-align: center;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}
.allBtn:hover {
  color:#fff !important;
}
.allBtn00{
  /*width: auto;*/
  height: 60px;
  cursor: pointer;
  background: transparent;
  border: 1px solid #CA1515;
  outline: none;
  transition: 1s ease-in-out;
  color:#CA1515 !important;  
  text-align: center;
vertical-align: middle;
}

.allBtn00:hover {
  transition: 1s ease-in-out;
  background: #CA1515;
  color:#fff !important;
}
.sideBtn{
    height: 60px;
    cursor: pointer;
    background: transparent;
    border: 1px solid #CA1515;
    outline: none;
    transition: 1s ease-in-out;
    color:#CA1515 !important;  
    text-align: center;
    vertical-align: middle;
    padding: 15px 0px 0px 0px;
    font-weight:600;
    
}
.sideBtn:hover {
  transition: 1s ease-in-out;
  background: #CA1515;
  color:#fff !important;
}

</style>

<br><br>

<body>


    <div class="container">
<div class="row flex-lg-nowrap">
  <div class="col-12 col-lg-auto mb-3" style="width: 300px;">
    <?php include('profileSidebar.php');?>
  </div>

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <!--<form action="<?php echo base_url();?>front/profile_setting" class="form" novalidate="">-->
<form id="changePassword" action="<?php echo base_url();?>front/edit_password" method="POST" enctype="multipart/form-data"> 
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-4 text-danger"><b>Change Password</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Current Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Current Password">                       
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input type="password" class="form-control" id="confirm_password" name="cpassword" placeholder="Confirm New Password">
                              </div>
                          </div>
                        </div>
                      </div>
                   
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="site-btn allBtn" type="submit">Save Changes</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
</body>
<script>
    $("#changePassword").on('submit',(function(e) {
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
    // alert(json.msg);
	  if(json.status==1)
            {
     toastr.success(json.msg);
             }
            else
            {
            toastr.error(json.msg);
           }
	  
	},
	error: function(){} 	        
});
}));
</script>
