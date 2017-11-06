<?php
/**
 * 账户基类
 *
 */
abstract class Account
{
	// 账户类型
	protected $successor;
	// 账户余额
	protected $balance;
	
	public function setNext(Account $account)
	{
		$this->successor = $account;
	}
	
	public function pay($amountToPay)
	{
		if ($this->canPay($amountToPay)) {
			echo sprintf('Paid %s using %s' . PHP_EOL, $amountToPay, get_called_class());
		} elseif ($this->successor) {
			echo sprintf('Cannot pay using %s. Proceeding ..' . PHP_EOL, get_called_class());
			$this->successor->pay($amountToPay);
		} else {
			throw new Exception('None of the accounts have enough balance');
		}
	}
	
	public function canPay($amount)
	{
		return $this->balance >= $amount;
	}
}

class Bank extends Account
{
	protected $balance;
	
	public function __construct($balance)
	{
		$this->balance = $balance;
	}
}

class Paypal extends Account
{
	protected $balance;
	
	public function __construct($balance)
	{
		$this->balance = $balance;
	}
}

class Bitcoin extends Account
{
	protected $balance;
	
	public function __construct($balance)
	{
		$this->balance = $balance;
	}	
}

// 通过定义的链接账户（即 Bank, Paypal, Bitcoin）形成责任链

$bank = new Bank(100);
$paypal = new Paypal(200);
$bitcoin = new Bitcoin(300);

$bank->setNext($paypal);
$paypal->setNext($bitcoin);

$bank->pay(259); 
// Output will be
// ==============
// Cannot pay using Bank. Proceeding ..
// Cannot pay using Paypal. Proceeding ..
// Paid 259 using Bitcoin
