<?php
include_once 'Filesystem.php';

/**
 * 独立对象：文本文件类
 *
 */
class TextFile extends Filesystem
{
	public function getName()
	{
		return '文本文件：' . $this->name;
	}
	
	public function getSize()
	{
		return 10;
	}
}

/**
 * 独立对象2：图片文件类
 *
 */
class ImageFile extends Filesystem
{
	public function getName()
	{
		return '图片：' . $this->name;
	}
	
	public function getSize()
	{
		return 100;
	}
}
