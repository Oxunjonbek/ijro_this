<?php

use common\widgets\robust\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;

?>

<!-- BEGIN: Main Menu-->

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">

        <?php
        echo Nav::widget([
            'options' => [
                'class' => 'navigation navigation-main',
                'id' => 'main-menu-navigation',
                'data' => ['menu' => 'menu-navigation']
            ],
            'items' => [
                ['label' => 'Тадбирлар', 'url' => url(['/tadbir/index']), 'icon' => 'icon-home'],
                ['label' => 'Масуъл ташкилот', 'url' => url(['/company/index']), 'icon' => 'icon-user'],
                // [
                //     'label' => 'Maktab, o\'qituvchilar',
                //     'icon' => 'icon-graduation',
                //     'items' => [
                //         ['label' => 'Maktablar', 'url' => url(['/school'])],
                //         ['label' => 'O\'qituvchilar', 'url' => url(['/teacher'])],
                //         ['label' => 'Sinflar', 'url' => url(['/grade'])],
                //         ['label' => 'O\'quvchilar', 'url' => url(['/pupil'])],
                //         ['label' => 'Ota onalar', 'url' => url(['/parent'])],
                //         ['label' => 'Smenalar vaqtlari', 'url' => url(['/shift'])],
                //     ],
                // ],
                // ['label' => 'E\'lonlar', 'url' => url(['/blog']), 'icon' => 'icon-speech'],
                // ['label' => 'Forum', 'url' => (['/forum']), 'icon' => 'icon-bubbles'],
                // ['label' => 'Sinf kamera', 'url' => '#', 'icon' => 'icon-camera'],
                // ['label' => 'Sozlanmalar', 'url' => '#', 'icon' => 'icon-equalizer'],
            ],
        ]);
        ?>
    </div>
</div>
<!-- END: Main Menu-->
