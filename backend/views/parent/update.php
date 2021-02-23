<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Parents */

$this->title = 'Parents: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['school/index']];
$this->params['breadcrumbs'][] = ['label' => 'Sinf', 'url' => ['grade/index']];
$this->params['breadcrumbs'][] = ['label' => 'O`quvchi', 'url' => ['pupil/index']];
$this->params['breadcrumbs'][] = ['label' => 'Ota-Onalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="parents-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
