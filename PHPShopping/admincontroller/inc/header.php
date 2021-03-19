<?php   
  include ('../libs/session.php');
  Session::checkSession(); //
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Products Manager</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href='img/favicon.ico' rel='icon' type='image/x-icon'/>
  <script>
      function moveLeft() {
      var element = document.getElementById("content-wrapper");

      if (element.classList) { 
      element.classList.toggle("mystyle");
      } else {
      var classes = element.className.split(" ");
      var i = classes.indexOf("mystyle");

      if (i >= 0) 
      classes.splice(i, 1);
      else 
      classes.push("mystyle");
      element.className = classes.join(" "); 
      }
      }
  </script>     
</head>
<body id="page-top">

  <!-- Page Wrapper -->
<?php include 'inc/menutop.php'?>
  <div id="wrapper">
    <!-- Sidebar -->

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="position: fixed;z-index: 99">

      <!-- Sidebar - Brand -->
      <li class="nav-item dropdown no-arrow">
    <a class="nav-link collapsed" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-lg-inline text-gray-600 small">Logged in as: <?php echo Session::get('adminName')?></span>
    </a>
    <!-- Dropdown - User Information -->
  </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
      <a class="nav-link" href="index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
        <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
      Quản lý
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
        <span>Danh mục / Thương hiệu</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Option:</h6>
          <a class="collapse-item" href="cateadd.php">Thêm mới danh mục</a>
          <a class="collapse-item" href="brandadd.php">Thêm thương hiệu</a>
        </div>
      </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
        <span>Sản phẩm</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Option:</h6>
          <a class="collapse-item" href="productadd.php">Thêm sản phẩm</a>
          <a class="collapse-item" href="productlist.php">Xem tất cả sản phẩm</a>
          <a class="collapse-item" href="warehouse.php">Kho hàng</a>
        </div>
      </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
      Thông tin:
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-user-circle"></i>
        <span>Thông tin người dùng</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">My account:</h6>
          <a class="collapse-item" href="myaccount.php">Thông tin cá nhân</a>
          <a class="collapse-item" href="register.php">Lịch sử</a>
          <a class="collapse-item" href="forgot-password.php">Quên mật khẩu</a>
          <div class="collapse-divider"></div>
          <h6 class="collapse-header">Thêm:</h6>
               <?php 
                  if(isset($_GET['action'])){
                  $adminID = $_GET['action'];
                  Session::destroy($adminID);
                }
               ?>
          <a class="collapse-item" href="?action=<?php echo Session::get('adminID'); ?>"><i class="fa fa-sign-out-alt"></i> Log out</a>
        </div>
      </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
      <a class="nav-link" href="charts.php">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
      </li>

    <!-- Sidebar Toggler (Sidebar) -->
    </ul>

<!-- End of Sidebar -->
