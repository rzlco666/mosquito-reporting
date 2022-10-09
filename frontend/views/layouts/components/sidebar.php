<?php

use common\models\DataDosen;
use common\models\DataMahasiswa;
use yii\helpers\Url;

?>
<header class="main-nav">
    <div class="sidebar-user text-center"><a class="setting-primary"
                                             href="#"><i
                    data-feather="settings"></i></a><img class="img-90 rounded-circle"
                                                         src="#"
                                                         alt="">
        <a href="#">
            <h6 class="mt-3 f-14 f-w-600"><?= 'Rizal' ?></h6></a>
        <p class="mb-0 font-roboto"><?= 'Warga' . ' - ' . 'Kadipiro' ?></p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                                                              aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Umum </h6>
                        </div>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="<?= Url::to(['/site/index/']) ?>"><i
                                    data-feather="home"></i><span>Dashboard</span></a></li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>