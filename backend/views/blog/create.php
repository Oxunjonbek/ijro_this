<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Blog */

$this->title = 'Добавить blog';
$this->params['breadcrumbs'][] = ['label' => 'Blogи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
