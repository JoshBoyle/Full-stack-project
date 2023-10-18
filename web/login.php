<?php
// login.php

session_start();

if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]) {
    header("Location:granted.php");
}

$email = "";
if (isset($_SESSION["email_preset"])) {
    $email = $_SESSION["email_preset"];
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

//TODO need regex to check for valid password
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
      <p id="login-error-msg">Invalid username <span id="error-msg-second-line">and/or password</span></p>
    </div>

<!--      class="login-form-field" placeholder="Username">-->
<!--      class="login-form-field" placeholder="Password">-->
<!--    <form id="login-form" method="post">-->
    <form action="login_handler.php" method="POST">
        <div id="login-form">
            <input type="text" name="email" id="email" placeholder="Username" value="<?php echo $email; ?>" class="login-form-field" />
            <input type="password" name="password"  placeholder="Password" id="password" value="" class="login-form-field"/>
            <input type="submit" name="submit" id="login-form-submit" value="Login"/>
        </div>

<!--        class="login-form-field" placeholder="Password">-->
<!--        <div>-->
<!--            <label for="email">Email</label>-->
<!--            <input type="text" name="email" id="email" value="--><?php //echo $email; ?><!--"/>-->
<!--        </div>-->
<!--        <div>-->
<!--            <label for="password">Password</label>-->
<!--            <input type="password" name="password" id="password" value=""/>-->
<!--        </div>-->
<!--        <div>-->
<!--            <input type="submit" name="submit" id="login-form-submit" value="Login"/>-->
<!--        </div>-->
<!--      <input type="text" name="username" id="username-field" class="login-form-field" placeholder="Username">-->
<!--      <input type="password" name="password" id="password-field" class="login-form-field" placeholder="Password">-->
<!--      <input type="submit" value="Login" id="login-form-submit">-->
    </form>
  </main>
</body>
<?php include "footer.php" ?>
</html>