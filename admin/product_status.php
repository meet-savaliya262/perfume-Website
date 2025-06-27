<?php session_start();

    if(isset($_SESSION['admin']['status']) && isset($_GET['pid']))
    {
        include("../include_files/config.php");
        $pid=$_GET['pid'];
        $status=$_GET['status'];
        $q="update products set p_status=".$status." where p_id= ".$pid;
        mysqli_query($link,$q);
        $_SESSION['success']="Product Successfully Updated";
        header("location:product-list.php");
    }
    else
    {
        header("location:login.php");
    }

?>