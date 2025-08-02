<?php session_start();
    include("include_files/config.php");

    if (!isset($_SESSION['client']['id'])) 
    {
        header("location:login.php");
        exit;
    }

    if (isset($_GET['pid'])) 
    {
        $user_id = $_SESSION['client']['id'];
        $product_id = $_GET['pid'];

        $q = "DELETE FROM wishlist WHERE w_uid = '$user_id' AND w_pid = '$product_id'";
        mysqli_query($link, $q);
    }

    header("location:wishlist.php");
    exit;
?>
