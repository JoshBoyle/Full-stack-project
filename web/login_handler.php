<?php
// login_handler.php
session_start();
require_once "UserDao.php";

$inputEmail = $_POST["email"];
$inputPassword = $_POST["password"];

$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/";
$dao = new UserDao();

try {
    $userData = $dao->getUserEmail($inputEmail);

    if ($userData) {
        $storedPassword = $userData['password'];
        $storedSalt = $userData['salt'];

        // Concatenate salt and entered password before hashing
        $hashedEnteredPassword = hash('sha256', $storedSalt . $inputPassword);
//        printPass($hashedEnteredPassword, $storedSalt, $password, );

        if ($storedPassword === $hashedEnteredPassword) {
            echo "they are the same<br>";
            echo "<br>stored         pw\t:" . $storedPassword;
            echo "<br>stored       salt\t:" . $storedSalt;
            echo "<br>input pw         \t:" . $inputPassword;
            echo "<br>salted input pw  \t:" . $hashedEnteredPassword;
        } else {
            echo "they are different???<br>";
            echo "<br>stored         pw:" . $storedPassword;
            echo "<br>stored       salt:" . $storedSalt;
            echo "<br>input pw         :" . $inputPassword;
            echo "<br>salted input pw  :" . $hashedEnteredPassword;
        }
//        if ($userData['email'] === $email && $storedPassword === $hashedEnteredPassword) {
        if ($userData['email'] === $inputEmail && $storedPassword === $hashedEnteredPassword) {
            $_SESSION["access_granted"] = true;
            $_SESSION["email_preset"] = $inputEmail;

            echo "<br>the user's permissions:" . $userData['access'];
            echo "<br> the userData array: <br>";
            echo '<pre>'; print_r($userData); echo '</pre>';

            header("location: index.php");

            printPass($hashedEnteredPassword, $storedSalt, $inputPassword, "access granted",$hashedEnteredPassword);
        } elseif (!preg_match($pattern, $inputEmail)) {
            printPass($hashedEnteredPassword, $storedSalt, $inputPassword, "preg_match",$hashedEnteredPassword);
            handleInvalid("Not a valid email");
        } elseif ($userData['email'] === $inputEmail && $storedPassword !== $hashedEnteredPassword) {
            printPass($hashedEnteredPassword, $storedSalt, $inputPassword, "invalid pass",$hashedEnteredPassword);
            handleInvalid("Invalid password");
        } else {
            printPass($hashedEnteredPassword, $storedSalt, $inputPassword, "email not regi",$hashedEnteredPassword);
            handleInvalid("Email is not registered");
        }
    } else { // userData is NUll
//        printPass($hashedEnteredPassword, $storedSalt, $password, "Invalid email and pass");
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

function printPass($hashedEnteredPassword, $storedSalt, $password, $message, $saltedInputPW) {
    echo $message;
    echo "<br>hashed pw:" . $hashedEnteredPassword;
    echo "<br>stored salt:" . $storedSalt;
    echo "<br>input pw:" . $password;
    echo "<br>salted input pw:" . $saltedInputPW;
}
?>
