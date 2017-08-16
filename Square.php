<?php

require_once "Rectangle.php";

class Square extends Rectangle
{
    public function perimeter()
    {
        return $this->width * 2 + $this->height * 2;
    }
}