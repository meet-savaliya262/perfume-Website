<?php 
ini_set('session.gc_maxlifetime', 86400); // 24 hours
session_set_cookie_params(86400);
session_start();

include("include_files/config.php");

if (isset($_POST['pid']))
{
    $id = $_POST['pid'];
    $qty = $_POST['qty'];

     $q="select p_nm,p_price,p_img from products where p_id=".$id;
    $res = mysqli_query($link, $q);
    $row = mysqli_fetch_assoc($res);

    $_SESSION['cart'][] = array(
        'id' => $id,
        'qty' => $qty,
        'nm' => $row['p_nm'],
        'price' => $row['p_price'],
        'img' => $row['p_img']
    );

    header("Location: product-single.php?pid=" . $id);
}

else if (isset($_GET['pid'])) 
{
    $id = $_GET['pid'];
    $qty = isset($_GET['qty']) ? intval($_GET['qty']) : 1;

    $q="select p_nm,p_price,p_img from products where p_id=".$id;
    $res = mysqli_query($link, $q);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['cart'][] = array(
            'id' => $id,
            'qty' => $qty,
            'nm' => $row['p_nm'],
            'price' => $row['p_price'],
            'img' => $row['p_img']
        );
    }

    header("Location: cart.php");
}

else if (!empty($_POST)) 
{
    foreach ($_POST as $id => $val) {
        $_SESSION['cart'][$id]['qty'] = $val;
    }
    header("Location: cart.php");
}

else if (isset($_GET['rid'])) 
{
    $id = $_GET['rid'];
    unset($_SESSION['cart'][$id]);
    header("Location: cart.php");
}

else
{
    header("Location: cart.php");
}
?>
