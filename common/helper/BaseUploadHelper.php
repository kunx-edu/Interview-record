<?php

/**
 * 基础上传类.
 */
namespace common\helper;

class BaseUploadHelper
{
    //文件名.
    protected $fileName;

    private $fix;

    public function __construct()
    {

    }
    /**
     * 文件的路径.
     * @param $name
     * @return string
     */
    protected function path($name)
    {
        $file = $_FILES[$name]['name'];

        //截取图片后缀.
        $this->getFileFix($file);

        //获取上传路径.
        return $this->createPath();

    }

    /**
     * 创建文件路径.
     * @return string
     */
    private function createPath()
    {
        return date('Y-m-d', time()) .'/'.$this->createFileName().$this->fix;
    }

    /**
     * 创建文件名.
     * @return string
     */
    private function  createFileName()
    {
        return md5(time().rand(100000, 999999));
    }

    /**
     * 获取文件名.
     * @param $file
     * @return string
     */
    protected function getFileFix($file)
    {
        $arr = explode('.', $file);
        $this->fix = '.'.end($arr);
        return $this->fix;
    }
}