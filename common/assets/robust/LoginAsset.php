<?php

namespace common\assets\robust;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/robust/app-assets/vendors/css/forms/icheck/icheck.css',
        'themes/robust/app-assets/vendors/css/forms/icheck/custom.css',

        'themes/robust/app-assets/css/app.css',

        'themes/robust/app-assets/css/core/colors/palette-gradient.min.css',
        'themes/robust/app-assets/css/pages/login-register.min.css',

        // Custom Css
        'themes/robust/assets/css/style.css',
    ];

    public $js = [
        'themes/robust/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js',
        'themes/robust/app-assets/vendors/js/forms/icheck/icheck.min.js',

        'themes/robust/app-assets/js/core/app-menu.min.js',
        'themes/robust/app-assets/js/core/app.min.js',

        'themes/robust/app-assets/js/scripts/forms/form-login-register.min.js',

        // Custom Js
        'themes/robust/assets/js/scripts.js'
    ];

    public $depends = [
        'common\assets\robust\VendorsAsset',
    ];
}
