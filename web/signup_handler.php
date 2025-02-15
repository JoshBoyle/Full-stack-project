<?php
// signup_handler.php
session_start();
require_once "UserDao.php";

// Function to sanitize input
function sanitize_input($input)
{
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

// Function to generate a random salt
function generateSalt($length = 16)
{
    return bin2hex(random_bytes($length));
}

// Function to hash the password with the salt using SHA-256
function hashPassword($password, $salt)
{
    return hash('sha256', $password . $salt);
}

$email = sanitize_input($_POST["email"]);
$username = sanitize_input($_POST["username"]);
$password = sanitize_input($_POST["password"]);
$confirm_password = sanitize_input($_POST["confirm-pass"]);
$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

if (preg_match($pattern, $email) && $password == $confirm_password) {
    // Generate a random salt for each user
    $salt = generateSalt();

    // Hash the password with the salt using SHA-256
//    $hashedPassword = hashPassword($password, $salt);
    $hashedPassword = hash('sha256', $salt . $password);

    if (isset($_POST["signUpButton"])) {
        $access = 'member';
        $signUpDate = date("Y-m-d H:i:s");

        $daoCheck = new UserDao();
        $userData = $daoCheck->getUserEmail($email);
        if (!$userData) {
            try {
                $dao= new UserDao();
                $dao->saveUser($email, $username, $hashedPassword, $salt, $access, $signUpDate);
                $_SESSION["status"] = "Success!";
                $_SESSION["access_granted"] = true;
            } catch (Exception $e) {
                $_SESSION["status"] = "Exception inserting in database";
                var_dump($e);
                die;
            }

        } else {
            $_SESSION["status"] = "Email already exists";
            $_SESSION["access_granted"] = false;
        }
    }
} elseif (!preg_match($pattern, $email)) {
    $_SESSION["status"] = "Not a valid email";
    $_SESSION["access_granted"] = false;
} elseif ($password != $confirm_password) {
    $_SESSION["status"] = "Passwords do not match";
    $_SESSION["access_granted"] = false;
} else {
    $_SESSION["status"] = "Invalid input";
    $_SESSION["access_granted"] = false;
}

if (!$_SESSION["access_granted"]) {
// Store relevant data in session for displaying in the signup.php page
//    echo "status" . $status;
    echo $_SESSION["status"];
    $_SESSION["email_preset"] = $email;
    $_SESSION["username_preset"] = $username;
    $_SESSION["password_preset"] = $password;
    $_SESSION["confirm_password_preset"] = $confirm_password;
    header("Location: signup.php");
} else {
    $_SESSION["email_preset"] = $email;
    $_SESSION["password_preset"] = $password;
    header("Location: index.php");
}

?>
