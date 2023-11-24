<form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_leave_management/update" method="POST" class="row crudForm g-3">
    <input type="hidden" name="id" value="<?php echo $row[0]->id ;?>">
    <div class="col-md-4">
        <label for="" class="form-label">Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            <option value="Pending" <?php if($row[0]->status=='Pending'){echo 'selected';} ?> >Pending</option>
            <option value="Approved" <?php if($row[0]->status=='Approved'){echo 'selected';} ?>>Approved</option>
            <option value="Rejected" <?php if($row[0]->status=='Rejected'){echo 'selected';} ?>>Rejected</option>
        </select>
    </div>        
    <div class="col-md-4">
        <label for="" class="form-label">Status Remarks</label>
        <textarea class="form-control" name="status_remarks"><?=$row[0]->status_remarks;?></textarea>
    </div>
    <div class="col-md-4">
        <label for="" class="form-label">User Remarks</label>
        <textarea class="form-control" name="remarks" readonly><?=$row[0]->remarks;?></textarea>
    </div>                
    <div class="col-12">
        <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
    </div>
</form>