<?php
// UserDao.php
require_once "User.php";
class UserDao
{
    private $host = "localhost";
    private $db = "website_db";
    private $user = "root";
    private $pass = "";

    public function getConnection()
    {
        return
            new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
                $this->pass);
    }

    public function saveUser($email, $user_name, $password, $access, $signUpDate)
    {
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
        $q = $conn->prepare($saveQuery);
        $q->bindParam(':email', $email, PDO::PARAM_STR);
        $q->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $q->bindParam(':password', $password, PDO::PARAM_STR);
        $q->bindParam(':access', $access, PDO::PARAM_STR);
        $q->bindParam(':signUpDate', $signUpDate, PDO::PARAM_STR);
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
            $saveQuery = "SELECT * FROM users WHERE user_name = :user";
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