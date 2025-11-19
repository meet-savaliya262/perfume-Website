<?php session_start();
    if(! isset($_SESSION['admin']['status']))
    {
      header("location:login.php");
      exit;
    }
    include("../include_files/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Famms</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="../images/plogo.png" type="">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item"><a class="nav-link" data-widget="navbar-search" href="#" role="button">Hi,<?php echo $_SESSION['admin']['email']; ?></a></li>
      <li class="nav-item"><a class="nav-link" href="logout.php" role="button"><i class="fas fa-sign-out-alt"></i>&nbsp;Log Out</a></li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <?php
  // Get current page name (example: category-list.php)
  $current_page = basename($_SERVER['PHP_SELF']);
?>

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  
  <!-- Dashboard -->
  <li class="nav-item">
    <a href="index.php" class="nav-link <?= ($current_page == 'index.php') ? 'active' : '' ?>">
      <i class="nav-icon fas fa-th"></i>
      <p>Dashboard</p>
    </a>
  </li>

  <!-- Category -->
  <li class="nav-item <?= ($current_page == 'category.php' || $current_page == 'category-list.php') ? 'menu-open' : '' ?>">
    <a href="#" class="nav-link <?= ($current_page == 'category.php' || $current_page == 'category-list.php') ? 'active' : '' ?>">
      <i class="fas fa-tags ml-1"></i>   
      <p class="ml-1">
        Category
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="category.php" class="nav-link <?= ($current_page == 'category.php') ? 'active' : '' ?>">
          <i class="far fa-circle nav-icon"></i>
          <p>Add Category</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="category-list.php" class="nav-link <?= ($current_page == 'category-list.php') ? 'active' : '' ?>">
          <i class="far fa-circle nav-icon"></i>
          <p>Category List</p>
        </a>
      </li>
    </ul>
  </li>

  <!-- Product -->
  <li class="nav-item <?= ($current_page == 'product.php' || $current_page == 'product-list.php') ? 'menu-open' : '' ?>">
    <a href="#" class="nav-link <?= ($current_page == 'product.php' || $current_page == 'product-list.php') ? 'active' : '' ?>">
      <i class="fas fa-shopping-cart ml-1"></i>
      <p class="ml-1">
        Product
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="product.php" class="nav-link <?= ($current_page == 'product.php') ? 'active' : '' ?>">
          <i class="far fa-circle nav-icon"></i>
          <p>Add Product</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="product-list.php" class="nav-link <?= ($current_page == 'product-list.php') ? 'active' : '' ?>">
          <i class="far fa-circle nav-icon"></i>
          <p>Product List</p>
        </a>
      </li>
    </ul>
  </li>

  <!-- Hero Section Product -->
  <li class="nav-item <?= ($current_page == 'hero_section.php' || $current_page == 'hero_section_list.php') ? 'menu-open' : '' ?>">
    <a href="#" class="nav-link <?= ($current_page == 'hero_section.php' || $current_page == 'hero_section_list.php') ? 'active' : '' ?>">
      <i class="fa fa-mask ml-1"></i>
      <p class="ml-1">
        Hero Section Product
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="hero_section.php" class="nav-link <?= ($current_page == 'hero_section.php') ? 'active' : '' ?>">
          <i class="far fa-circle nav-icon"></i>
          <p>Add Hero Product</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="hero_section_list.php" class="nav-link <?= ($current_page == 'hero_section_list.php') ? 'active' : '' ?>">
          <i class="far fa-circle nav-icon"></i>
          <p>Hero Section Product List</p>
        </a>
      </li>
    </ul>
  </li>

  <!-- Latest Product -->
  <li class="nav-item <?= ($current_page == 'latest_product.php' || $current_page == 'latest_product_list.php') ? 'menu-open' : '' ?>">
    <a href="#" class="nav-link <?= ($current_page == 'latest_product.php' || $current_page == 'latest_product_list.php') ? 'active' : '' ?>">
      <i class="fas fa-rocket ml-1"></i>
      <p class="ml-1">
        Latest Product
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="latest_product.php" class="nav-link <?= ($current_page == 'latest_product.php') ? 'active' : '' ?>">
          <i class="far fa-circle nav-icon"></i>
          <p>Add Latest Product</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="latest_product_list.php" class="nav-link <?= ($current_page == 'latest_product_list.php') ? 'active' : '' ?>">
          <i class="far fa-circle nav-icon"></i>
          <p>Latest Product List</p>
        </a>
      </li>
    </ul>
  </li>

  <!-- Orders -->
  <li class="nav-item">
    <a href="user_orders.php" class="nav-link <?= ($current_page == 'user_orders.php') ? 'active' : '' ?>">
      <i class="fab fa-first-order ml-2"></i>
      <p class="ml-2">Orders</p>
    </a>
  </li>

  <!-- Users -->
  <li class="nav-item">
    <a href="user_list.php" class="nav-link <?= ($current_page == 'user_list.php') ? 'active' : '' ?>">
      <i class="fa fa-user ml-2"></i>
      <p class="ml-2">Users</p>
    </a>
  </li>
</ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>