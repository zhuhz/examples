<?php
/**
 * 主体类接口
 *
 */
interface Observable
{
	public function attach(Observer $observer);
	public function detach(Observer $observer);
	public function notify();
}

class Login implements Observable
{
	const LOGIN_USER_UNKNOWN = 1;
	const LOGIN_WRONG_PASS = 2;
	const LOGIN_ACCESS = 3;
	private $status = array();
	private $observers;
	
	public function __construct()
	{
		$this->observers = array();
	}
	
	// 添加观察者
	public function attach(Observer $observer)
	{
		$this->observers[] = $observer;
	}
	
	// 移除观察者
	public function detach(Observer $observer)
	{
		$newobservers = array();
		foreach ($this->observers as $obs) {
			if (($obs !== $observer)) {
				$newobservers[] = $obs;
			}
		}
		$this->observers = $newobservers;
	}
	
	// 当发生系统事件时，通知观察者
	public function notify()
	{
		// 遍历观察者列表，调用每个观察者的 update()方法
		foreach ($this->observers as $obs) {
			$obs->update($this);
		}
	}
	
	public function handleLogin($user, $pass, $ip)
	{
		switch (rand(1, 3)) {
			case 3:
				$this->setStatus(self::LOGIN_ACCESS, $user, $ip);
				$ret = true;
				break;
			case 2:
				$this->setStatus(self::LOGIN_WRONG_PASS, $user, $ip);
				$ret = false;
				break;
			case 1:
				$this->setStatus(self::LOGIN_USER_UNKNOWN, $user, $ip);
				$ret = false;
				break;
		}
		$this->notify();
		return $ret;
	}
	
	public function setStatus($status, $user, $ip)
	{
		$this->status = array($status, $user, $ip);
	}
	
	public function getStatus()
	{
		return $this->status;
	}
}

include 'Observer.php';
// 客户端代码示例
$login = new Login();
new SecurityMonitor($login);
new GeneralLogger($login);
new PartnershipTool($login);
$login->handleLogin('Tom', '123456', '127.0.0.1');
