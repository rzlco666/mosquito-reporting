<?php

use common\components\StatusData;
use yii\bootstrap5\Html;
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'position',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'alamat',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => 'Foto',
        'noWrap' => true,
        'dropdown' => false,
        'template' => '{foto}',
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'buttons' => [
            'foto' => function ($url, $model) {
                return Html::a('Lihat Foto', ['foto', 'id' => Yii::$app->encrypter->encrypt($model->id)], [
                    'role' => 'modal-remote',
                    'data-toggle' => 'tooltip'
                ]);
            },
        ],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'status',
        'hAlign' => 'center',
        'format' => 'raw',
        'value' => function ($model) {
            return StatusData::cetakStatusPelaporan($model->status);
        },
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'noWrap' => true,
        'dropdown' => false,
        'template' => '{detail} {perbarui} {hapus}',
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'buttons' => [
            'detail' => function ($url, $model) {
                return Html::a('Detail', ['view', 'id' => Yii::$app->encrypter->encrypt($model->id)], [
                    'class' => 'btn btn-secondary btn-xs',
                    'title' => 'Lihat Data',
                    'role' => 'modal-remote',
                    'data-toggle' => 'tooltip'
                ]);
            },
            'perbarui' => function ($url, $model) {
                return Html::a('Perbarui', ['update', 'id' => Yii::$app->encrypter->encrypt($model->id)], [
                    'class' => 'btn btn-primary btn-xs',
                    'title' => 'Perbarui Data',
                    'role' => 'modal-remote',
                    'data-toggle' => 'tooltip'
                ]);
            },
            'hapus' => function ($url, $model) {
                return Html::a('Hapus', ['delete', 'id' => Yii::$app->encrypter->encrypt($model->id)], [
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Hapus Data',
                    'role' => 'modal-remote',
                    'data-toggle' => 'tooltip',
                    'data-confirm' => false,
                    'data-method' => false,
                    'data-request-method' => 'post',
                    'data-confirm-title' => 'Apakah anda yakin?',
                    'data-confirm-message' => 'Anda yakin ingin menghapus data ini?'
                ]);
            },
        ],
    ],

];
