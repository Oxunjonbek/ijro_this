<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%school3}}".
 *
 * @property int $id
 * @property int $town_id

 *
 * @property Grade[] $grades
 * @property Town $town
 * @property SchoolTeacher[] $schoolTeachers
 * @property Shift[] $shifts
 */
class School extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%school}}';
    }

    public $region;
    public $district;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['town_id','phone','location'], 'required'],
            [['town_id','phone'], 'integer'],
            [['name', 'address','location'], 'string', 'max' => 100],
            [['town_id'], 'exist', 'skipOnError' => true, 'targetClass' => Town::className(), 'targetAttribute' => ['town_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'town_id' => 'Mavze',
            'name' => 'Nomi',
            'address' => 'Manzil',
            'phone' => 'Telefon',

            // 'location' => 'Location',

            'location' => 'Geo Manzil',

        ];
    }

    /**
     * Gets query for [[Grades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grade::className(), ['school_id' => 'id']);
    }

    /**
     * Gets query for [[Town]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTown()
    {
        return $this->hasOne(Town::className(), ['id' => 'town_id']);
    }

    /**
     * Gets query for [[SchoolTeachers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolTeachers()
    {
        return $this->hasMany(SchoolTeacher::className(), ['school_id' => 'id']);
    }

    /**
     * Gets query for [[Shifts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShifts()
    {
        return $this->hasMany(Shift::className(), ['school_id' => 'id']);
    }
    public static function all($town_id = null, $forDropDownList = true)
    {

        $query = self::find()
            ->orderBy(['name' => SORT_ASC]);

        if ($town_id) {
            $query->where(['town_id' => $town_id]);

            $query->select('id, name');

        } else {
            $query->select('id, name, town_id');
        }
        $data = $query->asArray()->all();

        if ($forDropDownList) {
            return ArrayHelper::map($data, 'id', 'name');
        } else {
            return $data;
        }

    }
}
