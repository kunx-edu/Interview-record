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
        $this->layout = 'manage';
        return $this->render('index');
    }

    public function actionBlackList()
    {
        $this->layout = 'manage';
        $keyword = Yii::$app->request->get('keyword');

        //查询黑名单.
        $arr = Helper::getService('blacklist.blacklist')->getBlacklist($keyword);

        return $this->render('black-list-index', ['keyword'=>$keyword, 'arr'=>$arr]);
    }
    public function actionTrain()
    {
        $this->layout = 'manage';
        //接收传递过来的关键字.
        $keyword = Yii::$app->request->get('keyword');

        //查询所有的培训机构.
        $res = Helper::getService('Train.Train')->getTrainAll($keyword);

        return $this->render('train-index', ['keyword'=>$keyword, 'arr'=>$res]);
    }

}