<?php

use common\components\Breadcrumb;
use denkorolkov\ajaxcrud\CrudAsset;
use kartik\grid\GridView;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\PelaporanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pelaporan';

CrudAsset::register($this);

?>
<?= Breadcrumb::levelSatu($this->title) ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Pelaporan</h5>
                        <?= Html::a('Tambah Data', ['create'],
                            ['role' => 'modal-remote', 'title' => 'Tambah Data', 'class' => 'btn btn-primary mt-4']) ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?= GridView::widget([
                                'summary' => false,
                                'tableOptions' => ['class' => 'display', 'id' => 'basic-6'],
                                'headerContainer' => ['style' => 'background-color: rgba(255,255,255,0);'],
                                'striped' => false,
                                'dataProvider' => $dataProvider,
                                'columns' => require(__DIR__ . '/_columns.php')
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "title" => '<h4 class="modal-title">Modal title</h4>',
    'size' => 'modal-lg',
    "footer" => "",// always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>