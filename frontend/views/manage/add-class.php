<?php
$this->title = '添加班级';
\frontend\assets\LayerAsset::register($this);
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
\frontend\assets\ClassAsset::register($this);
?>
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加班级</strong></div>
    <div class="body-content">
        <?= Html::beginForm('?r=manage/add-class','post', ['class'=>'form-x']); ?>
        <div class="form-group">
            <div class="label">
                <label>班级名称：</label>
            </div>
            <div class="field">
                <?= Html::activeInput('text', $class, 'class_name', ['class'=>'input w50 add-manage', 'placeholder'=>'班级名称']); ?>
                <div class="tips class_name_err"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="label">
                <label>选择学科：</label>
            </div>
            <div class="field">
                <select name="ClassForm[subject]" class="input w50">
                    <option value="java">java学科</option>
                    <option value="php">php学科</option>
                    <option value="web">web前端学科</option>
                    <option value="ui">ui学科</option>
                </select>
                <div class="tips"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="label">
                <label></label>
            </div>
            <div class="field">
                <button class="button bg-main icon-check-square-o" id="button" type="button"> 提交</button>
            </div>
        </div>
        <?= Html::endForm(); ?>
    </div>
</div>