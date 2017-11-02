<?php
/**
 * 交通工具接口
 *
 */
interface Vechicle
{
	public function drive();
}

class Car implements Vechicle
{
	public function drive()
	{
		echo 'Car::drive';
	}
}

class Ship implements Vechicle
{
	public function drive()
	{
		echo 'Ship::drive';
	}
}
