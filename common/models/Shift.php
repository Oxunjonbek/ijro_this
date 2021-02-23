<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shift}}".
 *
 * @property int $id
 * @property int $school_id
 * @property string $name
 * @property string $time_from
 * @property string $time_to
 *
 * @property Grade[] $grades
 * @property School $school3
 */
class Shift extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%shift}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['school_id', 'name', 'time_from', 'time_to'], 'required'],
            [['school_id'], 'integer'],
            [['time_from', 'time_to'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['school_id'], 'exist', 'skipOnError' => true, 'targetClass' => School::className(), 'targetAttribute' => ['school_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_id' => 'Maktab',
            'name' => 'Smena',
            'time_from' => 'Boshlanish vaqti',
            'time_to' => 'Tugash vaqti',
        ];
    }

    /**
     * Gets query for [[Grades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grade::className(), ['shift_id' => 'id']);
    }

    /**
     * Gets query for [[School]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['id' => 'school_id']);
    }

    public static function all($school_id = null, $forDropDownList = true)
    {

        $query = self::find()
            ->orderBy(['name' => SORT_ASC]);

        if ($school_id) {
            $query->where(['school_id' => $school_id]);

            $query->select('id, name');

        } else {
            $query->select('id, name, school_id');
        }
        $data = $query->asArray()->all();

        if ($forDropDownList) {
            return ArrayHelper::map($data, 'id', 'name');
        } else {
            return $data;
        }

    }
}
