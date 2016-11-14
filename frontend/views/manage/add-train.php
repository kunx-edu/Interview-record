<?php
$this->title = "添加培训机构";
use \yii\helpers\Html;
\frontend\assets\LayerAsset::register($this);
\frontend\assets\TrainManageAsset::register($this);
?>
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加培训公司</strong></div>
    <div class="body-content">
        <?= Html::beginForm('?r=manage/add-train','post', ['class'=>'form-x']); ?>
        <div class="form-group">
            <div class="label">
                <label>公司名称：</label>
            </div>
            <div class="field">
                <?= Html::activeInput('text', $model, 'train_name', ['class'=>'input w50 add-manage', 'placeholder'=>'公司名称']); ?>
                <div class="tips " id="train_name_err" style="float:left;margin-left: 20px;height: 42px;line-height: 42px;color: #ff0000"></div>
            </div>
        </div>

        <div class="form-group">
            <div class="label">
                <label></label>
            </div>
            <div class="field">
                <button class="button bg-main icon-check-square-o" id="addTrain" type="button"> 提交</button>
            </div>
        </div>
        <?= Html::endForm(); ?>
    </div>
</div>