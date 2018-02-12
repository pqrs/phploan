<?php

namespace PHPLoan;

class Schedule
{
    public $numpayment;
    public $payment;
    public $interest;
    public $principal;
    public $balance;
}


class Loan
{
    /**
     * @desc    Calculates the amount of every monthly payment based on the loan
     *          principal, interest rate and number of payments.
     *
     * @param    Float    $P    Principal (loan amount)
     * @param    Float    $r    Annual interest rate
     * @param    Integer  $n    Number of payments (months)
     *
     * @return   Float    $A    Monthly payment amount
     *
     *          (i * (1 + i)) ** n)
     * A = P * ---------------------
     *           (1 + i) ** n - 1
     *
     */
    public static function calculateMonthlyPayment( $P , $r, $n )
    {

        $i = $r / 1200;     // Monthly interest rate

        $A = $P * (( $i * (1 + $i) ** $n ) / ( (1 + $i) ** $n - 1 ));

        return $A;

    }

    /**
     * @desc    Calculates the loan principal based on the number of payments,
     *          interest rate and payment amount.
     *
     * @param    Integer  $n    Number of payments (months)
     * @param    Float    $r    Annual interest rate
     * @param    Float    $A    Monthly payment amount
     *
     * @return   Float    $P    Loan principal
     *
     *          ((1 + i) ** n) - 1
     * P = A * --------------------
     *          i * ((1 + i) ** n)
     *
     */
    public static function calculatePrincipal( $n, $r, $A )
    {

        $i = $r / 1200;     // Monthly interest rate

        $P = $A * ( (1 + $i) ** $n - 1 ) / ( $i * ((1 + $i) ** $n ));

        return $P;

    }

    /**
     * @desc    Calculates the number of payments based on the principal,
     *          interest rate and payment amount.
     *
     * @param    Integer  $P    Principal (loan amount)
     * @param    Float    $r    Annual interest rate
     * @param    Float    $A    Monthly payment amount
     *
     * @return   Float    $n    Number of monthly payments
     *
     *      log(1 - i * P/A)
     * n = ------------------
     *         log(1 + i)
     *
     */
    public static function calculateNumPayments( $P, $r, $A )
    {

        $i = $r / 1200;     // Monthly interest rate

        $n = (Int)abs(log(1 - $i * $P/$A) / log(1+$i));

        return $n;

    }

    /**
     * @desc    Returns the loan payment schedule
     *
     * @param    Float    $P        Principal (loan amount)
     * @param    Float    $r        Annual interest rate
     * @param    Integer  $n        Number of payments (months)
     *
     * @return   Object   $output
     *
     *                    $output->numpayment   Payment order number
     *                    $output->payment      Monthly payment amount
     *                    $output->interest     Monthly interests amount |____ sums $output->payment
     *                    $output->principal    Monthly principal amount |
     *                    $output->balance      Pending capital
     *
     */
    public static function getSchedule( $P, $r, $n )
    {

        // Monthly payment amount
        $A = Loan::calculateMonthlyPayment( $P , $r, $n );

        for ($i=1; $i <= $n ; $i++) {

            // Interest amount on outstanding balance
            $interest = $P * $r/1200;

            // Portion of payment that amortizes capital
            $principal = $A - $interest;

            $P = $P - $principal;

            $output[$i] = new Schedule;

            $output[$i]->numpayment     = $i;
            $output[$i]->payment        = number_format( $A,         2, ".", "," );
            $output[$i]->interest       = number_format( $interest,  2, ".", "," );
            $output[$i]->principal      = number_format( $principal, 2, ".", "," );
            $output[$i]->balance        = number_format( $P,         2, ".", "," );

        }

        return $output;
    }

}

