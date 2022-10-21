<?php

class MonthlyTarget
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM monthly_target");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function addMonthlyTarget($product, $store, $monthly_target)
    {
        if (isset($product) && isset($store) && isset($monthly_target)) {
            $result = $this->db->con->query("INSERT INTO monthly_target(product,store,monthly_target) VALUES ('$product','$store','$monthly_target')");
            return $result;
        } else {
            echo "<script>alert('you must fill all inputs')</script>";
        }
    }

    public function deleteMonthlyTarget($item_id = null)
    {
        if ($item_id != null) {
            $this->db->con->query("DELETE FROM monthly_target WHERE id={$item_id};");
        }
    }
    public function updateMonthlyTarget($item_id = null,  $monthly_target)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("UPDATE monthly_target SET monthly_target={$monthly_target} WHERE id={$item_id}");
            return $result;
        }
    }
}
