<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking System - Search</title>
    <link rel = "icon" href  = "logo.png">
  <script src="https://kit.fontawesome.com/801584dfd1.js" crossorigin="anonymous"></script>
  <style>
     <?php include "style.css"; ?>
     </style>
</head>
<body>

</body>

<div class="container">
<?php include 'main.inc'; ?>
<center> 
    <img src="logo.png" height="200" alt="Sample photo"> 
</center>   
<h3>Search to find if the car is Registered</h3> 
  
<form  method="get" action="query.php" >
     

    <label for = "Check">Reg No:</label> 
 <input id = "Check" name = "RegNo" type = "text"/>
 <br>
 <button id = "category" class = "btn"><i class="fa fa-search"></i>Search</button>
</form>
</div>
 </html>