<?php
/**
 * 访问者类
 *
 */
abstract class ArmyVisitor
{
	abstract function visit(Unit $node);
	
	public function visitArcher(Archer $node)
	{
		$this->visit($node);
	}
	
	public function visitLaserCannonUnit(LaserCannonUnit $node)
	{
		$this->visit($node);
	}	
	
	public function visitArmy(Army $node)
	{
		$this->visit($node);
	}
}

/**
 * ArmyVisitor对象的一个实现，用于转储叶节点的文本信息
 *
 */
class TextDumpArmyVisitor extends ArmyVisitor
{
	private $text = "";
	
	public function visit(Unit $node)
	{
		$ret = "";
		$pad = 4*$node->getDepth();
		$ret .= sprintf("%{$pad}s", "");
		$ret .= get_class($node) . ": ";
		$ret .= "bombard: " . $node->bombardStrength()."\n";
		$this->text .= $ret;
	}
	
	public function getText()
	{
		return $this->text;
	}
}

/**
 * ArmyVisitor对象的一个实现，用于向军队征税
 *
 */
class TaxCollectionVisitor extends ArmyVisitor
{
	private $due = 0;
	private $report = "";
	
	public function visit(Unit $node)
	{
		$this->levy($node, 1);
	}
	
	public function visitArcher(Archer $node)
	{
		$this->levy($node, 2);
	}
	
	public function visitLaserCannonUnit(LaserCannonUnit $node)
	{
		$this->levy($node, 3);
	}
	
	private function levy(Unit $unit, $amount)
	{
		$this->report .= "Tax levied for ". get_class($unit);
		$this->report .= ": $amount\n";
		$this->due += $amount;
	}
	
	public function getReport()
	{
		return $this->report;
	}
	
	public function getTax()
	{
		return $this->due;
	}
}
