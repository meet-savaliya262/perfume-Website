<?php session_start();

    unset($_SESSION['admin']['status']);
    
    header("location:login.php");
?>