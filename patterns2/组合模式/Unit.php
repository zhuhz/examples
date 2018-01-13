<?php
include 'Exception.php';

abstract class Unit
{
	public function addUnit(Unit $unit)
	{
		throw new UnitException(get_class($this) . " is a leaf");
	}
	public function removeUnit(Unit $unit)
	{
		throw new UnitException(get_class($this) . " is a leaf");
	}
	abstract function bombardStrength(); // 用于设置战斗单元对临近区块的攻击强度
}

/**
 * 组合类
 *
 */
class Army extends Unit
{
	private $units = array();
	
	public function addUnit(Unit $unit)
	{
		if (in_array($unit, $this->units, true)) {
			return ;
		}
		$this->units[] = $unit;
	}
	
	public function removeUnit(Unit $unit)
	{
		$this->units = array_udiff($this->units, array($unit),
			function($a, $b){return ($a === $b) ? 0 : 1;});
	}
	
	public function bombardStrength() 
	{
		$ret = 0;
		foreach ($this->units as $unit) {
			$ret += $unit->bombardStrength();
		}
		return $ret;
	}
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

// 创建一个 Army 对象
$main_army = new Army();
// 添加一些 Unit 对象
$main_army->addUnit(new Archer());
$main_army->addUnit(new LaserCannonUnit());

// 创建一个新的 Army 对象
$sub_army = new Army();
// 添加一些 Unit 对象
$sub_army->addUnit(new Archer());
$sub_army->addUnit(new Archer());

// 把第二个 Army 对象添加到第一个 Army 对象中去
$main_army->addUnit($sub_army);

// 所有的攻击强度计算都在幕后进行
print $main_army->bombardStrength(); // 56
