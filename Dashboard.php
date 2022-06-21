<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>
     <?php include "style.css"; ?>
     </style>

       <script src="https://kit.fontawesome.com/801584dfd1.js" crossorigin="anonymous"></script>
</head>
<body>
   
<?php

if(!isset($_SESSION['Allow'])){
  header('Location:login.php');
  
  exit();
}
$confirmAuth=false;
$AuthJoint = false;
$addCar  = false;
$addContractor = false;
$addProject = false;
$conRemove = false;
$viewCars = false;
$RegCar = false;
$dropoff = false;
$DropOffExist = false;
$ShowInfo = false;
$successPage = false;
$anotherDrop =false;
$dID=$dSurname=$dName=$Rel=$pNumber=$sNumber=$Address=$StudentNo="";

if(isset($_POST['RemoveJ'])){
  $staff =  trim($_SESSION['removeJ']); 
  include "DB.php";


  $Sql = "UPDATE car SET car_for = 'staff' where Iden_Num = '$staff' and car_for LIKE 'Joint%' ";
  if($conn->query($Sql)){
    $_SESSION['sMessage'] = "You have successfully removed the joint apointee with the staff Number of ".$staff.", they are now just a staff Member."; 
  }else{
    echo $conn->error();
  }
  $Sql = "DELETE FROM authapointee where Staff_authed = '$staff'";
  if($conn->query($Sql)){
   
  }else{
    echo $conn->error();
  }
  
   $conn->close();
}
if(isset($_POST['cancel'])){
  $ShowInfo = true;
}
if(isset($_GET['removeJ'])){
  
  $staff = $_GET['removeJ']; 
  $_SESSION['removeJ'] = $staff;
  
  $conRemove = true;
}

if(isset($_POST['RegDrop'])){
$dID = $_POST['ID'];
$dSurname = $_POST['dSurname'];
$dName = $_POST['dName'];
$Rel = $_POST['Rel'];
$pNumber = $_POST['pMobile'];
$sMobile = $_POST['sMobile'];
$Address = $_POST['Address'];



include "DB.php";
$StudentNo = $_SESSION['Username'];
$_SESSION['Iden_Num'] = $dID;
$sql = "INSERT INTO dropoff (ID_Number,dSurname,dName,Relationship,pNumber,sNumber,dAddress,Student_Staff_No) 
VALUES ('$dID','$dSurname','$dName','$Rel','$pNumber','$sNumber','$Address','$StudentNo') ";
if($conn->query($sql) === TRUE){
$_SESSION['sMessage'] = "You have successfully Registered a Drop off' s Personal information, You can now their car(s) here";
$successPage = true;
  
$showInfo = true;
$_SESSION['carFor'] ="Drop Off";
}  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
$conn->close();
}
if(isset($_GET['addProj'])){
  $_SESSION['carFor'] ="Contractor";
  $_SESSION['Iden_Num'] = trim($_GET['addProj']);
  $addContractor = true;
}
if(isset($_GET['addCon'])){
  $_SESSION['carFor'] ="Contractor";
  $_SESSION['Iden_Num'] = trim($_GET['addCon']);
  $addCar = true; 
}
if(isset($_GET['addDropcar'])){
  $_SESSION['carFor'] ="Drop Off";
  $_SESSION['Iden_Num'] = trim($_GET['addDropcar']);
  $addCar = true;    
}



if(isset($_POST['AuthConfirmed'])){
  include "DB.php";
  $staff = $_SESSION['staff_Auth']; 
  
  $Auth = $_SESSION['Auth'];
  $Sql = "UPDATE car SET car_for = '$Auth' where Iden_Num= '$staff' and car_for = 'staff' ";
  if($conn->query($Sql)){
$successPage= true;    
  }else{
    echo $conn->error();
  }
  $staff_No = $_SESSION['Username'];
  $Sql = "SELECT title, Surname,sName FROM staff WHERE Staff_No = '$staff'";
  $result = $conn->query($Sql);
  $row = $result->fetch_assoc();
  
    $title = $row['title'];
    $Sur = $row['Surname'];
    $name = $row['sName'];
    $Sql = "SELECT * FROM authapointee WHERE Staff_authed = '$staff'";
   
    $result = $conn->query($Sql);
  
    
    $Add = $result->num_rows == 0;  
 if($Add){
  $Sql = "INSERT  INTO authapointee(Staff_authed,aSurname,aName,Staff_No)
   values('$staff','$Sur','$name','$staff_No')";
  if($conn->query($Sql)){
    $_SESSION['sMessage'] = "You successfully authorized ".$Sur." ".$name." to be a Joint Apointee";
  }else{
    echo $conn->error();
  }
}
  $conn->close();
}

if(isset($_POST['confirmAuth'])){
  $confirmAuth = true;
}


if(isset($_POST['Authorize'])){
  $AuthJoint = true;
}


