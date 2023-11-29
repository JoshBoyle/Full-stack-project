<?php
$home_price ="";
$down_payment ="";
$loan_program ="";
$interest_rate ="";
//session_start();
if (isset($_SESSION["home_price_preset"]) or
    isset($_SESSION["down_payment_preset"]) or
    isset($_SESSION["interest_rate_preset"]) or
    isset($_SESSION["loan_program_preset"])) {

    $home_price = $_SESSION["home_price_preset"];
    $down_payment = $_SESSION["down_payment_preset"];
    $interest_rate = $_SESSION["interest_rate_preset"];
    $loan_program = $_SESSION["loan_program_preset"];
}
?>
<html>
<head>
    <script src="jquery-3.7.1.slim.min.js"></script>
    <script src="validation.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" type="text/css" href="advancedsearch.css">
    <title>AdvancedSearch</title>
    <?php include "head-tag.php" ?>
</head>
<body>


<?php include "header.php" ?>
<section class="advanced search">
    <h1>Mortgage Calculator</h1>
    <!-- First Form: Home Price, Down Payment, and Loan Program -->
    <form action="advancedsearch_handler.php" method="POST">
        <h2>Loan Information</h2>

        <?php
        if (isset($_SESSION["status"])) {
            echo "<div id='status'>" .  $_SESSION["status"] . "</div>";
            unset($_SESSION["status"]);
        }
        ?>
        <label for="home_price">Home Price:</label>
        <input type="text" id="home_price" name="home_price" placeholder="$" value="<?php echo $home_price; ?>" />

        <label for="down_payment">Down Payment:</label>
        <input type="text" id="down_payment" name="down_payment" placeholder="$" value="<?php echo $down_payment; ?>" />

        <label for="loan_program">Loan Program:</label>
        <select id="loan_program" name="loan_program">
            <option value="30_year_fixed" <?php if ($loan_program === "30_year_fixed") echo "selected"; ?>>30 Year Fixed</option>
            <option value="15_year_fixed" <?php if ($loan_program === "15_year_fixed") echo "selected"; ?>>15 Year Fixed</option>
            <option value="5_year_arm" <?php if ($loan_program === "5_year_arm") echo "selected"; ?>>5 Year ARM</option>
        </select>

        <label for="interest_rate">Interest Rate:</label>
        <input type="text" id="interest_rate" name="interest_rate" placeholder="%" value="<?php echo $interest_rate; ?>" />
        <button id="calculateBtn" type="submit">Calculate</button>

    </form>
</section>
<section id="output">
    <h2>Output</h2>
    <?php
    if (isset($_SESSION["total"])) {
        echo "<div id='total'> $" .  round($_SESSION["total"], 2) . " per month </div>";
        unset($_SESSION["total"]);
    }
    ?>
</section>
</body>
<?php include "footer.php" ?>
</html>
