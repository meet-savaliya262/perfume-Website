<?php
  include("include_files/header.php");
?>
<section class="inner_page_head">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <h3>Shopping Cart</h3>
          <nav aria-label="breadcrumb" class="text-center">
            <ol class="breadcrumb bg-transparent p-0 mt-2 justify-content-center">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container py-5">
  <div class="row">
    <div class="col-lg-12">
      <form action="addtocart.php" method="post">
        <table class="table cart-table">
          <thead>
            <tr>
              <th>Products</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Remove</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $total=0;
              if(isset($_SESSION['cart']))
              {
                foreach($_SESSION['cart'] as $id=>$val)
                {
                  $total_price=$val['qty'] * $val['price'];
                  $total += $total_price;

                  echo '<tr>
                          <td class="pro_details">
                            <img src="products_image/'.$val['img'].'" width="50" alt="Product">
                            <h5>'.$val['nm'].'</h5>
                          </td>
                          <td>₹'.$val['price'].'</td>
                          <td>
                            <div class="input-group input-group-sm w-75">
                              <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary btn-sm qty-minus" type="button">−</button>
                              </div>
                              <input name="'.$id.'" type="text" min="1" value="'.$val['qty'].'">
                              <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-sm qty-plus" type="button">+</button>
                              </div>
                            </div>
                          </td>
                          <td>₹'.$total_price.'</td>
                          <td>
                            <a href="addtocart.php?rid='.$id.'" class="btn btn-danger btn-sm">x</a>
                          </td>
                        </tr> ';
                }
              }

            ?>
            <!-- Sample Static Row -->
            
            <!-- More rows can go here -->
          </tbody>
        </table>
      
    </div>
  </div>

  <div class="shoping_cart_btns d-flex justify-content-between flex-wrap">
    <a href="products.php" class="btn btn-outline-secondary">Continue Shopping</a>
    <button type="submit" class="btn btn-primary ubtn"><i class="fa-solid fa-spinner"></i>&nbsp;&nbsp;Update Cart</button>
  </div>
  </form>

  <div class="row mt-4">
    <div class="col-md-8">
      <!-- Left side (optional) -->
    </div>
    <div class="col-md-4">
      <div class="cart-summary">
        <h5>Summary</h5>
        <hr>
        <p><strong>Subtotal:</strong>₹<?php echo $total; ?></p>
        <p><strong>Total:</strong> ₹<?php echo $total; ?></p>
        <a href="checkout.php" class="btn btn-primary btn-block checkbtn">Proceed to Checkout</a>
      </div>
    </div>
  </div>
</div>

<script>
  document.querySelectorAll('.qty-plus').forEach(btn => {
    btn.addEventListener('click', function () {
      const input = this.closest('.input-group').querySelector('input');
      input.value = parseInt(input.value) + 1;
    });
  });

  document.querySelectorAll('.qty-minus').forEach(btn => {
    btn.addEventListener('click', function () {
      const input = this.closest('.input-group').querySelector('input');
      if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
      }
    });
  });
</script>

<?php
  include("include_files/footer.php");
?>