<?php
function GetSum($m,$n)//递归
{
    if ($m == 1 || $n == 1)
        return 2;
    $total = GetSum($m - 1, $n) + GetSum($m, $n - 1);
    return $total;
}
$m = 1;
$n = 1;
print_r(GetSum($m,$n));
