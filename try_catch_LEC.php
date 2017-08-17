<?php 


// If an exception may be thrown, catch it!

// Methods of the Exception class: http://php.net/manual/en/class.exception.php

function returnNum($num)
{
	if (is_numeric($num)) {
		return $num;
	} else {
		throw new Exception("Not a number!");
	}
}

function returnFourDigitPin($pin)
{
	if (!is_numeric($pin)) {
		throw new Exception("Input is not a number.");
	} else if (strlen($pin) === 4) {
		throw new Exception("Input must be exactly four digits long.");
	} else {
		return $pin;
	}
}

// returnNum() try/catch block
try {
	echo returnNum("a");
} catch (Exception $e) {
	echo "Oh no, you messed up!" . PHP_EOL;
	echo "Error message: " . $e->getMessage() . PHP_EOL;
	echo "Error occurred in: " . $e->getFile() . PHP_EOL;
}

echo "================= Will this run???" . PHP_EOL;

// returnFourDigitPin() try/catch block
try {
	echo returnFourDigitPin("a");
} catch (Exception $e) {
	echo "Oh no, invalid input!" . PHP_EOL;
	echo "Error message: " . $e->getMessage() . PHP_EOL;
}








