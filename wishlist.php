<?php 
 include("include_files/header.php");
?>

<div class="container">
  <h2 class="wishlist-title">
     <i class="fa fa-heart" style="
    background: linear-gradient(45deg, #fa003aff, #f509aaff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size: 1.2em;
    margin-right: 10px;
  "></i>
  Your Wishlist</h2>

  <div class="row">
    <?php
    if (!empty($_SESSION['wishlist'])) {
        $wishlist_ids = implode(",", array_map('intval', $_SESSION['wishlist']));
        $q = "SELECT * FROM products WHERE p_id IN ($wishlist_ids) AND p_status = 1";
        $res = mysqli_query($link, $q);

        if ($res && mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo '<div class="col-6 col-sm-6 col-md-4 col-xl-3 mb-4">';
                echo '<div class="product-card">';
                echo '<a href="product-single.php?pid='.$row['p_id'].'" class="image-wrapper">';
                echo '<img src="products_image/'.$row['p_img'].'" alt="'.$row['p_nm'].'">';
                echo '</a>';
                echo '<div class="product-info text-center">';
                echo '<h5>'.$row['p_nm'].'</h5>';
                echo '<h6 class="price">$'.$row['p_price'].'</h6>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="col-12 empty-msg">No products found in your wishlist.</div>';
        }
    } else {
        echo '<div class="col-12 empty-msg">Your wishlist is empty.</div>';
    }
    ?>
  </div>
</div>
<?php
    include("include_files/footer.php");
?>
