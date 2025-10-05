<?php
ob_start();
include("include_files/header.php");

if(!isset($_SESSION['client']['id'])) {
   header("location:login.php");
   exit;
}

$uid = $_SESSION['client']['id'];
$q = "SELECT * FROM orders WHERE o_uid = $uid ORDER BY o_id DESC";
$res = mysqli_query($link, $q);
?>

<section class="inner_page_head">
   <div class="container-fluid"> 
      <div class="row">
         <div class="col-md-12 text-center">
            <h3 class="text-white">My Orders</h3>
            <ol class="breadcrumb bg-transparent p-0 mt-2 justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">My Orders</li>
            </ol>
         </div>
      </div>
   </div>
</section>

<div class="container my-4">
<?php 
   if(mysqli_num_rows($res) > 0) 
   { 
      while($row = mysqli_fetch_assoc($res)) 
      { 
         $pids = json_decode($row['o_pid']);
         $ids = implode(",", $pids);
         $p_q = "SELECT * FROM products WHERE p_id IN ($ids)";
         $p_res = mysqli_query($link, $p_q);
   ?>


   <div class="order-card border rounded shadow-sm mb-4 bg-white p-3">

      <div class="order-header clearfix d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
         <div>
            <strong>Order Date:</strong> <?php echo date("d M Y", strtotime($row['o_time'])); ?>
         </div>
         <div>
           <?php
               $status = strtolower(trim($row['o_status']));

               if ($status == 'pending') {
                  $cls = "status-badge pending";
               } 
               elseif ($status == 'hold') {
                  $cls = "status-badge hold";
               } 
               elseif ($status == 'cancelled') {
                  $cls = "status-badge cancelled";
               } 
               elseif ($status == 'delivered') {
                  $cls = "status-badge delivered";
               } 
               else {
                  $cls = "status-badge default";
               }
            ?>

               <span class="<?php echo $cls; ?>">
               <?php echo htmlspecialchars($row['o_status']); ?>
               </span>


         </div>
      </div>

      <div class="order-info mb-3">
         <p><b>Payment:</b> <?php echo $row['o_payment']; ?></p>
         <p><b>Address:</b> <?php echo $row['o_address_line1'].' , '.$row['o_city'].' , '.$row['o_state']; ?></p>
         <p><b>Notes:</b> <?php 
                              if($row['o_note']){echo $row['o_note'];}
                              else{echo 'Empty';}
                           ?>
         </p>
      </div>

      <div class="order-products">
         <div class="row g-3">
            <?php 
               $total = 0;
               while($p_row = mysqli_fetch_assoc($p_res)) 
               { 
                  $total += $p_row['p_price'];
            ?>
               <div class="col-md-4 col-sm-6 col-12">
                  <div class="card h-100 shadow-sm border-0">
                     <img src="products_image/<?php echo $p_row['p_img']; ?>" 
                        alt="<?php echo $p_row['p_nm']; ?>" 
                        class="card-img-top" style="height:200px;object-fit:cover;">
                     <div class="card-body text-center">
                        <h6 class="fw-bold"><?php echo $p_row['p_nm']; ?></h6>
                        <p class="text-muted small mb-2">
                           <?php echo mb_strimwidth($p_row['p_description'], 0, 60, '...'); ?>
                        </p>
                        <div class="product-price fw-bold text-dark">₹<?php echo $p_row['p_price']; ?></div>
                     </div>
                  </div>
               </div>
            <?php 
               } 
            ?>
        </div>
      </div>

      <div class="order-summary mt-3 p-3 border rounded bg-light">
         <h6 class="fw-bold mb-2">Order Summary</h6>
         <p class="mb-1"><b>Items:</b> <?php echo count($pids); ?></p>
         <p class="mb-0"><b>Total:</b> <strong>₹<?php echo $total; ?></strong></p>
      </div>

      <div class="order-footer text-center mt-3">
         <a href="products.php" class="btn btn-attractive">Continue Shopping</a>
      </div>
   </div>
<?php 
  } 
} 
else 
{
    echo '<div class="wishlist-empty text-center p-5">
                <i class="fa-solid fa-heart-crack icon"></i>
                <h3>Your orders is Empty</h3>
                <p class="text-muted">Looks like you have not Order anything yet.<br>
                    Explore our products and order your favorites!</p>
                <a href="products.php" class="btn browse-btn mt-3">
                    <i class="fa-solid fa-shop"></i> Browse Products
                </a>
            </div>';
}
?>

<!-- Recommended Products -->
<div class="recommended-products my-5">
   <h1 class="mb-5 text-center ">You may also like this products</h1>
   <div class="row">

      <?php
         $rec_q = "select * from products order by RAND() limit 3";
         $rec_res = mysqli_query($link, $rec_q);
         while($rec = mysqli_fetch_assoc($rec_res)) 
         {
            echo '<div class="col-6 col-md-4 mb-3">
                     <div class="card h-100 shadow-sm border-0">
                        <a href="product-single.php?pid='.$rec['p_id'].'">
                           <img src="products_image/'.$rec['p_img'].'" 
                              class="card-img-top" 
                              style="height:200px;object-fit:cover;">
                        </a>
                        <div class="card-body text-center">
                           <h6 class="fw-bold"><strong>'.$rec['p_nm'].'<strong></h6>
                           <p class="text-muted"><b>₹'.$rec['p_price'].'</b></p>
                           <a href="product-single.php?pid='.$rec['p_id'].'" 
                              class="btn btn-sm btn-outline-primary" style="width:100px;">View</a>
                        </div>
                     </div>
                  </div>';
         }
      ?>
   </div>
</div>

</div>

<?php include("include_files/footer.php"); ?>


