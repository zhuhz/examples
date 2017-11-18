<?php
/**
 * 策略接口
 *
 */
interface OutputStrategy
{
	public function render($array);
}

/**
 * 策略实现类 1
 * @return 返回序列化字符串
 *
 */
class SerializeStrategy implements OutputStrategy
{
	public function render($array)
	{
		return serialize($array);
	}
}

/**
 * 策略实现类 2
 * @return 返回 JSON编码后的字符串
 *
 */
class JsonStrategy implements OutputStrategy
{
	public function render($array)
	{
		return json_encode($array);
	}
}

/**
 * 策略实现类 3
 * @return 直接返回数组
 *
 */
class ArrayStrategy implements OutputStrategy
{
	public function render($array)
	{
		return $array;
	}
}