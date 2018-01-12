<?php
include 'Settings.php';
include 'CommsManager.php';

class AppConfig
{
	private static $instance;
	private $commsManager;
	
	private function __construct()
	{	
		// 仅允许一次
		$this->init();
	}
	
	private function init()
	{
		switch (Settings::$COMMSTYPE) {
			case 'Mega':
				$this->commsManager = new MegaCommsManager();
				break;
			case 'Bloggs':
				$this->commsManager = new BloggsCommsManager();
				break;
		}
	}
	
	public static function getInstance()
	{
		if (empty(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function getCommsManager()
	{
		return $this->commsManager;
	}
}

$commsMgr = AppConfig::getInstance()->getCommsManager();
$commsMgr->make(1)->encode(); // Output: Appointment data encode in BloggsCal format\n