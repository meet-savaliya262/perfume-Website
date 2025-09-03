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
            <h1>All Hero Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Hero Products</li>
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
                <h3 class="card-title">This is Heroh Products</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        include('../include_files/config.php');
                        $h_q="select * from hero where h_status=1";
                        $h_res=mysqli_query($link,$h_q);
                        $co=1;
                        while($h_row=mysqli_fetch_assoc($h_res))
                        {
                          echo'<tr>
                                <td>'.$co.'</td>
                                <td>'.$h_row['h_nm'].'</td>
                                <td><img src="../hero_product_image/'.$h_row['h_img'].'" width="60" height="60"></td>
                                <td>
                                    <a href="hero_product_edit.php?pid='.$h_row['h_id'].'" class="btn btn-success btn-sm">Edit</a>                                
                                    <a href="hero_product_delete.php?pid='.$h_row['h_id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Do you have really delete this item\');">Delete</a>';

                                echo '</td>
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