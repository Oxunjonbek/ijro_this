<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\District */

$this->title = 'Добавить district';
$this->params['breadcrumbs'][] = ['label' => 'Districtи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="district-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
