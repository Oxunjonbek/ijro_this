<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%subject}}".
 *
 * @property int $id
 *
 * @property Chapter[] $chapters
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%subject}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }

    /**
     * Gets query for [[Chapters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChapters()
    {
        return $this->hasMany(Chapter::className(), ['subject_id' => 'id']);
    }
}
