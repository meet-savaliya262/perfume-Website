<?php session_start();

    if(isset($_SESSION['admin']['status']) && isset($_GET['lid']))
    {
        include("../include_files/config.php");
        $lid=$_GET['lid'];
        $status=$_GET['status'];
        $q="update latest_product set l_status=".$status." where l_id= ".$lid;
        mysqli_query($link,$q);
        $_SESSION['success']="product Successfully Updated";
        header("location:latest_product_list.php");
    }
    else
    {
        header("location:login.php");
    }

?>