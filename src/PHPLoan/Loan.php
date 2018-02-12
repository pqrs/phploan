<?php

namespace PHPLoan;

class Loan
{
    public static function helloworld()
    {
        return 'Hello World!';
    }

    /**
     * @desc    Calculates the monthly payments of a loan based on the APR and Term.
     *
     * @param    Float    $fLoanAmount      The loan amount.
     * @param    Float    $i                The annual interest rate.
     * @param    Integer  $iTerm            The length of the loan in months.
     *
     * @return   Float    $pmt              Monthly Payment
     */
    public static function calculateMonthlyPayments( $fLoanAmount , $i, $iTerm ) {

        $int = $i/1200;

        $int1 = 1 + $int;

        $r1 = pow($int1, $iTerm);

        $pmt = $fLoanAmount * ($int*$r1) / ($r1-1);

        return $pmt;

    }

}

