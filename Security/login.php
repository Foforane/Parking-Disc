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
    
 if($_SERVER['REQUEST_METHOD'] == "POST"){
     
   
     $pin = trim($_POST['pin']);
    
      
                         
      
         
         if($pin === "12345"){
             $_SESSION['security'] = "yes";
             
          header("Location:index.php");
          exit();
         }
      $error = "Wrong Pin";
         
     } 
    

?>
<br><br><br><br>
   <div class="contain login">
<center> <img src="logo.png" height="100" alt="Sample photo"> </center>
   <br>    

<div class = "inner">
 <form method = "post"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
    

	<label id = "User" for="Username_">Admin</label>
	<input type="text" value = "Admin" id="Username_"  name="Admin" readonly required>
   
    <label for="pin_">Pin</label>
	<input type="password" id="pin_" name="pin"required>
   



    
    </br><input type="submit" class = "btn btn-outline-primary btn-lg" value="Login">
	<br><small><?php echo $error?></small>
  </form>
</div>
</div>

</body>
</html>

