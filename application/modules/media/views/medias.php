<script src="https://sdk.amazonaws.com/js/aws-sdk-2.1.24.min.js"></script>
<script>
//AWS access info
AWS.config.update({
	accessKeyId : 'AKIAXXXCGNNMK46QRRTA',
	secretAccessKey : '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'
});
AWS.config.region = 'us-east-1';	
</script>
<div class="card">


            <div class="card-body">
             
      
      <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">List</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Add New</button>
                </li>
               
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                 <div class="tab-pane fade show active session_views" id="home" role="tabpanel" aria-labelledby="home-tab">
                   <form class="form-inline filterForm">
                       <div div class="row">
                        <div class="col-md-3"> <label>Name</label> <input type="text" id="filterOne" class="form-control input-sm"> </div>
                         <div class="col-md-3">
                             <label>Category</label>

                         <select class="form-control" id="filterFour">
                         <option value="">Category</option>
   
     <?php 
                                        $categories = $this->Common->getCategory();

                                        foreach($categories as $category){ ?>
                                         <optgroup label="<?php echo $category->name; ?>">
                                         <?php $subcategories = $this->Common->getSubCategory($category->id); 
                                         foreach($subcategories as $subcategory){ ?>
                                        <option value="<?php echo $subcategory->id; ?>"><?php echo $subcategory->name; ?></option>
                                        <?php }?>
                                       </optgroup>
                                        <?php } ?>
    
   
  </select>
      	</div>      
		
		 <div class="col-md-3" style="z-index: 999;"> <lable>Status</lable> <select id="filterTwo" class="form-control input-sm"><option value="">Status</option><option value="Active">Active</option><option value="Deactive">Deactive</option></select> </div>
                       <div class="col-md-3" style="z-index: 999;"> <lable>Show Deleted</lable> <select id="filterThree" class="form-control input-sm"><option value="0">No</option><option value="1">Yes</option></select> </div>  
                       <div class="col-md-3" style="z-index: 999;">
                            <lable>Is Trending</lable>
                            <select id="filterFive" class="form-control input-sm">
                              <option value="">No</option><option value="1">Yes</option></select> </div>  

                         <div class="col-md-2"><lable><br></lable><button class="btn btn-outline-primary" type="button" onClick="loadTableData(1)">SEARCH</button></div>
	
	</div>
