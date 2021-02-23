<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Shift */

$this->title = 'Shift: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['school/index']];
$this->params['breadcrumbs'][] = ['label' => 'Smena', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="shift-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
