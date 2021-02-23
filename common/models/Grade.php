<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%grade}}".
 *
 * @property int $id
 * @property int $school_id
 * @property int $shift_id
 * @property int|null $teacher_id
 * @property string $name
 * @property int $began_year
 * @property int $end_year
 * @property string|null $camera_url
 *
 * @property School $school3
 * @property Shift $shift
 * @property Teacher $teacher
 * @property Pupil[] $pupils
 */
class Grade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%grade}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['school_id', 'shift_id', 'name', 'began_year', 'end_year'], 'required'],
            [['school_id', 'shift_id', 'teacher_id', 'began_year', 'end_year'], 'integer'],
            [['name', 'camera_url'], 'string', 'max' => 45],
            [['school_id'], 'exist', 'skipOnError' => true, 'targetClass' => School::className(), 'targetAttribute' => ['school_id' => 'id']],
            [['shift_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shift::className(), 'targetAttribute' => ['shift_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacher_id' => 'id']],
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
            'shift_id' => 'Smena',
            'teacher_id' => 'O`qituvchi',
            'name' => 'Sinf Nomi',
            'began_year' => 'Boshlangan yil',
            'end_year' => 'Tugash yili',
            'camera_url' => 'Rasmi',
        ];
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

    /**
     * Gets query for [[Shift]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShift()
    {
        return $this->hasOne(Shift::className(), ['id' => 'shift_id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }
    public function getSchoolTeachers()
    {
        return $this->hasMany(SchoolTeacher::className(), ['id' => 'teacher_id']);
    }

    /**
     * Gets query for [[Pupils]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPupils()
    {
        return $this->hasMany(Pupil::className(), ['grade_id' => 'id']);
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
