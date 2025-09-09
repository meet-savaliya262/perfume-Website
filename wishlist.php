<?php session_start();

    if (!isset($_SESSION['client']['id'])) 
    {
        header("location:login.php");
        exit;
    }

    $user_id = $_SESSION['client']['id'];

        include("include_files/header.php");

?>

<section class="inner_page_head">
   <div class="container-fluid"> 
      <div class="row">
         <div class="col-md-12">
            <div class="full">
               <h3>Your Wishlist</h3>
                <nav aria-label="breadcrumb" class="text-center">
                  <ol class="breadcrumb bg-transparent p-0 mt-2 justify-content-center">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                  </ol>
                </nav>
            </div>
         </div>
      </div>
   </div>
</section>


<?php
    // Get wishlist products for this user
    $q = "SELECT * FROM products 
        WHERE p_id IN (SELECT w_pid FROM wishlist WHERE w_uid = '$user_id')";

    $res = mysqli_query($link, $q);

    if (mysqli_num_rows($res) > 0) 
    {
        echo '<div class="container mt-4">';
        echo '<div class="row">'; 



        while ($row = mysqli_fetch_assoc($res)) {
            echo '<div class="col-6 col-sm-6 col-md-4 col-xl-3 mb-4">';
            echo '<div class="product-card">';
            echo '<a href="product-single.php?pid='.$row['p_id'].'" class="image-wrapper">
                     <img src="products_image/'.$row['p_img'].'">
                  </a>';
            echo '<div class="wishlist-icon">
                    <a href="wishlist_remove.php?pid='.$row['p_id'].'">
                        <i class="fas fa-heart"></i>
                    </a>
                </div>';

            echo '<div class="product-info text-center">';
            echo '<h5>'.$row['p_nm'].'</h5>';
            echo '<h6 class="price">$'.$row['p_price'].'</h6>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        
        
        echo '</div>'; 
        echo '</div>'; 
    } 
    else 
    {
        echo '<div class="wishlist-empty text-center p-5">
                <i class="fa-solid fa-heart-crack icon"></i>
                <h3>Your Wishlist is Empty</h3>
                <p class="text-muted">Looks like you have not added anything yet.<br>
                    Explore our products and save your favorites!</p>
                <a href="products.php" class="btn browse-btn mt-3">
                    <i class="fa-solid fa-shop"></i> Browse Products
                </a>
            </div>';
    }
?>

<?php
include("include_files/footer.php");
?>
