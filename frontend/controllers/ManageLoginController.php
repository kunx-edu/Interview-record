<?php

namespace frontend\controllers;

use common\core\base\Controller;
use common\helper\Helper;
use frontend\core\base\BaseManageController;
use frontend\models\Blacklist;
use frontend\models\Manage;
use frontend\models\Train;
use Yii;


/**
 * 继承了frontend下面的基础控制器.
 * Class TrainController
 * @package frontend\controllers
 */
class ManageLoginController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'public';
        $manage = new Manage();
        return $this->render('login', ['model'=>$manage]);
    }

    public function actionLogin()
    {
        $data = Yii::$app->request->getBodyParams();
        $manage = new Manage();

        if ($manage->load($data) && $manage->login($data)) {
            return json_encode(['status'=>'success', 'data'=>$manage->getErrors()]);
        } else {
            return json_encode(['status'=>'error', 'data'=>$manage->getErrors()]);
        }
    }
}