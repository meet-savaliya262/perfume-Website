<?php 
include("inc/header.php");
include("../include_files/config.php");

$q = "SELECT * FROM orders ORDER BY o_id DESC";
$res = mysqli_query($link, $q);
?>

<div class="content-wrapper">
  <!-- Page Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users Orders</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">All Orders</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <?php
  if (isset($_SESSION['success'])) {
      echo '<p class="alert alert-success">' . $_SESSION['success'] . '</p>';
      unset($_SESSION['success']);
  }
  ?>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Users Order Details</h3>
            </div>

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Order Date</th>
                    <th>Customer Name</th>
                    <th>Products</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Total</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $co = 1;
                  while ($o_row = mysqli_fetch_assoc($res)) {
                      // product ids
                      $pids = json_decode($o_row['o_pid']);
                      
                      // check if quantity column exist else fallback 1
                      $qtys = [];
                      if (!empty($o_row['o_qty'])) {
                          $qtys = json_decode($o_row['o_qty']);
                      }

                      $ids = implode(",", $pids);

                      $p_q = "SELECT * FROM products WHERE p_id IN ($ids)";
                      $p_res = mysqli_query($link, $p_q);

                      $total = 0;

                      echo '<tr>
                        <td>'.$co.'</td>
                        <td>'.date("d M Y", strtotime($o_row['o_time'])).'</td>
                        <td>'.$o_row['o_fnm'].' '.$o_row['o_lnm'].'</td>
                        <td>';

                      $index = 0;
                      while($p_row = mysqli_fetch_assoc($p_res)) {
                          $qty = isset($qtys[$index]) ? $qtys[$index] : 1;
                          $subtotal = $p_row['p_price'] * $qty;
                          $total += $subtotal;

                          echo '<div class="d-flex align-items-center mb-2">
                                  <img src="../products_image/'.$p_row['p_img'].'" 
                                       alt="'.$p_row['p_nm'].'" 
                                       style="width:60px;height:60px;object-fit:cover;border-radius:4px;margin-right:10px;">
                                  <div>
                                    <strong>'.$p_row['p_nm'].'</strong><br>
                                    <small>₹'.$p_row['p_price'].'</small>
                                  </div>
                                </div>';
                          $index++;
                      }

                      echo '</td>
                        <td>'.$o_row['o_address_line1'].'<br>'.$o_row['o_city'].', '.$o_row['o_state'].'</td>
                        <td>'.$o_row['o_phone'].'</td>
                        <td><strong>₹'.$total.'</strong></td>
                        <td>
                                <select class="order-status" data-id="'.$o_row['o_id'].'">
                                    <option value="Pending" '.($o_row['o_status']=="Pending" ? "selected" : "").'>Pending</option>
                                    <option value="Hold" '.($o_row['o_status']=="Hold" ? "selected" : "").'>Hold</option>
                                    <option value="Delivered" '.($o_row['o_status']=="Delivered" ? "selected" : "").'>Delivered</option>
                                    <option value="Cancelled" '.($o_row['o_status']=="Cancelled" ? "selected" : "").'>Cancelled</option>
                                </select>
                            </td>
                      </tr>';

                      $co++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".order-status").on("change", function(){
        var status = $(this).val();
        var order_id = $(this).data("id");

        $.ajax({
            url: "order_update_status.php",
            type: "POST",
            data: {id: order_id, status: status},
            success: function(response){
                console.log("Server Response:", response);
                if (response.includes("success")) {
                    alert("Order status updated successfully!");
                } else {
                    alert("Error: " + response);
                }
            },
            error: function(xhr)
            {
                alert("AJAX Error: " + xhr.status);
            }
        });
    });
});
</script>



<?php include("inc/footer.php"); ?>
