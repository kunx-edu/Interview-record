<?php
/**
 * Created by PhpStorm.
 * User: office
 * Date: 2016/11/11
 * Time: 8:55
 */

namespace frontend\controllers;


use frontend\models\StudentRegisterForm;
use yii\base\Controller;
use Yii;

class RegisterController extends Controller
{
    /**
     * 注册显示页面的方法.
     */
    public function actionIndex()
    {
        $model = new StudentRegisterForm();
        return $this->render('index', ['model'=>$model]);
    }

    /**
     * 注册的主方法.
     */
    public function actionReg()
    {
        //获取post发送过来的参数.
        $req = Yii::$app->request->getBodyParams();

        $model = new StudentRegisterForm();

        //注册.
        if ($model->load($req) && $model->register($req['StudentRegisterForm'])) {
            return json_encode(['status'=>'success','data'=>$model->getErrors()]);
        } else {
            return json_encode(['status'=>'error','data'=>$model->getErrors()]);
        }
    }
}