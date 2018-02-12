<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define( "TIMEZONE",     "Europe/Madrid" );			// Your timezone

date_default_timezone_set(TIMEZONE);

require_once __DIR__ . '/../vendor/autoload.php'; 	// Autoload files using Composer autoload

use PHPLoan\Loan;

echo Loan::calculateMonthlyPayments( 60000, 9, 360 ) . PHP_EOL;