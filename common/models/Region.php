<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%region}}".
 *
 * @property int $id
 * @property string $name
 *
 * @property City[] $cities
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%region}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id' => 'Nomi',
        ];
    }

    /**
     * Gets query for [[Cities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['region_id' => 'id']);
    }

    public static function all($forDropDownList = true)
    {
        $data = self::find()
            ->select('id, name')
            ->orderBy(['name' => SORT_ASC])
            ->asArray()
            ->all();

        if ($forDropDownList) {
            return \yii\helpers\ArrayHelper::map($data, 'id', 'name');
        } else {
            return $data;
        }

    }
}
