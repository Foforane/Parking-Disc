
  
<?php

if(!isset($_SESSION['security'])){
  header('Location:login.php');
  
  exit();
}?>
<h3>Check the user first</h3>
    <form method = "Post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type ="radio" id="student" onClick = "changeUser()" name="Reg_type" checked value="Student">
	<label for ="Student">Student</label>
	<input type ="radio" onClick = "changeUser()"  id="staff" name="Reg_type" value="Staff">
    <label for ="staff">Staff</label><br><br>
	<label id = "User" for="Student/Staff Number">Student Number</label>
     <input type="text" name = "sNum" required id = "Staff_">
    <input type="submit" class = "btn btn-primary" value="register User" name = "regUser">
     </form> 
