<?php
/**
 * 抽象的产品类 ContactEncoder
 *
 */
abstract class ContactEncoder 
{
	abstract function encode();
}

class BloggsContactEncoder extends ContactEncoder
{
	public function encode()
	{
		return 'Contact data encode in BloggsCal format\n';
	}
}

class MegaContactEncoder extends ContactEncoder
{
	public function encode()
	{
		return 'Contact data encode in MegaCal format\n';
	}
}