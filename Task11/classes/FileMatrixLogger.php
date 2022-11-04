<?php

class FileLoger {
    const address = './file_loggs/logs.txt';
    protected $connection;
    protected $handleFile;

    public function __construct() {
        $this->handleFile = fopen(self::address, 'w');
    }

    public function __destruct() {
        fclose($this->handleFile);
    }

    public function insertNewCase($text):void {
        fwrite($this->handleFile, $text);
    }
}