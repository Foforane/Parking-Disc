<form method = "Post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php
include 'DB.php';
$confirm = false;
$nameAuth = "";

$staffAuth = $_SESSION['Username'];
$sql = "SELECT title,Surname,sName FROM staff Where  Staff_No = '$staffAuth'" ;
$result = $conn->query($sql);

$name = $result->fetch_assoc();
$nameAuth = $name['title']." ".$name['sName'][0]." ".$name['Surname'];
$_SESSION['Auth'] = "Joint Appointee Authorized by " .$nameAuth;

$staff = $_POST['staffNo'];

$sql = "SELECT Surname,sName FROM staff Where  Staff_No = '$staff'" ;
$result = $conn->query($sql);
if($result->num_rows > 0){
$confirm = true;
$_SESSION['staff_Auth'] = $staff;
$row = $result->fetch_assoc();
}

$conn->close();

if($confirm){
?>
<p>Do you want to Authorize <?php echo $row['sName'][0]." ".$row['Surname']?> to be a joint Apointee? </p>
<input type="submit" class = "btn btn-primary" value="YES" name = "AuthConfirmed">
<input type="submit" class = "btn btn-primary" value="No" name = "No">

<?php } else{ ?>
    <h2>That Staff number (<?php echo $staff?>) did not register any car!</h2>
    <input type="submit" class = "btn btn-primary" value="Try again" name = "Authorize">

    <?php } ?>
    <br>
<form>