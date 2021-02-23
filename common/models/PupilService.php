<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%pupil_service}}".
 *
 * @property int $id
 * @property int $pupil_id
 * @property int $service_id
 * @property int $active
 * @property string $active_time
 *
 * @property Pupil $pupil
 * @property Service $service
 */
class PupilService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pupil_service}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pupil_id', 'service_id', 'active', 'active_time'], 'required'],
            [['pupil_id', 'service_id', 'active'], 'integer'],
            [['active_time'], 'safe'],
            [['pupil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pupil::className(), 'targetAttribute' => ['pupil_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['service_id' => 'id']],
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
            'service_id' => 'Service ID',
            'active' => 'Active',
            'active_time' => 'Active Time',
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

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }
}
