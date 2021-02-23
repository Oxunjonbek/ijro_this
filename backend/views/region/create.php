<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Region */

$this->title = 'Добавить region';
$this->params['breadcrumbs'][] = ['label' => 'Regionи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
