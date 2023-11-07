<?php
session_start();

$market_value = (float)str_replace(',', '', $_POST["home_price"]);
$P = ($market_value - (float)str_replace(',', '', $_POST["down_payment"]));
$r = ((float)$_POST["interest_rate"])/ 100;
$t = (int)$_POST["loan_program"];
$n = 12;

$num = $P * ($r / $n) * pow((1 + $r / $n), ($n * $t));
$den = pow((1 + $r/$n), $n*$t)-1;
$_SESSION["total"] = $num / $den;
header("Location:AdvancedSearch.php");
