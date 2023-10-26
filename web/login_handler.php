<?php
// login_handler.php
session_start();


// TODO for josh@gmail.com and pikachu these need to be variables from sql table
// For simplification Lets pretend I got these login credentials from an SQL table.

$email = $_POST["email"];
$password = $_POST["password"];
$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/";

if ("josh@gmail.com" === $email &&
    "pikachu" == $password) {
    $_SESSION["access_granted"] = true;
    header("Location:granted.php");
} elseif (!preg_match($pattern, $email)) {
    $status = "Not a valid email";
    $_SESSION["status"] = $status;
    $_SESSION["email_preset"] = $email;
    $_SESSION["password_preset"] = $password;
    $_SESSION["access_granted"] = false;
    header("Location:login.php");

} elseif ("josh@gmail.com" === $email &&
        "pikachu" != $password) {
        $status = "Invalid  password";
        $_SESSION["status"] = $status;
        $_SESSION["email_preset"] = $email;
        $_SESSION["password_preset"] = $password;
        $_SESSION["access_granted"] = false;
        header("Location:login.php");

} elseif ("josh@gmail.com" != $email &&
    "pikachu" == $password) {
    $status = "Email is not registered";
    $_SESSION["status"] = $status;
    $_SESSION["email_preset"] = $email;
    $_SESSION["password_preset"] = $password;
    $_SESSION["access_granted"] = false;
    header("Location:login.php");

} else {
    $status = "Invalid username and password";
    $_SESSION["status"] = $status;
    $_SESSION["email_preset"] = $email;
    $_SESSION["password_preset"] = $password;
    $_SESSION["access_granted"] = false;
    header("Location:login.php");
}
?>