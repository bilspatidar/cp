<?php 
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "xxx"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
 };
 
 
 
 if(isset($_POST['search'])){
 $search = $_POST['search'];

 $query = "SELECT * FROM student WHERE fname like'%".$search."%'";
 $result = mysqli_query($con,$query);

 $response = array();
 while($row = mysqli_fetch_array($result) ){
 $name = $row['fname'].' '.$row['lname'];
   $response[] = array("value"=>$row['student_id'],"label"=>$name);
 }

 echo json_encode($response);
}

exit;
?>