//Adding Contractor Information to the Database
if(isset($_POST['RegProject'])){
 $projName = $_POST['projName'];

 $projAddress = $_POST['pAddress'];

 $pStartDate = $_POST['pStartDate'];
 $pEndDate = $_POST['pEndDate'];

include "DB.php";
$staff = $_SESSION['Username'];
$sql = "INSERT INTO project (Staff_No,pNameOfOrganization,pAddressOfOrganization,pStartDate,pEndDate,pAppointmentType) 
VALUES ('$staff','$projName','$projAddress','$pStartDate','$pEndDate','Permanent') ";
if($conn->query($sql) === TRUE){
  $_SESSION['sMessage'] = "You have successfully Registered a Project, You can now contractors";
    $successPage = true;
  
      
  $_SESSION['carFor'] ="Contractor";
  $_SESSION['Iden_Num'] = $staff;
  $ShowInfo = true;
}  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
$conn->close();
}
//End of code to add Contractor bio to Database
if(isset($_POST['RegContractor'])){
  $cId_Number = $_POST['cID'];
  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $phone_no = $_POST['PhoneNumber'];
  $projNo = $_SESSION['Iden_Num'];
 include "DB.php";
 $staff = $_SESSION['Username'];
 $sql = "INSERT INTO contractors (cId_Number,cFirstName,cLastName,cPhoneNumber,project_NO,Staff_No) 
 VALUES ('$cId_Number','$fName','$lName','$phone_no','$projNo','$staff') ";
 if($conn->query($sql) === TRUE){
   $_SESSION['sMessage'] = "You have successfully Registered a Contractor, You can now add their Car(s)";
     $successPage = true;
   
       
   $_SESSION['carFor'] ="Contractor";
   $_SESSION['Iden_Num'] = $cId_Number;
   $ShowInfo = true;
 }  else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
 $conn->close();
 }

if(isset($_POST['anotherDrop'])){

  $DropOffExist = false;
  $dropoff = true;
  $anotherDrop = true;
}
if(isset($_POST['Register'])){
$make = $_POST['make'];
$model= $_POST['model'];
$color = $_POST['color'];
$RegNo = $_POST['RegNo'];
$target = "images/".basename($_FILES['image']['name']);
$vin = $_FILES['image']['name'];
include "DB.php";

$Username = $_SESSION['Iden_Num'];

$CarOwner = $_SESSION['carFor'];
$sql = "INSERT INTO car (RegNo,model,make,color,vin,Iden_Num,car_for)
VALUES ('$RegNo','$model','$make','$color','$vin','$Username','$CarOwner')";
if ($conn->query($sql) === TRUE) {
  $_SESSION['sMessage'] = $vin. " You have successfully Registered a car with a parking Disc of ".$CarOwner." and the unique identifier of ".$Username;
    $successPage = true;
  $showInfo = true;
    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
$conn->close();
}
if(isset($_POST['RegCar'])){
  
  $RegCar = true;
 
 }
 if(isset($_POST['Project'])){
$addProject = true;
 }
if(isset($_POST['AddCar'])){
 $addCar = true;
$_SESSION['carFor'] = $_SESSION['User'];
$_SESSION['Iden_Num'] = $_SESSION['Username'];
}
if(isset($_POST['DropOff'])){
  $dropoff = true;

}
if(isset($_POST['ShowInfo'])){
  $ShowInfo = true;

}



?>

<br><br><br><br>
    <div class = "contain">
     
      
      <img src="logo.png" height="100" alt="Sample photo">
     
     <br><br>
  

  

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">Parking System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" >
        <form method = "Post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <ul class="navbar-nav ms-auto"  >
            
            <li class="nav-item">
            <input class = "linkbtn " class = "foc" type="submit" name = "RegCar" value="Register Car">
            </li>
            <li class="nav-item">
            <input class = "linkbtn" type="submit" name = "ShowInfo" value="View">
            </li>
          
          
          </ul>
</form>
        </div>
      </nav>   
  <br><br>


<?php 
 if($successPage){
  include "successful.php";
}

  if($ShowInfo) { 
  
   include "showinfo.php";
  }
   if ($addCar) { 
  include "addCar.php";
  
} 
if ($RegCar){
  include "regCar.php";
}
if ($dropoff){
  include "dropoff.php";
}
 if($addContractor){

   include "contractor.php";
 }
 if($addProject){

  include "project.php";
}
 if($conRemove){
  include "confirmRemove.php";
 }
 if($AuthJoint){
 
     include "jointappointee.php";
   }
   if($confirmAuth){
     include "authjoint.php";
   }
 ?>

<form method = "POST" action = "logout.php"> <br>
<input class = "btn btn-outline-primary" type = "submit" value = "Logout">

</form>    

</div>

<script>
if(window.history.replaceState){
  window.history.replaceState(null,null,window.location.href);
}

</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</body>
</html>