<?php
//Write PHP functions to test whether a number is greater than 30, 20 or 10 using a if conditions, switch and ternary operator.

function ifCase(int $inputNumber):string {
    if ($inputNumber > 30) {
        return 'More than 30';
    } elseif ($inputNumber > 20) {
        return 'More than 20';
    } elseif ($inputNumber > 10) {
        return 'More than 10';
    } else {
        return 'Equal or less than 10';
    }
}

function switchCase(int $inputNumber):string {
    switch (true) {
        case $inputNumber > 30:
            return 'More than 30';
        case $inputNumber > 20:
            return 'More than 20';
        case $inputNumber > 10:
            return 'More than 10';
        default:
            return 'Equal or less than 10';
    }
}

function ternaryCase(int $inputNumber):string {
    return $inputNumber > 30 ? 'More than 30' 
        : ($inputNumber > 20 ? 'More than 20' 
        : ($inputNumber > 10 ? 'More than 10' 
        : ('Equal or less than 10'))); 
}
