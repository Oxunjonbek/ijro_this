<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%payment}}".
 *
 * @property int $id
 * @property int $pupil_id
 * @property float $how_much
 * @property string $paid_time
 *
 * @property Pupil $pupil
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%payment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pupil_id', 'how_much', 'paid_time'], 'required'],
            [['pupil_id'], 'integer'],
            [['how_much'], 'number'],
            [['paid_time'], 'safe'],
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
            'pupil_id' => 'Pupil ID',
            'how_much' => 'How Much',
            'paid_time' => 'Paid Time',
        ];
    }

    /**
     * Gets query for [[Pupil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPupil()
    {
        return $this->hasOne(Pupil::className(), ['id' => 'pupil_id']);
    }
}
