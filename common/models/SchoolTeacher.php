<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%school_teacher}}".
 *
 * @property int $id
 * @property int $school_id
 * @property int $teacher_id
 *
 * @property School $school3
 * @property Teacher $teacher
 */
class SchoolTeacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%school_teacher}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['school_id', 'teacher_id'], 'required'],
            [['school_id', 'teacher_id'], 'integer'],
            [['school_id'], 'exist', 'skipOnError' => true, 'targetClass' => School::className(), 'targetAttribute' => ['school_id' => 'id']],
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
            'school_id' => 'School ID',
            'teacher_id' => 'Teacher ID',
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
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }

    public function getGrade()
    {
        return $this->hasOne(Grade::className(), ['id' => 'teacher_id']);
    }
}
