<?php
// this page requires a user with the MEMBER permission to view
require_once "User.php";
require_once "UserDao.php";

$dao = new UserDao();
try {
    // get the user object from the data store
    $userData = $dao->getUser("oimickoi");
    $user = new User($userData);
    if ($user !== null) {
        $permission = $user->hasPermission(User::MEMBER);
        if ($permission) {
//            echo "User has the permission";
            require_once "AdvancedSearchText.php";
        } else {
            header("Location:login.php");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
