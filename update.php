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
<form action="index.php?r=user/update_do&id=<?php echo $data['id'];?>" method="post">
    <input type="hidden" name="_csrf" value="<?=YII::$app->request->csrfToken?>">
    <div class="form-group">
        <label for="name">名字</label>
        <input type="text" name="name" value="<?php echo $data['name'];?>" class="form-control">
    </div>
    <input type="submit" value="修改" class="btn btn-default">
</body>
</html>
