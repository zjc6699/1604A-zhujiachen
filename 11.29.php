<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    数组：





    array_value() 返回数组中所有的值
    sort() 给数组按照正序排序
    rsort() 给数组按照逆序排序
    ksort() 给数组按照键名正序排序
    krsort() 给数组按照键名逆序排序

    字符串：
    echo 输出字符串
    explode 使用一个字符串分割另一个字符串
    strstr 查找字符串首次出现的位置
    print 输出字符串
    printf 输出格式化字符串
    str_replace 字符串替换
    strlen 获取字符串长度
    trim 去除字符串两边的空格
    rtrim 去除字符串右边的空格
    ltrim 去除字符串左边的空格
<br/>
</body>
</html>
<?php
//array_merge() 将两个数组合并
$a=array(1,2,3);
$b=array(4,5,6);
$c=array_merge($a,$b);
print_r($c);

//array_sum() 求数组中的合
$a=array(1,2,3);
$b=array_sum($a);
echo $b;

//array_unique() 去掉数组中重复的数
$a=array(1,2,3,1,2);
$b=array_unique($a);
print_r($b);

//array_file() 用给定的值填充数组
$a=array_fill(1,4,3);
print_r($a);

//array_keys() 返回数组中所有的键名
$a=array(1,2,3);
$b=array_keys($a);
print_r($b);
?>