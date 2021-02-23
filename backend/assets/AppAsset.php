<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
    ];
    public $js = [
        // 'jquery-ui-timepicker-uz.js',
        // 'jquery-ui-timepicker-uz.js',
        // 'datepicker-uz.js',
        // 'jquery-ui-timepicker-uz.js',
        // 'datepicker-uz.js'
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js'
    ];
    public $depends = [
        'common\assets\robust\AppAsset',
    ];
}
