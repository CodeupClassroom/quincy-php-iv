<?php

require_once "park_logins.php";
require_once "db_connect.php";

// drop table
$connection->exec("DROP TABLE IF EXISTS parks");

// create table command
$createParksTable = 'CREATE TABLE if not exists parks (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    date_established DATE NOT NULL,
    area_in_acres DOUBLE NOT NULL,
    description TEXT,
    PRIMARY KEY (id)
)';

$connection->exec($createParksTable);
echo "parks table successfully created" . PHP_EOL;