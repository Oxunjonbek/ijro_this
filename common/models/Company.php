<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $company_name
 *
 * @property Tadbir[] $tadbirs
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_name','parent'], 'required'],
            [['company_name','parent'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Масъул',
            'parent' => 'Ташкилот тури',
        ];
    }

    /**
     * Gets query for [[Tadbirs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTadbirs()
    {
        return $this->hasMany(Tadbir::className(), ['company_id' => 'id']);
    }
}
