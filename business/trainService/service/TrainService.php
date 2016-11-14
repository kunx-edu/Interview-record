<?php
/**
 * Created by PhpStorm.
 * User: office
 * Date: 2016/11/13
 * Time: 17:54
 */
namespace business\trainService\service;
use business\common\BaseService;
use business\interFaces\trainInterFace\ITrainService;
use business\trainService\model\Train;
use yii\base\Exception;
use Yii;

class TrainService extends BaseService implements ITrainService{

    /**
     * 查询所有的培训公司.
     * @param $keyword
     * @return mixed
     */
    public function getTrainAll($keyword)
    {
        try {
            $model = new Train();
            $res = $model->getTrainAll($keyword);
            return $res;
        } catch (Exception $e) {
            Yii:error($e->getMessage());
            return false;
        }
    }

    /**
     * 根据名称来查询.
     * @param $train_name
     * @return mixed
     */
    public function getTrain($train_name)
    {
        try{

            $model = new Train();
            $res = $model->getTrain($train_name);
            return $res;
        } catch(Exception $e) {
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 添加到数据库.
     * @param $data
     * @return mixed
     */
    public function add($data)
    {
        try{
            $model = new Train();
            $data['Train']['is_delete'] = 0;

            if (empty($data['Train']['is_validate'])) {
                $data['Train']['is_validate'] = 0;
            }
            $model->setAttributes($data['Train']);
            $model->save();
            return $model->getPrimaryKey();
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 根据id来删除招聘公司.
     * @param $id
     * @return mixed
     */
    public function del($id)
    {
        try{
            $train = Train::find()->where(['id'=>$id])->one();
            $train->is_delete = 1;
            return $train->save();
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }
}