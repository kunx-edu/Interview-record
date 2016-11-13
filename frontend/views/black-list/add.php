<?php
$this->title = "添加黑名单";
use \yii\helpers\Html;
\frontend\assets\LayerAsset::register($this);
\frontend\assets\BlacklistAsset::register($this);
?>
<div class="container">
    <div class="col-md-4"></div>
    <?= Html::beginForm('?r=black-list/add-black-list', 'post')?>
    <div class="col-md-4">
        <h1 align="center">添加黑名单</h1>
        <div class="form-group col-md-12">
            <label for="name">名称</label>
            <?= Html::activeInput('text', $model, 'name', ['class'=>'form-control','id'=>'train_name','placeholder'=>'黑名单公司名称'])?>
            <div class="help-block err" style="color: #ff0000" id="name_err"></div>
        </div>
        <div class="form-group col-md-12">
            <button type="button" id="button" class="btn btn-primary  col-md-12">添加</button>
        </div>
    </div>
    <?= Html::endForm(); ?>
    <div class="col-md-4"></div>

</div>