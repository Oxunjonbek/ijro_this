<?php

use common\widgets\robust\Nav;

?>

<!-- BEGIN: Main Menu-->

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">

        <?php
        $items = [];

        if (!user()->isGuest) {
            switch (user()->identity->role->name) {
                case 'admin':
                    $items = [
                        ['label' => 'BOSH SAHIFA', 'url' => url(['site/tadbir']), 'icon' => 'icon-home'],
                        [
                            'label' => 'Boshqarma',
                            'items' => [
                                ['label' => 'Boshqarma', 'url' => url(['site/generalniy']), 'icon' => 'icon-home'],
                                // ['label' => 'Kirish chiqish vaqtlari', 'url' => url(['']), 'icon' => 'icon-home'],
                            ],
                        ],
                        [
                            'label' => 'Bo`lim',
                            'items' => [
                                ['label' => 'Bo`lim', 'url' => url(['site/bolum']), 'icon' => 'icon-home'],
                                // ['label' => 'Kirish chiqish vaqtlari', 'url' => url(['']), 'icon' => 'icon-home'],
                            ],
                        ],
                         [
                            'label' => 'Tizim tashkilotlari',
                            'items' => [
                                ['label' => 'Tizim tashkilotlari', 'url' => url(['site/tizim']), 'icon' => 'icon-home'],
                                // ['label' => 'Kirish chiqish vaqtlari', 'url' => url(['']), 'icon' => 'icon-home'],
                            ],
                        ],
                        // ['label' => 'tadbir', 'url' => url(['site/tadbir']), 'icon' => 'icon-note'],
                        // ['label' => 'E\'lonlar nazorati', 'url' => url(['#']), 'icon' => 'icon-home'],
                        // ['label' => 'Forum chat', 'url' => url(['#']), 'icon' => 'icon-home'],
                        // ['label' => 'Sinf kamera', 'url' => url(['#']), 'icon' => 'icon-home'],  
                    ];
                    break;

                case 'tasischi':
                    $items = [
                        ['label' => 'Moliya hisobotlari', 'url' => url(['/site/moliya']), 'icon' => 'icon-home']
                    ];
                    break;

                case 'o\'qituvchi':
                    $items = [
                        ['label' => 'Profil', 'url' => url(['#']), 'icon' => 'icon-home'],
                        ['label' => 'Ota ona ma\'lumotlar', 'url' => url(['#']), 'icon' => 'icon-home'],
                        ['label' => 'Kirish chiqish vaqtlari', 'url' => url(['#']), 'icon' => 'icon-home'],
                        ['label' => 'Statistika', 'url' => url(['#']), 'icon' => 'icon-home'],
                        ['label' => 'E\'lonlar', 'url' => url(['#']), 'icon' => 'icon-home'],
                        ['label' => 'Davomat', 'url' => url(['#']), 'icon' => 'icon-home'],
                    ];
                    break;

                case 'director':
                    $items = [
                        ['label' => 'Statistika', 'url' => url(['#']), 'icon' => 'icon-home'],
                        ['label' => 'E\'lonlar', 'url' => url(['#']), 'icon' => 'icon-home'],
                        ['label' => 'Davomad', 'url' => url(['#']), 'icon' => 'icon-home'],
                    ];
                    break;

                case 'ota-ona':
                    $items = [
                        ['label' => 'Profil', 'url' => url(['#']), 'icon' => 'icon-home'],
                        ['label' => 'Forum chat', 'url' => url(['#']), 'icon' => 'icon-home'],
                        ['label' => 'E\'lonlar', 'url' => url(['#']), 'icon' => 'icon-home'],
                        ['label' => 'Online to\'lov', 'url' => url(['#']), 'icon' => 'icon-home'],
                        ['label' => 'Davomad', 'url' => url(['#']), 'icon' => 'icon-home'],
                        ['label' => 'Sinf kamera', 'url' => url(['#']), 'icon' => 'icon-home'],
                    ];
                    break;

                case 'vazirlik':
                    $items = [
                        ['label' => 'add', 'url' => url(['#']), 'icon' => 'icon-home']
                    ];
                    break;

                case 'viloyat':
                    $items = [
                        ['label' => 'add', 'url' => url(['#']), 'icon' => 'icon-home']
                    ];
                    break;

                case 'tuman':
                    $items = [
                        ['label' => 'add', 'url' => url(['#']), 'icon' => 'icon-home']
                    ];
                    break;

                case 'media':
                    $items = [
                        ['label' => 'add', 'url' => url(['#']), 'icon' => 'icon-home']
                    ];
                    break;

                case 'reklama':
                    $items = [
                        ['label' => 'add', 'url' => url(['#']), 'icon' => 'icon-home']
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
