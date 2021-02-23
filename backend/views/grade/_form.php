<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\School;
use common\models\Shift;
use common\models\Teacher;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Grade */
/* @var $form yii\widgets\ActiveForm */
$action = Yii::$app->controller->action->id;
// var_dump($action);exit();

?>
<?php

if (isset($teacher_id)){
    // echo "<pre>";
    $teacher = ArrayHelper::map(Teacher::find()->where(['id'=>$teacher_id])->all(),'id','full_name');
    $school = ArrayHelper::map(School::find()->where(['id'=>$school_id])->all(),'id','name');
    $shift_id = [NULL => NULL] +ArrayHelper::map(Shift::find()->where(['school_id'=>$school_id])->all(),'id','name');
    // $shift_id = [NULL => NULL] +ArrayHelper::map(Shift::find()->all(),'id','name');
    // var_dump($school_id);exit();
    $action = yii\helpers\Url::to(['grade/grade-from', 'teacher_id' => $teacher_id,'school_id'=>$school_id]);
    $this->params['breadcrumbs'][] = ['label' => 'Maktablar', 'url' => ['school/index']];
    $this->params['breadcrumbs'][] = ['label' => 'O`qituvchilar', 'url' => ['teacher/index']];
    $this->params['breadcrumbs'][] = ['label' => 'Sinf', 'url' => ['index']];
    $this->params['breadcrumbs'][] = 'Добавить';
} else {
     // var_dump($school_id);exit();
    $teacher = null;
    // $school = null;
    $school = [NULL => NULL] +ArrayHelper::map(School::find()->asArray()->all(),'id','name');

    $shift_id = [NULL => NULL] +ArrayHelper::map(Shift::find()->all(),'id','name');
    $action = yii\helpers\Url::to(['grade/save', 'id' => $model->id]);
}
?>
<div class="grade-form">

    <?php $form = ActiveForm::begin(['id' => 'save-grade', 'action' => $action, 'method' => 'post']); ?>
    <div class="row">

        <?=$form->field($model, 'school_id',['options'=>['class'=>'col-md-12']])
        ->widget(Select2::classname(), [
            'data' => $school,
            'options' => [
                'placeholder' => Yii::t('app','Tanlang'),
                'multiple' => false,
                'id'=>'school_id'
            ],
        ]);?>

        <?=  $form->field($model, 'teacher_id',['options'=>['class'=>'col-md-12']])->widget(DepDrop::classname(), [
            'data'=>$teacher,
            'type' => DepDrop::TYPE_SELECT2,
            'options' => ['placeholder' => Yii::t('app','Tanlang'), 'multiple' => false,'id'=>'teacher_id'],
            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
            'pluginOptions'=>[
                'depends'=>['school_id'],
                'placeholder' => ' ',
                'initialize' => false,
                'url'=>Url::to(['/grade/select'])
            ]
        ]); ?>
        
        <?= 
            // $form->field($model, 'shift_id',['options'=>['class'=>'col-md-12']])
            //             ->widget(Select2::classname(), [
            //             'data' => $shift_id,
            //             'options' => ['placeholder' => Yii::t('app','Tanlang'), 'multiple' => false,],
            //         ]); 
        $form->field($model, 'shift_id',['options'=>['class'=>'col-md-12']])->widget(DepDrop::classname(), [
            'data'=>$shift_id,
            'type' => DepDrop::TYPE_SELECT2,
            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
            'pluginOptions'=>[
                'depends'=>['school_id'],
                'placeholder' => ' ',
                'initialize' => false,
                'url'=>Url::to(['/shift/select'])
            ]
        ]);
            // $form->field($model, 'shift_id',['options'=>['placeholder' => Yii::t('app','Tanlang'),'class'=>'col-md-12']])->dropDownList(['Tanlash' => NULL] +ArrayHelper::map(Shift::find()->all(), 'id', 'name'));
        ?>
    </div>
    <hr>
    <div class="row">
        <?= $form->field($model, 'name',['options'=>['class'=>'col-md-12']])->textInput(['maxlength' => true, 'class'=>'form-control input-transparent']) ?>

        <?= $form->field($model, 'began_year',['options'=>['class'=>'col-md-4']])->textInput(['class'=>'form-control input-transparent']) ?>

        <?= $form->field($model, 'end_year',['options'=>['class'=>'col-md-4']])->textInput(['class'=>'form-control input-transparent']) ?>

        <?= $form->field($model, 'camera_url',['options'=>['class'=>'col-md-4']])->textInput(['maxlength' => true, 'class'=>'form-control input-transparent']) ?>
    </div>
    <hr>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['id' => 'save-grade-form', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
