<?php
/**
 * 房门安装专家接口
 *
 */
interface DoorFittingExpert
{
	public function getDescription();
}

/**
 * 焊接工实现：铁门需要焊接工
 *
 */
class Welder implements DoorFittingExpert
{
	public function getDescription()
	{
		echo 'I can only fit iron doors';
	}
}

/**
 * 木匠实现：木门需要木匠
 *
 */
class Carpenter implements DoorFittingExpert
{
	public function getDescription()
	{
		echo 'I can only fit wooden doors';
	}
}