<?php

require_once "Rectangle.php";
require_once "Square.php";

// make a new rectangle object, set it's height and width in the constructor
// echo out "A rectangle with this heigh and width has an area of ..."

// $shape1 = new Rectangle(3, 5);

// echo "Area of rectangle with height of " 
//     . $shape1->height . " and width of " 
//     . $shape1->width . " is " . $shape1->area() . PHP_EOL;


// $shape2 = new Rectangle(5, 8);

// echo "Area of rectangle with height of " 
//     . $shape2->height . " and width of " 
//     . $shape2->width . " is " . $shape2->area() . PHP_EOL;


$square = new Square(7);
echo "The area of a square with a height of " 
    . $square->height . " and width of "
    . $square->width . " is " . $square->area()
    . " and the perimeter is " . $square->perimeter() . PHP_EOL;
