<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use common\models\Region;
use common\models\District;
use common\models\Town;
use kartik\select2\Select2;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use common\models\Pupil;
use common\models\Gender;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Parents */
/* @var $form yii\widgets\ActiveForm */
$action = Yii::$app->controller->action->id;
if ($action=='parent-from') {
    $this->title = 'Ota-Onalar' . $model->full_name;
        $this->params['breadcrumbs'][] = ['label' => 'Maktablar', 'url' => ['school/index']];
        $this->params['breadcrumbs'][] = ['label' => 'O`qituvchilar', 'url' => ['index']];
        $this->params['breadcrumbs'][] = ['label' => 'Sinf', 'url' => ['grade/index']];
        $this->params['breadcrumbs'][] = ['label' => 'O`quvchilar', 'url' => ['pupil/index']];
        $this->params['breadcrumbs'][] = ['label' => 'Ota-Onalar', 'url' => ['index']];
        $this->params['breadcrumbs'][] = 'Добавить';
}
?>

<div class="parents-form">
    <?php
    $gender = ArrayHelper::map(Gender::find()->all(),'id','name');
    $pupil_id = ArrayHelper::map(Pupil::find()->all(),'id','full_name');

if (isset($pupil_id)){
    $model->pupil_id = $pupil_id;
    // var_dump($school_id);exit();
    $action = yii\helpers\Url::to(['parent/parent-from', 'pupil_id' => $pupil_id]);
    // $this->title = 'School: ' . $model->full_name;
    //     $this->params['breadcrumbs'][] = ['label' => 'Maktablar', 'url' => ['school/index']];
    //     $this->params['breadcrumbs'][] = ['label' => 'O`qituvchilar', 'url' => ['index']];
    //     $this->params['breadcrumbs'][] = ['label' => 'Sinf', 'url' => ['grade/index']];
    //     $this->params['breadcrumbs'][] = ['label' => 'O`quvchilar', 'url' => ['pupil/index']];
    //     $this->params['breadcrumbs'][] = ['label' => 'Ota-Onalar', 'url' => ['index']];
    //     $this->params['breadcrumbs'][] = 'Добавить';
} else {
    $action = yii\helpers\Url::to(['parent/save', 'id' => $model->id]);
}?>

    <?php $form = ActiveForm::begin(['id' => 'save-parent', 'action' => yii\helpers\Url::to(['parent/save', 'id' => $model->id]), 'method' => 'post']); ?>

<div class="row">



    <?= $form->field($model, 'full_name',['options'=>['class'=>'col-md-12']])->textInput(['maxlength' => true, 'class' => 'form-control input-transparent']) ?>
</div>
        <hr>
<div class="row">

        <?= $form->field($model, 'pupil_id',['options'=>['class'=>'col-md-4']])->dropDownList($pupil_id);    ?>
    <!-- </div>
    <div class="row"> -->

        <?= $form->field($model, 'birth_date',['options'=>['class'=>'col-md-4']])->widget(\kartik\date\DatePicker::classname(),[
            'options' => ['placeholder' => 'Tug`ilgan kunni kiriting'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy',
            ]
        ]); ?>
        <?= $form->field($model, 'gender_id',['options'=>['class'=>'col-md-4']])->dropDownList(ArrayHelper::map(Gender::find()->all(),'id','name'));    ?>
    </div>
<hr>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['id' => 'save-parent-form', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
