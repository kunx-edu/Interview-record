<?php
namespace frontend\controllers;
use frontend\core\base\BaseController;
use Yii;

/**
 * 面试信息.
 * Class InfoController
 * @package frontend\controllers
 */
class InterviewController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdd()
    {
        $type = Yii::$app->request->get('type');
        echo "添加".$type;
        return $this->render('add');
    }
}