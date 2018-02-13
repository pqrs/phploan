# PHPLoan

Provides some functions to:

* Calculate the amount of every monthly payment based on the loan principal, interest rate and number of payments.
* Calculate the loan principal based on the number of payments, interest rate and payment amount.
* Calculate the number of payments based on the principal, interest rate and payment amount.

Also provides a method to return the loan payment schedule.

## Installation

```
composer require pqrs/phploan=dev-master
```

Alternatively, add the dependency directly to your composer.json file:

```
"require": {
    "pqrs/phploan": "dev-master"
}
```

Then add to your php code:

``` php
require_once __DIR__ . '/vendor/autoload.php';   // Autoload files using Composer autoload

use PHPLoan\Loan;
```

## Usage

```
Variables nomenclature

$P    Principal (loan amount)
$r    Annual interest rate
$n    Number of payments (months)
$A    Monthly payment amount
```

### method calculateMonthlyPayment( $P, $r, $n )

Calculates the amount of every monthly payment based on the loan principal, interest rate and number of payments.

``` php
$loan = new Loan;

$result = $loan->calculateMonthlyPayment( 60000 , 9, 360 );
echo number_format($result, 2, ".", ",") . PHP_EOL;

// Prints 482.77
```

### method calculatePrincipal( $n, $r, $A )

Calculates the loan principal based on the number of payments, interest rate and payment amount.

``` php
$loan = new Loan;

$result = $loan->calculatePrincipal( 360, 9, 482.77357 );
echo number_format($result, 2, ".", ",") . PHP_EOL;

// Prints 60,000.00

```


### method calculateNumPayments( $P, $r, $A )

Calculates the number of payments based on the principal, interest rate and payment amount.

``` php
$loan = new Loan;

$result = $loan->calculateNumPayments( 60000, 9, 482.77357 );
echo $result . PHP_EOL;

// Prints 360
```

### method getSchedule( $P, $r, $n )

Returns an object with the loan payment schedule.

``` php
$loan = new Loan;

$schedule = $loan->getSchedule( 60000, 9, 12 );

echo "<table>";

foreach ($schedule as $key) {
    echo "<tr>";
    echo "<td>" . $key->numpayment  . "</td>";
    echo "<td>" . $key->payment     . "</td>";
    echo "<td>" . $key->interest    . "</td>";
    echo "<td>" . $key->principal   . "</td>";
    echo "<td>" . $key->balance     . "</td>";
    echo "</tr>";
}

echo "</table>";

// Prints html table:
// 1   5,247.09    450.00  4,797.09    55,202.91
// 2   5,247.09    414.02  4,833.07    50,369.84
// 3   5,247.09    377.77  4,869.31    45,500.53
// 4   5,247.09    341.25  4,905.83    40,594.70
// 5   5,247.09    304.46  4,942.63    35,652.07
// 6   5,247.09    267.39  4,979.70    30,672.37
// 7   5,247.09    230.04  5,017.05    25,655.32
// 8   5,247.09    192.41  5,054.67    20,600.65
// 9   5,247.09    154.50  5,092.58    15,508.07
// 10  5,247.09    116.31  5,130.78    10,377.29
// 11  5,247.09    77.83   5,169.26    5,208.03
// 12  5,247.09    39.06   5,208.03    0.00
```

## Examples

You can find some uses for these functions in [tests folder](tests).


## Prerequisites

PHP > 5.6

Not tested, but if you want to use phploan in 5.x PHP versions lower than 5.6, probably the only thing you have to change is the use of exponential expressions in [Loan.php](src/PHPLoan/Loan.php). Change ** for the function **pow()**:

``` php
// In method calculateMonthlyPayment( $P , $r, $n )

    $A = $P * (( $i * pow((1 + $i), $n) ) / ( pow((1 + $i), $n) - 1 ));

// In method calculatePrincipal( $n, $r, $A )

    $P = $A * ( pow((1 + $i), $n) - 1 ) / ( $i * (pow((1 + $i), $n) ));

```



## Contributing

Contributions are very welcome!

## Credits

**Copyright © 2018 Alvaro Piqueras** - [pqrs](https://github.com/pqrs)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

