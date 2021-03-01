<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Set Your New Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">


	<div class="row">
		<div class="col-lg-6 col-lg-offset-3" style="background-color: #FFFFFF; padding: 10px 50px; margin-bottom: 20px;">

			<h1 class="text-center" style="margin: 50px 0;"><?= Html::encode($this->title) ?></h1>
			
			<p>Please enter your new password below.</p>
			
			<?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

				<?= $form->field($model, 'password')->passwordInput() ?>
				
				<?= $form->field($model, 'confirmpassword')->passwordInput() ?>

				<div class="form-group">
					<?= Html::submitButton('Change My Password', ['class' => 'btn btn-primary btn-block btn-lg', 'name' => 'signup-button']) ?>
				</div>

			<?php ActiveForm::end(); ?>

		</div>
	</div>
	
</div>
