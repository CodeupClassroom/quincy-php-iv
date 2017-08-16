<?php

class Vehicle
{
	public $maxOccupancy;
	public $noOfCurrentOccupants;
	public $maxMph;
	public $currMph;
	public $color;

	public function __construct($maxOcc, $currOcc, $maxMph, $currMph, $color)
	{
		$this->maxOccupancy = $maxOcc;
		$this->noOfCurrentOccupants = $currOcc;
		$this->maxMph = $maxMph;
		$this->currMph = $currMph;
		$this->color = $color;
	}

	public function startVehicle()
	{
		echo "Turning ignition..." . PHP_EOL;
	}

	public function loadOccupant()
	{
		if ($this->noOfCurrentOccupants + 1 <= $this->maxOccupancy) {
			$this->noOfCurrentOccupants += 1;
			echo "Current number of occupants is: " . $this->noOfCurrentOccupants . PHP_EOL;
		} else {
			echo "At max capacity!" . PHP_EOL;
		}
	}

	public function unLoadOccupant()
	{
		if ($this->noOfCurrentOccupants > 0) {
			$this->noOfCurrentOccupants -= 1;
			echo "Current number of occupants is: " . $this->noOfCurrentOccupants . PHP_EOL;
		} else {
			echo "There are no more occupants to unload!";
		}
	}

	public final function accelerate($num = 5)
	{
		if ($this->currMph + $num <= $this->maxMph) {
			$this->currMph += $num;
			echo "Speeding up to: " . $this->currMph . "mph" . PHP_EOL;
		} else {
			echo "Can't go that fast!";
		}
	}

	public function decelerate($num = 5)
	{
		if ($this->currMph - $num >= 0) {
			$this->currMph += $num;
			echo "Slowing to: " . $this->currMph . "mph" . PHP_EOL;
		} else {
			echo "Can't reverse!";
		}	
	}

}