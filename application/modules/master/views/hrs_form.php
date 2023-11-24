<table class="table table-bordered table-responsive search-table inner" id="purchase_dynemic_row">
       <thead>
           <tr>
               <th>
                   Day 
               </th>
               
               <th colspan="2">
                  Working Hours
               </th>
           </tr>
       </thead>
       <?php 
       $mydays = $this->db->get('day')->result();
       $sr=0;
       foreach ($mydays as $dayss) { 
       $ids = strtolower($dayss->name);
       $day = $dayss->name;
       $dayId = $dayss->id;
  
       ?>
        <tbody id="<?php echo $dayId; ?>">
       
            <?php 
            //default db
            if($changeAble=='custom'){ 
            $check = $this->db->get_where('user_availability',array('day'=>$dayId,'users_id'=>$users_id));
                 if($check->num_rows()>0){
                    $result = $check->result();
                    $bsr=0;
                    foreach($result as $row){ $bsr++;
                  ?>
            
               <tr>
                <?php if($bsr>1){?>
                <td></td>
              <?php } else{ ?>
              <td><input  type="checkbox" name="day[]" value="<?php echo $dayId; ?>" <?php if($row->day==$dayId){ echo'checked'; }?>> <b><?php echo $day; ?></b></td>
              <?php } ?>
                <td>
                    
                <select class="form-control select2 myselet input-sm"  name="start_time[<?php echo $dayId; ?>][]">
                    <?php   
$starttime = '00:00';
$endtime = '23:30'; 
$duration = '30'; 

$array_of_time = array ();
$start_time    = strtotime ($starttime);
$end_time      = strtotime ($endtime);

$add_mins  = $duration * 60;
while ($start_time <= $end_time)
{ $time = date ("h:i A", $start_time);
$timeValue = date ("H:i:s", $start_time);
?>
<option value="<?php  echo  $timeValue; ?>" <?php if($row->from_time==$timeValue){ echo'selected'; }?>><?php  echo  $time; ?></option>
 <?php 
 
  $start_time += $add_mins;
} ?>
                   </select>
                   </td>
                <td>
    <select class="form-control select2 myselet input-sm" name="end_time[<?php echo $dayId; ?>][]">
                    <?php   
$starttime2 = '00:00';  // your start time
$endtime2 = '23:30';  // End time
$duration2 = '30';  // split by 30 mins

$array_of_time2 = array ();
$start_time2    = strtotime ($starttime2); //change to strtotime
$end_time2      = strtotime ($endtime2); //change to strtotime

$add_mins2  = $duration2 * 60;
while ($start_time2 <= $end_time2) // loop between time
{ $time2 = date ("h:i A", $start_time2);
$timeValue2 = date ("H:i:s", $start_time2);
?>
<option value="<?php  echo  $timeValue2; ?>" <?php if($row->to_time==$timeValue2){ echo'selected'; }?>><?php  echo  $time2; ?></option>
 <?php 
 
  $start_time2 += $add_mins2;
} ?>
                   </select>
                </td>
               <td>
                   <a href="javascript:void(0)" class="add" name="<?php echo $dayId; ?>"><i class="fa fa-plus-circle"></i></a>
                    <?php if($bsr>1){?>
               <a href="javascript:void(0)" class="remove" onclick="delete_defaultHour(this.id)" id="<?php echo base_url()?>master/delete_user_availability"  name='<?php echo $row->id; ?>'><i class="fa fa-minus-circle" style="color:red"></i></a>
              <?php } ?>
               </td>
           </tr>    
                  <?php 
              }
                }else{ ?>
                 <tr>
               <td><input  type="checkbox" name="day[]" value="<?php echo $dayId; ?>"> <b><?php echo $day; ?></b></td>
                <td>
                    
                <select class="form-control select2 myselet input-sm"  name="start_time[<?php echo $dayId; ?>][]">
                    <?php   
$starttime = '00:00';
$endtime = '23:30'; 
$duration = '30'; 

$array_of_time = array ();
$start_time    = strtotime ($starttime);
$end_time      = strtotime ($endtime);

$add_mins  = $duration * 60;
while ($start_time <= $end_time)
{ $time = date ("h:i A", $start_time);
$timeValue = date ("H:i:s", $start_time);
?>
<option value="<?php  echo  $timeValue; ?>"><?php  echo  $time; ?></option>
 <?php 
 
  $start_time += $add_mins;
} ?>
                   </select>
                   </td>
                <td>
    <select class="form-control select2 myselet input-sm" name="end_time[<?php echo $dayId; ?>][]">
                    <?php   
$starttime2 = '00:00';  // your start time
$endtime2 = '23:30';  // End time
$duration2 = '30';  // split by 30 mins

$array_of_time2 = array ();
$start_time2    = strtotime ($starttime2); //change to strtotime
$end_time2      = strtotime ($endtime2); //change to strtotime

$add_mins2  = $duration2 * 60;
while ($start_time2 <= $end_time2) // loop between time
{ $time2 = date ("h:i A", $start_time2);
$timeValue2 = date ("H:i:s", $start_time2);
?>
<option value="<?php  echo  $timeValue2; ?>"><?php  echo  $time2; ?></option>
 <?php 
 
  $start_time2 += $add_mins2;
} ?>
                   </select>
                </td>
               <td>
                   <a href="javascript:void(0)" class="add" name="<?php echo $dayId; ?>"><i class="fa fa-plus-circle"></i></a>
               </td>
           </tr>
          <?php } }else{
                 $check = $this->db->get_where('default_hours',array('day'=>$dayId));
                 if($check->num_rows()>0){
                    $result = $check->result();
                    $dsr=0;
                    foreach($result as $row){ $dsr++;
                  ?>
            
               <tr>
                <?php if($dsr>1){?>
                <td></td>
              <?php } else{ ?>
              <td><input  type="checkbox" name="day[]" value="<?php echo $dayId; ?>" <?php if($row->day==$dayId){ echo'checked'; }?>> <b><?php echo $day; ?></b></td>
              <?php } ?>
                <td>
                    
                <select class="form-control select2 myselet input-sm"  name="start_time[<?php echo $dayId; ?>][]">
                    <?php   
$starttime = '00:00';
$endtime = '23:30'; 
$duration = '30'; 

$array_of_time = array ();
$start_time    = strtotime ($starttime);
$end_time      = strtotime ($endtime);

$add_mins  = $duration * 60;
while ($start_time <= $end_time)
{ $time = date ("h:i A", $start_time);
$timeValue = date ("H:i:s", $start_time);
?>
<option value="<?php  echo  $timeValue; ?>" <?php if($row->from_time==$timeValue){ echo'selected'; }?>><?php  echo  $time; ?></option>
 <?php 
 
  $start_time += $add_mins;
} ?>
                   </select>
                   </td>
                <td>
    <select class="form-control select2 myselet input-sm" name="end_time[<?php echo $dayId; ?>][]">
                    <?php   
$starttime2 = '00:00';  // your start time
$endtime2 = '23:30';  // End time
$duration2 = '30';  // split by 30 mins

$array_of_time2 = array ();
$start_time2    = strtotime ($starttime2); //change to strtotime
$end_time2      = strtotime ($endtime2); //change to strtotime

$add_mins2  = $duration2 * 60;
while ($start_time2 <= $end_time2) // loop between time
{ $time2 = date ("h:i A", $start_time2);
$timeValue2 = date ("H:i:s", $start_time2);
?>
<option value="<?php  echo  $timeValue2; ?>" <?php if($row->to_time==$timeValue2){ echo'selected'; }?>><?php  echo  $time2; ?></option>
 <?php 
 
  $start_time2 += $add_mins2;
} ?>
                   </select>
                </td>
               <td>
                   <a href="javascript:void(0)" class="add" name="<?php echo $dayId; ?>"><i class="fa fa-plus-circle"></i></a>
               <?php if($dsr>1){?>
               <a href="javascript:void(0)" class="remove" onclick="delete_defaultHour(this.id)" id="<?php echo base_url()?>master/delete_defaultHour"  name='<?php echo $row->id; ?>'><i class="fa fa-minus-circle" style="color:red"></i></a>
              <?php } ?>
               </td>
           </tr>    
                  <?php 
              }
                }else{ ?>
            <tr>
               <td><input  type="checkbox" name="day[]" value="<?php echo $dayId; ?>"> <b><?php echo $day; ?></b></td>
                <td>
                    
                <select class="form-control select2 myselet input-sm"  name="start_time[<?php echo $dayId; ?>][]">
                    <?php   
$starttime = '00:00';
$endtime = '23:30'; 
$duration = '30'; 

$array_of_time = array ();
$start_time    = strtotime ($starttime);
$end_time      = strtotime ($endtime);

$add_mins  = $duration * 60;
while ($start_time <= $end_time)
{ $time = date ("h:i A", $start_time);
$timeValue = date ("H:i:s", $start_time);
?>
<option value="<?php  echo  $timeValue; ?>"><?php  echo  $time; ?></option>
 <?php 
 
  $start_time += $add_mins;
} ?>
                   </select>
                   </td>
                <td>
    <select class="form-control select2 myselet input-sm" name="end_time[<?php echo $dayId; ?>][]">
                    <?php   
$starttime2 = '00:00';  // your start time
$endtime2 = '23:30';  // End time
$duration2 = '30';  // split by 30 mins

$array_of_time2 = array ();
$start_time2    = strtotime ($starttime2); //change to strtotime
$end_time2      = strtotime ($endtime2); //change to strtotime

$add_mins2  = $duration2 * 60;
while ($start_time2 <= $end_time2) // loop between time
{ $time2 = date ("h:i A", $start_time2);
$timeValue2 = date ("H:i:s", $start_time2);
?>
<option value="<?php  echo  $timeValue2; ?>"><?php  echo  $time2; ?></option>
 <?php 
 
  $start_time2 += $add_mins2;
} ?>
                   </select>
                </td>
               <td>
                   <a href="javascript:void(0)" class="add" name="<?php echo $dayId; ?>"><i class="fa fa-plus-circle"></i></a>
               </td>
           </tr>
           <?php } } ?>
        </tbody>
       <?php  } ?>    
       
      </table>   
