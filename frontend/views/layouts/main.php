<?php

/** @var View $this */

/** @var string $content */

use frontend\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\web\View;

AppAsset::register($this);
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
    <body>
    <?php $this->beginBody() ?>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <!-- Loader ends -->

    <!-- page-wrapper Start -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start --><?= $this->render("components/header") ?>
        <!-- Page Header Ends -->
        <!-- Page Body Start -->
        <div class="page-body-wrapper sidebar-icon">
            <!-- Page Sidebar Start -->
            <?= $this->render("components/sidebar") ?>
            <!-- Page Sidebar Ends -->
            <div class="page-body">
                <!-- Container-fluid starts -->
                <?= $content ?>
                <!-- Container-fluid Ends -->
            </div>
            <!-- footer start -->
            <?= $this->render("components/footer") ?>
            <!-- footer end -->
        </div>
    </div>

    <?php $this->endBody() ?>

    <!--- Notify Session -->
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <script>
            $(document).ready(function () {
                $.notify({
                    title: '<strong>Berhasil!</strong>',
                    message: "<?= Yii::$app->session->getFlash('success') ?>"

                }, {
                    type: 'primary',
                    mouse_over: true,
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
                    title: '<strong>Gagal!</strong>',
                    message: "<?= Yii::$app->session->getFlash('error') ?>"

                }, {
                    type: 'danger',
                    mouse_over: true,
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
<?php $this->endPage();