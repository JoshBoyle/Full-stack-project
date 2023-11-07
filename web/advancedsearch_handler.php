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

$x = $r / $n;
$y = pow((1 + $r / $n), ($n * $t));

echo "<br />";
echo 'P: ' ;
echo $P;
echo "<br />";
echo 'x: ';
echo $x;
echo "<br />";
echo 'y: ';
echo $y;
echo "<br />";
echo "den: ";
$den = pow((1 + $r/$n), $n*$t)-1;
echo $den;
echo "<br />";
echo "num: ";
$num = $P * $x * $y;
echo $num;
echo "newNum:";
//$num = $P * $x * $y;
$newnum = $P * ($r / $n) * pow((1 + $r / $n), ($n * $t));
echo $newnum;
//$den = pow((1 + $r/$n), $n*$t)-1;

//$payment =  $num / $den;
//echo $payment;
//
