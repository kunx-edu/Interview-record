<?php
    $this->title = "注册";
    use \yii\helpers\Html;
    \frontend\assets\RegisterAsset::register($this);
?>
<div class="container">
    <div class="col-md-4"></div>
    <?= Html::beginForm('?r=reg', 'post')?>
    <div class="col-md-4">
        <h1 align="center">注册</h1>
        <div class="form-group col-md-12">
            <label for="email">邮箱</label>
            <?= Html::activeInput('text', $model, 'email', ['class'=>'form-control','id'=>'email','placeholder'=>'邮箱'])?>
            <div class="help-block err" style="color: #ff0000" id="email_err"></div>
        </div>
        <div class="form-group col-md-12">
            <label for="password">密码</label>
            <?= Html::activeInput('password', $model, 'password', ['class'=>'form-control','id'=>'password','placeholder'=>'密码'])?>
            <div class="help-block err" style="color: #ff0000" id="password_err"></div>
        </div>
        <div class="form-group col-md-12">
            <label for="rePassword">确认密码</label>
            <?= Html::activeInput('password', $model, 'rePassword', ['class'=>'form-control','id'=>'rePassword','placeholder'=>'确认密码'])?>
            <div class="help-block err" style="color: #ff0000" id="rePassword_err"></div>
        </div>
        <div class="form-group col-md-12">
            <label for="username">真实姓名</label>
            <?= Html::activeInput('text', $model, 'username', ['class'=>'form-control','id'=>'username','placeholder'=>'真实姓名'])?>
            <div class="help-block err" style="color: #ff0000" id="username_err"></div>
        </div>
        <div class="form-group col-md-12">
            <div class="" style="font-size: 12px;margin-bottom: 10px;margin-top: 10px;"><span class="S_txt2">还没有帐号？</span><a target="_blank" href="?r=login">直接登录»</a>
            </div>
            <button type="button" id="button" class="btn btn-primary  col-md-12">注册</button>
        </div>
    </div>
    <?= Html::endForm(); ?>
    <div class="col-md-4"></div>

</div>