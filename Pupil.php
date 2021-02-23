<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%pupil}}".
 *
 * @property int $id
 * @property int $grade_id
 * @property string $full_name
 *
 * @property ComeOut[] $comeOuts
 * @property Payment[] $payments
 * @property Grade $grade
 * @property PupilParent[] $pupilParents
 * @property PupilService[] $pupilServices
 */
class Pupil extends \yii\db\ActiveRecord
{/**
     * {@inheritdoc}
     */
    public $image;
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
            [['grade_id', 'full_name', 'birth_date','img'], 'required'],
            [['grade_id', 'gender_id'], 'integer'],
            [['birth_date','sinf','img'], 'safe'],
            [['full_name','img'], 'string', 'max' => 255],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'id']],
            [['grade_id'], 'exist', 'skipOnError' => true, 'targetClass' => Grade::className(), 'targetAttribute' => ['grade_id' => 'id']],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,gif,jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'grade_id' => 'Sinf nomi',
            'full_name' => 'O`quvchi FIO',
            'gender_id' => 'Jinsi',
            'birth_date' => 'Tug`ilgan sana',
            // 'parent' => 'Ota-onalar',
            'img' => 'Rasm',
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
     * Gets query for [[Grade]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrade()
    {
        return $this->hasOne(Grade::className(), ['id' => 'grade_id']);
    }

    /**
     * Gets query for [[PupilParents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPupilParents()
    {
        return $this->hasMany(PupilParent::className(), ['pupil_id' => 'id']);
    }

    public function getParent()
    {
        return $this->hasMany(Parent::className(), ['pupil_id' => 'id']);
    }

    /**
     * Gets query for [[PupilServices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPupilServices()
    {
        return $this->hasMany(PupilService::className(), ['pupil_id' => 'id']);
    }
    public static function all($grade_id = null, $forDropDownList = true)
    {

        $query = self::find()
            ->orderBy(['full_name' => SORT_ASC]);

        if ($grade_id) {
            $query->where(['grade_id' => $grade_id]);

            $query->select('id, full_name');

        } else {
            $query->select('id, full_name, grade_id');
        }
        $data = $query->asArray()->all();

        if ($forDropDownList) {
            return ArrayHelper::map($data, 'id', 'full_name');
        } else {
            return $data;
        }

    }

     
}
