<?php
class RemoteControl
{
	public function submit(Command $command)
	{
		$command->execute();
	}
}

include 'Bulb.php';
include 'Command.php';

$bulb = new Bulb();

$turnOn = new TurnOn($bulb);
$turnOff = new TurnOff($bulb);

$remote = new RemoteControl();
$remote->submit($turnOn); // Bulb has been lit
$remote->submit($turnOff); // Darkness!