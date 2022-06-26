<?php
$type = $_SESSION['carType'];
$IdenNum =  $_SESSION['IdenNum'];
$showStudent = false;
$showDropOff = false;
$showAppointee = false;
$showStaff = false;
$showContract = false;

if($type == "Student"){
include "DB.php";
$sql = "SELECT * FROM students WHERE Student_No = '$IdenNum'";

$result = $conn->query($sql);

if($result->num_rows > 0){
  $row = $result->fetch_assoc();
  $showStudent = true;

 }
 $student = $row;
 $conn->close();
?>
<?php } else if($type == "Drop Off"){
 include "DB.php";
 $sql = "SELECT * FROM dropoff WHERE ID_Number = '$IdenNum'";
 
 $result = $conn->query($sql);
 $dropOffData = array();
 if($result->num_rows > 0){
   $row = $result->fetch_assoc();
   $showDropOff = true;

  }
  $drop = $row;
  $conn->close();
} else if(($type == "Staff") || (strpos($type,"Appointee") > 0)){
  include "DB.php";
  $sql = "SELECT * FROM staff WHERE Staff_No = '$IdenNum'";
  
  $result = $conn->query($sql);
 
  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $showStaff = true;
 
   }
   $staff = $row;
   $conn->close();
 } else if($type == "Contractor"){
  include "DB.php";
  $sql = "SELECT * FROM contractor WHERE cId_Number = '$IdenNum'";
  
  $result = $conn->query($sql);
 
  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $showContract = true;
     
   }
   $contract = $row;
   $conn->close();
 } 
if($showStudent){ ?>
<h2>The car is owned by a <?php echo $type;?></h2>
<div class="table-responsive">
<table  class="table table-hover">
<thead>
<tr>
      <th scope="col"><?php echo $student['Title']." ".$student["FirstName"][0]." ".$student['Surname'];?></th>
     
    </tr>
<thead>
  <tbody>
  <tr>
   <td>Car Description</td> 
  <td>
  <?php echo  $_SESSION['CarDes'];?>
</td>
</tr>
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
if ($showDropOff) {
?>
<h2>The car is owned by a <?php echo $type;?></h2>
<div class="table-responsive">
<table  class="table table-hover">
<thead>
<tr>
      <th scope="col"><?php echo $drop["dName"][0]." ".$drop['dSurname'];?></th>
     
    </tr>
<thead>
  <tbody>
  <tr>
   <td>Car Description</td> 
  <td>
  <?php echo  $_SESSION['CarDes'];?>
</td>
</tr>
  <tr>
   <td>ID Number</td> 
  <td>
  <?php echo $drop['ID_Number']?>
</td>
</tr>


<tr>
   <td>Mobile Number</td> 
  <td>
  <?php echo $drop['pNumber']?>
</td>
</tr>
<tr>
   <td>Secondary Number</td> 
  <td>
  <?php echo $drop['sNumber']?>
</td>
</tr>
<tr>
   <td>Address</td> 
  <td>
  <?php echo $drop['dAddress']?>
</td>
</tr>

<tr>
   <td>Associated with</td> 
  <td>
  <?php echo $drop['Student_Staff_No']?>
</td>
<tr>
   <td>Relationship</td> 
  <td>
  <?php echo $drop['Relationship']?>
</td>
</tr>
</tr>
</tbody>
</table>
</div>
<?php } 
if($showStaff) { ?> 
<h2>The car is owned by a <?php echo $type;?></h2>
<div class="table-responsive">
<table  class="table table-hover">
<thead>
<tr>

<th scope="col"><?php
$name = $staff["sName"];
echo $staff['title']." ".$name[0]. " ".$staff['Surname'];?></th>
    </tr>
<thead>
  <tbody>
  <tr>
   <td>Car Description</td> 
  <td>
  <?php echo  $_SESSION['CarDes'];?>
</td>
</tr>
  <tr>
   <td>Staff Number</td> 
  <td>
  <?php echo $staff['Staff_No']?>
</td>
</tr>

<tr>
   <td>Office</td> 
  <td>
  <?php echo $staff['Office']?>
</td>
</tr>
<tr>
   <td>Department</td>  
  <td>
  <?php echo $staff['Department']?>
</td>
</tr>
<tr>
   <td>Mobile Number</td> 
  <td>
  <?php echo $staff['MobileNumber']?>
</td>
</tr>

<tr>
   <td>Date Registered</tdd> 
  <td>
  <?php echo $staff['DateReg']?>
</td>
</tr>
</tbody>
</table>
</div>
<?php } 
if($showContract){
?>
<h2>The car is owned by a <?php echo $type;?></h2>
<div class="table-responsive">
<table  class="table table-hover">
<thead>
<tr>
      <th scope="col"><?php echo $contract["cLastName"][0]." ".$contract['cFirstName'];?></th>
     
    </tr>
<thead>
  <tbody>
  <tr>
   <td>Car Description</td> 
  <td>
  <?php echo  $_SESSION['CarDes'];?>
</td>
</tr>
  <tr>
   <td>ID Number</td> 
  <td>
  <?php echo $contract['cId_Number']?>
</td>
</tr>


<tr>
   <td>Mobile Number</td> 
  <td>
  <?php echo $contract['cPhoneNumber']?>
</td>
</tr>
<tr>
   <td>Project Start</td> 
  <td>
  <?php echo $contract['cPhoneNumber']?>
</td>
</tr>



</tbody>
</table>
</div>

<?php } ?>
