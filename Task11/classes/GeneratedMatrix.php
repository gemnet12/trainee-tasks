<?php

class GeneratedMatrix {
    protected array $A = [];
    protected array $B = [];
    protected array $MATRIX = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    ];
    protected array $obstacles = [];

    public function __construct() {
        $obstaclesAmount = rand(20, 35);
        $this->A = $this->setRandomMatrixElement('A');
        $this->B = $this->setRandomMatrixElement('B');
        for($i = 0; $i <= $obstaclesAmount; $i++) {
            $obstacle = $this->setRandomMatrixElement(1);
            array_push($this->obstacles, $obstacle);
        }
    }

    public function __get($name) {
        return $this->$name;
    }

    protected function setRandomMatrixElement($key): array {
        $element = $this->generateRandomCoords();
        while(true) {
            if($element != $this->A && $element != $this->B) {
                $x = $element['x'];
                $y = $element['y'];
                $this->MATRIX[$y][$x] = $key;
                return $element; 
            }
            else {
                $element = $this->generateRandomCoords();
            }
        }
    }

    protected function generateRandomCoords(): array {
        $x = rand(0, 9);
        $y = rand(0, 9);
        return ['y' => $y, 'x' => $x];
    }

}







