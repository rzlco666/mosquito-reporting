<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var LoginForm $model */

use common\models\LoginForm;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Login';
?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-5"><img class="bg-img-cover bg-center"
                                       src="<?= Url::home() ?>images/login/3.jpg" alt="looginpage"></div>
            <div class="col-xl-7 p-0">
                <div class="login-card">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup', 'class' => 'theme-form login-form']); ?>
                    <div class="theme-form login-form">
                        <h4><?= Html::encode($this->title) ?></h4>
                        <h6>Silahkan isi kolom berikut untuk login.</h6>
                        <div class="form-group">
                            <label>Username/Email</label>
                            <?= $form->field($model, 'username', [
                                'options' => ['class' => 'input-group'],
                                'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Username/Email'],
                                'template' => '<span class="input-group-text"><i class="icon-user"></i></span>{input}{error}',
                            ])->textInput(['autofocus' => true])->label(false) ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <?= $form->field($model, 'password', [
                                'options' => ['class' => 'input-group'],
                                'inputOptions' => ['class' => 'form-control', 'placeholder' => '*********'],
                                'template' => '<span class="input-group-text"><i class="icon-lock"></i></span>{input}<div class="show-hide"><span class="show">                         </span></div>{error}',
                            ])->passwordInput()->label(false) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'rememberMe', [
                                'options' => ['class' => 'checkbox'],
                                'inputOptions' => ['class' => '', 'id' => 'checkbox1', 'type' => 'checkbox'],
                                'template' => '&nbsp;{input}<label class="text-muted" for="checkbox1">Ingat password</label>{error}',
                            ])->label(false) ?>
                            <a class="link" href="<?= Url::to('request-password-reset') ?>">Lupa password?</a>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                        </div>
                        <div class="login-social-title">
                            <h5>Sign in with</h5>
                        </div>
                        <div class="form-group">
                            <ul class="login-social">
                                <li><?= Html::a(Yii::t('app', '<span class="fa fa-google"></span>'), ['/site/auth', 'authclient' => 'google']) ?></li>
                            </ul>
                        </div>
                        <p>Belum memiliki akun?<a class="ms-2" href="<?= Url::to('signup') ?>">Daftar</a></p>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
