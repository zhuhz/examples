<?php
include_once 'OutputStrategy.php';

/**
 * 环境角色类
 * 用来管理策略，实现不同策略的切换功能
 *
 */
class Output
{
	private $outputStrategy;
	
	// 传入参数必须是策略接口的子类实例
	public function __construct(OutputStrategy $outputStrategy)
	{
		$this->outputStrategy = $outputStrategy;
	}
	
	public function renderOutput($array)
	{
		return $this->outputStrategy->render($array);
	}
}

$test = ['a', 'b', 'c'];

// 需要返回数组
$output = new Output(new ArrayStrategy());
$data = $output->renderOutput($test);

// 需要返回 JSON
$output = new Output(new JsonStrategy());
$data = $output->renderOutput($test);