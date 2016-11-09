<?php

namespace frontend\controllers;

use common\core\base\Controller;

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
//        $this->layout = "public";
        return $this->render('index');
    }
}