<?php
ob_start();
include("include_files/header.php");

if(!isset($_SESSION['client']['id'])) {
   header("location:index.php");
   exit;
}


$uid = $_SESSION['client']['id'];

$q = "SELECT * FROM orders WHERE o_uid = $uid ORDER BY o_id DESC";
$res = mysqli_query($link, $q);

?>

<section class="inner_page_head">
   <div class="container-fluid"> 
      <div class="row">
         <div class="col-md-12">
            <div class="full">
               <h3>My Orders</h3>
               <nav aria-label="breadcrumb" class="text-center">
                  <ol class="breadcrumb bg-transparent p-0 mt-2 justify-content-center">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">My Orders</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="thankyou-modern">
   <div class="container">

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

      <div class="order-card mb-4 border rounded shadow-sm bg-white">
         <!-- Top Bar -->
         <div class="d-flex justify-content-between align-items-center p-3 border-bottom bg-light">
            <div>
               <strong>Order Date</strong>  
               <span class="text-muted"> | <?php echo date("d M Y", strtotime($row['o_time'])); ?></span>
            </div>
            <div>
               <span class="badge bg-success">Placed</span>
            </div>
         </div>

         <!-- Shipping Info -->
         <div class="p-3 border-bottom">
            <p class="mb-1"><strong>Payment:</strong> <?php echo $row['o_payment']; ?></p>
            <p class="mb-0"><strong>Shipping Address:</strong> <?php echo $row['o_address_line1'].' , '.$row['o_city'].' , '.$row['o_state']; ?></p>
         </div>

         <!-- Products -->
         <div class="p-3">
            <?php 
               while($p_row = mysqli_fetch_assoc($p_res)) 
               { 
                  echo '<div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                     <img src="products_image/'.$p_row['p_img'].'" 
                        alt="'.$p_row['p_nm'].'" 
                        style="width:100px;height:100px;object-fit:cover;" 
                        class="me-3 border rounded">

                     <div class="flex-grow-1 ml-5">
                        <h6 class="mb-1">'.$p_row['p_nm'].'</h6>
                        <p class="mb-0 text-muted"><b>Description:</b> '. $p_row['p_description'] .'</p>
                     </div>

                     <div class="text-end">
                        <p class="mb-1"><strong>Price : ₹'. $p_row['p_price'] .'</strong></p>
                     </div>
                  </div>';
               }    
            ?>
         </div>

         <!-- Footer Buttons -->
         <div class="d-flex justify-content-end gap-2 p-3 border-top bg-light">
            <a href="products.php" class="btn btn-sm btn-outline-secondary bg-primary text-white">Continue Shopping</a>
         </div>
      </div>

      <?php 
            } 
         } 
         else 
         { 
            echo '<div class="alert alert-info">You have not placed any orders yet.</div>';
         } 
      ?>
   </div>
</section>


<?php
include("include_files/footer.php");
?>
