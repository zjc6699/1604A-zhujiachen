<?php
header("Content-type:text/html;charset=utf-8");
//计算三位数
$t=0;
for($i=1;$i<5;$i++)
{
    for($j=1;$j<5;$j++)
    {
        if($i!=$j)
        {
            for($a=1;$a<5;$a++)
            {
                if($a!=$i&&$a!=$j)
                {
                    echo $i.$j.$a.' ';
                    $t++;
                }
            }
        }
    }
}
echo '能组成'.$t.'个互不相同且无重复数字的三位数';

//单例模式
	// final修饰类->不能被继承
	final class single{
		// 定义一个私有属性，在构造方法中显示
		private $random;
		// 定义一个静态私有属性，为的是实例化后赋值给obj
		static private $obj;
		// 构造方法中random判断实例化的次数，并可进行比较
		private function __construct(){
			return $this->random=rand(1,999999999);
		}
		static public function getins(){
			// instanceof判断对象是否实例化
			if(self::$obj instanceof single)
			{
				return self::$obj;
			}else{
				return self::$obj = new single();
			}
		}
		// final类防止被克隆后实例化类被重写
		// public function __clone(){
		// 	echo "单例模式失败";
		// }
		private function __clone(){
			echo "单例模式失败";
		}
	}
	// 调用静态方法getins()验证实例化次数
	$sing = single::getins();
	$sings= single::getins();
	var_dump($sing);
	echo "
";
	var_dump($sings);
	echo "
";
	// 检测是否只实例化过一次(验证该类只有一个实例);
	if($sing == $sings)
	{
		echo "单例模式成功";
	}else{
		echo "单例模式失败";
	}

//遍历文件夹
function my_dir($dir) {
    $files = array();
    if(@$handle = opendir($dir)) { //注意这里要加一个@，不然会有warning错误提示：）
        while(($file = readdir($handle)) != false) {
            if($file != ".." && $file != ".") { //排除根目录；
                if(is_dir($dir."/".$file)) { //如果是子文件夹，就进行递归
                    $files[$file] = my_dir($dir."/".$file);
                } else { //不然就将文件的名字存入数组；
                    $files[] = $file;
                }
            }
        }
        closedir($handle);
        return $files;
    }
}
echo "<pre>";
print_r(my_dir("."));
echo "</pre>";

//求共同目录
$aPath=array(0=>"a",1=>"b",2=>"c",3=>"d",4=>"test.php");
$bPath=array(0=>"a",1=>"b",2=>"d",3=>"c",4=>"test.php");
$intersection = array_intersect_assoc($aPath, $bPath);
print_r($intersection);
?>

<!--倒计时-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>倒计时效果</title>

    <style type="text/css">
        .wrap {width:400px; margin:50px auto; color:#333; font-family:'\5FAE\8F6F\96C5\9ED1';}
        .wrap-date {font-size:0; list-style:none outside none; margin-top:8px;}
        .wrap-date li {width:80px; display:inline-block; *display:inline; *zoom:1; text-align:center; font-size:24px; background:hotPink; padding:1px 0 5px; margin-right:3px;}
        .date {font-family:Tahoma; font-size:50px; color:#fff;}
        #endTips {color:#999; background:#e9e9e9; line-height:2.4em; text-align:center; margin-top:15px;}
    </style>

</head>
<body onload="leftTimer()">
<div id="timer"></div>
</body>
</html>
<script type="text/javascript">
    var targetDate = '2019-1-1 ';  // 目标日期（活动截止时间）

    // 创建倒计时定时器
    var timer = window.setInterval(function(){
        RefreshTime(targetDate);
    },1000);

    function RefreshTime(targetDate){
        // 获取本地当前时间，截止时间 - 当前时间 = 倒计时时间
        var Today = new Date();
        var endDate = new Date(targetDate);
        var leftTime = endDate.getTime() - Today.getTime();
        var leftSecond = parseInt(leftTime / 1000);
        var Day = Math.floor(leftSecond / (60 * 60 * 24));
        var Hour = Math.floor((leftSecond - Day * 24 * 60 * 60) / 3600);
        var Minute = Math.floor((leftSecond - Day * 24 * 60 * 60 - Hour * 3600) / 60);
        var Second = Math.floor(leftSecond - Day * 24 * 60 * 60 - Hour * 3600 - Minute * 60);

        if (Day < 0) {
            clearInterval(timer); // 清除定时器
            document.getElementById('endTips').innerHTML = '活动已结束';
            document.getElementById('wrapDate').style.display = 'none';
            return;
        }

        // 写入容器
        document.getElementById('timeDay').innerHTML = Day;
        document.getElementById('timeHour').innerHTML = Hour;
        document.getElementById('timeMin').innerHTML = Minute;
        document.getElementById('timeSec').innerHTML = Second;
    }
</script>
</head>
<body>
<div class="wrap">
    倒计时：
    <ul class="wrap-date" id="wrapDate">
        <li><span id="timeDay" class="date">0</span><br />天</li>
        <li><span id="timeHour" class="date">0</span><br />时</li>
        <li><span id="timeMin" class="date">0</span><br />分</li>
        <li><span id="timeSec" class="date">0</span><br />秒</li>
    </ul>
    <div id="endTips"></div>
</div>
</body>
</html>