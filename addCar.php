<?php
//op
?>
<div class = "inner">
  <?php echo "For ".$_SESSION['carFor'];?> 
 <form method = "Post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <br>
	<label for="mak">Make</label>
	<input type="text" id="mak" name="make" placeholder="Enter Make e.g BMW" required>
	
	<label for="mod">Model</label>
	<input type="text" id="mod" name="model" placeholder="Enter Model e.g M4" required>
	<label for="col">Colour</label>
    <input type="text" id="col" name="color" placeholder="Enter Colour"required>
    <label for="regno">Registration no</label>
    <input type="text" id="regno" name="RegNo" placeholder="Enter registration number.." required>
    <label class = "req" for="vin_">Upload an Image of your Vin Number</label>
  <input  type="file" id ="vin_" name="image" id="vin_">
  <br><br>
    </br><input class = "btn btn-primary" type="submit" name = "Register" value="Register">
	

  </form>
  <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <br>
  <input class = "btn btn-primary" type="submit" name = "cancel" value="cancel"> 
  </form> 
</div>
