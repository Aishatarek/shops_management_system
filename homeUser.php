<?php

include("function.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['deleteItem'])) {
    $sales->deleteSales($_POST['item_id']);
  }
}
$store=$_SESSION['store']
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/media.css">

  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <!-- <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/logo.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg"
            alt="logo" /></a>
      </div> -->
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>


        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <?php
          if ($_SESSION['role'] == "admin") {
          ?>

            <li class="nav-item">
              <a class="nav-link" href="home.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-dropbox menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="products/addProducts.php">Add Product</a></li>
                  <li class="nav-item"> <a class="nav-link" href="products/allProducts.php">All Products</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
                <span class="menu-title">Stores</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-store menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="stores/addStores.php">Add Store</a></li>
                  <li class="nav-item"> <a class="nav-link" href="stores/allStores.php">All Stores</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
                <span class="menu-title">Sales</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-sale menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic3">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="sales/addSales1.php">Add Sales</a></li>
                  <li class="nav-item"> <a class="nav-link" href="sales/allSales.php">All Sales</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic4">
                <span class="menu-title">Monthly Targets</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-sale menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic4">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="monthyTargets/addMonthlyTarget.php">Add Monthly Target</a></li>
                  <li class="nav-item"> <a class="nav-link" href="monthyTargets/allMonthlyTargets.php">All Monthly Targets</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic5" aria-expanded="false" aria-controls="ui-basic5">
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-sale menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic5">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="users/addUser.php">Add User</a></li>
                  <li class="nav-item"> <a class="nav-link" href="users/displayUsers.php">All Users</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                <span class="menu-title">Logout</span>
                <i class="mdi mdi-door menu-icon"></i>
              </a>
            </li>
          <?php
          } else {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="homeUser.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
                <span class="menu-title">Sales</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-sale menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic3">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="sales/addSales01.php">Add Sales</a></li>
                  <li class="nav-item"> <a class="nav-link" href="sales/allSales.php">All Sales</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                <span class="menu-title">Logout</span>
                <i class="mdi mdi-door menu-icon"></i>
              </a>
            </li>
          <?php
          }
          ?>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel maindashboard">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
              </span> Dashboard
            </h3>
          </div>


          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <form action="formUser.php" method="get" class="thesearch">
                      <div>
                        <label class="form-label">Date: </label>
                        <select name="date" class="btn btn-outline-primary">
                          <option value="0">All</option>
                          <?php
                          foreach ($Sales->getDatesUser($store) as $sales) {
                          ?>
                            <option value="<?php echo $sales['date'] ?>"><?php echo $sales['date'] ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>


                      <input type="submit" class="ml-1 btn btn-gradient-primary">
                    </form>

                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            <p> product </p>
                          </th>
                          <th>
                            <p> daily target </p>
                          </th>
                          <th>
                            <p> daily achieveit </p>
                          </th>
                          <th>
                            <p> mtd target </p>
                          </th>
                          <th>
                            <p> mtd achieveit</p>
                          </th>
                          <!-- <th> Delete </th>
                          <th> Update </th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 0;
                        foreach ($Products->getData() as $product) :
                        ?>
                          <tr>
                            <td>
                              <?php
                              echo $product['title'];
                              ?>
                            </td>
                            <td>
                              <?php
                              foreach ($Sales->daily_target_sum_user($store) as $sales1) :
                                if ($sales1['product'] == $product['id']) :
                                  echo $sales1['SUM(daily_target_number)'];
                                endif;
                              endforeach;
                              ?>
                            </td>
                            <td>
                              <?php
                              foreach ($Sales->daily_achieveit_sum_user($store) as $sales2) :
                                if ($sales2['product'] == $product['id']) :
                                  echo $sales2['SUM(daily_achieveit_number)'];
                                endif;
                              endforeach;
                              ?>
                            </td>
                            <td>
                              <?php
                              foreach ($Sales->mid_target_sum_user($store) as $sales3) :
                                if ($sales3['product'] == $product['id']) :
                                  echo $sales3['SUM(mid_target_number)'];
                                endif;
                              endforeach;
                              ?>
                            </td>
                            <td>
                              <?php
                              foreach ($Sales->mid_achieveit_sum_user($store) as $sales4) :
                                if ($sales4['product'] == $product['id']) :
                                  echo $sales4['SUM(mid_achieveit_number)'];
                                endif;
                              endforeach;
                              ?>
                            </td>
                          </tr>
                        <?php
                          $i++;
                        endforeach;
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Products <i class="mdi mdi-dropbox  mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5 text-center"><?php echo count($Products->getData()); ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Stores
                    <i class="mdi mdi-store mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5 text-center"><?php echo count($Stores->getData()); ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Sales <i class="mdi  mdi-sale  mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5 text-center"><?php echo count($Sales->getData()); ?></h2>
                </div>
              </div>
            </div>
          </div>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- End custom js for this page -->
</body>

</html>