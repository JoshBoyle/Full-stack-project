<?php
// login_handler.php
session_start();

// TODO for josh@gmail.com and pikachu these need to be variables from sql table
// For simplification Lets pretend I got these login credentials from an SQL table.
if ("josh@gmail.com" == $_POST["email"] &&
    "pikachu" == $_POST["password"]) {
    $_SESSION["access_granted"] = true;
    header("Location:granted.php");

} else {
    $status = "Invalid username or password";
    $_SESSION["status"] = $status;
    $_SESSION["email_preset"] = $_POST["email"];
    $_SESSION["access_granted"] = false;

    header("Location:login.php");
}
?>