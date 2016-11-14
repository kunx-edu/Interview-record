<?php
/**
 * 班级service.
 */
namespace business\blacklistService\service;

use business\blacklistService\model\Blacklist;
use business\classService\model\ClassForm;
use business\common\BaseService;
use business\interFaces\blacklistInterFace\IBlacklistService;
use yii\base\Exception;
use Yii;

class BlacklistService extends BaseService implements IBlacklistService
{

    /**
     * 查询黑名单公司列表.
     * @return mixed
     */
    public function getBlackList($keyword)
    {
        try{
            $model = new Blacklist();
            $res = $model->getBlackList($keyword);
            return $res;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 查询是否已经存在.
     * @param $name
     * @return mixed
     */
    public function getBlack($name)
    {
        try{

            $model = new Blacklist();
            $res = $model->getBlack($name);
            return $res;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 添加黑名单公司的方法.
     * @param $data
     * @return bool|mixed
     */
    public function add($data)
    {
        try{
            $model = new Blacklist();
            $model->setAttributes($data);
            $model->save();
            $id = $model->getPrimaryKey();
            return $id;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 根据id删除黑名单公司.
     * @param $id
     * @return mixed
     */
    public function del($id)
    {
        try{
            $model = Blacklist::find()->where(['id'=>$id])->one();
            $model->is_delete = 1;
            return $model->save();
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }
}