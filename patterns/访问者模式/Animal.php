<?php
/**
 * 动物接口
 *
 */
interface Animal
{
	public function accept(AnimalOperation $operation);
}

/**
 * 实现各种动物
 *
 */
class Monkey implements Animal
{
	public function shout()
	{
		echo 'Ooh oo aa aa!';
	}
	
	public function accept(AnimalOperation $operation)
	{
		$operation->visitMonkey($this);
	}
}

class Lion implements Animal
{
	public function roar()
	{
		echo 'Roaaar!';
	}
	
	public function accept(AnimalOperation $operation)
	{
		$operation->visitLion($this);
	}
}