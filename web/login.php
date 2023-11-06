<?php
// login.php

session_start();
$email = "";
$password = "";
if (isset($_SESSION["email_preset"])) {
    $email = $_SESSION["email_preset"];
    $password = $_SESSION["password_preset"];
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="login-page.css">
  <script defer src="login-page.js"></script>
</head>

<body>
  <main id="main-holder">
    <h1 id="login-header">Login</h1>
      <?php
      if (isset($_SESSION["status"])) {
          echo "<div id='status'>" .  $_SESSION["status"] . "</div>";
          unset($_SESSION["status"]);
      }
      ?>
    <div id="login-error-msg-holder">
      <p id="login-error-msg">Invalid email <span id="error-msg-second-line">and/or password</span></p>
    </div>

    <form action="login_handler.php" method="POST">
        <div id="login-form">
            <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" class="login-form-field" />
            <input type="password" name="password"  placeholder="Password" id="password" value="<?php echo $password; ?>" class="login-form-field"/>
            <input type="submit" name="submit" id="login-form-submit" value="Login"/>
        </div>
    </form>
      <a href="signup.php">SignUp</a>
  </main>
</body>
<?php include "footer.php" ?>
</html>