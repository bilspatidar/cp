<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
<?php $this->load->view('include/userAction');  ?>
<form id="crudFormEdit" action="<?php echo base_url(); ?>user/add_user/update" method="POST" class="row g-3">
    <input type="hidden" name="users_id" class="form-control" value="<?php echo $row[0]->users_id ;?>">
    <div class="col-md-4">
        <label for="" class="form-label">Name * </label>
        <input type="text" name="name" class="form-control" value="<?php echo $row[0]->name ;?>"> 
    </div>
                        
    <div class="col-md-4">
      <label for="" class="form-label">Role :*</label>
        <select class="form-control select2" name="role_id[]" style="width:100%" multiple>
            <option value="">Select Role</option>
            <?php
            $role_array = explode(',',$row[0]->role_ids);
            $role = $this->Common->getUserRole();
            foreach($role as $roleAll){ ?>
            <option value="<?php echo $roleAll->id; ?>" <?php if(in_array($roleAll->id,$role_array)) {echo 'selected';}?>><?php echo $roleAll->name; ?></option>
            <?php }?>
        </select>
    </div>          
    <div class="col-md-4">
        <label for="" class="form-label">Email:* </label>
        <input type="email" name="email" class="form-control" value="<?php echo $row[0]->email ;?>"> 
    </div>
    <div class="col-md-4">
        <label for="" class="form-label">Phone Number:* </label>
        <input type="number" name="mobile" class="form-control" value="<?php echo $row[0]->mobile ;?>"> 
    </div>
    <div class="col-md-4">
        <label for="" class="form-label">Password:* </label>
        <input type="" name="password" class="form-control"> 
    </div>
    <div class="col-md-4">
        <label for="" class="form-label">Confirm Password:* </label>
        <input type="number" name="cPassword" class="form-control"> 
    </div>
    <div class="col-md-4">
        <label for="" class="form-label">Status:* </label>
        <select name="status" class="form-control"> 
        <option value="">Select Status</option>
        <option value="Active" <?php if($row[0]->status=='Active'){echo 'selected';} ?>>Active</option>
        <option value="Deactive" <?php if($row[0]->status=='Deactive'){echo 'selected';} ?>>Deactive</option>
        </select>
    </div>
                    
    <div class="col-md-4">
    <?php 
    $File = $row[0]->profile_pic;
	if(!empty($File))
	{ 
        $load_url = 'uploads/users/'.$File;
		if(file_exists($load_url))
		{
	   $url = base_url().$load_url;			
		}
		else
		{
		$url = base_url().'uploads/no_file.jpg';		
		}
		
        $fileData = "<a href='$url' target='_blank'>File</a>";			
	}
	else
	{
	$url = base_url().'uploads/no_file.jpg';
	$fileData = '';
	}
      ?>
        <label for="" class="form-label">Image &nbsp;&nbsp; <?= $fileData;?></label>
        <input type="hidden" name="profile_pic">
        <input type="file" name="profile_pic" class="form-control"> 
    </div>
                      
    <div class="col-12">
        <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
    </div>
</form>
<script>
    $('.select2').select2({
        dropdownParent: $('#ExtralargeEditModal')
    });
</script>