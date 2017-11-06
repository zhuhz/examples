<?php
/**
 * 计算机外观，简化计算机内部复杂的启动关闭工作
 *
 */
class ComputerFacade
{
	protected $computer;
	
	public function __construct(Computer $computer)
	{
		$this->computer = $computer;
	}
	
	public function turnOn()
	{
		$this->computer->getElectricShock();
		$this->computer->makeSound();
		$this->computer->showLoadingScreen();
		$this->computer->bam();
	}
	
	public function turnOff()
	{
		$this->computer->closeEverything();
		$this->computer->pullCurrent();
		$this->computer->sooth();
	}
}

include 'Computer.php';

$computer = new ComputerFacade(new Computer());
$computer->turnOn(); // Ouch!Beep beep!Loading...Ready to be used!
$computer->turnOff();// Bup bup bup buzzzz!Haaah!Zzzzz!