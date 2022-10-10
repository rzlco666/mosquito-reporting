<?php

use common\components\Breadcrumb;
use common\models\Profile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */

$this->title = 'Update Foto';
$profile = Profile::find()->where(['id' => $model->id])->one();
?>
<?= Breadcrumb::levelDua($this->title, $profile->nama) ?>
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title mb-0"><?= 'Profile - ' . $profile->nama ?></h4>
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                                     data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <?= $this->render('_colside', [
                            'profile' => $profile,
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title mb-0"><?= $this->title ?></h4>
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                                     data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                            <?= $form->field($model, 'foto')->fileInput(['options' => ['id' => 'upload-image'], 'accept' => 'image/png, image/jpeg, image/jpg'])->hint('Pastikan file foto anda dalam format <b>jpg/jpeg/png</b> dan besar file maksimal <b>500kb</b>.') ?>

                            <div class="form-group">
                                <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
