<?php session_start();
    include("include_files/config.php");

    if (!isset($_SESSION['client']['id'])) 
    {
        header("location:login.php");
        exit;
    }

    // Get product id from URL
    if (isset($_GET['pid'])) 
    {
        $user_id = $_SESSION['client']['id'];
        $product_id = $_GET['pid'];

        // Check if already in wishlist
        $res = mysqli_query($link, "SELECT * FROM wishlist WHERE w_uid = '$user_id' AND w_pid = '$product_id'");
        
        if (mysqli_num_rows($res) > 0) 
        {
            header("location:products.php");
        } 
        else 
        {
            $t = date("Y-m-d H:i:s"); 

            $insert_q = mysqli_query($link, "INSERT INTO wishlist (w_uid, w_pid,w_time) VALUES ('.$user_id.', '.$product_id.','.$t.')");
            
            header("location:products.php");
        }
    } 
    else 
    {   
       echo '<div class="container">
                <div class="card">
                    <div class="wishlist-empty text-center p-5 ">
                        <i class="fa-solid fa-heart-crack icon"></i>
                        <h3>Your Wishlist is Empty</h3>
                        <p class="text-muted">Looks like you have not added anything yet.<br>
                            Explore our products and save your favorites!</p>
                        <a href="products.php" class="btn browse-btn mt-3">
                            <i class="fa-solid fa-shop"></i> Browse Products
                        </a>
                    </div>
                </div>
             </div>';
    }
?>
