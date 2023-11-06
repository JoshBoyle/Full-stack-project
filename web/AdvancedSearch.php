<?php
// this page requires a user with the MEMBER permission to view
require_once "User.php";
require_once "UserDao.php";
session_start();

$dao = new UserDao();
try {
    // get the user object from the data store
    echo $_SESSION["user"];
    $userData = $dao->getUser($_SESSION["user"]);
    $user = new User($userData);
    if ($user !== null) {
        $permission = $user->hasPermission(User::MEMBER);
        if ($permission) {
//            echo "User has the permission";
            require_once "AdvancedSearchText.php";
        } else {
//            header("Location:login.php");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
