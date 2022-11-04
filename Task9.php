<?php

class Student {
    public function __construct(string $firstName, string $secondName, string $group, float $averageMark) {
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->group = $group;
        $this->averageMark = $averageMark;
    }

    public function getScholarship():string {
        $amount = $this->averageMark === 5.0 ? '100 USD' : '80 USD';
        return $amount;
    } 
}

class Aspirant extends Student {
    function getScholarship(): string {
        $amount = $this->averageMark === 5.0 ? '200 USD' : '180 USD';
        return $amount;
    }
}

//Object with array properties that accepts only values of Student type
class StudentArray implements ArrayAccess, Countable, IteratorAggregate {
    private array $Students;

    public function __construct(Student ...$Students) {
        $this->Students = $Students;
    }

    public function offsetExists($offset): bool {
        if (isset($offset)) {
            return true;
        }
        return false;
    }
 
    public function offsetGet($offset) : Student {
        return $this->Students[$offset];
    }
 
    public function offsetSet($offset, $value) : void {
        if ($value instanceof Student) {
            $this->Students[$offset] = $value;
        }
        else throw new TypeError("Not a Student!");
    }
 
    public function offsetUnset($offset) : void {
        unset($this -> Students[$offset]);
    }
 
    public function getIterator() : ArrayIterator {
        return new ArrayIterator($this->Students);
    }

    public function count() : int {
        return count($this -> Students);
    }
}

//Create an array of Student type that contains objects of Student and Aspirant class. Call getScholarship() method for each element of the array.

$arrOfStudents = new StudentArray(new Student('john', 'dory', '207', 4.5), new Aspirant('jane', 'doe', '207', 5));

foreach($arrOfStudents as $student) {
    echo "{$student->firstName} {$student->secondName}'s scholaship is: {$student->getScholarship()} <br>";
}