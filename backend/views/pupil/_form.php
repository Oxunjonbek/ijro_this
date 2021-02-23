<?php

use common\models\Grade;
use common\models\Gender;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\TimePicker;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use common\models\Region;
use common\models\District;
use common\models\Town;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Pupil */
/* @var $form yii\widgets\ActiveForm */

$action = Yii::$app->controller->action->id;
if ($action == 'pupil-from') {
    $this->title = 'O`quvchilar' . $model->full_name;
    $this->params['breadcrumbs'][] = ['label' => 'Maktablar', 'url' => ['school/index']];
    $this->params['breadcrumbs'][] = ['label' => 'O`qituvchilar', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => 'Sinf', 'url' => ['grade/index']];
    $this->params['breadcrumbs'][] = ['label' => 'O`quvchilar', 'url' => ['index']];
    $this->params['breadcrumbs'][] = 'Добавить';
}
?>

<div class="pupil-form">
    <?php
    $grade = ArrayHelper::map(Grade::find()->all(), 'id', 'name');
    $gender = ArrayHelper::map(Gender::find()->all(), 'id', 'name');
    if (isset($grade_id)) {
        $model->grade_id = $grade_id;
        // var_dump($school_id);exit();
        $action = yii\helpers\Url::to(['pupil/pupil-from', 'grade_id' => $grade_id]);
        // $this->params['breadcrumbs'][] = ['label' => 'Maktablar', 'url' => ['school/index']];
        //     $this->params['breadcrumbs'][] = ['label' => 'O`qituvchilar', 'url' => ['index']];
        //     $this->params['breadcrumbs'][] = ['label' => 'Sinf', 'url' => ['grade/index']];
        //     $this->params['breadcrumbs'][] = ['label' => 'O`quvchilar', 'url' => ['index']];
        //     $this->params['breadcrumbs'][] = 'Добавить';
    } else {
        $action = yii\helpers\Url::to(['pupil/save', 'id' => $model->id]);
    } ?>

    <?php $form = ActiveForm::begin(['id' => 'save-pupil2', 'action' => yii\helpers\Url::to(['pupil/save', 'id' => $model->id]), 'method' => 'post', 'options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <?= $form->field($model, 'full_name', ['options' => ['class' => 'col-md-12']])->textInput(['maxlength' => true, 'class' => 'form-control input-transparent']) ?>
    </div>
    <hr>
    <div class="row">

        <?= $form->field($model, 'grade_id', ['options' => ['class' => 'col-md-4']])->dropDownList($grade); ?>


        <?= $form->field($model, 'telephone', ['options' => ['class' => 'col-md-4']])->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '+ (***) (**) *** ** **'
        ]); ?>
        <?= $form->field($model, 'gender_id', ['options' => ['class' => 'col-md-4']])->dropDownList(ArrayHelper::map(Gender::find()->all(), 'id', 'name')); ?>

        <?= $form->field($model, 'image', ['options' => ['class' => 'col-md-4']])->fileInput() ?>
    </div>
    <hr>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['id' => 'save-pupil-form2', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
