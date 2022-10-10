<?php

use yii\helpers\Url;

?>
<div class="row mb-2">
    <div class="profile-title">
        <div class="media"><img class="img-70 rounded-circle" alt=""
                                src="<?= Url::home() ?>upload/profile/thumb/<?= $profile->foto ?>">
            <div class="media-body">
                <h3 class="mb-1 f-20 txt-primary"><?= $profile->nama ?></h3>
                <p class="f-14"><?= 'Warga - ' . $profile->subdistrict->name ?></p>
            </div>
        </div>
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Username</label>
    <p class="f-14">
        <?= Yii::$app->user->identity->username ?>
    </p>
</div>
<div class="mb-3">
    <h6 class="form-label">Email</h6>
    <p class="f-14"><?= Yii::$app->user->identity->email ?></p>
</div>
<div class="mb-3">
    <label class="form-label">No Telp</label>
    <p class="f-14"><?= $profile->telp == null ? '-' : $profile->telp ?></p>
</div>
<div class="form-footer">
    <a href="<?= Url::to(['upload']) ?>" class="btn btn-primary">Perbarui
        Foto</a>
</div>