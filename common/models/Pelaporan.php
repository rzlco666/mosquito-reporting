<?php

namespace common\models;

use liuyuanjun\yii2\softdelete\SoftDeleteTrait;
use Yii;

/**
 * This is the model class for table "pelaporan".
 *
 * @property int $id
 * @property int $profile_id
 * @property string $latitude
 * @property string $longitude
 * @property string $position
 * @property string $alamat
 * @property string $foto
 * @property int $status
 * @property string $created
 * @property int $createdBy
 * @property string $modified
 * @property int $modifiedBy
 * @property int $is_deleted
 *
 * @property Profile $profile
 */
class Pelaporan extends \yii\db\ActiveRecord
{
    //soft delete logic
    use SoftDeleteTrait;
    public static function getIsDeletedAttribute(): string
    {
        return 'is_deleted';
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelaporan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['profile_id', 'latitude', 'longitude', 'position', 'foto', 'status', 'created', 'createdBy', 'modified', 'modifiedBy'], 'required'],
            [['profile_id', 'status', 'createdBy', 'modifiedBy', 'is_deleted'], 'integer'],
            [['latitude', 'longitude', 'position', 'alamat', 'foto'], 'string'],
            [['created', 'modified'], 'safe'],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['profile_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profile_id' => 'Profile ID',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'position' => 'Position',
            'alamat' => 'Alamat',
            'foto' => 'Foto',
            'status' => 'Status',
            'created' => 'Created',
            'createdBy' => 'Created By',
            'modified' => 'Modified',
            'modifiedBy' => 'Modified By',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::class, ['id' => 'profile_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataCreated()
    {
        return $this->hasOne(Profile::class, ['user_id' => 'createdBy']);
    }

    /**
     * Gets query for [[ModifiedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataModified()
    {
        return $this->hasOne(Profile::class, ['user_id' => 'modifiedBy']);
    }
}
