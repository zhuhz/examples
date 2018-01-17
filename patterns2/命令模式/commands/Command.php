<?php
/**
 * 抽象的命令类
 *
 */
abstract class Command
{
	abstract function execute(CommandContext $context);
}
