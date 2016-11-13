<?php
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
    \frontend\assets\AddAsset::register($this);
    \frontend\assets\DateAsset::register($this);
    \frontend\assets\LayerAsset::register($this);

    $this->title = "详细面试记录";
?>
<div class="container add">
    <h3 id="overview-doctype">添加面试记录</h3>
        <div class="form-group">
            <label for="company_name">公司名称</label>
            <div class="form-control"><?=$arr['company_name']?></div>
            <div class="help-block hide" id="company_name_err"></div>
        </div>
        <div class="form-group">
            <label for="company_address">公司地址</label>
            <div class="form-control"><?=$arr['company_address']?></div>
            <div class="help-block hide" id="company_address_err"></div>
        </div>

        <div class="form-group">
            <label for="company_info">公司简介</label>
            <div class="form-control"><?=$arr['company_info']?></div>
            <div class="help-block hide" id="company_info_err"></div>
        </div>

        <div class="form-group">
            <label for="occupation">面试职位</label>
            <div class="form-control"><?=$arr['occupation']?></div>
            <div class="help-block hide" id="occupation_err"></div>
        </div>
        <div class="form-group">
            <label for="class">选择班级</label>
            <div class="form-control"><?=$arr['class_id']?></div>
            <div class="help-block hide" id="class_err"></div>
        </div>

        <div class="form-group">
            <label for="company_type">公司类型</label>
            <div class="form-control"><?=$arr['company_type']?></div>
            <div class="help-block hide" id="company_type_err"></div>
        </div>
        <div class="form-group">
            <label for="salary">要求薪水</label>
            <div class="input-group"  style="height: 34px;">
                <div class="input-group-addon addon" style="height: 34px;">￥</div>
                <div class="form-control"><?=$arr['salary']?></div>
            </div>
            <div class="help-block hide" id="salary_err"></div>
        </div>

        <div class="form-group">
            <label for="interview_time">面试时间</label>
            <div class="form-control"><?=$arr['interview_time']?></div>
            <div class="help-block hide" id="interview_time_err"></div>
        </div>

        <div class="form-group">
            <label for="interview_time">面试记录</label>
            <div class="form-control"><?=$arr['interview_info']?></div>
            <div class="help-block hide" id="interview_info_err"></div>
        </div>

        <div class="form-group">
            <label for="is_written_examination">是否有笔试</label>
            <div class="form-control"><?=$arr['is_written_examination']?></div>
            <div class="help-block hide" id="is_written_examination_err"></div>
        </div>

        <div class="form-group">
            <label for="is_written_examination">上传笔试题照片</label>
            <br/>
            <button class="btn"type="button" id="upload_file">点击上传图片</button>
            <div class="img-up"></div>
            <ul class="file-imgList">
            </ul>
            <div class="help-block hide" id="is_written_examination_err"></div>
        </div>

        <div class="form-group">
            <label for="sound_recording_file">上传录音文件</label><br/>
            <button class="btn"type="button" id="sound_recording_file">点击上传录音</button>
            <p class="tape" style="margin-top: 20px;"></p>
            <div class="form-control"><?=$arr['sound_recording_file']?></div>
            <div class="help-block hide" id="sound_recording_file_err"></div>
        </div>

        <div class="form-group">
            <label for="grade">面试评分</label>
            <?=Html::radioList('Interview[grade]', '5',  [1=>"★",2=>"★★",3=>"★★★",4=>"★★★★",5=>"★★★★★"], ['class'=>'radio']);?>
            <div class="help-block hide" id="grade_err"></div>
        </div>

        <div class=" button"><button type="button" id="button_interview" class="btn btn-primary">提交</button></div>

</div>