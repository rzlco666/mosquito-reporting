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

$this->title = 'Daftar Akun';
?>
<section>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-xl-5"><img class="bg-img-cover bg-center"
                                       src="<?= Url::home() ?>images/login/2.jpg" alt="looginpage"></div>
            <div class="col-xl-7 p-0">
                <div class="login-card">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup', 'class' => 'theme-form login-form']); ?>
                    <div class="theme-form login-form">
                        <h4><?= Html::encode($this->title) ?></h4>
                        <h6>Silahkan isi kolom berikut untuk mendaftar.</h6>
                        <div class="form-group">
                            <label>Username</label>
                            <label style="text-align: right; display: inline-block; width: 60%">Nama Lengkap</label>
                            <div class="small-group">
                            <?= $form->field($model, 'username', [
                                'options' => ['class' => 'input-group'],
                                'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Username'],
                                'template' => '<span class="input-group-text"><i class="icon-user"></i></span>{input}{error}',
                            ])->textInput(['autofocus' => true])->label(false) ?>
                            <?= $form->field($model, 'nama', [
                                'options' => ['class' => 'input-group'],
                                'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Nama Lengkap'],
                                'template' => '<span class="input-group-text"><i class="icon-user"></i></span>{input}{error}',
                            ])->textInput(['autofocus' => true])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat Email</label>
                            <?= $form->field($model, 'email', [
                                'options' => ['class' => 'input-group'],
                                'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Your@email.com'],
                                'template' => '<span class="input-group-text"><i class="icon-email"></i></span>{input}{error}',
                            ])->label(false) ?>
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
                            <label>Provinsi</label>
                            <label style="text-align: right; display: inline-block; width: 66%">Kabupaten/Kota</label>
                            <div class="small-group">
                            <?= $form->field($model, 'province_id', [
                                'options' => ['class' => 'input-group'],
                                'template' => '{input}{error}',
                            ])->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(RegionProvince::find()->asArray()->all(), 'id', 'name'),
                                'options' => ['id' => 'prov-id'],
                                'pluginOptions' => [
                                    'allowClear' => false,
                                    'multiple' => false,
                                    'placeholder' => 'Pilih Provinsi',
                                ]
                            ])->label(false) ?>
                            <?= $form->field($model, 'city_id', [
                                'options' => ['class' => 'input-group'],
                                'template' => '{input}{error}',
                            ])->widget(DepDrop::classname(), [
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
                                    'initialize' => false,
                                    'url' => Url::to(['/region/city']),
                                    'loadingText' => 'Loading kabupaten/kota...',
                                ]
                            ])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <label style="text-align: right; display: inline-block; width: 58%">Kelurahan/Desa</label>
                            <div class="small-group">
                            <?= $form->field($model, 'district_id', [
                                'options' => ['class' => 'input-group'],
                                'template' => '{input}{error}',
                            ])->widget(DepDrop::classname(), [
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
                                    'initialize' => false,
                                    'url' => Url::to(['/region/district']),
                                    'loadingText' => 'Loading kecamatan...',
                                ]
                            ])->label(false) ?>
                            <?= $form->field($model, 'subdistrict_id', [
                                'options' => ['class' => 'input-group'],
                                'template' => '{input}{error}',
                            ])->widget(DepDrop::classname(), [
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
                                    'initialize' => false,
                                    'url' => Url::to(['/region/sub-district']),
                                    'loadingText' => 'Loading kelurahan/desa...',
                                ]
                            ])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'policy', [
                                'options' => ['class' => 'checkbox'],
                                'inputOptions' => ['class' => '', 'id' => 'checkbox1', 'type' => 'checkbox'],
                                'template' => '&nbsp;{input}<label class="text-muted" for="checkbox1">Setuju dengan
                                    <span>Syarat dan Ketentuan</span></label>{error}',
                            ])->label(false) ?>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
                        </div>
                        <p>Sudah memiliki akun?<a class="ms-2" href="<?= Url::to('login') ?>">Login</a></p>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
