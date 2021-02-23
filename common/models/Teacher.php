<?php

namespace common\models;

use Yii;
use common\models\Gender;
use common\models\School;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property int $school_id
 * @property string $full_name
 * @property string|null $birth_date
 * @property int|null $gender_id
 *
 * @property Grade[] $grades
 * @property SchoolTeacher[] $schoolTeachers
 * @property Gender $gender
 * @property User[] $users
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */    public function rules()
    {
        return [
            [['school_id', 'full_name'], 'required'],
            [['school_id', 'gender_id'], 'integer'],
            [['birth_date'], 'safe'],
            ['birth_date', 'trim'],
            ['birth_date', 'string','max' => 13],
            [['full_name'], 'string', 'max' => 100],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'id']],
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
            'full_name' => 'O`qituvchi FIO',
            'birth_date' => 'Telefon raqami',
            'gender_id' => 'Jinsi',
            'sinf' => 'Sinf'
        ];
    }


    /**
     * Gets query for [[Grades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grade::className(), ['teacher_id' => 'id']);
    }

    /**
     * Gets query for [[SchoolTeachers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolTeachers()
    {
        return $this->hasMany(SchoolTeacher::className(), ['teacher_id' => 'id']);
    }

    /**
     * Gets query for [[Gender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['id' => 'school_id']);
    }

    /**
     * Gets query for [[Gender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['teacher_id' => 'id']);
    }
    public static function all($school_id = null, $forDropDownList = true)
    {

        $query = self::find()
            ->orderBy(['full_name' => SORT_ASC]);

        if ($school_id) {
            $query->where(['school_id' => $school_id]);

            $query->select('id, full_name');

        } else {
            $query->select('id, full_name, school_id');
        }
        $data = $query->asArray()->all();

        if ($forDropDownList) {
            return ArrayHelper::map($data, 'id', 'full_name');
        } else {
            return $data;
        }

    }
}
