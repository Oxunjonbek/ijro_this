<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%material}}".
 *
 * @property int $id
 * @property int $owner_id
 * @property int $topic_id
 * @property int $confirmed
 * @property int|null $confirmed_by
 *
 * @property Favorite[] $favorites
 * @property Topic $topic
 * @property User $owner
 * @property User $confirmedBy
 * @property Question[] $questions
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%material}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['owner_id', 'topic_id'], 'required'],
            [['owner_id', 'topic_id', 'confirmed', 'confirmed_by'], 'integer'],
            [['topic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Topic::className(), 'targetAttribute' => ['topic_id' => 'id']],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['owner_id' => 'id']],
            [['confirmed_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['confirmed_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'owner_id' => 'Owner ID',
            'topic_id' => 'Topic ID',
            'confirmed' => 'Confirmed',
            'confirmed_by' => 'Confirmed By',
        ];
    }

    /**
     * Gets query for [[Favorites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavorites()
    {
        return $this->hasMany(Favorite::className(), ['material_id' => 'id']);
    }

    /**
     * Gets query for [[Topic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTopic()
    {
        return $this->hasOne(Topic::className(), ['id' => 'topic_id']);
    }

    /**
     * Gets query for [[Owner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'owner_id']);
    }

    /**
     * Gets query for [[ConfirmedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConfirmedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'confirmed_by']);
    }

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['material_id' => 'id']);
    }
}
