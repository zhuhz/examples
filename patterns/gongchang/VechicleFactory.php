<?php 
include_once 'Vechicle.php';

/**
 * 工厂类
 *
 */
class VechicleFactory
{
	public static function build($className = null)
	{
		$className = ucfirst($className);
		if($className && class_exists($className)){
			return new $className();
		}
		return null;
	}
}

$car = VechicleFactory::build('Car');
$car->drive();
$ship = VechicleFactory::build('Ship');
$ship->drive();