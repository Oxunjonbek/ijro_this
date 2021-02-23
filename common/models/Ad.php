<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%ad}}".
 *
 * @property int $id
 * @property int $ad_type_id
 * @property string|null $title
 * @property string $content
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property AdType $adType
 * @property AdTime[] $adTimes
 * @property AdUser[] $adUsers
 */
class Ad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ad}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ad_type_id', 'content'], 'required'],
            [['ad_type_id'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 200],
            [['ad_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdType::className(), 'targetAttribute' => ['ad_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ad_type_id' => 'Ad Type ID',
            'title' => 'Title',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[AdType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdType()
    {
        return $this->hasOne(AdType::className(), ['id' => 'ad_type_id']);
    }

    /**
     * Gets query for [[AdTimes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdTimes()
    {
        return $this->hasMany(AdTime::className(), ['ad_id' => 'id']);
    }

    /**
     * Gets query for [[AdUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdUsers()
    {
        return $this->hasMany(AdUser::className(), ['ad_id' => 'id']);
    }
}
