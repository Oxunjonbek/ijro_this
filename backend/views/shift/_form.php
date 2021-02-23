<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use common\models\Region;
use common\models\District;
use common\models\Town;
use common\models\School;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Shift */
/* @var $form yii\widgets\ActiveForm */
$action = Yii::$app->controller->action->id;
$town = ArrayHelper::map(School::find()->all(),'id','name'); 
// if (Yii::$app->request->post()) {
//     $id =  Yii::$app->request->post()['School']['id'];
//     $id = School::find()->where(['id'=>$id])->one();
//     $town = [$id->id=>$id->name];
// } 
if (isset($school_id)){
    $model->school_id = $school_id;
    $action = yii\helpers\Url::to(['teacher/school-from', 'school_id' => $school_id]);
        $this->params['breadcrumbs'][] = ['label' => 'Maktablar', 'url' => ['school/index']];
    $this->params['breadcrumbs'][] = ['label' => 'O`qituvchilar', 'url' => ['teacher/index']];
    $this->params['breadcrumbs'][] = ['label' => 'Smena', 'url' => ['index']];
    $this->params['breadcrumbs'][] = 'Добавить';
} else {
    $action = yii\helpers\Url::to(['teacher/save', 'id' => $model->id]);
}
?> 

<div class="shift-form">

    <?php $form = ActiveForm::begin(['id' => 'save-shift', 'action' => yii\helpers\Url::to(['shift/save', 'id' => $model->id]), 'method' => 'post']); ?>
    <div class="row">
        <?= $form->field($model, 'name',['options'=>['class'=>'col-md-12']])->textInput(['maxlength' => true, 'class'=>'form-control input-transparent']) ?>
    </div>
    <hr>
    <div class="row">

        <?= $form->field($model, 'school_id',['options'=>['class'=>'col-md-4']])->dropDownList($town);    ?>


        <?= $form->field($model, 'time_from',['options'=>['class'=>'col-md-4']])->widget(TimePicker::classname(), [
            'pluginOptions' => [
                            'showSeconds' => false,
                            'defaultTime'=> '08:00',
                            'showMeridian' => false,
                            'minuteStep' => 1,
                            'secondStep' => 1,
                        ]
        ]); ?>
        <?= $form->field($model, 'time_to',['options'=>['class'=>'col-md-4']])->widget(TimePicker::classname(), [
        'pluginOptions' => [
                            'showSeconds' => false,
                            'defaultTime'=> '08:00',
                            'showMeridian' => false,
                            'minuteStep' => 1,
                            'secondStep' => 1,
                        ]
        ]); ?>
    </div>
    <hr>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['id' => 'save-shift-form', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
