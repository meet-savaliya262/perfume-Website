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
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
                <h3 class="card-title">Add New Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="product_process.php" method="post" enctype="multipart/form-data">
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
                    <input type="text"  name="pnm" class="form-control" id="pnm" >
                     <?php
                        if(isset($_SESSION['error']['pnm']))
                        {
                            echo '<font color="red">'.$_SESSION['error']['pnm'].'</font>';
                        }
                     ?>
                  </div>
                  <div class="form-group">
                    <label for="cat">Category</label>
                    <select name="cnm" class="form-control" id="cat">
                        <option> Select Category</option>
                        <?php
                            $cat_q="select * from category where cat_status=1";
                            $cat_res=mysqli_query($link,$cat_q);
                            while($cat_row=mysqli_fetch_assoc($cat_res)) {
                                echo '<option value="'.$cat_row['cat_id'].'">'.$cat_row['cat_nm'].'</option>';
                            }
                        ?>
                    </select>

                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text"  name="price" class="form-control" id="price" >
                    <?php
                        if(isset($_SESSION['error']['price']))
                        {
                            echo '<font color="red">'.$_SESSION['error']['price'].'</font>';
                        }
                     ?>
                  </div>
                  <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="text"  name="weight" class="form-control" id="weight" >
                    <?php
                        if(isset($_SESSION['error']['weight']))
                        {
                            echo '<font color="red">'.$_SESSION['error']['weight'].'</font>';
                        }
                     ?>
                  </div>
                  <div class="form-group">
                    <label for="short_desc">Short Description</label>
                    <textarea name="sdesc" class="form-control" id="short_desc" ></textarea>
                    <?php
                        if(isset($_SESSION['error']['sdesc']))
                        {
                            echo '<font color="red">'.$_SESSION['error']['sdesc'].'</font>';
                        }
                     ?>
                  </div>
                  <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea name="desc" class="form-control" id="desc"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="ainfo">Additional Information</label>
                    <textarea name="ainfo" class="form-control" id="ainfo" ></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="pimg" class="custom-file-input" id="pimg">
                        <label class="custom-file-label" for="pimg">Choose file</label>
                      </div>
                    </div>
                    <?php
                        if(isset($_SESSION['error']['pimg']))
                        {
                            echo '<font color="red">'.$_SESSION['error']['pimg'].'</font>';
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