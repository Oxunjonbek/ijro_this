<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tadbir */

$this->title = 'Create Tadbir';
$this->params['breadcrumbs'][] = ['label' => 'Tadbirs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tadbir-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
