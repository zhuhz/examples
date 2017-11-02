<?php
/**
 * 咖啡接口
 *
 */
interface Coffee
{
	public function getCost();
	public function getDescription();
}

/**
 * 简单咖啡实现
 *
 */
class SimpleCoffee implements Coffee
{
	public function getCost()
	{
		return 10;
	}
	
	public function getDescription()
	{
		return 'Simple coffee';
	}
}

// 进行扩展，增加一些附加项（装饰器）

/**
 * 牛奶咖啡
 * 
 */
class MilkCoffee implements Coffee
{
	protected $coffee;
	
	public function __construct(Coffee $coffee)
	{
		$this->coffee = $coffee;
	}
	
	public function getCost()
	{
		return $this->coffee->getCost() + 2;
	}
	
	public function getDescription()
	{
		return $this->coffee->getDescription() . ', milk';
	}
}

/**
 * 鲜奶油咖啡
 *
 */
class WhipCoffee implements Coffee
{
	protected $coffee;
	
	public function __construct(Coffee $coffee)
	{
		$this->coffee = $coffee;
	}
	
	public function getCost()
	{
		return $this->coffee->getCost() + 5;
	}
	
	public function getDescription()
	{
		return $this->coffee->getDescription() . ', whip';
	}
}

// 下面我们来做杯咖啡吧
$someCoffee = new SimpleCoffee();
echo $someCoffee->getCost(),'<br/>'; // 10
echo $someCoffee->getDescription(),'<br/>'; // Simple coffee

$someCoffee = new MilkCoffee($someCoffee);
echo $someCoffee->getCost(),'<br/>'; // 12
echo $someCoffee->getDescription(),'<br/>'; // Simple coffee, milk

$someCoffee = new WhipCoffee($someCoffee);
echo $someCoffee->getCost(),'<br/>'; // 17
echo $someCoffee->getDescription(),'<br/>'; // Simple coffee, milk, whip
