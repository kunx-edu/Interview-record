<?php
/**
 * 班级service.
 */
namespace business\classService\service;

use business\classService\model\ClassForm;
use business\common\BaseService;
use business\interFaces\classInterFace\IClassService;
use yii\base\Exception;
use Yii;

class ClassService extends BaseService implements IClassService
{

    /**
     * 根据学科来查询班级.
     * @param $name
     * @return mixed
     */
    public function getClassByType($name)
    {
        try{
            $class = new ClassForm();
            $res = $class->getClassByType($name);
            return $res;
        } catch (Exception $e) {
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 查询所有的班级.
     * @return mixed
     */
    public function getClassAll()
    {
        try{
            $arr = ClassForm::find()->asArray()->all();
            return $arr;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 添加班级.
     * @param $data
     * @return mixed
     */
    public function add($data)
    {
        try{
            $model = new ClassForm();
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
     * 根据id 来删除数据.
     * @param $id
     * @return mixed
     */
    public function del($id)
    {
        try{
            $model = ClassForm::find()->where(['id'=>$id])->one();
            $res = $model->delete();
            return $res;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }
}