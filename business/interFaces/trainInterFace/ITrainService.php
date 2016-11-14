<?php

namespace business\interFaces\trainInterFace;
interface ITrainService {

    /**
     * 查询所有的培训公司.
     * @param $keyword
     * @return mixed
     */
    public function getTrainAll($keyword);

    /**
     * 根据名称来查询.
     * @param $train_name
     * @return mixed
     */
    public function getTrain($train_name);

    /**
     * 添加到数据库.
     * @param $data
     * @return mixed
     */
    public function add($data);

    /**
     * 根据id来删除招聘公司.
     * @param $id
     * @return mixed
     */
    public function del($id);
}