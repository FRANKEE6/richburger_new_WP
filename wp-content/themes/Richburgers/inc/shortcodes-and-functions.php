<?php

/**
 *  Funkcie
 */

// Úprava telefónneho čísla na správny tvar
function filter_telephone_number($number)
{
    $number = filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    $number = str_replace(array('+', '-'), '', $number);
    if ($number[0] == '0') {
        $number = ltrim($number, $number[0]);
    }
    $number = '+421' . $number;

    return $number;
}
