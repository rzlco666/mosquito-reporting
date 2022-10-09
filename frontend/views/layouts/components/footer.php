<?php

use yii\helpers\Html;

?>
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright <?= date('Y') . '-' . date('y', strtotime('+1 year')); ?>
                    © <?= Html::encode(Yii::$app->name) ?> All rights reserved.</p>
            </div>
            <div class="col-md-6">
                <p class="pull-right mb-0">Develop with <i
                            class="fa fa-heart font-secondary"></i></p>
            </div>
        </div>
    </div>
</footer>