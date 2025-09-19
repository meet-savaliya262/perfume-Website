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
            <h1>Add latest products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Latest Products</li>
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
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Add New Latest products</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="latest_product_process.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <?php
                      if(isset($_SESSION['success']))
                      {
                        echo'<p class="alert alert-success">'.$_SESSION['success'].'</p>';
                        unset($_SESSION['success']);
                      }
                  ?>
                  <div class="form-group">
                    <label for="pnm">latest product Name</label>
                    <input type="text"  name="lnm" class="form-control" id="pnm" >
                     <?php
                        if(isset($_SESSION['error']['lnm']))
                        {
                            echo '<font color="red">'.$_SESSION['error']['lnm'].'</font>';
                        }
                     ?>
                  </div>
                  
                 

                  <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea name="ldesc" class="form-control" id="desc" ></textarea>
                    <?php
                        if(isset($_SESSION['error']['ldesc']))
                        {
                            echo '<font color="red">'.$_SESSION['error']['ldesc'].'</font>';
                        }
                     ?>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputFile">Product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="limg" class="custom-file-input" id="pimg">
                        <label class="custom-file-label" for="pimg">Choose file</label>
                      </div>
                    </div>
                    <?php
                        if(isset($_SESSION['error']['limg']))
                        {
                            echo '<font color="red">'.$_SESSION['error']['limg'].'</font>';
                        }
                     ?>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Submit</button>
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