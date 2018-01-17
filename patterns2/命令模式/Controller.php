<?php
include 'CommandContext.php';
include 'CommandFactory.php';

/**
 * 调用者类
 *
 */
class Controller 
{
	private $context;
	public function __construct()
	{
		$this->context = new CommandContext();
	}
	
	public function getContext()
	{
		return $this->context;
	}
	
	public function process()
	{
		$cmd = CommandFactory::getCommand($this->context->get('action'));
		if(! $cmd->execute($this->context)) {
			// 处理失败
		} else {
			// 成功
			// 现在分发视图
		}
	}
}

$controller = new Controller();
// 伪造用户请求
$context = $controller->getContext();
$context->addParam('action', 'login');
$context->addParam('username', 'bob');
$context->addParam('pass', 'tiddles');
$controller->process();