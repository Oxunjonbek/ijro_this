<?php

use common\assets\robust\LoginAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loaded">
<!-- BEGIN: Head-->
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Muhammad Samadov">
    <?= Html::csrfMetaTags() ?>

    <link rel="apple-touch-icon" href="<?= bu('themes/robust/app-assets/images/ico/favicon.ico') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= bu('themes/robust/app-assets/images/ico/favicon.ico') ?>">

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>


<body class="vertical-layout vertical-compact-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page"
    data-open="click" data-menu="vertical-compact-menu" data-col="1-column">

<?php $this->beginBody() ?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <?= $content ?>
        </div>
    </div>

</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

