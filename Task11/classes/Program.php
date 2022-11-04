<?php
include_once 'GeneratedMatrix.php';
include_once 'PathFinder.php';
include_once 'FileMatrixLogger.php';

class Program {
    protected GeneratedMatrix $matrix;
    protected Path $PATH;
    protected array $path = [];

    public function __construct() {
        $this->matrix = new GeneratedMatrix();
        $this->PATH = new Path($this->matrix);
        $this->path = $this->PATH->findPath();
        $logResults = new FileLoger();
        $logResults->insertNewCase($this->printOut());
    }

    protected function stringify($matrix, string $sep = PHP_EOL):string {
        $startString = '';
        foreach($matrix as $rows) {
            foreach($rows as $elem) {
                $startString .= " $elem ";
            }
            $startString .= $sep;
        }
        return $startString;
    }

    public function printOut(): string {
        $matrixOriginal = $this->stringify($this->matrix->MATRIX);
        $matrixPathDrawen = $this->stringify($this->drawPathMatrix());
        $pathStr = 'Path: ';
        foreach($this->path as $cords) {
            $pathStr .= '(';
            foreach($cords as $key=>$value) {
                $pathStr .= "$key:$value;";
            }
            $pathStr .= ') ';
        }
        return 'ORIGINAL:' . PHP_EOL . $matrixOriginal . PHP_EOL . 'DROWEN PATH' . PHP_EOL . $matrixPathDrawen . PHP_EOL . $pathStr;
    }

    public function drawPathMatrix():array {
        $matrixExemp = $this->matrix->MATRIX;
        $A = $this->matrix->A;
        $B = $this->matrix->B;
        foreach($this->path as $coord) {
            if ($coord == $A) {
                continue;
            }
            if ($coord == $B) {
                $matrixExemp[$coord['y']][$coord['x']] = 'B';
                continue;
            }
            $matrixExemp[$coord['y']][$coord['x']] = '*';
        }
        return $matrixExemp;
    }
}