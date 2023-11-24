 <form action="<?php echo base_url(); ?>master/add_appointment_hours" method="POST" id="crudFormFixx">        
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
          
           <tr>
               <td><input  type="hidden" name="day[]" value="<?php echo $dayId; ?>"> <b><?php echo $day; ?></b></td>
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
?>
<option value="<?php  echo  $time; ?>"><?php  echo  $time; ?></option>
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
?>
<option value="<?php  echo  $time2; ?>"><?php  echo  $time2; ?></option>
 <?php 
 
  $start_time2 += $add_mins2;
} ?>
                   </select>
                </td>
               <td>
                   <a href="javascript:void(0)" class="add" name="<?php echo $dayId; ?>"><i class="fa fa-plus-circle"></i></a>
               </td>
           </tr>
        </tbody>
       <?php } ?>    
      </table>   
  <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
 </form>
 
 
 
<script>
    $("#crudFormFixx").on('submit',(function(e) {
$(".loading").show();
var post_link = $(this).attr('action');
e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(response){
      var json = $.parseJSON(response);
	  if(json.status==1)
            {
 
     $(".loading").hide();
     toastr.success(json.msg);
  

             }
            else
            {
              
            $(".loading").hide();
            toastr.error(json.msg);
           }
	  
	},
	error: function(){} 	        
});
}));
</script>