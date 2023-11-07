<?php
session_start();
$email = "";
$password = "";
if (isset($_SESSION["email_preset"])) {
    $username = $_SESSION["username_preset"];
    $email = $_SESSION["email_preset"];
    $password = $_SESSION["password_preset"];
    $confirmPassword = $_SESSION["password_preset"];
}
require_once "UserDao.php";
$dao=new UserDao();
?>

<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup-page.css">
</head>
<body>
    <div id="signup-container">
        <h2>Sign Up</h2>
        <?php
        if (isset($_SESSION["status"])) {
            echo "<div id='status'>" .  $_SESSION["status"] . "</div>";
            unset($_SESSION["status"]);
        }
        ?>
<!--        <div id="login-error-msg-holder">-->
<!--            <p id="login-error-msg">Invalid email <span id="error-msg-second-line">and/or password</span></p>-->
<!--        </div>-->
        <form id="signup-form" action="signup_handler.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $email; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-pass">Confirm Password:</label>
            <input type="password" id="confirm-pass" name="confirm-pass" required>

            <button type="submit" name="signUpButton" value="Submit">Sign Up</button>
        </form>
    </div>
</body>
</html>

