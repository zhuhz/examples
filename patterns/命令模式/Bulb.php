<?php
/**
 * 电灯泡类（接收器，实现了可能会执行的动作）
 *
 */
class Bulb
{
	public function turnOn()
	{
		echo 'Bulb has been lit';
	}
	
	public function turnOff()
	{
		echo 'Darkness!';
	}
}