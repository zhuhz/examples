<?php
include 'Sea.php';
include 'Plains.php';
include 'Forest.php';

class TerrainFactory
{
	private $sea;
	private $forest;
	private $plains;	
	
	public function __construct(Sea $sea, Plains $plains, Forest $forest)
	{
		$this->sea 	  	= $sea;
		$this->plains 	= $plains;
		$this->forest	= $forest;
	}
	
	public function getSea()
	{
		return clone $this->sea;
	}
	
	public function getPlains()
	{
		return clone $this->plains;
	}
	
	public function getForest()
	{
		return clone $this->forest;
	}
}

$factory = new TerrainFactory(new EarthSea(),
	new EarthPlains(),
	new EarthForest());
	
print_r($factory->getSea());
print_r($factory->getPlains());
print_r($factory->getForest());