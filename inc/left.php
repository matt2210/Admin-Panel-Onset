<?php
if(!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit();
}
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../../index.php" class="brand-link">
    <img src="../../dist/img/onset.jpg"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">OnSet WebMin</span>
  </a>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="info">
      <a href="#" class="d-block"><?php echo $_SESSION['user'] ?></a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Menu
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="../../players.php" class="nav-link">
              <i class="fa fa-user nav-icon"></i>
              <p>Players</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../houses.php" class="nav-link">
              <i class="fa fa-home nav-icon"></i>
              <p>Houses</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../cars.php" class="nav-link">
              <i class="fa fa-car nav-icon"></i>
              <p>Cars</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../bans.php" class="nav-link">
              <i class="fa fa-ban nav-icon"></i>
              <p>Bans</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

