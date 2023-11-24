<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/croppie@2.6.4/croppie.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<?php if($this->session->flashdata('message_display')){?>
				<div class="effects alert alert-info">
					<?php echo $this->session->flashdata('message_display');?></div>
				<?php } ?>
<form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>crop/upload_image">
					<label>Image</label>
					<input type="file" name="file" class="form-control">
					<br>
					<br>
					<button type="submit" class="btn btn-success upload-result">Upload Image</button>
</form>