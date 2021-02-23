<?php

use yii\db\Migration;

/**
 * Class m200311_072525_add_full_name_and_phone_column_to_user
 */
class m200311_072525_add_full_name_and_phone_column_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'full_name', $this->string()->after('username'));
        $this->addColumn('user', 'phone', $this->string()->after('full_name'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'full_name');
        $this->dropColumn('user', 'phone');
    }
}
