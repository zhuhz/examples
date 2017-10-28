<?php
include_once 'Observer.php';
include_once 'Observable.php';

// 创建观察者对象
$email = new Email();
$message = new Message();
$log = new Log();
// 创建订单对象
$order = new Order();

// 向订单对象中注册3个观察者
$order->attach($email);
$order->attach($message);
$order->attach($log);
// 添加订单时自动发送通知给观察者
$order->addOrder();

echo '<br/>';

// 删除记录日志观察者
$order->detach($log);
// 添加另一个订单，再次发送通知 给观察者
$order->addOrder();