<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%service}}".
 *
 * @property int $id
 * @property string $name
 *
 * @property PupilService[] $pupilServices
 * @property ServiceCost[] $serviceCosts
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%service}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[PupilServices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPupilServices()
    {
        return $this->hasMany(PupilService::className(), ['service_id' => 'id']);
    }

    /**
     * Gets query for [[ServiceCosts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiceCosts()
    {
        return $this->hasMany(ServiceCost::className(), ['service_id' => 'id']);
    }
}
