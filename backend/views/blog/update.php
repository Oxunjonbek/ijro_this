<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Blog */

$this->title = 'Blog: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blogи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="blog-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
