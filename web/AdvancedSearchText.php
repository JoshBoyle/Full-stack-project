<?php
$home_price ="";
$down_payment ="";
$loan_program ="";
$interest_rate ="";
//session_start();
if (isset($_SESSION["email_preset"])) {
    $email = $_SESSION["email_preset"];
    $password = $_SESSION["password_preset"];
}
?>
<html>
<head>
    <title>AdvancedSearch</title>
    <link rel="stylesheet" type="text/css" href="advancedsearch.css">
    <?php include "head-tag.php" ?>
</head>
<body>
<?php include "header.php" ?>
<section class="advanced search">
    <h1>Mortgage Calculator</h1>

    <!-- First Form: Home Price, Down Payment, and Loan Program -->
    <form action="advancedsearch_handler.php" method="POST">
        <h2>Loan Information</h2>

        <label for="home_price">Home Price:</label>
        <input type="text" id="home_price" name="home_price" placeholder="$" value="<?php echo $home_price; ?>"/>

        <label for="down_payment">Down Payment:</label>
        <input type="text" id="down_payment" name="down_payment" placeholder="$" />

        <label for="loan_program">Loan Program:</label>
        <select id="loan_program" name="loan_program">
            <option value="30_year_fixed">30 Year Fixed</option>
            <option value="15_year_fixed">15 Year Fixed</option>
            <option value="5_year_arm">5 Year ARM</option>
        </select>

        <label for="interest_rate">Interest Rate:</label>
        <input type="text" id="interest_rate" name="interest_rate" placeholder="%" />
        <button type="submit">Calculate</button>

    </form>
</section>
<section id="output">
    <?php
    if (isset($_SESSION["total"])) {
        echo "<div id='total'>" .  $_SESSION["total"] . "</div>";
        unset($_SESSION["total"]);
    }
    ?>
<!--    <div id="login-error-msg-holder">-->
<!--        <p id="login-error-msg">Invalid email <span id="error-msg-second-line">and/or password</span></p>-->
<!--    </div>-->
</section>
</body>
<?php include "footer.php" ?>
</html>
