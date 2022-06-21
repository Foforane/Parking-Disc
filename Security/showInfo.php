<?php
$type = $_SESSION['carType'];
$IdenNum =  $_SESSION['IdenNum'];
$showStudent = false;

if($type == "Student"){
include "DB.php";
$sql = "SELECT * FROM students WHERE Student_No = '$IdenNum'";

$result = $conn->query($sql);
$studentData = array();
if($result->num_rows > 0){
  $row = $result->fetch_assoc();
  $showStudent = true;
  array_push($studentData,$row);
 }
 $student = $studentData[0];
?>
<?php } 
if($showStudent){ ?>
<h2>The car is owned by a Student</h2>
<div class="table-responsive">
<table  class="table table-hover">
<thead>
<tr>
      <th scope="col"><?php echo $student['Title']." ".$student["FirstName"][0]." ".$student['Surname'];?></th>
     
    </tr>
<thead>
  <tbody>
  <tr>
   <td>Student Number</td> 
  <td>
  <?php echo $student['Student_No']?>
</td>
</tr>

  <tr>
   <td>School</td> 
  <td>
  <?php echo $student['School']?>
</td>
</tr>
<tr>
   <td>Department</td> 
  <td>
  <?php echo $student['Department']?>
</td>
</tr>
<tr>
   <td>Residence</td> 
  <td>
  <?php echo $student['Residence']?>
</td>
</tr>
<tr>
   <td>Room</td> 
  <td>
  <?php echo $student['Room']?>
</td>
</tr>
<tr>
   <td>Mobile Number</td> 
  <td>
  <?php echo $student['Mobile_Number']?>
</td>
</tr>
<tr>
   <td>Date Registered</td> 
  <td>
  <?php echo $student['DateRegistered']?>
</td>
</tr>
</tbody>
</table>
</div>
<?php }

?>

