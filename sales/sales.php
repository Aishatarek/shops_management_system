<?php

class Sales
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM sales");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function addSales($product, $store, $area,$region, $date, $daily_target_number, $daily_achieveit_number, $mid_target_number, $mid_achieveit_number)
    {
        if (isset($product) && isset($store) && isset($area) && isset($date) && isset($daily_target_number) && isset($daily_achieveit_number) && isset($mid_target_number) && isset($mid_achieveit_number)) {
            $sqll = "SELECT * FROM sales WHERE product={$product} AND store={$store} AND date='$date'";
            $resultt =  $this->db->con->query($sqll);
            if ($resultt->num_rows > 0) {
                echo "<script>alert('this product with the same date already exist')</script>";
            } else {
                $result = $this->db->con->query("INSERT INTO sales(product,store,area,region,date,daily_target_number,daily_achieveit_number,mid_target_number,mid_achieveit_number) VALUES ('$product', '$store','$area','$region','$date', '$daily_target_number', '$daily_achieveit_number', '$mid_target_number', '$mid_achieveit_number')");
                return $result;
            }
        } else {
            echo "<script>alert('you must fill all inputs')</script>";
        }
    }

    public function deleteSales($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM sales WHERE id={$item_id}");
            return $result;
        }
    }
    public function updateSales($item_id = null, $product, $store, $area, $date, $daily_target_number, $daily_achieveit_number, $mid_target_number, $mid_achieveit_number)
    {
        // echo "<script>alert($storeee)</script>";

        if ($item_id != null) {
            if ($date != "'1970-01-01'") {
                // echo "<script>alert($product, $store,$area, $date, $daily_target_number, $daily_achieveit_number, $mid_target_number, $mid_achieveit_number)</script>";
                $result = $this->db->con->query("UPDATE sales SET product={$product},store={$store},area={$area},date={$date},daily_target_number={$daily_target_number} ,daily_achieveit_number={$daily_achieveit_number} ,mid_target_number={$mid_target_number} ,mid_achieveit_number={$mid_achieveit_number} WHERE id={$item_id}");
                return $result;
            } else {
                $result = $this->db->con->query("UPDATE sales SET product={$product},store={$store},area={$area},daily_target_number={$daily_target_number},daily_achieveit_number={$daily_achieveit_number} ,mid_target_number={$mid_target_number} ,mid_achieveit_number={$mid_achieveit_number} WHERE id={$item_id}");
                return $result;
            }
        }
    }
    public function daily_target_sum()
    {
        $result = $this->db->con->query("SELECT product,SUM(daily_target_number) FROM sales GROUP BY product");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function daily_achieveit_sum()
    {
        $result = $this->db->con->query("SELECT product,SUM(daily_achieveit_number) FROM sales GROUP BY product");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function mid_target_sum()
    {
        $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales GROUP BY product");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function mid_achieveit_sum()
    {
        $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales GROUP BY product");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    /***************************** */
    public function daily_target_sum_user($store)
    {
        $result = $this->db->con->query("SELECT product,SUM(daily_target_number) FROM sales WHERE store='$store' GROUP BY product");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function daily_achieveit_sum_user($store)
    {
        $result = $this->db->con->query("SELECT product,SUM(daily_achieveit_number) FROM sales WHERE store='$store' GROUP BY product");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function mid_target_sum_user($store)
    {
        $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE store='$store' GROUP BY product");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function mid_achieveit_sum_user($store)
    {
        $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE store='$store' GROUP BY product");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    /***************************************************** */
    public function getDates()
    {
        $result = $this->db->con->query("SELECT date FROM sales GROUP BY date");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getDatesUser($store)
    {
        $result = $this->db->con->query("SELECT date FROM sales WHERE store='$store' GROUP BY date");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getAreas()
    {

        $result = $this->db->con->query("SELECT area FROM sales GROUP BY area");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getRegions()
    {

        $result = $this->db->con->query("SELECT region FROM sales GROUP BY area");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    /************************************************ */
    public function daily_target_sum2($date, $area, $region)
    {

        if ($date == 0 && $area == "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_target_number) FROM sales GROUP BY product");
        } elseif ($date != 0 && $area != "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_target_number) FROM sales WHERE area='$area' AND date='$date' GROUP BY product ");
        } elseif ($date == 0 && $area != "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_target_number) FROM sales WHERE area='$area' GROUP BY product ");
        } elseif ($date != 0 && $area == "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_target_number) FROM sales WHERE date='$date' GROUP BY product ");
        } elseif ($date == 0 && $area == "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_target_number) FROM sales WHERE region='$region' GROUP BY product");
        } elseif ($date != 0 && $area != "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_target_number) FROM sales WHERE area='$area' AND date='$date'AND region='$region' GROUP BY product ");
        } elseif ($date == 0 && $area != "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_target_number) FROM sales WHERE area='$area' AND region='$region' GROUP BY product ");
        } elseif ($date != 0 && $area == "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_target_number) FROM sales WHERE date='$date' AND region='$region' GROUP BY product ");
        }
        // $result = $this->db->con->query("SELECT product,SUM(daily_target_number) FROM sales GROUP BY product");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function daily_achieveit_sum2($date, $area, $region)
    {
        // echo "<script>alert($area)</script>";
        if ($date == 0 && $area == "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_achieveit_number) FROM sales GROUP BY product");
        } elseif ($date != 0 && $area != "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_achieveit_number) FROM sales WHERE area='$area' AND date='$date' GROUP BY product ");
        } elseif ($date == 0 && $area != "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_achieveit_number) FROM sales WHERE area='$area' GROUP BY product ");
        } elseif ($date != 0 && $area == "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_achieveit_number) FROM sales WHERE date='$date' GROUP BY product ");
        } elseif ($date == 0 && $area == "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_achieveit_number) FROM sales WHERE region='$region' GROUP BY product");
        } elseif ($date != 0 && $area != "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_achieveit_number) FROM sales WHERE area='$area' AND date='$date'AND region='$region' GROUP BY product ");
        } elseif ($date == 0 && $area != "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_achieveit_number) FROM sales WHERE area='$area' AND region='$region' GROUP BY product ");
        } elseif ($date != 0 && $area == "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(daily_achieveit_number) FROM sales WHERE date='$date' AND region='$region' GROUP BY product ");
        }
        // $result = $this->db->con->query("SELECT product,SUM(daily_achieveit_number) FROM sales GROUP BY product");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function mid_target_sum2($date, $area, $region)
    {
        if ($date == 0 && $area == "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales GROUP BY product");
        } elseif ($date != 0 && $area != "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE area='$area' AND MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date <= '$date'  GROUP BY product ");
        } elseif ($date == 0 && $area != "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE area='$area' GROUP BY product ");
        } elseif ($date != 0 && $area == "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date <= '$date'  GROUP BY product ");
        } elseif ($date == 0 && $area == "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE region='$region' GROUP BY product");
        } elseif ($date != 0 && $area != "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE area='$area' AND MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date <= '$date' AND region='$region' GROUP BY product ");
        } elseif ($date == 0 && $area != "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE area='$area' AND region='$region' GROUP BY product ");
        } elseif ($date != 0 && $area == "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date <= '$date'  AND region='$region' GROUP BY product ");
        }
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function mid_achieveit_sum2($date, $area, $region)
    {
        if ($date == 0 && $area == "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales GROUP BY product");
        } elseif ($date != 0 && $area != "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE area='$area' AND MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date <= '$date'  GROUP BY product ");
        } elseif ($date == 0 && $area != "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE area='$area' GROUP BY product ");
        } elseif ($date != 0 && $area == "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date <= '$date'  GROUP BY product ");
        } elseif ($date == 0 && $area == "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE region='$region' GROUP BY product");
        } elseif ($date != 0 && $area != "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE area='$area' AND MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date <= '$date' AND region='$region' GROUP BY product ");
        } elseif ($date == 0 && $area != "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE area='$area' AND region='$region' GROUP BY product ");
        } elseif ($date != 0 && $area == "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date <= '$date'  AND region='$region' GROUP BY product ");
        }
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function mid_target_sum2_dash($date, $area, $region)
    {
        if ($date == 0 && $area == "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales GROUP BY product");
        } elseif ($date != 0 && $area != "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE area='$area' AND MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date = '$date'  GROUP BY product ");
        } elseif ($date == 0 && $area != "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE area='$area' GROUP BY product ");
        } elseif ($date != 0 && $area == "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date = '$date'  GROUP BY product ");
        } elseif ($date == 0 && $area == "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE region='$region' GROUP BY product");
        } elseif ($date != 0 && $area != "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE area='$area' AND MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date = '$date' AND region='$region' GROUP BY product ");
        } elseif ($date == 0 && $area != "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE area='$area' AND region='$region' GROUP BY product ");
        } elseif ($date != 0 && $area == "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date = '$date'  AND region='$region' GROUP BY product ");
        }
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function mid_achieveit_sum2_dash($date, $area, $region)
    {
        if ($date == 0 && $area == "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales GROUP BY product");
        } elseif ($date != 0 && $area != "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE area='$area' AND MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date = '$date'  GROUP BY product ");
        } elseif ($date == 0 && $area != "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE area='$area' GROUP BY product ");
        } elseif ($date != 0 && $area == "" && $region == "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date = '$date'  GROUP BY product ");
        } elseif ($date == 0 && $area == "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE region='$region' GROUP BY product");
        } elseif ($date != 0 && $area != "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE area='$area' AND MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date = '$date' AND region='$region' GROUP BY product ");
        } elseif ($date == 0 && $area != "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE area='$area' AND region='$region' GROUP BY product ");
        } elseif ($date != 0 && $area == "" && $region != "") {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date = '$date'  AND region='$region' GROUP BY product ");
        }
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function daily_achieveit_sum3($date,$store)
    {
        if ($date != 0) {
            $result = $this->db->con->query("SELECT product,SUM(daily_achieveit_number) FROM sales WHERE MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date <= '$date' AND store='$store' GROUP BY product ");
        }
        // $result = $this->db->con->query("SELECT product,SUM(daily_target_number) FROM sales GROUP BY product");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    
    public function daily_target_sum2_user($store,$date)
    {

        if ($date == 0 ) {
            $result = $this->db->con->query("SELECT product,SUM(daily_target_number) FROM sales WHERE store='$store' GROUP BY product");
        } elseif ($date != 0) {
            $result = $this->db->con->query("SELECT product,SUM(daily_target_number) FROM sales WHERE store='$store' AND date='$date' GROUP BY product ");
        } 
        // $result = $this->db->con->query("SELECT product,SUM(daily_target_number) FROM sales GROUP BY product");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function daily_achieveit_sum2_user($store,$date)
    {
        // echo "<script>alert($area)</script>";
        if ($date == 0) {
            $result = $this->db->con->query("SELECT product,SUM(daily_achieveit_number) FROM sales  WHERE store='$store' GROUP BY product");
        } elseif ($date != 0) {
            $result = $this->db->con->query("SELECT product,SUM(daily_achieveit_number) FROM sales  WHERE store='$store' AND date = '$date' GROUP BY product ");
        } 
        // $result = $this->db->con->query("SELECT product,SUM(daily_achieveit_number) FROM sales GROUP BY product");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function mid_target_sum2_user($store,$date)
    {
        if ($date == 0) {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE store='$store' GROUP BY product");
        } elseif ($date != 0 ) {
            $result = $this->db->con->query("SELECT product,SUM(mid_target_number) FROM sales WHERE store='$store' AND MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date = '$date'  GROUP BY product ");
        } 
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function mid_achieveit_sum2_user($store,$date)
    {
        if ($date == 0) {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE store='$store' GROUP BY product");
        } elseif ($date != 0 ) {
            $result = $this->db->con->query("SELECT product,SUM(mid_achieveit_number) FROM sales WHERE store='$store' AND MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') AND date = '$date'  GROUP BY product ");
        } 
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    // public function getProduct($item_id = null, $table = 'products')
    // {
    //     if (isset($item_id)) {
    //         $result = $this->db->con->query("SELECT * FROM {$table} WHERE id={$item_id}  ");

    //         $resultArray = array();
    //         while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    //             $resultArray[] = $item;
    //         }
    //         return $resultArray;
    //     }
    // }
}
