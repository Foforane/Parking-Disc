<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parking System</title>
 
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

       <style>
     <?php include "style.css"; ?>
     </style>

  <script src="https://kit.fontawesome.com/801584dfd1.js" crossorigin="anonymous"></script>
</head>
<body>
<div class = "contain">
  <?php
  
  if(!isset($_SESSION['Allow'])){
  
    header('Location:login.php');
    exit();
  }

  if($_SESSION['User'] == "Student"){
    
    include "Student.php";


  
  }
  if($_SESSION['User'] == "Staff"){
    
    include "staff.php";
    
    
  }

  ?>
  </div>
  
</body>
</html>