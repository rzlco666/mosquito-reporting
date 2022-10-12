<?php

use common\models\Profile;
use rzlco666\region\models\Subdistrict;
use yii\helpers\Url;

$profile = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();
$subdistrict = Subdistrict::find()->where(['id' => $profile->subdistrict_id])->one();

?>
<header class="main-nav">
    <div class="sidebar-user text-center"><a class="setting-primary"
                                             href="#"><i
                    data-feather="settings"></i></a><img class="img-90 rounded-circle"
                                                         src="<?= Url::home() ?>upload/profile/thumb/<?= $profile->foto ?>"
                                                         alt="">
        <a href="#">
            <h6 class="mt-3 f-14 f-w-600"><?= $profile->nama ?></h6></a>
        <p class="mb-0 font-roboto"><?= 'Warga' . ' - ' . $subdistrict->name ?></p>
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
                    <li class="dropdown"><a class="nav-link menu-title"
                                            href="<?= Url::to(['/profile/profile/index/']) ?>"><i
                                    data-feather="user"></i><span>Profile</span></a></li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Warga </h6>
                        </div>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="<?= Url::to(['/warga/pelaporan/']) ?>"><i
                                    data-feather="target"></i><span>Pelaporan</span></a></li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Admin </h6>
                        </div>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                    data-feather="airplay"></i><span>Admin</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="<?= Url::to(['/gii']) ?>">Gii</a></li>
                            <li><a href="<?= Url::to(['/admin']) ?>">Admin</a></li>
                            <li><a href="<?= Url::to(['/tes/index']) ?>">Tes</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>