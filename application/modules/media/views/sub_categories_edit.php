

<form id="crudFormEdit" action="<?php echo base_url(); ?>media/add_sub_categories/update" method="POST" class="row g-3" enctype="multipart/form-data">
      

      
      
      <div class="col-md-4">
            <label for="" class="form-label">Category Name</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
            <select class="form-control select2" name="category_id" style="width:100%"  >                                                       
                  <option value="">Select Category</option>
                  <?php 
                  $categories = $this->Common->getCategory();
                  foreach($categories as $category){ ?>
                  <option value="<?php echo $category->id; ?>"
                  <?php if($category->id==$row[0]->category_id) {echo 'selected';} ?>>  
                        <?php echo $category->name; ?></option>
                  <?php } ?>
            </select>
                  
                  </div>
                  
                  <div class="col-md-4">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $row[0]->name; ?>"> 
                  </div>
            
                  <div class="col-md-4">
                  <?php 
                  $File = $row[0]->banner;

                  if(!empty($File))
                  { 
                        $load_url = 'uploads/sub_categories/'.$File;
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
                        <label for="" class="form-label">Banner (Series 263*393,Topic 174*260) &nbsp;&nbsp; <?= $fileData;?></label>
                        <input type="file" name="banner" class="form-control" id="cover">  
                  </div>
                  <div class="col-md-4">
                        <label for="" class="form-label">Status</label>
                        <select name="status" class="form-control input-sm"><option value="">Status</option><option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option><option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
                  </div>
                  <div class="col-md-12">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" class="form-control" > <?php echo $row[0]->description; ?></textarea>
                  </div>
                  <div class="col-12">
                        <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                  </div>
</form>
