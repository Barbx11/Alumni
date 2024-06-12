<?php
include '../connect/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alumni Portal</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
</head>
<style>
/* width */
::-webkit-scrollbar {
  height: 5px;
  width: 3px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #747373; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
  cursor: pointer;
}

.top-right-link:hover {
  color: #dc3545 !important;
}
</style>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-red navbar-light" style="background-color: #8F2B2F">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: white"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false" style="color: white">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <span class="dropdown-header">Account Name</span>
          <div class="dropdown-divider"></div>
          <div class="text-center">
            <a href="./logout.php" class="dropdown-item">
              <i class="fas fa-door-open"></i> Log Out
            </a>
          </div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-red elevation-4" style="background-color: #8F2B2F;">
    <!-- Brand Logo -->
    <a href="./dashboard.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="color: white">PLSP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <span class="d-block" style="color: White">Admin</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php
      include './sidenav.php'
      ?>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #9F4B4E">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
          <?php
          if($_GET['page']=='gallery')
          {
            include "./body/gallery.php";
          }
          else if($_GET['page']=='events')
          {
            include "./body/events.php";
          }
          else if($_GET['page']=='new_event')
          {
            include "./body/new_event.php";
          }
          else if($_GET['page']=='event_image')
          {
            include "./body/event_image.php";
          }
          else if($_GET['page']=='announce_list')
          {
            include "./body/announce_list.php";
          }
          else if($_GET['page']=='new_announce')
          {
            include "./body/announce_add.php";
          }
          else if($_GET['page']=='add_image')
          {
            include "./body/announce_image.php";
          }
          else if($_GET['page']=='announce_edit')
          {
            include "./body/announce_edit.php";
          }
          else if($_GET['page']=='edit_image')
          {
            include "./body/announce_edit_image.php";
          }
          else if($_GET['page']=='announce_delete')
          {
            include "./body/announce_delete.php";
          }
          else if($_GET['page']=='users')
          {
            include "./body/users.php";
          }
          else if($_GET['page']=='verify_user')
          {
            include "./body/verify.php";
          }
          else if($_GET['page']=='deny_user')
          {
            include "./body/deny.php";
          }
          else if($_GET['page']=='view_user')
          {
            include "./body/view_user.php";
          }
          else if($_GET['page']=='view_user')
          {
            include "./body/year_graduates.php";
          }
          
          ?> 

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="background-color: #8F2B2F; border-top: none; color: white">
    <!-- BOTTOM FOOTER LEFT SIDE -->
    LOGO
    <strong>PAMANTASAN NG LUNGSOD NG SAN PABLO</strong>
    ALUMNI ASSOCIATION


    <!-- BOTTOM FOOTER RIGHT SIDE -->
    <div class="float-right d-none d-sm-inline-block">
      ©<b>2024</b> PAMANTASAN NG LUNSOD NG SAN PABLO
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/toastr/toastr.min.js"></script>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<!-- Page specific script -->
</body>
</html>
