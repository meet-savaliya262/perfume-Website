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
            <h1>All Contacts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">All Cantacts</li>
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
                <h3 class="card-title">This is All Contacts and their messages</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="dtable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Meassges</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include('../include/config.php');
                            $cq="select * from contact order by c_id desc";
                            $cres=mysqli_query($link,$cq);
                            $co=1;
                            while($crow=mysqli_fetch_assoc($cres))
                            {
                            echo'<tr>
                                    <td>'.$co.'</td>
                                    <td>'.$crow['c_fnm'].'</td>
                                    <td>'.$crow['c_email'].'</td>
                                    <td>'.$crow['c_phone'].'</td>
                                    <td>'.$crow['c_msg'].'</td>
                                    <td>'.$crow['c_time'].'</td>
                                    ';
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