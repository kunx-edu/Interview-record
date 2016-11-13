<?php
use yii\helpers\Html;
\frontend\assets\ManageLoginAsset::register($this);
\frontend\assets\LayerAsset::register($this);
$this->title = "管理员登录";
?>
<div class="container" style="margin-top: 60px;">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h1 align="center">欢迎登录</h1>
        <?= Html::beginForm('?r=manage-login/login', 'post', ['id'=>'form']); ?>
        <div class="form-group col-md-12">
            <label for="email">用户名</label>
            <?= Html::activeInput('text', $model, 'username', ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'用户名'])?>
            <div class="help-block err" style="color: #ff0000" id="username_err"></div>
        </div>
        <div class="form-group col-md-12">
            <label for="password">密码</label>
            <?= Html::activeInput('password', $model, 'password', ['class'=>'form-control', 'id'=>'password', 'placeholder'=>'输入密码'])?>
            <div class="help-block err" style="color: #ff0000" id="password_err"></div>
        </div>
        <div class="form-group">
            <div class="form-group col-md-12">
                <button type="button" id="button" class="btn btn-primary  col-md-12">登录</button>
            </div>
        </div>
        <?= Html::endForm();?>
    </div>
    <div class="col-md-4"></div>
</div>