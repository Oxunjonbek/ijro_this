<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Town */

$this->title = 'Town: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Townи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="town-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
