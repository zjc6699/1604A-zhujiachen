<?php

namespace app\controllers;
use Yii;
use app\models\user;
use yii\data\Pagination;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = user::find();
        $name=Yii::$app->request->post('name');
        $pages = new Pagination(['totalCount' => $query->where("name like '%$name%'")->count(),'pageSize'=>2]);
        $data = $query->where("name like '%$name%'")->offset($pages->offset)->orderBy('id')->limit($pages->limit)->all();
        return $this->render('index', ['data' => $data,'pages' => $pages,]);
    }

    public function actionDelete()
    {
        $id=YII::$app->request->get('id');
        $user=user::findOne($id)->delete();
        $this->redirect(['index']);
    }

    public function actionInsert()
    {
        return $this->render('insert');
    }

    public function actionInsert_do()
    {
        $user=new user();
        $name=YII::$app->request->post('name');
        $user->name=$name;
        $user->save();
        $this->redirect(['index']);
    }

    public function actionUpdate()
    {
        $id=YII::$app->request->get('id');
        $user=user::findOne($id);
        return $this->render('update',['data'=>$user]);
    }

    public function actionUpdate_do()
    {
        $id=YII::$app->request->get('id');
        $user=user::findOne($id);
        $name=YII::$app->request->post('name');
        $user->name=$name;
        $user->save();
        $this->redirect(['index']);
    }
}
