<?php

include 'DB.php';
$Sn = $_SESSION['Username'];

$sql = "SELECT * FROM dropoff WHERE Student_Staff_No = '$Sn'";
$results = $conn->query($sql);
if($results->num_rows > 0){
    $dropoffinfo = $results->fetch_assoc();
    
    $DropOffExist = true;
    
}
$conn->close();
?>
<?php if($DropOffExist && !$anotherDrop)  { ?>
<div class = "inner">
<h3>Existing Drop off Information</h3> 
<form method = "Post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p>Hello it appears on our system that <?php echo $dropoffinfo['dName'] ?> is registered as the person dropping you of everyday! 
do you have more people dropping you off?.</p>
<br><input class = "btn btn-primary" type="submit" name = "anotherDrop" value="Add Another Drop off">

<br><br>
  <input class = "btn btn-primary" type="submit" name = "cancel" value="cancel"> 
</form>
</div> 
<?php } else { ?>

    <h3>Enter the details of your drop off</h3>
 <form method = "Post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <br>
	<label class = "req" for="ID_">ID Number</label>
	<input type="text" id="ID_" name="ID" required>
	
	<label class = "req" for="Surname">Surname</label>
	<input type="text" id="Surname" name="dSurname"  required>
	<label class = "req" for="Name_">Name</label>
    <input type="text" id="Name_" name="dName" placeholder="Enter the Name you prefer" required>
    <label class="req" for="Relationship">Relationship with Student:</label> 
    <input type="text" id="Relationship" name="Rel"  required>
    <label class="req" for="pMoble_">Primary Number</label> 
    <input type="text" id="pMoble_" name="pMobile" required >
    <label for="sMoble_">Secondary Number</label> 
    <input type="text" id="sMoble_" name="sMobile" >
    <label class="req" for="Address_">Enter your Address</label> 
    <Textarea id="Address_" name = "Address" required rows="6"></Textarea>
    <br><input class = "btn btn-primary" type="submit" name = "RegDrop" value="Register Drop off">
    <br>
  </form> 
  <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <br>
  <input class = "btn btn-primary" type="submit" name = "cancel" value="cancel"> 
  </form> 
<?php } ?>