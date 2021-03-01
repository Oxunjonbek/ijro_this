<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Forgot your password?';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">

	<!-- <p>Please fill out your email. A link to reset password will be sent there.</p> -->

	<div class="row">
		<div class="col-md-6 col-md-offset-3" style="background-color: #FFFFFF; padding: 10px 50px; margin-bottom: 20px;">

			<h1 class="text-center" style="margin: 50px 0;"><?= Html::encode($this->title) ?></h1>

			<p>
				To reset your password, type the full email address you used to sign up for <?= Html::encode(Yii::$app->name) ?> and we'll send you an e-mail to walk you through resetting your password.
			</p>
			
			<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

				<?= $form->field($model, 'email')->textInput() ?>

				<div class="form-group">
					<?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-block btn-lg', 'name' => 'signup-button']) ?>
				</div>

			<?php ActiveForm::end(); ?>

		</div>
	</div>

</div>
