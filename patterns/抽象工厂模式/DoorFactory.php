<?php
include 'Door.php';
include 'DoorFittingExpert.php';

/**
 * 抽象工厂接口
 *
 */
interface DoorFactory
{
	public function makeDoor();
	public function makeFittingExpert();
}

// Wooden factory to return wooden door and carpenter
class WoodenDoorFactory implements DoorFactory
{
	public function makeDoor()
	{
		return new WoodenDoor();
	}
	
	public function makeFittingExpert()
	{
		return new Carpenter();
	}
}

// Iron door factory to get iron door and welder 
class IronDoorFactory implements DoorFactory
{
	public function makeDoor()
	{
		return new IronDoor();
	}
	
	public function makeFittingExpert()
	{
		return new Welder();
	}
}

$woodenFactory = new WoodenDoorFactory();

$door = $woodenFactory->makeDoor();
$expert = $woodenFactory->makeFittingExpert();

$door->getDescription(); // Output: I am a wooden door
$expert->getDescription(); // Output: I can only fit wooden doors

// Same for Iron Factory
$ironFactory = new IronDoorFactory();
$door = $ironFactory->makeDoor();
$expert = $ironFactory->makeFittingExpert();

$door->getDescription(); // Output: I am an iron door
$expert->getDescription(); // Output: I can only fit iron doors


