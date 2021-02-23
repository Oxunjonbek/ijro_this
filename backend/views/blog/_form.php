<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="blog-form">

    <?php $form = ActiveForm::begin(['id' => 'save-blog', 'action' => yii\helpers\Url::to(['blog/save', 'id' => $model->id]), 'method' => 'post']); ?>
    <div class="row">


        <?= $form->field($model, 'user_id', ['options' => ['class' => 'col-md-6']])->widget(\kartik\select2\Select2::classname(), [
            /*'value' => 1,*/
            'data' => \yii\helpers\ArrayHelper::map(User::find()->all(), 'id', 'username'),
            'options' => ['placeholder' => 'Выберите', 'multiple' => false],
            'theme' => \kartik\select2\Select2::THEME_KRAJEE,
            'size' => 'xs',
        ]); ?>

        <?= $form->field($model, 'title', ['options' => ['class' => 'col-md-6']])->textInput(['maxlength' => true, 'class' => 'form-control input-transparent']) ?>
    </div>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        // 'options' => ['rows' => 3],
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]) ?>
    <div class="row">
        <?= $form->field($model, 'author', ['options' => ['class' => 'col-md-6']])->textInput(['class' => 'form-control input-transparent']) ?>

        <?= $form->field($model, 'date', ['options' => ['class' => 'col-md-6']])->widget(\kartik\date\DatePicker::classname(), [
            'options' => ['placeholder' => 'Sanani kiriting'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ]
        ]); ?>
    </div>

    <?= $form->field($model, 'seen')->textInput(['class' => 'form-control input-transparent']) ?>
    <hr>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['id' => 'save-blog-form', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>