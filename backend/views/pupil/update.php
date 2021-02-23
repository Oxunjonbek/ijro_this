<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pupil */

$this->title = 'O`quvchi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['school/index']];
$this->params['breadcrumbs'][] = ['label' => 'Sinf', 'url' => ['grade/index']];
$this->params['breadcrumbs'][] = ['label' => 'O`quvchi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="pupil-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>