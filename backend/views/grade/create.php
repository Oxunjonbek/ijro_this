<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Grade */

$this->title = 'Добавить grade';
$this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['school/index']];
$this->params['breadcrumbs'][] = ['label' => 'O`qtuvchi', 'url' => ['teacher/index']];
$this->params['breadcrumbs'][] = ['label' => 'Sinf', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grade-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
