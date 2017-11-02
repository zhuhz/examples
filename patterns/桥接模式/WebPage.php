<?php
/**
 * 网页接口
 *
 */
interface WebPage
{
	public function __construct(Theme $theme);
	public function getContent();
}

/**
 * 关于页面
 *
 */
class About implements WebPage
{
	protected $theme;
	
	public function __construct(Theme $theme)
	{
		$this->theme = $theme;
	}
	
	public function getContent()
	{
		return 'About page in ' . $this->theme->getColor();
	}
}

/**
 * 职业生涯页面
 *
 */
class Careers implements WebPage
{
	protected $theme;
	
	public function __construct(Theme $theme)
	{
		$this->theme = $theme;
	}
	
	public function getContent()
	{
		return 'Careers page in ' . $this->theme->getColor();
	}
}

