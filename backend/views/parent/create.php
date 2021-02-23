<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Parents */

$this->title = 'Добавить parents';
$this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['school/index']];
$this->params['breadcrumbs'][] = ['label' => 'Sinf', 'url' => ['grade/index']];
$this->params['breadcrumbs'][] = ['label' => 'O`quvchi', 'url' => ['pupil/index']];
$this->params['breadcrumbs'][] = ['label' => 'Ota-Onalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parents-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
