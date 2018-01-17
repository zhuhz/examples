<?php
include 'CompositeUnit.php';

// 创建一个 Army 对象
$main_army = new Army();
// 添加一些 Unit 对象
$main_army->addUnit(new Archer());
$main_army->addUnit(new LaserCannonUnit());

// 创建一个新的 Army 对象
$sub_army = new Army();
// 添加一些 Unit 对象
$sub_army->addUnit(new Archer());
$sub_army->addUnit(new Archer());

// 把第二个 Army 对象添加到第一个 Army 对象中去
$main_army->addUnit($sub_army);

// 所有的攻击强度计算都在幕后进行
print $main_army->bombardStrength(); // 56