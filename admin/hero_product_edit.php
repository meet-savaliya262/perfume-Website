<?php 
include("../include_files/config.php");

if (!isset($_GET['pid']) || empty($_GET['pid'])) 
{
  header("location:hero_section.php");
    exit;
}
    
$pid=$_GET['pid'];
$h_q="select * from hero where h_id=".$pid;
$h_res=mysqli_query($link,$h_q);
$h_row=mysqli_fetch_assoc($h_res);
extract($h_row);

include("inc/header.php");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Hero Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Edit Hero</li>
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
                <h3 class="card-title">Update Hero product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="hero_update_process.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <?php
                        if(isset($_SESSION['success']))
                        {
                            echo'<p class="alert alert-success">'.$_SESSION['success'].'</p>';
                            unset($_SESSION['success']);
                        }
                    ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text"  name="hnm" value="<?php echo $h_nm; ?>" class="form-control" id="exampleInputEmail1" >
                        <?php
                            if(isset($_SESSION['error']['hnm']))
                            {
                                echo '<font color="red">'.$_SESSION['error']['hnm'].'</font>';
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Hero Product Image&nbsp;&nbsp;
                            <img src="../hero_product_image/<?php echo $h_img; ?>" width="30">
                        </label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="himg" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file </label>
                        </div>
                        <?php
                            if(isset($_SESSION['error']['himg']))
                            {
                                echo '<font color="red">'.$_SESSION['error']['himg'].'</font>';
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <input type="hidden" name="hid" value="<?php echo $h_id; ?>">
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