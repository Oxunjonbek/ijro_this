<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Town */

$this->title = 'Добавить town';
$this->params['breadcrumbs'][] = ['label' => 'Townи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="town-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
