<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ResetPasswordForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Reset password';
?>
<section>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <?php $form = ActiveForm::begin(['id' => 'reset-password-form', 'class' => 'theme-form login-form']); ?>
                    <div class="theme-form login-form">
                        <h4 class="mb-3"><?= Html::encode($this->title) ?></h4>
                        <h6>Masukkan password baru</h6>
                        <div class="form-group">
                            <label>Password</label>
                            <?= $form->field($model, 'password', [
                                'options' => ['class' => 'input-group'],
                                'inputOptions' => ['class' => 'form-control', 'placeholder' => '*********'],
                                'template' => '<span class="input-group-text"><i class="icon-lock"></i></span>{input}<div class="show-hide"><span class="show">                         </span></div>{error}',
                            ])->passwordInput()->label(false) ?>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('Reset', ['class' => 'btn btn-primary btn-block']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
