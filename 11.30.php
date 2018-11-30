<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="//cdn.bootcss.com/jquery/1.12.3/jquery.min.js"></script>
    <script src="layer/mobile/layer.js"></script>
    <script src="layer/mobile/need/layer.css"></script>
    <script src="layer/layer.js"></script>
    <script src="layer/theme/default/layer.css"></script>
</head>
<body>
<center>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>名字</td>
            <td>操作</td>
        </tr>
        <tr id="a">
            <td>1</td>
            <td>朱家琛</td>
            <td><button>删除</button></td>
        </tr>
    </table>
</center>
</body>
</html>
<script type="text/javascript">
    $('button').click(function () {
        layer.confirm('是否删除？', {
            btn: ['是', '否'] //按钮
        }, function () {
            layer.msg('删除成功', {icon: 1,anim: 6});
            $('#a').hide();
        }, function () {
            layer.msg('也可以这样！',{anim: 4});
        });
    });
</script>