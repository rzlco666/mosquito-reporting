<?php

namespace common\components;

use Yii;
use yii\base\Widget;

class StaticData extends Widget
{
    public static function dropdownAgama()
    {
        return [
            'Islam' => 'Islam',
            'Kristen' => 'Kristen',
            'Katolik' => 'Katolik',
            'Hindu' => 'Hindu',
            'Budha' => 'Budha',
            'Konghucu' => 'Konghucu'
        ];
    }

    public static function dropdownJenisKelamin()
    {
        return [
            'Laki-laki' => 'Laki-laki',
            'Perempuan' => 'Perempuan'
        ];
    }
}
