<?php
/**
 * 观察者接口
 *
 */
interface Observer
{
	// 接收到通知的处理方法
	// 每个观察者都必须实现此方法，这是接收被观察者通知的唯一渠道
	public function update(Observable $observable);
}

/**
 * 观察者1：发送邮件
 *
 */
class Email implements Observer
{
	public function update(Observable $observable)
	{
		$state = $observable->getState();
		if($state){
			echo '发送邮件：您已经成功下单。';
		}else{
			echo '发送邮件：下单失败，请重试。';
		}
	}
}

/**
 * 观察者2：短信通知
 *
 */
class Message implements Observer
{
	public function update(Observable $observable)
	{
		$state = $observable->getState();
		if($state){
			echo '短信通知：您已下单成功。';
		}else{
			echo '短信通知：下单失败，请重试。';
		}
	}
}

/**
 * 观察者3：记录日志
 *
 */
class Log implements Observer
{
	public function update(Observable $observable)
	{
		echo '记录日志：生成了一个订单记录。';
	}
}