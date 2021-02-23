<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TadbirSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tadbir-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tadbir_name') ?>

    <?= $form->field($model, 'tadbir_content') ?>

    <?= $form->field($model, 'tadbir_result') ?>

    <?= $form->field($model, 'tadbir_date') ?>

    <?php // echo $form->field($model, 'tadbir_description') ?>

    <?php // echo $form->field($model, 'tadbir_status') ?>

    <?php // echo $form->field($model, 'company_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
