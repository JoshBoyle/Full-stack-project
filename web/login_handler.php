<?php
// login_handler.php
session_start();
require_once "UserDao.php";

// todo for josh@gmail.com and pikachu these need to be variables from sql table
// for simplification lets pretend i got these login credentials from an sql table.

$email = $_POST["email"];
//$username = $_POST["username"];
$password = $_POST["password"];
$pattern = "/^[a-za-z0-9._%+-]+@[a-za-z0-9.-]+\\.[a-za-z]{2,}$/";
$dao = new UserDao();

try {
    $userData = $dao->getUser($_SESSION[$email]);
    $user = new User($userData);
} catch (PDOException $e) {
    return false;
}

$dbEmail = $user->getEmail();
$dbPass = $user->getEmail();

if ($dbEmail === $email &&
    $dbPass == $password &&
    preg_match($pattern, $email)) {
    $_session["access_granted"] = true;
    $_session["email"] = $email;
    header("location:AdvancedSearch.php");
} elseif (!preg_match($pattern, $email)) {
    $status = "not a valid email";
    $_session["status"] = $status;
    $_session["email_preset"] = $email;
    $_session["password_preset"] = $password;
    $_session["access_granted"] = false;
    header("location:login.php");
} elseif ($dbEmail === $email &&
        $dbPass != $password) {
        $status = "invalid  password";
        $_session["status"] = $status;
        $_session["email_preset"] = $email;
        $_session["password_preset"] = $password;
        $_session["access_granted"] = false;
        header("location:login.php");

} elseif ($dbEmail != $email &&
    $dbPass == $password) {
    $status = "email is not registered";
    $_session["status"] = $status;
    $_session["email_preset"] = $email;
    $_session["password_preset"] = $password;
    $_session["access_granted"] = false;
    header("location:login.php");

} else {
    $status = "invalid username and password";
    $_session["status"] = $status;
    $_session["email_preset"] = $email;
    $_session["password_preset"] = $password;
    $_session["access_granted"] = false;
    header("location:login.php");
}
?>