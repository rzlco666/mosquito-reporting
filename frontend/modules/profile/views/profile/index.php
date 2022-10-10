<?php

/** @var yii\web\View $this */
/** @var frontend\models\search\ProfileSearch $searchModel */

/** @var yii\data\ActiveDataProvider $dataProvider */

use common\components\Breadcrumb;
use common\models\Profile;
use kartik\detail\DetailView;
use yii\helpers\Url;

$this->title = 'Profile';
$profile = Profile::find()->where(['id' => $model->id])->one();
?>
<?= Breadcrumb::levelSatu($this->title) ?>
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title mb-0"><?= $this->title . ' - ' . $profile->nama ?></h4>
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
                        <h4 class="card-title mb-0">Detail <?= $this->title ?></h4>
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                                     data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?= DetailView::widget([
                                'model' => $model,
                                'options' => ['class' => 'table'],
                                'striped' => false,
                                'condensed' => false,
                                'bordered' => false,
                                'hAlign' => DetailView::ALIGN_LEFT,
                                'attributes' => [
                                    'nama',
                                    [
                                        'attribute' => 'alamat',
                                        'value' => $model->alamat == null ? null : ucwords(strtolower($model->alamat)),
                                    ],
                                    [
                                        'attribute' => 'province_id',
                                        'label' => false,
                                        'value' => ucwords($model->subdistrict->name) . ', ' . ucwords(strtolower($model->city->name)) . ', ' . ucwords(strtolower($model->province->name)),
                                    ],
                                    'tempat_lahir',
                                    'tanggal_lahir',
                                    'jenis_kelamin',
                                    'agama',
                                    'telp',
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="<?= Url::to(['update']) ?>"
                           class="btn btn-primary">Perbarui
                            <?= $this->title ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
