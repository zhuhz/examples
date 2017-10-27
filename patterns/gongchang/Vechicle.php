<?php

interface Vechicle
{
	public function drive();
}

class Car implements Vechicle
{
	public function drive()
	{
		echo 'Car::drive<br/>';
	}
}

class Ship implements Vechicle
{
	public function drive()
	{
		echo 'Ship::drive<br/>';
	}
}
