<?php
/**
 * 被观察者接口
 *
 */
interface Observable
{
	// 添加（注册）观察者
	public function attach(Observer $observer);
	// 删除观察者
	public function detach(Observer $observer);
	// 触发通知
	public function notify();
}

/**
 * 被观察者
 * 职责：添加观察者到 $observers属性中
 * 有变动时通过 notify()方法运行通知
 *
 */
class Order implements Observable
{
	// 保存观察者
	private $observers = array();
	// 订单状态
	private $state = 0;
	
	// 添加（注册）观察者
	public function attach(Observer $observer)
	{
		$key = array_search($observer, $this->observers);
		if($key === false){
			$this->observers[] = $observer;
		}
	}
	
	// 移除观察者
	public function detach(Observer $observer)
	{
		$key = array_search($observer, $this->observers);
		if($key !== false){
			unset($this->observers[$key]);
		}
	}
	
	// 遍历调用观察者的 update()方法进行通知，不关心其具体实现方式
	public function notify()
	{
		foreach($this->observers as $observer){
			// 把本类对象传给观察者，以便观察者获取当前类对象的信息
			$observer->update($this);
		}
	}
	
	// 订单状态有变化时发送通知（通知的方式）
	public function addOrder()
	{
		$this->state = 1; // 状态值应该是根据实际订单状态获取，此处演示就写死了
		$this->notify();
	}
	
	// 获取提供给观察者的状态
	public function getState()
	{
		return $this->state;
	}
}