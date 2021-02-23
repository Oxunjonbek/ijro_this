<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pupil".
 *
 * @property int $id
 * @property int $grade_id
 * @property string $full_name
 * @property int|null $gender_id
 * @property string $birth_date
 *
 * @property ComeOut[] $comeOuts
 * @property Payment[] $payments
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pupil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grade_id', 'full_name', 'birth_date'], 'required'],
            [['grade_id', 'gender_id'], 'integer'],
            [['birth_date'], 'safe'],
            [['full_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'grade_id' => 'Grade ID',
            'full_name' => 'Full Name',
            'gender_id' => 'Gender ID',
            'birth_date' => 'Birth Date',
        ];
    }

    /**
     * Gets query for [[ComeOuts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComeOuts()
    {
        return $this->hasMany(ComeOut::className(), ['pupil_id' => 'id']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['pupil_id' => 'id']);
    }
}
