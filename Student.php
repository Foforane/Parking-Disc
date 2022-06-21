<?php
$studentNo = $_SESSION['Username'];
$title=$surname=$fName=$lName=$Res=$department=$pMobile=$sMobile=$school=$RoomNo=""; 
$success = false;
if($_SERVER['REQUEST_METHOD']=="POST"){
     $title = $_POST['title'];
     $surname = $_POST['Surname'];
     $fName = $_POST['fName'];
     $lName = $_POST['lName'];
     $department = $_POST['Department'];
     $Res = $_POST['Res'];
     $Date =  date("Y-m-d");
     $pMobile = $_POST['pMobile'];
     $school = $_POST['School'];
     $sMobile = $_POST['sMobile'];
     $RoomNo = $_POST['Room'];
     $success=true;
}
if($success){
    include "DB.php";
   
    $sql = "INSERT INTO students (student_No,Title,Surname,FirstName,LastName,Mobile_Number,
    Secondary_Number,School,Residence,Room,Department,DateRegistered,Expired)
    VALUES ('$studentNo','$title','$surname','$fName','$lName','$pMobile','$sMobile',
    '$school','$Res','$RoomNo','$department','$Date',0)";
    $success = false;
    if ($conn->query($sql) === TRUE) {
     $success = true;
      
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    if($success){
    header("Location:Dashboard.php");
    exit();
    }
    }
include "DB.php";

$sql = "SELECT * FROM students where Student_No = '$studentNo'";

$result = $conn->query($sql);
$Registered = false;
if ($result->num_rows > 0) {
  header("Location:Dashboard.php");
  exit();
 
} 

$conn->close();

if(!$Registered) { ?>


<center> 
    <img src="logo.png" height="200" alt="Sample photo"> 
</center>   
<center>
<h2>REGISTRATION PAGE </h2>
</center>
<div class = "inner">
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
   
<label class = "req" for="Student">Student Number</label>
	<input type="text" id="Room_" name="studentNo" value = "<?php echo $studentNo?>" readonly>
    
    
	<label class = "req" for="title_">Title</label>
  <select id="title_" name="title">
	<option value="Mr">Mr</option>
  <option value="Mrs">Mrs</option>
  <option value="Ms">Ms</option>
     
  <option value="Dr">Dr</option>
    
  
  </select>
   
    <label class = "req" for="Sur_">Surname</label>
<input class = "req" type="text" id="Sur_" name="Surname" placeholder="Enter your Surname" required>
<label class = "req" for="firstName">First name</label>
<input  type="text" id="firstName" name="fName" placeholder="Enter your First Name" required>

<label for="lastName_">Last Name</label>
<input type="text" id="lastName" name="lName" placeholder="Enter your Last Name" >

<label class = "req" for="School_">School</label>
<input type="text" id="School_" name="School" placeholder="Enter Your School">

<label class = "req" for="department_">Department</label>
<input type="text" id="department_" name="Department" placeholder="Department name...">

  
<label class = "req" for="Res_">Residence</label>
	<input type="text" id="Res_" name="Res" placeholder="Enter your Res"  >
<label class = "req" for="Room_">Room number</label>
	<input type="text" id="Room_" name="Room" placeholder="Enter room number..." required>
    <label class = "req" for="pMobile_">Primary Mobile number</label>
	<input type="tel" id="pMobile_" name="pMobile" placeholder="primary mobile Number"  required>
    <label  for="sMobile_">Secondary Mobile number</label>
	<input type="tel" id="sMobile_" name="sMobile" placeholder="Enter your mobile Number" >
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
<label for="vehicle1">I certify that all information supplied in this form is true and correct.</label></br>
 
   
    </br><input class = "btn btn-primary" type="submit" value="Register">
  
	 
  </form>
</div>
<form method = "POST" action = "logout.php"> <br>
<input class = "btn btn-outline-primary" type = "submit" value = "Logout">

</form>   

<?php } ?>