<?php session_start();

    if(isset($_SESSION['admin']['status']) && isset($_GET['cid']))
    {
        include("../include_files/config.php");
        $cid=$_GET['cid'];
        $status=$_GET['status'];
        $q="update category set cat_status=".$status." where cat_id= ".$cid;
        mysqli_query($link,$q);
        $_SESSION['success']="category Successfully Updated";
        header("location:category-list.php");
    }
    else
    {
        header("location:login.php");
    }

?>