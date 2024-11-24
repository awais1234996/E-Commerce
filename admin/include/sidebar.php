<?php
$obj = new DB();
$rolid = $_SESSION['admin_role'];
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.php"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span class="logo-name">Otika</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="dropdown active">
        <a href="index.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
      </li>
      <?php

      $sql = $obj->select("role_insertion", "*", "rid='$rolid'", null, null, null);
      foreach ($sql as $fet) {
        $roleaccess = $fet['roleaccess'];
        $roleper = $fet['roleper'];
      }

      $rolper = unserialize($fet['roleper']);
      if ($fet['roleaccess'] == "All" || in_array("category", $rolper)) {
      ?>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Category</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="add_category.php">Add Category</a></li>
            <li><a class="nav-link" href="view_category.php">View Category</a></li>
          </ul>
        </li>
      <?php
      }

      if ($fet['roleaccess'] == "All" || in_array("subcategory", $rolper)) {
      ?>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Sub Category</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="add_subcategory.php">Add sub Category</a></li>
            <li><a class="nav-link" href="view_subcategory.php">View sub Category</a></li>
          </ul>
        </li>
      <?php
      }
      if ($fet['roleaccess'] == "All" || in_array("supplier", $rolper)) {

      ?>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Supplier</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="add_supplier.php">Add Supplier</a></li>
            <li><a class="nav-link" href="view_supplier.php">View Supplier</a></li>
          </ul>
        </li>
      <?php
      }
      if ($fet['roleaccess'] == "All" || in_array("quantity", $rolper)) {
      ?>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Quantity</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="add_quantity.php">Add Quantity</a></li>
            <li><a class="nav-link" href="view_quantity.php">View Quantity</a></li>
          </ul>
        </li>
      <?php
      }
      if ($fet['roleaccess'] == "All" || in_array("product", $rolper)) {
      ?>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Product</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="add_product.php">Add Product</a></li>
            <li><a class="nav-link" href="view_product.php">View Product</a></li>
          </ul>
        </li>
      <?php
      }
      if ($fet['roleaccess'] == "All" || in_array("confirmedusers", $rolper)) {
      ?>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>User</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="./user_add.php">Add User</a></li>
            <li><a class="nav-link" href="./pendinguserview.php">Pending Users</a></li>
            <li><a class="nav-link" href="./confirmuserview.php">Confirmed Users</a></li>
          </ul>
        </li>
      <?php
      }
      if ($fet['roleaccess'] == "All" || in_array("orders", $rolper)) {
      ?>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Orders</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="./view_order.php">Orders View</a></li>
          </ul>
        </li>
      <?php
      }
      if ($fet['roleaccess'] == "All" || in_array("pos", $rolper)) {
      ?>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>POS</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="./POS_add.php">Add POS</a></li>
            <li><a class="nav-link" href="./POS_view.php">View POS</a></li>
          </ul>
        </li>
      <?php
      }
      if ($fet['roleaccess'] == "All" || in_array("contact", $rolper)) {
      ?>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Contact</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="./contact_view.php">View Contact</a></li>
          </ul>
        </li>
      <?php
      }
      if ($fet['roleaccess'] == "All" || in_array("usermanagement", $rolper)) {
      ?>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>User Management</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="./role_add.php">Add Role</a></li>
            <li><a class="nav-link" href="./role_view.php">View Role</a></li>
            <li><a class="nav-link" href="./role_user_add.php">User Role</a></li>
            <li><a class="nav-link" href="./role_user_view.php">View User Role</a></li>
          </ul>
        </li>
      <?php
      }
      ?>

    </ul>
  </aside>
</div>