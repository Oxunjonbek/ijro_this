<?php

use common\widgets\robust\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;

?>

<!-- BEGIN: Main Menu-->

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">

        <?php
        if (!user()->isGuest) {
            switch (user()->identity->role->name) {
                case 'admin':
                    $items = [
                        ['label' => 'Тадбирлар', 'url' => url(['/tadbir/index']), 'icon' => 'icon-home'],
                ['label' => 'Масуъл ташкилот', 'url' => url(['/company/index']), 'icon' => 'icon-user'],
                        
                    ];
                    break;

                case 'user':
                    $items = [
                        ['label' => 'Тадбир', 'url' => url(['/tadbir/index']), 'icon' => 'icon-home']
                    ];
                    break;
            }
        }
        echo Nav::widget([
            'options' => [
                'class' => 'navigation navigation-main',
                'id' => 'main-menu-navigation',
                'data' => ['menu' => 'menu-navigation']
            ],
            'items' => $items,
        ]);
        ?>
    </div>
</div>
<!-- END: Main Menu-->
