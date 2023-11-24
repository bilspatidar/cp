<div class="row userAction">
        <?php if($row[0]->added!='0000-00-00 00:00:00'){ ?>
    <div class="col-md-3 col-xs-6">
Added <?php  echo getDateTimeFormat($row[0]->added); ?>
    </div>
    
    <div class="col-md-3 col-xs-6">
        Added By <?php  echo getUserInfo('name',$row[0]->addedBy); ?>
    </div>
    
    <?php } if($row[0]->updated!='0000-00-00 00:00:00'){ ?>
    <div class="col-md-3 col-xs-6">
        Updated <?php echo getDateTimeFormat($row[0]->updated); ?>
    </div>
    
        <div class="col-md-3 col-xs-6">
        Updated By <?php  echo  getUserInfo('name',$row[0]->updatedBy); ?>
    </div>
    <?php } ?>
 </div>