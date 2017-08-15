<?php

require_once "Park.php";

// test dbConnect() and Park::$connection

	// Park::dbConnect();
	// var_dump(Park::$connection);


// test Park::count()
	
	// echo "There are " . Park::count() . " parks in the parks table.";


// test Park::all()

	// var_dump(Park::all());

	// $allParks = Park::all();

	// echo "Park 1 details..." . PHP_EOL;
	// echo $allParks[0]->id . PHP_EOL;
	// echo $allParks[0]->name . PHP_EOL;
	// echo $allParks[0]->location . PHP_EOL;
	// echo $allParks[0]->dateEstablished . PHP_EOL;
	// echo $allParks[0]->areaInAcres . PHP_EOL;
	// echo $allParks[0]->description . PHP_EOL;



// test Park::paginate()

	// print_r(Park::paginate(1));
	// print_r(Park::paginate(2));
	// print_r(Park::paginate(2, 2));
	// print_r(Park::paginate(1, 8));



// test inserting a new park

$park = new Park();

$park->name = "Frio River Park";
$park->location = "Texas";
$park->areaInAcres = 700;
$park->dateEstablished = '1913-02-02';
$park->description = 'Yadda yadda';
$park->insert();

echo $park->id;





