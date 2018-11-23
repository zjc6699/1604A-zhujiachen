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
    <form action="index.php?r=user/insert_do" method="post">
    <input type="hidden" name="_csrf" value="<?=YII::$app->request->csrfToken?>">
    <div class="form-group">
        <label>名字</label>
    <input type="text" class="form-control" name="name">
    </div>
<input type="submit" value="添加" class="btn btn-default">
</body>
</html>