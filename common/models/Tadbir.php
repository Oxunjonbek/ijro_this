<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tadbir".
 *
 * @property int $id
 * @property string $tadbir_name
 * @property string $tadbir_content
 * @property string $tadbir_result
 * @property string $tadbir_date
 * @property string $tadbir_description
 * @property string $tadbir_status
 * @property int $company_id
 *
 * @property Company $company
 */
class Tadbir extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $files;
    public static function tableName()
    {
        return 'tadbir';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tadbir_name', 'tadbir_content', 'tadbir_result', 'tadbir_date', 'tadbir_description', 'tadbir_status', 'company_id'], 'required'],
            [['tadbir_name', 'tadbir_content', 'tadbir_result', 'tadbir_description'], 'string'],
            [['tadbir_date'], 'safe'],
            [['company_id'], 'integer'],
            [['tadbir_status'], 'string', 'max' => 300],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
             [['file'], 'string', 'max' => 255],
            [['files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'doc,pdf'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tadbir_name' => 'Тадбир номи',
            'tadbir_content' => 'Амалга ошириш механизми',
            'tadbir_result' => 'Эришиладиган натижа ва кўрсаткичлар',
            'masullar' => 'Масъуллар',
            'tadbir_date' => 'Муддат',
            'tadbir_description' => 'Амалга оширилган ишлар',
            'tadbir_status' => 'Ижро ҳолати',
            'company_id' => 'Бошқарма,Бўлим,Тизим Ташкилотлари',
            'files' => 'Файл',
        ];
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
}
