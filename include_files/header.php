<?php session_start();

      $page=basename($_SERVER['SCRIPT_FILENAME']);
      include("include_files/config.php");

?>
<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css " />
      <!-- font awesome style -->
      <link rel="stylesheet" href="fontawesome/css/all.min.css">
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
         
   </head>
    <body>
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="index.php">
                     <img height="90" src="images/logo.png" alt="#" />
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="index.php">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="products.php" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                           Products
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <?php
                              $cat_q = "SELECT * FROM category WHERE cat_status = 1";
                              $cat_res = mysqli_query($link, $cat_q);
                              while ($cat_row = mysqli_fetch_assoc($cat_res)) 
                              {
                                 echo '<a class="dropdown-item" href="products.php?cid='.$cat_row['cat_id'].' "> '. $cat_row['cat_nm'].'</a>';
                              }
                           ?>
                        </div>
                        </li>



                        <li class="nav-item">
                           <a class="nav-link" href="contact.php">Contact</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" href="about.php">About</a>
                        </li>

                        

                       <!-- Wishlist Icon -->
                        <li class="nav-item position-relative mx-2">
                           <a class="nav-link wishlisticon" href="wishlist.php" style="position: relative;">
                              <i class="fa-solid fa-heart"></i>
                              <span class="badge badge-pill badge-danger count-badge">2</span>
                           </a>
                        </li>

                        <!-- Cart Icon -->
                        <li class="nav-item position-relative mx-2">
                           <a class="nav-link" href="cart.php"  title="cart" style="position: relative;">
                              <i class="fa-solid fa-cart-shopping"></i>
                              <span class="badge badge-pill badge-danger count-badge"> 
                                 <?php 
                                    if(!empty($_SESSION['cart']))
                                    {
                                       echo count($_SESSION['cart']); 
                                       echo '</span>';
                                    }
                                    else
                                    {
                                       echo "0";
                                    }
                                 ?>
                           </a>
                        </li>

                        <li class="nav-item">
                           <div class="search-icon" onclick="openSearch()">
                              <i class="fas fa-search"></i>
                           </div>
                        </li>

                         <li class="nav-item">
                           <a href="login.php" id="login" title="account" class="nav-link">
                              <i class="fa-solid fa-user"></i>
                           </a>
                        </li>
                     </ul>
                  </div>
               </nav>
               <form action="search.php" method="get">
                  <div class="search-overlay" id="searchOverlay">
                     <div class="search-container">
                        <select name="cat">
                           <option>All category</option>
                           
                              <?php
                                 $cq="select * from category where cat_status=1";
                                 $cres=mysqli_query($link,$cq);
                                 while($crow=mysqli_fetch_assoc($cres))
                                 {
                                    echo '<option value="'.$crow['cat_id'].'">'.$crow['cat_nm'].'</option>';
                                 }

                              ?>
                          
                        </select>
                        <span class="arrow_carrot-down"></span>
                        <input type="text" placeholder="Search products..." name="s"/>
                        <button><i class="fas fa-search"></i></button>
                        <span class="close-btn" onclick="closeSearch()">&times;</span>
                     </div>
                  </div>
               </form>

            </div>
         </header>

         <!-- end header section -->

<script>
 function openSearch() {
      document.getElementById("searchOverlay").style.height = "100%";
    }

    function closeSearch() {
      document.getElementById("searchOverlay").style.height = "0";
    }
</script>
   </body>
</html>