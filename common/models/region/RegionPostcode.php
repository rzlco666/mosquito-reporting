<?php

namespace common\models\region;

use Yii;

/**
 * This is the model class for table "region_postcode".
 *
 * @property int $id
 * @property int|null $number
 * @property int|null $subdistrict_id
 *
 * @property RegionSubdistrict $subdistrict
 */
class RegionPostcode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region_postcode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'subdistrict_id'], 'integer'],
            [['subdistrict_id'], 'exist', 'skipOnError' => true, 'targetClass' => RegionSubdistrict::class, 'targetAttribute' => ['subdistrict_id' => 'id']],
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
            'subdistrict_id' => 'Subdistrict ID',
        ];
    }

    /**
     * Gets query for [[Subdistrict]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubdistrict()
    {
        return $this->hasOne(RegionSubdistrict::class, ['id' => 'subdistrict_id']);
    }
}
