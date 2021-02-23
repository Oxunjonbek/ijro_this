<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%reply}}".
 *
 * @property int $id
 * @property int $user_id
 *
 * @property Reply[] $replies
 * @property User $user
 */

class Reply extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return '{{%reply}}';
    }

    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['user_id'], 'required'],
        ]
    }
}
