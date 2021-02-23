<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Grade */

$this->title = 'Grade: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['school/index']];
// $this->params['breadcrumbs'][] = ['label' => 'O`qtuvchi', 'url' => ['teacher/index']];
$this->params['breadcrumbs'][] = ['label' => 'Sinf', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="grade-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
