<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Company;
use mihaildev\ckeditor\CKEditor;
use dosamigos\tinymce\TinyMce;

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

    
    <?=  $form->field($model, 'tadbir_name')->label('Тадбир номи:')->widget(TinyMce::className(), [
    'language' => 'en',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste",
            "textcolor",
        ],
        'toolbar' => "forecolor backcolor | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
]);  ?>

    <?=  $form->field($model, 'tadbir_content')->label('Амалга ошириш механизми:')->widget(TinyMce::className(), [
    'language' => 'en',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste",
            "textcolor",
        ],
        'toolbar' => "forecolor backcolor | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
]);  ?>

    <?=  $form->field($model, 'tadbir_result')->label('Эришиладиган натижа ва кўрсаткичлар:')->widget(TinyMce::className(), [
    'language' => 'en',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste",
            "textcolor",
        ],
        'toolbar' => "forecolor backcolor | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
]);  ?>
    <?=  $form->field($model, 'masullar')->label('Масъуллар:')->widget(TinyMce::className(), [
    'language' => 'en',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste",
            "textcolor",
        ],
        'toolbar' => "forecolor backcolor | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
]);  ?>

    <?= $form->field($model, 'tadbir_date',['options'=>['class'=>'col-md-4']])->widget(\kartik\date\DatePicker::classname(),[
            'options' => ['placeholder' => 'Tadbir  kunni kiriting'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy',
            ]
        ]); ?>

    <?=  $form->field($model, 'tadbir_description')->label('Амалга оширилган ишлар:')->widget(TinyMce::className(), [
    'language' => 'en',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste",
            "textcolor",
        ],
        'toolbar' => "forecolor backcolor | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
]); ?>

    <?=  $form->field($model, 'tadbir_status')->dropDownList([
        'bajarildi'=>'бажарилди',
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
