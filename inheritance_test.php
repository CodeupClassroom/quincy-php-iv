<?php

require_once "Student.php";
require_once "Superhero.php";

// $bobby = new Student("Bobby", "Tables");

// $bobby->homework = "Studying furniture making";

// $bobby->doHomework();

// echo "Hi, nice to meet you, I'm " . $bobby->fullName();

$flash = new Superhero("Barry", "Allen");

$flash->pseudonym = "The Flash";

if($flash->hasCape()) {
    echo "Grab him by his cape.";
}

echo "Superhero name is " . $flash->pseudonym . PHP_EOL;
echo "Alter ego is " . $flash->alterEgo() . PHP_EOL;

