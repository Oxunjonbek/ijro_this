<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_name')->textarea(['rows' => 6]) ?>
    <?=  $form->field($model, 'parent')->dropDownList([
        'boshqarma'=>'boshqarma',
        'bo`lim'=>'bolum',
        'tizim'=>'tizim',
        // 'kechiktirilmoqda'=>'kechiktirilmoqda',
    ],['prompt'=>'Tanlash']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
