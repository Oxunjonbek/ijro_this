<?php

use common\models\Town;
use common\models\Gender;
use common\models\School;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use common\models\Region;
use common\models\District;
use yii\bootstrap4\Modal;
use kartik\date\DatePicker;

// $this->title = 'Добавить O`qituvchilar';
$action = Yii::$app->controller->action->id;
?>

<div class="teacher-form">
    <?php
    $town = ArrayHelper::map(School::find()->all(),'id','name');
    if (isset($school_id)){
        $model->school_id = $school_id;
        $action = yii\helpers\Url::to(['teacher/school-from', 'school_id' => $school_id]);
        $this->title = 'O`qituvchilar' . $model->full_name;
        $this->params['breadcrumbs'][] = ['label' => 'Maktablar', 'url' => ['school/index']];
        $this->params['breadcrumbs'][] = ['label' => 'O`qituvchilar', 'url' => ['index']];
        $this->params['breadcrumbs'][] = 'Добавить';

    } 
    else {
        $action = yii\helpers\Url::to(['teacher/save', 'id' => $model->id,]);
    }
    ?>  
    <?php $form = ActiveForm::begin([
        'id' => 'save-teacher',
        'action' => $action, 'method' => 'post'
    ]);
    ?>

    <div class="row">

        <?= $form->field($model, 'school_id',['options'=>['class'=>'col-md-6']])->dropDownList($town);    ?>
        <?= $form->field($model, 'full_name',['options'=>['class'=>'col-md-6']])->textInput(['maxlength' => true, 'class' => 'form-control input-transparent']) ?>
    </div>
    <hr>
    <div class="row">

        <?= 
        // $form->field($model, 'position')->input('number', ['min' => 0, 'max' => 10000, 'step' => 1]) 
        // $form->field($model, 'birth_date',['options'=>['class'=>'col-md-6']])->widget(\kartik\date\DatePicker::classname(),[
        //     'options' => ['placeholder' => 'Tug`ilgan kunni kiriting'],
        //     'pluginOptions' => [
        //         'autoclose' => true,
        //         'format' => 'yyyy-mm-dd',
        //     ]
        // ]); 
        $form->field($model, 'birth_date',['options'=>['class'=>'col-md-6']])->textInput(['maxlength' => true, 'class'=>'form-control input-transparent']) ;

        ?>
        <?= $form->field($model, 'gender_id',['options'=>['class'=>'col-md-6']])->dropDownList(ArrayHelper::map(Gender::find()->all(),'id','name'));    ?>
    </div>
    <!-- <label>Saqlash</label> -->
    <hr>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['id' => 'save-school-form', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>