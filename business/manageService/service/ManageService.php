<?php

namespace business\manageService\service;

use business\common\BaseService;
use business\interFaces\manageInterFace\IManageService;
use business\manageService\model\Manage;
use yii\base\Exception;
use Yii;

class ManageService extends BaseService implements IManageService
{

    public function login($username)
    {
        try {
            $model = new Manage();
            $res = $model->find()->where(['username'=>$username])->asArray()->one();
            return $res;
        } catch(Exception $e) {
            Yii::error($e->getMessage());
            return false;
        }
    }
}