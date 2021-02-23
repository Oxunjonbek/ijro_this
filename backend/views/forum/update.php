<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Forum */

$this->title = 'Forum: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Forumи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="forum-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
