<?php

function echoRange(int $current, int $end):void {
    if ($current > $end) {
        echo $current . ', ';
        echoRange($current - 1, $end);
    }
    if ($current < $end) {
        echo $current . ', ';
        echoRange($current + 1, $end);
    }
    if ($current === $end) {
        echo $current . ', ';
    }
}

echoRange(1,100);
