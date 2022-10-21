<?php
ob_start();
include('function.php');
if (isset($_SESSION['user_id'])) {
  header("Location: home.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['submit'])) {
    $username = "'" . $_POST['username'] . "'";
    $password = "'" . md5($_POST['password']) . "'";
    $Users->signIn($username, $password);
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
  <div class="thesignin">
    <div class="theform2">
      <div class="card">
        <div class="card-body">
          <form action="" method="POST" class="forms-sample">
            <h3>Sign in</h3>
            <div class="form-group">
              <label>User Name</label>
              <input type="username" class="form-control" placeholder="username" name="username" required>
            </div>
            <div class="form-group">
              <label>password</label>
              <input type="password" class="form-control" placeholder="Password " name="password" required>
            </div>
            <button name="submit"  class="btn btn-gradient-primary me-2">Sign in</button>
          </form>
        </div>
      </div>
    </div>

  </div>
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