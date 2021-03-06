<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Company */

$this->title = 'Бошқармалар,Бўлимлар,Тизим ташкилотлари қушиш';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
