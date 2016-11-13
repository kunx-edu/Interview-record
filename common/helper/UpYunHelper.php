<?php
/**
 * 又拍云上传的方法.
 */

namespace common\helper;
use Yii;
use yii\base\Exception;

class UpYunHelper extends BaseUploadHelper
{
    public $message;
    //空间名称.
    private $bucketName;
    //操作人员.
    private $operatorName;
    //操作人员密码.
    private $operatorPwd;
    //返回地址.
    private $visit_url;

    public function __construct()
    {
        parent::__construct();
        $this->bucketName   = Yii::$app->params['upload_message']['upyun_bucket_name'];
        $this->operatorName = Yii::$app->params['upload_message']['upyun_operator_name'];
        $this->operatorPwd  = Yii::$app->params['upload_message']['upyun_operator_pwd'];
        $this->visit_url    = Yii::$app->params['upload_message']['visit_url'];
    }

    /**
     * 上传单个文件的方法.
     * 调用方式：
     * $up = UploadFactoryHelper::Factory();
     * $up 为上传云服务类的对象.
     * 上传单个文件的方法.
     * $res = $up->uploadOne('文件域的name');
     * $res为返回的完整的上传路径.
     * @param $name 上传文本域名称.
     * @param $fix 上传文本的后缀名.
     * @return bool|string 返回上传文件的完整路径，包括调用路径.
     */
    public function uploadOne($name, $fixs = ['.png','.jpg','.jpeg','.gif'])
    {
        //判断文件是否超过大小.
//        var_dump($fixs);exit;
        if ($_FILES[$name]['error'] == 1) {
            return ['status'=>false,'message'=>"文件太大无法上传"];
        }

        //判断是否允许该格式的文件上传.
        $fix = $this->getFileFix($_FILES[$name]['name']);

        if (!in_array($fix, $fixs)) {
            return ['status'=>false,'message'=>"该文件不能上传"];
        }

        require_once(dirname(__FILE__).'/../../vendor/Upyun/UpYun.php');

        /*******************又拍云上传开始***********************/
        $upyun = new \UpYun($this->bucketName, $this->operatorName, $this->operatorPwd);
        try{
            $pic = $_FILES[$name]['tmp_name']; //获得对应的临时文件
            $fh = fopen($pic, 'rb'); //将图片转换成二进制数据流
            $pics = $this->path($name);
            $rsp = $upyun->writeFile('/'.$pics, $fh, True);   // 上传图片，自动创建目录
            fclose($fh);
            return ['status'=>true, 'url'=>$pics];
        }catch (Exception $e){
            return false;
        }

        /*******************又拍云上传结束***********************/
    }
}