<?php
interface Door
{
	public function open();
	public function close();
}

class LabDoor implements Door
{
	public function open()
	{
		echo 'Opening lab door';
	}
	
	public function close()
	{
		echo 'Closing lab door';
	}
}