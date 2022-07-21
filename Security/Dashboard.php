<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|Parking Disc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>
     <?php include "style.css"; ?>
     </style>

       <script src="https://kit.fontawesome.com/801584dfd1.js" crossorigin="anonymous"></script>
</head>
<body>
   
<?php

if(!isset($_SESSION['security'])){
  header('Location:login.php');
  
  exit();
}

$RegCar = $showReport = $checkCar = $showAppointee = $showDrop =$showStaff = $showContractor = $showStudent = false ;
 if(isset($_POST['checkCar'])){
  $checkCar = true;
}
if(isset($_POST['report'])){
  $showReport = true;
} 
if(isset($_POST['regUser'])){
  $User = $_POST['Reg_type'];
     $Username = trim($_POST['sNum']);
    
     echo "hey";
      
     include "DB.php";
     if($User == "Student"){
         $sql = "SELECT * FROM regstudents WHERE StudentNo = '$Username'";
     }else{
        $sql = "SELECT * FROM regstaff WHERE StaffNo = '$Username' ";
         
     }                              
         $results = $conn->query($sql);
         if($results->num_rows > 0){
          $row = $results->fetch_assoc();
          $_SESSION['User'] = $User;
          $_SESSION['Username'] = $Username;
          $_SESSION['Allow'] = "Allow";
          $_SESSION['carFor'] = "";
          $_SESSION['Role'] = $row['Role'];
          $_SESSION['Iden_Num']  = "";
          $_SESSION['sMessage']="";
          $_SESSION['Admin']="yes";
        
          header("Location:../index.php");
          exit();

         }else{
             $error= "Wrong ".$User." Number or Pin";
         }
         $conn->close();
}
if(isset($_POST['Query'])){
 include "DB.php";
 $RegNum = trim($_POST['reg']);
 $sql = "SELECT * FROM car WHERE RegNo = '$RegNum'";
 $result = $conn->query($sql);
 if($result->num_rows > 0){
  $showInfo = true;
  $row = $result->fetch_assoc();
  
  $carFor = $row['car_for'];
  $_SESSION['CarDes'] = $row['color']." ".$row['make']." ".$row['model'];
  $_SESSION['carType'] = $carFor;
  $_SESSION['IdenNum'] = $row['Iden_Num'];
  
 }
}
if(isset($_POST['RegCar'])){
  
  $RegCar = true;
 
 }
?>
<br><br><br><br>
<div class="contain">


 
     
      
      <img src="logo.png" height="100" alt="Sample photo">
     
     <br><br>
  

  

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">Admin|Security</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" >
        <form method = "Post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <ul class="navbar-nav ms-auto"  >
            
            <li class="nav-item">
            <input class = "linkbtn " class = "foc" type="submit" name = "checkCar" value="Check Car">
            </li>
            <li class="nav-item">
            <input class = "linkbtn" type="submit" name = "RegCar" value="Register User">
            </li>
          
            <li class="nav-item">
            <input class = "linkbtn" type="submit" name = "report" value="View all Registered users">
            </li>
        
          </ul>
</form>
        </div>
      </nav>   
  <br><br>
 <?php 
 if($RegCar){
  include "regCar.php";
 }
if($checkCar){
  include "Check.php";
}
if($showReport){
  include "report.php";
}
 ?>

<form method = "POST" action = "logout.php"> <br>
<input class = "btn btn-outline-primary" type = "submit" value = "Logout">

</form>  
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src = "script.js" > 

</script>
</body>
</html>