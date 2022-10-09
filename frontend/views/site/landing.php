<?php

use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'SIJUM';
?>
<div class="page-body-wrapper">
    <!-- header start-->
    <header class="landing-header">
        <div class="custom-container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-light p-0" id="navbar-example2"><a class="navbar-brand"
                                                                                 href="javascript:void(0)"> <img
                                    class="img-fluid" src="<?= Url::home() ?>images/logo/logo.png" alt=""></a>
                        <ul class="landing-menu nav nav-pills">
                            <li class="nav-item menu-back">back<i class="fa fa-angle-right"></i></li>
                            <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pengumuman">Pengumuman</a></li>
                        </ul>
                        <div class="buy-block"><a class="btn-landing"
                                                  href="<?= Url::to(['login']) ?>">Daftar/Masuk</a>
                            <div class="toggle-menu"><i class="fa fa-bars"></i></div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header end-->
    <!--home section start-->
    <section class="landing-home section-pb-space" id="home"><img class="img-fluid bg-img-cover"
                                                                  src="<?= Url::home() ?>images/landing/landing-home/home-bg2.jpg"
                                                                  alt="">
        <div class="custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="landing-home-contain">
                        <div>
                            <div class="landing-logo"><img class="img-fluid"
                                                           src="<?= Url::home() ?>images/landing/landing-home/logo.png"
                                                           alt=""></div>
                            <h6>Aplikasi </h6>
                            <h2>SIJUM</h2>
                            <p>Sistem Informasi Tugas Akhir ITS PKU Muhammadiyah Surakarta</p><a class="btn-landing btn-lg"
                                                                                           href="<?= Url::to(['login']) ?>">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-block">
            <div class="circle1 opicity3"></div>
            <div class="star"><i class="fa fa-asterisk"></i></div>
            <div class="star star1"><i class="fa fa-asterisk"></i></div>
            <div class="star star2 opicity3"><i class="fa fa-asterisk"></i></div>
            <div class="star star3"><i class="fa fa-times"></i></div>
            <div class="star star4 opicity3"><i class="fa fa-times"></i></div>
            <div class="star star5 opicity3"><i class="fa fa-times"></i></div>
            <ul class="animat-block">
                <li><img class="img-fluid img-parten top-parten"
                         src="<?= Url::home() ?>images/landing/landing-home/home-position/img-parten.png" alt="">
                    <div><img class="img-fluid img1 v-align-t m-t-30"
                              src="<?= Url::home() ?>images/landing/landing-home/home-position/img-1.jpg" alt=""><img
                                class="img-fluid img2 v-align-t"
                                src="<?= Url::home() ?>images/landing/landing-home/home-position/img-2.jpg" alt=""><img
                                class="img-fluid img3 v-align-b"
                                src="<?= Url::home() ?>images/landing/landing-home/home-position/img-3.jpg" alt=""><img
                                class="img-fluid img4 v-align-b"
                                src="<?= Url::home() ?>images/landing/landing-home/home-position/img-4.jpg" alt="">
                    </div>
                </li>
                <li>
                    <div><img class="img-fluid img5"
                              src="<?= Url::home() ?>images/landing/landing-home/home-position/img-5.png" alt=""><img
                                class="img-fluid img6 v-align-c"
                                src="<?= Url::home() ?>images/landing/landing-home/home-position/img-6.jpg" alt="">
                    </div>
                </li>
                <li><img class="img-fluid img-parten bottom-parten"
                         src="<?= Url::home() ?>images/landing/landing-home/home-position/img-parten.png" alt="">
                    <div><img class="img-fluid img7 v-align-t"
                              src="<?= Url::home() ?>images/landing/landing-home/home-position/img-7.jpg" alt=""><img
                                class="img-fluid img8 v-align-t"
                                src="<?= Url::home() ?>images/landing/landing-home/home-position/img-8.jpg" alt=""><img
                                class="img-fluid img9"
                                src="<?= Url::home() ?>images/landing/landing-home/home-position/img-9.jpg" alt="">
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!--home section end-->
    <!--frameworks start-->
    <section class="framework section-py-space light-bg" id="pengumuman">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-12 wow pulse">
                    <div class="title">
                        <h2>Header</h2>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h1>Hi!</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--frameworks end-->
    <!--footer start-->
    <div class="sub-footer">
        <div class="custom-container">
            <div class="row">
                <div class="col-md-6 col-sm-2">
                    <div class="footer-contain"><img class="img-fluid" src="<?= Url::home() ?>images/logo/logo.png"
                                                     alt=""></div>
                </div>
                <div class="col-md-6 col-sm-10">
                    <div class="footer-contain">
                        <p class="mb-0">Copyright <?= date('Y') . '-' . date('y', strtotime('+1 year')); ?>
                            © <?= Html::encode(Yii::$app->name) ?> All rights reserved. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer end-->
</div>