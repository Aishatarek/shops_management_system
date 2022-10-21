<?php
include('../function.php');
$store =  $_GET['store'];
$date = date('Y-m-d', strtotime($_GET['date']));
$product =  $_GET['product'];

foreach ($Stores->getData() as $storee) {
  if ($storee['id'] == $store) {
    $area = $storee['area'];
    $region = $storee['region'];
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submit'])) {
    foreach ($MonthlyTargets->getData() as $monthlyTarget) {
      if ($product == $monthlyTarget['product']) {
        $daily_target_number = $monthlyTarget['monthly_target'] / 30;
      }
    }
    $mid_achieveit_number = 0;
    foreach ($Sales->daily_achieveit_sum3($date, $store) as $sales1) :
      if ($sales1['product'] == $product) :
        $mid_achieveit_number = $sales1['SUM(daily_achieveit_number)'];
      endif;
    endforeach;
    $mid_achieveit_number += $_POST['daily_achieveit_number'];
    foreach ($MonthlyTargets->getData() as $monthlyTarget) {
      if ($product == $monthlyTarget['product']) {
        $mid_target_number = round($monthlyTarget['monthly_target'] / 30) * date('d', strtotime($_GET['date']));
      }
    }
    $daily_achieveit_number =  $_POST['daily_achieveit_number'];
    $Sales->addSales($product, $store, $area, $region, $date, $daily_target_number, $daily_achieveit_number, $mid_target_number, $mid_achieveit_number);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

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
      <?php
      include("../sidenav.php")
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add</h4>
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">daily target number: </label>
                      <?php
                      foreach ($MonthlyTargets->getData() as $monthlyTarget) {
                        if ($product == $monthlyTarget['product']) {
                          if ($store == $monthlyTarget['store']) {
                            echo  round($monthlyTarget['monthly_target'] / 30);
                          }
                        }
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">daily achieveit number: </label>
                      <input type="number" name="daily_achieveit_number" class="form-control" id="exampleInputUsername1" placeholder="Daily achieveit number">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">mtd target number: </label>
                      <?php
                      foreach ($MonthlyTargets->getData() as $monthlyTarget) {
                        if ($product == $monthlyTarget['product']) {
                          if ($store == $monthlyTarget['store']) {
                            echo  round($monthlyTarget['monthly_target'] / 30) * date('d', strtotime($_GET['date']));
                          }
                        }
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">mtd achieveit number: </label>
                      <?php
                      foreach ($Sales->daily_achieveit_sum3($date, $store) as $sales1) :
                        if ($sales1['product'] == $product) :
                          echo $sales1['SUM(daily_achieveit_number)'];
                        endif;
                      endforeach;
                      ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <button class="btn btn-light" type="reset">Cancel</button>

                  </form>
                  <a href=<?php echo "addSales11.php?store=$store&date=$date" ?>><button class="btn btn-gradient-primary my-5">All Products</button></a>

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
  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../assets/vendors/chart.js/Chart.min.js"></script>
  <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="../assets/js/dashboard.js"></script>
  <script src="../assets/js/todolist.js"></script>
  <!-- End custom js for this page -->
</body>

</html>