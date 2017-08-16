<?php

class Plane extends Vehicle
{
	public $maxOccupancy = 2;
	public $altitudeFeet = 0;
	public $angleOfPitch = 0;
	public $feetOfWingspan;


	public function __construct($maxOcc, $currOcc, $maxMph, $currMph, $color, $altitudeFeet, $angleOfPitch, $feetOfWingspan)
	{
		parent::__construct($maxOcc, $currOcc, $maxMph, $currMph, $color);
		$this->altitudeFeet = $altitudeFeet;
		$this->angleOfPitch = $angleOfPitch;
		$this->feetOfWingspan = $feetOfWingspan;
	}

	public function startVehicle()
	{
		echo "Starting pre-flight sequence..." . PHP_EOL;
	}

	// will result in an error because the parent class method is final
	// public function accelerate($num = 5)
	// {
	// 	echo "Take flight!"
	// }

}