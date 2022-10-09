<?php

namespace common\models\region;

use Yii;

/**
 * This is the model class for table "region_city".
 *
 * @property int $id
 * @property int|null $number
 * @property string|null $name
 * @property int|null $province_id
 *
 * @property RegionProvince $province
 * @property RegionDistrict[] $regionDistricts
 */
class RegionCity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region_city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'province_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => RegionProvince::class, 'targetAttribute' => ['province_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'name' => 'Name',
            'province_id' => 'Province ID',
        ];
    }

    /**
     * Gets query for [[Province]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(RegionProvince::class, ['id' => 'province_id']);
    }

    /**
     * Gets query for [[RegionDistricts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegionDistricts()
    {
        return $this->hasMany(RegionDistrict::class, ['city_id' => 'id']);
    }
}
