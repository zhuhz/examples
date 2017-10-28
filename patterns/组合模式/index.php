<?php
/*
 * home
 * |--text1.txt
 * |--bg.png
 * |--source
 * |  |--text2.txt
 * 
 */
include_once 'Dir.php';
include_once 'File.php';

// 创建 home目录，并加入两个文件
// 派生类没有定义构造函数，则会使用基类的构造函数
$dir = new Dir('home');
$dir->add(new TextFile('text1.txt'));
$dir->add(new ImageFile('bg1.png'));

// 在 home下创建子目录 source
$subDir = new Dir('source');
$dir->add($subDir);

// 创建一个 text2.txt，并放到子目录 source中
$text2 = new TextFile('text2.txt');
$subDir->add($text2);

//打印信息
echo $text2->getName(),'-->',$text2->getSize();
echo '<br/>';
echo $subDir->getName(),'-->',$subDir->getSize();
echo '<br/>';
echo $dir->getName(),'-->',$dir->getSize();