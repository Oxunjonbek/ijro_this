<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    "themes/robust/app-assets/css/vendors.css",

    "themes/robust/app-assets/vendors/css/forms/icheck/icheck.css",

    "themes/robust/app-assets/vendors/css/forms/icheck/custom.css",

    "themes/robust/app-assets/vendors/css/charts/morris.css",

    "themes/robust/app-assets/vendors/css/extensions/unslider.css",

    "themes/robust/app-assets/vendors/css/weather-icons/climacons.min.css",

    "themes/robust/app-assets/css/app.css",

    "themes/robust/app-assets/css/core/menu/menu-types/vertical-compact-menu.css",

    "themes/robust/app-assets/css/core/colors/palette-gradient.css",

    "themes/robust/app-assets/css/core/colors/palette-climacon.css",

    "themes/robust/app-assets/css/pages/users.css",

    "themes/robust/assets/css/style.css"

        // "themes/robust/app-assets/vendors/css/file-uploaders/dropzone.min.css',
        // 'themes/robust/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css',
        // 'themes/robust/app-assets/vendors/css/charts/morris.css',
        // 'themes/robust/app-assets/vendors/css/extensions/unslider.css',
        // 'themes/robust/app-assets/vendors/css/weather-icons/climacons.min.css',


        // 'themes/robust/app-assets/css/pages/timeline.min.css',
        // 'themes/robust/app-assets/css/plugins/file-uploaders/dropzone.min.css',
        // 'themes/robust/app-assets/css/core/colors/palette-climacon.css',

        // 'css/style.css',
    ];
    public $js = [
    "themes/robust/app-assets/vendors/js/vendors.min.js",

    "themes/robust/app-assets/vendors/js/charts/gmaps.min.js",

    "themes/robust/app-assets/vendors/js/forms/icheck/icheck.min.js",

    "themes/robust/app-assets/vendors/js/extensions/jquery.knob.min.js",

    "themes/robust/app-assets/vendors/js/charts/raphael-min.js",

    "themes/robust/app-assets/vendors/js/charts/morris.min.js",

    "themes/robust/app-assets/vendors/js/extensions/unslider-min.js",

    "themes/robust/app-assets/vendors/js/charts/echarts/echarts.js",

    "themes/robust/app-assets/js/core/app-menu.js",

    "themes/robust/app-assets/js/core/app.js",

    "themes/robust/app-assets/js/scripts/pages/dashboard-fitness.js",

        // "themes/robust/app-assets/vendors/js/extensions/jquery.knob.min.js',
        // 'themes/robust/app-assets/js/scripts/extensions/knob.min.js',
        // 'themes/robust/app-assets/vendors/js/charts/raphael-min.js',
        // 'themes/robust/app-assets/vendors/js/charts/morris.min.js',
        // 'themes/robust/app-assets/vendors/js/charts/chart.min.js',
        // 'themes/robust/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js',
        // 'themes/robust/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js',
        // 'themes/robust/app-assets/data/jvector/visitor-data.js',
        // 'themes/robust/app-assets/vendors/js/charts/echarts/echarts.js',
        // 'themes/robust/app-assets/vendors/js/timeline/horizontal-timeline.js',
        // 'themes/robust/app-assets/vendors/js/extensions/unslider-min.js',
        // 'themes/robust/app-assets/vendors/js/extensions/dropzone.min.js',


        // 'themes/robust/app-assets/js/scripts/pages/dashboard-crm.js',
    ];
    public $depends = [
        'common\assets\robust\AppAsset',
    ];
}
