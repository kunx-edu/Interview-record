<?php
/**
 * Created by PhpStorm.
 * User: office
 * Date: 2016/11/13
 * Time: 17:54
 */
namespace business\studentService\service;
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
}