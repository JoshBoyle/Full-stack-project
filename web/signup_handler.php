<?php
// signup_handler.php
require_once "UserDao.php";

// Function to sanitize input
function sanitize_input($input)
{
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

$email = sanitize_input($_POST["email"]);
$username = sanitize_input($_POST["username"]);
$password = sanitize_input($_POST["password"]);
$confirm_password = sanitize_input($_POST["confirm-pass"]);
$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

if (preg_match($pattern, $email) && $password == $confirm_password) {
    if (isset($_POST["signUpButton"])) {
        $access = 'member';
        $signUpDate = date("Y-m-d H:i:s");
        $dao = new UserDao();
        try {
            $dao->saveUser($email, $username, $password, $access, $signUpDate);
        } catch (Exception $e) {
            var_dump($e);
            die;
        }
    }
    $_SESSION["access_granted"] = true;
    header("Location: index.php");
} elseif (!preg_match($pattern, $email)) {
    $status = "Not a valid email";
} elseif ($password != $confirm_password) {
    $status = "Passwords do not match";
} else {
    $status = "Invalid input";
}

// Store relevant data in session for displaying in the signup.php page
$_SESSION["status"] = $status;
$_SESSION["email_preset"] = $email;
$_SESSION["username_preset"] = $username;
$_SESSION["password_preset"] = $password;
$_SESSION["confirm_password_preset"] = $confirm_password;
$_SESSION["access_granted"] = false;

header("Location: signup.php");
