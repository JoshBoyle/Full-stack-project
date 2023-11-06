<?php
//require_once "User.php";
require_once "UserDao.php";
// signup_handler.php
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm-pass"];
$pattern = "/^[a-za-z0-9._%+-]+@[a-za-z0-9.-]+\\.[a-za-z]{2,}$/";

if (preg_match($pattern, $email)
    && $password == $confirm_password) {
//    require_once "UserDao.php";
    if (isset($_POST["signUpButton"])) {
//        $newUser = new User($email, $password);

        echo "$email, $password";

        // temporaries for testing
        $access = 'member';
        $signUpDate = date("Y-m-d H:i:s");
        //

        $dao = new UserDao();
        try {
//            $dao->saveUser($email, $password);
            $dao->saveUser($email, $username, $password, $access, $signUpDate);
        } catch (Exception $e) {
            var_dump($e);
            die;
        }
    }
    $_SESSION["access_granted"] = true;
    header("Location:index.php");
} elseif (!preg_match($pattern, $email)) {

} elseif ($password != $confirm_password)  {
    $status = "Passwords do not match";
    $_SESSION["status"] = $status;
    $_SESSION["email_preset"] = $email;
    $_SESSION["username_preset"] = $username;
    $_SESSION["password_preset"] = $password;
    $_SESSION["confirm_password_preset"] = $confirm_password;
    $_SESSION["access_granted"] = false;
    header("Location:signup.php");
} else {
    $status = "Not a valid email";
    $_SESSION["status"] = $status;
    $_SESSION["email_preset"] = $email;
    $_SESSION["username_preset"] = $username;
    $_SESSION["password_preset"] = $password;
    $_SESSION["confirm_password_preset"] = $confirm_password;
    $_SESSION["access_granted"] = false;
    header("Location:signup.php");
}
