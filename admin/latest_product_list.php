<?php 
    include("inc/header.php");
 
  if (!isset($_SESSION['admin']['status'])) {
    header("location:login.php");
  }
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All latest Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">All latest Product</li>
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        include('../include_files/config.php');
                        $l_q="select * from latest_product";
                        $l_res=mysqli_query($link,$l_q);
                        $co=1;
                        while($l_row=mysqli_fetch_assoc($l_res))
                        {
                          echo'<tr>
                                <td>'.$co.'</td>
                                <td><img src="../products_image/latest_product_img/'.$l_row['l_img'].'" width="100" height="160"></td>
                                <td>'.$l_row['l_nm'].'</td>
                                <td>'.$l_row['l_description'].'</td>
                                <td>
                                    <a href="latest_product_edit.php?lid='.$l_row['l_id'].'" class="btn btn-success btn-sm">Edit</a>                                
                                    <a href="latest_product_delete.php?lid='.$l_row['l_id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Do you have really delete this item\');">Delete</a>';
                                   
                                    if($l_row['l_status'] == 1)
                                    {                               
                                        echo ' <a href="latest_product_status.php?lid='.$l_row['l_id'].'&status=0" class="btn btn-primary btn-sm">Disable</a>';
                                    }
                                    else
                                    {                               
                                        echo ' <a href="latest_product_status.php?lid='.$l_row['l_id'].'&status=1" class="btn btn-warning btn-sm">Enable</a>';
                                    }

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