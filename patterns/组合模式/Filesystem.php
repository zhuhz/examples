<?php
/**
 * 规范独立对象和组合对象必须实现的方法，保证它们提供给客户端统一的访问方式
 *
 */
abstract class Filesystem
{
	protected $name;
	
	public function __construct($name)
	{
		$this->name = $name;
	}
	
	public abstract function getName();
	public abstract function getSize();
}