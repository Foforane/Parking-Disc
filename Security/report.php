<?php
if(!isset($_SESSION['security'])){
    header('Location:login.php');
    
    exit();
  }
  include "DB.php";
  $sql = "select count(*) as total from car where car_for = 'Student'";
  $result = $conn->query($sql);
  $studentCars = $result->fetch_assoc()['total'];
  //For staff
  $sql = "select count(*) as total from car where car_for = 'Staff'";
  $result = $conn->query($sql);
  $staffCars = $result->fetch_assoc()['total'];
  $totalownCar = $studentCars + $staffCars;
 //Students Drop Off
  $sql = "select count(*) as total from car where car_for = 'Drop Off' and Length(Iden_Num) = 9";
  $result = $conn->query($sql);
  $studentDropOff = $result->fetch_assoc()['total'];
  //Staff Drop off
 
  $sql = "select count(*) as total from car where car_for = 'Drop Off' and Length(Iden_Num) != 9";
  $result = $conn->query($sql);
  $staffDropOff = $result->fetch_assoc()['total'];
  $totalDropOff = $staffDropOff + $studentDropOff;
  //Contractors
  $sql = "select count(*) as total from car where car_for = 'Contractor'";
  $result = $conn->query($sql);
  $Contractors = $result->fetch_assoc()['total'];
  //Joint Apointee
  $sql = "select count(*) as total from car where car_for like 'Joint%'";
  $result = $conn->query($sql);
  $jointApointee = $result->fetch_assoc()['total'];
  //Totals
  $StudentTotal = $studentCars + $studentDropOff; 
  $StaffTotal = $staffCars + $staffDropOff + $jointApointee + $Contractors;
  $total = $StudentTotal + $StaffTotal;
?>

<div class="table-responsive">
<table  class="table table-hover">
<thead>
<tr>
      <th scope="col"></th>
      <th scope="col">Student</th>
      <th scope="col">Employees</th>
      <th scope="col">Total</th>
    </tr>
<thead>
  <tbody>
  <tr>
   <td>Own Car</td> 
  <td>
   <?php echo $studentCars ?>
</td>
<td>
<?php echo $staffCars ?>   
</td>
<td>
<?php echo $totalownCar ?>   

</td>
</tr>
<tr>
   <td>Drop off</td> 
  <td>
  <?php echo $studentDropOff ?>  
  
</td>
<td>
<?php echo $staffDropOff ?>  
</td>
<td>
<?php echo $totalDropOff ?>  
</td>
</tr>
<tr>
   <td>Joint Appointee</td> 
  <td>
   0
</td>
<td>
<?php echo $jointApointee ?>
</td>
<td>
<?php echo $jointApointee ?>
</td>
</tr>
<tr>
   <td>Contractors</td> 
  <td>
   0
</td>
<td>
<?php echo $Contractors ?>
</td>
<td>
<?php echo $Contractors ?>
</td>
</tr>
<tr>
   <td>Total</td> 
  <td>
  <?php echo $StudentTotal ?>
  
</td>
<td>
<?php echo $StaffTotal ?>
</td>
<td>
<?php echo $total ?>
</td>
</tr>
</tbody>
</table>