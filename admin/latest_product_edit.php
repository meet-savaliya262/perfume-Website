<?php 
    include("../include_files/config.php");
    if (!isset($_GET['lid']) || empty($_GET['lid'])) 
    {
      header("location:latest_product.php");
       exit;
    }
    

    $lid=$_GET['lid'];
    $l_q="select * from latest_product where l_id=".$lid;
    $l_res=mysqli_query($link,$l_q);
    $l_row=mysqli_fetch_assoc($l_res);
    extract($l_row);
    
    include("inc/header.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Latest Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Edit latest product</li>
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
                <h3 class="card-title">Update latest Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="latest_product_update_process.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <?php
                      if(isset($_SESSION['success']))
                      {
                        echo'<p class="alert alert-success">'.$_SESSION['success'].'</p>';
                        unset($_SESSION['success']);
                      }
                  ?>
                  <div class="form-group">
                    <label for="lnm">Post Name</label>
                    <input type="text"  name="lnm" value="<?php echo $l_nm; ?>" class="form-control" id="lnm" >
                     <?php
                        if(isset($_SESSION['error']['lnm']))
                        {
                            echo '<font color="red">'.$_SESSION['error']['lnm'].'</font>';
                        }
                     ?>
                  </div>
                  
                  <div class="form-group">
                    <label for="ldesc">Post Description</label>
                    <textarea name="ldesc" class="form-control" id="ldesc" ><?php echo $l_description; ?></textarea>
                    <?php
                        if(isset($_SESSION['error']['ldesc']))
                        {
                            echo '<font color="red">'.$_SESSION['error']['ldesc'].'</font>';
                        }
                     ?>
                  </div>

                  <div class="form-group">
                    <label for="limg">Product Image &nbsp;&nbsp;&nbsp;
                        <img src="../products_image/latest_product_img/<?php echo $l_img; ?>" width="30">
                    </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="limg" class="custom-file-input" id="limg">
                        <label class="custom-file-label" for="limg">Choose file</label>
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
                  <input type="hidden" name="lid" value="<?php echo $l_id; ?>">
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