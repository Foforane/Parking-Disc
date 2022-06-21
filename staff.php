
<?php

$StaffNo = $_SESSION['Username'];
$title=$sur=$name=$Department=$MobileNo=$RegNo=$Registration=""; 
$success = false;
if(isset($_POST['regstaff'])){
 
     $title = $_POST['title'];
     $sur = $_POST['Surname'];
     $name =  $_POST['Name'];
     $Department = $_POST['Department'];
     
     $Office = $_POST['Office'];
     $Date =  date("Y-m-d");
     $Mobile = $_POST['Mobile'];
     $success=true;
}
if($success){
include "DB.php";

$sql = "INSERT INTO staff (Staff_No,title,Surname,sName,Department,Office,MobileNumber,DateReg)
VALUES ('$StaffNo','$title','$sur','$name','$Department','$Office','$Mobile','$Date')";
$success = false;
if ($conn->query($sql) === TRUE) {
 
  $success=true;
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
if($success){
header("Location:Dashboard.php");
exit();
}
}
 ?>
 <?php
include "DB.php";

$sql = "SELECT * FROM staff where Staff_No = '$StaffNo'";

$result = $conn->query($sql);
$Registered = false;
if ($result->num_rows > 0) {
  header("Location:Dashboard.php");
  exit();
   
} 

$conn->close();
?>
<?php if(!$Registered) { ?>

<center> 
    <img src="logo.png" height="200" alt="Sample photo"> 
</center>   
<center>
<h2>REGISTRATION PAGE </h2>
</center>
<div class = "inner">
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
   
<label class = "req" for="Student">Staff Number:</label>
	<input type="number" id="Room_" name="stuffEmoNo" value = "<?php echo $StaffNo; ?>" readonly required>
    
    
	<label  class = "req" for="title_">Title</label>
  <select id="title_" name="title">
	<option value="Mr">Mr</option>
  <option value="Mrs">Mrs</option>
  <option value="Ms">Ms</option>
  <option value="prof">Prof</option>
    
  <option value="Dr">Dr</option>
    
  
  </select>
   
    <label  class = "req" for="Sur_">Surname:</label>
<input type="text" id="Sur_" name="Surname" required>

<label  class = "req" for="Name_">Name:</label>
<input type="text" id="Name_" name="Name" required>


<label  class = "req" for="department_">Department</label>
<input type="text" id="department_" name="Department" placeholder="Department name...">

<label  class = "req" for="Room_">Office/Room number</label>
	<input type="text" id="Room_" name="" placeholder="Enter your office or room number..." required>
 	
<label  class = "req" for="Office_">Office number</label>
	<input type="tel" id="office_" name="Office" placeholder="Enter Office number"  >
    <label  class = "req" for="Mobile_">Mobile number</label>
	<input type="tel" id="mobile_" name="Mobile" placeholder="Enter your mobile Number"  required>
 
<center> <h4>I, the undersigned here accept and agree to: </h4> </center>

<ol>
  <li>Abide by the traffic rule of the Sefako Makgatho Health Science University
	and notify the section, Department of Security Services of changes to the above information.</li></br>
  <li>Accepted that disc is issued on condition that I am sole user of the said disc
	and that no other/person(s) driving the above vehicles are permitted to use the
	the said disc to gain the access/entry to campus of the Sefako Makgatho University.</li></br>
  <li>The parking disc is only valid for that particular year of issue and will be changed
	each academic year.</li></br>
</ol>
 
 <input type="checkbox" id="vehicle1" name="vehicle1" required>
<label  for="vehicle1">I certify that all information supplied in this form is true and correct.</label></br>
 
   
    </br><input class = "btn btn-primary" type="submit" name = "regstaff" value="Register">
	 
  </form>
  <form method = "POST" action = "logout.php"> <br>
<input class = "btn btn-outline-primary" type = "submit" value = "Logout">

</form>  
</div>

<?php } ?>