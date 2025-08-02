<?php
session_start();
include("include_files/db.php");

if (isset($_GET['pid']) && isset($_SESSION['client']['id'])) {
    $pid = mysqli_real_escape_string($link, $_GET['pid']);
    $user_id = $_SESSION['client']['id'];

    $q = "DELETE FROM wishlist WHERE user_id = '$user_id' AND product_id = '$pid'";
    mysqli_query($link, $q);

    header("Location: wishlist.php");
    exit();
} else {
    echo "Invalid request.";
}
?>
