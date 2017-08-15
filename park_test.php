<?php

require_once __DIR__ . "/../Park.php";

// $park = new Park();

// $park->name = "Frio River Park";
// $park->location = "Texas";
// $park->area_in_acres = 700;
// $park->date_established = '1913-02-02';
// $park->insert();


echo "There are " . Park::count() . " parks on the parks database.";

$parks = Park::all();
var_dump($parks);