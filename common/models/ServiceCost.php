<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%service_cost}}".
 *
 * @property int $id
 * @property int $service_id
 * @property float $how_much
 * @property string $fixed_time
 *
 * @property Service $service
 */
class ServiceCost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%service_cost}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'how_much', 'fixed_time'], 'required'],
            [['service_id'], 'integer'],
            [['how_much'], 'number'],
            [['fixed_time'], 'safe'],
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
            'service_id' => 'Service ID',
            'how_much' => 'How Much',
            'fixed_time' => 'Fixed Time',
        ];
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
