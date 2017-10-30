<?php
/**
 * 适配器接口，所有的支付适配器都需要实现这个接口。
 * 不管第三方支付实现方式如何，对于客户端来说，都
 * 使用 pay()方法完成支付
 */
interface PayAdapter
{
	public function pay();
}

/**
 * 支付宝适配器
 *
 */
class AlipayAdapter implements PayAdapter
{
	public function __construct()
	{
		include_once 'Alipay.php';
	}
	
	public function pay()
	{
		// 实例化 Alipay类，并用 Alipay的方法实现支付
		$alipay = new Alipay();
		$alipay->sendPayment();
	}
}

/**
 * 微信支付适配器
 *
 */
class WechatAdapter implements PayAdapter
{
	public function __construct()
	{
		include_once 'WechatPay.php';
	}	
	
	public function pay()
	{
		// 实例化 WechatPay类，并用 WechatPay的方法实现支付
		// 注意，微信支付的方式和支付宝的支付方式不一样，但是
		// 适配之后，它们都能使用 pay()来实现支付功能。
		$wechatPay = new WechatPay();
		$wechatPay->scan();
		$wechatPay->doPay();
	}
}

//$alipay = new AlipayAdapter();
//$alipay->pay();

$wechat = new WechatAdapter();
$wechat->pay();