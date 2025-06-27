<?php
  
include("include_files/header.php");
if(!empty($_GET['pid']))
{
    $pid = $_GET['pid'];
    $q = "SELECT * FROM products,category
          WHERE p_cat=cat_id AND p_id =".$pid." AND p_status = 1";

    $res = mysqli_query($link, $q);

    $row = mysqli_fetch_assoc($res);
    extract($row);
} 
else 
{
   
    header("location:products.php");
    exit;
}
?>
      
<div class="container mt-5">
  <div class="row">
    <!-- Left: Product Image -->
    <div class="col-md-6">
      <img src="products_image/<?php echo $row['p_img']; ?>" class="product-image" alt="Product Image" width="400" height="400">
    </div>

    <!-- Right: Product Details -->
    <div class="col-md-6">
      <h2><?php echo $row['p_nm']; ?></h2>

      <!-- Star Rating -->
      <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
      </div>

      <p><?php echo $row['p_description']; ?></p>
      <h4>Price:₹<?php echo $row['p_price']; ?></h4>

          

          <?php
            $sta=0;
            if(!empty($_SESSION['cart']))
            {
              foreach($_SESSION['cart'] as $val)
              {
                if($val['nm'] == $p_nm && $val['price'] == $p_price && $val['img']== $p_img)
                {
                  $sta=1;
                }
              }
            }
            else
            {
              echo " ";
            }
            if($sta==0)
            {
              echo '<form action="addtocart.php" method="post">
                    <div class="quantity-box">
                      <button class="btn btn-secondary btn-minus"><b>-</b></button>
                      <input type="text" name="qty" class="form-control qty-input" value="1">
                      <button class="btn btn-secondary btn-plus"><b>+</b></button>
                    </div>';
              echo '<input type="hidden" name="pid" value="'.$p_id.'">';
              echo '<button type="submit" class="btn btn-primary">Add to cart</button>
               </form>';
            }
            else
            {
                echo '<span class="btn btn-warning">Item Alredy in cart</span';
            }
          ?>
       
      
      
           

      <!-- Extra Info -->
      <div class="product-meta">
        <p><strong>Category:</strong>&nbsp;&nbsp;&nbsp;<?php echo $row['cat_nm']; ?></p>
        <p><strong>Weight:</strong>&nbsp;&nbsp;&nbsp;<?php echo $row['p_weight']; ?></p>
        <p><strong>Share on:</strong>
            <div class="social-icons">
              <a href="#"><i class="fab fa-facebook-square"></i></a>
              <a href="#"><i class="fab fa-twitter-square"></i></a>
              <a href="#"><i class="fab fa-whatsapp-square"></i></a>
            </div>
        </p>
       
      </div>
    </div>
  </div>

  
</div>

<!-- JS Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<br /><br />


<?php 
  include("include_files/footer.php");

?>