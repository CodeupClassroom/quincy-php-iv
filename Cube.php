<?php

require_once "Square.php";

class Cube extends Square
{
    public $length;

    public function __construct($height)
    {
        parent::__construct($height, $height);

        $this->length = $height;
    }

    public function area()
    {
        $surfaceAreaOfOneSide = parent::area();
        $numberOfSides = 6;

        return $numberOfSides * $surfaceAreaOfOneSide;
    }
}