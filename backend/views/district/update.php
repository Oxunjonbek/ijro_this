<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\District */

$this->title = 'District: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Districtи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="district-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
