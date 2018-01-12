<?php
/**
 * 抽象的产品类 ApptEncoder
 *
 */
abstract class ApptEncoder 
{
	abstract function encode();
}

class BloggsApptEncoder extends ApptEncoder
{
	public function encode()
	{
		return 'Appointment data encode in BloggsCal format\n';
	}
}

class MegaApptEncoder extends ApptEncoder
{
	public function encode()
	{
		return 'Appointment data encode in MegaCal format\n';
	}
}