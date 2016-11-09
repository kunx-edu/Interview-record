<?php

namespace frontend\controllers;

use common\core\base\Controller;
use Yii;

/**
 * 登录控制器.
 * Class LoginController
 * @package frontend\controllers
 */
class LoginController extends Controller{

    /**
     * 登录的方法.
     */
    public function actionIndex()
    {
//        return $this->render('index');
        echo "你没有登录";
    }

    public function actionLogin()
    {
        Yii::$app->session->set('student', true);
    }
}