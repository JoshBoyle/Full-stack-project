<?php
// this page requires a user with the MEMBER permission to view
require_once "User.php";
require_once "UserDao.php";
session_start();

$dao = new UserDao();
try {
    $userData = $dao->getUserEmail($_SESSION["email"]);
    $user = new User($userData);
    if ($user !== null) {
        $permission = $user->hasPermission(User::MEMBER);
        if ($permission) {
            require_once "AdvancedSearchText.php";
        } else {
            $_SESSION["status"] = "Log In to access this page";
            header("Location:login.php");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
