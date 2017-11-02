<?php
/**
 * 命令接口（Bulb 中的每个命令都要实现这个接口）
 *
 */
interface Command
{
	// 执行命令
	public function execute();
	// 撤销命令
	public function undo();
	// 重新执行命令
	public function redo();
}

// Command
class TurnOn implements Command
{
	protected $bulb;
	
	public function __construct(Bulb $bulb)
	{
		$this->bulb = $bulb;
	}
	
	public function execute()
	{
		$this->bulb->turnOn();
	}
	
	public function undo()
	{
		$this->bulb->turnOff();
	}
	
	public function redo()
	{
		$this->execute();
	}
}

class TurnOff implements Command
{
	protected $bulb;
	
	public function __construct(Bulb $bulb)
	{
		$this->bulb = $bulb;
	}
	
	public function execute()
	{
		$this->bulb->turnOff();
	}
	
	public function undo()
	{
		$this->bulb->turnOn();
	}
	
	public function redo()
	{
		$this->execute();
	}
}
