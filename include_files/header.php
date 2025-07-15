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

      <!-- header section -->
<header class="header_section">
   <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">

         <!-- Brand Logo -->
         <a class="navbar-brand" href="index.php">
             <img src="images/logo.png" alt="Logo" height="70">
         </a>

         <!-- Mobile Left Icons -->
         <!-- Mobile Left Icons -->
         <div class="d-lg-none d-flex align-items-center ml-auto mobile-icons">
            
            <a class="nav-link" href="#" onclick="openSearch()" title="Search">
               <i class="fas fa-search"></i>
            </a>

            <a class="nav-link" href="cart.php" title="Cart">
               <i class="fa-solid fa-cart-shopping"></i>
            </a>

            <?php
               if (isset($_SESSION['client']['status']) && $_SESSION['client']['status'] === true) {
                  echo '<div class="nav-link position-relative">
                        <i class="fa-solid fa-user" onclick="toggleLogoutMenu()" style="cursor:pointer;"></i>
                        <div id="logoutMenu">
                           <a href="logout.php">Logout</a>
                        </div>
                        </div>';
               } else {
                  echo '<a class="nav-link" href="login.php"><i class="fa-solid fa-user"></i></a>';
               }
             ?>

         </div>


         <!-- Toggle Button -->
         <button class="navbar-toggler" type="button" onclick="toggleMobileMenu()">
            <span><i class="fas fa-bars"></i></span>
         </button>

         <!-- Menu Center (Desktop), Slide Menu (Mobile) -->
         <div class="collapse navbar-collapse justify-content-center" id="navbarMenu">
            <ul class="navbar-nav">
               
               <li class="nav-item">
                  <a class="nav-link" href="index.php">Home</a>
               </li>

               <li class="nav-item dropdown">
                  <a class="nav-link" href="products.php" id="navbarDropdown">
                  Products
                  </a>
                  <div class="dropdown-menu">
                  <?php
                     $cat_q = "SELECT * FROM category WHERE cat_status = 1";
                     $cat_res = mysqli_query($link, $cat_q);
                     while ($cat_row = mysqli_fetch_assoc($cat_res)) {
                        echo '<a class="dropdown-item" href="products.php?cid=' . $cat_row['cat_id'] . '">' . $cat_row['cat_nm'] . '</a>';
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

               <li class="nav-item">
                  <a class="nav-link" href="wishlist.php">Wishlist</a>
               </li>

            </ul>
         </div>

         <!-- Right Icons for Desktop -->
         <div class="d-none d-lg-flex align-items-center icon-group">
  
            <!-- Search Icon -->
            <a class="nav-link" href="#" onclick="openSearch()">
               <i class="fas fa-search"></i>
            </a>
            <!-- Cart Icon -->
             <div class="nav-item position-relative mx-2" style="list-style-type: none;">
               <a class="nav-link" href="cart.php" title="Cart">
                  <i class="fa-solid fa-cart-shopping"></i>
                  <?php 
                     if(!empty($_SESSION['cart']))
                     {
                        echo '<span class="count-badge">'.count($_SESSION['cart']).'</span>';
                     }
                     else
                     {
                        echo '<span class="count-badge">0</span>';
                     }
                  ?>
               </a>
            </div>

            <!-- User Icon / Logout -->
            <?php
               if (isset($_SESSION['client']['status']) && $_SESSION['client']['status'] === true) {
                  echo '<div class="nav-link position-relative">
                        <i class="fa-solid fa-user" onclick="toggleLogoutMenu()" style="cursor:pointer;"></i>
                        <div id="logoutMenu">
                           <a href="logout.php">Logout</a>
                        </div>
                        </div>';
               } else {
                  echo '<a class="nav-link" href="login.php"><i class="fa-solid fa-user"></i></a>';
               }
             ?>
         </div>

      </nav>
   </div>

       <!-- Search Overlay -->
         <form action="search.php" method="get">
            <div class="search-overlay" id="searchOverlay">
               <span class="close-btn" onclick="closeSearch()">&times;</span>
               <div class="search-container">
                  <input type="text" name="s" placeholder="Search products..." />
                  <button type="submit"><i class="fas fa-search"></i></button>
               </div>
            </div>
         </form>
</header>

         <!-- end header section -->


<script>
function toggleMobileMenu() {
   const menu = document.getElementById('navbarMenu');
   menu.classList.toggle('show');
}

function openSearch() {
   document.getElementById("searchOverlay").classList.add("active");
   setTimeout(() => {
      document.querySelector("#searchOverlay input").focus();
   }, 300);
}

function closeSearch() {
   document.getElementById("searchOverlay").classList.remove("active");
}


function toggleLogoutMenu() {
   const menu = document.getElementById("logoutMenu");
   menu.style.display = (menu.style.display === "block") ? "none" : "block";
}

document.querySelector('#navbarDropdown').addEventListener('click', function(e) {
  // open dropdown
  $('.dropdown-toggle').dropdown();

  // redirect
  window.location.href = 'products.php';
});

</script>

   </body>
</html>