<?php 

$Username =   $_SESSION['Username'] ;
$showDrop= false;
$showCar = $showProjects = false;
$showJoint = false;
$showContractor = false;
include "DB.php";
$sql = "SELECT * FROM car WHERE Iden_Num = '$Username'";
$result = $conn->query($sql);
$cars  = [];
if ($result->num_rows > 0) {
  $showCar =true;
    while($line = $result->fetch_assoc()){ 
    array_push($cars,$line);
      
     }
    }

$sql = "SELECT * FROM dropoff  WHERE Student_Staff_No = '$Username'";
$results = $conn->query($sql);
$drops = [];
if($results->num_rows > 0){
  $showDrop = true;
  while($line = $results->fetch_assoc()){ 
        array_push($drops,$line);
       
        $ID = $line['ID_Number'];
        $sql = "SELECT * FROM car WHERE Iden_Num = '$ID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $showCar =true;
    while($line = $result->fetch_assoc()){ 
    array_push($cars,$line);
      
     }
      
     }
   
    }
}

$sql = "SELECT * FROM project  WHERE Staff_No = '$Username'";
$results = $conn->query($sql);
$projects = [];

if($results->num_rows > 0){
  $showProjects = true;
  while($line = $results->fetch_assoc()){ 
    array_push($projects,$line);
    $id = $line['project_Id'];
    $sql = "SELECT * FROM contractor where project_Id = '$id'";
$results = $conn->query($sql);

$contractors = [];
if($results->num_rows > 0){
  $showContractor = true;
  while($line = $results->fetch_assoc()){ 
    array_push($contractors,$line);
    $ID = $line['cId_Number'];
    $sql = "SELECT * FROM car WHERE Iden_Num = '$ID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$showCar =true;
while($line = $result->fetch_assoc()){ 
array_push($cars,$line);
  
 }
  
 }
     }
     
     }
   
        
}



   
        
}
?>


<div><br>
<?php if($_SESSION['User'] == "Student"){ 

  $sql = "SELECT * FROM students WHERE Student_No = '$Username'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
   
  $row = $result->fetch_assoc();
 
 
  
 } ?>

<div class="table-responsive">
<table  class="table table-hover">
<thead>
<tr>
      <th scope="col"><?php echo $row['Title']." ".$row["FirstName"][0]." ".$row['Surname'];?></th>
     
    </tr>
<thead>
  <tbody>
  <tr>
   <td>Student Number</td> 
  <td>
  <?php echo $row['Student_No']?>
</td>
</tr>

  <tr>
   <td>School</td> 
  <td>
  <?php echo $row['School']?>
</td>
</tr>
<tr>
   <td>Department</td> 
  <td>
  <?php echo $row['Department']?>
</td>
</tr>
<tr>
   <td>Residence</td> 
  <td>
  <?php echo $row['Residence']?>
</td>
</tr>
<tr>
   <td>Room</td> 
  <td>
  <?php echo $row['Room']?>
</td>
</tr>
<tr>
   <td>Mobile Number</td> 
  <td>
  <?php echo $row['Mobile_Number']?>
</td>
</tr>
<tr>
   <td>Date Registered</td> 
  <td>
  <?php echo $row['DateRegistered']?>
</td>
</tr>
</tbody>
</table>
</div>
<?php
  
 }else if($_SESSION['User'] == "Staff"){ 
   
  $sql = "SELECT * FROM staff WHERE staff_No = '$Username'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
   
  $row = $result->fetch_assoc();
  
 
  
 } 

  ?>
<div class="table-responsive">
<table  class="table table-hover">
<thead>
<tr>

<th scope="col"><?php
$name = $row["sName"];
echo $row['title']." ".$name[0]. " ".$row['Surname'];?></th>
    </tr>
<thead>
  <tbody>
  <tr>
   <td>Staff Number</td> 
  <td>
  <?php echo $row['Staff_No']?>
</td>
</tr>

<tr>
   <td>Office</td> 
  <td>
  <?php echo $row['Office']?>
</td>
</tr>
<tr>
   <td>Department</td>  
  <td>
  <?php echo $row['Department']?>
</td>
</tr>
<tr>
   <td>Mobile Number</td> 
  <td>
  <?php echo $row['MobileNumber']?>
</td>
</tr>

<tr>
   <td>Date Registered</tdd> 
  <td>
  <?php echo $row['DateReg']?>
</td>
</tr>
</tbody>
</table>
</div>
<?php }
if($_SESSION['Role'] == "hod"){ 
 $sql = "SELECT * FROM authapointee Where Staff_No = '$Username' " ;

 $result = $conn->query($sql);
$apointees  = [];
if ($result->num_rows > 0) {
  $showJoint =true;
    while($line = $result->fetch_assoc()){ 
    array_push($apointees,$line);
      
     }
 
}
}
   


$conn->close();
   
