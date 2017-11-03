<?php
/**
 * 电灯泡类，命令接受者与执行者，实现了可能会执行的动作
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