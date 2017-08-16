<?php

require_once "park_logins.php";
require_once "db_connect.php";

require_once "Park.php";

$connection->exec("TRUNCATE parks");

// get the contents of the CSV as a string
$contents = file_get_contents('national_parks.csv');

// get an array of all the rows
$parks = explode("\n", trim($contents));

// remove the heading
array_shift($parks);

// trim each 
$parks = array_map('trim', $parks);

foreach($parks as $park) {

    $park = explode(",", $park);
    var_dump($park);
    die();
    
    $parkObject = new Park();
    $parkObject->name = $park[0];
    $parkObject->location = $park[1];
    $parkObject->dateEstablished = $park[2];
    $parkObject->areaInAcres = $park[3];
    $parkObject->description = $park[4];

    $parkObject->insert();
}














