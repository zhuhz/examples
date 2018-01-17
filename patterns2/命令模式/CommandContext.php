<?php
class CommandContext
{
	private $params = array();
	private $error = "";
	
	public function __construct()
	{
		$this->params = $_REQUEST;
	}
	
	public function addParam($key, $val)
	{
		$this->params[$key] = $val;
	}
	
	public function get($key)
	{
		return $this->params[$key];
	}
	
	public function setError($error)
	{
		$this->error = $error;
	}
	
	public function getError()
	{
		return $this->error;
	}
}