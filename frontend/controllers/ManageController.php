<?php

namespace frontend\controllers;

use common\core\base\Controller;
use common\helper\Helper;
use frontend\core\base\BaseManageController;
use frontend\models\Blacklist;
use frontend\models\Train;
use Yii;


/**
 * 继承了frontend下面的基础控制器.
 * Class TrainController
 * @package frontend\controllers
 */
class ManageController extends BaseManageController
{
    public function actionIndex()
    {
        $keyword = Yii::$app->request->get('keyword');
    }

    public function actionLogin()
    {
        return $this->render('login');
    }
}