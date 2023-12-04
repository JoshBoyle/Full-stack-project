<?php

session_start();

// Regular expression for money (e.g., $1,000.00)
$money_pattern = '/^\$?\d+(?:,\d{3})*(?:\.\d{2})?$/';

// Function to sanitize input
function sanitize_input($input): string
{
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

// Function to convert money format to a numeric value
function convertMoneyToNumeric($moneyString): float
{
    $moneyString = preg_replace('/[^\d.]/', '', $moneyString);
    return (float)$moneyString;
}

// Function to validate and sanitize money format
function validate_money($input, $pattern): false|string
{
    $sanitized_input = sanitize_input($input);
    return preg_match($pattern, $sanitized_input) ? $sanitized_input : false;
}

if (
    isset($_POST["home_price"]) && ($home_price = validate_money($_POST["home_price"], $money_pattern)) !== false &&
    isset($_POST["down_payment"]) && ($down_payment = validate_money($_POST["down_payment"], $money_pattern)) !== false &&
    isset($_POST["interest_rate"]) && is_numeric($_POST["interest_rate"]) &&
    isset($_POST["loan_program"])
) {
    // All the required form fields are present
    $_SESSION["home_price_preset"] = $home_price;
    $_SESSION["down_payment_preset"] = $down_payment;
    $_SESSION["interest_rate_preset"] = sanitize_input($_POST["interest_rate"]);
    $_SESSION["loan_program_preset"] = sanitize_input($_POST["loan_program"]);

    // Convert money values to numeric
    $market_value = convertMoneyToNumeric($home_price);
    $P = $market_value - convertMoneyToNumeric($down_payment);

    // Calculations...
    $r = ((float)$_SESSION["interest_rate_preset"]) / 100;
    $t = (int)$_SESSION["loan_program_preset"];
    $n = 12;

    $numerator = $P * ($r / $n) * pow((1 + $r / $n), ($n * $t));
    $denominator = pow((1 + $r / $n), $n * $t) - 1;

    if (isset($_POST["property_tax"])) {
        $_SESSION["property_tax_preset"] = sanitize_input($_POST["property_tax"]);
        $_SESSION["home_insurance_preset"] = sanitize_input($_POST["home_insurance"]);
        $_SESSION["hoa_dues_preset"] = sanitize_input($_POST["hoa_dues"]);
        $prop_tax = (float)$home_price * ((float)$_SESSION["property_tax_preset"]) / 100;
        $monthly_ins = (float)$_SESSION["home_insurance_preset"];
        $_SESSION["total"] = ($numerator / $denominator) + ($prop_tax + $monthly_ins + $_SESSION["hoa_dues_preset"]);
    } else {
        $_SESSION["total"] = $numerator / $denominator;
    }
} else {
    $_SESSION["status"] = "Invalid input. Please enter valid numerical values.";
}

?>
