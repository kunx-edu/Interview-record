<?php

namespace frontend\controllers;

use common\core\base\Controller;
use frontend\core\base\BaseController;
use Yii;


/**
 * 继承了frontend下面的基础控制器.
 * Class TrainController
 * @package frontend\controllers
 */
class TrainController extends BaseController
{
    /**
     * 显示培训机构的列表.
     * @return string
     */
    public function actionIndex()
    {
        //接收传递过来的关键字.
        $keyword =
        return $this->render('index');
    }
}