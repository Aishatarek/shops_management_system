<?php
session_start();
class Users
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function addUser($name, $password, $store, $role)
    {
        if (isset($name)  && isset($password)  && isset($role)) {
            if ($role == "'user'") {
                if (isset($store)) {
                    $sqll = "SELECT * FROM users WHERE username=$name";
                    $resultt =  $this->db->con->query($sqll);
                    if ($resultt->num_rows > 0) {
                        echo "<script>alert('the name already exist')</script>";
                    } else {
                        $this->db->con->query("INSERT INTO users(username,password,store,role) VALUES($name,$password,$store,$role)");
                    }
                }else {
                    echo "<script>alert('you must choose a store')</script>";
                }
            }elseif($role == "'spectator'"){
                $store='0';
                $sqll = "SELECT * FROM users WHERE username=$name";
                $resultt =  $this->db->con->query($sqll);
                if ($resultt->num_rows > 0) {
                    echo "<script>alert('the name already exist')</script>";
                } else {
                    $this->db->con->query("INSERT INTO users(username,password,store,role) VALUES($name,$password,$store,$role)");
                }
            }
        }
    }
    public function signIn($name, $password)
    {
        if ($this->db->con != null) {
            if (isset($name) && isset($password)) {
                $sql = "SELECT * FROM users WHERE username=$name AND password=$password";
                $result =  $this->db->con->query($sql);
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['name'] = $row['username'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['store'] = $row['store'];

                    if ($row['role'] == 'user') {
                        header("Location: sales/addSales01.php");

                    } else {
                        header("Location: home.php");

                    }

                    // header("Location: dashboard/dashboard.php");
                } else {
                    echo "<script>alert('Woops! name or Password is Wrong.')</script>";
                }
            }
        }
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM users");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function deleteUser($item_id = null)
    {
        if ($item_id != null) {
            $this->db->con->query("DELETE FROM users WHERE id={$item_id}");
        }
    }
    public function updateUser($item_id = null, $name, $password,$store,$role)
    {
        if ($item_id != null) {
            if (isset($name)  && isset($password)  && isset($role)) {
                if ($role == "'user'") {
                    $this->db->con->query("UPDATE users SET username={$name},password={$password},store={$store},role={$role} WHERE id={$item_id}");
                }elseif($role == "'spectator'"){
                    $store='0';
                    $this->db->con->query("UPDATE users SET username={$name},password={$password},store={$store},role={$role} WHERE id={$item_id}");
                }
            }
        }
    }
}
