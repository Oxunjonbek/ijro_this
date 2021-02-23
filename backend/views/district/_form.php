<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\models\Region;

/* @var $this yii\web\View */
/* @var $model common\models\District */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="district-form">


        <?php $form = ActiveForm::begin(['id' => 'save-district', 'action' => yii\helpers\Url::to(['district/save', 'id' => $model->id]), 'method' => 'post']); ?>

        <?= $form->field($model, 'region_id')->widget(\kartik\select2\Select2::classname(),[
                    /*'value' => 1,*/
                    'data' => \yii\helpers\ArrayHelper::map(Region::find()->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Выберите', 'multiple' => false],
                    'theme' => \kartik\select2\Select2::THEME_KRAJEE,
                    'size' => 'xs',
                ]); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class'=>'form-control input-transparent']) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['id' => 'save-district-form', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>


</div>
