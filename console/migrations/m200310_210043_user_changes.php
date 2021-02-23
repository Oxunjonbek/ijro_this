<?php

use yii\db\Migration;

/**
 * Class m200310_210043_user_changes
 */
class m200310_210043_user_changes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'teacher_id', $this->integer()->unsigned()->null()->defaultValue(NULL)->after('username'));
        $this->addColumn('user', 'parent_id', $this->integer()->unsigned()->null()->defaultValue(NULL)->after('teacher_id'));

        $this->createIndex('fk_user_teacher1_idx', 'user', 'teacher_id');
        $this->createIndex('fk_user_parent1_idx', 'user', 'parent_id');

        $this->addForeignKey('fk_user_teacher1', 'user', 'teacher_id', 'teacher', 'id');
        $this->addForeignKey('fk_user_parent1', 'user', 'parent_id', 'parent', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200310_210043_user_changes cannot be reverted.\n";

        return false;
    }
}
