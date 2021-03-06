<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\GradeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grade-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'school_id') ?>

    <?= $form->field($model, 'shift_id') ?>

    <?= $form->field($model, 'teacher_id') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'began_year') ?>

    <?php // echo $form->field($model, 'end_year') ?>

    <?php // echo $form->field($model, 'camera_url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
