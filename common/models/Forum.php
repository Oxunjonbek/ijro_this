<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%forum}}".
 *
 * @property int $id
 * @property int $forum_category_id
 * @property int $user_id
 * @property int|null $reply_id
 *
 * @property Forum $reply
 * @property Forum[] $forums
 * @property ForumCategory $forumCategory
 * @property User $user
 */
class Forum extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%forum}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['forum_category_id', 'user_id'], 'required'],
            [['forum_category_id', 'user_id', 'reply_id'], 'integer'],
            [['reply_id'], 'exist', 'skipOnError' => true, 'targetClass' => Forum::className(), 'targetAttribute' => ['reply_id' => 'id']],
            [['forum_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ForumCategory::className(), 'targetAttribute' => ['forum_category_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'forum_category_id' => 'Forum Nomi',
            'user_id' => 'Foydalanuvchi',
            'reply_id' => 'Javob beruvchi',
        ];
    }

    /**
     * Gets query for [[Reply]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReply()
    {
        return $this->hasOne(Reply::className(), ['id' => 'reply_id']);
    }

    /**
     * Gets query for [[Forums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getForums()
    {
        return $this->hasMany(Forum::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[ForumCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getForumCategory()
    {
        return $this->hasOne(ForumCategory::className(), ['id' => 'forum_category_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
