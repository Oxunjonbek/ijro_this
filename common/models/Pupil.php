<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%pupil}}".
 *
 * @property int $id
 * @property int $grade_id
 * @property string $full_name
 * @property string $image
 *
 * @property ComeOut[] $comeOuts
 * @property Payment[] $payments
 * @property Grade $grade
 * @property PupilParent[] $pupilParents
 * @property-read ActiveQuery $gender
 * @property PupilService[] $pupilServices
 */
class Pupil extends ActiveRecord
{
    /**
     * {}
     */
    public $parent;

    /**
     * @var mixed|string|null
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
            [['grade_id', 'full_name', 'telephone', 'image'], 'required'],
            [['grade_id', 'gender_id'], 'integer'],
            [['telephone', 'sinf'], 'safe'],
            [['full_name', 'image'], 'string', 'max' => 255],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'id']],
            [['grade_id'], 'exist', 'skipOnError' => true, 'targetClass' => Grade::className(), 'targetAttribute' => ['grade_id' => 'id']],
            [['image'], 'file', 'extensions' => 'png,jpg,gif,jpeg', 'skipOnEmpty' => true],
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
            'telephone' => 'Telefon raqam',
            'parent' => 'Ota-onalar',
            'image' => 'Image'
        ];
    }

    /**
     * Gets query for [[ComeOuts]].
     *
     * @return ActiveQuery
     */
    public function getComeOuts()
    {
        return $this->hasMany(ComeOut::className(), ['pupil_id' => 'id']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['pupil_id' => 'id']);
    }

    /**
     * Gets query for [[Gender]].
     *
     * @return ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
    }

    /**
     * Gets query for [[Grade]].
     *
     * @return ActiveQuery
     */
    public function getGrade()
    {
        return $this->hasOne(Grade::class, ['id' => 'grade_id']);
    }

    /**
     * Gets query for [[PupilParents]].
     *
     * @return ActiveQuery
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
     * @return ActiveQuery
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

    /**
     * @return string
     */
    public function getImage(): string
    {
        return ($this->image) ? '@web/uploads/' . $this->image : '@web/uploads/';
    }
}
