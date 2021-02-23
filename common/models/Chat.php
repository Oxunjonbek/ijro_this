<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%chat}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $user_id1
 *
 * @property User $user
 * @property User $userId1
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%chat}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'user_id1'], 'required'],
            [['user_id', 'user_id1'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['user_id1'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id1' => 'id']],
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
            'user_id1' => 'User Id1',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[UserId1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserId1()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id1']);
    }
}
