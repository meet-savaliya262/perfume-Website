<?php 
ini_set('session.gc_maxlifetime', 86400); // 24 hours
session_set_cookie_params(86400);
session_start();

    if(isset($_POST['pid']))
    {
        $id=$_POST['pid'];
        $qty=$_POST['qty'];
        include("include_files/config.php");
        $q="select p_nm,p_price,p_img from products where p_id=".$id;
        $res=mysqli_query($link,$q);
        $row=mysqli_fetch_assoc($res);
        $_SESSION['cart'][]=array('id'=>$id,'qty'=>$qty,'nm'=>$row['p_nm'],'price'=>$row['p_price'],'img'=>$row['p_img']);
        header("location:product-single.php?pid=".$id);
    }

    else if(!empty($_POST))
    {
        foreach($_POST as $id=>$val)
        {
            $_SESSION['cart'][$id]['qty']=$val;
        }
        header("location:cart.php");
    }

    else if(isset($_GET['rid']))
    {
            $id=$_GET['rid'];
            unset($_SESSION['cart'][$id]);
            header("location:cart.php");
    }
?>