<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\School */


$this->title = 'Добавить school';
$this->params['breadcrumbs'][] = ['label' => 'Schoolи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
