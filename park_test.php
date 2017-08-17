<?php

require_once "Park.php";

// $parkArray = [
// 	'name' => 'Glacier National Park',
// 	'location' => 'Montana',
// 	'area_in_acres' => 7000,
// 	'date_established' => '1912-01-01',
// 	'description' => 'Ask Justin for photos'
// ];

// $park = new Park($parkArray);

// $park->save();



// $anotherPark = Park::find(2);
// $anotherPark->description = "Really awesome park is awesome and parky";

// $anotherPark->save();


$park = Park::find(1);
$park->delete();

