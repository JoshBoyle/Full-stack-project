<?php
/*
// signup.php

// TODO need regex to check for valid password
session_start();

if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]) {
    header("Location:granted.php");
}
// TODO connect this needs the email from the forms find a way to test it
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
  <link rel="stylesheet" href="signup-page.css">
  <script defer src="signup-page.js"></script>
</head>

<body>
  <main id="main-holder">
    <h1 id="signup-header">Login</h1>
      <?php
      if (isset($_SESSION["status"])) {
          echo "<div id='status'>" .  $_SESSION["status"] . "</div>";
          unset($_SESSION["status"]);
      }
      ?>
    <div id="signup-error-msg-holder">
      <p id="signup-error-msg">Invalid email <span id="error-msg-second-line">and/or password</span></p>
    </div>

    <form action="signup_handler.php" method="POST">
        <div id="signup-form">
            <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" class="signup-form-field" />
            <input type="password" name="password"  placeholder="Password" id="password" value="<?php echo $password; ?>" class="signup-form-field"/>
            <input type="password" name="password"  placeholder="Password" id="password" value="<?php echo $password; ?>" class="signup-form-field"/>
            <input type="submit" name="submit" id="signup-form-submit" value="Login"/>
        </div>
    </form>
  </main>
</body>
<?php include "footer.php" ?>
</html>
*/
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
body {
    font-family: Arial, sans-serif;
            background-color: #f6f8fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #signup-container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        #signup-container h2 {
            color: #333;
        }

        #signup-form {
            text-align: left;
            margin: 20px;
        }

        #signup-form label {
            display: block;
            margin-top: 10px;
        }

        #signup-form input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #signup-form button {
            background-color: #2ea44f;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="signup-container">
        <h2>Sign Up</h2>
        <form id="signup-form" action="#" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="password">Confirm Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>

