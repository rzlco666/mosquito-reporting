<?php

namespace common\components;

use Yii;
use yii\base\Widget;

class StatusData extends Widget
{
    public static function dropdownPelaporan()
    {
        return [
            0 => "Review",
            1 => "Disetujui",
            2 => "Ditolak",
        ];
    }

    public static function cetakStatusPelaporan($status_id)
    {
        switch ($status_id) {
            case 0:
                return
                    '
                    <span class="badge badge-info">Review</span>
                    ';
                break;
            case 1:
                return
                    '
                    <span class="badge badge-primary">Disetujui</span>
                    ';
                break;
            case 2:
                return
                    '
                    <span class="badge badge-danger">Ditolak</span>
                    ';
                break;
            default:
                return 'Tidak Diketahui';
                break;
        }
    }
}