</form>
                   
                   
                   <p>
			<div id="pageNumber" style="display:none;"></div>
                          
                               <div class="table-responsive" id="loadTableData">
                                   
                                   <h3>Data is loading please wait..   <i class="fa fa-refresh fa-spin"></i> </h3>
                               </div>
                               <div align="right" id="paginationLink"></div>
                                    
                                       </p>
                              
                </div>
                <div class="tab-pane fade session_adds" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                
                 <form id="crudForm-xxx" action="<?php echo base_url(); ?>media/add_media/add" enctype="multipart/form-data" method="POST" class="row crudForm g-3">
                            
                           
								
						      <div class="col-md-4">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control"> 
                          </div>

                          
                       <div class="col-md-4">
                             <label for="" class="form-label">Category</label>

                         <select class="form-control select2" name="sub_category_id[]" style="width:100%"multiple>
                         <option value="">Category</option>
   
     <?php 
                                        $categories = $this->Common->getCategory();

                                        foreach($categories as $category){ ?>
                                         <optgroup label="<?php echo $category->name; ?>">
                                         <?php $subcategories = $this->Common->getSubCategory($category->id); 
                                         foreach($subcategories as $subcategory){ ?>
                                        <option value="<?php echo $subcategory->id; ?>"><?php echo $subcategory->name; ?></option>
                                        <?php }?>
                                       </optgroup>
                                        <?php } ?>
    
   
  </select>
      	</div>                
          

                           <div class="col-md-4">
                              <label for="" class="form-label">Gener</label>
                                <select class="form-control select2" name="gener_id[]" style="width:100%" multiple>
                                    <option value="">select</option>
                                        <?php 
                                        $geners = $this->Common->getGeners();
                                        foreach($geners as $gener){ ?>
                                        <option value ="<?php echo $gener->id; ?>"><?php echo $gener->title; ?></option>
                                        <?php } ?>
                                        
                                     </select>
                              
                          </div>
                     
                         
                          
                           

       <div class="col-md-4">
    <label for="" class="form-label">Video Type</label><br>
   <input type="radio" name="video_type"  onclick="showlink(this.value)" value="local" checked="checked" />&nbsp;&nbsp; Local 
  <input type="radio" name="video_type"  onclick="showlink(this.value)"  value="Youtube_link" /> Youtube link
   </div>

                           <div class="col-md-4" id="showlinkfile">
                                <label for="" class="form-label">Video</label>
								<div id="uprocess"></div>	
                                <input type="file" name="localVideo" id="cover" class="form-control"> 
								<input type="text" name="video_link_js" id="video_link_js" readonly>
                          </div>

                               <div class="col-md-4"id="showyoutubelink" style="display:none">
                                <label for="" class="form-label" >Youtube Link</label>
                                <input type="text" name="video_link" class="form-control"> 
                          </div>
                           <div class="col-md-4" >
                                <label for="" class="form-label">Banner (480*270)</label>
                                <input type="hidden" name="banner">
                                <input type="file" name="banner" class="form-control"> 
                          </div>
                          
                           <div class="col-md-4">
						    <label for="" class="form-label">Is Slider</label>
						   <br>
							<input type="checkbox" onclick="showbanner(this.value)" value="1" class="form-controls"  name="isSlider" > Yes
            </div>


            <div class="col-md-4" id="no" style="display:none;">
                                <label for="" class="form-label">Slider Banner (422*700)</label>
                                <input type="hidden" name="sliderBanner">
                                <input type="file" name="sliderBanner" class="form-control"> 
                          </div>
						
                          <div class="col-md-4">
						    <label for="" class="form-label">Is Trending</label>
						   <br>
							<input type="checkbox" value="1" class="form-controls"  name="isTrending" > Yes
            </div>

            
            <div class="col-md-4">
						    <label for="" class="form-label">Use banner in default Yutube</label>
						   <br>
							<input type="checkbox" value="1" class="form-controls" name="defaultBannerYutube"> Yes
            </div>
                           <div class="col-md-12">
                                <label for="" class="form-label">Description</label>
                                <textarea type="text" name="video_description" class="form-control"> </textarea>
                          </div>
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
                </form>
              
              
                </div>
               
              </div><!-- End Default Tabs -->

            </div>
          </div>


<script>


$(document).ready(function() {
	$("#cover").on('change',function() {
		var bucket = new AWS.S3({params: {Bucket: 'can2023bucket'}});
		var uploadFiles = $('#cover')[0];
		var upFile_old = uploadFiles.files[0];
		
		var blob = upFile_old.slice(0, upFile_old.size);
        upFile = new File([blob], (Math.random()*1e32).toString(36), { type: `${upFile_old.type}` });



		//var blob = upFile_old.slice(0, upFile_old.size, upFile_old.type); 
        //var upFile = new File([blob], (Math.random()*1e32).toString(36).upFile_old.type', {type: upFile_old.type});


		if (upFile) {
			var uploadParams = {Key: upFile.name, ContentType: upFile.type, Body: upFile};
			bucket.upload(uploadParams).on('httpUploadProgress', function(evt) {
				$("#uprocess").html("File Uploading: " + parseInt((evt.loaded * 100) / evt.total)+'%');
				$("#video_link_js").val('https://can2023bucket.s3.amazonaws.com/'+upFile.name);
			}).send(function(err, data) {
				$('#cover').val(null); 
				$("#showMessage").show();
			
			});
		} 
		return false;
	});
});



function showlink(val){
  
if(val=='Youtube_link'){
$('#showyoutubelink').show();
$('#showlinkfile').hide();

}else{
$('#showlinkfile').show();
$('#showyoutubelink').hide();
}

}







</script>

<script>
function showbanner() {
  var x = document.getElementById("no");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>