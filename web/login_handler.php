<?php
// login_handler.php
session_start();
require_once "UserDao.php";

$email = $_POST["email"];
$password = $_POST["password"];
echo '<pre>'; print_r($email); echo '</pre>';
echo '<pre>'; print_r($password); echo '</pre>';


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
            $_SESSION["email_preset"] = $email;
            $_SESSION["password_preset"] = $password;
            header("location: index.php");
        } elseif (!preg_match($pattern, $email)) {
            handleInvalid("not a valid email");
        } elseif ($user->getEmail() === $email && $user->getPass() !== $password) {
            echo '<pre>' . 'expected email: '; print_r($email); echo '</pre>';
            echo '<pre>' . 'actual email: '; print_r($user->getEmail()); echo '</pre>';
            echo '<pre>' . 'expected pass: '; print_r($password); echo '</pre>';
            echo '<pre>' . 'actual pass: '; print_r($user->getPass()); echo '</pre>';

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
    echo '<pre>'; print_r($status); echo '</pre>';
//    header("location: index.php");
}
?>
