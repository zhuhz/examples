<?php
/**
 * 访问者接口
 *
 */
interface AnimalOperation
{
	public function visitMonkey(Monkey $monkey);
	public function visitLion(Lion $lion);
}

/**
 * 实现访问者
 *
 */
class Speak implements AnimalOperation
{
	public function visitMonkey(Monkey $monkey)
	{
		$monkey->shout();
	}
	
	public function visitLion(Lion $lion)
	{
		$lion->roar();
	}
}

include 'Animal.php';

$monkey = new Monkey();
$lion = new Lion();

$speak = new Speak();

$monkey->accept($speak); // Ooh oo aa aa!
$lion->accept($speak); // Roaaar!

// 当需要为动物添加新动作时，不必修改动物类。
// 通过创建一个新的访问者向动物添加跳跃行为。

class Jump implements AnimalOperation
{
	public function visitMonkey(Monkey $monkey)
	{
		// to do
	}
	
	public function visitLion(Lion $lion)
	{
		// to do
	}
}
