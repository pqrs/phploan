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

```
$result = $loan->calculateMonthlyPayment( 60000 , 9, 360 );
echo number_format($result, 2, ".", ",") . PHP_EOL;

482.77
```

**function calculatePrincipal( $n, $r, $A )**

Calculates the loan principal based on the number of payments, interest rate and payment amount.

```
$result = $loan->calculatePrincipal( 360, 9, 482.77357 );
echo number_format($result, 2, ".", ",") . PHP_EOL;

60,000.00
```

**function calculateNumPayments( $P, $r, $A )**

Calculates the number of payments based on the principal, interest rate and payment amount.

```
$result = $loan->calculateNumPayments( 60000, 9, 482.77357 );
echo $result . PHP_EOL;

360
```

**function getSchedule( $P, $r, $n )**

Returns an object with the loan payment schedule.

```
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

{::nomarkdown}
<table><tr><td>1</td><td>5,247.09</td><td>450.00</td><td>4,797.09</td><td>55,202.91</td></tr><tr><td>2</td><td>5,247.09</td><td>414.02</td><td>4,833.07</td><td>50,369.84</td></tr><tr><td>3</td><td>5,247.09</td><td>377.77</td><td>4,869.31</td><td>45,500.53</td></tr><tr><td>4</td><td>5,247.09</td><td>341.25</td><td>4,905.83</td><td>40,594.70</td></tr><tr><td>5</td><td>5,247.09</td><td>304.46</td><td>4,942.63</td><td>35,652.07</td></tr><tr><td>6</td><td>5,247.09</td><td>267.39</td><td>4,979.70</td><td>30,672.37</td></tr><tr><td>7</td><td>5,247.09</td><td>230.04</td><td>5,017.05</td><td>25,655.32</td></tr><tr><td>8</td><td>5,247.09</td><td>192.41</td><td>5,054.67</td><td>20,600.65</td></tr><tr><td>9</td><td>5,247.09</td><td>154.50</td><td>5,092.58</td><td>15,508.07</td></tr><tr><td>10</td><td>5,247.09</td><td>116.31</td><td>5,130.78</td><td>10,377.29</td></tr><tr><td>11</td><td>5,247.09</td><td>77.83</td><td>5,169.26</td><td>5,208.03</td></tr><tr><td>12</td><td>5,247.09</td><td>39.06</td><td>5,208.03</td><td>0.00</td></tr></table>
{:/}
```

## Examples

You can find some uses for these functions in [tests folder](tests).

## Contributing

Contributions are very welcome!

## Credits

**Alvaro Piqueras** - [pqrs](https://github.com/pqrs)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

