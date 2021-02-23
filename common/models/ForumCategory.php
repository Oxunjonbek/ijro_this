<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%forum_category}}".
 *
 * @property int $id
 *
 * @property Forum[] $forums
 */
class ForumCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%forum_category}}';
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
     * Gets query for [[Forums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getForums()
    {
        return $this->hasMany(Forum::className(), ['forum_category_id' => 'id']);
    }
}
