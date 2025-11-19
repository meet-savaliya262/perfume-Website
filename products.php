<?php 
  include("include_files/header.php");
?>

<section class="inner_page_head">
   <div class="container-fluid"> 
      <div class="row">
         <div class="col-md-12">
            <div class="full">
               <h3 class="text-white">Products</h3>
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
    <div class="heading_container heading_center mb-4">
      <h2>Our <span>Products</span></h2>
    </div>

    <div class="row">
      <!-- FILTERS - LEFT SIDE -->
      <div class="col-lg-3 mb-4">
    <!-- Toggle Filter Button -->
    <button class="toggle-filter-btn btn filter-btn mb-3">
        <i class="fa-solid fa-filter"></i> Show Filters
    </button>

    <!-- Filter Box -->
    <div class="filter-box p-3 border rounded shadow-sm bg-light">
        <h5 class="mb-3"><i class="fa-solid fa-filter"></i> Filter By</h5>

        <form method="GET" action="products.php">

            <!-- Category Filter -->
            <div class="filter-section mb-4">
                <h6>Category</h6>
                <?php
                $catQuery = "SELECT * FROM category WHERE cat_status=1";
                $catResult = mysqli_query($link, $catQuery);

                while ($cat = mysqli_fetch_assoc($catResult)) {
                    $checked = (isset($_GET['cid']) && in_array($cat['cat_id'], $_GET['cid'])) ? "checked" : "";
                    echo '<div class="form-check">
                            <input class="form-check-input" type="checkbox" name="cid[]" value="' . $cat['cat_id'] . '" ' . $checked . '>
                            <label class="form-check-label">' . $cat['cat_nm'] . '</label>
                          </div>';
                }
                ?>
            </div>

            <!-- Price Filter -->
            <div class="filter-section mb-4">
                <h6>Price</h6>
                <div class="d-flex gap-2">
                    <input type="number" name="min_price" value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : ''; ?>" placeholder="Min" min="1" class="form-control form-control-sm">
                    <input type="number" name="max_price" value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : ''; ?>" placeholder="Max" min="1" class="form-control form-control-sm">
                </div>
            </div>

            <!-- Flavor Filter -->
            <div class="filter-section mb-4">
                <h6>Flavor</h6>
                <?php
                $flavorQuery = "SELECT DISTINCT p_flavor FROM products WHERE p_status=1";
                $flavorResult = mysqli_query($link, $flavorQuery);

                while ($flavor = mysqli_fetch_assoc($flavorResult)) {
                    $checked = (isset($_GET['fid']) && in_array($flavor['p_flavor'], $_GET['fid'])) ? "checked" : "";
                    echo '<div class="form-check">
                            <input class="form-check-input" type="checkbox" name="fid[]" value="' . $flavor['p_flavor'] . '" ' . $checked . '>
                            <label class="form-check-label">' . $flavor['p_flavor'] . '</label>
                          </div>';
                }
                ?>
            </div>

            <button type="submit" class="btn btn-dark w-100">Apply Filters</button>
        </form>
    </div>
