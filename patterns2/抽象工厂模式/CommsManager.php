<?php
include 'ApptEncoder.php';
include 'TtdEncoder.php';
include 'ContactEncode.php';

/**
 * 抽象的创建者类
 *
 */
abstract class CommsManager
{
	const APPT    = 1;
	const TTD     = 2;
	const CONTACT = 3;	
	abstract function getHeaderText();
	abstract function make($flag_int);
	abstract function getFooterText();
}

/**
 * 具体的创建者类 BloggsCal
 *
 */
class BloggsCommsManager extends CommsManager
{
	public function getHeaderText()
	{
		return "BloggsCal header\n";
	}
	
	public function make($flag_int)
	{
		switch ($flag_int) {
			case self::APPT:
				return new BloggsApptEncoder();
			case self::TTD:
				return new BloggsTtdEncoder();
			case self::CONTACT:
				return new BloggsContactEncoder();
		}
	}	
	
	public function getFooterText()
	{
		return "BloggsCal footer\n";
	}
}

/**
 * 具体的创建者类 Mega
 *
 */
class MegaCommsManager extends CommsManager
{
	public function getHeaderText()
	{
		return "MegaCal header\n";
	}
	
	public function make($flag_int)
	{
		switch ($flag_int) {
			case self::APPT:
				return new BloggsApptEncoder();
			case self::TTD:
				return new BloggsTtdEncoder();
			case self::CONTACT:
				return new BloggsContactEncoder();
		}
	}		
	
	public function getFooterText()
	{
		return "MegaCal footer\n";
	}
}