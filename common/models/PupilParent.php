<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%pupil_parent}}".
 *
 * @property int $id
 * @property int $pupil_id
 * @property int $parent_id
 *
 * @property Parent $parent
 * @property Pupil $pupil
 */
class PupilParent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pupil_parent}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pupil_id', 'parent_id'], 'required'],
            [['pupil_id', 'parent_id'], 'integer'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Parent::className(), 'targetAttribute' => ['parent_id' => 'id']],
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
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Parent::className(), ['id' => 'parent_id']);
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
