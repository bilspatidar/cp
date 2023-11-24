 <?php $this->load->view('include/userAction');  ?>
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_document_category/update" method="POST" class="row g-3">
       <div class="col-md-4">
            <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>">
                                <label for="" class="form-label">Document Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $row[0]->name; ?>"> 
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label">Document Type</label>
                               
                             <select class="form-control select2" name="document_type_id" style="width:100%">
                                   <option value="">Select</option>
                                        <?php 
                                        $documents = $this->Common->getDocumentType();
                                        foreach($documents as $doc){ ?>
                                        <option value="<?php echo$doc->id; ?>" <?php if($row[0]->document_type_id==$doc->id){ echo 'selected';} ?>><?php echo$doc->name; ?></option>
                                        <?php } ?>
                                        
                                     </select>
                          </div>
                          
                        
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Side</label>
                                
                                     <select name="side" class="form-control input-sm"><option value="">Side</option>
                                     <option value="1" <?php if($row[0]->side=='1'){ echo'selected'; } ?>>One Side</option>
                                     <option value="2" <?php if($row[0]->side=='2'){ echo'selected'; } ?>>Two Side</option></select>
                               
                              
                          </div>
                         <div class="col-md-4">
                                <label for="" class="form-label">Document Number Length</label>
                                <input type="number" name="doc_num_length" class="form-control" value="<?= $row[0]->doc_num_length;?>"> 
                          </div>
                         
                         <div class="col-md-4">
                                <label for="" class="form-label">Status</label>
                                 
                                <select name="status" class="form-control "><option value="">Status</option><option value="Active" <?php if($row[0]->status=='Active'){ echo'selected'; } ?>>Active</option><option value="Deactive" <?php if($row[0]->status=='Deactive'){ echo'selected'; } ?>>Deactive</option></select>
                               
                          </div>
                         
                         
                         
                         
                         
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
</form>



