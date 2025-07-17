<?php
   ob_start();
   include("include_files/header.php");

   // ✅ Clear cart now
   if(isset($_SESSION['cart'])) {
      unset($_SESSION['cart']);
   }

   if(! isset($_GET['orderid']) || !isset($_GET['key'])) {
      header("location:index.php");
      exit;
   }

   include("include_files/config.php");
   $session_uid = $_SESSION['client']['id']; 

   $check_q = "SELECT * FROM orders WHERE o_id=".$_GET['orderid']." AND o_order_key='".$_GET['key']."'";
   $check_res = mysqli_query($link, $check_q);

   if(mysqli_num_rows($check_res) <= 0) {
      header("location:index.php");
      exit;
   }
?>


<!-- inner page section -->
<section class="inner_page_head">
   <div class="container-fluid"> 
      <div class="row">
         <div class="col-md-12">
            <div class="full">
               <h3>Thank You</h3>
                <nav aria-label="breadcrumb" class="text-center">
                  <ol class="breadcrumb bg-transparent p-0 mt-2 justify-content-center">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Thank You</li>
                  </ol>
                </nav>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end inner page section -->

      
<section class="thankyou-modern">
   <div class="thankyou-box">
      <div class="thankyou-icon">🎉</div>

      <?php
         $oid=$_GET['orderid'];
         $q="select * from orders,users where o_uid=u_id and o_id=".$oid;
         $res=mysqli_query($link,$q);
         $row=mysqli_fetch_assoc($res);
         extract($row);
      ?>

      <h1>Thank You, <?php echo $o_fnm; ?>!</h1>
      <p>Your order has been successfully placed.</p>

      <div class="order-card">
        <h2>Shipping Info</h2>
        <p><strong>Name:</strong> <?php echo $o_fnm . ' ' . $o_lnm; ?></p>
        <p><strong>Address:</strong> <?php echo $o_address_line1 . ', ' . $o_address_line2; ?></p>
      </div>

      <div class="order-card">
        <h2>Products Ordered</h2>
        <div class="products-grid">
            <?php
               $pids = json_decode($o_pid);
               foreach($pids as $pid) 
               {
                  $p_q = "SELECT * FROM products WHERE p_id = ".$pid;
                  $p_res = mysqli_query($link, $p_q);
                  $p_row = mysqli_fetch_assoc($p_res);
                  echo '
                  <div class="product-item">
                     <img src="products_image/'.$p_row['p_img'].'" alt="'.$p_row['p_nm'].'">
                     <p>'.$p_row['p_nm'].'</p>
                  </div>';
               }
            ?>

        </div>
      </div>

      <a href="index.php" class="btn-home">← Back to Home</a>
   </div>
</section>


<?php
    include("include_files/footer.php");
?>