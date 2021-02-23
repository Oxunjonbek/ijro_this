<?php
return [
    
    'language' => 'uz-UZ',
    'layout' => 'robust/main',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'controllerMap' => [
    // 'migration' => [
    //     'class' => 'bizley\migration\controllers\MigrationController',
    // ],
],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'dd.MM.Y',
            'datetimeFormat' => 'php:d.m.Y H:i:s',
            'timeFormat' => 'H:i:s',
            'decimalSeparator' => '.',
            'thousandSeparator' => ' ',
//            'locale' => 'ru_RU',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap4\BootstrapAsset' => [
                    'css' => [],
                ],
                'yii\bootstrap4\BootstrapPluginAsset' => [
                    'js' => [],
                    'css' => [],
                    'depends' => [
                        'common\assets\robust\VendorsAsset',
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [],
                    'depends' => [
                        'common\assets\robust\VendorsAsset',
                    ]
                ],
                'yii\web\JqueryAsset' => [
                    'js' => YII_ENV_DEV ? ['jquery.js'] : ['jquery.min.js'],
                ],
                'kartik\form\ActiveFormAsset' => [
                    'depends' => [
                        'common\assets\robust\VendorsAsset',
                    ],
                ],
                'kartik\bs4dropdown\DropdownAsset' => [
                    'js' => [],
                    'css' => [],
                ],
            ]
        ],
    ],
//     'params' => [
//     // format settings for displaying each date attribute (ICU format example)
//     'dateControlDisplay' => [
//         Module::FORMAT_DATE => 'dd-MM-yyyy',
//         Module::FORMAT_TIME => 'hh:mm:ss a',
//         Module::FORMAT_DATETIME => 'dd-MM-yyyy hh:mm:ss a', 
//     ],
    
//     // format settings for saving each date attribute (PHP format example)
//     'dateControlSave' => [
//         Module::FORMAT_DATE => 'php:U', // saves as unix timestamp
//         Module::FORMAT_TIME => 'php:H:i:s',
//         Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
//     ]
// ]
];
