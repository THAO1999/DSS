
<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
AppAsset::register($this);
$this->registerCssFile('@web/css/util.css')
?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
            <?php $form = ActiveForm::begin(['class' => 'login100-form validate-form']); ?>
				<!-- <form class="login100-form validate-form"> -->
					<span class="login100-form-title p-b-33">
						  Teacher Login
					</span>
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

<?= $form->field($model, 'username')->textInput(['autofocus' => true])?>

<?= $form->field($model, 'password')->passwordInput() ?>

<?= $form->field($model, 'rememberMe')->checkbox() ?>

<div class="form-group">
    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block  cs', 'name' => 'login-button']) ?>
</div>

<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
	

