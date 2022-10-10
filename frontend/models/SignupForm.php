<?php

namespace frontend\models;

use common\models\Profile;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $nama;
    public $username;
    public $province_id;
    public $city_id;
    public $district_id;
    public $subdistrict_id;
    public $email;
    public $password;
    public $policy;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['nama', 'required'],
            ['nama', 'string', 'min' => 2, 'max' => 255],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['province_id', 'required'],
            ['city_id', 'required'],
            ['district_id', 'required'],
            ['subdistrict_id', 'required'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['policy', 'required', 'message' => 'Anda harus setuju dengan syarat dan ketentuan.'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        if ($user->save()) {
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->nama = $this->nama;
            $profile->province_id = $this->province_id;
            $profile->city_id = $this->city_id;
            $profile->district_id = $this->district_id;
            $profile->subdistrict_id = $this->subdistrict_id;
            $profile->foto = 'default.png';
            $profile->created = date('Y-m-d H:i:s');
            $profile->createdBy = $user->id;
            $profile->modified = date('Y-m-d H:i:s');
            $profile->modifiedBy = $user->id;
            $profile->save();

            return $this->sendEmail($user);
        }
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }

    //label
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'username' => 'Username',
            'province_id' => 'Provinsi',
            'city_id' => 'Kota',
            'district_id' => 'Kecamatan',
            'subdistrict_id' => 'Kelurahan',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'verification_token' => 'Verification Token',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
