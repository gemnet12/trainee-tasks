<?php
//A function that removes an element from an array by a key and restores the order of elements in that array.
function deleteByIndex(array &$arr, int $position):void {
    array_splice($arr, $position, 1);
    $normalizedArr = [];
    foreach($arr as $value) {
        array_push($normalizedArr, $value);
    }
    $arr = $normalizedArr;
}

//$arr = [1, 2, 3, 4, 5];
//var_dump($arr);
//deleteByIndex($arr, 3);
//var_dump($arr);