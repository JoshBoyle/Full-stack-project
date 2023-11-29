<?php
// UserDao.php
require_once "User.php";
class UserDao
{
    private $host = "bmlx3df4ma7r1yh4.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private $db = "svewsamturcpvoqy";
    private $user = "v9n32qs2e3pbvdp5";
    private $pass = "xcs4unf4jkkl8dy9";

    public function getConnection()
    {
        return
            new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
                $this->pass);
    }

    public function saveUser($email, $user_name, $hashedPassword, $salt, $access, $signUpDate)
    {
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO users
        (email, user_name, password, salt, access, sign_up_date)
        VALUES (:email, :user_name, :password, :salt, :access, :signUpDate)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(':email', $email, PDO::PARAM_STR);
        $q->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $q->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $q->bindParam(':salt', $salt, PDO::PARAM_STR);
        $q->bindParam(':access', $access, PDO::PARAM_STR);
        $q->bindParam(':signUpDate', $signUpDate, PDO::PARAM_STR);
        $q->execute();
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
} // end Dao