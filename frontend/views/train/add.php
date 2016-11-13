<?php
$this->title = "添加培训机构";
use \yii\helpers\Html;
\frontend\assets\RegisterAsset::register($this);
?>
<div class="container">
    <div class="col-md-4"></div>
    <?= Html::beginForm('?r=reg', 'post')?>
    <div class="col-md-4">
        <h1 align="center">添加培训机构</h1>
        <div class="form-group col-md-12">
            <label for="train_name">名称</label>
            <?= Html::activeInput('text', $model, 'train_name', ['class'=>'form-control','id'=>'train_name','placeholder'=>'培训机构名称'])?>
            <div class="help-block err" style="color: #ff0000" id="train_name_err"></div>
        </div>
        <div class="form-group col-md-12">
            <button type="button" id="button" class="btn btn-primary  col-md-12">添加</button>
        </div>
    </div>
    <?= Html::endForm(); ?>
    <div class="col-md-4"></div>

</div>