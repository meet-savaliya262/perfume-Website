<?php  
      if (session_status() === PHP_SESSION_NONE) {
         session_start();
      }


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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
             <img src="images/logo1.png" class="weblogo" alt="Logo" height="90" width="200">
         </a>               
               
         <!-- Toggle Button -->
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" 
            aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
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

               <li class="nav-item">
                  <a class="nav-link" href="account_order.php">Orders</a>
               </li>

               <li>
                  <a class="nav-link" href="#" onclick="openSearch()">
                     <i class="fas fa-search text-dark"></i>
                  </a>
               </li>

               <li>
                  <a class="nav-link" href="cart.php" title="Cart">
                     <i class="fa-solid fa-cart-shopping text-dark"></i>
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
               </li>
               <li>
                  <?php
                      if (isset($_SESSION['client']['status']) && $_SESSION['client']['status'] === true) 
                      {
                        echo '<a href="logout.php" class="action-button log-btn">Logout</a>';
                      } 
                      else 
                      {
                        echo '<a href="login.php" class="action-button login-btn">Login</a>';
                      }
                  ?>
               </li>

            </ul>
         </div>

         <!-- Right Icons for Desktop -->
         <div class="d-none d-lg-flex align-items-center icon-group">
  
            
            <!-- Cart Icon -->
             <div class="nav-item position-relative mx-2" style="list-style-type: none;">
               
               </div>
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
   function openSearch() {
      document.getElementById("searchOverlay").classList.add("active");
      setTimeout(() => {
         document.querySelector("#searchOverlay input").focus();
      }, 300);
   }

   function closeSearch() {
      document.getElementById("searchOverlay").classList.remove("active");
   }

   document.querySelector('#navbarDropdown').addEventListener('click', function(e) {
   // open dropdown
   $('.dropdown-toggle').dropdown();

   // redirect
   window.location.href = 'products.php';
   });
   
   function toggleLogoutMenu() {
      const menu = document.getElementById("logoutMenu");
      menu.style.display = (menu.style.display === "block") ? "none" : "block";
   }

   document.addEventListener("click", function(event) {
      const menu = document.getElementById("logoutMenu");
      const userIcon = document.querySelector(".fa-user");

      if (menu && !menu.contains(event.target) && !userIcon.contains(event.target)) {
         menu.style.display = "none";
      }
   });

</script>

   </body>
</html>


<!-- http://localhost/@meet/Perfume/order.php?orderid=4&key=wr2iwqkdf9 -->