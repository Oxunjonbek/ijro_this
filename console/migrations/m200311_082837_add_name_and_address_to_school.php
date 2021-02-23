<?php

use yii\db\Migration;

/**
 * Class m200311_082837_add_name_and_address_to_school
 */
class m200311_082837_add_name_and_address_to_school extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('school', 'name', $this->string());
        $this->addColumn('school', 'address', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('school', 'name');
        $this->dropColumn('school', 'address');
    }
}
