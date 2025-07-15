<?php 
include("include_files/header.php");
?>

<section class="inner_page_head">
   <div class="container-fluid"> 
      <div class="row">
         <div class="col-md-12">
            <div class="full">
               <h3>Search</h3>
                <nav aria-label="breadcrumb" class="text-center">
                  <ol class="breadcrumb bg-transparent p-0 mt-2 justify-content-center">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Search</li>
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

        $s=$_GET['s'];
        $q = "SELECT * FROM products where p_nm LIKE '%".$s."%' AND p_status=1";
        
        $res = mysqli_query($link, $q);

        if (mysqli_num_rows($res) <= 0) 
        {
          echo "<div class='col-12 text-center'><p><h3>No products found...</h3></p></div>";
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

<?php 
include("include_files/footer.php");
?>
