<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\School */

$this->title = 'School: ' . $model->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->full_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="school-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
