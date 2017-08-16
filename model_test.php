<?php

require_once "Model.php";

$data = new Model();

echo "username is " .  $data->username . PHP_EOL;

$data->username = "bobbyTables";

echo "username is " .  $data->username . PHP_EOL;

echo "password is " .  $data->password . PHP_EOL;

$data->password = "password123";

var_dump($data);