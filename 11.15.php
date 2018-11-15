<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Type;

class ApiController extends Controller
{
	public $enableCsrfValidation = false;
	public function actionIndex($token,$keyid)
	{
		if ($token==md5($keyid)) {
			$res = true;
		}else{
			$res = false;
		}
		return $res;
	}

	public function actionList()
	{
		$keyid = yii::$app->request->get('keyid');
		$token = md5($keyid);
		$res = $this->actionIndex($token,$keyid);
		if ($res) {
			$data = type::find()->asArray()->all();
		}else{
			$data = [
				'code'=>400,
				'msg'=>'错误调试'
			];
		}
		$data = json_encode($data);
		echo $data;
	}

	public function actionAdd()
	{
		$keyid = yii::$app->request->post('keyid');
		$token = md5($keyid);
		$type = yii::$app->request->post('type');
		$res = $this->actionIndex($token,$keyid);
		if ($res) {
			$model = new type();
			$model->t_name = $type;
			$model->save();
			$data = [
				'code'=>200,
				'msg'=>'添加成功'
			];
		}else{
			$data = [
				'code'=>400,
				'msg'=>'错误调试'
			];
		}
		$data = json_encode($data);
		echo $data;
	}

	public function actionDel()
	{
		$keyid = yii::$app->request->post('keyid');
		$token = md5($keyid);
		$id = yii::$app->request->post('id');
		$res = $this->actionIndex($token,$keyid);
		if ($res) {
			$res = type::findOne($id)->delete();
			$data = [
				'code'=>200,
				'msg'=>'删除成功'
			];
		}else{
			$data = [
				'code'=>400,
				'msg'=>'错误调试'
			];
		}
		$data = json_encode($data);
		echo $data;
	}

	public function actionSave()
	{
		$keyid = yii::$app->request->post('keyid');
		$token = md5($keyid);
		$id = yii::$app->request->post('id');
		$type = yii::$app->request->post('type');
		$res = $this->actionIndex($token,$keyid);
		if ($res) {
			$res=type::updateAll(['t_name'=>$type],['id'=>$id]);
			$data = [
				'code'=>200,
				'msg'=>'修改成功'
			];
		}else{
			$data = [
				'code'=>400,
				'msg'=>'错误调试'
			];
		}
		$data = json_encode($data);
		echo $data;
	}
}