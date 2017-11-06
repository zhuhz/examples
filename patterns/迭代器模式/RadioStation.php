<?php
/**
 * 无线电台类
 *
 */
class RadioStation
{
	protected $frequency; // 频率
	
	public function __construct($frequency)
	{
		$this->frequency = $frequency;
	}
	
	public function getFrequency()
	{
		return $this->frequency;
	}
}