</div>


      <div class="col-lg-9">
        <div class="row">

          <?php
            $where = "p_status=1";

            if (!empty($_GET['cid'])) 
            {
              $cids = array_map('intval', $_GET['cid']);
              $cid_str = implode(",", $cids);
              $where .= " AND p_cat IN ($cid_str)";
            }

            if (!empty($_GET['fid'])) 
            {
              $flavors = array_map(function($f) use ($link) 
              {
                  return "'" . mysqli_real_escape_string($link, $f) . "'";
              }, $_GET['fid']);
              $fid_str = implode(",", $flavors);
              $where .= " AND p_flavor IN ($fid_str)";
            }

            if (!empty($_GET['min_price']) && !empty($_GET['max_price'])) 
            {
              $min = (int) $_GET['min_price'];
              $max = (int) $_GET['max_price'];
              $where .= " AND p_price BETWEEN $min AND $max";
            }

            $t_q="SELECT COUNT(*) as total FROM products WHERE $where";
            $t_res=mysqli_query($link,$t_q);
            $t_row=mysqli_fetch_assoc($t_res);
            $total_item=$t_row['total'];

            $cur_page= (isset($_GET['page'])? (int)$_GET['page'] : 1);
            $page_per_item=9;
            $total_page = ($total_item>0)? ceil($total_item/$page_per_item):1;
            $start_pos = ($cur_page - 1) * $page_per_item;

            $q = "SELECT * FROM products WHERE $where LIMIT $start_pos,$page_per_item";
            $res = mysqli_query($link,$q);

            if (mysqli_num_rows($res) <= 0) 
            {
                  echo '<div class="container">
                          <div class="card">
                              <div class="wishlist-empty text-center p-5 ">
                                  <i class="fa-solid fa-heart-crack icon"></i>
                                  <h3>Sorry! This product is not available</h3>
                                  <p class="text-muted">Looks like this product is not available.<br>
                                      Explore our products and save your favorites!</p>
                                  <a href="products.php" class="btn browse-btn mt-3">
                                      <i class="fa-solid fa-shop"></i> Browse Products
                                  </a>
                              </div>
                          </div>
                      </div>';
            } 
            else 
            {
              while ($row = mysqli_fetch_assoc($res)) 
              {
                echo '<div class="col-6 col-sm-6 col-md-4 col-xl-4 mb-4">';
                echo '<div class="product-card">';
                echo '<a href="product-single.php?pid='.$row['p_id'].'" class="image-wrapper">
                        <img src="products_image/'.$row['p_img'].'" alt="'.$row['p_nm'].'">
                      </a>';
                echo '<div class="product-info text-center">';
                echo '<h5>'.$row['p_nm'].'</h5>';
                echo '<h6 class="price">₹'.$row['p_price'].'</h6>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
            }
          ?>
      </div>

 <!-- pagination -->
<?php if ($total_item > $page_per_item) 
  { 
?>
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <div class="pageination">

      <!-- Previous Button -->
      <?php 
        if($cur_page > 1) 
        {
          $prev_page = $cur_page - 1;
          $prev_link = isset($_GET['cid']) 
                       ? 'products.php?cid='.$_GET['cid'].'&page='.$prev_page 
                       : 'products.php?page='.$prev_page;
          echo '<a href="'.$prev_link.'"><i class="fas fa-angle-left"></i> Previous</a>';
        }
      ?>

      <!-- Page Numbers -->
      <?php
        for($i = 1; $i <= $total_page; $i++) {
            $active = ($i == $cur_page) ? 'active' : '';
            if(isset($_GET['cid'])) {
                echo '<a class="'.$active.'" href="products.php?cid='.$_GET['cid'].'&page='.$i.'">'.$i.'</a>';
            } else {
                echo '<a class="'.$active.'" href="products.php?page='.$i.'">'.$i.'</a>';
            }
        }
      ?>

      <!-- Next Button -->
      <?php 
        if($cur_page < $total_page) {
          $next_page = $cur_page + 1;
          $next_link = isset($_GET['cid']) 
                       ? 'products.php?cid='.$_GET['cid'].'&page='.$next_page 
                       : 'products.php?page='.$next_page;
          echo '<a href="'.$next_link.'">Next <i class="fas fa-angle-right"></i></a>';
        }
      ?>

      </div>
    </div>
  </div>
</div>
<?php } ?>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const filterBox = document.querySelector(".filter-box");
    const toggleBtn = document.querySelector(".toggle-filter-btn");

    toggleBtn.addEventListener("click", function () {
      filterBox.classList.toggle("active");
      toggleBtn.classList.toggle("active");

      if (filterBox.classList.contains("active")) {
        toggleBtn.innerHTML = '<i class="fa-solid fa-xmark"></i>&nbsp;&nbsp;Hide Filters';
      } else {
        toggleBtn.innerHTML = '<i class="fa-solid fa-filter"></i>&nbsp;&nbsp;Show Filters';
      }
    });
  });
</script>

<?php 
include("include_files/footer.php");
?>
