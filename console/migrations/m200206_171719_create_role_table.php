<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%role}}`.
 */
class m200206_171719_create_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%role}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(255)->unique()
        ], $tableOptions);

        $this->batchInsert('role',
            [
                'id', 'name'
            ],
            [
                [1, 'admin'],
                [2, 'tasischi'],
                [3, 'o\'qituvchi'],
                [4, 'direktor'],
                [5, 'ota-ona'],
                [6, 'vazirlik'],
                [7, 'viloyat'],
                [8, 'tuman'],
                [9, 'media'],
                [10, 'reklama'],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%role}}');
    }
}
