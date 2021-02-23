<?php

namespace common\assets\robust;

use yii\web\AssetBundle;

class VendorsAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/robust/app-assets';
    public $baseUrl = '@web/themes/robust/app-assets/';
    public $css = [
        'css/vendors.css',
    ];

    public $js = [
        'vendors/js/vendors.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
