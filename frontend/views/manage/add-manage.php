<?php
$this->title = '添加管理员';
\frontend\assets\ManageAsset::register($this);
\frontend\assets\ManageSystemAsset::register($this);
\frontend\assets\LayerAsset::register($this);
use yii\helpers\Html;
?>
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加管理员</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="">
            <?= Html::beginForm('?r=manage/add-manage','post'); ?>
            <div class="form-group">
                <div class="label">
                    <label>标题：</label>
                </div>
                <div class="field">
                    <?= Html::activeInput('text', $manage, 'username', ['class'=>'input w50 add-manage', 'placeholder'=>'用户名']); ?>
                    <div class="tips username_err"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>手机号：</label>
                </div>
                <div class="field">
                    <?= Html::activeInput('text', $manage, 'mobile', ['class'=>'input w50', 'placeholder'=>'手机号']); ?>
                    <div class="tips mobile_err"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>密码：</label>
                </div>
                <div class="field">
                    <?= Html::activeInput('password', $manage, 'password', ['class'=>'input w50', 'placeholder'=>'密码']); ?>
                    <div class="tips password_err"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>确认密码：</label>
                </div>
                <div class="field">
                    <?= Html::activeInput('password', $manage, 'rePassword', ['class'=>'input w50', 'placeholder'=>'确认密码']); ?>
                    <div class="tips rePassword_err"></div>
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