<?php

namespace common\components;

use yii\base\Widget;
use yii\helpers\Url;

class Breadcrumb extends Widget
{
    public static function levelSatu($title)
    {
        ?>
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3><?= $title ?></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= Url::to(['/site/index/']) ?>">Home</a></li>
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <div class="bookmark">
                            <ul>
                                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover"
                                       data-placement="top" title="" data-original-title="Tables"><i
                                                data-feather="inbox"></i></a></li>
                                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover"
                                       data-placement="top" title="" data-original-title="Chat"><i
                                                data-feather="message-square"></i></a></li>
                                <li><a href="<?= Url::to(['/site/index/']) ?>" data-container="body"
                                       data-bs-toggle="popover"
                                       data-placement="top" title="" data-original-title="Icons"><i
                                                data-feather="home"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

}
