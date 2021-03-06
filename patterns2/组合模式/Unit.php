<?php
abstract class Unit
{
	public function getComposite()
	{
		return null;
	}	
	abstract function bombardStrength(); // 用于设置战斗单元对临近区块的攻击强度
}

/**
 * 局部类 Archer
 *
 */
class Archer extends Unit
{
	public function bombardStrength()
	{
		return 4;
	}
}

/**
 * 局部类 LaserCannonUnit
 *
 */
class LaserCannonUnit extends Unit
{
	public function bombardStrength()
	{
		return 44;
	}
}