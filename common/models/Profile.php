<?php

namespace common\models;

use common\models\region\RegionCity;
use common\models\region\RegionDistrict;
use common\models\region\RegionProvince;
use common\models\region\RegionSubdistrict;
use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $nama
 * @property int $province_id
 * @property int $city_id
 * @property int $district_id
 * @property int $subdistrict_id
 * @property string $alamat
 * @property string|null $tanggal_lahir
 * @property string|null $tempat_lahir
 * @property string|null $jenis_kelamin
 * @property string|null $agama
 * @property string|null $telp
 * @property string $foto
 * @property string $created
 * @property int $createdBy
 * @property string $modified
 * @property int $modifiedBy
 *
 * @property RegionCity $city
 * @property RegionDistrict $district
 * @property RegionProvince $province
 * @property RegionSubdistrict $subdistrict
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'nama', 'province_id', 'city_id', 'district_id', 'subdistrict_id', 'foto', 'created', 'createdBy', 'modified', 'modifiedBy'], 'required'],
            [['user_id', 'province_id', 'city_id', 'district_id', 'subdistrict_id', 'createdBy', 'modifiedBy'], 'integer'],
            [['alamat', 'foto'], 'string'],
            [['tanggal_lahir', 'created', 'modified'], 'safe'],
            [['nama', 'tempat_lahir'], 'string', 'max' => 255],
            [['jenis_kelamin', 'agama'], 'string', 'max' => 25],
            [['telp'], 'string', 'max' => 15],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => RegionCity::class, 'targetAttribute' => ['city_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => RegionDistrict::class, 'targetAttribute' => ['district_id' => 'id']],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => RegionProvince::class, 'targetAttribute' => ['province_id' => 'id']],
            [['subdistrict_id'], 'exist', 'skipOnError' => true, 'targetClass' => RegionSubdistrict::class, 'targetAttribute' => ['subdistrict_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'nama' => 'Nama',
            'province_id' => 'Provinsi',
            'city_id' => 'Kota',
            'district_id' => 'Kecamatan',
            'subdistrict_id' => 'Kelurahan',
            'alamat' => 'Alamat',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tempat_lahir' => 'Tempat Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'telp' => 'No Telp',
            'foto' => 'Foto',
            'created' => 'Created',
            'createdBy' => 'Created By',
            'modified' => 'Modified',
            'modifiedBy' => 'Modified By',
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
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(RegionDistrict::class, ['id' => 'district_id']);
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
     * Gets query for [[Subdistrict]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubdistrict()
    {
        return $this->hasOne(RegionSubdistrict::class, ['id' => 'subdistrict_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
