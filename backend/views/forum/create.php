<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Forum */

$this->title = 'Добавить forum';
$this->params['breadcrumbs'][] = ['label' => 'Forum', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forum-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>