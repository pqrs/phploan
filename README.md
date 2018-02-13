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
* Variables nomenclature*

$P    Principal (loan amount)
$r    Annual interest rate
$n    Number of payments (months)
$A    Monthly payment amount
```

*function calculateMonthlyPayment( $P , $r, $n )*

Calculates the amount of every monthly payment based on the loan principal, interest rate and number of payments.

*function calculatePrincipal( $n, $r, $A )*

Calculates the loan principal based on the number of payments, interest rate and payment amount.

*function calculateNumPayments( $P, $r, $A )*

Calculates the number of payments based on the principal, interest rate and payment amount.

*function getSchedule( $P, $r, $n )*

Returns an object with the loan payment schedule.

## Examples

You can find some uses for these functions in [tests folder](tests).

## Contributing

Contributions are very welcome!

## Credits

**Alvaro Piqueras** - [pqrs](https://github.com/pqrs)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

