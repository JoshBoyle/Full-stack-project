<?php
session_start();

$_SESSION["home_price_preset"] = $_POST["home_price"];
$_SESSION["down_payment_preset"] = $_POST["down_payment"];
$_SESSION["interest_rate_preset"] = $_POST["interest_rate"];
$_SESSION["loan_program_preset"] = $_POST["loan_program"];

$market_value = (float)str_replace(',', '', $_POST["home_price"]);
$P = ($market_value - (float)str_replace(',', '', $_POST["down_payment"]));
$r = ((float)$_POST["interest_rate"])/ 100;
$t = (int)$_POST["loan_program"];
$n = 12;

$num = $P * ($r / $n) * pow((1 + $r / $n), ($n * $t));
$den = pow((1 + $r/$n), $n*$t)-1;
if (isset($_POST["property_tax"])) {
    $prop_tax = (float)$_POST["home_price"] * ((float)$_POST["property_tax"])/100;
    $monthly_ins = (float)$_POST["home_insurance"];
    $_SESSION["total"] = ($num / $den) + ($prop_tax + $monthly_ins + $_POST["hoa_dues"]);
} else {
    $_SESSION["total"] = $num / $den;
}
header("Location:AdvancedSearch.php");
