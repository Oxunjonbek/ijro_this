<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */


?>

<section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <img src="<?= bu('themes/robust/app-assets/images/logo/logo-dark.png') ?>" alt="branding logo">
                    </div>
<!--                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>MAKTAB</span>-->
<!--                    </h6>-->
                </div>
                <div class="card-content">

                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>Avtorizatsiyadan o'tish</span></p>
                    <div class="card-body">
                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'options' => ['class' => 'form-horizontal', 'novalidate' => true],
                            'fieldConfig' => [
                                'options' => ['class' => 'form-group position-relative has-icon-left', 'tag' => 'fieldset'],
//                                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            ],
                        ]); ?>

                        <?= $form->field($model, 'username', ['template' => '{input}<div class="form-control-position"><i class="ft-user"></i></div>'])->textInput(['autofocus' => 'autofocus', 'placeholder' => 'Логин'])->label(false) ?>
                        <?= $form->field($model, 'password', ['template' => '{input}<div class="form-control-position"><i class="fa fa-key"></i></div>'])->passwordInput(['placeholder' => 'Пароль'])->label(false) ?>


                        <div class="form-group row">
                            <?php
                            echo $form->field($model, 'rememberMe', [
                                'options' => ['class' => 'col-sm-12 col-12 text-sm-left pr-0', 'tag' => 'div'],
                                'checkTemplate' => "<fieldset>\n{input}\n<label for='loginform-rememberme'>Eslab qol</label>\n</fieldset>",
                            ])->checkbox(['class' => 'chk-remember'])->label(false);
                            ?>
                        </div>
                        <?= Html::submitButton('<i class="ft-unlock"></i> Kirish', ['class' => 'btn btn-outline-info btn-block', 'name' => 'login-button']) ?>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

