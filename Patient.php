<?php 

class Patient
{

	public $name = "Fred";
	protected $bloodType = "Type B";
	private $pinNumber = 1234;

	public function getName()
	{
		return $this->name;
	}

	public function getBloodType()
	{
		return $this->bloodType;
	}

	public function getPinNumber()
	{
		return $this->pinNumber;
	}

	public function setPinNumber($val)
	{
		$this->pinNumber = $val;
	}

	protected function sendPatientInvoice()
	{
		echo "Sending patient an invoice..." . PHP_EOL;
	}	

	private function dropPatientRecord()
	{
		echo "Dropping patient record!!!" . PHP_EOL;
	}

}