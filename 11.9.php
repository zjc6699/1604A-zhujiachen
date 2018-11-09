<?php
function Number2($arr)
{
    $length=count($arr);

    for($i=0;$i<$length;$i++){

        for($j=$i+1;$j<$length;$j++){

            if(($arr[$i].''.$arr[$j])>($arr[$j].''.$arr[$i])){
                $temp=$arr[$i];

                $arr[$i]=$arr[$j];

                $arr[$j]=$temp;
            }
        }
    }
    return (implode('',$arr));
}
$arr = [321,32,3];
$result=Number2($arr);

echo $result;





