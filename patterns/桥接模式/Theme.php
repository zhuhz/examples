<?php
/**
 * 独立的主题接口
 *
 */
interface Theme
{
	public function getColor();
}

/**
 * 深色主题类
 *
 */
class DarkTheme implements Theme
{
	public function getColor()
	{
		return 'Dark Black';
	}
}

/**
 * 浅色主题类
 *
 */
class LightTheme implements Theme
{
	public function getColor()
	{
		return 'Off white';
	}
}

/**
 * 浅绿色主题类
 *
 */
class AquaTheme implements Theme
{
	public function getColor()
	{
		return 'Light blue';
	}
}
