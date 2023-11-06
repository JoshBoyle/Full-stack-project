<?php
session_start();


$market_value = (float)str_replace(',', '', $_POST["home_price"]);
$P = ($market_value - (float)str_replace(',', '', $_POST["down_payment"]));
$r = ((float)$_POST["interest_rate"]);
$t = (int)$_POST["loan_program"];
$n = 12;

echo $market_value;
echo "<br />";
echo $P;
echo "<br />";
echo $r;
echo "<br />";
echo $t;
echo "<br />";
echo $n;
echo "<br />";

//$num = $P * ($r / $n) * pow((1 + $r / $n), ($n * $t));
//$den = pow((1 + $r/$n), $n*$t)-1;
//$payment =  $num / $den;

