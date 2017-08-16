<?php 

class ER_Patient extends Patient
{

	public $currentHeartRate = "100bpm";
	public $conscious = true;

	public function echoPatientStats()
	{
		echo $this->name . PHP_EOL;
		echo $this->bloodType . PHP_EOL;

		$this->setPinNumber(2345);
		// $this->pinNumber = 2345;

		echo $this->getPinNumber() . PHP_EOL; // gives an error
		echo $this->currentHeartRate . PHP_EOL;
		echo $this->conscious . PHP_EOL;
	}

	public function sendPatientInfo()
	{
		echo "Your current heart rate is " . $this->currentHeartRate . PHP_EOL;
		// $this->sendPatientInvoice();
		// $this->dropPatientRecord(); // gives an error
	}

}