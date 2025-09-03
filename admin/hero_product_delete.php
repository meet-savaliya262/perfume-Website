<?php session_start();
    if(isset($_SESSION['admin']['status']) && isset($_GET['pid']))
    {

        include("../include_files/config.php");
        $hid=$_GET['pid'];
        $hq="select h_img from hero where h_id=".$hid;
        $hres=mysqli_query($link,$hq);
        $hrow=mysqli_fetch_assoc($hres);
        unlink("../hero_product_image/".$hrow['h_img']);
        $q="delete from hero where h_id=".$hid;
        mysqli_query($link,$q);
        $_SESSION['success']="hero product successfully deleted";
        header("location:hero_section_list.php");
    }
    else
    {
        header("location:login.php");
    }


?>