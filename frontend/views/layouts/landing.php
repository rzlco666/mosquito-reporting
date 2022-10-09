<?php

use frontend\assets\LandingAsset;
use yii\bootstrap5\Html;
use yii\helpers\Url;

LandingAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description"
              content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords"
              content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="<?= Html::encode(Yii::$app->name) ?>">
        <link rel="icon" href="<?= Url::home() ?>images/favicon.png" type="image/x-icon">
        <link rel="shortcut icon" href="<?= Url::home() ?>images/favicon.png" type="image/x-icon">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="landing-wrraper">
    <?php $this->beginBody() ?>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper landing-page">
        <!-- Page Body Start-->
        <?= $content ?>
        <!-- Page Body End-->
    </div>
    <?php $this->endBody() ?>

    <!--- Notify Session -->
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <script>
            $(document).ready(function () {
                $.notify({
                    title: '<strong>Success!</strong>',
                    message: "<?= Yii::$app->session->getFlash('success') ?>"

                }, {
                    type: 'success',
                    spacing: 10,
                    timer: 3000,
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    },
                    delay: 1000,
                    z_index: 10000
                });
            });
        </script>
    <?php endif; ?>
    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <script>
            $(document).ready(function () {
                $.notify({
                    title: '<strong>Error!</strong>',
                    message: "<?= Yii::$app->session->getFlash('error') ?>"

                }, {
                    type: 'danger',
                    spacing: 10,
                    timer: 3000,
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    },
                    delay: 1000,
                    z_index: 10000
                });
            });
        </script>
    <?php endif; ?>
    <!--- End Notify Session -->

    </body>
    </html>
<?php $this->endPage() ?>