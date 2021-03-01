<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация на ' . Html::encode(Yii::$app->name);
// $this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
	#facebook-loginBtn {
		background-color: #4267B2;
		border-radius: 30px;
	}
	#facebook-loginBtn:hover {
		background-color: #2F549F;
	}
	#facebook-loginBtn i {
		margin-right: 15px;
	}
</style>

<div class="site-signup">

	<div class="row">
		<div class="col-lg-6 col-lg-offset-3" style="background-color: #FFFFFF; padding: 10px 50px; margin-bottom: 20px;">

			<h1 class="text-center" style="margin: 50px 0;"><?= Html::encode($this->title) ?></h1>

			<!-- <button id="facebook-loginBtn" class="btn btn-primary btn-block btn-lg"><i class="fab fa-facebook-square" style="font-size: 30px; vertical-align: middle;"></i> Continue with Facebook</button> -->

			<!-- <p style="margin: 15px 0;" class="text-center">
				— or —
			</p> -->

			<?php $form = ActiveForm::begin([
				'id' => 'form-signup',
				'action' => Url::to(['/site/signup'])
			]); ?>

				<?= $form->field($model, 'username')->textInput() ?>

				<?= $form->field($model, 'password')->passwordInput() ?>
				
				<?= $form->field($model, 'confirmpassword')->passwordInput() ?>

				<div class="form-group">
					<?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary btn-block btn-lg', 'name' => 'signup-button']) ?>
				</div>
				<hr>
				<div class="text-center" style="font-size: 110%; margin: 40px 0;">
					У вас есть уже аккаунт <?= Html::encode(Yii::$app->name) ?>? <?= Html::a('Войдите сейчас', ['site/login']) ?>.
				</div>

			<?php ActiveForm::end(); ?>

		</div>
	</div>

</div>
