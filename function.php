<?php
require('connection.php');
require('products/products.php');
require('stores/stores.php');
require('sales/sales.php');
require('monthyTargets/monthyTargets.php');
require('users/users.php');


$db = new DBController();
$Products = new Products($db);
$Stores = new Stores($db);
$Sales = new Sales($db);
$MonthlyTargets= new MonthlyTarget($db);
$Users = new Users($db);

