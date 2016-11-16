<?php
    $this->title = "导入信息";
    use yii\helpers\Html;
    \frontend\assets\LayerAsset::register($this);
    \frontend\assets\ImportAsset::register($this);
?>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">导入信息</strong></div>
    <div class="padding border-bottom">
        <button type="button" class="button border-yellow"><span class="icon-plus-square-o"></span> 导入信息</button>
    </div>

    <?=Html::beginForm('?r=manage/import-data', 'post', ['id'=>'form','enctype'=>'multipart/form-data']); ?>
        <?= Html::input('hidden', 'path', ''); ?>
        <?= Html::fileInput('student', '', ['id'=>'file','style'=>'display:none']); ?>
    <?=Html::endForm(); ?>

    <table class="table table-hover text-center">
        <tbody><tr>
            <th width="10%">ID</th>
            <th width="20%">班级名称</th>
            <th width="15%">学科</th>
            <th width="15%">操作</th>
        </tr>
        </tbody>
    </table>
</div>