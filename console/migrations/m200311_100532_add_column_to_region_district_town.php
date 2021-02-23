<?php

use yii\db\Migration;

/**
 * Class m200311_100532_add_column_to_region_district_town
 */
class m200311_100532_add_column_to_region_district_town extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('region', 'name', $this->string());
        $this->addColumn('district', 'name', $this->string());
        $this->addColumn('town', 'name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('region', 'name');
        $this->dropColumn('district', 'name');
        $this->dropColumn('town', 'name');
    }
}
