

<?php
 $CourseName = $this->Common->get_col_by_key('course','id',$row[0]->id,'title');

?>


 <table class="table table-bordered datatablel_model" id="datatable_model" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
     <th>Course Name </th>
    <th>Course Session </th>
    <th>Session Duration</th>
    <th>Status</th>
   
   </tr>
   </thead>
    <tbody>
       

        
        
        <?php
    
			$id = $row->id;
   $sr = $start+1;
   ?>
      
   <tr>
   
    <td><?php echo $sr++;?></td>
    <td><?php echo $CourseName;?></td>
    <td><?php echo getDateTimeFormat($row[0]->course_session);?></td>
     <td><?php echo $row[0]->session_duration;?></td>
     <td class="badge bg-success m-2"><?php echo $row[0]->status;?></td>
   </tr>
   
   
 
        </tbody></table>