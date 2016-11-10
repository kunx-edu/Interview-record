<?php
    use yii\helpers\Html;
    \frontend\assets\LoginAsset::register($this);
?>
<div class="container" style="margin-top: 60px;">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h1 align="center">欢迎登录</h1>
        <?= Html::beginForm('?r=login/login', 'post', ['id'=>'form']); ?>
            <div class="form-group col-md-12">
                <label for="email">邮箱</label>
                    <?= Html::activeInput('text', $model, 'email', ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'输入邮箱'])?>
            </div>
            <div class="form-group col-md-12">
                <label for="password">密码</label>
                <?= Html::activeInput('password', $model, 'password', ['class'=>'form-control', 'id'=>'password', 'placeholder'=>'输入邮箱'])?>
            </div>
            <div class="form-group">
                <div class="col-md-12" style="font-size: 12px;margin-bottom: 10px;margin-top: 10px;">
                    <span class="S_txt2">还没有帐号？</span><a target="_blank" href="?r=register">立即注册!</a>
                </div>
                <div class="form-group col-md-12">
                    <button type="button" id="button" class="btn btn-primary  col-md-12">登录</button>
                </div>
            </div>
        <?= Html::endForm();?>
    </div>
    <div class="col-md-4"></div>
</div>