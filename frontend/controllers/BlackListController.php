<?php

namespace frontend\controllers;

use common\core\base\Controller;
use common\helper\Helper;
use frontend\core\base\BaseController;
use frontend\models\Blacklist;
use frontend\models\Train;
use Yii;


/**
 * 继承了frontend下面的基础控制器.
 * Class TrainController
 * @package frontend\controllers
 */
class BlackListController extends BaseController
{
    public function actionIndex()
    {
        $keyword = Yii::$app->request->get('keyword');

        //查询黑名单.
        $arr = Helper::getService('blacklist.blacklist')->getBlacklist($keyword);

        return $this->render('index', ['keyword'=>$keyword, 'arr'=>$arr]);
    }

    public function actionAdd()
    {
        $model = new Blacklist();
        return $this->render('add', ['model'=>$model]);
    }
}