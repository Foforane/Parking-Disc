<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        <?php include "style.css";?>
        </style>

</head>
<body>
    <?php
    $error = "";
    $Username = "";
 if($_SERVER['REQUEST_METHOD'] == "POST"){
     $User = $_POST['Reg_type'];
     $Username = trim($_POST['staff_student']);
     $pin = $_POST['pin'];
     
      
     include "DB.php";
     if($User == "Student"){
         $sql = "SELECT * FROM regstudents WHERE StudentNo = '$Username' AND pin = '$pin'";
     }else{
        $sql = "SELECT * FROM regstaff WHERE StaffNo = '$Username' AND pin = '$pin'";
         
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
          header("Location:index.php");
          exit();

         }else{
             $error= "Wrong ".$User." Number or Pin";
         }
         $conn->close();
     } 
    

?>
<br><br><br><br>
   <div class="contain login">
<center> <img src="logo.png" height="100" alt="Sample photo"> </center>
   <br>    

<div class = "inner">
 <form method = "post"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <input type ="radio" id="student" onClick = "changeUser()" name="Reg_type" checked value="Student">
	<label for ="Student">Student </label>
	<input type ="radio" onClick = "changeUser()"  id="staff" name="Reg_type" value="Staff">
    <label for ="staff">Staff</label>
	
	</br>
	</br>
    

	<label id = "User" for="Student/Staff Number">Student Number</label>
	<input type="text" value = "<?php echo $Username?>" id="Student/Staff Number"  name="staff_student" required>
   
    <label for="pin_">Pin</label>
	<input type="password" id="pin_" name="pin"required>
   



    
    </br><input type="submit" class = "btn btn-outline-primary btn-lg" value="Login">
	<br><small><?php echo $error?></small>
  </form>
</div>
</div>
<script src = "script.js" > 

    </script>
</body>
</html>

