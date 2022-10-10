<?php

use common\components\StaticData;
use common\models\region\RegionProvince;
use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(RegionProvince::find()->asArray()->all(), 'id', 'name'),
        'options' => ['id' => 'prov-id'],
        'pluginOptions' => [
            'allowClear' => false,
            'multiple' => false,
            'placeholder' => 'Pilih Provinsi',
        ]
    ]) ?>

    <?= $form->field($model, 'city_id')->widget(DepDrop::classname(), [
        'type' => DepDrop::TYPE_SELECT2,
        'options' => ['id' => 'city_id'],
        'select2Options' => [
            'pluginOptions' => [
                'allowClear' => false,
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
    ]) ?>

    <?= $form->field($model, 'district_id')->widget(DepDrop::classname(), [
        'type' => DepDrop::TYPE_SELECT2,
        'options' => ['id' => 'district_id'],
        'select2Options' => [
            'pluginOptions' => [
                'allowClear' => false,
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
    ]) ?>

    <?= $form->field($model, 'subdistrict_id')->widget(DepDrop::classname(), [
        'type' => DepDrop::TYPE_SELECT2,
        'options' => ['id' => 'subdistrict_id'],
        'select2Options' => [
            'pluginOptions' => [
                'allowClear' => false,
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
    ]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::className(), [
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
            'format' => 'yyyy-m-d'
        ]
    ]); ?>

    <?= $form->field($model, 'jenis_kelamin')->widget(Select2::classname(), [
        'data' => StaticData::dropdownJenisKelamin(),
        'pluginOptions' => [
            'allowClear' => false,
            'multiple' => false,
            'placeholder' => 'Pilih Jenis Kelamin',
        ]
    ]) ?>

    <?= $form->field($model, 'agama')->widget(Select2::classname(), [
        'data' => StaticData::dropdownAgama(),
        'pluginOptions' => [
            'allowClear' => false,
            'multiple' => false,
            'placeholder' => 'Pilih Agama',
        ]
    ]) ?>

    <?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
