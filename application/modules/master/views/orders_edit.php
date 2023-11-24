	
	
 <!--<?php $this->load->view('include/userAction');  ?>-->
 

 
 <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_orders/update" method="POST" class="row g-3">
                     
                <input type="hidden" name="id" class="form-control" value="<?php echo $row[0]->id; ?>"> 
         
		 <div class="col-md-6">
               <label for="" class="form-label">Accepted</label>
		 <input type="checkbox" name="accepted" required>
		 </div>
           <div class="col-md-12">
               <label for="" class="form-label">Remarks</label>
			<textarea type="text" name="dispatch_remarks" class="form-control"><?php echo $row[0]->dispatch_remarks; ?></textarea>
			</div>
			
			
          
		  <div class="col-12">
				<button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
		  </div>
</form>



