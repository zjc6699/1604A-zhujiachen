<?php
$i = 0;
function binsearch($arr,$num){
    $count = count($arr);
    $lower = 0;
    $high = $count - 1;
    global $i;
    while($lower <= $high){
        $i ++;
        if($arr[$lower] == $num){
            return $lower;
        }
        if($arr[$high] == $num){
            return $high;
        }
        $middle = intval(($lower + $high) / 2);
        if($num < $arr[$middle]){
            $high = $middle - 1;
        }else if($num > $arr[$middle]){
            $lower = $middle + 1;
        }else{
            return $middle;
        }
    }
    return -1;
}
$arr = array(0,1,16,24,35,47,59,62,73,88,99);
$pos = binsearch($arr,62);
print($pos);