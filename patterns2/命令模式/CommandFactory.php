<?php
class CommandNotFoundException extends Exception{}

/**
 * 创建命令对象的类
 *
 */
class CommandFactory
{
	private static $dir = 'commands';	
	
	public static function getCommand($action = 'Default')
	{
		if (preg_match('/\W/', $action)) {
			throw new Exception("illegal characters in action");
		}
		$class = ucfirst(strtolower($action)) . "Command";
		$file = self::$dir . DIRECTORY_SEPARATOR . "{$class}.php";
		if (! file_exists($file)) {
			throw new CommandNotFoundException("could not find '$file'");
		} 
		require_once($file);
		if (! class_exists($class)) {
			throw new CommandNotFoundException("no '$class' class located");
		}
		$cmd = new $class();
		return $cmd;
	}
}