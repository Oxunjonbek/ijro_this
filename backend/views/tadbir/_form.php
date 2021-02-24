<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Company;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Tadbir */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tadbir-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_id')->widget(\kartik\select2\Select2::classname(),[
                    /*'value' => 1,*/
                    'class'=>'col-md-6',
                    'data' => \yii\helpers\ArrayHelper::map(Company::find()->all(), 'id', 'company_name'),
                    'options' => ['placeholder' => 'Выберите', 'multiple' => false],
                    'theme' => \kartik\select2\Select2::THEME_KRAJEE,
                    'size' => 'xs',
                ]); ?>

    <?=  $form->field($model, 'tadbir_name')->textarea(['rows' => '6'])  ?>

    <?=  $form->field($model, 'tadbir_content')->textarea(['rows' => '6'])  ?>

    <?=  $form->field($model, 'tadbir_result')->textarea(['rows' => '6'])  ?>

    <?= $form->field($model, 'tadbir_date',['options'=>['class'=>'col-md-4']])->widget(\kartik\date\DatePicker::classname(),[
            'options' => ['placeholder' => 'Tadbir  kunni kiriting'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy',
            ]
        ]); ?>

    <?=  $form->field($model, 'tadbir_description')->textarea(['rows' => '6'])  ?>

    <?=  $form->field($model, 'tadbir_status')->dropDownList([
        'bajarildi'=>'бажарилди',
        'bajarilmadi'=>'Муддати ўтиб ижро қилингин',
        'bajarilmadi'=>'Муддати ўтиб ижро қилингин',
        'ijroda'=>'иш жараёнида',
        'muddat'=>'муддати ўтган',
        // 'kechiktirilmoqda'=>'kechiktirilmoqda',
    ],['prompt'=>'Танлаш']); ?>

    

    <div class="form-group">
        <?= Html::submitButton('Сақлаш', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
