<?php 
include("include_files/header.php");
?>

<section class="inner_page_head">
   <div class="container-fluid"> 
      <div class="row">
         <div class="col-md-12">
            <div class="full">
               <h3>Products</h3>
                <nav aria-label="breadcrumb" class="text-center">
                  <ol class="breadcrumb bg-transparent p-0 mt-2 justify-content-center">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Products</li>
                  </ol>
                </nav>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- product section -->
<section class="product_section layout_padding">
  <div class="container">

    <!-- Page Heading -->
    <div class="heading_container heading_center mb-4">
      <h2>Our <span>Products</span></h2>
    </div>
  

    <div class="row">
      <?php
        if(isset($_GET['cid']))
        {
          $catid=$_GET['cid'];
          $t_q="select count(*) as total from products where p_cat=".$catid." and p_status=1";
          $t_res=mysqli_query($link,$t_q);
          $t_row=mysqli_fetch_assoc($t_res);
          $total_item=$t_row['total'];
        }
        else
        {
          $t_q="select count(*) as total from products where p_status=1";
          $t_res=mysqli_query($link,$t_q);
          $t_row=mysqli_fetch_assoc($t_res);
          $total_item=$t_row['total'];
        }
        
        $cur_page= (isset($_GET['page'])? $_GET['page'] : 1) ;
        $page_per_item= 4;
        $total_page = ceil($total_item/$page_per_item);
        $start_pos = ($cur_page - 1) * $page_per_item;

        if(isset($_GET['cid']))
        {
          $catid=$_GET['cid'];
          $q = "SELECT * FROM products where p_cat=".$catid." AND p_status=1
                LIMIT ".$start_pos.",".$page_per_item;
        }
        else
        {
          $q = "SELECT * FROM products where p_status=1  
                LIMIT ".$start_pos.",".$page_per_item;
        }
        $res = mysqli_query($link, $q);

        if (mysqli_num_rows($res) <= 0) 
        {
          echo "<div class='col-12 text-center'><p>No products found.</p></div>";
        } 
        else 
        {
           while ($row = mysqli_fetch_assoc($res)) {
            echo '<div class="col-6 col-sm-6 col-md-4 col-xl-3 mb-4">';
            echo '<div class="product-card">';
            echo '<a href="product-single.php?pid='.$row['p_id'].'" class="image-wrapper">
                     <img src="products_image/'.$row['p_img'].'">
                  </a>';
            echo '<div class="product-info text-center">';
            echo '<h5 class="pro_name">'.$row['p_nm'].'</h5>';
            echo '<h6 class="price">₹'.$row['p_price'].'</h6>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        }
      ?>
    </div>
  </div>
</section>

<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="pageination">

      <?php 
        if($cur_page > 1)
        {
          if(isset($_GET['cid']))
          {
            echo '<a href="products.php?cid='.$_GET['cid'].'
                  &page='.($cur_page - 1).'"><i class="fas fa-angle-left"></i></a>';
          }
          else
          {
            echo '<a href="products.php?page='.($cur_page - 1).'"><i class="fas fa-angle-left"></i></a>';
          }
        }
      ?>

      <?php

        for($i=1;$i<=$total_page;$i++)
        {
          if(isset($_GET['cid']))
          {
              echo '<a href="products.php?cid='.$_GET['cid'].'&page='.$i.'">'.$i.'</a>';
          }
          else
          {
            echo '<a href="products.php?page='.$i.'">'.$i.'</a>';
          }
        }

      ?>
              

      <?php 
        if($cur_page < $total_page)
        {
          if(isset($_GET['cid']))
          {
            echo '<a href="products.php?cid='.$_GET['cid'].'
                  &page='.($cur_page + 1).'"><i class="fas fa-angle-right"></i></a>';
          }
          else
          {
            echo '<a href="products.php?page='.($cur_page + 1).'"><i class="fas fa-angle-right"></i></a>';
          }
        }
      ?>
      </div>
    </div>
  </div>
</div>
<?php 
include("include_files/footer.php");
?>
