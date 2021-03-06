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

    /**
     * 显示管理员列表.
     * @return mixed
     */
    public function getManageAll()
    {
        try{
            $res = Manage::find()->asArray()->all();
            return $res;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 查询管理员信息.
     * @param $username
     * @return mixed
     */
    public function getManageByUsername($username)
    {
        try{
            $res = Manage::find()->where(['username'=>$username])->asArray()->one();
            return $res;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 添加管理员.
     * @param $data
     * @return mixed
     */
    public function add($data)
    {
        try{
            $manage = new Manage();
            $manage->setAttributes($data);
            $manage->save();
            $id = $manage->getPrimaryKey();
            return $id;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 根据id来查询数据.
     * @param $id
     * @return mixed
     */
    public function getManageById($id)
    {
        try{
            $arr = Manage::find()->where(['id'=>$id])->asArray()->one();
            return $arr;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 修改.
     * @param $data
     * @return mixed
     */
    public function update($data)
    {
        try{
            $model = Manage::find()->where(['id'=>$data['id']])->one();
            $model->setAttributes($data);
            return $model->save();
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }
}