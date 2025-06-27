<?php 
    include("inc/header.php");
    $cid=$_GET['cid'];
    $c_q="select * from category where cat_id=".$cid;
    $c_res=mysqli_query($link,$c_q);
    $c_row=mysqli_fetch_assoc($c_res);
    extract($c_row);

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Edit category</li>
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
                <h3 class="card-title">Update Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="category_update_process.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <?php
                        if(isset($_SESSION['success']))
                        {
                            echo'<p class="alert alert-success">'.$_SESSION['success'].'</p>';
                            unset($_SESSION['success']);
                        }
                    ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text"  name="cnm" value="<?php echo $cat_nm; ?>" class="form-control" id="exampleInputEmail1" >
                        <?php
                            if(isset($_SESSION['error']['cnm']))
                            {
                                echo '<font color="red">'.$_SESSION['error']['cnm'].'</font>';
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Category Image&nbsp;&nbsp;
                            <img src="../category_image/<?php echo $cat_img; ?>" width="30">
                        </label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="cimg" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file </label>
                        </div>
                        <?php
                            if(isset($_SESSION['error']['pimg']))
                            {
                                echo '<font color="red">'.$_SESSION['error']['pimg'].'</font>';
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <input type="hidden" name="cid" value="<?php echo $cat_id; ?>">
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