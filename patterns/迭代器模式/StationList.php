<?php
use Countable;
use Iterator;

include 'RadioStation.php';

/**
 * 迭代器
 *
 */
class StationList 
{
	protected $stations = [];

	protected $counter;
	
	public function addStation(RadioStation $station)
	{
		$this->stations[] = $station;
	}
	
	public function removeStation(RadioStation $toRemove)
	{
		$toRemoveFrequency = $toRemove->getFrequency();
		$this->stations = array_filter($this->stations, function(RadioStation $station) use ($toRemoveFrequency){
			return $station->getFrequency() !== $toRemoveFrequency;
		});
	}
	
	public function count()
	{
		return count($this->stations);
	}
	
	public function current()
	{
		return $this->stations[$this->counter];
	}
	
	public function key()
	{
		return $this->counter;
	}
	
	public function next()
	{
		$this->counter++;
	}
	
	public function rewind()
	{
		$this->counter = 0;
	}
	
	public function valid()
	{
		return isset($this->stations[$this->counter]);
	}
}

$stationList = new StationList();

$stationList->addStation(new RadioStation(89));
$stationList->addStation(new RadioStation(101));
$stationList->addStation(new RadioStation(103.2));

foreach ($stationList as $station) {
	echo $station->getFrequency() . PHP_EOL;
}

$stationList->removeStation(new RadioStation(89));