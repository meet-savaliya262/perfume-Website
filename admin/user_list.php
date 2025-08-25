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
            <h1>All Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
                <h3 class="card-title">All Register Users Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Password</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        include('../include_files/config.php');
                        $u_q="select * from users where u_status=1";
                        $u_res=mysqli_query($link,$u_q);
                        $co=1;
                        while($u_row=mysqli_fetch_assoc($u_res))
                        {
                          echo'<tr>
                                <td>'.$co.'</td>
                                <td>'.$u_row['u_fnm'].'</td>
                                <td>'.$u_row['u_email'].'</td>
                                <td>'.$u_row['u_mno'].'</td>
                                <td>'.$u_row['u_pwd'].'</td>
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