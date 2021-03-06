<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "calendar".
 *
 * @property int $id
 * @property string $date
 * @property int $val
 * @property int $tadbir_id
 */
class Calendar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'val', 'tadbir_id'], 'required'],
            [['date'], 'safe'],
            [['val', 'tadbir_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'val' => 'Val',
            'tadbir_id' => 'Tadbir ID',
        ];
    }
}
