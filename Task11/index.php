<?php
//A program that generates a 10x10 field and finds the shortest path from point A to point B.

include_once 'classes/Program.php';

$program = new Program(); //Runs programm

//Result is logged in file_loggs/logs.txt
//Short description
//
//  * depicts route
//
//  First, we take matrix where X are obstacles
//      0  X  0  0  A
//      0  0  X  0  0
//      0  B  0  0  0
//      0  0  X  0  0
//      0  0  X  0  0
//  Second, we build map of values that depict the weight(the minimal amount of steps to approach to each available element)
//      8  X  2  1  A
//      7  6  X  2  1
//      6  B  4  3  2
//      7  6  X  4  3
//      8  7  X  5  4
//  Third it building reverse path from B to A step by step choosing the less closest value;
//      0  X  2  1  A
//      0  0  X  2  *
//      0  B  *  *  *
//      0  0  X  4  3
//      0  0  X  5  4
//
//
//
//
//