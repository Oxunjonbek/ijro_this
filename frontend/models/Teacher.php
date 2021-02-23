<?php

namespace app\models;

use Yii;

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
     */
    public function rules()
    {
        return [
            [['school_id', 'full_name'], 'required'],
            [['school_id', 'gender_id'], 'integer'],
            [['birth_date'], 'safe'],
            [['full_name'], 'string', 'max' => 255],
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
            'school_id' => 'School ID',
            'full_name' => 'Full Name',
            'birth_date' => 'Birth Date',
            'gender_id' => 'Gender ID',
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
}
