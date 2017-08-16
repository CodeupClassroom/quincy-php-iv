<?php 

require_once 'Vehicle.php';
require_once 'Plane.php';

// Overriding Lecture

// Class Vehicle (super class of Plane)

	// $maxOcc = 8;
	// $currOcc = 0;
	// $maxMph = 120;
	// $currMph = 0;
	// $color = "blue";

	// $vehicle = new Vehicle($maxOcc, $currOcc, $maxMph, $currMph, $color);

	// $vehicle->startVehicle();

	// print_r($vehicle); 

// Class Plane (sub class of Vehicle)

	$maxOcc = 80;
	$currOcc = 0;
	$maxMph = 550;
	$currMph = 0;
	$color = "white";
	$altitudeFeet = 0;
	$angleOfPitch = 0;
	$feetOfWingspan = 70;

	$somePlane = new Plane($maxOcc, $currOcc, $maxMph, $currMph, $color, $altitudeFeet, $angleOfPitch, $feetOfWingspan);

	// $somePlane->startVehicle();
	

	print_r($somePlane);









