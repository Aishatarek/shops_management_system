
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <?php
    if ($_SESSION['role'] == "admin") {
    ?>

      <li class="nav-item">
        <a class="nav-link" href="../home.php">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="../#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Products</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi mdi-dropbox menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="../products/addProducts.php">Add Product</a></li>
            <li class="nav-item"> <a class="nav-link" href="../products/allProducts.php">All Products</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="../#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
          <span class="menu-title">Stores</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-store menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic2">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="../stores/addStores.php">Add Store</a></li>
            <li class="nav-item"> <a class="nav-link" href="../stores/allStores.php">All Stores</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="../#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
          <span class="menu-title">Sales</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-sale menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic3">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="../sales/addSales1.php">Add Sales</a></li>
            <li class="nav-item"> <a class="nav-link" href="../sales/allSales.php">All Sales</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="../#ui-basic4" aria-expanded="false" aria-controls="ui-basic4">
          <span class="menu-title">Monthly Targets</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-sale menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic4">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="../monthyTargets/addMonthlyTarget.php">Add Monthly Target</a></li>
            <li class="nav-item"> <a class="nav-link" href="../monthyTargets/allMonthlyTargets.php">All Monthly Targets</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="../#ui-basic5" aria-expanded="false" aria-controls="ui-basic5">
          <span class="menu-title">Users</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-sale menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic5">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="../users/addUser.php">Add User</a></li>
            <li class="nav-item"> <a class="nav-link" href="../users/displayUsers.php">All Users</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <span class="menu-title">Logout</span>
          <i class="mdi mdi-door menu-icon"></i>
        </a>
      </li>
    <?php
    } else {
    ?>
      <li class="nav-item">
        <a class="nav-link" href="../homeUser.php">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="../#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
          <span class="menu-title">Sales</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-sale menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic3">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="../sales/addSales01.php">Add Sales</a></li>
            <li class="nav-item"> <a class="nav-link" href="../sales/allSales.php">All Sales</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <span class="menu-title">Logout</span>
          <i class="mdi mdi-door menu-icon"></i>
        </a>
      </li>
    <?php
    }
    ?>
  </ul>
</nav>