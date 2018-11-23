<?php
use yii\widgets\LinkPager;
?>
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
<table class="table">
    <a href="index.php?r=user/insert" class="btn btn-default">添加</a>
    <form action="index.php?r=user/index" method="post">
        <input type="hidden" name="_csrf" value="<?=YII::$app->request->csrfToken?>">
        <input type="text" name="name">
        <input type="submit" value="搜索">
    </form>
    <tr>
        <td>ID</td>
        <td>名字</td>
        <td>时间</td>
        <td>操作</td>
    </tr>
    <?php foreach ($data as $k => $v) { ?>
        <tr>
            <td><?php echo $k+1;?></td>
            <td><?php echo $v['name'];?></td>
            <td><?php echo date('Y-m-d H:i:s'); ?></td>
            <td><a href="index.php?r=user/delete&id=<?php echo $v['id'];?>" class="btn btn-success btn-xs">删除</a></td>
            <td><a href="index.php?r=user/update&id=<?php echo $v['id'];?>" class="btn btn-success btn-xs">修改</a></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
<?php
echo LinkPager::widget(['pagination' => $pages]);
?>
