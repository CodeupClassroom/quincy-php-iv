<?php

require_once "Rectangle.php";

class Square extends Rectangle
{

	public function __construct($height)
	{
		$width = $height;
		parent::__construct($height, $width);
	}

    public function perimeter()
    {
        return $this->width * 2 + $this->height * 2;
    }
}