if($showDrop){
   ?>

<div class="table-responsive">
<table class="table table-hover">
  <thead>
    <tr>
<th scope = "col">Drop Off</th>
</tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Id Number</th>
      <th scope="col">Surname</th>
      <th scope="col">Name</th>
      <th scope="col">Relationship</th>
      <th scope="col">Number</th>
      <th scope="col">Second Number</th>
      <th scope="col">Address</th>
      <th scope="col">Add Car</th>
    
    </tr>
  </thead>
  <tbody>

   
   <?php 
   $i = 0;
  foreach($drops as $drop) { ?>
  <?php $i++;?>
  <tr>
  <th scope= "row"><?php echo $i?></th>
  <td><?php echo $drop['ID_Number']?></td>
  <td><?php echo $drop['dSurname']?></td>
  <td><?php echo $drop['dName']?></td>
  <td><?php echo $drop['Relationship']?></td>
  <td><?php echo $drop['pNumber']?></td>
  <td><?php echo $drop['sNumber']?></td>
  <td><?php echo $drop['dAddress']?></td>
  <td><a href="Dashboard.php?addDropcar=<?php echo $drop['ID_Number'];?>" class = "btn btn-primary">Add</a></td>
 
</tr>
  

 <?php }

 ?> 
 
 
  </tbody>
</table>
  </div>
  <?php } ?>
  <?php if($showJoint){ ?>
    <div class="table-responsive">
<table class="table table-hover">
  <thead>
    <tr>
<th scope = "col">Authorized Joint appointees</th>
</tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Staff Number</th>
      <th scope="col">Surname</th>
      <th scope="col">Name</th>
      <th scope="col">Remove Authority</th>
    </tr>
  </thead>
  <tbody>

   
   <?php 
   $i = 0;
  foreach($apointees as $joint) { ?>
  <?php $i++;?>
  <tr>
  <th scope= "row"><?php echo $i?></th>
  <td><?php echo $joint['Staff_authed']?></td>
  <td><?php echo $joint['aSurname']?></td>
  <td><?php echo $joint['aName']?></td>
  <td><a href="Dashboard.php?removeJ= <?php echo $joint['Staff_authed'];?>" class = "btn btn-primary">Remove</a></td>
 
</tr>

 <?php } ?>
 
 
  </tbody>
</table>
  </div>


 <?php } ?>
<?php if($showProjects){  ?> 
  <div class="table-responsive">
<table class="table table-hover">
  <thead>
    <tr>
<th scope = "col">Projects</th>
</tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Project By</th>
      <th scope="col">Name of Organization</th>
      
      <th scope="col">Address of Organization</th>
      
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Type of contractor</th>
      <th scope = "col">Add Contractor</th>
         
    </tr>
  </thead>
  <tbody>

   
   <?php 
   $i = 0;
  foreach($projects as $project) { $i++;?>
  
  <tr>
  <th scope= "row"><?php echo $i;?></th>
  <td><?php echo $project['Staff_No']?></td>

  <td><?php echo $project['pNameOfOrganization']?></td>
  <td><?php echo $project['pAddressOfOrganization']?></td>
  <td><?php echo $project['pStartDate']?></td>
  <td><?php echo $project['pEndDate']?></td>
  <td><?php echo $project['pAppointmentType']?></td>

  <td> <a href="Dashboard.php?addProj=<?php echo $project['project_Id'];?>" class = "btn btn-primary">Add</a></td>
</tr>
  

 <?php }

 ?> 
 
 
  </tbody>
</table>
  </div>

  <?php } ?>
  <?php if($showContractor){ ?>
    <div class="table-responsive">
<table class="table table-hover">
  <thead>
    <tr>
<th scope = "col">Contractors</th>
</tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID Number</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Phone Number</th>
      <th scope = "col">Add Car</th>

    </tr>
  </thead>
  <tbody>

   
   <?php 
  $i = 0;
  foreach($contractors as $contractor) {
    $i ++;
    ?>
  
  <tr>
  <th scope= "row"><?php echo $i;?></th>
  <td><?php echo $contractor['cId_Number']?></td>
  <td><?php echo $contractor['cFirstName']?></td>
  <td><?php echo $contractor['cLastName']?></td>
  <td><?php echo $contractor['cPhoneNumber']?></td>
  
  
  
  <td> <a href="Dashboard.php?addCon=<?php echo $contractor['cId_Number'];?>" class = "btn btn-primary">Add</a></td>
</tr>
  

 <?php }

 ?> 
 
 
  </tbody>
</table>
  </div>


 <?php } ?>
<?php if($showCar){ ?>
   
  <div class="table-responsive">
<table class="table table-hover">
  <thead>
    <tr>
<th scope = "col">Cars</th>
</tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Make</th>
      <th scope="col">Model</th>
      <th scope="col">Color</th>
      <th scope="col">Registration Number</th>
      <th scope="col">Parking Disc</th>
      <th scope="col">Identification Number</th>
    </tr>
  </thead>
  <tbody>

   
   <?php 
   $i = 0;
  foreach($cars as $car) { ?>
  <?php $i++;?>
  <tr>
  <th scope= "row"><?php echo $i?></th>
  <td><?php echo $car['make']?></td>
  <td><?php echo $car['model']?></td>
  <td><?php echo $car['color']?></td>
  <td><?php echo $car['RegNo']?></td>
  <td><?php echo $car['car_for']?></td>
  <td><?php echo $car['Iden_Num']?></td>
</tr>
  

 <?php } 
 
 ?> 
 

  </tbody>
 
</table>
  </div>
  <?php } ?>
  </div>
   <div>

  </div>
