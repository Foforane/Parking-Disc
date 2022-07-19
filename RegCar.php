<?php

if(!isset($_SESSION['security'])){
  header('Location:login.php');
  
  exit();
}?>
<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="card-deck">
  <div class="card">
    
    <div class="card-body">
      <h5 class="card-title">Your Own Car</h5>
      <p class="card-text">If you own a car that you drive and park in the university please enter it's infomation here!</p>
      <input type="submit" class = "btn btn-primary" name = "AddCar" value = "Add your personal car" />
    </div>
  </div>
<br><br>
  <div class="card">
  <div class="card-body">
      <h5 class="card-title">Drop off</h5>
      <p class="card-text">If you have someone dropping you off everyday at campus, please enter their information before they can register
        their car.</p>
      <input type="submit" class = "btn btn-primary" name = "DropOff" value = "Add Drop off" >
    </div>
    </div>
    

<?php if($_SESSION['User']=="Staff"){ ?>
  <br><br>
<div class="card">
<div class="card-body">
    <h5 class="card-title">Contractor</h5>
    <p class="card-text">If you are a project manager, you're the one responsible for registering every contractor and their sub-contractors.</p>
    <input type="submit" class = "btn btn-primary" name = "Project" value = "Add Project" >
  </div>
  </div>


<?php } ?>
<?php if($_SESSION['Role']=="hod"){ ?>
  <br><br>
<div class="card">
<div class="card-body">
    <h5 class="card-title">Joint appointee</h5>
    <p class="card-text">As the HOD you have to Authorize a Staff member to become a Joint appointee.</p>
    <input type="submit" class = "btn btn-primary" name = "Authorize" value = "Authorize Joint Appointee" >
  </div>
  </div>


<?php } ?>
</div>
</form> 
