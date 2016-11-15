<?php
/**
 * 班级service.
 */
namespace business\blacklistService\service;

use business\blacklistService\model\Blacklist;
use business\classService\model\ClassForm;
use business\common\BaseService;
use business\interFaces\blacklistInterFace\IBlacklistService;
use business\trainService\model\Train;
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

    /**
     * 查询出所有的待审核的黑名单和培训公司.
     * @return mixed
     */
    public function getNotValidateAll()
    {
        try{
            //查询培训公司.
            $trainArr = Train::find()->where(['is_validate'=>0])->asArray()->all();
            //查询黑名单.
            $blackArr = Blacklist::find()->where(['is_validate'=>0])->asArray()->all();

            //加上各自的类型.
            foreach ($trainArr as $k => $v) {
                $trainArr[$k]['note'] = '培训公司';
                $trainArr[$k]['type'] = 'train';
                $trainArr[$k]['name'] = $v['train_name'];
                unset($trainArr[$k]['train_name']);
            }

            foreach ($blackArr as $K => $v) {
                $blackArr[$K]['note'] = '黑名单';
                $blackArr[$K]['type'] = 'blacklist';
            }

            //合并成一个.
            $arr = array_merge($trainArr, $blackArr);
            return $arr;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 审核是否通过.
     * @param $id
     * @param $status
     * @return mixed
     */
    public function excamine($id, $status)
    {
        try{
            $black = Blacklist::find()->where(['id'=>$id])->one();
            $black->is_validate = $status;
            return $black->save();
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }
}