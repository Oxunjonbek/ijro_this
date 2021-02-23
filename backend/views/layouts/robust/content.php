<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\widgets\Breadcrumbs; ?>
<!-- CONTENT -->

<div class="app-content content">
    <div class="content-wrapper">

<div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h2 class="content-header-title pl-2"><?=(empty($this->params['breadcrumbs'])) ? '' : end($this->params['breadcrumbs'])?></h2>
            </div>
            <div class="col-12">

                        <div class="breadcrumb-wrapper col-12">
                    <?php
                    echo Breadcrumbs::widget([
                        'options' => ['class' => 'breadcrumb'],
                        'homeLink' => [
                            'label' => '<i class="icon-home"></i>',
                            'url' => Yii::$app->homeUrl,
                            'encode' => false,
                        ],
                        'itemTemplate' => "<li class='breadcrumb-active'><a>{link}<i class='fas fa-angle-right mx-1'
         aria-hidden='true'></i></a></li>\n", // template for all links
                        'activeItemTemplate' => "<li class='breadcrumb-item active'><a>{link}</a></li>\n",
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]);
                    ?>
                </div>
            </div>
        </div>

        <div class="content-body">
            <?= $content ?>
        </div>

    </div>

</div>
<!--/ CONTENT -->
