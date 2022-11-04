<?php
//Create a simple 'birthday countdown' script, the script counts the number of days left until the person’s birthday. Your script should determine the number of days based on the current date.
//Acceptable date format is ’DD-MM-YYYY’

function birthdayCountdown(string $date):string {
    $currentDate = new DateTime();
    $targetDate = new DateTime($date);
    return $targetDate->diff($currentDate)->format('%a');
}
