<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pupil */

$this->title = 'Добавить O`quvchi';
$this->params['breadcrumbs'][] = ['label' => 'Maktab', 'url' => ['school/index']];
$this->params['breadcrumbs'][] = ['label' => 'Sinf', 'url' => ['grade/index']];
$this->params['breadcrumbs'][] = ['label' => 'O`quvchi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pupil-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
