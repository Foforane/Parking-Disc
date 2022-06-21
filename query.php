<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking System - Searched</title>
    <style>
     <?php include "style.css"; ?>
     </style>
</head>
<body>

    <?php
 
 $showUser = false;
 $value = $_GET["RegNo"];

 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "parking";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM car 
INNER JOIN user_info 
WHERE RegNo = '$value'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
$row = $result->fetch_assoc();
$showUser = true;
} else {
  echo "0 results";
}
$conn->close();

?>
<?php 

if($showUser){?>

<div class="container">
<?php include 'main.inc'; ?>
<h1>Information</h1>
<p><span>Fullname:</span> <?php echo $row['title']." ". $row['SurnameIni']?></p>
   <p><span>Registration:</span> <?php echo $row['Registration']?></p>
   <p><span>Identification:</span> <?php echo $row['StudentNo']?></p>
   <p><span>Department:</span> <?php echo $row['Department']?></p>
   <p><span>Office:</span> <?php echo $row['Office']?></p>
   <p><span>Mobile Number:</span> <?php echo $row['MobileNumber']?></p>
   <p><span>Registered:</span> <?php echo $row['DateReg']?></p>
  <h1>Car Information</h1>
   <p><span>Model:</span> <?php echo $row['model']?></p>
   <p><span>Make:</span> <?php echo $row['make']?></p>
   <p><span>Colour:</span> <?php echo $row['color']?></p>
   <p><span>Reg No::</span> <?php echo $row['RegNo']?></p>

  </div>



<?php } ?>
</body>
</html>