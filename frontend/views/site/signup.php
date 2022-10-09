<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var SignupForm $model */

use common\models\region\RegionProvince;
use frontend\models\SignupForm;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'nama')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'province_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(RegionProvince::find()->asArray()->all(), 'id', 'name'),
                'options' => ['id' => 'prov-id'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => false,
                    'placeholder' => 'Pilih Provinsi',
                ]
            ]) ?>

            <?= $form->field($model, 'city_id')->widget(DepDrop::classname(), [
                'type' => DepDrop::TYPE_SELECT2,
                'options' => ['id' => 'city_id'],
                'select2Options' => [
                    'pluginOptions' => [
                        'allowClear' => true,
                        'multiple' => false,
                    ]
                ],
                'pluginOptions' => [
                    'depends' => ['prov-id'],
                    'placeholder' => 'Pilih Kabupaten/Kota',
                    'initialize' => true,
                    'url' => Url::to(['/region/city']),
                    'loadingText' => 'Loading kabupaten/kota...',
                ]
            ]); ?>

            <?= $form->field($model, 'district_id')->widget(DepDrop::classname(), [
                'type' => DepDrop::TYPE_SELECT2,
                'options' => ['id' => 'district_id'],
                'select2Options' => [
                    'pluginOptions' => [
                        'allowClear' => true,
                        'multiple' => false,
                    ]
                ],
                'pluginOptions' => [
                    'depends' => ['city_id'],
                    'placeholder' => 'Pilih Kecamatan',
                    'initialize' => true,
                    'url' => Url::to(['/region/district']),
                    'loadingText' => 'Loading kecamatan...',
                ]
            ]); ?>

            <?= $form->field($model, 'subdistrict_id')->widget(DepDrop::classname(), [
                'type' => DepDrop::TYPE_SELECT2,
                'options' => ['id' => 'subdistrict_id'],
                'select2Options' => [
                    'pluginOptions' => [
                        'allowClear' => true,
                        'multiple' => false,
                    ]
                ],
                'pluginOptions' => [
                    'depends' => ['district_id'],
                    'placeholder' => 'Pilih Kelurahan/Desa',
                    'initialize' => true,
                    'url' => Url::to(['/region/sub-district']),
                    'loadingText' => 'Loading kelurahan/desa...',
                ]
            ]); ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
