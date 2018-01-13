<?php
class ProductFacade
{
	private $products = array();
	
	public function __construct($file)
	{
		$this->file = $file;
		$this->compile();
	}
	
	private function compile()
	{
		$lines = getProductFileLines($this->file);
		foreach ($lines as $line) {
			$id = getIDFromLine($line);
			$name = getNameFromLine($line);
			$this->products[$id] = getProductObjectFromID($id, $name);
		}
	}
	
	public function getProducts()
	{
		return $this->products;
	}
	
	public function getProduct($id)
	{
		return $this->products[$id];
	}
}

// 客户端使用，从一个 log文件访问 Product对象
$facade = new ProductFacade('test.txt');
$facade->getProduct(234);