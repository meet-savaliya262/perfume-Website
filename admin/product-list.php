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
            <h1>All Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">All Product</li>
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
                    <th>Name</th>
                    <th>category</th>
                    <th>price</th>
                    <th>weight</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        include('../include_files/config.php');
                        $p_q="select * from products,category 
                              where p_cat=cat_id 
                              order by p_id desc";
                        $p_res=mysqli_query($link,$p_q);
                        $co=1;
                        while($p_row=mysqli_fetch_assoc($p_res))
                        {
                          echo'<tr>
                                <td>'.$co.'</td>
                                <td>'.$p_row['p_nm'].'</td>
                                <td>'.$p_row['cat_nm'].'</td>
                                <td>$'.$p_row['p_price'].'</td>
                                <td>'.$p_row['p_weight'].'</td>
                                <td><img src="../products_image/'.$p_row['p_img'].'" width="60" height="60"></td>
                                <td>
                                    <a href="product_edit.php?pid='.$p_row['p_id'].'" class="btn btn-success btn-sm">Edit</a>                                
                                    <a href="product_delete.php?pid='.$p_row['p_id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Do you have really delete this item\');">Delete</a>';
                                   
                                    if($p_row['p_status'] == 1)
                                    {                               
                                        echo ' <a href="product_status.php?pid='.$p_row['p_id'].'&status=0" class="btn btn-primary btn-sm">Disable</a>';
                                    }
                                    else
                                    {                               
                                        echo ' <a href="product_status.php?pid='.$p_row['p_id'].'&status=1" class="btn btn-warning btn-sm">Enable</a>';
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