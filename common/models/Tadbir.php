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

    public function companySelect($user)
    {
        if (!Yii::$app->user->isGuest) {
            switch ($user->username) {
                case 'audit':
                $company_id = 18;
                break;
                case 'taxlil':
                $company_id = 8;
                break;
                case 'metrologiya':
                $company_id = 12;
                break;
                case 'reglament':
                $company_id = 10;
                break;
                case 'axborot':
                $company_id = 13;
                break;
                case 'standart':
                $company_id = 9;
                break;
                case 'sertifikat':
                $company_id = 15;
                break;
                case 'smk':
                $company_id = 16;
                break;
                case 'xalqaro':
                $company_id = 14;
                break;
                case 'integratsiya':
                $company_id = 11;
                break;
                case 'moliya':
                $company_id = 17;
                break;
                case 'bugalteriya':
                $company_id = 32;
                break;
                case 'yuridik':
                $company_id = 20;
                break;
                case 'kadr':
                $company_id = 19;
                break;
                case 'ijro':
                $company_id = 21;
                break;
                case 'pressa':
                $company_id = 30;
                break;
                case 'murojaat':
                $company_id = 22;
                break;
                case 'xo\'jalik':
                $company_id = 23;
                break;
                case 'smsiti':
                $company_id = 24;
                break;
                case 'uznim':
                $company_id = 25;
                break;
                case 'dep':
                $company_id = 26;
                break;
                case 'akkred':
                $company_id = 27;
                break;
                case 'barcode':
                $company_id = 28;
                break;
                case 'uztest':
                $company_id = 29;
                break;
                case 'antikorp':
                $company_id = 31;
                break;
                default;
                $company_id ='';
            }
        }

        return $company_id;
    }
}
