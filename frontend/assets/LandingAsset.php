<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class LandingAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //Google Font
        'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap',
        'https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap',

        //Font Awesome and Icon Font
        'css/fontawesome.css',
        'css/icofont.css',
        'css/themify.css',
        'css/flag-icon.css',
        'css/feather-icon.css',

        //Plugins css start

        //landing
        'css/animate.css',
        'css/owlcarousel.css',

        //Plugins css ends

        //Core css
        //'css/site.css',
        'css/style.css',
        'css/color-1.css',
        'css/responsive.css',
    ];
    public $js = [
        //Feather Icon js
        'js/icons/feather-icon/feather.min.js',
        'js/icons/feather-icon/feather-icon.js',

        //Sidebar jquery
        'js/sidebar-menu.js',
        'js/config.js',

        //Bootstrap js
        'js/bootstrap/popper.min.js',

        //Plugins JS start

        //landing
        'js/owlcarousel/owl.carousel.js',
        'js/owlcarousel/owl-custom.js',
        'js/landing_sticky.js',
        'js/landing.js',
        //'js/jarallax_libs/libs.min.js',

        'js/notify/bootstrap-notify.min.js',
        'js/tooltip-init.js',
        //Plugins JS ends

        //Theme js
        'js/script.js',
        //'js/theme-customizer/customizer.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
