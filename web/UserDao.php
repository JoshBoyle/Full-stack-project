<?php
// UserDao.php
// class for saving and getting comments from MySQL
require_once "User.php";

//class UserDao {
//    private $db;
//
//    public function __construct($db) {
//        $this->db = $db;
//    }
//
//    public function createUser($email, $password) {
//        // Generate a unique user_id (auto-incrementing)
//        // You can use your database's auto-increment feature, e.g., "AUTO_INCREMENT" in MySQL
//        // or a sequence in PostgreSQL.
//
//        $access = 'member';
//
//        // Create a timestamp for sign_up_date
//        $signUpDate = date("Y-m-d H:i:s");
//
//        $query = "INSERT INTO users (email, password, access, sign_up_date) VALUES (?, ?, ?, ?)";
//        $stmt = $this->db->prepare($query);
//        $stmt->bind_param("ssss", $email, $password, $access, $signUpDate);
//
//        if ($stmt->execute()) {
//            // User created successfully
//            return true;
//        } else {
//            // Error occurred
//            return false;
//        }
//    }
//
//    public function getUserByEmail($email) {
//        $query = "SELECT * FROM users WHERE email = ?";
//        $stmt = $this->db->prepare($query);
//        $stmt->bind_param("s", $email);
//        $stmt->execute();
//
//        return $stmt->get_result()->fetch_assoc();
//    }
//
//    // Additional methods for updating, deleting, and retrieving users can be added here.
//}
class UserDao
{
    private $host = "localhost";
    private $db = "website_db";
    private $user = "root";
    private $pass = "";

    private $table = "users";

    public function getConnection()
    {
        return
            new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
                $this->pass);
    }

    public function saveUser($email, $user_name, $password, $access, $signUpDate)
    {
//        $access = 'member';
//        $signUpDate = date("Y-m-d H:i:s");

        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO users
            (email, 
             user_name,
             password, 
             access, 
             sign_up_date)
            VALUES
            (:email, :user_name, :password, :access, :signUpDate)";
//            (:email), (:password), (:access), (:signUpDate)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(':email', $email, PDO::PARAM_STR);
        $q->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $q->bindParam(':password', $password, PDO::PARAM_STR);
        $q->bindParam(':access', $access, PDO::PARAM_STR);
        $q->bindParam(':signUpDate', $signUpDate, PDO::PARAM_STR);
//        $q->bindParam("sssi", $email, $password, $access, $signUpDate);
        $q->execute();
    }

    public function getUsers()
    {
        $conn = $this->getConnection();
        return $conn->query("SELECT * FROM users");
    }

    public function getUser($user)
    {
        try {
            $conn = $this->getConnection();
//            $saveQuery = "SELECT * FROM users WHERE 'user_name' = :user";
            $saveQuery = "SELECT * FROM users WHERE user_name = :user";
            $q = $conn->prepare($saveQuery);
            $q->bindParam(':user', $user, PDO::PARAM_STR);

            $q->execute();
            $result = $q->fetch(PDO::FETCH_ASSOC);
            $conn = null;
            return $result;
//            if ($result) {
//                return new User($result['user_id'],
//                    $result['user_name'], $result['password'],
//                    $result['email'], $result['sign_up_date'],
//                    $result['access']);
//            } else {
//                return null;
//            }
        } catch (PDOException $e) {
            return false;
        }
    }


    public function getUserEmail($email)
    {
        try {
            $conn = $this->getConnection();
            $saveQuery = "SELECT * FROM users WHERE email = :email";
            $q = $conn->prepare($saveQuery);
            $q->bindParam(':email', $email, PDO::PARAM_STR);

            $q->execute();
            $result = $q->fetch(PDO::FETCH_ASSOC);
            $conn = null;
            return $result;
//            if ($result) {
//                return new User($result['user_id'],
//                    $result['user_name'], $result['password'],
//                    $result['email'], $result['sign_up_date'],
//                    $result['access']);
//            } else {
//                return null;
//            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getPermission($user)
    {
        try {
            $conn = $this->getConnection();
            $saveQuery = "SELECT access FROM users WHERE user_name = :user";
            $q = $conn->prepare($saveQuery);
            $q->bindParam(':user', $user, PDO::PARAM_STR);

            $q->execute();
            $result = $q->fetch(PDO::FETCH_ASSOC);
            $conn = null;
            return $result;
        } catch (PDOException $e) {
            return false;
        }

    }
} // end Dao