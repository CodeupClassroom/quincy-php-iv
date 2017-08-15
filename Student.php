<?php

require_once "Person.php";

class Student extends Person
{
    
    public $homework;

    public function doHomework()
    {
        echo "doing the $this->homework exercises...";
    }
}