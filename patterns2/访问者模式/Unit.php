<?php
abstract class Unit
{
	protected $depth = 0;
	
	public function getComposite()
	{
		return null;
	}	
	abstract function bombardStrength(); // 用于设置战斗单元对临近区块的攻击强度
	
	public function accept(ArmyVisitor $visitor)
	{
		$method = "visit" . get_class($this);
		$visitor->$method($this);
	}
	
	/**
	 * 设置对象树中单元的深度
	 */
	protected function setDepth($depth)
	{
		$this->depth = $depth;
	}
	
	/**
	 * 获取对象树中单元的深度
	 */
	public function getDepth()
	{
		return $this->depth;
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