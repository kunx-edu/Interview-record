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
}