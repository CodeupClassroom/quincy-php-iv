<?php

// require class
	require_once "Patient.php";
	require_once "ER_Patient.php";


// instantiate new object
	// $patient = new Patient();


// directly access non-public attributes results in an error
	// echo $patient->name . PHP_EOL;
	// echo $patient->bloodType . PHP_EOL; // error
	// echo $patient->pinNumber . PHP_EOL; // error


// directly access all visibility types within original object
	// echo $patient->getName() . PHP_EOL;
	// echo $patient->getBloodType() . PHP_EOL;
	// echo $patient->getPinNumber() . PHP_EOL;


// visibility of properties directly from subclass

	// $erPatient = new ER_Patient();

	// echo $erPatient->name;
	// echo $erPatient->bloodType; // still gives error
	// echo $erPatient->pinNumber; // still gives error


// visibility of properties via get methods

	// echo $erPatient->getName() . PHP_EOL;
	// echo $erPatient->getBloodType() . PHP_EOL;
	// echo $erPatient->getPinNumber() . PHP_EOL;


// accessing superclass properties/methods from subclass

	// echo $erPatient->echoPatientStats();
	// $erPatient->sendPatientInfo();
























