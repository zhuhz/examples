<?php
include 'CompositeUnit.php';
include 'ArmyVisitor.php';
// 客户端调用代码示例一
$main_army = new Army();
$main_army->addUnit(new Archer());
$main_army->addUnit(new LaserCannonUnit());
$textdump = new TextDumpArmyVisitor();
$main_army->accept($textdump);
print $textdump->getText();

/*
 * 执行结果如下：
 * -----------------------------------
 * Army: bombard: 48
 *     Archer: bombard: 4
 *     LaserCannonUnit: bombard: 44
 * -----------------------------------
 */

// 客户端调用代码示例二
$main_army = new Army();
$main_army->addUnit(new Archer());
$main_army->addUnit(new LaserCannonUnit());
$taxcollector = new TaxCollectionVisitor();
$main_army->accept($taxcollector);
print $taxcollector->getReport()."\n"; 

/*
 * 执行结果如下：
 * -----------------------------------
 * Tax levied for Army: 1
 * Tax levied for Archer: 2
 * Tax levied for LaserCannonUnit: 3
 * -----------------------------------
 */