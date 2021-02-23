<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%question}}".
 *
 * @property int $id
 * @property int $material_id
 * @property int $user_id
 * @property int|null $reply_id
 * @property string|null $content
 *
 * @property Material $material
 * @property Question $reply
 * @property Question[] $questions
 * @property User $user
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%question}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['material_id', 'user_id'], 'required'],
            [['material_id', 'user_id', 'reply_id'], 'integer'],
            [['content'], 'string'],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
            [['reply_id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['reply_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'material_id' => 'Material ID',
            'user_id' => 'User ID',
            'reply_id' => 'Reply ID',
            'content' => 'Content',
        ];
    }

    /**
     * Gets query for [[Material]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['id' => 'material_id']);
    }

    /**
     * Gets query for [[Reply]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReply()
    {
        return $this->hasOne(Question::className(), ['id' => 'reply_id']);
    }

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['reply_id' => 'id']);
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
}
