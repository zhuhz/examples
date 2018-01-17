<?php
class RequestHelper{}

/**
 * 抽象基类
 *
 */
abstract class ProcessRequest
{
	abstract function process(RequestHelper $req);
}

/**
 * 具体的组件
 *
 */
class MainProcess extends ProcessRequest
{
	public function process(RequestHelper $req)
	{
		print __CLASS__ . ": doing something useful with request\n";
	}	
}

/**
 * 抽象装饰类
 *
 */
abstract class DecorateProcess extends ProcessRequest
{
	protected $processrequest;
	public function __construct(ProcessRequest $pr)
	{
		$this->processrequest = $pr;
	}
}

/**
 * 具体装饰类：记录请求
 *
 */
class LogRequest extends DecorateProcess
{
	public function process(RequestHelper $req)
	{
		print __CLASS__ . ": logging request\n";
		$this->processrequest->process($req);
	}
}

/**
 * 具体装饰类：验证用户请求
 *
 */
class AuthenticateRequest extends DecorateProcess
{
	public function process(RequestHelper $req)
	{
		print __CLASS__ . ": authenticating request\n";
		$this->processrequest->process($req);
	}	
}

/**
 * 具体装饰类：输入数据处理
 *
 */
class StructureRequest extends DecorateProcess
{
	public function process(RequestHelper $req)
	{
		print __CLASS__ . ": structuring request data\n";
		$this->processrequest->process($req);
	}	
}

// 将所有具体类的对象组合为一个过滤器
$process = new AuthenticateRequest(new StructureRequest(
									new LogRequest(
									new MainProcess()
									)));
$process->process(new RequestHelper());

/*
 * 执行代码输出结果：
 * --------------------------------------------------
 * AuthenticateRequest: authenticating request
 * StructureRequest: structuring request data
 * LogRequest: logging request
 * MainProcess: doing something useful with request
 * --------------------------------------------------
 */

