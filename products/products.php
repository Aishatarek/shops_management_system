<?php

class Products
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM products");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function addProduct($title, $description)
    {
        if (isset($title) && isset($description)) {
            $result = $this->db->con->query("INSERT INTO products (title,description) VALUES ('$title', '$description')");
            return $result;
        } else {
            echo "<script>alert('you must fill all inputs')</script>";
        }
    }

    public function deleteProduct($item_id = null)
    {
        if ($item_id != null) {
            $this->db->con->query("DELETE FROM sales WHERE product={$item_id}");
            $this->db->con->query("DELETE FROM products WHERE id={$item_id}");
        }
    }
    public function updateProduct($item_id = null, $title, $description)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("UPDATE products SET title ={$title},description={$description} WHERE id={$item_id}");
            return $result;
        }
    }
}
