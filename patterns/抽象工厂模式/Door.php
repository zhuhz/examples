<?php
/**
 * 房门接口
 *
 */
interface Door
{
	public function getDescription();
}

/**
 * 木门实现
 *
 */
class WoodenDoor implements Door
{
	public function getDescription()
	{
		echo 'I am a wooden door';
	}
}

/**
 * 铁门实现
 *
 */
class IronDoor implements Door
{
	public function getDescription()
	{
		echo 'I am an iron door';
	}
}