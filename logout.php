<?php
session_start();
if($_SESSION['Admin']="yes"){
    
session_unset();
session_destroy();
session_start();
    $_SESSION['security'] = "yes";
             
    header("Location:Security/index.php");
    exit();
}else{
    
session_unset();
session_destroy();
header("Location:login.php");
exit();
}
?>