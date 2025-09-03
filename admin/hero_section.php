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
            <h1>Add Hero Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Hero Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Hero Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="hero_process.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <?php
                      if(isset($_SESSION['success']))
                      {
                        echo'<p class="alert alert-success">'.$_SESSION['success'].'</p>';
                        unset($_SESSION['success']);
                      }
                  ?>
                  <div class="form-group">
                    <label for="pnm">Product Name</label>
                    <input type="text"  name="hpnm" class="form-control" id="pnm" >
                     <?php
                        if(isset($_SESSION['error']['hpnm']))
                        {
                            echo '<font color="red">'.$_SESSION['error']['hpnm'].'</font>';
                        }
                     ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Hero Product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="hpimg" class="custom-file-input" id="pimg">
                        <label class="custom-file-label" for="pimg">Choose file</label>
                      </div>
                    </div>
                    <?php
                        if(isset($_SESSION['error']['hpimg']))
                        {
                            echo '<font color="red">'.$_SESSION['error']['hpimg'].'</font>';
                        }
                     ?>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <?php
                    if(! empty($_SESSION['error']))
                    {
                        unset($_SESSION['error']);
                    }
                ?>
              </form>
            </div>
          </div>
           <!-- /.card -->
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php 
    include("inc/footer.php");

?>