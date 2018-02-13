<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define( "TIMEZONE",     "Europe/Madrid" );			// Your timezone

date_default_timezone_set(TIMEZONE);

require_once __DIR__ . '/../vendor/autoload.php'; 	// Autoload files using Composer autoload

use PHPLoan\Loan;

$loan = new Loan;

// function calculateMonthlyPayment( $P , $r, $n )
$result = $loan->calculateMonthlyPayment( 60000 , 9, 360 );
echo number_format($result, 2, ".", ",") . PHP_EOL;


// function calulatePrincipal( $n, $r, $A )
$result = $loan->calculatePrincipal( 360, 9, 482.77357 );
echo number_format($result, 2, ".", ",") . PHP_EOL;


// function calulateNumPayments( $P, $r, $A )
$result = $loan->calculateNumPayments( 60000, 9, 482.77357 );
echo $result . PHP_EOL;


// function getSchedule( $P, $r, $n )
$schedule = $loan->getSchedule( 60000, 9, 12 );

echo "<table>";

foreach ($schedule as $value) {
	echo "<tr>";
 	echo "<td>" . $value->numpayment  . "</td>";
 	echo "<td>" . $value->payment     . "</td>";
 	echo "<td>" . $value->interest    . "</td>";
 	echo "<td>" . $value->principal   . "</td>";
 	echo "<td>" . $value->balance     . "</td>";
 	echo "</tr>";
}

echo "</table>";






