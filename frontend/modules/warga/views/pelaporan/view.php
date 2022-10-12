<?php

use common\components\StatusData;
use FrosyaLabs\Lang\IdDateFormatter;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pelaporan */
?>
<div class="pelaporan-view">

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table'],
        'striped' => false,
        'condensed' => false,
        'bordered' => false,
        'hAlign' => DetailView::ALIGN_LEFT,
        'attributes' => [
            [
                'attribute' => 'profile_id',
                'label' => 'Pelapor',
                'value' => $model->profile->nama,
            ],
            [
                'attribute' => 'position',
                'label' => 'Koordinat',
            ],
            'alamat:ntext',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => StatusData::cetakStatusPelaporan($model->status),
            ],
            [
                'attribute' => 'created',
                'label' => 'Dilaporkan Pada',
                'value' => IdDateFormatter::format($model->created, IdDateFormatter::COMPLETE_WITH_TIME),
            ],
            [
                'attribute' => 'createdBy',
                'label' => 'Dilaporkan Oleh',
                'format' => 'raw',
                'value' => $model->dataCreated->nama,
            ],
            [
                'attribute' => 'modified',
                'label' => 'Diubah Pada',
                'value' => IdDateFormatter::format($model->modified, IdDateFormatter::COMPLETE_WITH_TIME),
            ],
            [
                'attribute' => 'modifiedBy',
                'label' => 'Diubah Oleh',
                'format' => 'raw',
                'value' => $model->dataModified->nama,
            ],
        ],
    ]) ?>

</div>
