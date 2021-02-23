<?php

namespace common\assets\robust;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/robust/app-assets/css/app.css',
        'themes/robust/app-assets/css/core/menu/menu-types/vertical-compact-menu.min.css',
        'themes/robust/app-assets/css/core/colors/palette-gradient.min.css',

        // Custom Css
        'themes/robust/assets/css/style.css',
    ];

    public $js = [

        'themes/robust/app-assets/js/core/app-menu.min.js',
        'themes/robust/app-assets/js/core/app.min.js',
        'themes/robust/app-assets/js/scripts/customizer.min.js',

        // Custom Js
        'themes/robust/assets/js/scripts.js'
    ];

    public $depends = [
        'common\assets\robust\VendorsAsset',
        'rmrevin\yii\fontawesome\CdnFreeAssetBundle',
    ];
}
