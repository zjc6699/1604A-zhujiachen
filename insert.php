<?php
if(isset($_POST['name']) && !empty($_POST['name'])){
	$dsn = "mysql:host=localhost;dbname=lianxi";
	$db = new PDO($dsn, 'root', 'root');
	$db->query('set names utf8');
    $name  = $_POST['name'];
    $sex  = $_POST['sex'];
    $age  = $_POST['age'];
	$sql="insert into user (name,sex,age) values('$name','$sex','$age')";
	$r = $db->exec($sql);
	if($r){
		echo "<script>window.location.href='index.php/?c=index/index';</script>";
	}else{
		echo "<script>alert('添加失败')</script>";
	}
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="insert.php" method="post">
		姓名：<input type="text" name="name">
        性别：<input type="text" name="sex">
        年龄：<input type="text" name="age">
		<button>提交</button>
	</form>
</center>
</body>
</html>