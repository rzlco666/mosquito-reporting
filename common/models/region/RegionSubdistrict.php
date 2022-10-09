<?php

namespace common\models\region;

use Yii;

/**
 * This is the model class for table "region_subdistrict".
 *
 * @property int $id
 * @property int|null $number
 * @property string|null $name
 * @property int|null $district_id
 *
 * @property RegionDistrict $district
 * @property RegionPostcode[] $regionPostcodes
 */
class RegionSubdistrict extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region_subdistrict';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'district_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => RegionDistrict::class, 'targetAttribute' => ['district_id' => 'id']],
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
            'district_id' => 'District ID',
        ];
    }

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(RegionDistrict::class, ['id' => 'district_id']);
    }

    /**
     * Gets query for [[RegionPostcodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegionPostcodes()
    {
        return $this->hasMany(RegionPostcode::class, ['subdistrict_id' => 'id']);
    }
}
