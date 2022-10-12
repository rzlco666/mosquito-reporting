<?php

use frontend\assets\LatlonAsset;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pelaporan */
/* @var $form yii\bootstrap5\ActiveForm */

LatlonAsset::register($this);
?>

<div class="pelaporan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'latitude')->textInput(['id' => 'Latitude']) ?>

    <?= $form->field($model, 'longitude')->textInput(['id' => 'Longitude']) ?>

    <?= $form->field($model, 'position')->hiddenInput(['id' => 'Position1'])->label(false) ?>

    <?= Html::button('Lacak Lokasi', ['onclick' => 'getLocationConstant()', 'class' => 'btn btn-light mb-2']) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 3])->hint('Kosongkan jika <b>sama</b> dengan <b>alamat rumah</b>') ?>

    <?= $form->field($model, 'foto')->fileInput(['options' => ['id' => 'upload-image'], 'accept' => 'image/png, image/jpeg, image/jpg'])->hint('Pastikan file foto anda dalam format <b>jpg/jpeg/png</b> dan besar file maksimal <b>1mb</b>.') ?>

    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
