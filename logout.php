<?php session_start();

    unset($_SESSION['client']);
    
    header("location:login.php");
?>