<?php

header("content-type:text/html;charset=utf-8");
$pdo = new PDO("mysql:host=localhost;dbname=lianxi;charset=utf8",'root','root');
$sql = "SELECT * FROM user";
$db  = $pdo->query($sql)->fetchAll();
$total = count($db);
$num = 2;
$cpage = isset($_GET['page'])?$_GET['page']:1;
$pagenum = ceil($total/$num);
$offset = ($cpage-1)*$num;
$sql = "SELECT * FROM user limit {$offset},{$num}";
$data  = $pdo->query($sql)->fetchAll();
$start = $offset+1;
$end=($cpage==$pagenum)?$total : ($cpage*$num);//结束记录页
$next=($cpage==$pagenum)? 0:($cpage+1);//下一页
$prev=($cpage==1)? 0:($cpage-1);//前一页
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="/public/jq.js"></script>
    <script src="/public/layer/layer.js"></script>
</head>
<body>
<center>
    <div>
        <a href="/view/insert.php" methods="post">添加</a>
        <table border="1">
            <tr>
                <td>ID</td>
                <td>姓名</td>
                <td>性别</td>
                <td>年龄</td>
                <td colspan="2" align="center">操作</td>
            </tr>
            <?php foreach ($data as $k => $v) {  ?>
                <tr fid="<?=$v['id']?>">
                    <td><?php echo $v['id']?></td>
                    <td><?php echo $v['name'] ?></td>
                    <td><?php echo $v['sex'] ?></td>
                    <td><?php echo $v['age'] ?></td>
                    <td><a href="javascript:void(0)" class="del">删除</a></td>
                    <td><a href="javascript:void(0)" class="update">修改</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</center>
</body>
</html>
<center>
<?php
echo "共<b>$total</b>条记录，本页显示<b>{$start}-{$end}</b> {$cpage}/{$pagenum}";

if($cpage==1)
    echo "  首页  ";
else
    echo "  <a href='?c=index/index&&page=1'>首页</a>  ";
if($prev)
    echo "  <a href='?c=index/index&&page={$prev}'>上一页</a>  ";
else
    echo "  上一页  ";
if($next)
    echo "  <a href='?c=index/index&&page={$next}'>下一页</a>  ";
else
    echo "  下一页  ";
if($cpage==$pagenum)
    echo "  尾页  ";
else
    echo "  <a href='?c=index/index&&page={$pagenum}'>尾页</a>  ";
?>
</center>
<script type="text/javascript">
    $('.del').click(function () {
        var id = $(this).closest('tr').attr('fid');
        layer.msg('确定删除吗？', {
            time: 0 //不自动关闭
            ,btn: ['必须啊', '丑到爆']
            ,yes: function(index){
                $.ajax({
                    url:'index.php?c=index/del',
                    data:{id:id},
                    dataType:'json',
                    type:'post',
                    success:function (e) {
                        if(e==1){
                            layer.close(index);
                            window.location.reload();
                        }else {
                            layer.msg('删除失败', function(){
                            });
                        }
                    }
                })
            }
        });
    });

    $('.update').click(function(){
        var id=$(this).closest('tr').attr('fid');
            layer.open({
                type: id,
                area:['500px','300px'],
                skin: 'layui-layer-demo', //样式类名
                closeBtn: 1, //不显示关闭按钮
                anim: 2,
                content:'<form action="?c=index/update" method="post">\n' +
                    '    <table>\n' +
                    '        <tr><td><input type="hidden" value="'+id+'" name="id"></td></tr>\n' +
                    '        <tr><td>姓名：<input type="text" name="name"></td></tr>\n' +
                    '        <tr><td>性别：<input type="text" name="sex"></td></tr>\n' +
                    '        <tr><td>年龄：<input type="text" name="age"></td></tr>\n' +
                    '        <tr><td><input type="submit" value="修改"></td></tr>\n' +
                    '    </table>\n' +
                    '</form>'
                });
    })
</script>