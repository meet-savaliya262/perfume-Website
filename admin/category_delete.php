<?php session_start();
    if(isset($_SESSION['admin']['status']) && isset($_GET['cid']))
    {

        include("../include_files/config.php");
        $cid=$_GET['cid'];
        $sq="select cat_img from category where cat_id=".$cid;
        $sres=mysqli_query($link,$sq);
        $srow=mysqli_fetch_assoc($sres);
        unlink("../category_image/".$srow['cat_img']);
        $q="delete from category where cat_id=".$cid;
        mysqli_query($link,$q);
        $_SESSION['success']="category successfully deleted";
        header("location:category-list.php");
    }
    else
    {
        header("location:login.php");
    }


?>