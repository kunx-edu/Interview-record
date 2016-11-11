<?php
/**
 * Created by PhpStorm.
 * User: office
 * Date: 2016/11/11
 * Time: 8:55
 */

namespace frontend\controllers;


use yii\base\Controller;

class RegisterController extends Controller
{
    /**
     * 注册显示页面的方法.
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}