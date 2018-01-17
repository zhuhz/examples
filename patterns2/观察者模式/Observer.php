<?php
/**
 * 观察者接口
 *
 */
interface Observer
{
	public function update(Observable $observable);
}

/**
 * 抽象超类，负责保证它们的主体是正确的类型（此处即 Login对象）
 *
 */
abstract class LoginObserver implements Observer
{
	private $login;
	
	public function __construct(Login $login)
	{
		$this->login = $login;
		$login->attach($this); // 将自己添加到主体上
	}
	
	public function update(Observable $observable)
	{
		if ($observable === $this->login) {
			$this->doUpdate($observable);
		}
	}
	
	abstract function doUpdate(Login $login);
}

//----------- 创建一批 LoginObserver对象 --------------

class SecurityMonitor extends LoginObserver
{
	public function doUpdate(Login $login)
	{
		$status = $login->getStatus();
		if ($status[0] == Login::LOGIN_WRONG_PASS) { // 用户登录失败时
			// 发送邮件给系统管理员
			print __CLASS__ . ":\tsending mail to sysadmin\n";
		}
	}
}

class GeneralLogger extends LoginObserver
{
	public function doUpdate(Login $login)
	{
		$status = $login->getStatus();
		// 记录登录数据到日志
		print __CLASS__ . ":\tadd login data to log\n";
	}
}

class PartnershipTool extends LoginObserver
{
	public function doUpdate(Login $login)
	{
		$status = $login->getStatus();
		// 检查IP地址
		// 如果匹配列表，则设置 cookie
		print __CLASS__ . ":\ttest cookie if IP matches a list\n";
	}
}