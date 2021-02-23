<?php

use common\models\Town;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use yii\helpers\Html;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use common\models\Region;
use common\models\District;

/* @var $this yii\web\View */
/* @var $model common\models\School */
/* @var $form yii\widgets\ActiveForm */
// $this->title = 'Добавить Maktab';
// $this->params['breadcrumbs'][] = ['label' => 'Maktablar', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="school-form">


    <?php
     $form = ActiveForm::begin(['id' => 'save-school', 'action' => yii\helpers\Url::to(['school/save', 'id' => $model->id]), 'method' => 'post']); ?>
    <!-- <div class="row"> -->
    <label>Viloyatni tanlang:</label>
    
    <?= $form->field($model, 'region')->widget(\kartik\select2\Select2::classname(),[
                    'data' => \yii\helpers\ArrayHelper::map(\common\models\Region::find()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app','Tanlang'), 'multiple' => false,'id'=>'region_id'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                    'theme' => \kartik\select2\Select2::THEME_KRAJEE,
                    // 'size' => 'xs',
                ])->label(false); ?>
    

    <label>Tumanni tanlang:</label>
    <?= $form->field($model, 'district')->widget(DepDrop::classname(),[
                    'type' => DepDrop::TYPE_SELECT2,
                    'options' => ['placeholder' => Yii::t('app','Tanlang'), 'multiple' => false,'id'=>'district_id'],
                     'pluginOptions'=>[
                        'depends'=>['region_id'],
                        'placeholder' => false,
                        'initialize' => true,
                        'placeholder'=>'Select...',
                        'url' => Url::to(['/school/get-district-list'])
                    ],
                ])->label(false); ?>
    <?= $form->field($model, 'town_id')->widget(DepDrop::classname(),[
                    'type' => DepDrop::TYPE_SELECT2,
                    'options' => [
                                    'placeholder' => Yii::t('app','Tanlang'),
                                    'multiple' => false,'id'=>'townid',
                                ],
                     'pluginOptions'=>[
                        'depends'=>['region_id','district_id'],
                        'placeholder' => false,
                        'initialize' => true,
                        'placeholder'=>'Select...',
                        'url' => Url::to(['/school/town'])
                    ],
                ]); ?>
    

<div class="row">
    
    <?= $form->field($model, 'name',['options'=>['class'=>'col-md-9']])->textInput(['maxlength' => true, 'class' => 'form-control input-transparent input-sm']) ?>
    <?= $form->field($model, 'phone',['options'=>['class'=>'col-md-3']])->textInput(['maxlength' => true, 'class' => 'form-control input-transparent input-sm']) ?>
</div>
<div class="row">
    <?= $form->field($model, 'address',['options'=>['class'=>'col-md-6']])->textInput(['maxlength' => true, 'class' => 'form-control input-transparent input-sm']) ?>
    <?= $form->field($model, 'location',['options'=>['class'=>'col-md-6']])->textInput(['maxlength' => true, 'class' => 'form-control input-transparent input-sm']) ?>
</div><br>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['id' => 'save-school-form', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>


</div>
