<?php

namespace frontend\controllers;

use common\core\base\Controller;

/**
 * 继承了frontend下面的基础控制器.
 * Class IndexController
 * @package frontend\controllers
 */
class IndexController extends Controller
{
    /**
     * 显示选择学科的方法.
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}