<?php
include("../function.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['deleteItem'])) {
    $MonthlyTargets->deleteMonthlyTarget($_POST['item_id']);
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
  <link rel="stylesheet" href="../assets/css/media.css">

  <!-- End layout styles -->
  <link rel="shortcut icon" href="../assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <!-- <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="../assets/images/logo.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../assets/images/logo-mini.svg"
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
      <?php
      include("../sidenav.php")
      ?>
      <!-- partial -->
      <div class="main-panel maindashboard">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Stores</h4>
                  <form action="allMonthlyTargetsSearch.php" method="get" class="thesearch">
                    <div>
                      <label class="form-label">Stores: </label>
                      <select name="store" class="btn btn-outline-primary">
                        <option value="0">All</option>
                        <?php
                        foreach ($Stores->getData()  as $store) {
                        ?>
                          <option value="<?php echo $store['id'] ?>"><?php echo $store['title'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div>
                      <label class="form-label">Products: </label>
                      <select name="product" class="btn btn-outline-primary">
                        <option value="0">All</option>
                        <?php
                        foreach ($Products->getData()  as $product) {
                        ?>
                          <option value="<?php echo $product['id'] ?>"><?php echo $product['title'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>

                    <input type="submit" class="ml-1 btn btn-gradient-primary">
                  </form>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th> Product </th>
                          <th> Store </th>
                          <th> Monthly Target </th>
                          <th> Delete </th>
                          <th> Update</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($MonthlyTargets->getData() as $monthlyTarget) :
                        ?>
                          <tr>
                            <td>
                              <?php
                              foreach ($Products->getData() as $product) :
                                if ($product['id'] == $monthlyTarget['product']) :
                                  echo $product['title'];
                                endif;
                              endforeach;
                              ?>
                            </td>
                            <td>
                              <?php
                              foreach ($Stores->getData() as $store) :
                                if ($store['id'] == $monthlyTarget['store']) :
                                  echo $store['title'];
                                endif;
                              endforeach;
                              ?>
                            </td>
                            <td><?php echo $monthlyTarget['monthly_target']; ?></td>
                            <td>
                              <form method="post">
                                <input type="hidden" value="<?php echo $monthlyTarget["id"] ?>" name="item_id">
                                <button type="submit" name="deleteItem" class="btn btn-gradient-danger btn-rounded "><i class="mdi mdi-delete menu-icon"></i></button>
                              </form>
                            </td>
                            <td>
                              <a href="updateMonthlyTarget.php?id=<?php echo $monthlyTarget['id']; ?>"><button class="btn btn-gradient-info btn-rounded "><i class="mdi mdi-pen menu-icon"></i></button></a>
                            </td>
                          </tr>
                        <?php
                        endforeach;
                        ?>
                      </tbody>
                    </table>
                  </div>
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