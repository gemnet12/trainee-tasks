<?php
//Write a PHP function to add the digits by absolute of an integer repeatedly until the result has a single digit.

function repeatedSumOfDigits(int $number):int {
    $str = (string) $number;
    while (strlen($str) > 1) {
        $arr = str_split($str);
        $sumedNumber = array_reduce($arr, fn($current, $next)=> $current += $next);
        $str = (string) $sumedNumber;
    }
    return (int) $str;
}

