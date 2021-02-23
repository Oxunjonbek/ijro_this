<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%ad_time}}".
 *
 * @property int $id
 * @property int $ad_id
 *
 * @property Ad $ad
 */
class AdTime extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ad_time}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ad_id'], 'required'],
            [['ad_id'], 'integer'],
            [['ad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ad::className(), 'targetAttribute' => ['ad_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ad_id' => 'Ad ID',
        ];
    }

    /**
     * Gets query for [[Ad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAd()
    {
        return $this->hasOne(Ad::className(), ['id' => 'ad_id']);
    }
}
