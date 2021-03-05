<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Company;
use mihaildev\ckeditor\CKEditor;
use dosamigos\tinymce\TinyMce;
use  yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Tadbir */
/* @var $form yii\widgets\ActiveForm */
$user = Yii::$app->user->identity;
// print_r(user()->identity->username);
// echo '<pre>';
// print_r($user);
// exit();
$items = [];
if (!Yii::$app->user->isGuest) {
    switch ($user->username) {
        case 'admin':
        $company_id = '';
        break;
        case 'audit':
        $company_id = 18;
        break;

        case 'taxlil':
        $company_id = 8;
        break;
        case 'metrologiya':
        $company_id = 12;
        break;
        case 'reglament':
        $company_id = 10;
        break;
        case 'axborot':
        $company_id = 13;
        break;
        case 'standart':
        $company_id = 9;
        break;
        case 'sertifikat':
        $company_id = 15;
        break;
        case 'smk':
        $company_id = 16;
        break;
        case 'xalqaro':
        $company_id = 14;
        break;
        case 'integratsiya':
        $company_id = 11;
        break;
        case 'moliya':
        $company_id = 17;
        break;
        case 'bugalteriya':
        $company_id = 32;
        break;
        case 'yuridik':
        $company_id = 20;
        break;
        case 'kadr':
        $company_id = 19;
        break;
        case 'ijro':
        $company_id = 21;
        break;
        case 'pressa':
        $company_id = 30;
        break;
        case 'murojaat':
        $company_id = 22;
        break;
        case 'xo\'jalik':
        $company_id = 23;
        break;
        case 'smsiti':
        $company_id = 24;
        break;
        case 'uznim':
        $company_id = 25;
        break;
        case 'dep':
        $company_id = 26;
        break;
        case 'akkred':
        $company_id = 27;
        break;
        case 'barcode':
        $company_id = 28;
        break;
        case 'uztest':
        $company_id = 29;
        break;
        case 'antikorp':
        $company_id = 31;
        break;
    }
}

if(!empty($company_id)){
    $items = ArrayHelper::map(Company::find()->where(['id'=>$company_id])->all()
        , 'id', 'company_name');

        // echo "<pre>";
        // print_r($items);
        // exit();
        // $items = Company::find()->where(['id'=>$company_id])->all();
        // echo "<pre>";
        // print_r($items);
        // exit();
}
?>

<div class="tadbir-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php if($user->username=="admin"):?>
        <?= $form->field($model, 'company_id')->widget(\kartik\select2\Select2::classname(),[
            /*'value' => 1,*/
            'class'=>'col-md-6',
            'data' => \yii\helpers\ArrayHelper::map(Company::find()->all(), 'id', 'company_name'),
            'options' => ['placeholder' => 'Выберите', 'multiple' => false],
            'theme' => \kartik\select2\Select2::THEME_KRAJEE,
            'size' => 'xs',
        ]); ?>
        <?php else:?>
            <?=  $form->field($model, 'company_id')->dropDownList($items); ?>
        <?php endif; ?>
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
        <?= $form->field($model, 'files')->fileInput(['maxlength' => true]) ?>

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
