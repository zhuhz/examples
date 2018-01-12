<?php
/**
 * 管理类，获得编码器（创建者类）
 *
 */
abstract class CommsManager
{
	abstract function getHeaderText();
	abstract function getApptEncoder();
	abstract function getFooterText();
}

class BloggsCommsManager extends CommsManager
{
	public function getHeaderText()
	{
		return "BloggsCal header\n";
	}
	
	public function getApptEncoder()
	{
		return new BloggsApptEncoder();
	}
	
	public function getFooterText()
	{
		return "BloggsCal footer\n";
	}
}

class MegaCommsManager extends CommsManager
{
	public function getHeaderText()
	{
		return "MegaCal header\n";
	}
	
	public function getApptEncoder()
	{
		return new MegaApptEncoder();
	}
	
	public function getFooterText()
	{
		return "MegaCal footer\n";
	}
}