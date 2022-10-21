<?php
include('../function.php');
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['edit_submit'])) {
    $product =  $_POST['product'];
    $store =  $_POST['store'];
    foreach ($Stores->getData() as $storee) {
      if ($store == $storee['id']) {
        $area ="'".$storee['area']."'";

      }
    }
    foreach ($MonthlyTargets->getData() as $monthlyTarget) {
      if ($product == $monthlyTarget['product']) {
        $daily_target_number =$monthlyTarget['monthly_target']/30;

      }
    }
    // echo "<script>alert($area)</script>";

    $date ="'". date('Y-m-d', strtotime($_POST['date']))."'";
    $daily_achieveit_number =  $_POST['daily_achieveit_number'];
    $mid_target_number =  $_POST['mid_target_number'];
    $mid_achieveit_number =  $_POST['mid_achieveit_number'];

    $Sales->updateSales($item_id, $product, $store, $area, $date, $daily_target_number, $daily_achieveit_number, $mid_target_number, $mid_achieveit_number);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="salesport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="../assets/images/logo.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
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
                  <h4 class="card-title">Update Product</h4>
                  <form class="forms-sample" method="post">
                    <?php
                    foreach ($Sales->getData() as $sales) :
                      if ($sales['id'] == $item_id) :
                    ?>
                        <div class="form-group">
                          <label for="exampleInputStore">Product</label>
                          <select name="product" id="exampleInputStore" class="form-control">
                            <?php
                            foreach ($Products->getData() as $product) {
                              if ($product['id'] == $sales['product']) {
                            ?>
                                <option value="<?php echo $product['id'] ?>" selected><?php echo $product['title'] ?></option>
                              <?php
                              } else {
                              ?>
                                <option value="<?php echo $product['id'] ?>"><?php echo $product['title'] ?></option>
                            <?php
                              }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputStore">Store</label>
                          <select name="store" id="exampleInputStore" class="form-control">
                            <?php
                            foreach ($Stores->getData() as $store) {
                              if ($store['id'] == $sales['store']) {
                            ?>
                                <option value="<?php echo $store['id'] ?>" selected><?php echo $store['title'] ?></option>
                              <?php
                              } else {
                              ?>
                                <option value="<?php echo $store['id'] ?>"><?php echo $store['title'] ?></option>
                            <?php
                              }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputDate">Date:</label>
                          <p><?php echo $sales['date'] ?></p>
                          <input type="date" name="date" class="form-control" id="exampleInputDate">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputUsername1">daily target number</label>
                          <input type="number" value="<?php echo $sales['daily_target_number'] ?>" name="daily_target_number" class="form-control" id="exampleInputUsername1" placeholder="Daily target number">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputUsername1">daily achieveit number</label>
                          <input type="number" value="<?php echo $sales['daily_achieveit_number'] ?>" name="daily_achieveit_number" class="form-control" id="exampleInputUsername1" placeholder="Daily achieveit number">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputUsername1">mid target number</label>
                          <input type="number" value="<?php echo $sales['mid_target_number'] ?>" name="mid_target_number" class="form-control" id="exampleInputUsername1" placeholder="Mid target number">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputUsername1">mid achieveit number</label>
                          <input type="number" value="<?php echo $sales['mid_achieveit_number'] ?>" name="mid_achieveit_number" class="form-control" id="exampleInputUsername1" placeholder="Mid achieveit number">
                        </div>
                        <button type="submit" name="edit_submit" class="btn btn-gradient-primary me-2">Update</button>
                    <?php
                      endif;
                    endforeach;
                    ?>
                  </form>
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