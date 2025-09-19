<?php session_start();
    if(isset($_SESSION['admin']['status']) && isset($_GET['lid']))
    {

        include("../include_files/config.php");
        $lid=$_GET['lid'];
        $sq="select l_img from latest_product where l_id=".$lid;
        $sres=mysqli_query($link,$sq);
        $srow=mysqli_fetch_assoc($sres);
        unlink("../products_image/latest_product_img/".$srow['l_img']);
        $q="delete from latest_product where l_id=".$lid;
        mysqli_query($link,$q);
        $_SESSION['success']="product successfully deleted";
        header("location:latest_product_list.php");
    }
    else
    {
        header("location:login.php");
    }


?>