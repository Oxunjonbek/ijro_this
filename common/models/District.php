<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%district}}".
 *
 * @property int $id
 * @property string $name
 * @property int $region_id
 *
 * @property Region $region
 * @property Town[] $towns
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%district}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id'], 'required'],
            [['region_id'], 'integer'],
            [['name'], 'string'],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_id' => 'Region ID',
            'name' => 'Nomi',
        ];
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * Gets query for [[Towns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTowns()
    {
        return $this->hasMany(Town::className(), ['district_id' => 'id']);
    }

      public static function all($region_id = null, $forDropDownList = true)
    {

        $query = self::find()
            ->orderBy(['name' => SORT_ASC]);

        if ($region_id) {
            $query->where(['region_id' => $region_id]);

            $query->select('id, name');

        } else {
            $query->select('id, name, region_id');
        }
        $data = $query->asArray()->all();

        if ($forDropDownList) {
            return ArrayHelper::map($data, 'id', 'name');
        } else {
            return $data;
        }

    }
}
