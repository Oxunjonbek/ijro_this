<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%add_admin}}`.
 */
class m200206_195847_create_add_admin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'role_id' => 1,
            'username' => 'admin',
            'email' => 'admin@mail.uz',
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'status' => 10,
            'created_at' => time(),
            'updated_at' => 0
        ]);

        $this->insert('user', [
            'role_id' => 2,
            'username' => 'tasischi',
            'email' => 'founder@mail.uz',
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'status' => 10,
            'created_at' => time(),
            'updated_at' => 0
        ]);

        $this->insert('user', [
            'role_id' => 3,
            'username' => 'teacher',
            'email' => 'teacher@mail.uz',
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'status' => 10,
            'created_at' => time(),
            'updated_at' => 0
        ]);

        $this->insert('user', [
            'role_id' => 4,
            'username' => 'direktor',
            'email' => 'director@mail.uz',
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'status' => 10,
            'created_at' => time(),
            'updated_at' => 0
        ]);

        $this->insert('user', [
            'role_id' => 5,
            'username' => 'otaona',
            'email' => 'parent@mail.uz',
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'status' => 10,
            'created_at' => time(),
            'updated_at' => 0
        ]);

        $this->insert('user', [
            'role_id' => 6,
            'username' => 'vazirlik',
            'email' => 'ministry@mail.uz',
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'status' => 10,
            'created_at' => time(),
            'updated_at' => 0
        ]);

        $this->insert('user', [
            'role_id' => 7,
            'username' => 'viloyat',
            'email' => 'region@mail.uz',
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'status' => 10,
            'created_at' => time(),
            'updated_at' => 0
        ]);

        $this->insert('user', [
            'role_id' => 8,
            'username' => 'tuman',
            'email' => 'district@mail.uz',
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'status' => 10,
            'created_at' => time(),
            'updated_at' => 0
        ]);

        $this->insert('user', [
            'role_id' => 9,
            'username' => 'media',
            'email' => 'media@mail.uz',
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'status' => 10,
            'created_at' => time(),
            'updated_at' => 0
        ]);

        $this->insert('user', [
            'role_id' => 10,
            'username' => 'reklama',
            'email' => 'reklama@mail.uz',
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'status' => 10,
            'created_at' => time(),
            'updated_at' => 0
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', ['username' => 'admin']);
        $this->delete('user', ['username' => 'tasischi']);
        $this->delete('user', ['username' => 'teacher']);
        $this->delete('user', ['username' => 'direktor']);
        $this->delete('user', ['username' => 'otaona']);
        $this->delete('user', ['username' => 'vazirlik']);
        $this->delete('user', ['username' => 'viloyat']);
        $this->delete('user', ['username' => 'tuman']);
    }
}
