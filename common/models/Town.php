<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%town}}".
 *
 * @property int $id
 * @property int $district_id
 * @property string $name
 * @property School[] $schools
 * @property District $district
 */
class Town extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%town}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['district_id'], 'required'],
            [['district_id'], 'integer'],
            [['name'], 'string'],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['district_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'district_id' => 'District ID',
            'name' => 'Nomi',
        ];
    }

    /**
     * Gets query for [[Schools]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchools()
    {
        return $this->hasMany(School::className(), ['town_id' => 'id']);
    }

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }

    public static function all($district_id = null, $forDropDownList = true)
    {

        $query = self::find()
            ->orderBy(['name' => SORT_ASC]);

        if ($district_id) {
            $query->where(['district_id' => $district_id]);

            $query->select('id, name');

        } else {
            $query->select('id, name, district_id');
        }
        $data = $query->asArray()->all();

        if ($forDropDownList) {
            return ArrayHelper::map($data, 'id', 'name');
        } else {
            return $data;
        }

    }
}
