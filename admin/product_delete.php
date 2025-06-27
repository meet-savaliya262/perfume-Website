<?php session_start();
    if(isset($_SESSION['admin']['status']) && isset($_GET['pid']))
    {

        include("../include_files/config.php");
        $pid=$_GET['pid'];
        $sq="select p_img from products where p_id=".$pid;
        $sres=mysqli_query($link,$sq);
        $srow=mysqli_fetch_assoc($sres);
        unlink("../products_image/".$srow['p_img']);
        $q="delete from products where p_id=".$pid;
        mysqli_query($link,$q);
        $_SESSION['success']="product successfully deleted";
        header("location:product-list.php");
    }
    else
    {
        header("location:login.php");
    }


?>