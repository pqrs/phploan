# PHPLoan

Provides some functions to:

* Calculate the amount of every monthly payment based on the loan principal, interest rate and number of payments.
* Calculate the loan principal based on the number of payments, interest rate and payment amount.
* Calculate the number of payments based on the principal, interest rate and payment amount.

Also provides a method to return the loan payment schedule.

## Installation

```
git clone https://github.com/pqrs/phploan.git
```

## Usage

```
Variables nomenclature

$P    Principal (loan amount)
$r    Annual interest rate
$n    Number of payments (months)
$A    Monthly payment amount
```

**function calculateMonthlyPayment( $P, $r, $n )**

Calculates the amount of every monthly payment based on the loan principal, interest rate and number of payments.

``` php
$loan = new Loan;

$result = $loan->calculateMonthlyPayment( 60000 , 9, 360 );
echo number_format($result, 2, ".", ",") . PHP_EOL;

// Prints 482.77
```



**function calculatePrincipal( $n, $r, $A )**

Calculates the loan principal based on the number of payments, interest rate and payment amount.

``` php
$loan = new Loan;

$result = $loan->calculatePrincipal( 360, 9, 482.77357 );
echo number_format($result, 2, ".", ",") . PHP_EOL;

// Prints 60,000.00

```



**function calculateNumPayments( $P, $r, $A )**

Calculates the number of payments based on the principal, interest rate and payment amount.

``` php
$loan = new Loan;

$result = $loan->calculateNumPayments( 60000, 9, 482.77357 );
echo $result . PHP_EOL;

// Prints 360
```

**function getSchedule( $P, $r, $n )**

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

// Prints html table (see test.php in tests folder)
```

## Examples

You can find some uses for these functions in [tests folder](tests).

## Contributing

Contributions are very welcome!

## Credits

**Alvaro Piqueras** - [pqrs](https://github.com/pqrs)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

