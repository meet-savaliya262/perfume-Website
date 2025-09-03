<?php 
    include("inc/header.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>users Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">All Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
        if (isset($_SESSION['success']))
        {
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
                <h3 class="card-title">All Users order details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>no</th>
                    <th>order_Date</th>
                    <th>Customer Name</th>
                    <th>Product Details</th>
                    <th>Address</th>
                    <th>contact No</th>
                    <th>Total</th>
                    <th>order_status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        include('../include_files/config.php');
                        $q="select * from orders,products where o_id=p_id And o_status=1";
                        $o_res=mysqli_query($link,$q);
                        $co=1;
                        while($o_row=mysqli_fetch_assoc($o_res))
                        {
                          echo'<tr>
                                <td>'.$co.'</td>
                                <td>'.$o_row['o_time'].'</td>
                                <td>'.$o_row['o_fnm'].'&nbsp;'.$o_row['o_lnm'].'</td>
                                <td>'.$o_row['p_nm'].'</td>
                                <td>'.$o_row['o_address_line1'].'</td>
                                <td>'.$o_row['o_phone'].'</td>
                                <td>$3000</td>
                                <td>
                                 <select name="status" class="form-control input-sm">
                                    <option value="Pending">Pending</option>
                                    <option value="Hold">Hold</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                                </td>
                                </tr>';
                              $co++;
                        }

                   ?>
                  </tbody>
                </table>
                  </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php 
    include("inc/footer.php");

?>