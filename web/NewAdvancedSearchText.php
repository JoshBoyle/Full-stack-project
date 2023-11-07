<?php
$home_price ="";
$down_payment ="";
$loan_program ="";
$interest_rate ="";
$property_tax = "";
$home_insurance = "";
$hoa_dues = "";
//session_start();
$session_keys = [
    "home_price_preset" => "home_price",
    "down_payment_preset" => "down_payment",
    "interest_rate_preset" => "interest_rate",
    "loan_program_preset" => "loan_program",
    "property_tax_preset" => "property_tax",
    "home_insurance_preset" => "home_insurance",
    "hoa_dues_preset" => "hoa_dues"
];

foreach ($session_keys as $session_key => $variable_name) {
    if (isset($_SESSION[$session_key])) {
        ${$variable_name} = $_SESSION[$session_key];
    }
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
    <form action="newadvancedsearch_handler.php" method="POST">
        <h2>Loan Information</h2>

        <label for="home_price">Home Price:</label>
        <input type="text" id="home_price" name="home_price" placeholder="$" value="<?php echo $home_price; ?>" required/>

        <label for="down_payment">Down Payment:</label>
        <input type="text" id="down_payment" name="down_payment" placeholder="$" value="<?php echo $down_payment; ?>" required/>

        <label for="loan_program">Loan Program:</label>
        <select id="loan_program" name="loan_program">
            <option value="30_year_fixed" <?php if ($loan_program === "30_year_fixed") echo "selected"; ?>>30 Year Fixed</option>
            <option value="15_year_fixed" <?php if ($loan_program === "15_year_fixed") echo "selected"; ?>>15 Year Fixed</option>
            <option value="5_year_arm" <?php if ($loan_program === "5_year_arm") echo "selected"; ?>>5 Year ARM</option>
        </select>

        <label for="interest_rate">Interest Rate:</label>
        <input type="text" id="interest_rate" name="interest_rate" placeholder="%" value="<?php echo $interest_rate; ?>" required/>

        <label for="property_tax">Property Tax:</label>
        <input type="text" id="property_tax" name="property_tax" placeholder="%" value="<?php echo $property_tax; ?>" required/>

        <label for="home_insurance">Home Insurance:</label>
        <input type="text" id="home_insurance" name="home_insurance" placeholder="$ /year" value="<?php echo $home_insurance; ?>" required />

        <label for="hoa_dues">HOA dues:</label>
        <input type="text" id="hoa_dues" name="hoa_dues" placeholder="$ /month" value="<?php echo $hoa_dues; ?>" required/>
        <button type="submit">Calculate</button>

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
<?php //include "footer.php" ?>
</html>
