<?php

namespace frontend\controllers;

use frontend\core\base\BaseController;

/**
 * 继承了frontend下面的基础控制器.
 * Class IndexController
 * @package frontend\controllers
 */
class IndexController extends BaseController
{
    /**
     * 显示选择学科的方法.
     */
    public function actionIndex()
    {
//        $this->layout = "public";
//        echo 123;
//        return $this->render('index');
        return $this->render('index');
    }
}