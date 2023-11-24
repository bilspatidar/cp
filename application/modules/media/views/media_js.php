<title>phpzag.com : Demo Amazon S3 File Upload using JavaScript</title>
<script src="https://sdk.amazonaws.com/js/aws-sdk-2.1.24.min.js"></script>
<script>
//AWS access info
AWS.config.update({
	accessKeyId : 'AKIAXXXCGNNMK46QRRTA',
	secretAccessKey : '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'
});
AWS.config.region = 'us-east-1';	
</script>

<div class="container">	
	<br>	
 <div id="uprocess"></div>	
  <div id="ures"></div>	
	<form id="uploadForms" method='post' enctype="multipart/form-data">
		<h3>Upload File</h3><br/>
		<span id="showMessage" style="display:none;color:red;">File uploaded to Amazon server.</span>	
		<input type='file' name="upFile" id="cover" required="" / > 
		<br>
		<input type='submit' value='Upload'/>	
	</form>	

</div>
<script>
$( document ).ready(function() {
	$("#uploadForms").submit(function() {
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
				$("#ures").html(upFile.name);
			}).send(function(err, data) {
				$('#cover').val(null); 
				$("#showMessage").show();
			
			});
		} 
		return false;
	});
});
</script>