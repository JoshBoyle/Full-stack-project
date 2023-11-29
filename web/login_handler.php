<?php
// login_handler.php
session_start();
require_once "UserDao.php";

$email = $_POST["email"];
$password = $_POST["password"];

$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/";
$dao = new UserDao();

try {
    $userData = $dao->getUserEmail($email);

    if ($userData) {
        $storedPassword = $userData['password'];
        $storedSalt = $userData['salt'];

        // Concatenate salt and entered password before hashing
        $hashedEnteredPassword = hash('sha256', $storedSalt . $password);

        if ($userData['email'] === $email && $storedPassword === $hashedEnteredPassword) {
            $_SESSION["access_granted"] = true;
            $_SESSION["email_preset"] = $email;
            header("location: index.php");
        } elseif (!preg_match($pattern, $email)) {
            handleInvalid("Not a valid email");
        } elseif ($userData['email'] === $email && $storedPassword !== $hashedEnteredPassword) {
            handleInvalid("Invalid password");
        } else {
            handleInvalid("Email is not registered");
        }
    } else {
        handleInvalid("Invalid email and password");
    }
} catch (PDOException $e) {
    handleInvalid("Database error");
}

function handleInvalid($status) {
    $_SESSION["status"] = $status;
    $_SESSION["email_preset"] = $_POST["email"];
    $_SESSION["access_granted"] = false;
    header("location: index.php");
}
?>
