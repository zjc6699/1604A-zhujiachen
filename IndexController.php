<?php
/**
 * Created by PhpStorm.
 * User: 朱家琛
 * Date: 2018/11/2
 * Time: 11:07
 */
class IndexController extends display
{
    public function index()
    {
        $this->fetch('index.php');
    }

    public function del(){
        $id = $_POST['id'];
        $dsn = "mysql:host=localhost;dbname=lianxi";
        $db = new PDO($dsn, 'root', 'root');
        $db->query('set names utf8');
        $sql = "delete from user where id=".$id;
        $r = $db->exec($sql);
        if($r){
            echo 1;

        }else{
            echo 2;
        }
    }

    public function update()
    {
        $name  = $_POST['name'];
        $sex  = $_POST['sex'];
        $age  = $_POST['age'];
        $dsn = "mysql:host=localhost;dbname=lianxi";
        $db = new PDO($dsn, 'root', 'root');
        $db->query('set names utf8');
        $id  = $_POST['id'];
        $sql = "update user set name='$name',sex='$sex',age='$age'where id=$id";
        $r = $db->exec($sql);
        echo "<script>window.location.href='index.php/?c=index/index';</script>";
    }
}
