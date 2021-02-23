<?php

use common\models\Parents;
use common\models\Role;
use common\models\Teacher;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['id' => 'save-user', 'action' => yii\helpers\Url::to(['user/save', 'id' => $model->id]), 'method' => 'post']); ?>

    <?= $form->field($model, 'role_id')->widget(Select2::classname(), [
        /*'value' => 1,*/
        'data' => ArrayHelper::map(Role::find()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Выберите', 'multiple' => false],
        'theme' => Select2::THEME_KRAJEE,
        'size' => 'xs',
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class' => 'form-control input-transparent']) ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'class' => 'form-control input-transparent']) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'class' => 'form-control input-transparent']) ?>

    <?= $form->field($model, 'teacher_id')->widget(Select2::classname(), [
        /*'value' => 1,*/
        'data' => ArrayHelper::map(Teacher::find()->all(), 'id', 'full_name'),
        'options' => ['placeholder' => 'Выберите', 'multiple' => false],
        'theme' => Select2::THEME_KRAJEE,
        'size' => 'xs',
    ]); ?>

    <?= $form->field($model, 'parent_id')->widget(Select2::classname(), [
        /*'value' => 1,*/
        'data' => ArrayHelper::map(Parents::find()->all(), 'id', 'full_name'),
        'options' => ['placeholder' => 'Выберите', 'multiple' => false],
        'theme' => Select2::THEME_KRAJEE,
        'size' => 'xs',
    ]); ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true, 'class' => 'form-control input-transparent']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'form-control input-transparent']) ?>

    <?= $form->field($model, 'status')->textInput(['class' => 'form-control input-transparent']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['id' => 'save-user-form', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
