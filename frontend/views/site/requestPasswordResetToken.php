<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\PasswordResetRequestForm $model */

use frontend\models\PasswordResetRequestForm;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Permintaan reset password';
?>
<section>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', 'class' => 'theme-form login-form']); ?>
                    <div class="theme-form login-form">
                        <h4 class="mb-3"><?= Html::encode($this->title) ?></h4>
                        <h6>Silahkan isi alamat email anda. Tautan untuk mengatur ulang password akan dikirim ke sana.</h6>
                        <div class="form-group">
                            <label>Alamat Email</label>
                            <?= $form->field($model, 'email', [
                                'options' => ['class' => 'input-group'],
                                'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Your@email.com'],
                                'template' => '<span class="input-group-text"><i class="icon-email"></i></span>{input}{error}',
                            ])->label(false) ?>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('Kirim', ['class' => 'btn btn-primary btn-block']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
