<?php
/**
 * 数据编码器（产品类）
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