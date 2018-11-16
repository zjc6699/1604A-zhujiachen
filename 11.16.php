<?php
/**
 * Created by PhpStorm.
 * User: 朱家琛
 * Date: 2018/11/13
 * Time: 8:29
 */
function FirstNotRepeatingChar($str)
{
    $a = array(); //1、两个数组，一个存字母，一个存字母出现的次数
    $b = array();
    for($i=0;$i<strlen($str);$i++){
        if(!isset($a[$str[$i]])){ //2、isset函数的使用
            $a[$str[$i]] = 1;
            $b[$str[$i]] = $i;
        }else{
            $a[$str[$i]] ++;
        }
    }
    foreach($a as $k=>$v){
        if($v==1){
            return $b[$k];
        }
    }
    return -1;
}

