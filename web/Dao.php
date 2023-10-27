<?php
// Dao.php
// class for saving and getting comments from MySQL
require_once "User.php";
class Dao
{
    private $host = "localhost";
    private $db = "websitedb";
    private $user = "root";
    private $pass = "";

    public function getConnection()
    {
        return
            new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
                $this->pass);
    }

    public function saveUser($user)
    {
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO users
        (user)
        VALUES
        (:user)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":user", $user);
        $q->execute();
    }

    public function getUsers()
    {
        $conn = $this->getConnection();
        return $conn->query("SELECT * FROM users");
    }
} // end Dao
//require_once "User.php";
//class Dao
//{
//
//    // file containing serialized User objects
//    private $usersFile = "users.txt";
//
//    public function getUser($email)
//    {
//        $users = file($this->usersFile);
//
//        foreach ($users as $user) {
//            // recreate User object
//            $user = unserialize($user);
//            if ($email == trim($user->getEmail())) {
//                // user email found, return the object
//                return $user;
//            }
//        }
//        throw new Exception("User not found");
//    }
//
//} // end Dao