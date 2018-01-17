<?php
include 'Unit.php';

/**
 * 抽象的组合类
 *
 */
abstract class CompositeUnit extends Unit
{
	protected $units = array();

	public function getComposite()
	{
		return $this;
	}
	
	protected function units()
	{
		return $this->units;
	}

	public function addUnit(Unit $unit)
	{
		if (in_array($unit, $this->units, true)) {
			return ;
		}
		$unit->setDepth($this->depth+1);
		$this->units[] = $unit;
	}
	
	public function removeUnit(Unit $unit)
	{
		$this->units = array_udiff($this->units, array($unit),
			function($a, $b){return ($a === $b) ? 0 : 1;});
	}	
	
	public function accept(ArmyVisitor $visitor)
	{
		// $method = "visit" . get_class($this);
		// $visitor->$method($this);		
		parent::accept($visitor);
		foreach ($this->units as $thisunit) {
			$thisunit->accept($visitor);
		}
	}
}

/**
 * 具体的组合类
 *
 */
class Army extends CompositeUnit
{	
	public function bombardStrength() 
	{
		$ret = 0;
		foreach ($this->units as $unit) {
			$ret += $unit->bombardStrength();
		}
		return $ret;
	}
}