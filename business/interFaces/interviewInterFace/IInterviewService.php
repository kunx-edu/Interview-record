<?php
/**
 * 面试记录的接口.
 */
namespace business\interFaces\interviewInterFace;

interface IInterviewService {

    /**
     * 添加面试信息.
     * @param $data
     * @return mixed
     */
    public function addInterview($data);

    /**
     * 查询数据.
     * @return mixed
     */
    public function getInterviewAll($pageNow);


    /**
     * 获取分页总条数.
     * @return mixed
     */
    public function getInterviewCount();
}