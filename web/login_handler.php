<?php
// login_handler.php
session_start();
require_once "UserDao.php";

$email = $_POST["email"];
$password = $_POST["password"];
$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/";
$dao = new UserDao();

try {
    $userData = $dao->getuseremail($email);
    echo '<pre>'; print_r($userData); echo '</pre>';
    $user = new User($userData);
    echo '<pre>'; print_r($user); echo '</pre>';
    echo $user->getEmail();
    if ($user) {
        if ($user->getEmail() === $email && $user->getPass() === $password) {
            $_SESSION["access_granted"] = true;
            $_SESSION["email"] = $email;
            header("location: AdvancedSearch.php");
        } elseif (!preg_match($pattern, $email)) {
            handleInvalid("not a valid email");
        } elseif ($user->getEmail() === $email && $user->getPass() !== $password) {
            handleInvalid("invalid password");
        } else {
            handleInvalid("email is not registered");
        }
    } else {
        handleInvalid("invalid email and password");
    }
} catch (PDOException $e) {
    handleInvalid("Database error");
}

function handleInvalid($status) {
    $_SESSION["status"] = $status;
    $_SESSION["email_preset"] = $_POST["email"];
    $_SESSION["password_preset"] = $_POST["password"];
    $_SESSION["access_granted"] = false;
    header("location: index.php");
}
?>
