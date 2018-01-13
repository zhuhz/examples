<?php
/**
 * 抽象区域类
 *
 */
abstract class Tile
{
	abstract function getWealthFactor(); // 用于计算当某个特定区域被一个玩家所占有后的收益
}

/**
 * 具体的组件类（平原）
 *
 */
class Plains extends Tile
{
	// 财富系数
	private $wealthfactor = 2;
	
	public function getWealthFactor()
	{
		return $this->wealthfactor;
	}
}


/**
 * 抽象装饰类
 *
 */
abstract class TileDecorator extends Tile
{
	protected $tile;
	
	public function __construct(Tile $tile)
	{
		$this->tile = $tile;
	}
}

/**
 * 具体装饰类：钻石分布
 *
 */
class DiamondDecorator extends TileDecorator
{
	public function getWealthFactor()
	{
		return $this->tile->getWealthFactor()+2;
	}
}

/**
 * 具体装饰类：污染破坏
 *
 */
class PollutionDecorator extends TileDecorator
{
	public function getWealthFactor()
	{
		return $this->tile->getWealthFactor()-4;
	}
}

// 真正的 Tile 对象
$tile = new Plains();
print $tile->getWealthFactor(); // 2
// 装饰器对象
$tile = new DiamondDecorator(new Plains());
print $tile->getWealthFactor(); // 4