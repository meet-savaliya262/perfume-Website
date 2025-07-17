<?php session_start();

if (!empty($_GET['pid'])) 
{
    
    $pid = $_GET['pid'];

    // Initialize session if not already
    if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = array();
    }

    // Add to wishlist if not already added
    if (!in_array($pid, $_SESSION['wishlist'])) {
        $_SESSION['wishlist'][] = $pid;
    }

    // Redirect to wishlist page
    header("Location: wishlist.php");
    exit();
}
?>
