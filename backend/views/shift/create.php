<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Shift */

$this->title = 'Добавить shift';
$this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['school/index']];
$this->params['breadcrumbs'][] = ['label' => 'Smena', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shift-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
