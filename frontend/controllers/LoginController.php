<?php

namespace frontend\controllers;

use common\core\base\Controller;
use common\helper\ConstHelper;
use frontend\models\StudentLoginForm;
use Yii;

/**
 * 登录控制器.
 * Class LoginController
 * @package frontend\controllers
 */
class LoginController extends Controller{

    private $student;

    public function student()
    {
        if (empty($this->student)) {
            $this->student = new StudentLoginForm();
        }
        return $this->student;
    }
    /**
     * 登录的方法.
     */
    public function actionIndex()
    {
        return $this->render('index', ['model'=>$this->student()]);
    }

    public function actionLogin()
    {
        //接收post请求发送过来的参数.
        $req = Yii::$app->request->getBodyParams();

        $model = new StudentLoginForm();

        if ($model->load($req) && $model->login($req['StudentLoginForm'])) {
            echo "登录成功";
        } else {
            return json_encode($model->getErrors());
        }

    }
}