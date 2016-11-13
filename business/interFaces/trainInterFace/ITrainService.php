<?php

namespace business\interFaces\trainInterFace;
interface ITrainService {

    /**
     * 查询所有的培训公司.
     * @param $keyword
     * @return mixed
     */
    public function getTrainAll($keyword);
}