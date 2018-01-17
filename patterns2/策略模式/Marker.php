<?php
/**
 * 标记算法策略基类
 *
 */
abstract class Marker
{
	protected $test;
	
	public function __construct($test)
	{
		$this->test = $test;
	}
	abstract function mark($response);
}

/**
 * MarkLogic 语言标记策略
 *
 */
class MarkLogicMarker extends Marker
{
	private $engine;
	
	public function __construct($test)
	{
		parent::__construct($test);
		// $this->engine = new MarkParse($test);
	}
	
	public function mark($response)
	{
		// return $this->engine->evaluate($response);
		// 模拟的返回值
		return true;
	}
}

/**
 * 直接匹配标记策略
 *
 */
class MatchMarker extends Marker
{
	public function mark($response)
	{
		return ($this->test == $response);
	}
}

/**
 * 正则表达式标记策略
 *
 */
class RegexpMarker extends Marker
{
	public function mark($response)
	{
		return (preg_match($this->test, $response));
	}
}