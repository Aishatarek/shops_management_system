<?php

include("../function.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem'])) {
        $Sales->deleteSales($_POST['item_id']);
    }
}
$date = $_GET['date'];
if(isset($_GET['store']) && !empty($_GET['store'])){
    $storee = $_GET['store'];
}else{
    $storee = 0;
}
if($_SESSION['role']=="user"){
    $storee = $_SESSION['store'];
}


// echo "<script>alert($date)</script>";
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
                                    <h4 class="card-title">All Sales</h4>
                                    <form action="allSalesSearch.php" method="get" class="thesearch">
                                        <div>
                                            <label class="form-label">Date: </label>
                                            <select name="date" class="btn btn-outline-primary">
                                                <option value="0">All</option>
                                                <?php
                                                if ($_SESSION['role'] == "user") {
                                                    foreach ($Sales->getDatesUser($_SESSION['store'])  as $sales) {
                                                        if ($sales['date'] == $date) {
                                                ?>
                                                            <option selected value="<?php echo $sales['date'] ?>"><?php echo $sales['date'] ?></option>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <option value="<?php echo $sales['date'] ?>"><?php echo $sales['date'] ?></option>
                                                        <?php
                                                        }
                                                    }
                                                } else {
                                                    foreach ($Sales->getDates()  as $sales) {
                                                        if ($sales['date'] == $date) {
                                                        ?>
                                                            <option selected value="<?php echo $sales['date'] ?>"><?php echo $sales['date'] ?></option>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <option value="<?php echo $sales['date'] ?>"><?php echo $sales['date'] ?></option>
                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <?php
                                        if ($_SESSION['role'] == "admin") {
                                        ?>
                                            <div class="my-2">
                                                <label class="form-label">store: </label>
                                                <select name="store" class="btn btn-outline-primary">
                                                    <option value="">All</option>
                                                    <?php
                                                    foreach ($Stores->getData() as $store) {
                                                        if ($store['id'] == $storee) {
                                                    ?>
                                                            <option selected value="<?php echo $store['id'] ?>"><?php echo $store['title'] ?></option>
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

                                        <?php
                                        }
                                        ?>
                                        <input type="submit" class="ml-1 btn btn-gradient-primary">
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> Date </th>
                                                    <th> Store </th>
                                                    <th> Product </th>
                                                    <th> daily target </th>
                                                    <th> daily achieveit </th>
                                                    <th> mtd target </th>
                                                    <th> mtd achieveit </th>
                                                    <th> Delete </th>
                                                    <th> Update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($date == 0 && $storee == 0) :
                                                    foreach ($Sales->getData() as $sales) :
                                                ?>
                                                        <tr>
                                                            <td><?php echo $sales['date']; ?></td>
                                                            <td>
                                                                <?php
                                                                foreach ($Stores->getData() as $store) {
                                                                    if ($store['id'] == $sales['store']) {
                                                                        echo $store['title'];
                                                                    }
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                foreach ($Products->getData() as $product) {
                                                                    if ($product['id'] == $sales['product']) {
                                                                        echo $product['title'];
                                                                    }
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $sales['daily_target_number']; ?></td>
                                                            <td><?php echo $sales['daily_achieveit_number']; ?></td>
                                                            <td><?php echo $sales['mid_target_number']; ?></td>
                                                            <td><?php echo $sales['mid_achieveit_number']; ?></td>

                                                            <td>
                                                                <form method="post">
                                                                    <input type="hidden" value="<?php echo $sales["id"] ?>" name="item_id">
                                                                    <button type="submit" name="deleteItem" class="btn btn-gradient-danger btn-rounded "><i class="mdi mdi-delete menu-icon"></i></button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <a href="updateSales.php?id=<?php echo $sales['id']; ?>"><button class="btn btn-gradient-info btn-rounded "><i class="mdi mdi-pen menu-icon"></i></button></a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                if ($date == 0 && $storee != 0) :
                                                    foreach ($Sales->getData() as $sales) :
                                                        if ($storee == $sales['store']) :
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $sales['date']; ?></td>
                                                                <td>
                                                                    <?php
                                                                    foreach ($Stores->getData() as $store) {
                                                                        if ($store['id'] == $sales['store']) {
                                                                            echo $store['title'];
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    foreach ($Products->getData() as $product) {
                                                                        if ($product['id'] == $sales['product']) {
                                                                            echo $product['title'];
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $sales['daily_target_number']; ?></td>
                                                                <td><?php echo $sales['daily_achieveit_number']; ?></td>
                                                                <td><?php echo $sales['mid_target_number']; ?></td>
                                                                <td><?php echo $sales['mid_achieveit_number']; ?></td>

                                                                <td>
                                                                    <form method="post">
                                                                        <input type="hidden" value="<?php echo $sales["id"] ?>" name="item_id">
                                                                        <button type="submit" name="deleteItem" class="btn btn-gradient-danger btn-rounded "><i class="mdi mdi-delete menu-icon"></i></button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <a href="updateSales.php?id=<?php echo $sales['id']; ?>"><button class="btn btn-gradient-info btn-rounded "><i class="mdi mdi-pen menu-icon"></i></button></a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        endif;
                                                    endforeach;
                                                endif;
                                                if ($date != 0 && $storee == 0) :
                                                    foreach ($Sales->getData() as $sales) :
                                                        if ($date == $sales['date']) :
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $sales['date']; ?></td>
                                                                <td>
                                                                    <?php
                                                                    foreach ($Stores->getData() as $store) {
                                                                        if ($store['id'] == $sales['store']) {
                                                                            echo $store['title'];
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    foreach ($Products->getData() as $product) {
                                                                        if ($product['id'] == $sales['product']) {
                                                                            echo $product['title'];
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $sales['daily_target_number']; ?></td>
                                                                <td><?php echo $sales['daily_achieveit_number']; ?></td>
                                                                <td><?php echo $sales['mid_target_number']; ?></td>
                                                                <td><?php echo $sales['mid_achieveit_number']; ?></td>

                                                                <td>
                                                                    <form method="post">
                                                                        <input type="hidden" value="<?php echo $sales["id"] ?>" name="item_id">
                                                                        <button type="submit" name="deleteItem" class="btn btn-gradient-danger btn-rounded "><i class="mdi mdi-delete menu-icon"></i></button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <a href="updateSales.php?id=<?php echo $sales['id']; ?>"><button class="btn btn-gradient-info btn-rounded "><i class="mdi mdi-pen menu-icon"></i></button></a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        endif;
                                                    endforeach;
                                                endif;
                                                if ($date != 0 && $storee != 0) :
                                                    foreach ($Sales->getData() as $sales) :
                                                        if ($date == $sales['date'] && $storee == $sales['store']) :
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $sales['date']; ?></td>
                                                                <td>
                                                                    <?php
                                                                    foreach ($Stores->getData() as $store) {
                                                                        if ($store['id'] == $sales['store']) {
                                                                            echo $store['title'];
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    foreach ($Products->getData() as $product) {
                                                                        if ($product['id'] == $sales['product']) {
                                                                            echo $product['title'];
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $sales['daily_target_number']; ?></td>
                                                                <td><?php echo $sales['daily_achieveit_number']; ?></td>
                                                                <td><?php echo $sales['mid_target_number']; ?></td>
                                                                <td><?php echo $sales['mid_achieveit_number']; ?></td>

                                                                <td>
                                                                    <form method="post">
                                                                        <input type="hidden" value="<?php echo $sales["id"] ?>" name="item_id">
                                                                        <button type="submit" name="deleteItem" class="btn btn-gradient-danger btn-rounded "><i class="mdi mdi-delete menu-icon"></i></button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <a href="updateSales.php?id=<?php echo $sales['id']; ?>"><button class="btn btn-gradient-info btn-rounded "><i class="mdi mdi-pen menu-icon"></i></button></a>
                                                                </td>
                                                            </tr>
                                                <?php
                                                        endif;
                                                    endforeach;
                                                endif;
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