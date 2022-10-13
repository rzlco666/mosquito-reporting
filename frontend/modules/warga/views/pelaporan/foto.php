<?php

use common\components\StatusData;
use FrosyaLabs\Lang\IdDateFormatter;
use kartik\detail\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Pelaporan */
?>
<div class="pelaporan-view">

    <?php
    if (empty($model->foto) || $model->foto == null) :
        ?>
        Foto tidak tersedia
    <?php
    else :
        ?>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="align-content-center text-center">
                    <img class="img-fluid" src="<?= Url::home() ?>upload/pelaporan/<?= $model->foto ?>" alt="">
                    <h4>Pelaporan - <?= $model->profile->nama ?></h4>
                </div>
                <?= DetailView::widget([
                    'model' => $model,
                    'options' => ['class' => 'table'],
                    'striped' => false,
                    'condensed' => false,
                    'bordered' => false,
                    'hAlign' => DetailView::ALIGN_LEFT,
                    'attributes' => [
                        'alamat:ntext',
                        [
                            'attribute' => 'position',
                            'label' => 'Koordinat',
                            'value' => $model->latitude . ',' . $model->longitude,
                        ],
                        [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'value' => StatusData::cetakStatusPelaporan($model->status),
                        ],
                        [
                            'attribute' => 'created',
                            'label' => 'Pada',
                            'value' => IdDateFormatter::format($model->created, IdDateFormatter::COMPLETE_WITH_TIME),
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    <?php
    endif;
    ?>

</div>
