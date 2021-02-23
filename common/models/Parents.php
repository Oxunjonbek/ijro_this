<?php

namespace common\models;

use Yii;
use common\models\Pupil;

/**
 * This is the model class for table "{{%parent}}".
 *
 * @property int $id
 * @property string $full_name
 *
 * @property PupilParent[] $pupilParents
 * @property User[] $users
 */
class Parents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%parent}}';
    }

    /**
     * {@inheritdoc}
     */
    public  $student;
    public function rules()
    {
         return [
            [['pupil_id', 'full_name', 'birth_date'], 'required'],
            [['pupil_id', 'gender_id'], 'integer'],
            [['birth_date','student'], 'safe'],
            [['full_name'], 'string', 'max' => 255],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'id']],
            [['pupil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pupil::className(), 'targetAttribute' => ['pupil_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pupil_id' => 'O`quvchi',
            'full_name' => 'Ota-Ona Fio',
            'gender_id' => 'Jinsi',
            'birth_date' => 'Tug`ilgan sana',
        ];
    }

    /**
     * Gets query for [[PupilParents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPupilParents()
    {
        return $this->hasMany(PupilParent::className(), ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['parent_id' => 'id']);
    }
    public function getPupil()
    {
        return $this->hasOne(Pupil::className(), ['id' => 'pupil_id']);
    }
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
    }
}
