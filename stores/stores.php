<?php

class Stores
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM stores");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function addStore($title, $area,$region)
    {
        if (isset($title) && isset($area)) {
            $result = $this->db->con->query("INSERT INTO stores (title,area,region) VALUES ('$title', '$area','$region')");
            return $result;
        } else {
            echo "<script>alert('you must fill all inputs')</script>";
        }
    }

    public function deleteStore($item_id = null)
    {
        if ($item_id != null) {
            $this->db->con->query("DELETE FROM sales WHERE store={$item_id}");
            $this->db->con->query("DELETE FROM stores WHERE id={$item_id};");

        }
    }
    public function updateStore($item_id = null, $title, $area,$region)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("UPDATE stores SET title ={$title},area={$area},region={$region} WHERE id={$item_id}");
            return $result;
        }
    }
}
