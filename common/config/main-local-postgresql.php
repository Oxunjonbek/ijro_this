<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
//            'dsn' => 'mysql:host=localhost;dbname=yii2template',
           // 'dsn' => 'mysql:host=localhost;port=5432;dbname=maktab',
           //  'username' => 'root',
           //  'password' => '123',
           //  'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
