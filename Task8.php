<?php


class Matrix {

    protected array $matrix;
    protected int $rows;
    protected int $cols;

    function __construct(array $twoDimMatrix) {
        $this->matrix = $twoDimMatrix;
        $this->rows = count($twoDimMatrix);
        $this->cols = count($twoDimMatrix[0]);
    }

    function __get($name) {
        return $this->$name;
    }

    public function add(Matrix $matrixOperand):void {
        for($i = 0; $i < $this->rows; $i++ ) {
            for($n = 0; $n < $this->cols; $n++) {
                $this->matrix[$i][$n] += $matrixOperand->matrix[$i][$n];
            }
        }
    }

    public function multiplicateBynumber($number): void {
        for($i = 0; $i < $this->rows; $i++ ) {
            for($n = 0; $n < $this->cols; $n++) {
                $this->matrix[$i][$n] *= $number;
            }
        }
    }

    public function print(): void {
        echo '<br>Matrix: <br>';
        foreach($this->matrix as $subarr) {
            foreach($subarr as $value) {
                echo " $value ";
            }
            echo '<br>';
        }
    }

    public function multiplicateByMatrix(Matrix $matrixOperand): void {
        for($i = 0; $i < $this->rows; $i++ ) {
            for($n = 0; $n < $this->cols; $n++) {
                $this->matrix[$i][$n] *= $matrixOperand->matrix[$i][$n];
            }
        }
    }
}

$matrix = new Matrix(
    [
        [1, 1, 1],
        [1, 1, 1],
        [1, 1, 1],
        [1, 1, 1]
    ]
);

$matrix2 = new Matrix(
    [
        [3, 3, 3],
        [3, 3, 3],
        [3, 3, 3],
        [3, 3, 3]
    ]
);

echo $matrix->rows . '<br>' . $matrix->cols;
$matrix->add($matrix2);
$matrix->print();
$matrix->multiplicateBynumber(3);
$matrix->print();
$matrix->multiplicateByMatrix($matrix2);
$matrix->print();

