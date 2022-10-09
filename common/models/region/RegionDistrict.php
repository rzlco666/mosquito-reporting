<?php

namespace common\models\region;

use Yii;

/**
 * This is the model class for table "region_district".
 *
 * @property int $id
 * @property int|null $number
 * @property string|null $name
 * @property int|null $city_id
 *
 * @property RegionCity $city
 * @property RegionSubdistrict[] $regionSubdistricts
 */
class RegionDistrict extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region_district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'city_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => RegionCity::class, 'targetAttribute' => ['city_id' => 'id']],
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
            'city_id' => 'City ID',
        ];
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(RegionCity::class, ['id' => 'city_id']);
    }

    /**
     * Gets query for [[RegionSubdistricts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegionSubdistricts()
    {
        return $this->hasMany(RegionSubdistrict::class, ['district_id' => 'id']);
    }
}
