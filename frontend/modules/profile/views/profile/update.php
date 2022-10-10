<?php

use common\components\Breadcrumb;
use common\models\Profile;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */

$this->title = 'Update Profile';
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
                            <?= $this->render('_form', [
                                'model' => $model,
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
