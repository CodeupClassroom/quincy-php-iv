<?php

require_once 'env.php';
require_once 'db_connect.php';

$statement = "CREATE TABLE IF NOT EXISTS albums (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    artist VARCHAR(128),
    name VARCHAR(128),
    release_date YEAR(4),
    sales FLOAT(10, 2),
    genre VARCHAR(128),
    PRIMARY KEY (id)
);";

$connection->exec($statement);