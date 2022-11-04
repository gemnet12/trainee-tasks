<?php

class Path {

    protected array $A = [];
    protected array $B = [];
    protected array $MATRIX = [];
    protected array $obstacles = [];

    public function __construct(GeneratedMatrix $matrix) {
        $this->A = $matrix->A;
        $this->B = $matrix->B;
        $this->MATRIX = $matrix->MATRIX;
        $this->obstacles = $matrix->obstacles;
    }

    public function findPath():array {
        
        $this->createDeyxtraMap();
        $queue = [];
        array_push($queue, ['coords' => $this->A, 'weight' => 0]);
        while(count($queue) > 0 ) {
            //Take first element of queue
            $current = $queue[0];
            $currentY = $current['coords']['y'];
            $currentX = $current['coords']['x'];
            $stepWeight = 1 + $current['weight'];
            //check destination
            //Code below implements Dijkstra algorithm in this matrix with fixed step
            //Move Up
            $upQueueElem = ['coords' => ['y' => $currentY - 1 , 'x' => $currentX], 'weight' => $stepWeight ]; 
            if($this->makeStep($upQueueElem)) {
                array_push($queue, $upQueueElem);
            }
            //Move Right
            $rightQueueElem = ['coords' => ['y' => $currentY , 'x' => $currentX + 1], 'weight' => $stepWeight ];
            if($this->makeStep($rightQueueElem)) {
                array_push($queue, $rightQueueElem);
            }
            //Move Down
            $downQueueElem = ['coords' => ['y' => $currentY + 1, 'x' => $currentX], 'weight' => $stepWeight ];
            if($this->makeStep($downQueueElem)) {
                array_push($queue, $downQueueElem);
            }
            ////Move left
            $leftQueueElem = ['coords' => ['y' => $currentY , 'x' => $currentX - 1], 'weight' => $stepWeight ];
            if($this->makeStep($leftQueueElem)) {

                array_push($queue, $leftQueueElem);
            }
            ////shift
            array_shift($queue);
        }
        //building route
        $coordsOfroute = $this->compileRoute();
        return $coordsOfroute;
        
    }

    protected function compileRoute():array {
        $current = $this->B;
        $currWeight = $this->MATRIX[$current['y']][$current['x']];

        $coordsToStart = [];
        if ($currWeight != 0) {
            while($current != $this->A) {

                array_unshift($coordsToStart, $current);
                //looking up
                $up = ['y' => $current['y']- 1, 'x' => $current['x']];
                if (!$this->checkIfWall($up)) {
                    $upWeight = $this->MATRIX[$up['y']][$up['x']];
                    if ($upWeight !== 'X' && $upWeight < $currWeight) {
                        $current = $up;
                        $currWeight = $upWeight;
                        continue;
                    }     
                }
                //looking right
                $right = ['y' => $current['y'], 'x' => $current['x'] + 1];
                if (!$this->checkIfWall($right)) {
                    $rightWeight = $this->MATRIX[$right['y']][$right['x']];
                    if ($rightWeight !== 'X' && $rightWeight < $currWeight ) {
                        $current = $right;
                        $currWeight = $rightWeight;
                        continue;
                    }     
                }
                //looking down
                $down = ['y' => $current['y'] + 1, 'x' => $current['x']];
                if (!$this->checkIfWall($down)) {
                    $downWeight = $this->MATRIX[$down['y']][$down['x']];
                    if ($downWeight !== 'X' && $downWeight < $currWeight ) {
                        $current = $down;
                        $currWeight = $downWeight;
                        continue;
                    }     
                }
                //looking left
                $left = ['y' => $current['y'], 'x' => $current['x'] - 1];
                if (!$this->checkIfWall($left)) {
                    $leftWeight = $this->MATRIX[$left['y']][$left['x']];
                    if ($leftWeight !== 'X' && $leftWeight < $currWeight) {
                        $current = $left;
                        $currWeight = $leftWeight;
                        continue;
                    }     
                }
            }
        }
        return $coordsToStart;
    }

    protected function checkIfWall($coords):bool {
        if ($coords['y'] > 9 || $coords['x'] > 9 || $coords['y'] < 0 || $coords['x'] < 0) {
            return true;
        }
        return false; 
    }

    protected function makeStep($queueElement): bool {
        $coords = $queueElement['coords'];
        $x = $coords['x'];
        $y = $coords['y'];
        $stepWeight = $queueElement['weight'];
        //check walls
        if ($this->checkIfWall($coords)) {
            return false;
        }

        $currentWeight = $this->MATRIX[$y][$x];

        
        //check A  B
        if ($coords === $this->A) {
            return false;
        }

        //check obstacles
        if ($currentWeight === 'X') {
            return false;
        }
        
        //check weights and write weights
        if ($currentWeight > $stepWeight || $currentWeight == 0) {
            $this->MATRIX[$y][$x] = $stepWeight;
        } else {
            return false;
        }

        return true;
    }

    protected function createDeyxtraMap(): void {
        for ($i = 0; $i < 10; $i++) {
            for ($n = 0; $n <10; $n++) {
                $value = $this->MATRIX[$i][$n];
                if ($value === 1) $this->MATRIX[$i][$n] = 'X';
            }
        }
    }

}