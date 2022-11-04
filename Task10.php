<?php

class Calculator {
    protected $num1 = 0;
    protected $num2 = 0;
    protected $result = 0;

    public function __construct($num1 = 0, $num2 = 0) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function add() {
        $this->result = $this->num1 + $this->num2;
        return $this;
    }

    public function multiply() {
        $this->result = $this->num1 * $this->num2;
        return $this;
    }

    public function divide() {
        $this->result = $this->num1 / $this->num2;
        return $this;
    }

    public function substract() {
        $this->result = $this->num1 - $this->num2;
        return $this;
    }

    public function addBy($number) {
        $this->result += $number;
        return $this;
    }

    public function divideBy($number) {
        $this->result /= $number;
        return $this;  
    }

    public function multiplyBy($number) {
        $this->result *= $number;
        return $this;
    }

    public function substractBy($number) {
        $this->result -= $number;
        return $this;
    }

    public function __toString() {
        return (string) $this->result;
    }

}

$mycalc = new Calculator(12, 6);
echo $mycalc->add() . '<br>'; // Displays 18
echo $mycalc->multiply() . '<br>'; // Displays 72
// Calculation by chain
echo $mycalc->add()->divideBy(9)->multiplyBy(5) ; // Displays 10 ( ((12+6)/9)*5=2 )
