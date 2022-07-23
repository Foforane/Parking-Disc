<?php

session_start();

if(isset($_SESSION['Admin'])){
    
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