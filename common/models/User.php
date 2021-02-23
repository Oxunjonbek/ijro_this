<?php

namespace common\models;

use mdm\admin\models\User as UserModel;
use Yii;
use yii\base\Exception;

/**
 * User model
 *
 * @property integer $id
 * @property integer $role_id
 * @property string $username
 * @property string $full_name
 * @property string $phone
 * @property string $teacher_id
 * @property string $parent_id
 * @property string $full_name
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property string $type_social
 * @property string $access_token
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends UserModel
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    public $new_password;

    public function rules()
    {
        return [
            [['username', 'password_hash', 'email','full_name'], 'required'],
            [['username', 'password_hash', 'email','full_name', 'phone'], 'string', 'max' => 255],
            [['role_id', 'teacher_id', 'parent_id'],  'integer'],
            [['username'],  'unique'],
            [['email'], 'email'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            [['teacher_id', 'parent_id'], 'default', 'value' => NULL, 'skipOnEmpty' => false],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'role_id' => 'Huquqi',
            'username' => 'Foydalanuvchi',
            'teacher_id' => 'O\'qituvchi',
            'parent_id' => 'Ota-ona',
            'password_hash' => 'Parol',
            'new_password' => 'Parolni qaytaring',
            'email' => 'Email',
            'full_name' => 'FISH',
            'phone' => 'Telefon raqam',
            'created_at' => 'Qo\'shildi',
            'updated_at' => 'O\'zgardi',
        ];
    }

    public function generateEmailVerificationToken()
    {
        try {
            $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
        } catch (Exception $e) {
        }
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token, 'status' => self::STATUS_ACTIVE]);
    }

    public function generateAccessToken()
    {
        try {
            $this->access_token = Yii::$app->security->generateRandomString();
        } catch (Exception $e) {
        }
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole(){
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    public function getTeacher() {
        return $this->hasOne(Teacher::class, ['id' => 'teacher_id']);
    }

}
