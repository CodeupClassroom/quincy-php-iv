<?php

class Car extends Model 
{

    public $make;
    public $model;

    public function __construct(string $make,  string $model)
    {
        $this->make = $make;
        $this->model = $model;
    }

    protected static function insert()
    {
        
    }
}

$mazda = new Car("Mazda", "Zoom");
$mazda->save();

$car = Car::find(1);
$car->model = "Sport version";
$car->save();
