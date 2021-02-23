<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%come_out}}".
 *
 * @property int $id
 * @property int $pupil_id
 * @property int $come
 * @property string|null $action_time
 *
 * @property Pupil $pupil
 */
class ComeOut extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%come_out}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pupil_id', 'come'], 'required'],
            [['pupil_id', 'come'], 'integer'],
            [['action_time'], 'safe'],
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
            'come' => 'Come',
            'action_time' => 'Action Time',
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
