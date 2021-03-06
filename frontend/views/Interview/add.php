<?php
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
    \frontend\assets\AddAsset::register($this);
    \frontend\assets\DateAsset::register($this);
    \frontend\assets\LayerAsset::register($this);

    $this->title = "添加面试记录";
?>
<div class="container add">
    <h3 id="overview-doctype">添加面试记录</h3>
<!--    <form action="?r=interview/adds" method="post">-->
    <?=Html::beginForm('?r=interview/add-interview','post',['id'=>'interviewForm']);?>
        <div class="form-group">
            <label for="company_name">公司名称</label>
            <?= Html::activeInput('text', $model, 'company_name',['class'=>"form-control", 'placeholder'=>'公司名称','id'=>"company_name"])?>
            <div class="help-block hide" id="company_name_err"></div>
        </div>
        <div class="form-group">
            <label for="company_address">公司地址</label>
            <?= Html::activeInput('text', $model, 'company_address',['class'=>"form-control", 'placeholder'=>'公司地址','id'=>"company_address"])?>
            <div class="help-block hide" id="company_address_err"></div>
        </div>

        <div class="form-group">
            <label for="company_info">公司简介</label>
            <?= Html::activeTextarea($model, 'company_info',['class'=>'form-control','rows'=>3])?>
            <div class="help-block hide" id="company_info_err"></div>
        </div>

        <div class="form-group">
            <label for="occupation">面试职位</label>
            <?= Html::activeInput('text', $model, 'occupation',['class'=>"form-control", 'placeholder'=>'面试职位','id'=>"occupation"])?>
            <div class="help-block hide" id="occupation_err"></div>
        </div>
        <div class="form-group">
            <label for="class">选择班级</label>
            <?= Html::dropDownList('Interview[class_id]',null, ArrayHelper::map($classArr, 'id', 'class_name'), ['class'=>'form-control','id'=>'class']); ?>
            <div class="help-block hide" id="class_err"></div>
        </div>

        <div class="form-group">
            <label for="company_type">公司类型</label>
            <?=Html::radioList('Interview[company_type]', '0',  [0=>"外包公司",1=>"自主产品"],['class'=>'radio']);?>
            <div class="help-block hide" id="company_type_err"></div>
        </div>
        <div class="form-group">
            <label for="salary">要求薪水</label>
            <div class="input-group"  style="height: 34px;">
                <div class="input-group-addon addon" style="height: 34px;">￥</div>
                <?= Html::activeInput('number', $model, 'salary',['class'=>"form-control", 'placeholder'=>'要求薪水','id'=>"salary"])?>
            </div>
            <div class="help-block hide" id="salary_err"></div>
        </div>

        <div class="form-group">
            <label for="interview_time">面试时间</label>
            <?=Html::activeInput('date', $model, 'interview_time',['class'=>'form-control', 'placeholder'=>'面试时间'])?>
            <div class="help-block hide" id="interview_time_err"></div>
        </div>

        <div class="form-group">
            <label for="interview_time">面试记录</label>
            <?= Html::activeTextarea($model, 'interview_info',['class'=>'form-control','rows'=>5])?>
            <div class="help-block hide" id="interview_info_err"></div>
        </div>

        <div class="form-group">
            <label for="is_written_examination">是否有笔试</label>
            <?=Html::radioList('Interview[is_written_examination]', '0',  [0=>"没有",1=>"有笔试"], ['class'=>'radio']);?>
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
            <?= Html::activeHiddenInput($model, 'sound_recording_file'); ?>
            <div class="help-block hide" id="sound_recording_file_err"></div>
        </div>

        <div class="form-group">
            <label for="grade">面试评分</label>
            <?=Html::radioList('Interview[grade]', '5',  [1=>"★",2=>"★★",3=>"★★★",4=>"★★★★",5=>"★★★★★"], ['class'=>'radio']);?>
            <div class="help-block hide" id="grade_err"></div>
        </div>

        <div class=" button"><button type="button" id="button_interview" class="btn btn-primary">提交</button></div>

    <?=Html::endForm();?>

    <?= Html::beginForm('?r=interview/upload','post',['enctype'=>'multipart/form-data','id'=>'up']);?>
        <input type="file" id="in_file" name="in_photo" style="display: none">
    <?= Html::endForm();?>

    <?= Html::beginForm('?r=interview/upload-tape','post',['enctype'=>'multipart/form-data','id'=>'tape']);?>
        <input type="file" id="tape_file" name="sound_recording_file" style="display: none">
    <?= Html::endForm();?>
</div>