<?php
/**
 * 安全代理类
 *
 */
class Security
{
	protected $door;
	
	public function __construct(Door $door)
	{
		$this->door = $door;
	}
	
	public function open($password)
	{
		if ($this->authenticate($password)) {
			$this->door->open();
		} else {
			echo 'Big no!';
		}
	}
	
	public function authenticate($password)
	{
		return $password === '@#$pass';
	}
	
	public function close()
	{
		$this->door->close();
	}
}

include 'Door.php';

$door = new Security(new LabDoor());
$door->open('invalid'); // Big no!

$door->open('@#$pass'); // Opening lab door
$door->close(); // Closing lab door