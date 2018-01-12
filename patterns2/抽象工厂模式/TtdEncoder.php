<?php
/**
 * 抽象的产品类 TtdEncoder
 *
 */
abstract class TtdEncoder 
{
	abstract function encode();
}

class BloggsTtdEncoder extends TtdEncoder
{
	public function encode()
	{
		return 'Todo data encode in BloggsCal format\n';
	}
}

class MegaTtdEncoder extends TtdEncoder
{
	public function encode()
	{
		return 'Todo data encode in MegaCal format\n';
	}
}